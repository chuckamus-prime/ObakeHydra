<?php
// Connection helper for the SQL Server-backed todo app.
//
// Connection settings come entirely from environment variables (wired up in
// the root docker-compose.yaml), with sensible local-dev defaults as a
// fallback. On first connection, the target database and the `todos` table
// are created if they don't already exist, so this demo needs no separate
// migration/init step.

function get_pdo(): PDO
{
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $host = getenv('DB_HOST') ?: 'relational-db-sqlserver-host';
    $port = getenv('DB_PORT') ?: '1433';
    $dbName = getenv('DB_NAME') ?: 'tododb';
    $user = getenv('DB_USER') ?: 'sa';
    $pass = getenv('DB_PASSWORD') ?: 'P@ssw0rd';

    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $dsnBase = "sqlsrv:Server=$host,$port;Encrypt=yes;TrustServerCertificate=yes";

    // Connect without selecting a database first, so we can create it if
    // it doesn't exist yet (a fresh SQL Server container only has the
    // system databases).
    $bootstrap = new PDO($dsnBase, $user, $pass, $options);
    $bootstrap->exec(
        "IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = " . $bootstrap->quote($dbName) . ") " .
        "EXEC('CREATE DATABASE [" . $dbName . "]')"
    );
    $bootstrap = null;

    $pdo = new PDO("$dsnBase;Database=$dbName", $user, $pass, $options);
    $pdo->exec("
        IF OBJECT_ID('dbo.todos', 'U') IS NULL
        CREATE TABLE dbo.todos (
            id INT IDENTITY(1,1) PRIMARY KEY,
            title NVARCHAR(200) NOT NULL,
            is_done BIT NOT NULL DEFAULT 0,
            created_at DATETIME2 NOT NULL DEFAULT SYSUTCDATETIME()
        )
    ");

    return $pdo;
}
