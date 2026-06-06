#!/usr/bin/env bash
# Post-edit quality gate: phpstan + phpmd + phpinsights + pest (scope file or module tests).
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "${ROOT}"

if [[ $# -lt 1 ]]; then
  echo "Usage: ./tools/post-edit-php.sh <file.php> [pest-path]"
  echo "Example: ./tools/post-edit-php.sh Modules/TechPlanner/database/migrations/2026_02_22_000000_create_profiles_table.php Modules/TechPlanner/tests"
  exit 1
fi

FILE="$1"
PEST_PATH="${2:-}"

if [[ ! -f "${FILE}" ]]; then
  echo "FAIL: file not found: ${FILE}"
  exit 1
fi

PHPMD="${PHPMD:-phpmd}"
fail=0

run() {
  echo ""
  echo "━━━ $1 ━━━"
  shift
  if "$@"; then
    echo "OK: $1"
  else
    echo "FAIL: $1"
    fail=1
  fi
}

run "PHPStan" ./vendor/bin/phpstan analyse "${FILE}" --memory-limit=-1

if command -v "${PHPMD}" >/dev/null 2>&1; then
  run "phpmd" "${PHPMD}" "${FILE}" text phpmd.xml
else
  echo "SKIP: phpmd not on PATH (install or set PHPMD=...)"
fi

if [[ -f ./vendor/bin/phpinsights ]]; then
  echo ""
  echo "━━━ phpinsights (informational for migrations) ━━━"
  ./vendor/bin/phpinsights analyse "${FILE}" --no-interaction || true
fi

if [[ -n "${PEST_PATH}" && -d "${PEST_PATH}" ]]; then
  run "Pest ${PEST_PATH}" ./vendor/bin/pest "${PEST_PATH}" --compact
fi

echo ""
if [[ "${fail}" -eq 0 ]]; then
  echo "✅ Post-edit gate passed (phpstan + phpmd${PEST_PATH:+, pest})"
  exit 0
fi

echo "❌ Post-edit gate failed"
exit 1
