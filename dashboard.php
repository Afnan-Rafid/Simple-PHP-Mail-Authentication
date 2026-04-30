<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">
        
        <div class="d-flex justify-content-between align-items-center">
            <h4>Welcome, <?php echo $_SESSION['username']; ?> 👋</h4>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>

        <hr>

        <p>This is your dashboard.</p>

    </div>

</div>

</body>
</html>