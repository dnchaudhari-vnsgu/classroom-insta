<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']);

    // Handle profile pic upload
    $profile_pic = NULL;
    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir);
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
        $profile_pic = $target_file;
    }

    $conn->query("INSERT INTO users (username, password, profile_pic) VALUES ('$username', '$password', '$profile_pic')");
    echo "Registration successful. <a href='login.php'>Login here</a>";
    exit;
}
?>

<h2>Register</h2>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Profile Picture: <input type="file" name="profile_pic"><br>
    <input type="submit" value="Register">
</form>
