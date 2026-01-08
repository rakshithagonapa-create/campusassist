<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="header">
    <h1>CampusAssist</h1>
    <div>
        <a href="../index.php">Home</a>

        <?php if (isset($_SESSION['student_id'])) { ?>
            <a href="../student/submit.php">Report</a>
            <a href="../auth/status.php">Status</a>
            <a href="../auth/logout.php">Logout</a>
        <?php } else { ?>
            <a href="../auth/login.php">Login</a>
            <a href="../auth/register.php">Register</a>
        <?php } ?>
    </div>
</div>