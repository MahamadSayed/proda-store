<header>
        <nav>
            <ul class="nav-links">
                <li><a class="brand" href="index.php"><h3>Proda<span>Store</span></h3></a></li>
                <li><a href="index.php" >Home</a></li>
                <li><a href="about.php" >About</a></li>
                <li><a href="products.php" >Products</a></li>
            </ul>
        </nav>
        <div class="logged">
            <p>Hello, 
            <?php session_start(); ?>
            <?php 
            if(isset($_SESSION["name"])):
                echo strtoupper($_SESSION["name"]) . ".";
            ?>
            </p>
            <?php 
                echo "<a class='logout' href='logout.php'> logout?</a>";
                echo "<a href='upload.php'><button class='nav-btn'>Add Product</button></a>";
            else: 
                echo "Guest";
            endif;
            ?>
            
        </div>
        <a href="#"><button class="nav-btn">Contact</button></a>
</header>