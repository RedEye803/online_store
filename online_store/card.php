<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* لون خلفية خفيف */
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            margin-top: 20px;
            width: 80%;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .btn-delete {
            color: white;
            background-color: #dc3545;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">My Card</h1>

        <?php
        include_once('db.php');
        $result = mysqli_query($conect, "SELECT * FROM card");

        if (mysqli_num_rows($result) > 0) {
            echo "
            <table class='table table-striped table-bordered mx-auto'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Delete Product</th>
                    </tr>
                </thead>
                <tbody>
            ";
            
            while ($row = mysqli_fetch_array($result)) {
                echo "
                    <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['price']} EGP</td>
                        <td><a href='del_card.php?id={$row['id']}' class='btn-delete'>ازالة</a></td>
                    </tr>
                ";
            }

            echo "
                </tbody>
            </table>
            ";
        } else {
            echo "<p class='text-center'>No products found in the cart.</p>";
        }
        ?>
    </div>
</body>
</html>
