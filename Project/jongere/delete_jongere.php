<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
  }

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $jongereID = $_GET['id'];

    $db->deleteActiviteitenVanJongere($jongereID);

    $db->deleteJongere($jongereID);

    header('Location: Overzicht_jongeren.php');
    exit();
} else {
    header('Location: Overzicht_jongeren.php');
    exit();
}
?>
