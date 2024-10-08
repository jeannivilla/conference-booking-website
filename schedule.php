<?php
// Include the database connection file
include('scheduleDB.php');

// Handle the speaker filter if set
$speakerFilter = isset($_GET['speaker']) ? $_GET['speaker'] : '';

// SQL query to fetch all speakers for the dropdown
$speakersQuery = "SELECT DISTINCT speaker_name FROM events ORDER BY speaker_name";
$speakersResult = $connScheduleDB->query($speakersQuery);

// SQL query to fetch data from events table, filtered by speaker if applicable
$query = "SELECT event_date, event_time, conference_name, speaker_name FROM events";
if (!empty($speakerFilter)) {
    $query .= " WHERE speaker_name = '" . $connScheduleDB->real_escape_string($speakerFilter) . "'";
}
$result = $connScheduleDB->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - Conference Home</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        select {
            padding: 8px;
            margin-bottom: 20px;
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
        <h1>Schedule of Events</h1>
        <form action="schedule.php" method="get">
            <label for="speaker">Filter by speaker:</label>
            <select name="speaker" onchange="this.form.submit()">
                <option value="">All Speakers</option>
                <?php
                if ($speakersResult && $speakersResult->num_rows > 0) {
                    while ($row = $speakersResult->fetch_assoc()) {
                        $selected = ($row['speaker_name'] == $speakerFilter) ? ' selected' : '';
                        echo "<option value='{$row['speaker_name']}'{$selected}>{$row['speaker_name']}</option>";
                    }
                }
                ?>
            </select>
        </form>
        <?php
        if ($result && $result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Conference Name</th>
                        <th>Speaker Name</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                $formatted_time = date('g:i A', strtotime($row['event_time']));
                echo "<tr>
                        <td>{$row['event_date']}</td>
                        <td>{$formatted_time}</td>
                        <td>{$row['conference_name']}</td>
                        <td>{$row['speaker_name']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No events found for the selected speaker.</p>";
        }
        ?>
    </div>
    <?php
    if ($result) {
        $result->free();
    }
    if ($speakersResult) {
        $speakersResult->free();
    }
    $connScheduleDB->close();
    ?>
</body>
</html>
