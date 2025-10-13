#!/usr/bin/env bash
set -euo pipefail
mkdir -p reports
curl -skI https://localhost > reports/headers.txt
