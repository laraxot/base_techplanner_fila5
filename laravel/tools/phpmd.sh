#!/usr/bin/env bash
# PHPMD wrapper — standalone phar (no root composer dependency)
set -euo pipefail
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
exec php "${ROOT}/tools/phpmd.phar" "$@"
