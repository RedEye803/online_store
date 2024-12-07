<?php
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم
$password = "pass"; // كلمة المرور
$dbname = "users_db"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
