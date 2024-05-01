<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zad3</title>
</head>
<body>
<form action="" method="get">
    <label for="path">Ścieżka katalogu:</label>
    <input type="text" name="path" id="path" required>

    <label for="directory">Nazwa katalogu:</label>
    <input type="text" name="directory" id="directory" required>

    <label for="operation">Operacja:</label>
    <select name="operation" id="operation">
        <option value="read" selected>Read</option>
        <option value="delete">Delete</option>
        <option value="create">Create</option>
    </select>
    <button type="submit">Wykonaj</button>
</form>

<?php
if (isset($_GET['path']) && isset($_GET['directory']) && isset($_GET['operation'])) {
    $path = $_GET['path'];
    $directory = $_GET['directory'];
    $operation = $_GET['operation'];

    if (substr($path, -1) !== "/") {
        $path .= "/";
    }
    operations($path, $directory, $operation);
}

function operations($path, $directory, $operation)
{
    $full_path = $path . $directory;

    if ($operation === "read") {
        if (!is_dir($full_path)) {
            echo "<p>Dana ścieżka nie istnieje.</p>";
            return;
        }
        $files = scandir($full_path);
        echo "<p>Zawartość katalogu '$directory':</p>";
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "<p>$file</p>";
            }
        }
    } elseif ($operation === "delete") {
        if (is_dir($full_path) && count(scandir($full_path)) <= 2) {
            rmdir($full_path);
            echo "<p>Usunięto katalog '$directory'.</p>";
        } else {
            echo "<p>Katalog '$directory' nie jest pusty lub nie istnieje.</p>";
        }
    } elseif ($operation === "create") {
        if (is_dir($full_path)) {
            echo "<p>Dana ścieżka już istnieje.</p>";
        } else {
            mkdir($full_path);
            echo "<p>Utworzono katalog '$directory'.</p>";
        }
    }
}

?>
</body>
</html>