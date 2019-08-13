<?php 

    include("config/db_connection.php");

        

    $sql = "SELECT product_id, product_name, product_price, product_image, description FROM products ORDER BY uploaded_at DESC";
    $result = mysqli_query($conn, $sql);

    if($result):
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    else: 
        echo "mysql error: " . mysqli_error($conn);
    endif;

    mysqli_free_result($result);


?>

<?php include_once("templates/header.php"); ?>

    <?php include_once("templates/navbar.php") ?>

    <div class="gallery-container" >

        <?php foreach($products as $product):  ?>

        <div class= "product_card">
            <div class="img"> 
                <img src="images/<?php echo $product['product_image']; ?>"  />
            </div>
            <div class="text">
                <p class="name"><span class="bold_text"></span>
                    <?php echo $product['product_name'];  ?>
                </p>
                <p class="price"><span class="bold_text">Price: </span>
                $   <?php  echo $product['product_price']; ?>
                </p>
                <div class="more-info">
                   <a href="single.php?product_id=<?php echo $product['product_id']; ?>">More info..</a> 
                </div>
            </div>
         </div>
        <?php endforeach; ?>

    </div>

      
      
    <?php include("templates/footer.php");  ?>