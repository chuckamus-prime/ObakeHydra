package routes

import (
	"github.com/gorilla/mux"
	"go-api-svc-dapr/internal/api/handlers"
)

func SetupRouter() *mux.Router {
	router := mux.NewRouter()
	router.HandleFunc("/api/health", handlers.ResourceHandler).Methods("GET")
	return router
}