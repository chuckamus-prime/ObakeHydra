# nodejs-api-svc-express

This is a simple Node.js API service using Express.js.

## Usage to run locally

```bash
npm install
npm run build
npm start
```

## Usage to run in Docker

```bash
docker build -t nodejs-api-svc-express .
docker run -p 5002:5002 nodejs-api-svc-express
```

## Testing the API

Right now, there is only one endpoint that returns a simple health check. If you run in docker, or run locally, using localhost and the configured port, you should be able to reach the health check endpoint.

```bash
curl http://localhost:5002/api/health
```

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.

## Technologies, frameworks, & languages used

- [NodeJS](https://nodejs.org/)
- [ExpressJS](https://expressjs.com/)
- [Docker](https://www.docker.com/)
- [TypeScript](https://www.typescriptlang.org/)
