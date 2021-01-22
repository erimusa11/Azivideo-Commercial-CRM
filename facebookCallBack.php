<?php 
session_start();
require_once "facebookConfig.php";
include "functions.php";
global $connection;
$permissions = array('email'); // Optional permissions
$loginUrlFacebook = $helper->getLoginUrl('https://aziflix.it/facebookCallBack.php', $permissions);
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

if(!$accessToken->isLongLived()){
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }
}
 
//$fb->setDefaultAccessToken($accessToken);
 
# These will fall back to the default access token
$res    =   $fb->get('/me?fields=name,email',$accessToken->getValue());
$fbUser =   $res->getDecodedBody();
 
 
$resImg     =   $fb->get('/me/picture?type=large&amp;redirect=false',$accessToken->getValue());
$picture    =   $resImg->getGraphObject();
 
 
$fbUserId       =   $fbUser['id'];
$fbUserName  =   explode(" ",$fbUser['name']);
$userFirstName = $fbUserName[0];
$userLastName = $fbUserName[1];
$fbUserEmail   =   $fbUser['email'];
$fbAccessToken =   $accessToken->getValue();

loginAPI($fbUserEmail, $userFirstName, $userLastName);
?>