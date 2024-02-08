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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $startDatum = $_POST['startDatum'];
    $eindDatum = $_POST['eindDatum'];
    $locatie = $_POST['locatie'];
    $omschrijving = $_POST['omschrijving'];

    $db->editActiviteit($activiteitID, $naam, $startDatum, $eindDatum, $locatie, $omschrijving);

    header('Location: Overzicht_activiteiten.php');
    exit();
}

$activiteit = $db->selectOneActiviteit($activiteitID);

if (!$activiteit) {
    header('Location: Overzicht_activiteiten.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activiteit</title>
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
              <a href="Overzicht_activiteiten.php"><h3>Overzicht activiteiten</h3></a>
              <a href="add_activiteit.php">Activiteit toevoegen</a>
              <a href="Overzicht_activiteiten.php">Gegevens activiteit wijzigen</a>
              <a href="Overzicht_activiteiten.php">Gegevens activiteit verwijderen</a>
              <a href="Overzicht_activiteiten.php">Overzicht activiteiten deelnemer</a>
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
        <h2>Edit Activiteit</h2>

        <form method="post" action="edit_activiteit.php?id=<?php echo $activiteitID; ?>">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="<?php echo $activiteit['activiteitNaam']; ?>" required>

            <label for="startDatum">Start Datum:</label>
            <input type="date" id="startDatum" name="startDatum" value="<?php echo $activiteit['activiteitStartDatum']; ?>" required>

            <label for="eindDatum">Eind Datum:</label>
            <input type="date" id="eindDatum" name="eindDatum" value="<?php echo $activiteit['activiteitEindDatum']; ?>" required>

            <label for="locatie">Locatie:</label>
            <input type="text" id="locatie" name="locatie" value="<?php echo $activiteit['activiteitLocatie']; ?>">

            <label for="omschrijving">Omschrijving:</label>
            <textarea id="omschrijving" name="omschrijving" rows="4"><?php echo $activiteit['activiteitOmschrijving']; ?></textarea>

            <button type="submit">Opslaan</button>
        </form>
    </div>
</body>
</html>