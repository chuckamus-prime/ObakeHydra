# nodejs-api-svc-express

This is a simple Node.js API service using Express.js.
And now in this version of this service it is integrated with Dapr. There is code for creating a dapr client to call other services through dapr.

## Usage to run in Docker

To run the service, you must use docker because this service depends on dapr to be present. The Docker-compose file in the root of the project will start the service and dapr sidecar appropriately.

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
- [Dapr](https://dapr.io/)
