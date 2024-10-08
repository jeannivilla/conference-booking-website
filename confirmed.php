<?php
session_start();

$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'No email provided';

$confirmationNumber = isset($_SESSION['confirmationNumber']) ? $_SESSION['confirmationNumber'] : 'No confirmation number provided';

unset($_SESSION['email'], $_SESSION['confirmationNumber']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmed</title>
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
        </ul>
    </div>
    <div id="content">
        <h1>Registration Confirmed</h1>
        <p>Your registration has been confirmed!</p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Confirmation Number: <?php echo htmlspecialchars($confirmationNumber); ?></p>
    </div>
</body>
</html>
