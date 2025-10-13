# DevSecOps – Démo Trivy + GitHub Actions

## Prérequis
- Docker ≥ 24
- (Option) Trivy CLI installé **ou** usage des scripts dockerized

## Lancer localement
```bash
python -m venv .venv && source .venv/bin/activate
pip install -r requirements.txt
pytest -q
python app.py
# puis http://localhost:8000
```

## Scanner
```bash
bash scripts/scan_local.sh
# ou sans installer Trivy
bash scripts/scan_local_dockerized.sh
```

![ci](https://github.com/PercevalFox/devsecops_hetic/actions/workflows/ci.yml/badge.svg)
