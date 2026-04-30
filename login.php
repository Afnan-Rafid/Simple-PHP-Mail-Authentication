<?php
session_start();
include('db.php');

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_assoc($query);

        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

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
            <h3 class="fw-bold">Welcome Back</h3>
            <p class="text-muted">Login to your account</p>
        </div>

        <?php if(isset($error)) { ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">
                Login
            </button>

        </form>

        <div class="text-center mt-3">
            <small>
                Don't have an account? 
                <a href="signup.php" class="text-decoration-none">Sign up</a>
            </small>
        </div>

    </div>

</div>

</body>
</html>