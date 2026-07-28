<?php
// A deliberately simple todo app: no authentication, no CSRF protection,
// no client-side framework. It exists to demonstrate PHP talking to SQL
// Server through the sqlsrv/pdo_sqlsrv drivers, nothing more.
require __DIR__ . '/db.php';

$pdo = get_pdo();

$action = $_POST['action'] ?? null;

if ($action === 'add') {
    $title = trim($_POST['title'] ?? '');
    if ($title !== '') {
        $stmt = $pdo->prepare('INSERT INTO dbo.todos (title) VALUES (:title)');
        $stmt->execute(['title' => $title]);
    }
    header('Location: /');
    exit;
}

if ($action === 'toggle') {
    $id = (int) ($_POST['id'] ?? 0);
    $stmt = $pdo->prepare('UPDATE dbo.todos SET is_done = CASE WHEN is_done = 1 THEN 0 ELSE 1 END WHERE id = :id');
    $stmt->execute(['id' => $id]);
    header('Location: /');
    exit;
}

if ($action === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    $stmt = $pdo->prepare('DELETE FROM dbo.todos WHERE id = :id');
    $stmt->execute(['id' => $id]);
    header('Location: /');
    exit;
}

$todos = $pdo->query('SELECT id, title, is_done, created_at FROM dbo.todos ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ObakeHydra &middot; php + nginx + SQL Server todo</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<header>
    <h1>ObakeHydra &middot; todo (php + nginx + php-fpm + SQL Server)</h1>
</header>
<main>
    <p>
        A plain PHP todo app with <strong>no login/security</strong> &mdash; it
        exists purely to demonstrate PHP talking to SQL Server via the
        <code>pdo_sqlsrv</code> driver. Rendered by PHP
        <?= htmlspecialchars(PHP_VERSION) ?> (<?= htmlspecialchars(php_sapi_name()) ?>).
    </p>

    <form method="post" action="/index.php" class="add-form">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="What needs doing?" required autofocus>
        <button type="submit">Add</button>
    </form>

    <ul class="todo-list">
        <?php foreach ($todos as $todo): ?>
            <li class="<?= $todo['is_done'] ? 'done' : '' ?>">
                <form method="post" action="/index.php" class="toggle-form">
                    <input type="hidden" name="action" value="toggle">
                    <input type="hidden" name="id" value="<?= (int) $todo['id'] ?>">
                    <button type="submit" class="toggle-btn" title="Toggle done">
                        <?= $todo['is_done'] ? '&#9745;' : '&#9744;' ?>
                    </button>
                </form>
                <span class="title"><?= htmlspecialchars($todo['title']) ?></span>
                <form method="post" action="/index.php" class="delete-form">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= (int) $todo['id'] ?>">
                    <button type="submit" class="delete-btn" title="Delete">&times;</button>
                </form>
            </li>
        <?php endforeach; ?>
        <?php if (!$todos): ?>
            <li class="empty">Nothing to do yet &mdash; add something above.</li>
        <?php endif; ?>
    </ul>

    <p>Health check: <a href="/api/health">/api/health</a></p>
</main>
</body>
</html>
