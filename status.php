<?php
session_start();
include("../config/db.php");

/* ===== Login check ===== */
if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

/* ===== Fetch reports for logged-in student ===== */
$query = "
    SELECT 
        type,
        title,
        description,
        location,
        status
    FROM reports
    WHERE student_id = ?
    ORDER BY created_at DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Reports Status</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #4fb0d6;
            margin: 0;
        }

        /* ===== Header ===== */
        .header {
            background-color: #1e5e73;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-size: 22px;
            font-weight: bold;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
        }

        .nav a:hover,
        .nav a.active {
            border-bottom: 2px solid #fff;
            padding-bottom: 4px;
        }

        /* ===== Content ===== */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 20px;
            color: #1e5e73;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: #1e5e73;
            color: #fff;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .no-reports {
            text-align: center;
            color: #555;
            font-size: 16px;
        }

        /* ===== Status badges ===== */
        .status {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .approved {
            background: #d4edda;
            color: #155724;
        }

        .rejected {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<!-- ===== Header ===== -->
<div class="header">
    <div class="logo">CampusAssist</div>
    <div class="nav">
        <a href="../student/home.php">Home</a>
        <a href="../student/report.php">Report</a>
        <a href="status.php" class="active">Status</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
</div>

<!-- ===== Content ===== -->
<div class="container">
    <h2>Your Reports Status</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php
                        // Normalize status for CSS
                        $statusClass = strtolower(trim($row['status']));
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['type']) ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td>
                            <span class="status <?= $statusClass ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-reports">No reports submitted yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
