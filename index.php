<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Import Players</title>
</head>
<body>
<div class="container mt-5">
    <h1>Import Players</h1>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="playersFile">Upload Excel File</label>
            <input type="file" class="form-control-file" id="playersFile" name="playersFile" accept=".xlsx" required>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>
</body>
</html>
