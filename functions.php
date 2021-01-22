<?php
session_start();
date_default_timezone_set('Europe/Rome');
include 'dbconnect.php';
//*******************************************************this is the log in function *******************************************/
function login()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        //query to get users from user
        $query = "SELECT * FROM users WHERE user_username = '$username' AND user_password = '$password'";

        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if ($count == null) {
            echo '<script language="javascript">';
            echo 'alert("I dati sono sbagliati")';
            echo '</script>';
        }

        while ($row = mysqli_fetch_array($result)) {
            if ($username == $row['user_username'] && $password == $row['user_password']) {
                $_SESSION['users_id'] = $row['user_id'];
                $_SESSION['username'] = $row['user_username'];
                $_SESSION['users_name'] = $row['user_name'];
                $_SESSION['users_surname'] = $row['user_surname'];
                $_SESSION['user_livel'] = $row['user_livel'];

                if ($_SESSION['user_livel'] == 1) {
                    return header('Location: index.php');
                } elseif ($_SESSION['user_livel'] == 2) {
                    return header('Location: ./level_2/endless/admin/upload_video.php');
                }
            }
        }
    }
}
//*******************************************************this is the end of  log in function ********************************/
//*******************************************************this is the  register function **********************************************/

function register()
{
    if (isset($_POST['submitregister'])) {
        global $connection;

        $Nome = $_POST['Nome'];
        $Cognome = $_POST['Cognome'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Password = $_POST['Password'];
        $Cita = $_POST['Cita'];

        $query_count = "SELECT COUNT(*) AS TotalUsers from users WHERE user_username='$Email'";
        $result_count = mysqli_query($connection, $query_count);
        $row_count = mysqli_fetch_assoc($result_count);
        if ($row_count['TotalUsers'] < 1) {
            $queryinstert = "INSERT INTO users(user_name,user_surname,user_username,user_email,user_city,user_livel,user_phone,user_password) VALUES ('$Nome','$Cognome','$Email','$Email','$Cita','1','$Telefono','$Password')";
            $result_insert = mysqli_query($connection, $queryinstert);
            if ($result_insert) {
                return header('Location: index.php');
            }
        } else {
            echo '<script>alert("Attenzione! Con questo email esiste gia un accaunt creato.")</script>';
        }
    }
}

//******************************************************this is the  register function ************ ********************************/

//**************************************************this is the log out function  *******************************************/

function logout()
{
    if (isset($_POST['logout'])) {
        require_once "googleConfig.php";
        if ($_SESSION['user_livel'] == 2) {
            $_SESSION = array();
            session_destroy();
            return header('Location: ../../../index.php');
            exit();
        } else {
            $_SESSION = array();
            session_destroy();
            $googleClient->revokeToken();
            return header("Location: index.php");
            exit();
        }
    }
}

//**************************************************this is the end  log out function  *******************************************/

//**************************************************  this is start creating video level 2  *******************************************/


//******************************************this is the start of creating video category level 2  ******************************************/
function carica_Category()
{
    global $connection;

    if (isset($_POST['btn_carica'])) {
        $carica_category = $_POST['carica_category'];

        $carica_category = "INSERT INTO video_category (category_video) VALUES ('$carica_category')";
        $result_carica_category = mysqli_query($connection, $carica_category);
        if ($result_carica_category) {
            return header('Location: video_categorie.php?carica=true');
        } else {
            return header('Location: video_categorie.php?carica=false');
        }
    }
}

//*******************************************this is the end of creating video category level 2  *******************************************/

//******************************************this is the start of mmodiufying video category level 2  ******************************************/
function modifyCategory()
{
    global $connection;
    if (isset($_POST['modifyBtn'])) {
        $categoria_id = $_POST['categoria_id'];

        $categoria_nome = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['categoria_nome']);

        $query_update = "UPDATE video_category SET category_video='$categoria_nome' WHERE id_category='$categoria_id'";
        $result_update = mysqli_query($connection, $query_update);
        if ($result_update) {
            return header('Location: video_categorie.php?modify=true');
        } else {
            return header('Location: video_categorie.php?modify=false');
        }
    }
}

//*******************************************this is the end of modifyind video category level 2  *******************************************/

//******************************************this is the start of deleting video category level 2  ******************************************/

