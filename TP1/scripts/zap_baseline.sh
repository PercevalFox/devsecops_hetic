#!/usr/bin/env bash
set -euo pipefail
TARGET="${1:-http://127.0.0.1:8080}"
OUT="reports/zap_report.html"
mkdir -p reports
echo "[i] Scanning $TARGET ..."
docker run --rm -t -v "$PWD":/zap/wrk owasp/zap2docker-stable   zap-baseline.py -t "$TARGET" -r "$(basename "$OUT")"
echo "[i] Report at $OUT"
