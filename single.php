
<?php 

include('config/db_connection.php');

if(isset($_GET['product_id'])):
    $productId = mysqli_real_escape_string($conn, $_GET['product_id']);

    
    $sql = "SELECT * FROM products WHERE product_id = $productId"; 

    $result = mysqli_query($conn, $sql);

    $product = mysqli_fetch_assoc($result);


    $userId = $product['user_id'];

    $sql_user = "SELECT * FROM users WHERE user_id = '" . $userId . "'";

    $result_user = mysqli_query($conn, $sql_user);

    $user = mysqli_fetch_assoc($result_user);

    
    


endif;

?>

<?php include_once("templates/header.php"); ?>

<?php include_once("templates/navbar.php") ?>

<div class="container-single" >


    <?php  if($product):  ?>
    <div class= "product-single">
        <h1 class="name">
             <?php echo htmlspecialchars($product['product_name']);  ?>
        </h1>
        <div class="img-big"> 
            <img src="images/<?php echo $product['product_image']; ?>" />
        </div>
        <div class="text-single">
            <p class="price">
                <?php  echo htmlspecialchars($product['description']); ?>
            </p>
                
            <p class="price"><span class="bold_text">Price: </span>
                $ <?php  echo htmlspecialchars($product['product_price']); ?>
            </p>
            <p class="price"><span class="bold_text">Sold By: </span>
                <?php  echo htmlspecialchars($user['store']); ?>
            </p>
            <p class="price"><span class="bold_text">Uploaded at: </span>
                <?php  echo htmlspecialchars($product['uploaded_at']); ?>
            </p>
            <a id="delete-btn" href="delete.php?id=<?php echo $product['product_id']; ?>"><button>Delete</button></a>
        </div>
    </div>
    <?php else:  ?>
        <h3 class='errors'>This product doesn't exist!</h3>
    <?php endif; ?>
</div>

  
  
<?php include("templates/footer.php");  ?>