function DeleteCategory()
{
    if (isset($_POST['deletebtn'])) {
        global $connection;

        $connesione = $_POST['deleteImp'];

        $delete_query = "DELETE FROM video_category WHERE id_category='$connesione'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            return header('Location: video_categorie.php?delete=true');
        } else {
            return header('Location: video_categorie.php?delete=false');
        }
    }
}

//*************************************this is the end of deleting video category level 2  *******************************************/

//*************************************this is the start of video in vendita level 2  *******************************************/
function videoVendita()
{
    global $connection;

    if (isset($_POST['vendita_btn'])) {
        $dt = date('Y-m-d H:i:s');
        $id_vendita = $_POST['id_vendita'];

        $update_richiesta_di_vendita = "UPDATE video_venduti SET richiesta_di_user = 2, data_di_vendita = '$dt' WHERE id_venduti='$id_vendita'";
        $result_update = mysqli_query($connection, $update_richiesta_di_vendita);
        if ($result_update) {
            $message = 'La richiesta di acquisto è stata inviata';
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}

//********************************this is the end of video in vendita  level 2  *******************************************/

//*******************************************this is start  for registrati data for users  *******************************************/
function registrati()
{
    global $connection;
    if (isset($_POST['registrati'])) {
        $name = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['name']);
        $cognome = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['cognome']);
        $email = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['email']);
        $citta = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['citta']);
        $telefono = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['telefono']);
        $username = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['username']);
        $password = str_replace(["'", '’', '“', '”'], ["\'", "\'", "\'", "\'"], $_POST['password']);

        $select_username = "SELECT * FROM users WHERE user_username='$username'";
        $result_select = mysqli_query($connection, $select_username);

        if (mysqli_num_rows($result_select) == 0) {
            $registrati_dati_user = "INSERT INTO users (user_name,user_surname,user_username,user_password,user_email,user_phone,user_city,user_livel) VALUES ('$name','$cognome','$username','$password','$email','$telefono','$citta',1)";

            $result_registrati = mysqli_query($connection, $registrati_dati_user);

            if ($result_registrati) {
                echo "<script>
    alert('I datti sono stati registrati');
    window.location.href='loginPage.php';
    </script>";
            }
        } else {
            echo "<script>
    alert('Non puoi usare questo username');
    window.location.href='registrati.php';
    </script>";
        }
    }
}
//*******************************************this is end  for registrati data for users *******************************************/

//*******************************************this is start of crea Autore *******************************************/
function creaAutore()
{
    global $connection;
    $_SESSION['authorSuccess'] = false;
    $_SESSION['authorError'] = false;
    $_SESSION['authorExist'] = false;
    $_SESSION['extError'] = false;
    if (isset($_POST['btn_creaAutore'])) {
        $nome = mysqli_real_escape_string($connection, $_POST['nome']);
        $cognome = mysqli_real_escape_string($connection, $_POST['cognome']);
        $citta = mysqli_real_escape_string($connection, $_POST['citta']);
        $descrizione = mysqli_real_escape_string($connection, $_POST['descrizione']);
        $photo = mysqli_real_escape_string($connection, $_FILES['photo']['name']);
        $photoLocationFolder = '../../../image/autoreImg/';
        $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
        $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
        $linkedin = mysqli_real_escape_string($connection, $_POST['linkedin']);
        $instagram = mysqli_real_escape_string($connection, $_POST['instagram']);

        $photoPath = $photoLocationFolder.$photo;
        $extArrPhoto = ['jpg', 'jpeg', 'png'];
        $extPhoto = pathinfo($photoPath, PATHINFO_EXTENSION);
        $extPhoto = strtolower($extPhoto);
        $photoTimestampTitle = time().'.'.$extPhoto;
        $photoPathNew = $photoLocationFolder.$photoTimestampTitle;

        if (in_array($extPhoto, $extArrPhoto)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPathNew)) {
                $select_autore = "SELECT * FROM autore_video WHERE nome_autore='$nome' AND cognome_autore='$cognome'";
                $result_autore_exist = mysqli_query($connection, $select_autore);

                if (mysqli_num_rows($result_autore_exist) == 0) {
                    $insert_autore = "INSERT INTO autore_video(nome_autore, cognome_autore, citta_autore, desc_autore, img_autore, fb_autore, linkedin_autore, twitter_autore, insta_autore) 
            VALUES ('$nome', '$cognome', '$citta', '$descrizione', '$photoTimestampTitle', '$facebook', '$linkedin', '$twitter', '$instagram')";

                    $result = mysqli_query($connection, $insert_autore);
                    if ($result) {
                        $_SESSION['authorSuccess'] = true;
                    } else {
                        $_SESSION['authorError'] = mysqli_error($connection);
                    }
                } else {
                    $_SESSION['authorExist'] = true;
                }
            }
        } else {
            $_SESSION['extError'] = true;
        }
    }
}
//*******************************************this is end  of Crea Autore *******************************************/

