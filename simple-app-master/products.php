<?php
require 'header.php';
require 'config.php';

$name = $price=$description=$image =$condition=$mesaage='';
$name_err = $price_err=$description_err=$image_err ='';

if(isset($_POST['create_btn']) and isset($_FILES['uploadedFile'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['description'];
    $condition = $_POST['condition'];
//    echo "$name, $price, $description, $condition";
//    $image = $_POST['product_img'];


    if(!isset($name)){
        $name_err = "Fill in the field";
    }else{
        $name = cleaner($name);
    }

    if(!isset($price)){
        $price_err = "Fill in the field";
    }else{
        $price = cleaner($price);
    }

    if(!isset($condition)){
        $condition_err = "Fill in the field";
    }else{
        $condition = cleaner($condition);
    }
    echo $name."<br>";
    echo $price."<br>";
    echo $description."<br>";
    echo $condition."<br>";


//    process image image

    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $image = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $image);
    $fileExtension = strtolower(end($fileNameCmps));

    $extensions= array("jpeg","jpg","png");

    if(in_array($fileExtension,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if(empty($errors)==true) {
        move_uploaded_file($fileTmpPath,"images/".$image);
    }else{
        print_r($errors);
    }
    $sql = "INSERT INTO `products`(`id`, `name`, `price`, `description`, `image`, `product_condition`) VALUES (NULL,'$name','$price','$description','$image','$condition')";
    if(mysqli_query($conn,$sql)){
        $msg= "Product added successfuly";
        header('location:products.php');
        exit();
    }else{
//        $msg= "Product not added successfuly";
//        header('location:products.php?message');
//        exit();
        echo "Data not inserted ".mysqli_error($conn);
    }
}

function cleaner($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <div class="jumbotron">
        <h2 class="content-title">Welcome to Products page</h2>
        <div class="message">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
            <table class="table table-stripped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM `products`";
                $products = mysqli_query($conn,$sql);


                    while($row = mysqli_fetch_array($products)){
                        echo "<tr>";
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $condition = $row['product_condition'];

                        echo "<td> $id</td>";
                        echo "<td> $name</td>";
                        echo "<td> $price</td>";
                        echo "<td> $condition</td>";
                        echo "<td> $description</td>";
                        echo "<td style='text-align: center'>";
                            echo "<a>";
                            echo "<a href='delete.php?id=$id' class='btn btn-danger' style='margin-right: 10px'>Delete</a>";
                            echo "<a href='details.php?id=$id' class='btn btn-primary'>View</a>";
                            echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="product_price">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" style="background-color:rgba(40, 61, 177, 0.13);" ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="uploadedFile" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="radio" name="condition" value="good">Good
                        <input type="radio" name="condition" value="fair">Fair
                        <input type="radio" name="condition" value="bad">Bad <br>
                    </div>
                    <button type="submit" class="btn btn-dark" name="create_btn">Create Product</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
            $sql = "SELECT * FROM `products`";
            $products = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($products)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $image = $row['image'];
                    $description = $row['description'];
                    $condition = $row['product_condition'];
                    echo "<div class='col-md-3 col-lg-3 col-xl-3'>";
                        echo "<div class='card' style='500px;width=200px'>";
                            echo "<img src=images/$image class='card-img' style='width: 100%;height: 250px;border-bottom: 1px solid blue'>";

                            echo "<div class='card-body'>";
                                echo "<p>$name <br> $price <br></p>";
                            echo "</div>";
                            echo "<div></div>";
                        echo "</div>";
                    echo "</div>";
            }
        ?>

    </div>
</div>
<?php
require 'footer.php';
?>

