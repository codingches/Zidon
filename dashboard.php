<?php
session_start();

// Check if user is NOT logged in, then redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// If logged in, allow access to the dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <img src="uploads/<?php echo isset($_SESSION['profile_pic']) ? htmlspecialchars($_SESSION['profile_pic']) : 'default.jpg'; ?>" alt="Profile Picture" width="100">
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
