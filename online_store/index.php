<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>
<body>
    <center dir="rtl">
        <div class="main">
            <form action="insert.php" method="post" enctye="multipart/form-data">
                <h2>موقع تسويق</h2>
                

                <input type="text" name="product" id="" placeholder="product"><br><br>
                <input type="number" name="price" id="" placeholder="price"><br><br>

                <label for="file">اختيار صورة</label>
                <input type="file" name="img" id="" ><br><br>
                <button name="upload">upload</button>

                <a href="products.php">عرض كل المنتجات </a>

            </form>
        </div>
        <p>Dev By <i>RedEye</i></p>
    </center>
</body>
</html>