//*******************************************this is start  of Modifica Autore  *******************************************/
function modificaAutore()
{
    global $connection;
    $_SESSION['authorModifySuccess'] = false;
    $_SESSION['authorModifyError'] = false;
    $_SESSION['extModifyError'] = false;

    if (isset($_POST['modificaAutore'])) {
        $nome = mysqli_real_escape_string($connection, $_POST['nomeModal']);
        $cognome = mysqli_real_escape_string($connection, $_POST['cognomeModal']);
        $citta = mysqli_real_escape_string($connection, $_POST['cittaModal']);
        $descrizione = mysqli_real_escape_string($connection, $_POST['descrizioneModal']);

        $photo = mysqli_real_escape_string($connection, $_FILES['fotoModal']['name']);
        $photoLocationFolder = '../../../image/autoreImg/';
        $photoPath = $photoLocationFolder.$photo;
        $extArrPhoto = ['jpg', 'jpeg', 'png'];
        $extPhoto = pathinfo($photoPath, PATHINFO_EXTENSION);
        $extPhoto = strtolower($extPhoto);
        $photoTimestampTitle = time().'.'.$extPhoto;
        $photoPathNew = $photoLocationFolder.$photoTimestampTitle;

        $facebook = mysqli_real_escape_string($connection, $_POST['facebookModal']);
        $twitter = mysqli_real_escape_string($connection, $_POST['twitterModal']);
        $linkedin = mysqli_real_escape_string($connection, $_POST['linkedinModal']);
        $instagram = mysqli_real_escape_string($connection, $_POST['instagramModal']);

        $autoreId = $_POST['autoreIdModal'];

        if (in_array($extPhoto, $extArrPhoto)) {
            if (move_uploaded_file($_FILES['fotoModal']['tmp_name'], $photoPathNew)) {
                $update_autore = "UPDATE autore_video SET nome_autore='$nome', cognome_autore='$cognome', citta_autore = '$citta', desc_autore = '$descrizione', img_autore = '$photoTimestampTitle', fb_autore = '$facebook', linkedin_autore = '$linkedin', twitter_autore = '$twitter', insta_autore = '$instagram'
                WHERE id_autore='$autoreId'";

                $result_update_autore = mysqli_query($connection, $update_autore);
                if ($result_update_autore) {
                    $_SESSION['authorModifySuccess'] = true;
                } else {
                    $_SESSION['authorModifyError'] = true;
                }
            }
        } else {
            $_SESSION['extModifyError'] = true;
        }
    }
}

//*******************************************this is end  of Modifica Autore  *******************************************/

//*******************************************this is start  of Elemina Autore  *******************************************/

function deleteAutore()
{
    global $connection;
    $_SESSION['authorDeleteSuccess'] = false;
    $_SESSION['authorDeleteError'] = false;
    if (isset($_POST['delete'])) {
        $idAutore = $_POST['delete'];
        $photoAutore = $_POST['photoAutore'];

        $delete_Autore = "DELETE FROM autore_video WHERE id_autore='$idAutore'";
        $result_delete = mysqli_query($connection, $delete_Autore);
        if ($result_delete) {
            if (file_exists($photoAutore)) {
                unlink($photoAutore);
            }
            $_SESSION['authorDeleteSuccess'] = true;
        } else {
            $_SESSION['authorDeleteError'] = true;
        }
    }
}
//*******************************************this is end  of Elemina Autore  *******************************************/

//******************************************* fun count slide *******************************************/
function countSlide()
{
    global $connection;
    $queryCount = 'SELECT *
        FROM video_slide';
    $resultCount = mysqli_query($connection, $queryCount);
    $countSlide = mysqli_num_rows($resultCount);

    return $countSlide;
}
//******************************************* !end count slide *******************************************/

