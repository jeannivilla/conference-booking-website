<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        form {
            display: flex;
            flex-direction: column;
            width: 80%; 
        }
        label, input, select, button {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<?php
session_start();


include 'ScheduleDB.php';


include 'DB_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $selectedDate = htmlspecialchars($_POST['selectedDate']);

    // Generate a unique confirmation number
    $timestamp = time(); // Unix timestamp
    $randomComponent = mt_rand(10000, 99999); // Random number for extra uniqueness
    $confirmationNumber = "CONF{$timestamp}{$randomComponent}";

    // Insert user data into the Users table
    $stmt = $pdo->prepare("INSERT INTO Users (FirstName, LastName, Email, SelectedDate, ConfirmationNumber) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$firstName, $lastName, $email, $selectedDate, $confirmationNumber])) {
        // Store email and confirmation number in session
        $_SESSION['email'] = $email;
        $_SESSION['confirmationNumber'] = $confirmationNumber;

        // Redirect to confirmed.php
        header("Location: confirmed.php");
        exit; // Ensure no further processing is done after the redirect
    } else {
        echo "<p>Error: Data insertion failed.</p>";
    }
}

// Fetch events from schedule database
$query = "SELECT event_date, speaker_name FROM events ORDER BY event_date ASC";
$result = $connScheduleDB->query($query);
?>


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
    <h1>Registration Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="selectedDate">Select Date:</label>
        <select id="selectedDate" name="selectedDate" required>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["event_date"] . '">' . $row["event_date"] . ' - ' . $row["speaker_name"] . '</option>';
                }
            } else {
                echo '<option>No Events Available</option>';
            }
            ?>
        </select>

        <input type="submit" value="Register">
        <button type="button" onclick="location.href='manage.php'">Manage Registration</button>
    </form>
</div>

</body>
</html>