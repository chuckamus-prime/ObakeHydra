# Single container running nginx in front of php-fpm, supervised by
# supervisord. This is a common production pattern for PHP apps that don't
# need a separate app-server container.
FROM php:8.3-fpm-alpine

# nginx to front php-fpm, supervisor to run both processes,
# curl so the docker-compose healthcheck can hit /api/health.
#
# Also installs the Microsoft ODBC Driver 18 for SQL Server (Alpine build)
# plus the sqlsrv/pdo_sqlsrv PECL extensions, so PHP can talk to the
# relational-db-sqlserver service. Build tooling is installed as a
# virtual package and removed afterwards to keep the final image small.
RUN apk add --no-cache nginx supervisor curl gnupg unixodbc unixodbc-dev \
    && mkdir -p /run/nginx \
    && case "$(uname -m)" in \
         x86_64) ARCH=amd64 ;; \
         aarch64) ARCH=arm64 ;; \
         *) echo "Unsupported architecture: $(uname -m)" >&2; exit 1 ;; \
       esac \
    && curl -fsSL -O "https://download.microsoft.com/download/0b3d5518-b4a7-4a2b-afc7-7ee9e967f93c/msodbcsql18_18.6.2.1-1_${ARCH}.apk" \
    && apk add --no-cache --allow-untrusted "msodbcsql18_18.6.2.1-1_${ARCH}.apk" \
    && rm "msodbcsql18_18.6.2.1-1_${ARCH}.apk" \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv \
    && apk del .build-deps

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www/html
COPY src/ /var/www/html/

EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
