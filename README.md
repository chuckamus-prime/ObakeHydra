# ObakeHydra

The shape-shifting amalgamation of technologies shown in cooperation, for model architectures.

## How To Build and Run

This service can be built and ran locally on a developers workstation, it can also run in a container on the developers
workstation, and it can be deployed as a container into the container platform. In addition, the services (located in /services) can be started
with the IDE to debug on a workstation.

### Instructions

#### Startup

To build the environment, at the root folder execute the following:

``` shell
docker-compose up -d --build --force-recreate
```

The `--build` and `--force-recreate` are optional, but will ensure that the image is rebuilt and the container is recreated.

The `-d` is also optional, but will run the containers in the background. If you do not use `-d`, then the terminal will be attached to the container and you will see the output of the container.
This will start the following as containers:

- the app service
- the relational database
- the pgadmin gui for the database
- the redis cache

In the process of building and deploying the container for the app service, it will also run all tests.

To test the api in a browser and chose which link applies to how you deployed it:

- if deploying locally not in a container:
  - <http://localhost:5000/> (port number as defined in App/properties/launchSettings.json)
- if deploying locally in a container:
  - <http://localhost:8080/> (port number as defined within the docker-compose.yaml file)
- if deploying in the container env:
  - (too complicated to explain. ask your devops team!)

The swagger ui gives you the ability to execute HTTP actions directly on the page.

#### Stopping

To stop the environment containers, run the following command:

``` shell
docker-compose down
```

### Running with dapr locally

here is a command to run or debug the app(s) locally with the dapr sidecar in docker:

``` shell
docker-compose -f docker-compose.debug.yaml up --build --force-recreate -d 
```

Next, you can run your app or run in debug mode from your IDE. The app(s) will be running on ports defined in their readmes. If you dapr service is running, then your app(s) will automatically link up with the dapr sidecar.

to stop the containers:

``` shell
docker-compose -f docker-compose.debug.yaml down
```

## notes on dapr

The intent is to add dapr where necessary. More to follow on this. Read up on dapr at <https://dapr.io>.
