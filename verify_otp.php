<?php
include "db.php";

$email = $_GET['email'];

if (isset($_POST['verify'])) {

    $otp = $_POST['otp'];

    $sql = "SELECT * FROM user WHERE email='$email' AND otp='$otp'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        mysqli_query($conn, "UPDATE user SET is_verified=1 WHERE email='$email'");

        echo "Email auth successfully";
        header("Location: login.php");

    } else {

        echo "Invalid OTP";

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify OTP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
}
</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="card shadow-lg p-4 w-100" style="max-width: 400px; border-radius: 15px;">

        <div class="text-center mb-4">
            <h4 class="fw-bold">OTP Verification</h4>
            <p class="text-muted">Enter the code sent to your email</p>
        </div>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">OTP Code</label>
                <input type="text" name="otp" class="form-control text-center" placeholder="Enter OTP" required>
            </div>

            <button name="verify" class="btn btn-success w-100">
                Verify
            </button>

        </form>

    </div>

</div>

</body>
</html>