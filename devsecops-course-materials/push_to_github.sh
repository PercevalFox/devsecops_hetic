#!/usr/bin/env bash
set -euo pipefail

# Usage:
#   GITHUB_USER=monuser ./push_to_github.sh
# or set REMOTE like: REMOTE=git@github.com:org/devsecops-course-materials.git

REPO_NAME="${REPO_NAME:-devsecops-course-materials}"
REMOTE="${REMOTE:-}"
USER="${GITHUB_USER:-}"

if [[ -z "${REMOTE}" ]]; then
  if [[ -n "${USER}" ]]; then
    REMOTE="git@github.com:${USER}/${REPO_NAME}.git"
  else
    echo "Set REMOTE=... or GITHUB_USER=..."; exit 1
  fi
fi

git init
git add .
git commit -m "feat: initial course materials"
git branch -M main
git remote add origin "${REMOTE}" || true
git push -u origin main
echo "Pushed to ${REMOTE}"
