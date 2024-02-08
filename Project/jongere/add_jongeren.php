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
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $instituutID = $_POST['instituutID'];

    $jongereID = $db->addJongere($voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $instituutID);

    if (isset($_POST['activiteiten']) && is_array($_POST['activiteiten'])) {
        foreach ($_POST['activiteiten'] as $activiteitID) {
            $db->addActiviteitToJongere($jongereID, $activiteitID);
        }
    }

    header('Location: Overzicht_jongeren.php');
    exit();
}

$activiteiten = $db->selectAllActiviteiten();
$instituten = $db->selectAllInstituten();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Jongere Toevoegen</title>
    <link rel="icon" type="image/x-icon" href="../Logo.png">
    <link rel="stylesheet" href="add_jongere.css">
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

    <div class="add-jongere-form">
        <h2>Nieuwe Jongere Toevoegen</h2>
        <form method="post" action="add_jongeren.php">
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" required>

            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="geboortedatum" name="geboortedatum" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="tel" id="telefoonnummer" name="telefoonnummer">

            <label for="instituutID">Instituut:</label>
            <select id="instituutID" name="instituutID" required>
                <?php foreach ($instituten as $instituut) : ?>
                    <option value="<?php echo $instituut['instituutID']; ?>"><?php echo $instituut['instituutNaam']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="activiteiten">Activiteiten:</label>
            <select id="activiteiten" name="activiteiten[]" multiple>
                <?php foreach ($activiteiten as $activiteit) : ?>
                    <option value="<?php echo $activiteit['activiteitID']; ?>"><?php echo $activiteit['activiteitNaam']; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
