<?php
include_once('db.php');

$id = $_GET['id'];
$query = mysqli_query($conect, "SELECT * FROM pro WHERE id=$id");
$resuilt = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الشراء</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #343a40;
        }
        form {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            width: 50%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        input[type="number"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <center>
        <form action="inset_card.php" method="post">
            <h2>هل تريد شراء المنتج</h2>

            <input type="number" name="id" value="<?php echo $resuilt['id'] ?>" readonly><br>
            <input type="text" name="name" value="<?php echo $resuilt['name'] ?>" readonly><br>
            <input type="text" name="price" value="<?php echo $resuilt['price'] ?>" readonly><br>
            <input type="submit" name="add" value="تأكيد الشراء"><br>
            <a href="shop.php">العودة إلى المتجر</a>
        </form>
    </center>
</body>
</html>
