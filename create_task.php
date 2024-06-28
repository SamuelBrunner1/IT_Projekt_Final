<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script type='text/javascript'>alert('Error: User not logged in'); window.location.href='login.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neue Aufgabe erstellen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                alert('Aufgabe erfolgreich erstellt!');
            }
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Meine Webseite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_task.php">Create New Task</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="todolist.php">Show Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calendar.php">Kalender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="imprint.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.php">Hilfe</a>
            </li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Registrieren</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
    <div class="container">
        <h1>Neue Aufgabe erstellen</h1>
        <form action="save_task.php" method="post">
            <div class="form-group">
                <label for="task_type">Aufgabentyp:</label>
                <select id="task_type" name="task_type" class="form-control" required>
                    <option value="business">Geschäftlich</option>
                    <option value="private">Privat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="task_name">Aufgabenname:</label>
                <input type="text" id="task_name" name="task_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="task_date">Datum:</label>
                <input type="date" id="task_date" name="task_date" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Aufgabe erstellen">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
