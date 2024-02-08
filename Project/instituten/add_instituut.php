<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $locatie = $_POST['locatie'];
    $omschrijving = $_POST['omschrijving'];

    $db->addInstituut($naam, $locatie, $omschrijving);

    header('Location: Overzicht_instituten.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituut Jongeren Kansrijker - Nieuw Instituut Toevoegen</title>
    <link rel="icon" type="image/x-icon" href="../Logo.png">
    <link rel="stylesheet" href="add_instituut.css">
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
              <a href="../medewerkers/Overzicht_medewerkers.php"><h3>Overzicht medewerker</h3></a>
              <a href="../medewerkers/add_medewerker.php">medewerker toevoegen</a>
              <a href="../medewerkers/Overzicht_medewerkers.php">Gegevens medewerker wijzigen</a>
              <a href="../medewerkers/Overzicht_medewerkers.php">Gegevens medewerker verwijderen</a>
            </div>
            <div class="column">
              <a href="Overzicht_instituten.php"><h3>Overzicht instituten</h3></a>
              <a href="add_instituut.php">Instituut toevoegen</a>
              <a href="Overzicht_instituten.php">Gegevens instituut wijzigen</a>
              <a href="Overzicht_instituten.php">Gegevens instituut verwijderen</a>
              <a href="Geplaatstejogeren.php">Overzicht geplaatste jongeren</a>
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

    <div class="add-instituut-form">
        <h2>Nieuw Instituut Toevoegen</h2>
        <form method="post" action="add_instituut.php">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>

            <label for="locatie">Locatie:</label>
            <input type="text" id="locatie" name="locatie" required>

            <label for="omschrijving">Omschrijving:</label>
            <textarea id="omschrijving" name="omschrijving" rows="4"></textarea>

            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
