<?php
define('DB_SERVER', 'db.multipass');
define('DB_USERNAME', 'olenkacrud');
define('DB_PASSWORD', 'olenka@123');
define('DB_NAME', 'olenkabar');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

