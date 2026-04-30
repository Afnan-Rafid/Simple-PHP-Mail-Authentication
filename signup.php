<?php
include "db.php";
include "send_mail.php";

if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $otp = rand(100000, 999999);

    $sql = "INSERT INTO user(name,email,password,otp)
            VALUES('$name','$email','$password','$otp')";

    if (mysqli_query($conn, $sql)) {

        sendMail($email, "OTP Verification", "Your OTP is: $otp");

        header("Location: verify_otp.php?email=$email");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold">Create Account</h3>
            <p class="text-muted">Sign up to continue</p>
        </div>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button class="btn btn-primary w-100" name="signup">Sign Up</button>

        </form>

        <div class="text-center mt-3">
            <small>Already have an account? <a href="login.php">Login</a></small>
        </div>

    </div>

</div>

</body>
</html>