<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Home</title>
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
            <li><a href="login.php">Admin Login </a></li>
        </ul>
    </div>
    <div id="content">
        <h1>Welcome to Connect Con!</h1>
        <p>Making it easier to connect to online conferences from the comfort of your home, school, or even work.</p>
        <h2>About Us</h2>
        <p>Our goal is to make your experience as smooth as possible to join in on a conference. Whether you're seeking professional development, personal growth, or academic enrichment, we provide easy access to a diverse range of topics through our dedicated platform.</p>
        <h2>Explore Our Tabs</h2>
        <p><strong>Speakers:</strong> Showcases our talented speakers who offer a variety of engaging topics.</p>
        <p><strong>Schedule:</strong> Provides detailed information on what the topics are along with their respective time and date.</p>
        <p><strong>Registration:</strong> Allows you to sign up for conferences and secure your spot to participate.</p>
        <p><strong>Policies:</strong> Contains important information about conference guidelines and procedures.</p>
        <p><strong>Contact Us:</strong> If you have any concerns or further questions, this tab will help you reach out to us directly.</p>
    </div>
</body>
</html>
