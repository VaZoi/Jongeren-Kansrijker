<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: Overzicht_activiteiten.php');
    exit();
}

$activiteitID = $_GET['id'];

$db->deleteActiviteit($activiteitID);

header('Location: Overzicht_activiteiten.php');
exit();
?>
