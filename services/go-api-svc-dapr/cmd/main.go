package main

import (
	"go-api-svc-dapr/internal/api/routes"
	"log"
	"net/http"
	"os"
)

func main() {
	log.Printf("service starting...")

	// Initialize Dapr client using the InitDaprClient function

	router := routes.SetupRouter()

	port := os.Getenv("HTTP_PORT")
	if port == "" {
		port = "5003" // Default port if not specified
	}
	log.Fatal(http.ListenAndServe(":"+port, router))
}