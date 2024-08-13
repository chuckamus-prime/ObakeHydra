package routes

import (
	"github.com/gorilla/mux"
	"go-api-svc/internal/api/handlers/healthcheck"
)

func SetupRouter() *mux.Router {
	router := mux.NewRouter()
	router.HandleFunc("/api/health", healthcheck.ResourceHandler).Methods("GET")
	// add other routes as needed here:

	return router
}