<?php
$host='localhost';
$usr_db='root';
$password_db='pass';
$db_name='login_register';
$conect=mysqli_connect($host,$usr_db,$password_db,$db_name);

if (!$conect){
    echo "conection error";
}
?>