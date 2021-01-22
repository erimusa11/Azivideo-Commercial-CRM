<?php
include "./functions.php";
global $connection;

$id_video = $_POST['id_video'];
$data = array();

//get total rating for this video
$query_total_rating = "SELECT COUNT(rating_id) AS countRating, SUM(rating) AS sumRating
FROM video_rating
WHERE video_id = '$id_video'";
$result_total_rating = mysqli_query($connection, $query_total_rating);
$row_total_rating = mysqli_fetch_assoc($result_total_rating);
$countRating = $row_total_rating['countRating'];
$sumRating = $row_total_rating['sumRating'];
if ($countRating == null || $sumRating == null) {
    $countRating = 0;
    $sumRating = 1;
    $avgRating = 0;
} else {
    $avgRating = round($sumRating / $countRating);
}

$data[] = array(
    'countRating' => $countRating,
    'avgRating' => $avgRating,
);

echo json_encode($data);
