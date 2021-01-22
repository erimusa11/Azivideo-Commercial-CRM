<?php


require_once "./assets/GoogleAPI/vendor/autoload.php";
$googleClient = new Google_Client();
$googleClient->setClientId("135446154272-n7ejjho41156tupo1198blk2ogv9l3o4.apps.googleusercontent.com");
$googleClient->setClientSecret("Exkbuj0dyJk2U88gMjiLgyRs");
$googleClient->setApplicationName("Azivideo");
$googleClient->setRedirectUri('https://aziflix.it/googleCallBack.php');
$googleClient->addScope("https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email");