<?php
session_start();
include_once('./assets/FacebookAPI/vendor/autoload.php');
$fb = new Facebook\Facebook(array(
    'app_id' => '414793606267117', // Replace with your app id
    'app_secret' => '838595f9e95cc3ffd4179ca06674e4da',  // Replace with your app secret
    'default_graph_version' => 'v9.0'
));
 
$helper = $fb->getRedirectLoginHelper();
?>