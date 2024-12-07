<?php
include_once("db.php");

if (isset($_POST['upload'])) {
    $product = $_POST['product']; // اسم المنتج
    $price = $_POST['price'];     // السعر
    $img = $_FILES['img'];        // الصورة

    $image_location = $_FILES['img']['tmp_name']; // موقع الصورة المؤقت
    $image_name = $_FILES['img']['name'];         // اسم الصورة
    $image_up = "images/" . $image_name;          // مسار الصورة النهائي

    // استعلام الإدخال
    $insert = "INSERT INTO pro (name, price, img) VALUES ('$product', '$price', '$image_up')";
    $query = mysqli_query($conect, $insert);

    // رفع الصورة والتأكد من نجاح العملية
    if (move_uploaded_file($image_location, $image_up)) {
        echo "<script>alert('تمت الإضافة بنجاح');</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء رفع الصورة');</script>";
    }

    // إعادة توجيه المستخدم إلى الصفحة الرئيسية
    header('location:index.php');
}
?>
