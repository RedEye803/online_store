<?php
include_once("db.php");

if (isset($_POST['add'])){
    $name=$_POST['name'];
    $price=$_POST['price'];

    $query=mysqli_query($conect,"INSERT INTO card (name,price) VALUES('$name',$price)");
    header('location:card.php');


}

?>