
<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'admin');
   define('DB_PASSWORD', 'admin');
   define('DB_DATABASE', 'test_db');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
// we connect to localhost and socket e.g. /tmp/mysql.sock

// variant 1: omit localhost
// $link = mysql_connect(':/tmp/mysql', 'mysql_user', 'mysql_password');
// if (!$link) {
    // die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';
// mysql_close($link);


// // variant 2: with localhost
// $link = mysql_connect('localhost:/tmp/mysql.sock', 'mysql_user', 'mysql_password');
// if (!$link) {
    // die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';
// mysql_close($link);
?>
