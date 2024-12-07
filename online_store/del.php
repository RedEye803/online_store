<?php
include_once("db.php");

if (isset($_GET['id'])){
    $id=$_GET['id'];

    $del="DELETE  FROM pro WHERE id=$id";
    $query=mysqli_query($conect,$del);

    if ($query){
        echo"<script>alert('delete sucssesfuly')</script>";
    }

    else{
        echo"<script>alert('not deleted')</script>";
    }

    header("Location:products.php");

}
?>