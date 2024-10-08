<?php
$connScheduleDB = new mysqli('localhost', 'root', '', 'schedule');
if ($connScheduleDB->connect_error) {
    die('Connection failed: ' . $connScheduleDB->connect_error);
}
?>
