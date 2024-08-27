#!/bin/bash
echo "Creating database demodb and user demo"
psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE USER demo password 'password';
    CREATE DATABASE demodb;
    GRANT ALL PRIVILEGES ON DATABASE demodb TO demo;
    ALTER DATABASE demodb OWNER TO demo;
EOSQL
