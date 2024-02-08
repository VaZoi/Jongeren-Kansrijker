<?php
include "db.php";
$db = new Database();

if ($_GET['userID']) {
    if ($_POST['REQUEST_METHOD'] == 'POST') {
    try {
        $db->editUser($_POST['userName'], $_POST['userEmail'],$_GET['userID']);
        header("Location:user.php?success");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>User EDITEN</h1>
    <form method="POST">
        <input type="text" name="userName" placeholder="Naam">
        <input type="text" name="userEmail" placeholder="Email">
        <input type="submit">
    </form>
</body>
</html>