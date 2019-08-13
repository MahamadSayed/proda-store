<?php 

include('config/db_connection.php');

if(isset($_GET['id'])):

    $idToDelete = $_GET['id'];

    $sql = "DELETE FROM products Where product_id = '" . $idToDelete . "'";
    $result = mysqli_query($conn, $sql);

    header("location: products.php");

endif;
?>