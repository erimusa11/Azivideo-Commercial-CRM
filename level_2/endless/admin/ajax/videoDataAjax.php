<?php
include '../../../../functions.php';
global $connection;

$noFileFound = '<div class="alert alert-danger dark" role="alert">
                      <p>Nessun file trovato!</p>
                    </div>';


$idVideo = $_POST['idVideo'];
$query = "SELECT videos.*, CONCAT(autore_video.nome_autore, ' ', autore_video.cognome_autore) AS autoreNome
FROM videos, autore_video
WHERE videos.id_video = '$idVideo'
AND videos.autore = autore_video.id_autore";
$videoCategory = videoCategory($connection, $idVideo);
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($result)) {
    $titleVideo = $row['title_video'];
    $descriptionVideo = $row['description_video'];
    $autore = $row['autoreNome'];
    $priceVideo = $row['video_prize'];
    $tipologia = $row['tipologia_video'];
    if ($tipologia == 1) {
        $tipologiaText = 'Gratis';
    } elseif ($tipologia == 2) {
        $tipologiaText = 'A pagamento';
    }
    $superCategorie = $row['super_categorie'];
    if ($superCategorie == 1) {
        $superCategorieText = 'Video';
    } elseif ($superCategorie == 2) {
        $superCategorieText = 'Podcast';
    } elseif ($superCategorie == 3) {
        $superCategorieText = 'Serial';
    }
   
    $ytLink = $row['url_youtube'];

    $video = $row['path_video'];
    $ext = extFile($video);
    $extensionsPodcast = ['wav', 'mp3', 'wma'];
    if (in_array($ext, $extensionsPodcast)) {
        $folderPath = '../../../../upload_podcast/';
    } else {
        $folderPath = '../../../../upload_video/';
    }

    if (!empty($video)) {
        $filePath = $folderPath.$video;
        $file = '<a href="'.$filePath.'" target="_blank">'.$video.'</a>';
    } else {
        $file = $noFileFound;
    }

    $trailer = $row['path_trail_video'];
    if (!empty($trailer)) {
        $trailerPath = '../../../../trailer_video/'.$trailer;
        $trailerFile = '<a href="'.$trailerPath.'" target="_blank">'.$trailer.'</a>';
    } else {
        $trailerFile = $noFileFound;
    }

    $thumbnail = $row['photo_from_video'];
    if (!empty($thumbnail)) {
        $thumbnailPath = '../../../../thumbnail_video/'.$thumbnail;
        $thumbnailFile = '<a href="'.$thumbnailPath.'" target="_blank">'.$thumbnail.'</a>';
    } else {
        $thumbnailFile = $noFileFound;
    }



    $data=array(
        'titleVideo' => $titleVideo,
        'descriptionVideo' => $descriptionVideo,
        'autore' => $autore,
        'price' => $priceVideo,
        'tipologia' => $tipologiaText,
        'superCategorie' => $superCategorieText,
        'videoCategorie' => $videoCategory,
        'ytLink' => $ytLink,
        'file' => $file,
        'trailer' => $trailerFile,
        'thumbnail' =>  $thumbnailFile
    );
}
echo json_encode($data);