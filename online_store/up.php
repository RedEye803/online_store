<?php
include_once("db.php");

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // معالجة رفع الصورة
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img'];
        $img_name = $img['name'];
        $img_tmp = $img['tmp_name'];
        $img_path = "uploads/" . $img_name;

        move_uploaded_file($img_tmp, $img_path);
    } else {
        $img_path = null; // إذا لم يتم رفع صورة جديدة
    }

    // تحديث المنتج في قاعدة البيانات
    if ($img_path) {
        $query = "UPDATE pro SET name = ?, price = ?, img = ? WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssi", $name, $price, $img_path, $id);
    } else {
        $query = "UPDATE pro SET name = ?, price = ? WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssi", $name, $price, $id);
    }

    if ($stmt->execute()) {
        header("Location: products.php"); // إعادة التوجيه إلى صفحة عرض المنتجات بعد التعديل
        exit();
    } else {
        echo "حدث خطأ أثناء التعديل.";
    }

    $stmt->close();
}
?>
