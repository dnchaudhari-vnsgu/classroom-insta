<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $conn->real_escape_string($_POST['content']);
    $conn->query("INSERT INTO posts (user_id, content) VALUES ($current_user, '$content')");
    echo "Post added! <a href='index.php'>Go Home</a>";
    exit;
}
?>
<h2>New Post</h2>
<form method="post">
    <textarea name="content" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Post">
</form>
