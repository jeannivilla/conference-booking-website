<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speakers</title>
    <style>
        body {
            display: flex;
            margin: 0; 
            min-height: 100vh; 
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
        #speakers {
            width: 100%; 
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }
        .speaker {
            display: flex; 
            flex-wrap: wrap; 
            width: 100%; 
            margin-top: 20px; 
            align-items: center; 
        }
        .speaker img {
            width: 150px;
            height: 150px; 
            margin-right: 20px; 
        }
        @media (max-width: 600px) {
            #sidebar, #content {
                width: 100%; 
                margin-left: 0; 
            }
            #content {
                padding: 10px; 
                width: 100%; 
            }
            .speaker {
                flex-direction: column;
                align-items: center;
            }
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
        <h1>Meet Our Speakers!</h1>
        <!-- Speakers Section -->
        <div id="speakers">
            <!-- Speaker 1 -->
            <div class="speaker">
                <img src="img/speaker1.jpeg" alt="Speaker 1">
                <div>
                    <h2>Brené Brown</h2>
                    <p>Bio: Casandra Brené Brown is an American professor, social worker, author,<br> and podcast host. Brown is known for her work on shame, vulnerability, <br>and leadership, and for her widely viewed 2010 TEDx talk. She has written<br> six number-one New York Times bestselling books and hosted two podcasts on Spotify.</p>
                    <p>Website: <a href="https://brenebrown.com/">Brené Browns' Website</a></p>
                </div>
            </div>

            <!-- Speaker 2 -->
            <div class="speaker">
                <img src="img/speaker2.jpeg" alt="Speaker 2">
                <div>
                    <h2>Simon Sinek</h2>
                    <p>Bio: Simon Oliver Sinek is an English-born American author and inspirational <br> speaker on business leadership. His books include Start with Why<br> and The Infinite Game. </p>
                    <p>Website: <a href="https://simonsinek.com/">Simon Sineks' Website</a></p>
                </div>
            </div>
            
            <!-- Speaker 3 -->
            <div class="speaker">
                <img src="img/speaker3.jpeg" alt="Speaker 3">
                <div>
                    <h2>Amy Cuddy</h2>
                    <p>Bio: Amy Joy Casselberry Cuddy is an American social psychologist, author and <br> speaker. She is a proponent of "power posing", a self-improvement technique whose<br> scientific validity has been questioned. She has served as a faculty member at <br> Rutgers University, Kellogg School of Management and Harvard Business School.</p>
                    <p>Website: <a href="https://www.amycuddy.com/">Amy Cuddys' Website</a></p>
                </div>
            </div>



            <!-- Speaker 4 -->
            <div class="speaker">
                <img src="img/speaker4.jpeg" alt="Speaker 4">
                <div>
                    <h2>Elizabeth Gilbert</h2>
                    <p>Bio: Elizabeth Gilbert is an American journalist and author. She is best known <br> for her 2006 memoir Eat, Pray, Love, which has sold over 12 million copies<br> and has been translated into over 30 languages. The book was also made into<br> a film of the same name in 2010.</p>
                    <p>Website: <a href="https://www.elizabethgilbert.com/">Elizabeth Gilberts' Website</a></p>
                </div>
            </div>

            <!-- Speaker 5 -->
            <div class="speaker">
                <img src="img/speaker5.jpeg" alt="Speaker 5">
                <div>
                    <h2>Tony Robbins</h2>
                    <p>Bio: Anthony Jay Robbins is an American author, coach and speaker. He is known<br> for his infomercials, seminars, and self-help books including the books Unlimited<br> Power and Awaken the Giant Within.</p>
                    <p>Website: <a href="https://www.tonyrobbins.com/">Tony Robins' Website</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
