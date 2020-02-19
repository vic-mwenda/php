<?php
require 'header.php';
require 'config.php';
$id=$name=$price=$condition=$image='';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT `id`, `name`, `price`, `description`, `image`, `product_condition` FROM `products` WHERE id='$id'";

    $user = mysqli_query($conn, $sql);

//loop through data from db
    while($row = mysqli_fetch_array($user)){
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        $description = $row['description'];
        $condition = $row['product_condition'];
    }
}
if(isset($_POST['update_btn']) and isset($_GET['id'])){
    $id = $_GET['id'];
    echo "$id";

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
    }
    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }
//    echo $name;
//    $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description'],`product_condition`='$condition' WHERE id='$id'";
//    if(mysqli_query($conn,$sql)){
//        header('location:products.php?id= $_GET["id"]');
//    }
}
?>

<div class="container">
    <div class="jumbotron">
        <h2 class="content-title"><?php echo "Welcome to <span style='color: blue;font-weight: bold'>$name</span> page"?></h2>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card">
                <?php
                    echo "<img src=images/$image class='card-img' style='width: 100%;height: 250px;border-bottom: 1px solid blue'>";
                ?>
            </div>
            <br>
            <div class="card">
              <p class="card-text" style="padding: 6px">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aut ratione temporibus vitae voluptas. A assumenda esse eum exercitationem.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aut ratione temporibus vitae voluptas. A assumenda esse eum exercitationem.
              </p>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="product_name" value="<?php echo $name?>">
                            <input type="number" hidden name="id" value="<?php echo $id?>">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="product_price"  value="<?php echo $price?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" style="background-color:rgba(40, 61, 177, 0.13);" >
                                <?php echo $description ?>;
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="uploadedFile" class="form-control">
                        </div>
                        <div class="form-group">
                           <?if ($condition == 'fair') {
                               echo "<input type='radio' name='condition' value='good' checked ><span class='bg-info' style='padding: 6px;margin-left: 5px'>Fair</span>";
                           }elseif(($condition == 'good')){
                               echo "<input type='radio' name='condition' value='good' checked ><span class='bg-success' style='padding: 6px;margin-left: 5px'>Good</span>";
                           }elseif (($condition == 'bad')){
                               echo "<input type='radio' name='condition' value='good' checked ><span class='bg-danger' style='padding: 6px;margin-left: 5px'>Bad</span>";
                           }
                           ?>
                        </div>
                        <button type="submit" class="btn btn-dark" name="update_btn">Update Product</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
require 'footer.php';
?>