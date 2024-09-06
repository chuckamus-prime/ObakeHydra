# ObakeHydra

'Obake' is a Japanese term for a shape-shifting creature, and 'Hydra' is a creature from Greek mythology that has many heads. This project is a shape-shifting amalgamation of technologies shown in cooperation, for model architectures. As we build and add more variations, with changing technologies, often even more possibilities are revealed. The intent is to show how different technologies can be used together in a greater systems architecture. Sometimes, however, all you need is some example of technologies working in concert.

## What this project is not

- it <b>is not</b> a tutorial on how to use the individual technologies. The readme's hopefully will do a good job of pointing you in the right direction for that. It <b>is</b> a demonstration of how combining them and getting bootstrapped with them working together can be done.
- it <b>is does not</b> take an opinionated stance on working with the technologies.
- it <b>is not</b> intended to be a best practice guide.
- it <b>is not</b> going to include all the things that you would need to make a production ready system, even using the technologies that is shows. For example, you will need to chose how you may have to chose your unit test frameworks.
- it <b>is not</b> going to be in-line with how you would want to structure your project file system for a production system. The structure is the way it is to organize the set of technologies and combinations.

For those things that this project <b>is not</b>, you will certainly find a million opinions and ideas and pontification on what is "best practice" on the internet and in books. Do your own research, and arrive at your own conclusions. This project is intended to be a starting point for you to explore the technologies and how they can work together and help you overcome the initial setup and linking ...frustrations.

## What are some common starting points?

All the components of this project are going to work with docker and docker compose. Docker compose lets us stand up a suite of things TOGETHER which is what we want. By being "container-first" with everything, we can:

- be prepared to deploy services into container platforms like Kubernetes, OpenShift, etc.
- be prepared to run services on a developer's workstation.
- help assure that everyone's environment is the as identical as possible.
- help assure that the services are isolated from each other.
- help prepare for the services to be scaled if possible
- demonstrate some of the common things constraints that you may experience if you try to combine these technologies elsewhere (outside of docker)
- demonstrate modular architecture

Also, any API we build should at the very least to demonstrate that it is up and alive, have a /api/health endpoint that returns a 200 status code. This is a common pattern in microservices and is a good way to demonstrate that the service is up and running. This is also typically a "secured" endpoint, so it is an easy one to make common for us to place. Other than APIs, other possible things we can add to show that things are really working may be put in. Just read up on the technologies readme in it's folder to find out.

The healthcheck should also show that the service's dependencies are also up and running. For example, if a service depends on a database, the healthcheck 200 status should also mean that the database is up and running and accessible. This is a common practice and we will do that as much as possible.

## Repo structure, purposes

This repo is structured to help me build out the various technologies and services that I want to show.

### main

`main` is the branch where the base of the project is, but no services. I will keep it like that so that I can update that branch, and then merge it down to the rest of the branches. 

### services

The `services/* branches` are where the demonstrations live. Within each of those branches, there is a services folder and it will contain that branch's individual service folder. There may be other root folder changes that relate to that service demonstration needs. Within the service's individual folder, more details can be found. There is a link to the readme for them on each line in the list below.

``` text
=============== example of service branch ===============

services/*       ->    ----.---.---.---.
                      /           /   
main             ->  .-----------.----
```

- Branches from `main` ONLY. <b>Never</b> merges back.
- Gets periodic updates from `main`.


### miscellaneous

The `miscellaneous/* branches` are where the infrastructure and support services live. Pretty much the same as the services branches, but for the infrastructure and support services. These branches may be able to demonstrate the infrastructure alone without "services" to integrate with. For example, a postgres folder may demonstrate postgres and a UI but have nothing else connecting to it. 
Within the miscellaneous item's individual folder, more details can be found. There is a link to the readme for them on each line in the list below.
``` text
============ example of miscellaneous branch ============

miscellaneous/*  ->    ----.-------.---.
                      /           /   
main             ->  .-----------.----
```

