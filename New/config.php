<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$databasename = 'supermarket';
//to connect to a database use the php function called mysqli_connect()

//mysqli_function returns a boolean datatype

$connection = mysqli_connect($hostname,$username,$password,$databasename);
//check connection
if ($connection == false){
    echo "connection not successful <br>";
//    stop connection if unsuccessful
    die("ERROR: ".mysqli_connect_error());
}
?>