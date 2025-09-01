<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];

$sql = "SELECT * from posts where id={$_GET['post_id']}";
$result = $conn->query($sql);

echo "<h2>Post</h2>";
echo "<table border='1' width='100%'>";
while ($row = $result->fetch_assoc()) {
    
    echo "<tr><td> {$row['content']}</td></tr>";
}
echo "</table>";
?>
