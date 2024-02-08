<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: ../medewerkers/Overzicht_medewerkers.php');
    exit();
}

$instituutID = $_GET['id'];

$db->deleteInstituut($instituutID);

header('Location: Overzicht_institutens.php');
exit();
?>
