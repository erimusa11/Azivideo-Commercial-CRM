<?php
include 'functions.php';
global $connection;

$videoId = $_POST['videoId'];
$userId = $_POST['userId'];

$query_check_user = "SELECT * 
FROM video_views
WHERE id_video = '$videoId'
AND id_user = '$userId'";
$result_check_user = mysqli_query($connection, $query_check_user);
$count_row = mysqli_num_rows($result_check_user);

if ($count_row <= 0) {
    $query = "INSERT INTO video_views (id_video, id_user) VALUES ('$videoId', '$userId')";
    $result = mysqli_query($connection, $query);
}
