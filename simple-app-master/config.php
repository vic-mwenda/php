<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'TrainDB';

//connection
$conn = mysqli_connect($servername,$username,$password,$db_name);

if(!$conn){
    echo "Connection to db failed ".mysqli_connect_error();
}

?>