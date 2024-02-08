<?php
try {
    include "db.php";
    $db = new Database();

    if ($_GET['userID']) {
            $db->deleteUser($_GET['userID']);
            header("Location:user.php?success");
    } 
}   catch(Exception $e) {
        echo $e->getMessage();
    }
?>