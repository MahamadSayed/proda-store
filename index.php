
<?php include("config/db_connection.php"); ?>

<?php include('errors.php');  ?>

<?php include("templates/header.php"); ?>

    <?php include("templates/navbar.php"); ?>

    <div class="container" >
        <div class="text-container">
                <h1>Proda<span>Store</span></h1>
                <p>One Place Where You Can Save And Show Your Products..</p>
        </div>
        <div class='content-nav'>
            <div class="page-nav-1">
            <?php if(isset($_SESSION["name"])):  ?>
            <?php echo "<a href='products.php'>
                                <img src='store.png' >
                                <p>Store</p>
                                </a>
                                </div>
                        <div class='page-nav-2'>
                                 <a href='upload.php'>
                                <img src='upload_product.png' >
                                <p>Add a product</p>
                                </a>
                                </div>"; ?>
            <?php else: echo "<a href='register.php'>
                                <img src='reg_user.png' >
                                <p>Register</p>
                                </a>
                                </div>
                        <div class='page-nav-2'>
                                 <a href='login.php'>
                                <img src='login.png' >
                                <p>Login</p>
                                </a>
                                </div>";
            ?>
            <?php endif; ?>
            </div>
    </div>

      
   <?php include("templates/footer.php");  ?>