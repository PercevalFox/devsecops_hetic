# TP2 — Sécurisation basique (WAF + TLS + CSP + MFA)

Stack:
- Nginx + ModSecurity v3 + OWASP CRS
- TLS 443 auto-cert pour CI; prêt pour Let's Encrypt
- CSP/HSTS
- PHP app MFA TOTP
- CI GitHub: démarre la stack, teste WAF, vérifie headers, exporte artefacts

Usage:
- docker compose up -d
- https://localhost
