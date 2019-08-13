<?php 
    
    //connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'proda_store');

    //check for connection error
    if(!$conn){
        echo "connection error: " . mysqli_connect_error();
    } 

?>