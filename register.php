<?php

     include("config/db_connection.php");
     include("errors.php");

     $username = "";
     $email = "";
     $storeName = "";


    if(isset($_POST['submit'])):

     if(empty($_POST['username'])):
          $errors['username'] = "Username is required" . "<br>";
     else:
          $username = $_POST['username'];
          if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['username'])):
           $errors['username'] =  "Username must be letters and spaces only";
          endif;
     endif;
     
     $sql = "SELECT * FROM users WHERE username ='$username'";
     $result = mysqli_query($conn, $sql);

     if(mysqli_num_rows($result) > 0):
          $errors['username'] = "Username already exist";
     endif;


     if(empty($_POST['email'])):
          $errors['email'] = "Email is required" . "<br>";
     else: 
          $email = $_POST['email'];
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
          $errors['email'] = "Enter a valid email address";
         endif;
     endif;

     $sql = "SELECT * FROM users WHERE email ='$email'";
     $result = mysqli_query($conn, $sql);

     if(mysqli_num_rows($result) > 0):
          $errors['email'] = "This email was used before";
     endif;

     if(empty($_POST['store'])):
          $errors['store'] = "Store Name is required" . "<br>";
     else:
          $storeName = $_POST['store'];
          if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['store'])):
               $errors['store'] = "Store name must be letters and spaces only";
          endif;
     endif;

     $sql = "SELECT * FROM users WHERE store ='$storeName'";
     $result = mysqli_query($conn, $sql);

     if(mysqli_num_rows($result) > 0):
          $errors['store'] = "Store Name already exist";
     endif;

     if(empty($_POST['password-1'])):
          $errors['password'] = "Password is required" . "<br>";
     endif;

     if($_POST['password-1'] != $_POST['password-2'] ):
          $errors['password-2'] = "The two password must be matched" . "<br>";
     else:
          $password = $_POST['password-1'];
     endif;


    
     if(!array_filter($errors)):

          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $storeName = mysqli_real_escape_string($conn, $_POST['store']);
          $password = md5($_POST['password-1']);
          
          $sql = "INSERT INTO users(username,email,store,password) VALUES ('$username', '$email', '$storeName', '$password')"; 
          if(mysqli_query($conn, $sql)):
               header('location: login.php');
          else: 
               echo "mysql error: " . mysqli_error($conn);
          endif;

          header('location: login.php');

          

     endif;

     

endif;

?>

<?php include("templates/header.php"); ?>

    <?php include("templates/navbar.php"); ?>

    <div class="container" >
          
          <div id='form-container'>
          <form id='form' action='register.php' method='Post' >
                  <h2>Register</h2>
                    
                  <div class='input-options'>
                      <input type='text' name='username' placeholder='Username'  value='<?php echo $username;  ?>' >
                  </div>
                  <div class='errors' >
                       <?php echo $errors['username'];  ?>
                  </div>
                  <div class='input-options'>
                      
                      <input type='text' name='email' placeholder='Email Address' value='<?php echo $email;  ?>' >
                  </div>
                  <div class='errors' >
                       <?php echo $errors['email'];  ?>
                  </div>
                  <div class='input-options'>
                      
                      <input type='text' name='store' placeholder='Store Name' value='<?php echo $storeName;  ?>' >
                  </div>
                  <div class='errors' >
                       <?php echo $errors['store'];  ?>
                  </div>
                  <div class='input-options'>
                      
                      <input type='password' name='password-1' placeholder='Password' >
                  </div>
                  <div class='errors' >
                       <?php echo $errors['password'];  ?>
                  </div>
                  <div class='input-options'>
                      
                      <input type='password' name='password-2' placeholder='Confirm Password'  >
                  </div>
                  <div class='errors' >
                       <?php echo $errors['password-2'];  ?>
                  </div>
                  <div class='input-options'>
                      <button type='submit' name='submit' class='btn'>Register</button>
                  </div>
                  <div class='input-options'>
                      <a class='form-link' href='login.php'>Already have account?</a>
                  </div>
          </form>
          </div>
      </div>

      
      
      <?php include("templates/footer.php");  ?>