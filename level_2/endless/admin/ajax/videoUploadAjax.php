<?php

// ini_set('post_max_size', '10M');
// ini_set('upload_max_filesize', '10M');
include '../../../../functions.php';
global $connection; $errorHandle;

//podcast ext array
$extensions_arrPodcast = ['wav', 'mp3', 'wma'];
//video & trailer ext array
$extensions_arr = ['mp4', 'mpeg4', 'mov', 'mkv'];
//thumbnail ext array
$extensions_arr_thumbnail = ['jpg', 'jpeg', 'png'];

$data_creazione = date('Y-m-d H:i:s');

$title_video = addslashes($_POST['title_video']);
$ytLink = addslashes($_POST['ytLink']);

$podcast = basename($_FILES["podcast"]["name"]);
$podcastTemp = $_FILES['podcast']['tmp_name'];
$podcast_location = '../../../../upload_podcast/';
if (!empty($podcast)) {
    $podcastFile = uploadFile($podcast_location, $podcast, $extensions_arrPodcast, $podcastTemp);
    if ($podcastFile == 'failed upload' || $podcastFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $videoNewTitle = $podcastFile['newTitle'];
    }
}


$video = basename($_FILES["video"]["name"]);
$videoTemp = $_FILES['video']['tmp_name'];
$video_location = '../../../../upload_video/';
if (!empty($video)) {
    $videoFile = uploadFile($video_location, $video, $extensions_arr, $videoTemp);
    if ($videoFile == 'failed upload' || $videoFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $videoNewTitle = $videoFile['newTitle'];
    }
}

$trailer_video = basename($_FILES["trailer_video"]["name"]);
$trailer_videoTemp = $_FILES['trailer_video']['tmp_name'];
$trailer_location = '../../../../trailer_video/';
if (!empty($trailer_video)) {
    $trailerFile = uploadFile($trailer_location, $trailer_video, $extensions_arr, $trailer_videoTemp);
    if ($trailerFile == 'failed upload' || $trailerFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $trailerNewTitle = $trailerFile['newTitle'];
    }
}

$thumbnail_video = basename($_FILES['thumbnail_video']["name"]);
$thumbnail_videoTemp = $_FILES['thumbnail_video']['tmp_name'];
$thumbnail_location = '../../../../thumbnail_video/';
if (!empty($thumbnail_video)) {
    $thumbnailFile = uploadFile($thumbnail_location, $thumbnail_video, $extensions_arr_thumbnail, $thumbnail_videoTemp);
    if ($trailerFile == 'failed upload' || $trailerFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $thumbnailNewTitle = $thumbnailFile['newTitle'];
    }
}

$autore = addslashes($_POST['autore']);
$super_categorie = addslashes($_POST['super_categorie']);
$category = $_POST['category'];
$tipologia = addslashes($_POST['tipologia']);
$prezzo = addslashes($_POST['prezzo']);
$descrizione_video = addslashes($_POST['descrizione_video']);

if ($tipologia == 'A pagamento') {
    $tipologiaValue = 2;
} elseif ($tipologia == 'Gratis') {
    $tipologiaValue = 1;
}
$query = "INSERT INTO videos (title_video, description_video, path_video, path_trail_video, photo_from_video, url_youtube, autore, video_prize, tipologia_video, data_creation,super_categorie) 
VALUES ('$title_video', '$descrizione_video', '$videoNewTitle', '$trailerNewTitle', '$thumbnailNewTitle', '$ytLink', '$autore', '$prezzo', '$tipologiaValue', '$data_creazione', '$super_categorie')";


if (!empty($errorHandle)) {
    echo $errorHandle;
} else {
    $result = mysqli_query($connection, $query);
    $videoId = mysqli_insert_id($connection);
    videoCategoryInsert($category, $videoId, $connection);
    if ($result) {
        echo 'query success';
    } else {
        echo 'query failed';
    }
}