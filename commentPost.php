<?php
include 'functions.php';
global $connection;

$videoId = $_POST['videoId'];
$userId = $_POST['userId'];
$comment = $_POST['comment'];
$dateNow = date("Y-m-d H:i:s");

$query = "INSERT INTO video_comment (comment, date_comment, id_video, user_id) VALUES ('$comment', '$dateNow', '$videoId', '$userId')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo 'insert succes';
} else {
    echo 'insert error';
}