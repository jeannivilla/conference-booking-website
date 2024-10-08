<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            justify-content: flex-start; 
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
        label, input, textarea {
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%; 
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
        <h1>Contact Us</h1>
        <p>Feel free to contact us if you have any extra questions or concerns.</p>
        
        <form action="contact1.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" placeholder="Type here!" required></textarea><br><br>
            
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
