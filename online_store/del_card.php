<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conect, "DELETE FROM card WHERE id=$id");
    header('Location: card.php');
} else {
    // إذا لم يكن المعرف موجودًا
    echo "لا يوجد معرف صالح للحذف.";
}

?>