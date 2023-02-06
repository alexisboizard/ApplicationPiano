FROM nginx
RUN \
    DEBIAN_FRONTEND=noninteractive \
        apt-get update && \
        apt-get full-upgrade -y && \
        apt-get clean;

RUN \
    DEBIAN_FRONTEND='noninteractive' \
        apt-get update && \
        apt-get install -y -- \
            apt-transport-https lsb-release ca-certificates curl && \
        curl -sSLo '/usr/share/keyrings/deb.sury.org-php.gpg' 'https://packages.sury.org/php/apt.gpg' && \
        printf -- '%s\n' "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $( lsb_release -sc; ) main" > '/etc/apt/sources.list.d/php.list' && \
        apt-get update && \
        apt-get install -y \
            php8.1-fpm php8.1-bcmath php8.1-curl php8.1-mbstring php8.1-pdo php8.1-mysql php8.1-xml && \
        apt-get clean;

COPY nginx.conf /etc/nginx/conf.d/default.conf
WORKDIR /usr/share/nginx/html
COPY . /usr/share/nginx/html
EXPOSE 80