//******************************************* fun create slide first page *******************************************/
function createSlide()
{
    $_SESSION['slideCreateSuccess'] = false;
    $_SESSION['slideCreateError'] = false;
    $_SESSION['positionNotAvailable'] = false;
    if (isset($_POST['btn_salva'])) {
        global $connection;

        $countSlide = countSlide();
        $video = $_POST['seleziona-video'];
        $position = $_POST['seleziona-position'];

        $count = 5 - $countSlide;

        for ($i = 0; $i < $count; ++$i) {
            $countPosition = positionCheck($position[$i]);
            if ($countPosition > 0) {
                $_SESSION['positionNotAvailable'] = true;
            } else {
                $query = "INSERT INTO video_slide (slide_position, id_video) VALUES ('$position[$i]', '$video[$i]')";
                $result = mysqli_query($connection, $query);
            }
        }

        if ($result) {
            $_SESSION['slideCreateSuccess'] = true;
        } else {
            $_SESSION['slideCreateError'] = true;
        }
    }
}
//******************************************* !end fun create slide first page *******************************************/

//******************************************* fun check if slide position is available *******************************************/
function positionCheck($position)
{
    global $connection;
    $queryCheck = "SELECT COUNT(id_slide) AS count
    FROM video_slide
    WHERE slide_position = '$position'";
    $resultCheck = mysqli_query($connection, $queryCheck);
    $rowCheck = mysqli_fetch_assoc($resultCheck);
    $countPosition = $rowCheck['count'];

    return $countPosition;
}
//******************************************* !end fun check if slide position is available *******************************************/

//******************************************* fun modify slide first page *******************************************/
function modifySlide()
{
    $_SESSION['positionNotAvailable'] = false;
    $_SESSION['positionUpdateSuccess'] = false;
    $_SESSION['positionUpdateError'] = false;
    if (isset($_POST['modificaSlide'])) {
        global $connection;
        $title = $_POST['titleModal'];
        $position = $_POST['positionModal'];
        $videoId = $_POST['videoIdModal'];

        $countPosition = positionCheck($position);

        if ($countPosition > 0) {
            $_SESSION['positionNotAvailable'] = true;
        } else {
            $queryUpdate = "UPDATE video_slide SET slide_position = '$position'
        WHERE id_video = '$videoId'";
            $resultUpdate = mysqli_query($connection, $queryUpdate);
            if ($resultUpdate) {
                $_SESSION['positionUpdateSuccess'] = true;
            } else {
                $_SESSION['positionUpdateError'] = true;
            }
        }
    }
}
//******************************************* !end fun modify slide first page *******************************************/

//******************************************* fun delete slide first page *******************************************/
function deleteSlide()
{
    global $connection;
    $_SESSION['deleteSlideSuccess'] = false;
    $_SESSION['deleteSlideError'] = false;
    if (isset($_POST['deleteSlide'])) {
        $idSlide = $_POST['deleteSlide'];

        $queryDelete = "DELETE FROM video_slide 
                        WHERE id_slide = '$idSlide'";
        $resultDelete = mysqli_query($connection, $queryDelete);
        if ($resultDelete) {
            $_SESSION['deleteSlideSuccess'] = true;
        } else {
            $_SESSION['deleteSlideError'] = true;
        }
    }
}
//******************************************* !end fun delete slide first page *******************************************/

//******************************************* video category slide *******************************************/
function videoSlide($idCategory)
{
    global $connection;

    $query = "SELECT videos.*
              FROM videos
              INNER JOIN video_con_category
              ON videos.id_video = video_con_category.id_video
              AND video_con_category.id_category = '$idCategory'
              LIMIT 5";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count <= 0) {
        echo '<h3>Nessun video trovato</h3>';
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $idVideo = $row['id_video'];
            $titleVideo = $row['title_video'];
            $thumbnail = $row['photo_from_video'];
            $tipologia = $row['tipologia_video'];

            if ($tipologia == 1 || $tipologia == 3) {
                $thumbnailLink = 'thumbnail_video/'.$thumbnail;
                $videoLink = 'video_details.php?id='.$idVideo;
            } else {
                $thumbnailLink = 'image/podcast.jpg';
                $videoLink = 'podcast_details.php?id='.$idVideo;
            }

            echo '<div class="item">
                    <div class="zmovo-video-item-box">
                        <div class="zmovo-video-box-inner">
                            <div class="zmovo-v-box-img gradient">
                                <img src="'.$thumbnailLink.'" alt="" style="max-height: 250px !important;">
                                <div class="ply-btns">
                                    <a href="'.$videoLink.'" data-video-url="" class="ply-btn"><img src="image/play.svg" alt=""></a>
                                </div>
                                <div class="zmovo-v-box-content">
                                    <a href="'.$videoLink.'">'.$titleVideo.'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }
}
//******************************************* !end video category slide *******************************************/

