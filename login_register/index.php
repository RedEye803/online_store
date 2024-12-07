<?php
include("db.php");
session_start(); // بدء الجلسة

// التحقق إذا كان المستخدم غير مسجل الدخول
if (!isset($_SESSION['usrid'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        /* تنسيق عام */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fb;
        }

        /* الحاوية الرئيسية */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* تنسيق ملف التعريف */
        .profile {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        /* تنسيق الصورة */
        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* تنسيق العنوان */
        h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }

        /* تنسيق الروابط */
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 12px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
        }

        /* تأثير عند التمرير على الروابط */
        a:hover {
            background-color: #0056b3;
        }

        /* تنسيق الفقرة */
        p {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
            // استعلام لجلب بيانات المستخدم بناءً على usrid
            $select = mysqli_query($conect, "SELECT * FROM usr WHERE id='" . $_SESSION['usrid'] . "'");

            // التحقق من وجود النتائج
            if (mysqli_num_rows($select) > 0) {
                // جلب البيانات
                $fetch = mysqli_fetch_assoc($select);

                // التحقق إذا كانت الصورة فارغة
                if (empty($fetch['img'])) {
                    // إذا كانت الصورة فارغة، يمكنك إضافة صورة افتراضية
                    echo '<img src="default-image.jpg" alt="Default Image">';
                } else {
                    // عرض الصورة الخاصة بالمستخدم
                    echo '<img src="uploads/' . $fetch['img'] . '" alt="User Image">';
                }
            }
            ?>

           <h3><?php echo $fetch['name']?></h3>
           <a href="update_profile.php">Update Profile</a name>
           <a href="index.php?logout=<?php echo $usrid; ?>">Logout</a> <!-- تم تصحيح الرابط هنا -->
           <p>New <a href="login.php">Login</a> or <a href="register.php">Register</a></p> <!-- تم إضافة النص هنا -->
        </div>
    </div>
</body>
</html>
