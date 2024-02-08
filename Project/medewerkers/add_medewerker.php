<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $functie = $_POST['functie'];
    $email = $_POST['email'];

    $db->addMedewerker($voornaam, $achternaam, $functie, $email);

    header('Location: Overzicht_medewerkers.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituut Jongeren Kansrijker - Nieuwe Medewerker Toevoegen</title>
    <link rel="icon" type="image/x-icon" href="../Logo.png">
    <link rel="stylesheet" href="add_medewerker.css">
</head>
<body>
<header>
        <div class="header">
        <img class="Logo" src="../Logo.png" alt="">
        <a class="h1" href="../Dashboard.php"><h1>Instituut Jongeren Kansrijker</h1></a>
        </div>

        <div class="menu">
        <h3 class="dropbtn">Menu</h3>
        <div class="dropdown-content">
          <div class="content">
            <h2>Menu</h2>
          </div>   
          <div class="row">
            <div class="column">
              <a href="../activiteiten/Overzicht_activiteiten.php"><h3>Overzicht activiteiten</h3></a>
              <a href="../activiteiten/add_activiteit.php">Activiteit toevoegen</a>
              <a href="../activiteiten/Overzicht_activiteiten.php">Gegevens activiteit wijzigen</a>
              <a href="../activiteiten/Overzicht_activiteiten.php">Gegevens activiteit verwijderen</a>
              <a href="../activiteitenOverzicht_activiteiten.php">Overzicht activiteiten deelnemer</a>
            </div>
            <div class="column">
              <a href="Overzicht_medewerkers.php"><h3>Overzicht medewerker</h3></a>
              <a href="add_medewerker.php">medewerker toevoegen</a>
              <a href="Overzicht_medewerkers.php">Gegevens medewerker wijzigen</a>
              <a href="Overzicht_medewerkers.php">Gegevens medewerker verwijderen</a>
            </div>
            <div class="column">
              <a href="../instituten/Overzicht_instituten.php"><h3>Overzicht instituten</h3></a>
              <a href="../instituten/add_instituut.php">Instituut toevoegen</a>
              <a href="../instituten/Overzicht_instituten.php">Gegevens instituut wijzigen</a>
              <a href="../instituten/Overzicht_instituten.php">Gegevens instituut verwijderen</a>
              <a href="../instituten/Geplaatstejogeren.php">Overzicht geplaatste jongeren</a>
            </div>
            <div class="column">
              <a href="../jongere/Overzicht_jongeren.php"><h3>Overzicht Jongeren</h3></a>
              <a href="../jongere/add_jongeren.php">Jongere toevoegen</a>
              <a href="../jongere/Overzicht_jongeren.php">Gegevens jongere wijzigen</a>
              <a href="../jongere/Overzicht_jongeren.php">Gegevens jongere verwijderen</a>
              <a href="../jongere/KoppelInstituut.php">Jongere aan instituut koppelen</a>
              <a href="../jongere/Koppelactiviteit.php">Jongere aan activiteit koppelen</a>
            </div>
            <div class="column">
                <h3><a href="../logout.php">Uitloggen</a></h3>
            </div>
          </div>
        </div>
        </div>
        </header>

    <div class="container">
        <h2>Nieuwe Medewerker Toevoegen</h2>

        <form method="post" action="add_medewerker.php">
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" required>

            <label for="functie">Functie:</label>
            <input type="text" id="functie" name="functie" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
