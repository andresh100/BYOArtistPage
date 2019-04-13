<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'webdb.uvm.edu');
define('DB_USERNAME', 'ahansen1_admin');
define('DB_PASSWORD', 'u990PMGWeDzj');
define('DB_NAME', 'AHANSEN1_ByoArtistPage');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>