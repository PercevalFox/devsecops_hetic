#!/usr/bin/env bash
set -euo pipefail
mkdir -p reports
set +e
curl -skI "https://localhost/?q=%3Cscript%3Ealert(1)%3C/script%3E" > reports/waf-test.txt
echo >> reports/waf-test.txt
curl -sk "https://localhost/?id=1%20OR%201=1" -o /dev/null -w "status:%{http_code}
" >> reports/waf-test.txt
set -e
