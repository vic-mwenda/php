
<?php
echo 'user1';
//fetch user from db using the receiver id($user_id)
require 'header.php';
require 'config.php';
//grab id;use $_GET[]
if (isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
//    fetch data from db using id
    $sql = "SELECT `id`, `price`, `description`, `quantity`, `color`, `condition' FROM `records` WHERE id='$id'";
    $users = mysqli_query($connection,$sql);
//create associative array to split data into column title and actual values use mysqli_fetch_
    $row = mysqli_fetch_assoc($users);

}


echo '<table class="table">';
   echo '<thead class="thead-dark">
    <tr>';
    echo    '<th scope="col">#</th>';
      echo  '<th scope="col">price</th>';
     echo   '<th scope="col">description</th>';
      echo  '<th scope="col">quantity</th>';
     echo   '<th scope="col">color</th>';
    echo    '<th scope="col">condition</th>
    </tr>';
   echo '</thead>';
   echo '<tbody>
    <tr>';
      echo  '<th scope="row">1</th>';
      echo  '<td>' ; $row['price'].' ></td>';
      echo  '<td>';  $row['description'].'></td>';
      echo  '<td>' ; $row['quantity'].' ></td>';
      echo  '<td>' ; $row['color'].'></td>';
       echo '<td>' ; $row['condition'].' ></td>
    </tr>';

    echo '</tbody>
</table>'

?>