# go-api-svc-dapr

This is a simple Go API service using Gorilla MUX and integrated with Dapr. There is code for creating a dapr client to call other services through dapr.

## Present dependencies

- Go 1.21
- gorilla mux v1.8.1
- dapr go-sdk v1.10.1

## Usage

### Command line

To run the service, simply run the following command:

```bash
go run ./cmd/main.go
```

### Docker

See notes in the root README.md file for running the service in Docker with docker-compose. Trying to run this app with docker along (docker build... docker run...) 

## Testing the API

Right now, there is only one endpoint that returns a simple health check. If you run in docker, or run locally, using localhost and the configured port, you should be able to reach the health check endpoint.

```bash
curl http://localhost:5003/api/health
```

... Or you can check the status of the app by trying to reach the following URL: <http://localhost:5003/api/health>

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.

## Technologies, frameworks, & languages used

- [Go](https://golang.org/)
- [Gorilla MUX](https://github.com/gorilla/mux)
- [Dapr](https://dapr.io/)
