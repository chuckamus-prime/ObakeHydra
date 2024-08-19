# nodejs-api-svc-svelte

This is a simple Node.js API service using Svelte and SvelteKit.

## Usage to run locally

```bash
npm install
npm run build
npm run dev -- --open
```

## Usage to run in Docker

```bash
docker build -t nodejs-api-svc-express .
docker run -p 5007:5007 nodejs-api-svc-express
```

## Testing the API

Right now, there is only one endpoint that returns a simple health check. If you run in docker, or run locally, using localhost and the configured port, you should be able to reach the health check endpoint.

```bash
curl http://localhost:5007/api/health
```

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.

## Technologies, frameworks, & languages used

- [NodeJS](https://nodejs.org/)
- [Svelte](https://svelte.dev/)
- [SvelteKit](https://kit.svelte.dev/)
- [Docker](https://www.docker.com/)
- [TypeScript](https://www.typescriptlang.org/)
