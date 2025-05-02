<?php
// Set the end time of the quiz (You can adjust the end time as needed)
$endTime = strtotime('2024-06-03 12:00:00'); // Example end time (YYYY-MM-DD HH:MM:SS)


$time = time();
$remainingTime = $time + time()*0.05;

// Output the remaining time in seconds
echo $remainingTime;
?>