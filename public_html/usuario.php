<?php

require '../includes/config/database.php';
$db = conectarDB();

$email = "cousillas.rodrigo@gmail.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$query = " INSERT INTO usuarios (email, password) values ( '${email}', '${passwordHash}');";

mysqli_query($db, $query);

?>