- Branches from `main` ONLY. <b>Never</b> merges back.
- Gets periodic updates from `main`.

### hydras

The `hydras/* branches` are where the combinations of services and technologies are demonstrated. The <u>idea</u> here is that, should a combination call for including this or that infrastructure all we have to do is:

- create a new branch under the `/hydras` branch path. Can source from any other branch that contains stuff you want in the new hydra.
- merge of any service, miscellaneous, or even other hydra branches into the <b>new</b> hydra branch
- configure a few things

...and TADA! we have shown how the technologies can work in combination. If more documentation is needed, we should include it under the proper sub-folders of they `/hydras` folder. There is a link to the branch for them on each line in the list below.


``` text

================ example of hydra branch ================

hydras/d         ->      -----------------.-.-.---.------
                        /                / / /
miscellaneous/c  ->    ----.--------.--. / /
                      /                 / /
services/b       ->  | ------.---.-----. /
                     |/                 /
services/a       ->  | ----.---.---.---.
                     |/              
main             ->  .----------------

```

- Can be a branch from main, `services/*` or `miscellaneous/*`, or even `hydras/*`. <b>Never</b> merges back.
- Gets periodic updates from all sources if necessary.



## How To Build and Run

This project has services that can be built and ran locally on a developers workstation, it can also run in a container on the developers
workstation, and it can be deployed as containers into the container platform. In addition, the services (located in /services) can be started with the IDE to debug on a workstation.

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

## The menu of technologies

All the variations of the ObakeHydra will be in distinct branches for maintainability (see above).

## Services

All the variations of the ObakeHydra will be in distinct branches for maintainability. Where possible, common components may have a "base" branch to help maintain down-stream variations of the Obake.
The services and technologies used in this project are as follows:

| Name | Description | Technologies | Ports | Notes |
| --- | --- | --- | --- | --- |
| go-api-svc | A golang service api with a simple api structure GoLang is quite performant. | | 5001 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/go-api-svc), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/go-api-svc/services/go-api-svc) |
| nodejs-svc | A nodejs (typescript) service that starts and then ends. | none | Typescript | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-svc), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-svc/services/nodejs-svc) |
| nodejs-api-svc-express | A nodejs (typescript) service api with a simple api structure | Typescript, ExpressJs | 5002 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-express), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-express/services/nodejs-api-svc-express) |
| nodejs-api-svc-sveltekit | A nodejs (typescript) service api with a simple api structure and some static web content. | Typescript, Svelte, Sveltekit, Vite | 5006 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-sveltekit), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/nodejs-api-svc-sveltekit/services/nodejs-api-svc-sveltekit) |
| nodejs-api-svc-nestjs | A nodejs (typescript) service api with a simple api structure | nestjs | | |
| dotnet-svc | A dotnet core service that starts and stops. | dotnet, c#, NUnit (testing) | none | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/services/dotnet-svc), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/services/dotnet-svc/services/dotnet-svc) |
| dotnet-api-svc | A dotnet core service api with a simple api structure | | | |
| jvm-springboot-api-svc | A java (springboot) service api with a simple api structure | Apache Maven | | |
| jvm-quarkus-api-svc | A java (quarkus) service api with a simple api structure | Apache Maven | | |
| python-svc | A python service that starts and stops. | | | |
| python-api-svc | A python service api with a simple api structure | Flask | | |
| rust-svc | A rust service that starts and stops. | | | |
| rust-api-svc | A rust service api with a simple api structure | | | |

## Miscellaneous

In addition to the above, there are some other technologies that could be used, but are broken out into a separate category, as they could be defined as "infrastructure" or "support" services. These are:

| Name | Description | Technologies | Ports | Notes |
| --- | --- | --- | --- | --- |
| dapr | The basic parts of a environment to support Dapr | Dapr | |  [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/dapr), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/dapr/miscellaneous/dapr/) |
| redis-stack | A Redis-Stack instance. | Redis | 5010, 5011| [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/redis-stack), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/redis-stack/miscellaneous/redis-stack/) |
| pgadmin | A pgadmin gui for the database | Postgres, PGAdmin | 5009 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/pgadmin), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/pgadmin/miscellaneous/pgadmin/) |
| relational-db-postgres | A postgres relational database | Postgres | 5008 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/relational-db-postgres), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/relational-db-postgres/miscellaneous/relational-db-postgres/) |
| relational-db-sqlserver | A Sql Server relational database | Microsoft SQL Server | 5012 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/relational-db-sqlserver), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/relational-db-sqlserver/miscellaneous/relational-db-sqlserver/) |
| graphql-hasura | A graphQL config host. | Hasura, Postgres | 5004,5005 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/graphql-hasura), [Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/miscellaneous/graphql-hasura/miscellaneous/graphql-hasura/) |
| messaging-rabbitmq | A RabbitMQ instance | | | |
| messaging-activemq | A ActiveMQ instance | | | |
| messaging-kafka | A Kafka instance | | | |
| messaging-nats | A NATS instance | | | |
| integration-camel | An Apache Camel instance | | | |
| integration-nifi | A NiFi instance | | | |
| hadoop | A Hadoop instance | | | |
| nginx | An Nginx instance | | | |

## Hydras

The following are the combinations of the services and technologies that are demonstrated in the branches of this project:

| Name | Description | Technologies | Ports | Notes |
| --- | --- | --- | --- | --- |
| postgres_pgadmin | A postgres database coupled with pgadmin gui for the database | Postgres, PGAdmin | 5008, 5009 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/hydras/postgres_pgadmin) |
| go-api-svc-dapr | A golang service api with a simple api structure, and dapr integration. | Dapr | 5001, 50006 | [Branch](https://github.com/chuckamus-prime/ObakeHydra/tree/hydras/go-api-svc-dapr), [Service Readme](https://github.com/chuckamus-prime/ObakeHydra/tree/hydras/go-api-svc-dapr/services/go-api-svc-dapr)|
| nodejs-api-svc-express-dapr | A nodejs (typescript) service api with a simple api structure | ExpressJs, Dapr | | |
| nodejs-api-svc-svelte-dapr | A nodejs (typescript) service api with a simple api structure | svelte, Dapr | | |
| nodejs-api-svc-nestjs-dapr | A nodejs (typescript) service api with a simple api structure | nestjs, Dapr | | |
| dotnet-svc-dapr | A dotnet core service that starts and stops.  | Dapr | | |
| dotnet-api-svc-dapr | A dotnet core service api with a simple api structure | Dapr | | |
| rust-svc-dapr | A rust service that starts and stops.  | Dapr | | |
| rust-api-svc-dapr | A rust service api with a simple api structure | Dapr | | |
| python-api-svc-dapr | A python service api with a simple api structure | Flask, Dapr | | |
| python-svc-dapr | A python service that starts and stops.  | Dapr | | |
| jvm-springboot-api-svc-dapr | A java (springboot) service api with a simple api structure | Apache Maven, Dapr | | |
| jvm-quarkus-api-svc-dapr | A java (quarkus) service api with a simple api structure | Apache Maven, Dapr | | |

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
- [PGAdmin](https://www.pgadmin.org/)
- [Sql Server](https://www.microsoft.com/en-us/sql-server)
- [Hasura](https://hasura.io/)
- [RabbitMQ](https://www.rabbitmq.com/)
- [ActiveMQ](https://activemq.apache.org/)
- [Kafka](https://kafka.apache.org/)
- [NATS](https://nats.io/)
- [Apache Camel](https://camel.apache.org/)
- [GraphQL](https://graphql.org/)
- [pgAdmin](https://www.pgadmin.org/)
- [Hadoop](https://hadoop.apache.org/)
- [NiFi](https://nifi.apache.org/)
- [Nginx](https://www.nginx.com/)

## License

This project is licensed under the MIT License - see the LICENSE file in the root of the project for details.