//******************************************* delete subscription *******************************************/
function deleteSubscription($userId, $connection)
{
    $query = "DELETE FROM video_buy
        WHERE id_user = '$userId'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script language="javascript">alert("L\'abbonamento è stato cancellato")</script>';
    } else {
        echo '<script language="javascript">alert("L\'abbonamento non è stato cancellato")</script>';
    }
}

//******************************************* !end delete subscription *******************************************/

//******************************************* delete bought videos *******************************************/
function deleteVideoBought($userId, $idVideo, $connection)
{
    $query = "DELETE FROM video_buy_idVideos
              WHERE id_user = '$userId'
              AND id_video = '$idVideo'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script language="javascript">alert("L\'abbonamento a questo video è stato cancellato")</script>';
    }
}
//******************************************* !end delete bought videos *******************************************/

//******************************************* create subscription *******************************************/
function createSubscription()
{
    $_SESSION['subscriptionExist'] = '';

    global $connection;
    if (isset($_POST['createSub'])) {
        $userId = $_POST['userNameModal'];
        $subscription = $_POST['subscriptionModal'];
        $idVideos = $_POST['videosModal'];
        $clockNow = date('h:i:s');

        $startSub = date('Y-m-d', strtotime($_POST['startModal']));
        $startFullTime = $startSub.' '.$clockNow;
        $endSub = date('Y-m-d', strtotime($_POST['endModal']));
        $endFullTime = $endSub.' '.$clockNow;

        if ($subscription == 1) {
            $now = date('Y-m-d h:i:s');

            for ($i = 0; $i < count($idVideos); ++$i) {
                $queryCountIdVideos = "SELECT COUNT(id_video_buy) AS count, videos.title_video
            FROM video_buy_idVideos, videos
            WHERE video_buy_idVideos.id_video = videos.id_video
				AND video_buy_idVideos.id_user = '$userId'
            AND video_buy_idVideos.id_video = '$idVideos[$i]'";
                $resultCountIdVideos = mysqli_query($connection, $queryCountIdVideos);
                $rowCountIdVideos = mysqli_fetch_assoc($resultCountIdVideos);
                $countIdVideos = $rowCountIdVideos['count'];
                $titleVideos = addslashes($rowCountIdVideos['title_video']);

                if (empty($titleVideos)) {
                    $queryVideoId = "INSERT INTO video_buy_idVideos (id_video, id_user) VALUES ('$idVideos[$i]', '$userId')";
                    $resultVideoId = mysqli_query($connection, $queryVideoId);
                } else {
                    $_SESSION['subscriptionExist'] = '<script language="javascript">alert("Il video '.mb_strimwidth($titleVideos, 0, 10).'... è già stato acquistato ")</script>';
                }
            }
            if ($resultVideoId) {
                $query = "INSERT INTO video_buy (id_user, subscription, data_subscription_start) VALUES ('$userId', '$subscription', '$now')";
                $result = mysqli_query($connection, $query);
            }
        } else {
            $query = "INSERT INTO video_buy (id_user, subscription, data_subscription_start, data_subscription_end) VALUES ('$userId', '$subscription', '$startFullTime', '$endFullTime')";
            $result = mysqli_query($connection, $query);
        }
        if ($result) {
            echo '<script language="javascript">alert("L\'abbonamento è stato creato")</script>';
        }
    }
}
//******************************************* !end create subscription *******************************************/

//******************************************* delete premium subscription *******************************************/
function deletePremiumSub()
{
    if (isset($_POST['deletePremium'])) {
        global $connection;
        $userId = $_POST['deletePremium'];
        deleteSubscription($userId, $connection);
    }
}
//******************************************* !end delete premium subscription *******************************************/

