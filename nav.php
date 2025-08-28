<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo '<table border="1" width="100%">
<tr>
<td><a href="index.php">Home</a></td>
<td><a href="profile.php?user_id='.$_SESSION['user_id'].'">My Profile</a></td>
<td><a href="post.php">New Post</a></td>
<td><a href="logout.php">Logout</a></td>
</tr>
</table>';
?>
