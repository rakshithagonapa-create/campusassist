<?php
include("../config/db.php");
session_start();

$uid = $_SESSION['uid'];

$result = mysqli_query($conn,
"SELECT * FROM reports WHERE student_id='$uid'");
?>

<table border="1">
<tr>
<th>Type</th>
<th>Title</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['type'] ?></td>
<td><?= $row['title'] ?></td>
<td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>