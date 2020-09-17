<?php 
    require 'config.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "SELECT * FROM product WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $pname = $row['product_name'];
        $pprice=$row['product_price'];
        $del_charge = 100;
        $total_price = $pprice+$del_charge;
        $pimage = $row['product_image'];
    }
    else {
        echo 'No Product Found';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Order </title>
    <link rel="stylesheet" href="./style.css">
</head>
<body class="indexBody">
    
    <div class="list">
        <ul class="ulStyle">
             <li class="li1"><a href="#Product">𝘼𝙧𝙩𝙝𝙪𝙧 𝘽𝙧𝙖𝙣𝙙 𝙎𝙩𝙤𝙧𝙚</a></li>
            <ul class="secondul">
            <li><a  href="./index.php">Home</a></li>
            <li><a href="./products.php">Products</a></li>
            </ul>
             
        </ul>
    </div>

    <div class="column">
        <div class="row">
                <h1 style="font-family: cursive; color: #2b3856; font-size: 40px;" >Fill the details to complete your order.</h1>
                <h2 style="font-family: cursive; color: #2b3856; font-size: 30px;">Product Details : </h2>
                <div class="tablestyle">
                    <table>
                        <tr>
                            <th>Product Name:  </th>
                            <td><?= $pname; ?> </td>
                            <td rowspan="4"><img src="<?= $pimage; ?>"></td>
                        </tr>
                        <tr>
                            <th>Product Price:  </th>
                            <td>Rs. <?= number_format($pprice); ?>/-</td>
                        </tr>
                        <tr>
                            <th>Delivery Charges: </th>
                            <td>Rs. <?= number_format($del_charge); ?>/-</td>
                        </tr>
                        <tr>
                            <th>Total Price(Including GST): </th>
                            <td>Rs. <?= number_format($total_price); ?>/-</td>
                        </tr>
                    </table>  
                </div>
                <div class="userstyle">
                    <form class="formstyle" action="./pay.php" method="post" accept-charset="utf-8">
                        <div class="heading3">
                             <h3>Enter your details : </h3>
                        </div>   
                        <div>
                            <input type="hidden" name="product_name" value="<?= $pname;?>">
                            <input type="hidden" name="product_price" value="<?= $total_price;?>">
                        </div>
                        <div>
                            <input type="text" name="name" placeholder="Enter your Name" required>
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Enter your Email Id" required>
                        </div>
                        <div>
                             <input type="tel" name="phone" placeholder="Enter your Phone number" required>
                        </div>
                        <div>  
                             <input type="submit" class="btn" name="submit" value="Click To Pay: Rs. <?= number_format($total_price); ?>/- ">
                        </div>
                       
                    </form>
                </div>
        </div>
    </div>
 
</body>
</html>