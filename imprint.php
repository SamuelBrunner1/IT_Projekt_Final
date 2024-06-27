<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
    <h1>Impressum</h1>
    <p>Diese Website wurde von folgenden Entwicklern erstellt:</p>
    <ul>
        <li>Entwickler 1: Samuel Brunner</li>
        <li>Entwickler 2: Nikita Pussliuc</li>
        <li>Entwickler 3: Leon Friedl</li>
        <li>Entwickler 4: Nikolaus Kment</li>
        <li>Entwickler 5: Tobias Wydra</li>
    </ul>

    <h2>Unternehmensinformationen</h2>
    <p>Name des Unternehmens oder Verantwortlichen: SNNLT GmbH</p>
    <p>Adresse: Höchstädtplatz, 1200 Wien</p>
    <p>Kontakt: <a href="mailto:nikolaus@gmail.com">nikolaus@gmail.com</a>, Telefon: +43 0660 123 456</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
