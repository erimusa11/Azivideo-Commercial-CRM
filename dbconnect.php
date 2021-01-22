<?php

DEFINE('DB_HOSTNAME', 'localhost');
DEFINE('DB_DATABASE', 'interna5_dbflix');
DEFINE('DB_USERNAME', 'interna5_usflix');
DEFINE('DB_PASSWORD', 'Emmy55#9');

$connection = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

mysqli_set_charset($connection, "utf8");
date_default_timezone_set('Europe/Rome');
