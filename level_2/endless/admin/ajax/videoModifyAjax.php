<?php

include '../../../../functions.php';
global $connection, $errorHandle;
//podcast ext array
$extensions_arrPodcast = ['wav', 'mp3', 'wma'];
//video & trailer ext array
$extensions_arr = ['mp4', 'mpeg4', 'mov', 'mkv'];
//thumbnail ext array
$extensions_arr_thumbnail = ['jpg', 'jpeg', 'png'];

$videoId = $_POST['idVideo'];


$data = videoCurrentFileTitle($videoId, $connection);
$existingVideoTitle = $data['videoTitle'];;
$existingTrailTitle = $data['trailerTitle'];
$existingThumbnailTitle = $data['thumbnailTitle'];

$columnUpdate = '';


$title_video = addslashes($_POST['title']);

$podcast = basename($_FILES["podcast"]["name"]);
$podcastTemp = $_FILES['podcast']['tmp_name'];
$podcast_location = '../../../../upload_podcast/';


$video = basename($_FILES["video"]["name"]);
$videoTemp = $_FILES['video']['tmp_name'];
$video_location = '../../../../upload_video/';


$trailer_video = basename($_FILES["trailer"]["name"]);
$trailer_videoTemp = $_FILES['trailer']['tmp_name'];
$trailer_location = '../../../../trailer_video/';


$thumbnail_video = basename($_FILES['thumbnail']["name"]);
$thumbnail_videoTemp = $_FILES['thumbnail']['tmp_name'];
$thumbnail_location = '../../../../thumbnail_video/';

$ytLink = addslashes($_POST['ytLink']);

$autore = addslashes($_POST['autore']);

$super_categorie = addslashes($_POST['super_categorie']);

$category = $_POST['category'];

$tipologia = addslashes($_POST['tipologia']);

$prezzo = addslashes($_POST['prezzo']);

$descrizione_video = addslashes($_POST['descrizione']);

if (!empty($title_video)) {
    $columnUpdate .= "title_video = '$title_video',";
}

if (!empty($podcast)) {
    $podcastFile = uploadFile($podcast_location, $podcast, $extensions_arrPodcast, $podcastTemp);
    if ($podcastFile == 'failed upload' || $podcastFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $videoNewTitle = $podcastFile['newTitle'];
    }
    $columnUpdate .= " path_video = '$videoNewTitle',";
}

if (!empty($video)) {
    $videoFile = uploadFile($video_location, $video, $extensions_arr, $videoTemp);
    if ($videoFile == 'failed upload' || $videoFile == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $videoNewTitle = $videoFile['newTitle'];
    }

    $columnUpdate .= " path_video = '$videoNewTitle',";
}

if (!empty($trailer_video)) {
    $trailerVideo = uploadFile($trailer_location, $trailer_video, $extensions_arr, $trailer_videoTemp);
    if ($trailerVideo == 'failed upload' || $trailerVideo == 'ext error') {
        $errorHandle = 'upload failed';
    } else {
        $trailerNewTitle = $trailerVideo['newTitle'];
    }

    $columnUpdate .= " path_trail_video = '$trailerNewTitle',";
}

if (!empty($thumbnail_video)) {
    $thumbnailVideo = uploadFile($thumbnail_location, $thumbnail_video, $extensions_arr_thumbnail, $thumbnail_videoTemp);
    if ($thumbnailVideo == 'failed upload' || $thumbnailVideo == 'ext error') {
        $errorHandle = ' upload failed';
    } else {
        $thumbnailNewTitle = $thumbnailVideo['newTitle'];
    }
    $columnUpdate .= " photo_from_video = '$thumbnailNewTitle',";
}

if (!empty($ytLink)) {
    $columnUpdate .= " url_youtube = '$ytLink',";
}

if (!empty($autore)) {
    $columnUpdate .= " autore = '$autore',";
}

if (!empty($super_categorie)) {
    $columnUpdate .= " super_categorie = '$super_categorie',";
}

if (!empty($category)) {
    $deleteCategory = "DELETE FROM video_con_category
    WHERE id_video = '$videoId'";
    $resultDeleteCategory = mysqli_query($connection, $deleteCategory);
    videoCategoryInsert($category, $videoId, $connection);
}


if (!empty($tipologia)) {
    $columnUpdate .= " tipologia_video = '$tipologia',";
}

if (!empty($prezzo)) {
    $columnUpdate .= " video_prize = '$prezzo',";
}

if (!empty($descrizione_video)) {
    $columnUpdate .= " description_video = '$descrizione_video',";
}

$columnUpdate = rtrim($columnUpdate, ',');
$query = "UPDATE videos SET $columnUpdate WHERE id_video = '$videoId'";

if (!empty($errorHandle)) {
    echo $errorHandle;
} else {
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo 'query success';
    } else {
        echo 'query failed';
    }
}