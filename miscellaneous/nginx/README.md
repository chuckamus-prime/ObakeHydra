# nginx

This is a simple demonstration of running [nginx](https://nginx.org/) on its own,
serving a small static site. It doesn't do anything with a backend app yet —
that comes later when this gets paired with something like PHP in a
`hydras/*` branch.

Everything here uses production-suitable pieces: the official `nginx` image
(no dev-only shortcuts), a real server block, gzip compression, and a
`/api/health` endpoint per this repo's convention for demonstrating a service
is up and alive.

## components

### server

The web server itself, using the official `nginx:1.27-alpine` image. It's
given its own config file (`conf/default.conf`) mounted read-only, and serves
the static files under `html/` mounted read-only as well. Nothing is baked
into a custom image here — the files and config are just mounted in, which
keeps this fast to iterate on. A production deployment would normally bake
the config and content into the image at build time instead of bind-mounting,
but this is close enough to demonstrate the pattern.

We are mapping nginx's default port 80 to 5019 to avoid conflicts with any
other docker-compose service.

## pages

- `/` (`index.html`) — home page
- `/about.html` — about page
- `/contact.html` — contact page
- `/api/health` — returns a `200` with a small JSON body, so this can be used
  as a healthcheck target
- anything else returns a `404` served from `404.html`

You can view the site at <http://localhost:5019>

## config

- `miscellaneous/nginx/conf/default.conf` — the nginx server block
- `miscellaneous/nginx/html/*` — the static site content

Go checkout the docs <https://nginx.org/en/docs/> if you want to know more.
