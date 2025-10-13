# P1 — Audit d’une Application Vulnérable (DVWA ou Juice Shop)

## 🎯 Objectifs
- Identifier **3 vulnérabilités** (ex: SQLi, XSS, IDOR) avec **OWASP ZAP**.
- **Exploiter 1 faille** et proposer une **correction** (ex: requêtes SQL paramétrées).
- Générer un **rapport sommaire** (vulnérabilité → preuve → remédiation).
- Outils: **Docker** (DVWA/Juice Shop), **OWASP ZAP**.

## 🧱 Démarrage rapide (local)
### Option A — DVWA (port 8080)
```bash
docker run --rm -p 8080:80 vulnerables/web-dvwa
# http://127.0.0.1:8080
```
### Option B — Juice Shop (port 3000)
```bash
docker run --rm -p 3000:3000 bkimminich/juice-shop
# http://127.0.0.1:3000
```

## 🔍 ZAP Baseline (local)
```bash
# DVWA
bash scripts/zap_baseline.sh http://127.0.0.1:8080
# Juice Shop
bash scripts/zap_baseline.sh http://127.0.0.1:3000
```
→ rapport: `reports/zap_report.html`

## ✅ Livrables (dans `submission/`)
1. Captures d’écran (preuve) → `submission/screenshots/`
2. Code corrigé (ou pseudo-code) → `submission/fix/`
3. Rapport sommaire → `submission/rapport.md` (modèle fourni)

## 🧪 CI  
`zap-dvwa.yml` lance DVWA en **service** et scanne `http://localhost:8080`, puis uploade le rapport.

## 📚 Modèle de rapport
Voir `submission/report-template.md`.
