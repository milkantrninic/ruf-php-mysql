
<?php
$servername = "devkinsta_db";
$username = "root";
$password = "y9Q66z79CGQiZid3";
$dbname = "racun";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
// else {
//     //$query_read = "SELECT id FROM `users` WHERE email = 'milkan2002@yahoo.com' LIMIT 1";
//     $query_insert = "INSERT INTO `users` (`email`, `password`) VALUES ('milkan2002@gmail.com', md5('a'))";
//     $result = $link->query($query_insert);
//     var_dump($result);
    
// }

?>

