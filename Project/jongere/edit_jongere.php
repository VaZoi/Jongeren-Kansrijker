<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jongereID = $_POST['jongereID'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $instituutID = $_POST['instituutID'];

    $db->editJongere($jongereID, $voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $instituutID);

    header('Location: Overzicht_jongeren.php');
    exit();
}

if (isset($_GET['id'])) {
    $jongereID = $_GET['id'];
    $jongere = $db->selectOneJongere($jongereID);
} else {
    header('Location: Overzicht_jongeren.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jongere</title>
    <link rel="icon" type="image/x-icon" href="../Logo.png">
    <link rel="stylesheet" href="edit_activiteiten.css">
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
              <a href="../instituten/Overzicht_instituten.php"><h3>Overzicht instituten</h3></a>
              <a href="../instituten/add_instituut.php">Instituut toevoegen</a>
              <a href="../instituten/Overzicht_instituten.php">Gegevens instituut wijzigen</a>
              <a href="../instituten/Overzicht_instituten.php">Gegevens instituut verwijderen</a>
              <a href="../instituten/Geplaatstejogeren.php">Overzicht geplaatste jongeren</a>
            </div>
            <div class="column">
              <a href="Overzicht_jongeren.php"><h3>Overzicht Jongeren</h3></a>
              <a href="add_jongeren.php">Jongere toevoegen</a>
              <a href="Overzicht_jongeren.php">Gegevens jongere wijzigen</a>
              <a href="Overzicht_jongeren.php">Gegevens jongere verwijderen</a>
              <a href="KoppelInstituut.php">Jongere aan instituut koppelen</a>
              <a href="Koppelactiviteit.php">Jongere aan activiteit koppelen</a>
            </div>
            <div class="column">
                <h3><a href="../logout.php">Uitloggen</a></h3>
            </div>
          </div>
        </div>
        </div>
        </header>

    <div class="container">
        <h2>Edit Jongere</h2>

        <form action="edit_jongere.php" method="post">
            <input type="hidden" name="jongereID" value="<?php echo $jongere['jongereID']; ?>">

            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" value="<?php echo $jongere['voornaam']; ?>" required>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" value="<?php echo $jongere['achternaam']; ?>" required>

            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="geboortedatum" name="geboortedatum" value="<?php echo $jongere['geboortedatum']; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $jongere['email']; ?>" required>

            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="tel" id="telefoonnummer" name="telefoonnummer" value="<?php echo $jongere['telefoonnummer']; ?>">

            <label for="instituutID">Instituut ID:</label>
            <input type="number" id="instituutID" name="instituutID" value="<?php echo $jongere['instituutID']; ?>" required>

            <button type="submit">Opslaan</button>
        </form>
    </div>
</body>
</html>
