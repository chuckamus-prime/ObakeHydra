# go-api-svc

This is a simple Go API service using Gorilla MUX.
And now in this version of this service it is integrated with Dapr. There is code for creating a dapr client to call other services through dapr.

## Present dependencies

- Go 1.22.5
- gorilla mux v1.8.1
- dapr go-sdk v1.11.0

## Usage

### Command line

To build the service, simply run the following command:

```bash
go build -o ./bin/go-api-svc ./cmd/main.go
```

To run the service, you must use docker because this service depends on dapr to be present. The Docker-compose file in the root of the project will start the service and dapr sidecar appropriately.

### Docker

See notes in the root README.md file for running the service in Docker with docker-compose. Trying to run this app with docker along (docker build... docker run...)

## Testing the API

Right now, there is only one endpoint that returns a simple health check. If you run in docker, or run locally, using localhost and the configured port, you should be able to reach the health check endpoint.

```bash
curl http://localhost:5001/api/health
```

... Or you can check the status of the app by trying to reach the following URL: <http://localhost:5001/api/health>

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.

## Technologies, frameworks, & languages used

- [Go](https://golang.org/)
- [Gorilla MUX](https://github.com/gorilla/mux)
- [Dapr](https://dapr.io/)