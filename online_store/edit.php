<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المنتج</title>
</head>
<body>
    <?php
    include_once("db.php");
    if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // تأكد أن القيمة رقمية

    // استعلام
    $stmt = $conect->prepare("SELECT * FROM pro WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_array();
    } else {
        die("لم يتم العثور على المنتج.");
    }
    $stmt->close();
} else {
    die("ID غير صالح.");
}
?>

    <center dir="rtl">
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
              <h2>تعديل منتج</h2>

                <input type="number" name="id" value="<?php echo $data['id']; ?>" hidden><br><br>
                <input type="text" name="name" value="<?php echo $data['name']; ?>"><br><br>
                <input type="number" name="price" value="<?php echo $data['price']; ?>"><br><br>

                <label for="file">تحديث صورة</label>
                <input type="file" name="img"><br><br>

                <button name="edit">تعديل</button>

                <a href='edit.php?id=$product[id]' class='btn btn-primary'>تعديل منتج</a>

            </form>
        </div>
        <p>Dev By <i>RedEye</i></p>
    </center>
</body>
</html>
