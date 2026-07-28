# php-nginx-sqlserver

A hydra combining:

- `services/php` &mdash; PHP served by nginx + php-fpm (single container,
  supervised by supervisord)
- `miscellaneous/relational-db-sqlserver` &mdash; Microsoft SQL Server

On this branch, `services/php` has been turned into a small **todo app with
no authentication** &mdash; there's no login, no session, no user concept at
all. It exists purely to demonstrate PHP talking to SQL Server, not to model
a real product.

## Why PHP + SQL Server

PHP has a well-maintained, first-party SQL Server driver: Microsoft ships and
actively maintains `sqlsrv`/`pdo_sqlsrv` (the latest GA at the time of
writing is 5.13.1, supporting PHP 8.3–8.5, installable via PECL alongside the
Microsoft ODBC Driver 18, including on Alpine 3.20–3.23). That combination
(Alpine base image + PECL-installed drivers) is what this branch uses.

Note the release cadence isn't fast &mdash; 5.13.0 was the first stable
release in about two years &mdash; but it is genuinely maintained, which is
enough for a "these are production-viable technologies" demonstration.

## What's different from `services/php`

- `services/php/Dockerfile` now also installs the Microsoft ODBC Driver 18
  for SQL Server (Alpine build) and the `sqlsrv`/`pdo_sqlsrv` PECL
  extensions.
- `services/php/src/db.php` opens a `PDO` connection using the
  `pdo_sqlsrv` driver, with connection settings from environment variables
  (`DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`). On first
  connection it creates the `tododb` database and `dbo.todos` table if they
  don't already exist, so there's no separate migration step to run.
- `services/php/src/index.php` is now the todo app: list, add, toggle
  done/not-done, and delete items — all via plain HTML forms that POST back
  to itself.
- `services/php/src/api/health.php` now also runs `SELECT 1` against SQL
  Server, so the healthcheck reflects both the app and its database
  dependency, per this repo's healthcheck convention.
- The old `about.php`/`contact.php`/`nav.php` multi-page demo content was
  removed since it isn't relevant to a single-page todo app.
- Root `docker-compose.yaml` now wires the `php` service to
  `relational-db-sqlserver` via `depends_on: condition: service_healthy` and
  passes the `DB_*` environment variables.

## Ports

| Service | Port |
| --- | --- |
| php (todo app) | 5020 |
| relational-db-sqlserver | 5012 (mapped from 1433) |

## Usage

```bash
docker-compose up -d --build
```

Then visit <http://localhost:5020/> for the todo app, or
<http://localhost:5020/api/health> to confirm both PHP and the SQL Server
connection are healthy.

## Credentials

Same as `miscellaneous/relational-db-sqlserver`: user `sa`, password
`P@ssw0rd` (set in the root `docker-compose.yaml`). This is a local demo
only; don't reuse these credentials anywhere real.
