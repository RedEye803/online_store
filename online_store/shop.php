<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #aa {
            margin-left: 70px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a id="aa" class="navbar-brand" href="card.php">عربتي | Mycard</a>
    </nav>

    <center>
        <h3>All Products</h3>
    </center>
    <?php
    include_once('db.php');
    $result = mysqli_query($conect, "SELECT * FROM pro");

    while ($product = mysqli_fetch_array($result)) {
        echo "
        <center>
        <main>
        <div class='card' style='width: 15rem; margin-bottom: 20px;'>
            <img src='$product[img]' class='card-img-top' alt='$product[name]'>
            <div class='card-body'>
                <h5 class='card-title'>$product[name]</h5>
                <p class='card-text'>Price: $product[price] EGP</p>
                <a href='val.php?id=$product[id]' class='btn btn-sucsses'> اضافه للعربة</a>
            </div>
        </div>
        </main>
        </center>
        ";
    }
    ?>
</body>
</html>
