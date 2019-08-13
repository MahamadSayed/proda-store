<?php

$errors = array('username' => '', 'email' => '' , 'store' => '', 'password' => '', 'password-2' => '' , 'other' => '', 'product_name' => '', 'product_price' => '', 'description' => '');
    
     if(count($errors) > 0): ?>
        <div class='reg_errors'>
        <?php  foreach($errors as $error): ?>
                <p> <?php echo $error ?> </p> 
         <?php endforeach; ?>
        </div>
    <?php endif; ?>