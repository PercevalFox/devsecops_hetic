FROM debian:12-slim
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    libnginx-mod-http-modsecurity \
    libmodsecurity3 \
    modsecurity-crs \
    openssl ca-certificates curl && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir -p /etc/nginx/modsec/rules /etc/nginx/certs && \
    cp /usr/share/modsecurity-crs/crs-setup.conf.example /etc/nginx/modsec/crs-setup.conf && \
    cp -r /usr/share/modsecurity-crs/rules/ /etc/nginx/modsec/

RUN /bin/sh -c 'cat > /etc/nginx/modsec/modsecurity.conf << "EOF"\n\
SecRuleEngine On\n\
Include /etc/nginx/modsec/crs-setup.conf\n\
Include /etc/nginx/modsec/rules/*.conf\n\
EOF'

COPY nginx.conf /etc/nginx/nginx.conf

RUN openssl req -x509 -nodes -days 1 -newkey rsa:2048 \
    -keyout /etc/nginx/certs/self.key \
    -out /etc/nginx/certs/self.crt \
    -subj "/CN=localhost"

EXPOSE 80 443
CMD ["nginx","-g","daemon off;"]
