# relational-db-sqlserver

This is a relational database service that uses Microsoft SQL Server. There is a "database-data" folder for preserving the data state. Scripts for creating the database schema (and seeding the database) can be added to the relational-db-sqlserver folder.

## credentials

The default credentials are entered on the root docker-compose.yml file. The default credentials are:

- **Username**: sa
- **Password**: P@ssw0rd

## Ports

The default port is 1433 for SQL Server, but we are mapping it to 5012 for use in our ObakeHydra project just to avoid conflicts with other services.
