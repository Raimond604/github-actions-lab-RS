<?php require __DIR__ . '/db.php';

try {
    $stmt = $pdo->query('SELECT id, name, email FROM students');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Błąd podczas pobierania danych: ' . htmlspecialchars($e->getMessage()));
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>UWB – testowa aplikacja PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: system-ui, -apple-system, Segoe UI, sans-serif; padding: 24px; background: #0f172a; color: #e5e7eb; }
        h1 { margin-bottom: 8px; }
        .info { margin-bottom: 16px; font-size: 14px; color: #9ca3af; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; background: #020617; }
        th, td { border: 1px solid #1f2937; padding: 8px 12px; text-align: left; }
        th { background: #111827; }
        tr:nth-child(even) { background: #020617; }
        tr:nth-child(odd) { background: #030712; }
    </style>
</head>
<body>
    <h1>Testowa aplikacja UWB (PHP + MySQL)</h1>

    <div class="info">
        Połączenie z bazą: host =
        <strong><?= htmlspecialchars($DB_HOST ?? '') ?></strong>,
        baza = <strong><?= htmlspecialchars($DB_NAME ?? '') ?></strong>
    </div>

    <?php if (empty($rows)): ?>
        <p>Brak danych w tabeli <code>students</code>.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię i nazwisko</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
