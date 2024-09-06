package main

import (
	"go-api-svc/internal/api/routes"
	"log"
	"net/http"
	"os"
)

func main() {
	log.Printf("service starting...")

	router := routes.SetupRouter()

	port := os.Getenv("HTTP_PORT")
	if port == "" {
		port = "5001" // Default port if not specified
	}
	log.Fatal(http.ListenAndServe(":"+port, router))
}