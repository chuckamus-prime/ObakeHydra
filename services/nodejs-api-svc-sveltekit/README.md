# nodejs-api-svc-sveltekit

This is a simple Node.js API service using Svelte and SvelteKit. You can both serve static content and also create an api for the app to use.

## Usage to run locally

```bash
npm install
npm run build
node build
```

Note that this will run the service on port 3000 which is the default port for node.

## Usage to run in Docker

```bash
docker build -t nodejs-api-svc-sveltekit .
docker run -p 5007:3000 nodejs-api-svc-sveltekit
```

## Testing

You can test that the home page loads on the base route.
Right now, there is only one api endpoint, that returns a simple health check. If you run in docker, or run locally, using localhost and the configured port, you should be able to reach the health check endpoint.

```bash
curl http://localhost:5006/api/health
```

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.

## Technologies, frameworks, & languages used

- [NodeJS](https://nodejs.org/)
- [Svelte](https://svelte.dev/)
- [SvelteKit](https://kit.svelte.dev/)
- [Docker](https://www.docker.com/)
- [TypeScript](https://www.typescriptlang.org/)
