FROM debian:12-slim
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y --no-install-recommends nginx libnginx-mod-http-headers-more-filter openssl git ca-certificates curl libmodsecurity3 modsecurity-crs modsecurity-nginx && rm -rf /var/lib/apt/lists/*
RUN mkdir -p /etc/nginx/modsec/rules /etc/nginx/certs
RUN cp /usr/share/modsecurity-crs/crs-setup.conf.example /etc/nginx/modsec/crs-setup.conf || true
RUN cp -r /usr/share/modsecurity-crs/rules /etc/nginx/modsec/ || true
RUN touch /etc/nginx/modsec/modsecurity.conf && printf "SecRuleEngine On
Include /etc/nginx/modsec/crs-setup.conf
Include /etc/nginx/modsec/rules/*.conf
" > /etc/nginx/modsec/modsecurity.conf
COPY nginx.conf /etc/nginx/nginx.conf
RUN openssl req -x509 -nodes -days 1 -newkey rsa:2048 -keyout /etc/nginx/certs/self.key -out /etc/nginx/certs/self.crt -subj "/CN=localhost"
EXPOSE 80 443
CMD ["nginx","-g","daemon off;"]
