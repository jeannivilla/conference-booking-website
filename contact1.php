<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            display: flex;
            margin: 0; 
            height: 100vh; 
            background-color: #FFFDD0; 
        }
        #sidebar {
            width: 200px; 
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh; 
            background-color: #f7f2d7; 
        }
        #sidebar img {
            width: 100%; 
            height: auto;
            margin-bottom: 20px; 
        }
        #content {
            margin-left: 200px;
            padding: 20px;
            width: calc(100% - 200px);
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center; 
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li a {
            text-decoration: none;
            color: black; 
            display: block;
            padding: 8px;
            transition: background-color 0.3s;
        }
        ul li a:hover {
            background-color: #ddd; 
        }
    </style>
</head>
<body>
<div id="sidebar">
        <img src="img/connectCon.jpg" alt="Conference Logo">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="speakers.php">Speakers</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="policies.php">Policies</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="login.php">Admin Login </a></li>
        </ul>
    </div>
    <div id="content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["name"])) {
                $message = "Thank you, " . htmlspecialchars($_POST["name"]) . "!";
            } elseif (!empty($_POST["email"])) { // Check if email is provided
                $message = "Thank you, " . htmlspecialchars($_POST["email"]) . "!";
            } else {
                $message = "Thank you, user!";
            }

            echo "<h1>$message</h1>";
        } else {
            header("Location: contactus.php");
            exit;
        }
        ?>
    </div>
</body>
</html>
