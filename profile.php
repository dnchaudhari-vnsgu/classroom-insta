<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];
$view_user = intval($_GET['user_id']);

// Get user info
$user = $conn->query("SELECT * FROM users WHERE id = $view_user")->fetch_assoc();
$pic = $user['profile_pic'] ? "<img src='{$user['profile_pic']}' width='50'>" : "";
echo "<h2>Profile: $pic {$user['username']}</h2>";

// Follow/unfollow
if ($view_user != $current_user) {
    $check = $conn->query("SELECT * FROM followers WHERE user_id = $view_user AND follower_id = $current_user");
    if ($check->num_rows > 0) {
        echo "<a href='follow.php?action=unfollow&user_id=$view_user'>Unfollow</a><br>";
    } else {
        echo "<a href='follow.php?action=follow&user_id=$view_user'>Follow</a><br>";
    }
}

// Show posts
$res = $conn->query("SELECT * FROM posts WHERE user_id = $view_user ORDER BY created_at DESC");
echo "<h3>Posts</h3>";
echo "<table border='1' width='100%'>";
while ($p = $res->fetch_assoc()) {
    echo "<tr><td>{$p['content']} <i>({$p['created_at']})</i></td></tr>";
}
echo "</table>";
?>
