#!/usr/bin/env bash
set -euo pipefail
APP_TAG="devsecops-demo:local"

echo "[1/3] Build image"
docker build -t "$APP_TAG" .

echo "[2/3] Trivy FS scan"
trivy fs --scanners vuln,misconfig,secret --severity CRITICAL,HIGH --ignore-unfixed --exit-code 0 .

echo "[3/3] Trivy Image scan (fail on CRIT/HIGH)"
trivy image --scanners vuln,secret,misconfig --severity CRITICAL,HIGH --ignore-unfixed --exit-code 1 "$APP_TAG"
