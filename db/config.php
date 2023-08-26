<?php
// define('HOST', 'localhost');
// define('USERNAME', 'root');
// define('PASSWORD', '');
// define('DATABASE', 'do_an_web');


// $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

// mysqli_set_charset($connect, 'utf8');

// if ($connect === false) {
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

$connect = mysqli_init();
mysqli_ssl_set($connect, NULL, NULL, "db/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($connect, "skinlele-database.mysql.database.azure.com", "skinlele", "huyphan2002@", "do_an_web", 3306, MYSQLI_CLIENT_SSL);
mysqli_set_charset($connect, 'utf8');
if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
