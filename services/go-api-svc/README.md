# go-api-svc

This is the start of a GoLang API service.

## Present dependencies

- Go 1.21
- gorilla mux v1.8.1

## Usage

### Command line

To run the service, simply run the following command:

```bash
go run ./cmd/main.go
```

### Docker

To run the service in a Docker container, run the following command:

```bash
docker build -t go-api-svc .
```

Then run the container:

```bash
docker run -d -p 5001:5001 --rm go-api-svc
```

### Note about modules

you can check the status of the app by trying to reach the following URL: <http://localhost:5001/api/health>
