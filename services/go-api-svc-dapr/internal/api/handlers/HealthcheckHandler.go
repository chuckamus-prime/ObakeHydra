package handlers

import (
	"context"
	"encoding/json"
	"go-api-svc-dapr/internal/dapr"
	"log"
	"net/http"
	"os"
)

func HealthcheckHandler(w http.ResponseWriter, r *http.Request) {
	log.Printf("Received request: %s %s", r.Method, r.URL.Path)

	// Set response headers
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(http.StatusOK)

	// Create response
	response := map[string]string{"Status": "Healthy"}

	// Just to show that we are able to call the Dapr client, lets publish a message!
	if !demoDaprPublishEvnet() {
		http.Error(w, "Internal Server Error", http.StatusInternalServerError)
		return
	}

	// Encode and send response
	if err := json.NewEncoder(w).Encode(response); err != nil {
		log.Printf("Error encoding response: %v", err)
		http.Error(w, "Internal Server Error", http.StatusInternalServerError)
		return
	}

	log.Printf("Successfully handled request: %s %s", r.Method, r.URL.Path)
}

func demoDaprPublishEvnet() bool {
	daprClient := dapr.InitDaprClient()

	pubsubName := os.Getenv("PUBSUB_NAME")
	if pubsubName == "" {
		pubsubName = "pubsub"
	}
	topicName := os.Getenv("HEALTHCHECK_TOPIC_NAME")
	if topicName == "" {
		topicName = "healthcheck"
	}

	ctx := context.Background()
	// Publish message to topic
	if err := daprClient.PublishEvent(ctx, pubsubName, topicName, []byte("Health check called")); err != nil {
		log.Printf("Error publishing message: %v", err)
		return false
	}
	log.Printf("Published message to topic: %s", topicName)
	return true
}
