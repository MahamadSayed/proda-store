<?php 

include("config/db_connection.php");

include("errors.php");

     $username = "";
    
    if(isset($_POST['login'])):

      if(empty($_POST['username']) || empty($_POST['password'])):
            $errors['username'] = "Username and password are required" ;
      else:
            $username = $_POST['username'];
      
            $password = md5($_POST['password']);
      
            $sql = "SELECT * FROM users WHERE username= '" .  $username . "' AND password= '" . $password ."'";
            $result = mysqli_query($conn, $sql);

            $userData = mysqli_fetch_assoc($result);
            $userId = $userData['user_id'];

            if(!$userData):
                $errors['other'] = "Invalid username or password";

            else:
                session_start();

                $_SESSION["name"] = "$username";
                
                header("location: index.php");
            endif;
      endif;


  endif;

?>



<?php include_once "templates/header.php"; ?>

  <?php include_once "templates/navbar.php"?>

    <div class="container" >
      <div class="text-container">
          <h1>Proda<span>Store</span></h1>
    </div>


    <div id='form-container'>
          <form id='form' method="post" action="login.php" >
                  <h2>Login</h2>
                  <div class='errors' >
                       <?php echo $errors['other'];  ?>
                  </div>
                <div class='input-options'>
                    <input type='text' name='username' placeholder='Username'>
                </div>
                <div class='errors' >
                       <?php echo $errors['username'];  ?>
                  </div>
                <div class='input-options'>
                    <input type='password' name='password' placeholder='Password'>
                </div>
                <div class='errors' >
                       <?php echo $errors['password'];  ?>
                  </div>
                <div class='input-options'>
                    <button type='submit' name='login' class='btn'>Login</button> 
                </div>
                <div class='input-options'>
                    
                </div>
                <div class='input-options'>
                <a class='form-link' href='register.php'>Not a Member?</a>
            </div>
        </form>
        </div>

      
    </body>
  </html>