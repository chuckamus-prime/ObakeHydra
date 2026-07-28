<?php
// per this repo's convention, every service exposes /api/health returning
// a 200 so it can be checked/probed (e.g. by a container healthcheck). Since
// this app depends on SQL Server, the check also confirms the database is
// reachable, per the same convention: a healthy dependency should be part
// of what /api/health verifies.
require __DIR__ . '/../db.php';

header('Content-Type: application/json');

try {
    $pdo = get_pdo();
    $pdo->query('SELECT 1');
    $dbStatus = 'ok';
    $httpCode = 200;
} catch (Throwable $e) {
    $dbStatus = 'error';
    $httpCode = 503;
}

http_response_code($httpCode);
echo json_encode([
    'status' => $httpCode === 200 ? 'ok' : 'degraded',
    'service' => 'php-nginx-sqlserver',
    'phpVersion' => PHP_VERSION,
    'sapi' => php_sapi_name(),
    'database' => $dbStatus,
]);
