<?php
include("db.php");
session_start(); // بدء الجلسة

if (isset($_POST['add'])) {
    // استلام البيانات
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من وجود المستخدم
    $select = mysqli_query($conect, "SELECT * FROM usr WHERE email='$email'");
    if ($select && mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $usrid = $row['id'];

        // التحقق من صحة كلمة المرور
        if (password_verify($password, $row['password'])) {
            // تخزين معرف المستخدم في الجلسة
            $_SESSION['usrid'] = $usrid;
            // إعادة التوجيه إلى الصفحة الرئيسية
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* التنسيق كما هو */
    </style>
</head>
<body>
    <center>
        <h2>LOGIN NOW</h2>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="add" value="LOGIN NOW"><br>
            <p>Don't Have An Account? <a href="register.php">Register Here</a></p>
        </form>
    </center>
</body>
</html>