//******************************************* delete pay-per-view subscription *******************************************/
function deletePayPerViewSub()
{
    if (isset($_POST['deletePPV'])) {
        global $connection;
        $userId = $_POST['deletePPV'];
        $idVideo = $_POST['idVideo'];
        $queryCount = "SELECT id_user
                       FROM video_buy_idVideos
                       WHERE id_user = '$userId'";
        $resultCount = mysqli_query($connection, $queryCount);
        $count = mysqli_num_rows($resultCount);

        if ($count > 1) {
            deleteVideoBought($userId, $idVideo, $connection);
        } else {
            deleteVideoBought($userId, $idVideo, $connection);
            deleteSubscription($userId, $connection);
        }
    }
}
//******************************************* !end delete pay-per-view subscription *******************************************/

//******************************************* find video category by id *******************************************/
function videoCategory($connection, $videoId)
{
    $queryCategoryVideo = "SELECT category_video
FROM video_category
WHERE video_category.id_category IN (
SELECT id_category
FROM video_con_category
WHERE video_con_category.id_video = '$videoId'
AND video_con_category.id_category = video_category.id_category)";
    $resultCategoryVideo = mysqli_query($connection, $queryCategoryVideo);
    $categoryVideo = '';
    while ($rowCategory = mysqli_fetch_array($resultCategoryVideo)) {
        $categoryVideoName = $rowCategory['category_video'];
        $categoryVideo .= $categoryVideoName.',';
    }
    $categoryVideo = substr($categoryVideo, 0, -1);

    return $categoryVideo;
}
//******************************************* !end find video category by id *******************************************/

//*******************************************  find author's video by id *******************************************/
function autoreVIdeo($idAutore)
{
    global $connection;
    $queryAutore = "SELECT CONCAT(nome_autore, ' ', cognome_autore) AS fullName
    FROM autore_video
    WHERE id_autore = '$idAutore'";
    $resultAutore = mysqli_query($connection, $queryAutore);
    $rowAutore = mysqli_fetch_assoc($resultAutore);
    $fullName = $rowAutore['fullName'];

    return $fullName;
}
//******************************************* !end author's video by id *******************************************/

//*******************************************  find author's video by id *******************************************/
function extFile($pathFile)
{
    $extFile = pathinfo($pathFile, PATHINFO_EXTENSION);
    $extFile = strtolower($extFile);

    return $extFile;
}
//******************************************* !end author's video by id *******************************************/

//*******************************************  add video category *******************************************/
function videoCategoryInsert($category, $idVideo, $connection)
{
    $query_category = "INSERT INTO video_con_category (id_category, id_video) VALUES";
    for ($i = 0; $i < count($category); $i++) {
        $query_category .=  " ('$category[$i]', '$idVideo'),";
    }
    $query_category = rtrim($query_category, ',');
    $result_category = mysqli_query($connection, $query_category);
}
//******************************************* !end add video category *******************************************/

//*******************************************  get video file names *******************************************/
function videoCurrentFileTitle($idVideo, $connection)
{
    //get video data
    $queryVideo = "SELECT path_video, path_trail_video, photo_from_video, super_categorie
FROM videos
WHERE id_video = '$idVideo'";
    $resultVideo = mysqli_query($connection, $queryVideo);
    $rowVideo = mysqli_fetch_assoc($resultVideo);
    $existingVideoTitle = $rowVideo['path_video'];
    $existingTrailTitle = $rowVideo['path_trail_video'];
    $existingThumbnailTitle = $rowVideo['photo_from_video'];
    $superCategorie = $rowVideo['super_categorie'];

    $data = array(
    'videoTitle' => $existingVideoTitle,
    'trailerTitle' => $existingTrailTitle,
    'thumbnailTitle' => $existingThumbnailTitle,
    'superCategorie' => $superCategorie
);

    return $data;
}
//******************************************* !end get video file names *******************************************/

