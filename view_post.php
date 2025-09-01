<?php
include 'connection.php';
include 'nav.php';

$current_user = $_SESSION['user_id'];

$sql = "SELECT posts.*, users.username, users.profile_pic 
        FROM posts 
        JOIN users ON posts.user_id = users.id 
        WHERE posts.id = {$_GET['post_id']}";
echo $sql;
$result = $conn->query($sql);

echo "<h2>Post</h2>";
echo "<table border='1' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $pic = $row['profile_pic'] ? "<img src='{$row['profile_pic']}' width='30'>" : "";
    echo "<tr><td>$pic : {$row['content']}</td></tr>";
}
echo "</table>";
echo "<br><br><textarea id='comment' placeholder='comment here'> </textarea> <br><button>Add comment</button>"; 
?>
