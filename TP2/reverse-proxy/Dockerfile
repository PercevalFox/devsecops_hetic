FROM debian:12-slim
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    libnginx-mod-http-modsecurity \
    libmodsecurity3 \
    curl ca-certificates openssl && \
    rm -rf /var/lib/apt/lists/*

RUN mkdir -p /etc/nginx/modsec /etc/nginx/certs

ARG CRS_VERSION=v3.3.5
RUN curl -fsSL https://github.com/coreruleset/coreruleset/archive/refs/tags/${CRS_VERSION}.tar.gz \
  | tar -xz -C /opt && \
  cp /opt/coreruleset-*/crs-setup.conf.example /etc/nginx/modsec/crs-setup.conf && \
  cp -r /opt/coreruleset-*/rules /etc/nginx/modsec/

RUN printf '%s\n' \
  'SecRuleEngine On' \
  'Include /etc/nginx/modsec/crs-setup.conf' \
  'Include /etc/nginx/modsec/rules/*.conf' \
  > /etc/nginx/modsec/modsecurity.conf

COPY nginx.conf /etc/nginx/nginx.conf

RUN openssl req -x509 -nodes -days 1 -newkey rsa:2048 \
    -keyout /etc/nginx/certs/self.key \
    -out /etc/nginx/certs/self.crt \
    -subj "/CN=localhost"

EXPOSE 80 443
CMD ["nginx","-g","daemon off;"]
