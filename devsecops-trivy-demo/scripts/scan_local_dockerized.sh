#!/usr/bin/env bash
set -euo pipefail
APP_TAG="devsecops-demo:local"

echo "[1/4] Build image"
docker build -t "$APP_TAG" .

echo "[2/4] Trivy FS (dockerized)"
docker run --rm -v "$PWD":/repo aquasec/trivy:latest fs --scanners vuln,misconfig,secret --severity CRITICAL,HIGH --ignore-unfixed --exit-code 0 /repo

echo "[3/4] Trivy Image (dockerized)"
docker run --rm -v /var/run/docker.sock:/var/run/docker.sock aquasec/trivy:latest image --severity CRITICAL,HIGH --ignore-unfixed --exit-code 1 "$APP_TAG"

echo "[4/4] OK"
