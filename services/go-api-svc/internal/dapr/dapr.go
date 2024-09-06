package dapr

import (
	"log"

	"github.com/dapr/go-sdk/client"
)

// InitDaprClient initializes and returns a Dapr client.
// It creates a new Dapr client and returns it.
// If an error occurs while creating the client, it logs the error and exits the program.
// The returned Dapr client can be used to interact with Dapr services.
func InitDaprClient() client.Client {
	daprClient, err := client.NewClient()
	if err != nil {
		log.Fatalf("Failed to create Dapr client: %v", err)
	}
	return daprClient
}
