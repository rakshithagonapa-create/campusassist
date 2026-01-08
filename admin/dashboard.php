<?php include("../config/db.php"); session_start(); ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../css/style.css"></head>
<body>
<table>
<tr><th>Student</th><th>Type</th><th>Title</th><th>Status</th><th>Action</th></tr>
<?php
$r=mysqli_query($conn,"SELECT r.*,u.name FROM reports r JOIN users u ON r.user_id=u.id");
while($row=mysqli_fetch_assoc($r)){
echo "<tr>
<td>$row[name]</td>
<td>$row[type]</td>
<td>$row[title]</td>
<td>$row[status]</td>
<td>
<a href='update_status.php?id=$row[id]&s=Resolved'>Resolve</a>
</td>
</tr>";
}
?>
</table>
</body>
</html>
