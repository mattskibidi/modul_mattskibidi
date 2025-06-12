<?php
sessioen_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM sbsp WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = ($user["level"] == 1) ? "admin" : "user";
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <h2>Login Sistem</h2>
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="text" name="password" required><br><br>
        <input type="text" value="login">
    </form>
</body>
</html>