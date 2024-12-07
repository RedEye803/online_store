<?php
include("db.php");

if (isset($_POST['add'])) {
    // استلام البيانات
    $name = $_POST['usrname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $img = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_folder = "uploads/" . $img;

    // التحقق من كلمتي المرور
    if ($password !== $re_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // التحقق من حجم الصورة (مثال: الحد الأقصى 2 ميجابايت)
        $max_size = 2 * 1024 * 1024; // 2 ميجابايت
        if ($img_size > $max_size) {
            echo "<script>alert('Image size is too large. Maximum allowed size is 2MB.');</script>";
        } else {
            // تشفير كلمة المرور
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // إدخال البيانات إلى قاعدة البيانات
            $insert = mysqli_query($conect, "INSERT INTO `usr` (username, email, password, img) VALUES ('$name', '$email', '$hashed_password', '$img')");

            if ($insert) {
                // رفع الصورة إلى المجلد
                move_uploaded_file($img_tmp_name, $img_folder);
                echo "<script>alert('Registration successful');</script>";
                header("Location:login.php");
            } else {
                echo "<script>alert('Failed to register. Please try again.');</script>";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 50px auto;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <center>
        <h2>REGISTER NOW</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="usrname" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="re_password" placeholder="Confirm Password"><br>
            <input type="file" name="img" required><br>
            <input type="submit" name="add" value="REGISTER NOW"><br>
            <p>Already Have An Account? <a href="login.php">Login Here</a></p>
        </form>
    </center>
</body>
</html>