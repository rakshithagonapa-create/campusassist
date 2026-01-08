<?php
include("../config/db.php");
include("../header.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!-- <?php include("../header.php"); ?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Submit Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="form-container">
    <h2>Submit Complaint / Lost Item</h2>

    <form method="post">
        <select name="type" required>
            <option value="">Select Type</option>
            <option value="Complaint">Complaint</option>
            <option value="Lost Item">Lost Item</option>
        </select>

        <input type="text" name="title" placeholder="Title" required>

        <textarea name="description" placeholder="Description" required></textarea>

        <input type="text" name="location" placeholder="Location" required>

        <button name="submit">Submit</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare(
        "INSERT INTO reports (student_id, type, title, description, location, status, created_at)
         VALUES (?, ?, ?, ?, ?, 'Pending', NOW())"
    );

    $stmt->bind_param(
        "issss",
        $_SESSION['student_id'],
        $_POST['type'],
        $_POST['title'],
        $_POST['description'],
        $_POST['location']
    );

    $stmt->execute();
    echo "<p class='success'>Submitted Successfully</p>";
}
?>

</div>
</body>
</html>