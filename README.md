# ObakeHydra

'Obake' is a Japanese term for a shape-shifting creature, and 'Hydra' is a creature from Greek mythology that has many heads. This project is a shape-shifting amalgamation of technologies shown in cooperation, for model architectures. As we build and add more variations, with changing technologies, often even more possibilities are revealed. The intent is to show how different technologies can be used together in a greater systems architecture. Sometimes, however, all you need is some example of technologies working in concert.

## How To Build and Run

This project has services that can be built and ran locally on a developers workstation, it can also run in a container on the developers
workstation, and it can be deployed as containers into the container platform. In addition, the services (located in /services) can be started
with the IDE to debug on a workstation.

### Dependencies

You could just install docker toolbox and docker-compose. After that, each service and technologies may have their own dependencies.

### Instructions

#### Startup

To build the environment, at the root folder execute the following:

``` shell
docker-compose up -d --build --force-recreate
```

The `--build` and `--force-recreate` are optional, but will ensure that the image is rebuilt and the container is recreated.

The `-d` is also optional, but will run the containers in the background. If you do not use `-d`, then the terminal will be attached to the container and you will see the output of the container.

#### Stopping

To stop the environment containers, run the following command:

``` shell
docker-compose down --remove-orphans 
```

## The Menu of technologies

All the variations of the ObakeHydra will be in distinct branches for maintainability. Where possible, common components may have a "base" branch to help maintain down-stream variations of the Obake.

## Services

All the variations of the ObakeHydra will be in distinct branches for maintainability. Where possible, common components may have a "base" branch to help maintain down-stream variations of the Obake.
The services and technologies used in this project are as follows:

| Service | Description | Technologies | Ports | Notes |
| --- | --- | --- | --- | --- |
| go-api-svc | A golang service api with a simple api structure GoLang is quite performant. | | 5000 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/go-api-svc), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/go-api-svc/services/go-api-svc) |
| go-api-svc-dapr | A golang service api with a simple api structure GoLang is quite performant. | Dapr | | |
| nodejs-svc | A nodejs (typescript) service that starts and then ends. | | | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-svc), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-svc/services/nodejs-svc) |
| nodejs-api-svc-express | A nodejs (typescript) service api with a simple api structure | expressjs | 5002 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-express), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-express/services/nodejs-api-svc-express) |
| nodejs-api-svc-svelte | A nodejs (typescript) service api with a simple api structure | svelte | | |
| nodejs-api-svc-nestjs | A nodejs (typescript) service api with a simple api structure | nestjs | | |
| nodejs-api-svc-express-dapr | A nodejs (typescript) service api with a simple api structure | expressjs, Dapr | | |
| nodejs-api-svc-svelte-dapr | A nodejs (typescript) service api with a simple api structure | svelte, Dapr | | |
| nodejs-api-svc-nestjs-dapr | A nodejs (typescript) service api with a simple api structure | nestjs, Dapr | | |
| dotnet-svc | A dotnet core service that starts and stops. | | | |
| dotnet-svc-dapr | A dotnet core service that starts and stops.  | Dapr | | |
| dotnet-api-svc | A dotnet core service api with a simple api structure | | | |
| dotnet-api-svc-dapr | A dotnet core service api with a simple api structure | Dapr | | |
| jvm-springboot-api-svc | A java (springboot) service api with a simple api structure | Apache Maven | | |
| jvm-quarkus-api-svc | A java (quarkus) service api with a simple api structure | Apache Maven | | |
| jvm-springboot-api-svc-dapr | A java (springboot) service api with a simple api structure | Apache Maven, Dapr | | |
| jvm-quarkus-api-svc-dapr | A java (quarkus) service api with a simple api structure | Apache Maven, Dapr | | |
| python-svc | A python service that starts and stops. | | | |
| python-svc-dapr | A python service that starts and stops.  | Dapr | | |
| python-api-svc | A python service api with a simple api structure | Flask | | |
| python-api-svc-dapr | A python service api with a simple api structure | Flask, Dapr | | |
| rust-svc | A rust service that starts and stops. | | | |
| rust-svc-dapr | A rust service that starts and stops.  | Dapr | | |
| rust-api-svc | A rust service api with a simple api structure | | | |
| rust-api-svc-dapr | A rust service api with a simple api structure | Dapr | | |

## Miscellaneous

In addition to the above, there are some other technologies that could be used, but are broken out into a separate category, as they could be defined as "infrastructure" or "support" services. These are:

| Infrastructure Name | Description | Technologies | Ports | Notes |
| --- | --- | --- | --- | --- |
| redis-cache | A simple Redis cache | | | |
| redis-streams | A configured redis streams instance | | | |
| pgadmin | A pgadmin gui for the database | | | |
| relational-db-postgres | A postgres relational database | | | |
| relational-db-sqlserver | A Sql Server relational database | | | |
| graphql-hasura | A graphQL config host. | Hasura | | |
| messaging-rabbitmq | A RabbitMQ instance | | | |
| messaging-activemq | A ActiveMQ instance | | | |
| messaging-kafka | A Kafka instance | | | |
| messaging-nats | A NATS instance | | | |
| integration-camel | An Apache Camel instance | | | |

## links to technologies, frameworks, etc used above

- [GoLang](https://golang.org/)
- [NodeJS](https://nodejs.org/)
- [ExpressJS](https://expressjs.com/)
- [Svelte](https://svelte.dev/)
- [NestJS](https://nestjs.com/)
- [DotNet Core](https://dotnet.microsoft.com/)
- [Java](https://www.java.com/)
- [SpringBoot](https://spring.io/projects/spring-boot)
- [Quarkus](https://quarkus.io/)
- [Dapr](https://dapr.io/)
- [Apache Maven](https://maven.apache.org/)
- [Python](https://www.python.org/)
- [Flask](https://flask.palletsprojects.com/)
- [Rust](https://www.rust-lang.org/)
- [Redis](https://redis.io/)
- [Redis Streams](https://redis.io/topics/streams)
- [Postgres](https://www.postgresql.org/)
- [Sql Server](https://www.microsoft.com/en-us/sql-server)
- [Hasura](https://hasura.io/)
- [RabbitMQ](https://www.rabbitmq.com/)
- [ActiveMQ](https://activemq.apache.org/)
- [Kafka](https://kafka.apache.org/)
- [NATS](https://nats.io/)
- [Apache Camel](https://camel.apache.org/)
- [GraphQL](https://graphql.org/)
- [pgAdmin](https://www.pgadmin.org/)
