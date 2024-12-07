<?php
include("db.php");
session_start();

// التحقق إذا كان المستخدم غير مسجل الدخول
if (!isset($_SESSION['usrid'])) {
    header("Location: login.php");
    exit();
}

$usr_id = $_SESSION['usrid'];

// جلب بيانات المستخدم من قاعدة البيانات
$select = mysqli_query($conect, "SELECT * FROM usr WHERE id='$usr_id'");

if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
} else {
    echo "User not found.";
    exit();
}

// معالجة التحديث عند إرسال النموذج
if (isset($_POST['update'])) {
    $username = $_POST['upname']; // تم تغيير الحقل ليطابق العمود username
    $email = $_POST['upemail'];

    // التحقق من أن الحقول ليست فارغة
    if (!empty($username) && !empty($email)) {
        $update_query = "UPDATE usr SET username='$username', email='$email' WHERE id='$usr_id'";
        if (mysqli_query($conect, $update_query)) {
            echo "Profile updated successfully!";
            // تحديث البيانات في $fetch
            $fetch['username'] = $username;
            $fetch['email'] = $email;
        } else {
            echo "Error updating profile: " . mysqli_error($conect);
        }
    } else {
        echo "Please fill all the fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile">
            <form action="" method="post">
                <label for="upname">Username:</label>
                <input type="text" name="upname" value="<?php echo isset($fetch['username']) ? htmlspecialchars($fetch['username'], ENT_QUOTES, 'UTF-8') : ''; ?>" required><br><br>

                <label for="upemail">Email:</label>
                <input type="email" name="upemail" value="<?php echo isset($fetch['email']) ? htmlspecialchars($fetch['email'], ENT_QUOTES, 'UTF-8') : ''; ?>" required><br><br>

                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
