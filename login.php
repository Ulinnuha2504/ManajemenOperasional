<?php
session_start();
include 'config/database.php';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi sederhana
    if (empty($email) || empty($password)) {
        echo "Email dan password wajib diisi";
    } else {

        // Prepared statement (AMAN)
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            echo "Login gagal";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card shadow">
<div class="card-body">

<h4 class="text-center mb-3">Login</h4>

<form method="POST">

<input type="email" name="email" class="form-control mb-2" placeholder="Email">

<input type="password" name="password" class="form-control mb-2" placeholder="Password">

<button name="login" class="btn btn-primary w-100">Login</button>

</form>

</div>
</div>

</div>
</div>
</div>

</body>
</html>