<?php
// define('HOST', 'localhost');
// define('USERNAME', 'root');
// define('PASSWORD', '');
// define('DATABASE', 'do_an_web');
// $link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
// if ($link === false) {
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

$link = mysqli_init();
mysqli_ssl_set($link, NULL, NULL, "../../db/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($link, "skinlele-database.mysql.database.azure.com", "skinlele", "huyphan2002@", "do_an_web", 3306, MYSQLI_CLIENT_SSL);
mysqli_set_charset($link, 'utf8');