//*******************************************  add video category *******************************************/
function deleteVideo()
{
    global $connection;
    if (isset($_POST['btn_delete'])) {
        $idVideo = $_POST['btn_delete'];
        $data = videoCurrentFileTitle($idVideo, $connection);
        $videoTitle = $data['videoTitle'];
        $podcast_location = '../../../upload_podcast/';
        $video_location = '../../../upload_video/';
        $trailerTitle = $data['trailerTitle'];
        $trailer_location = '../../../trail_video/';
        $thumbnailTitle = $data['thumbnailTitle'];
        $thumbnail_location = '../../../thumbnail_video/';
        $superCategorie = $data['superCategorie'];
    
        if ($superCategorie == 1 || $superCategorie == 3) {
            $videoPath = $video_location.$videoTitle;
        } else {
            $videoPath = $podcast_location.$videoTitle;
        }
    
        $trailerPath = $trailer_location.$trailerTitle;
        $thumbnailPath = $thumbnail_location.$thumbnailTitle;
    
    
        global $deleteVideoResponse;
        $deleteVideoResponse = "";
        if (empty($idVideo)) {
            $deleteVideoResponse = '<script language="javascript">swal("Errore!", "È necessario selezionare un video!", "error").then(function() {
                location.reload();
            })</script>';
        } else {
            $query = "DELETE FROM videos
            WHERE id_video = '$idVideo'";
            $result = mysqli_query($connection, $query);
            if ($result) {
                unlink($videoPath);
                unlink($trailerPath);
                unlink($thumbnailPath);
                $deleteVideoResponse = '<script language="javascript">swal("Successo!", "Il video è stato eliminato!", "success".then(function() {
                    location.reload();
                }))</script>';
            } else {
                $deleteVideoResponse = '<script language="javascript">swal("Errore!", "Il video non è stato eliminato!", "error").then(function() {
                    location.reload();
                })</script>';
            }
        }
    }
}
//******************************************* !end add video category *******************************************/

//******************************************* add this video Preferito *******************************************/

    function video_preferito()
    {
        if (isset($_POST['preferito'])) {
            global $connection;
            $user_id = $_SESSION['users_id'];
            $preferito = $_POST['preferito'];

            if ($preferito !="" && $preferito != null) {
                $query="SELECT COUNT(*) AS totalcount FROM prefiriti WHERE preferiti_video='$user_id'";
           
                $result= mysqli_query($connection, $query);
          
                $rowcount=mysqli_fetch_assoc($result);
           
                if ($rowcount['totalcount'] == 0) {
                    $query_insert = "INSERT INTO prefiriti(preferiti_video,preferiti_userid) VALUES ('$preferito','$user_id')";
                
            
                    $result_insert = mysqli_query($connection, $query_insert);
                }
            }
            return header('Location: video_details.php?id='.$preferito);
        }
    }
 

//******************************************* add this video Preferito *******************************************/

//******************************************* REmuve this video Preferito *******************************************/
function video_unpreferito()
{
    if (isset($_POST['unpreferito'])) {
        global $connection;
        $user_id = $_SESSION['users_id'];
        $unpreferito = $_POST['unpreferito'];

        if ($unpreferito !="" && $unpreferito != null) {
            $query_delete = "DELETE FROM prefiriti WHERE preferiti_video='$unpreferito' AND preferiti_userid='$user_id'";
           
            mysqli_query($connection, $query_delete);
        }
        return header('Location: video_details.php?id='.$unpreferito);
    }
}



//******************************************* REmuve this video Preferito *******************************************/


//******************************************* fun move file to server *******************************************/
function uploadFile($filePath, $fileName, $extArr, $temp)
{
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $ext = strtolower($ext);
    $newTitle = time().'.'.$ext;
    $fileFullPath = $filePath.$newTitle;

    if ((in_array($ext, $extArr) && ($newTitle != ''))) {
        if (move_uploaded_file($temp, $fileFullPath)) {
            $data['newTitle'] = $newTitle;
            $data['response'] = 1;
            return  $data;
        } else {
            echo 'failed upload';
        }
    } else {
        echo 'ext error';
    }
}
//******************************************* /.end fun move file to server *******************************************/


