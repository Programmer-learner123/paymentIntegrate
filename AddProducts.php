<?php 
    require 'config.php';
    $msg = "";
    if(isset($_POST['submit'])){
        $p_name = $_POST['pName'];
        $p_price = $_POST['pPrice'];
        $target_dir = "images/";
       
        $target_file = $target_dir.basename($_FILES['pImage']["name"]);
        move_uploaded_file($_FILES['pImage']["tmp_name"], $target_file);

        $sql = "INSERT INTO product (product_name,product_price,product_image) VALUES('$p_name', '$p_price', '$target_file')";

        if(mysqli_query($conn, $sql)){
            $msg = "Product Added Successfully to the Database!";
        }
        else{
            $msg = "Failed to add the Product!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Information</title>
   <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
      
        <h2 class="productInfo">Admin Home Page <br><br>Add Product Information</h2>
        <form action="" method="post" enctype="multipart/form-data" id="form-box">
            <div class="form-group">
                <input type="text" name="pName" class="input1" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="pPrice" class="input1" placeholder="Product Price" required>
            </div>
            <div class="imagestyle">
          <p>Choose Product Image</p> &nbsp; &nbsp; &nbsp;
                 <input type="file" name="pImage" class="imagechoose" id="customFile" placeholder="Choose a file" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn" value="ADD" >
            </div>
            
        </form>
        <div class="message">
                <h4><?= $msg; ?></h4>
        </div>
        <div class="goto">
            <a href="./products.php" class="gotopage">Go To Product Page</a>
        </div>
    
    </div>
</body>
</html>