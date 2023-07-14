<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include 'connect.php';

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row_count = mysqli_num_rows($result);

    if ($row_count == 1) {
        // Login berhasil
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();
    } else {
        // Login gagal
        $error_message = "Username atau password salah.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {

    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #778899;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #D3D3D3;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #BC8F8F;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #F08080;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Untuk Kepala Jorong</h1>

        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <form method="GET" action="dashboard.php">
            <input type="submit" value="Warga">
        </form>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="?action=logout">Logout</a>
        <?php endif; ?>
    </div>
</body>
</html>