//******************************************* create serial *******************************************/
function saveSerial($movedFile)
{
    if (isset($_POST['saveSerial'])) {
        global $connection, $createSerialResponse;
        $createSerialResponse = '';
    
        $title = htmlenteties($_POST['title']);
        $thumbnail = basename($_FILES["thumbnail"]["name"]);
        $thumbnailFolder = '../../../thumbnail_serial/';
        $tempThumbnail = $_FILES['thumbnail']['tmp_name'];
        $extensions_arr_thumbnail = ['jpg', 'jpeg', 'png'];
 
        $season = htmlenteties($_POST['season']);

        $movedFile = uploadFile($thumbnailFolder, $thumbnail, $extensions_arr_thumbnail, $tempThumbnail);
      
        if ($movedFile['response'] == 1) {
            $newTitle = $movedFile['newTitle'];
            $query = "INSERT INTO serial (serial_name, serial_thumbnail, serial_season)
            VALUES ('$title', '$newTitle', '$season') ";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $createSerialResponse = '
            <script language="javascript">
                        swal("Successo!", "Il seriale è stato creato!", "success");
            </script> ';
            } else {
                $createSerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Il seriale non è stato creato!", "error");
            </script> ';
            }
        } else {
            if ($movedFile == 'failed upload') {
                $createSerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Si è verificato un errore imprevisto! Riprovare di nuovo!", "error");
            </script> ';
            }

            if ($movedFile == 'ext error') {
                $createSerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Il file non è supportato!", "error");
            </script> ';
            }
        }
    }
}
//******************************************* /.end create serial *******************************************/


//******************************************* modify serial *******************************************/
function modifySerial($movedFile)
{
    if (isset($_POST['modifySerial'])) {
        global $connection, $modifySerialResponse;
        $modifySerialResponse = '';

        $serialTitle = addslashes($_POST['modalTitle']);
    
        $serialThumbnail = $_FILES['modalThumbnail']['name'];
        $thumbnailFolder = '../../../thumbnail_serial/';
        $tempThumbnail = $_FILES['modalThumbnail']['tmp_name'];
        $extensions_arr_thumbnail = ['jpg', 'jpeg', 'png'];
    
        $serialSeason = addslashes($_POST['modalSeason']);
        $serialId = $_POST['modifySerial'];

        $query = "UPDATE serial
    SET serial_name = '$serialTitle',
    serial_season = '$serialSeason'";

        if (!empty($serialThumbnail)) {
            $movedFile = uploadFile($thumbnailFolder, $serialThumbnail, $extensions_arr_thumbnail, $tempThumbnail);
            if ($movedFile['response'] == 1) {
                $newTitle = $movedFile['newTitle'];
                $query .= ", serial_thumbnail = '$newTitle'";
            } else {
                if ($movedFile == 'failed upload') {
                    $modifySerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Si è verificato un errore imprevisto! Riprovare di nuovo!", "error");
            </script> ';
                }

                if ($movedFile == 'ext error') {
                    $modifySerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Il file non è supportato!", "error");
            </script> ';
                }
            }
        }

        $result = mysqli_query($connection, $query);
        if ($result) {
            $modifySerialResponse = '
            <script language="javascript">
                        swal("Successo!", "Il seriale è stato creato!", "success");
            </script> ';
        } else {
            $modifySerialResponse = '
            <script language="javascript">
                        swal("Errore!", "Il seriale non è stato creato!", "error");
            </script> ';
        }
    }
}
//******************************************* /.end modify serial *******************************************/


//******************************************* check if user exist when login with google/facebook api*******************************************/
function loginAPI($userEmail, $givenName, $familyName){
  global $connection;
    //query to get users from user
$query = "SELECT * FROM users WHERE user_email = '$userEmail'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if ($count == 0) {
    $queryinstert = "INSERT INTO users(user_name, user_surname, user_username, user_email, user_livel) VALUES ('$givenName', '$familyName', '$userEmail', '$userEmail', '1')";
    $result_insert = mysqli_query($connection, $queryinstert);
    $lastInsertedId = mysqli_insert_id($connection);

    if($result_insert){
        $queryCheckInsertedRow = "SELECT * FROM users WHERE user_id = '$lastInsertedId'";
      
        $resultCheckInsertedRow = mysqli_query($connection, $queryCheckInsertedRow);
        $rowCheckInsertedRow = mysqli_fetch_assoc($resultCheckInsertedRow);

        $_SESSION['users_id'] = $rowCheckInsertedRow['user_id'];
        $_SESSION['username'] = $userEmail;
        $_SESSION['user_livel'] = $rowCheckInsertedRow['user_livel'];
    }
}else{

    $_SESSION['users_id'] = $row['user_id'];
    $_SESSION['username'] = $userEmail;
    $_SESSION['user_livel'] = $row['user_livel'];
}
return header('Location: index.php');

}
//******************************************* /.end check if user exist when login with google/facebook api*******************************************/