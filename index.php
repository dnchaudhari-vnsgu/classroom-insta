<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];

$sql = "SELECT p.content, u.username, u.profile_pic, p.created_at
        FROM posts p
        JOIN users u ON p.user_id = u.id
        WHERE p.user_id IN (
            SELECT user_id FROM followers WHERE follower_id = $current_user
            UNION SELECT $current_user
        )
        ORDER BY p.created_at DESC";
$result = $conn->query($sql);

echo "<h2>Feed</h2>";
echo "<table border='1' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $pic = $row['profile_pic'] ? "<img src='{$row['profile_pic']}' width='30'>" : "";
    echo "<tr><td>$pic <b>{$row['username']}</b>: {$row['content']} <i>({$row['created_at']})</i></td></tr>";
}
echo "</table>";
?>
