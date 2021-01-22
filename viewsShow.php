<?php
include 'functions.php';
global $connection;

$videoId = $_POST['videoId'];

$query_check_user = "SELECT * 
FROM video_views
WHERE id_video = '$videoId'";
$result_check_user = mysqli_query($connection, $query_check_user);
$count_row = mysqli_num_rows($result_check_user);
echo $count_row;
