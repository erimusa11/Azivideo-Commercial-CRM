<?php
global $connection;

//video details
$queryVideo = "SELECT * FROM videos WHERE id_video = '$videoId'";
$resultVideo = mysqli_query($connection, $queryVideo);
$rowVideo = mysqli_fetch_assoc($resultVideo);

$titleVideo = $rowVideo['title_video'];
$descriptionVideo = $rowVideo['description_video'];
$pathVideo = $rowVideo['path_video'];
$pathTrailVideo = $rowVideo['path_trail_video'];
$thumbnailVideo = $rowVideo['photo_from_video'];

$tipologiaVideo = $rowVideo['tipologia_video'];

$idAutoreVideo = $rowVideo['autore'];
$queryAutore = "SELECT CONCAT(nome_autore,' ',cognome_autore) AS fullName
FROM autore_video
WHERE id_autore = '$idAutoreVideo'";
$resultAutore = mysqli_query($connection, $queryAutore);
$rowAutore = mysqli_fetch_assoc($resultAutore);
$autoreVideo = $rowAutore['fullName'];

$prizeVideo = $rowVideo['video_prize'];
$categoryVideo = videoCategory($connection, $videoId);

//get video rating
$query_check = "SELECT rating
FROM video_rating
WHERE video_id = '$id_video' AND user_id = '$user_id';";
$result_check = mysqli_query($connection, $query_check);
$row_check = mysqli_fetch_assoc($result_check);
$rating = $row_check['rating'];
if ($rating == null) {
    $rating = 1;
}

//check user subscription
$querySubscription = "SELECT * 
FROM video_buy
WHERE id_user = '$userId'";
$resultSubscription = mysqli_query($connection, $querySubscription);

$countSubscription = mysqli_num_rows($resultSubscription);
$rowSubscription = mysqli_fetch_assoc($resultSubscription);
$subscription = $rowSubscription['subscription'];
$dataSubStart = $rowSubscription['data_subscription_start'];
$dataEndStart = $rowSubscription['data_subscription_end'];

$queryVideoBought = "SELECT id_video 
                          FROM video_buy_idVideos
                          WHERE id_user = '$userId'
                          AND id_video = '$videoId'";
$resultVideoBought = mysqli_query($connection, $queryVideoBought);
$countVideoBought = mysqli_num_rows($resultVideoBought);

$canSeeVideo = FALSE;
$now = date('Y-m-d H:i:s');

if ($tipologiaVideo == 1) {
    $canSeeVideo = TRUE;
} else {
    if ($countSubscription > 0) {
        if ($subscription == 1) {
            if ($countVideoBought > 0) {
                $canSeeVideo = TRUE;
            } else {
                $canSeeVideo = FALSE;
            }
        } else {
            if ($now > $dataEndStart) {
                $canSeeVideo = FALSE;
            } else {
                $canSeeVideo = TRUE;
            }
        }
    } else {
        $canSeeVideo = FALSE;
    }
}

if($userId != "" && $userId != null){

$querycountpref="SELECT COUNT(*) AS totalcountpref FROM prefiriti WHERE preferiti_video='$videoId' AND preferiti_userid='$userId'";
 

$resultcountpref= mysqli_query($connection,$querycountpref);

    $countpref= mysqli_fetch_assoc($resultcountpref);

}