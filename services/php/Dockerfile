# Single container running nginx in front of php-fpm, supervised by
# supervisord. This is a common production pattern for PHP apps that don't
# need a separate app-server container.
FROM php:8.3-fpm-alpine

# nginx to front php-fpm, supervisor to run both processes,
# curl so the docker-compose healthcheck can hit /api/health
RUN apk add --no-cache nginx supervisor curl \
    && mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www/html
COPY src/ /var/www/html/

EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
