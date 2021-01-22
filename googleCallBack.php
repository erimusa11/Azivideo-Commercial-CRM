<?php
session_start();
require_once "googleConfig.php";
include "functions.php";
global $connection;
if (isset($_SESSION['access_token'])) {
    $googleClient->setAccessToken($_SESSION['access_token']);
} elseif (isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
}
$oAuth = new Google_Service_Oauth2($googleClient);
$userData = $oAuth
    ->userinfo_v2_me
    ->get();

$userId = $userData['id'];
$userEmail = $userData['email'];
$familyName = $userData['familyName'];
$givenName = $userData['givenName'];

loginAPI($userEmail, $givenName, $familyName);