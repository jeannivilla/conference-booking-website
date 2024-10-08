<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Policies</title>
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
        <h1>Conference Policies</h1>
        
        <h2>1. Code of Conduct</h2>
        <p>Our conference adheres to a strict code of conduct to ensure a respectful and inclusive environment for all participants. Harassment or discrimination of any kind will not be tolerated.</p>
        
        <h2>2. Registration</h2>
        <p>All attendees must register for the conference prior to attending any sessions or events.</p>
        
        <h2>3. Session Access</h2>
        <p>Access to conference sessions and events may require login credentials or unique access codes provided upon registration. Participants are responsible for maintaining the confidentiality of their access information.</p>
        
        <h2>4. Intellectual Property</h2>
        <p>All content presented at the conference, including presentations, materials, and discussions, is protected by intellectual property laws. Participants may not reproduce, distribute, or share conference content without explicit permission.</p>
        
        <h2>5. Privacy</h2>
        <p>We are committed to protecting the privacy of our participants. Personal information collected during registration or participation will be used solely for conference-related purposes and will not be shared with third parties without consent.</p>
    </div>
</body>
</html>
