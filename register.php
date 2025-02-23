<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "zidon");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Handle Profile Picture Upload
    $profile_pic = "default.jpg"; 
    if (!empty($_FILES["profile_pic"]["name"])) {
        $target_dir = "uploads/";
        $profile_pic = time() . "_" . basename($_FILES["profile_pic"]["name"]);
        $target_file = $target_dir . $profile_pic;
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
    }

    $sql = "INSERT INTO users (username, email, password, profile_pic) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $profile_pic);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
    <form action="register.php" method="POST" enctype="multipart/form-data">
            <h2>Register with us</h2>
            <div class="form-control">
                <label for="username" id="usernameLabel">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter username" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="email" id="label">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter email" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="password" id="passwordlabel">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="password2" id="password2label">Confirm Password</label>
                <input type="password" name="password" id="password2" placeholder="Enter password again"  required>
                <small>Error Message</small>
            </div>
            <input type="file" name="profile_pic" accept="image/*"><br>
            <button type="submit" id="submit">Register</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
