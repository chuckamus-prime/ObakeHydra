# dotnet-svc

This is a simple .NET Core service that can be used to demonstrate how to deploy a .NET Core service to Kubernetes. It is a console app that starts, performs tasks, and then stops.

## Build

To build the service, run the following command:

```bash
dotnet build
```

## Run

To run the service, run the following command:

```bash
dotnet run
```

## Test

The testing project is presently setup as a NUnit test project with no tests yet, but you could swap it out for any other dotnet testing tool you desire. To test the service, run the following command:

```bash
dotnet test
```

Otherwise, you can follow instructions for running in the docker-compose path by looking at the root directory readme file.
