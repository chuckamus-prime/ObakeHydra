<?php
// per this repo's convention, every service exposes /api/health returning
// a 200 so it can be checked/probed (e.g. by a container healthcheck).
header('Content-Type: application/json');
http_response_code(200);
echo json_encode([
    'status' => 'ok',
    'service' => 'php',
    'phpVersion' => PHP_VERSION,
    'sapi' => php_sapi_name(),
]);
