<?php
session_start(); 
ob_start(); 
$errorMessage = '';

$host = 'localhost';    
$dbname = 'AdminDB';
$username = 'root';
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = trim($_POST['username']);
        $passInput = trim($_POST['password']);

        $stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = :username");
        $stmt->bindParam(':username', $userInput);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $passInput === $user['password']) {
            $_SESSION['username'] = $userInput; 
            header("Location: dashboard.php");
            exit();
        } else {
            $errorMessage = "Invalid credentials";
        }
    }
} catch (PDOException $e) {
    $errorMessage = "Error accessing the database: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            padding-top: 20px;
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
        form {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
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
        input[type="text"], input[type="password"] {
            margin-bottom: 10px;
            padding: 8px;
            width: 200px; 
        }
        input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049; 
        }
        h2 {
            margin-top: 0;
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
            <li><a href="login.php">Admin Login</a></li>
        </ul>
    </div>
    <div id="content">
        <form method="post">
            <h2>Login</h2>
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
        <?php if ($errorMessage): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php ob_end_flush(); // Send the output buffer and turn off output buffering ?>
