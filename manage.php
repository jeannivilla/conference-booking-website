<?php
session_start();
include 'DB_connect.php';

$message = ''; // To hold messages to the user

if (isset($_POST['exit'])) {
    header('Location: registration.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['find'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $confirmationNumber = filter_input(INPUT_POST, 'confirmationNumber', FILTER_SANITIZE_STRING);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

        if (!empty($email) && !empty($confirmationNumber) && !empty($firstName) && !empty($lastName)) {
            $stmt = $pdo->prepare("SELECT * FROM Users WHERE FirstName = ? AND LastName = ? AND Email = ? AND ConfirmationNumber = ?");
            $stmt->execute([$firstName, $lastName, $email, $confirmationNumber]);
            $user = $stmt->fetch();

            if ($user) {
                $message = "Registration Details:<br>"
                         . "Name: " . $user['FirstName'] . " " . $user['LastName'] . "<br>"
                         . "Email: " . $user['Email'] . "<br>"
                         . "Date: " . $user['SelectedDate'] . "<br>"
                         . "Confirmation Number: " . $user['ConfirmationNumber'];
            } else {
                $message = 'No registration found for the provided details.';
            }
        } else {
            $message = 'Please ensure all fields are filled correctly.';
        }
    } elseif (isset($_POST['cancel'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $confirmationNumber = filter_input(INPUT_POST, 'confirmationNumber', FILTER_SANITIZE_STRING);

        if (!empty($email) && !empty($confirmationNumber)) {
            $stmt = $pdo->prepare("DELETE FROM Users WHERE Email = ? AND ConfirmationNumber = ?");
            if ($stmt->execute([$email, $confirmationNumber])) {
                $message = ($stmt->rowCount() > 0) 
                           ? 'Your registration has been successfully cancelled.' 
                           : 'No registration found with the provided details.';
            } else {
                $message = 'Error: Unable to cancel registration. Please check the details.';
            }
        } else {
            $message = 'Please ensure all fields are filled correctly.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Registration</title>
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
        <h1>Manage Your Registration</h1>
        <p>Please enter the details below:</p>
        <form action="" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="confirmationNumber">Confirmation Number:</label>
            <input type="text" id="confirmationNumber" name="confirmationNumber" required><br>
            <button type="submit" name="find">Find Registration</button>
            <button type="submit" name="cancel">Cancel Registration</button>
            <button type="submit" name="exit" formnovalidate>Exit</button>
        </form>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
