<?php
require 'header.php';//to include header
require 'config.php';

echo '<h1>our users</h1>';
//query for selecting all records from table users
$sql = 'SELECT * FROM `records`';


//store data from database in a variable called users
$user = mysqli_query($connection, $sql);

//loop through data from database
while ($row = mysqli_fetch_array($user)){
    echo "<div class='card' >";
    $user_id = $row['id'];
    echo "<a href='details.php?id=$user_id'>";

    echo $row['id'];
    echo $row['price'];
    echo $row['description'];
    echo $row['quantity'];
    echo $row['color'];
    echo $row['condition'];


    echo "</a>";
    echo "<a href='delete.php?id=$user_id'>delete;</a>";

    echo "</div>";
}
require 'footer.php';
?>
<a href="details.php?id=7">go</a>

