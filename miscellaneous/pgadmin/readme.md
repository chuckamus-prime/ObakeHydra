# pgadmin

This module provides a PGAdmin for database management. Look in the root of the repository for the docker-compose file to see the details.

## ports

The port 5009 is used for pgAdmin connections, which would typically be 80 because PgAdmin is a web app to connect to the database

## default user and passwords

just to demonstrate the access and that things are working, we are setting the user names and passwords through the docker-compose file. This should be changed for your own use case.

### the pgAdmin user and passwords

- user: admin@pgadmin.com
- password: password

## usage

Once you log in to pgAdmin with the credentials above, you can add a new server if you know the credentials.
