# php

This is a plain PHP site with **no build or compilation step** &mdash; just
`.php` files served directly. It demonstrates PHP as a "drop files and run"
stack, in contrast to the compiled/bundled services elsewhere in this repo
(Go, .NET, the TypeScript/Node services, etc.).

## How it's put together

A single container runs two processes, supervised by [supervisord](http://supervisord.org/):

- **nginx** &mdash; the only process listening on a port exposed from the
  container (80). It serves static files (`style.css`, `404.html`) directly,
  and forwards anything ending in `.php` to php-fpm over FastCGI.
- **php-fpm** &mdash; executes the actual PHP code. It only listens on
  `127.0.0.1:9000`, so it's never reachable directly from outside the
  container &mdash; only nginx can talk to it.

This "nginx in front of php-fpm" split is the standard way PHP is deployed in
production (WordPress, Laravel, Symfony, etc. all commonly run this way).
Running both processes in one container via supervisord is a legitimate,
simpler alternative to running nginx and php-fpm as two separate containers;
either is production-suitable, this repo just picked the single-container
version to keep this demo self-contained.

## Layout

```text
services/php/
├── Dockerfile
├── docker/
│   ├── nginx.conf         # nginx server block (proxies *.php to php-fpm)
│   └── supervisord.conf   # runs nginx + php-fpm together
└── src/                   # the actual web root
    ├── index.php
    ├── about.php
    ├── contact.php
    ├── nav.php             # shared nav include
    ├── style.css
    ├── 404.html
    └── api/health.php
```

## Pages

- `/` (`index.php`) — home page, shows the PHP version/SAPI/time to prove
  php-fpm is actually executing the code
- `/about.php`
- `/contact.php`
- `/api/health` — returns a `200` with a small JSON body, so this can be
  used as a healthcheck target
- anything else returns a `404` served from `404.html`

## Usage

### Docker

```bash
docker build -t php-svc ./services/php
docker run -d -p 5020:80 --rm php-svc
```

Or via the root `docker-compose.yaml`:

```bash
docker-compose up -d --build
```

You can check the service is up by hitting <http://localhost:5020/api/health>
