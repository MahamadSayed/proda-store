<?php 

include("config/db_connection.php");
include("errors.php");



if(isset($_POST['add'])):



        if(empty($_POST['product_name'])):
            $errors['product_name'] = "Product name is required";
        else: 
            $productName =  $_POST['product_name'];
            if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['product_name'])):
                $errors['product_name'] =  "Product name must be letters and spaces only";
            endif;
        endif;
        
        if(empty($_POST['product_price'])):
            $errors['product_price'] = "Product price is required";
        else: 
            $productPrice =  $_POST['product_price'];
            if(!preg_match('/^[0-9]+(\.[0-9])?$/', $_POST['product_price'])):
                $errors['product_price'] =  "Please enter a valid price";
            endif;
        endif;

        if(empty($_POST['description'])):
            $errors['description'] = "Please add a description";
        else: 
            $description =  $_POST['description'];
            if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['description'])):
                $errors['description'] =  "description must be letters and spaces only";
            endif;
        endif;

        



        if(!array_filter($errors)):
            $productName = mysqli_real_escape_string($conn , $_POST['product_name']);
            $productPrice = mysqli_real_escape_string($conn , $_POST['product_price']);
            $description = mysqli_real_escape_string($conn , $_POST['description']);
            $destination = "images/" . $_FILES['image']['name'];
            $image = $_FILES['image']['name'];

            
            $sql = "INSERT INTO products (user_id, product_name, product_price, description, product_image) VALUES ('1', '$productName', '$productPrice', '$description', '$image')";

            $result = mysqli_query($conn, $sql);

            if($result):
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                header('location: products.php');
        else: 
                echo "mysql error: " . mysqli_error($conn);
        endif;

        


        endif;


endif;



?>

<?php include("templates/header.php"); ?>

<?php include("templates/navbar.php"); ?>

<div class="container" >

        
    
    <div id='form-container' class="uploader">
        <form id='form' action='upload.php' method='Post' enctype='multipart/form-data' >
              <h2>Add a Product</h2>
                
              <div class='input-options'>
                  <input type='text' name='product_name' placeholder='Product Name' >
              </div>
              <div class='errors' >
                       <?php echo $errors['product_name'];  ?>
              </div> 
              <div class='input-options'>
                  <input type='text' name='product_price' placeholder='Price' >
              </div>
              <div class='errors' >
                       <?php echo $errors['product_price'];  ?>
              </div>
              <div class='input-options'>
                  <textarea name='description' cols="35" rows="3" placeholder='Descripe your product then add the image below' ></textarea>
              </div>
              <div class='errors' >
                       <?php echo $errors['description'];  ?>
              </div> 
              <div class='input-options'>
                  <input type='file' name='image' class="image-uploader" >
              </div>
              
              <div class='input-options'>
                  <button type='submit' name='add' class='btn'>Add</button>
              </div>
              
      </form>
      </div>
  </div>

  
  
  <?php include("templates/footer.php");  ?>