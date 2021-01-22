<?php
include "./functions.php";
global $connection;

$id_video = $_POST['id_video'];
$id_user = $_POST['id_user'];
$video_rating = $_POST['video_rating'];


//check if user have rated the video before
$query_check = "SELECT COUNT(rating_id) AS countRating, rating
FROM video_rating
WHERE video_id = '$id_video' AND user_id = '$id_user';";
$result_check = mysqli_query($connection, $query_check);
$row_check = mysqli_fetch_assoc($result_check);
$count_check = $row_check['countRating'];
$rating = $row_check['rating'];



if ($count_check > 0) {
    $query_update = "UPDATE video_rating SET rating = '$video_rating'
    WHERE video_id = '$id_video' AND user_id = '$id_user'";
    $result_update = mysqli_query($connection, $query_update);
    if ($result_update) {
        echo 'update success';
    } else {
        echo 'update failed';
    }
} else {
    $query_insert = "INSERT INTO video_rating (rating, video_id, user_id)
    VALUES ('$video_rating', '$id_video', '$id_user')";
    $result_insert = mysqli_query($connection, $query_insert);
    if ($result_insert) {
        echo 'insert success';
    } else {
        echo 'insert failed';
    }
}