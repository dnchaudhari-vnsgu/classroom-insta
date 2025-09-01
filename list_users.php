<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];

$sql = "SELECT * from users";
$result = $conn->query($sql);

echo "<h2>Explore</h2>";
echo "<table border='1' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $pic = $row['profile_pic'] ? "<img src='{$row['profile_pic']}' width='30'>" : "";
    echo "<tr><td>$pic <a href='profile.php?user_id={$row['id']}'><b>{$row['username']}</b></a></td></tr>";
}
echo "</table>";
?>
