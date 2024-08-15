# Use the official Golang image as the base image
FROM golang:1.21-alpine

#install curl since the healthcheck is using curl
RUN apk add --no-cache curl

# Set the Current Working Directory inside the container
WORKDIR /app

# Copy the source code
COPY . .

# Initialize the Go module and download dependencies if go.mod does not exist
RUN [ ! -f go.mod ] && go mod init go-app-svc || true && go mod tidy

# Build the Go app
RUN go build -o main ./cmd/main.go

# Set environment variable
ENV HTTP_PORT=5001

# Expose the port the app runs on
EXPOSE 5001

# Command to run the executable
CMD ["./main"]
