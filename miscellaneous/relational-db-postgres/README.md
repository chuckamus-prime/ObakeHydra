# relational-db-postgres

This module provides a PostgreSQL database for use in other modules. It is based on the official PostgreSQL Docker image. The database is initialized with a default database and user and nothing else.

## ports

The port 5008 is used for postgresSql db connections, typically this would be 5432 but we are using 5008 to avoid conflicts with other services and stay in the range for ObakeHydra

## default user and passwords

just to demonstrate the access and that things are working, we are setting the user names and passwords through the docker-compose file and a init shell script. This should be changed for your own use case.

### the postgres database user and passwords

- user: demo
- password: password

If you want to change these, you will want to update the init-demo-db.sh file and perhaps the docker-compose.yml file.

## usage

If you happen to have pgAdmin, use the config and credentials below when you add a new server:

| Field | Value |
| --- | --- |
| Name | relational-db-postgres |
| Host name/address | relational-db-postgres-host |
| Port | 5008 |
| Username | demo |
| Password | password |
