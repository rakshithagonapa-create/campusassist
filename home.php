<?php
session_start();

// If user is already logged in, redirect to their dashboard (optional)
if (isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CampusAssist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        /* Full-screen background image */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg {
            /* Replace this path with your campus image */
            background-image: url('../images/campus.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for better contrast */
        }

        .content {
            position: relative;
            z-index: 2;
        }

        .content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .content a {
            text-decoration: none;
        }

        .content button {
            background-color: #1e5e73;
            color: white;
            border: none;
            padding: 12px 25px;
            margin: 0 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .content button:hover {
            background-color: #15545e;
        }

        @media (max-width: 768px) {
            .content h1 {
                font-size: 36px;
            }
            .content p {
                font-size: 16px;
            }
            .content button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="bg">
        <div class="overlay"></div>
        <div class="content">
            <h1>CampusAssist</h1>
            <p>Your one-stop campus assistance platform</p>
            <a href="login.php"><button>Login</button></a>
            <a href="register.php"><button>Register</button></a>
        </div>
    </div>

</body>
</html>
