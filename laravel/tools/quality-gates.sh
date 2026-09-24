#!/usr/bin/env bash
# Quality gates: Pint → PHPStan → Pest → PHPMD → PHPInsights
# cwd: laravel/
# Usage: ./tools/quality-gates.sh [SESSION_FILES=<file-list>]

set -uo pipefail

mkdir -p build storage/app/ai
DIRTY="storage/app/ai/qg-dirty-$$.txt"
trap 'rm -f "$DIRTY"' EXIT

# === Preflight ===
echo "📋 Preflight checks..."

# DB reachability
DB_HOST_TEST="$(grep -m1 '^DB_HOST=' .env.testing 2>/dev/null | cut -d= -f2)"
if [[ -n "$DB_HOST_TEST" ]] && ! nc -z -w3 "$DB_HOST_TEST" 3306 2>/dev/null; then
  echo "⚠️  DB ${DB_HOST_TEST}:3306 unreachable — Pest/ide-helper will skip"
  export QG_DB_DOWN=1
fi

# Dirty list
git diff --name-only --diff-filter=ACM > "$DIRTY"
git ls-files --others --exclude-standard >> "$DIRTY"
sed -i 's#^laravel/##' "$DIRTY"
sort -u -o "$DIRTY" "$DIRTY"

# Session scope
SESSION_SCOPE="${SESSION_FILES:-$DIRTY}"
echo "✅ Scope: $(wc -l < "$SESSION_SCOPE") files"

# Merge markers
dirty_markers="$(command grep -E '\.php$' "$SESSION_SCOPE" | xargs -r command grep -lE '^(<<<<<<<|>>>>>>>)' 2>/dev/null || true)"
if [[ -n "$dirty_markers" ]]; then
  echo "❌ Merge markers in: ${dirty_markers}"
  exit 1
fi

# Syntax
{ command grep -E '\.php$' "$SESSION_SCOPE" || true; } | xargs -r -n1 php -l >/dev/null && echo "✅ PHP syntax OK"

# === Gates ===
run_gate() {
  local name="$1" secs="$2" cmd="$3" code=0
  echo "==> ${name} (${secs}s)"
  timeout "${secs}" bash -o pipefail -c "${cmd}" > "build/${name}.txt" 2>&1 || code=$?
  if [[ $code -eq 124 || $code -eq 143 ]]; then
    echo "⏱️  TIMEOUT — tail build/${name}.txt"; tail -5 "build/${name}.txt"; return 2
  fi
  [[ $code -eq 0 ]] && echo "✅ ${name}" || echo "❌ ${name} (check build/${name}.txt)"
  return "$code"
}

pint_code=0; run_gate pint 120 'vendor/bin/pint --test --dirty' || pint_code=$?
phpstan_code=0; run_gate phpstan 1200 './vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1' || phpstan_code=$?

if [[ $phpstan_code -eq 0 ]]; then
  pest_code=0; run_gate pest 600 './vendor/bin/pest --no-coverage' || pest_code=$?

  if [[ $pest_code -eq 0 ]]; then
    run_gate phpmd 900 'tools/phpmd.sh $(ls -d Modules/*/app | tr '\''\\n'\'' '\'','\'' | sed '\''s/,$//'\'') text ../phpmd.xml' || true
    run_gate insights 900 'tools/phpinsights.sh analyse Modules --no-interaction' || true
  fi
else
  echo "SKIP pest/phpmd/insights: PHPStan red"
fi

echo ""
echo "GATES pint=$pint_code phpstan=$phpstan_code pest=${pest_code:-3} — check build/ for details"
