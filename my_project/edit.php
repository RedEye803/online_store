<?php
include_once("db.php");

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT name, email, phone FROM users WHERE id = ?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $stmt->bind_result($name, $email, $phone);
    $stmt->fetch();
    $stmt->close();
}

if (isset($_POST['update'])) {
    $edit_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $phone, $edit_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
