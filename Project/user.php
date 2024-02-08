<?php
include 'db.php';
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->addUser($_POST['name'], $_POST['email']);
        echo "User toegevoegd";
    }
    catch (Exception $e) {
        echo $e->getMessage();
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
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
                $data = $db->selectAllUsers();
                foreach ($data as $da) {
                    echo "<td>". $da['userID'] . "</td>";
                    echo "<td>". $da['userName'] . "</td>";
                    echo "<td>". $da['userEmail'] . "</td>";
                    echo "<td> <a href='edit.php?userID=". $da['userID'] ."'</a>Edit</td>";
                    echo "<td> <a href='edit.php?userID=". $da['userID'] ."'</a>Delete</td>";
            ?>
        </tr>
        <?php  } ?>
    </table>

    <h1>User toevoegen</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Naam">
        <input type="text" name="email" placeholder="Email">
        <input type="submit">
    </form>
    
</body>
</html>