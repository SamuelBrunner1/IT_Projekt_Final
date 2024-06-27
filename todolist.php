<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script type='text/javascript'>alert('Error: User not logged in'); window.location.href='login.html';</script>";
    exit;
}

$servername = "127.0.0.1";  // Localhost IP address
$username = "root";  // MySQL username
$password = "";  // MySQL password (empty in this case)
$dbname = "todolistesnnl";  // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch tasks from the database
$sql = "SELECT id, task_type, task_name, task_date, completed FROM tasks";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do Liste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Meine Webseite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="create_task.php">Create New Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="todolist.php">Show Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Registrieren</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>To-Do Liste</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Typ</th>
                    <th>Aufgabenname</th>
                    <th>Datum</th>
                    <th>Status</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['task_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['task_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['task_date']); ?></td>
                            <td><?php echo $row['completed'] ? 'Erledigt' : 'Offen'; ?></td>
                            <td>
                                <form action="update_task.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="completed" value="<?php echo $row['completed'] ? 0 : 1; ?>">
                                    <button type="submit" class="btn btn-sm btn-success"><?php echo $row['completed'] ? 'Mark as Open' : 'Mark as Completed'; ?></button>
                                </form>
                                <form action="delete_task.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Löschen</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Keine Aufgaben gefunden.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
