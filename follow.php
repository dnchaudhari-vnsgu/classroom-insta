<?php
include 'connection.php';

$current_user = $_SESSION['user_id'];
$target = intval($_GET['user_id']);
$action = $_GET['action'];

if ($action == 'follow') {
    $conn->query("INSERT INTO followers (user_id, follower_id) VALUES ($target, $current_user)");
} elseif ($action == 'unfollow') {
    $conn->query("DELETE FROM followers WHERE user_id = $target AND follower_id = $current_user");
}
header("Location: profile.php?user_id=$target");
?>
