<?php
include("../config/db.php");
mysqli_query($conn,"UPDATE reports SET status='$_GET[s]' WHERE id=$_GET[id]");
header("Location: dashboard.php");
?>