<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body class="indexBody">
    <div class="list">
        <ul class="ulStyle">
             <li class="li1"><a href="#Product">𝐒𝐡𝐞𝐢𝐧 𝐁𝐫𝐚𝐧𝐝 𝐒𝐭𝐨𝐫𝐞</a></li>
            <ul class="secondul">
            <li><a  href="./index.php">Home</a></li>
            <li><a href="./products.php">Products</a></li>
            </ul>
             
        </ul>
    </div>
    <?php 
        require 'config.php';
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn,$sql);
    ?>
    <div class="container">
        <?php 
            while($row=mysqli_fetch_array($result)){

            
        ?>
       <div class="grid-container">
            <div class="grid-item">
                <img src="<?= $row['product_image']; ?>" height="350px;" width="350px;">
                <h4>Product: <?= $row['product_name']; ?></h4>
                <h3>Price: <?= number_format($row['product_price']); ?>/-</h3>
                <a href="order.php?id=<?= $row['id']; ?>"><button type="submit">Buy Now</button></a>
            </div>
            
            <!-- <div class="grid-item">2</div>
            <div class="grid-item">3</div>  
            <div class="grid-item">4</div>
            <div class="grid-item">5</div>
            <div class="grid-item">6</div>  
            <div class="grid-item">7</div>
            <div class="grid-item">8</div>
            <div class="grid-item">9</div>   -->
       </div>
       <?php } ?>
    </div>

</body>
</html>