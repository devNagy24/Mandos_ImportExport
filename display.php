<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Players Data</title>
</head>
<body>
<div class="container mt-5">
    <h1>Players Data</h1>
    <a href="export.php" class="btn btn-success mb-3">Export Data</a>
    <!-- ... (table HTML) ... -->

    <?php if (isset($_SESSION['players_data'])): ?>
        <table class="table">
            <thead>
            <tr>
                <?php foreach ($_SESSION['players_data'][1] as $header): ?>
                    <th><?= htmlspecialchars($header) ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach (array_slice($_SESSION['players_data'], 1) as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?= htmlspecialchars($cell) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data available. <a href="index.php">Import data</a></p>
    <?php endif; ?>
</div>
</body>
</html>
