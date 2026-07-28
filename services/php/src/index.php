<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ObakeHydra &middot; php demo</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php include __DIR__ . '/nav.php'; ?>
    <main>
        <h2>Home</h2>
        <p>
            This is a plain PHP site with <strong>no build/compilation step</strong>.
            nginx serves static assets directly and forwards anything ending in
            <code>.php</code> to php-fpm over FastCGI &mdash; both processes run in
            this same container, supervised by <code>supervisord</code>.
        </p>
        <p>
            Rendered by PHP <?= htmlspecialchars(PHP_VERSION) ?> via the
            <?= htmlspecialchars(php_sapi_name()) ?> SAPI at
            <?= htmlspecialchars(date('Y-m-d H:i:s')) ?> (container time).
        </p>
        <p>Try the health check: <a href="/api/health">/api/health</a></p>
    </main>
</body>
</html>
