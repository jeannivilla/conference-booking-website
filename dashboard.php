<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$hostUserDB = 'localhost';
$dbnameUserDB = 'UserDB';
$usernameUserDB = 'root';
$passwordUserDB = '';


$hostScheduleDB = 'localhost';
$dbnameScheduleDB = 'Schedule';
$usernameScheduleDB = 'root';
$passwordScheduleDB = '';

try {
    $connUserDB = new PDO("mysql:host=$hostUserDB;dbname=$dbnameUserDB", $usernameUserDB, $passwordUserDB);
    $connUserDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $connScheduleDB = new PDO("mysql:host=$hostScheduleDB;dbname=$dbnameScheduleDB", $usernameScheduleDB, $passwordScheduleDB);
    $connScheduleDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtUserDB = $connUserDB->prepare("SELECT FirstName, LastName, Email, SelectedDate, ConfirmationNumber FROM users");
    $stmtUserDB->execute();
    $users = $stmtUserDB->fetchAll(PDO::FETCH_ASSOC);

    $stmtScheduleDB = $connScheduleDB->prepare("SELECT event_date, event_time, conference_name, speaker_name FROM events");
    $stmtScheduleDB->execute();
    $events = $stmtScheduleDB->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #FFFDD0;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        #sidebar {
            width: 200px;
            background-color: #f7f2d7;
            padding: 20px;
        }
        #sidebar img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        #sidebar ul li a {
            text-decoration: none;
            color: black;
            display: block;
            padding: 8px;
            transition: background-color 0.3s;
        }
        #sidebar ul li a:hover {
            background-color: #ddd;
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        h1, h2, h3 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="sidebar">
            <img src="img/connectCon.jpg" alt="Conference Logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="speakers.php">Speakers</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="policies.php">Policies</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="login.php">Admin Login</a></li>
            </ul>
        </div>
        <div id="content">
            <h1>Welcome to the Admin Dashboard</h1>
            <h3>Here's an overview of user information + speaker schedule</h3>
            
            <section>
                <h2>Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Date Selected</th>
                            <th>Confirmation Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['FirstName']); ?></td>
                            <td><?php echo htmlspecialchars($user['LastName']); ?></td>
                            <td><?php echo htmlspecialchars($user['Email']); ?></td>
                            <td><?php echo htmlspecialchars($user['SelectedDate']); ?></td>
                            <td><?php echo htmlspecialchars($user['ConfirmationNumber']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <section>
                <h2>Speakers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Topic</th>
                            <th>Speaker</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($event['event_date']); ?></td>
                            <td><?php echo htmlspecialchars($event['event_time']); ?></td>
                            <td><?php echo htmlspecialchars($event['conference_name']); ?></td>
                            <td><?php echo htmlspecialchars($event['speaker_name']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
