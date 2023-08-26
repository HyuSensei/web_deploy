<?php

// $connect = mysqli_connect('localhost', 'root', '', 'do_an_web');

// mysqli_set_charset($connect, 'utf8');
$connect = mysqli_init();
mysqli_ssl_set($connect, NULL, NULL, "../db/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($connect, "skinlele-database.mysql.database.azure.com", "skinlele", "huyphan2002@", "web_deploy", 3306, MYSQLI_CLIENT_SSL);
mysqli_set_charset($connect, 'utf8');
