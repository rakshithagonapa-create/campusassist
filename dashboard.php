<?php
session_start();
include("../config/db.php");

/* Protect page */
if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* ===== Welcome text ===== */
        .welcome-text {
            color: #fff; /* White color */
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.6); /* optional for readability */
        }

        /* ===== Dashboard container ===== */
        .dashboard-container {
            max-width: 1000px;
            margin: 60px auto;
            text-align: center;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .dashboard-card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-decoration: none;
            color: #000;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .dashboard-card h3 {
            margin-bottom: 10px;
            color: #1e5e73;
        }

        .dashboard-card p {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<?php include("../header.php"); ?>

<!-- DASHBOARD CONTENT -->
<div class="dashboard-container">

    <div class="welcome-text">
        Welcome, <?= htmlspecialchars($_SESSION['student_name']); ?>
    </div>

    <div class="card-container">

        <!-- SUBMIT BOX -->
        <a href="submit.php" class="dashboard-card">
            <h3>Submit Complaint / Lost Item</h3>
            <p>Report a complaint or lost item easily</p>
        </a>

        <!-- STATUS BOX -->
        <a href="status.php" class="dashboard-card">
            <h3>View Status</h3>
            <p>Check your submitted complaint status</p>
        </a>

    </div>
</div>

</body>
</html>
