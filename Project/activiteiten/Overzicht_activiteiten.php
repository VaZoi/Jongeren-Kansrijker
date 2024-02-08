<?php
session_start();

include('../db.php');
$db = new database();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$activiteiten = $db->selectAllActiviteiten();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituut Jongeren Kansrijker</title>
    <link rel="icon" type="image/x-icon" href="../Logo.png">
    <link rel="stylesheet" href="activiteiten.css">
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
        <a href="add_activiteit.php"><h2>Activiteit Toevoegen</h2></a>
        <h2>Alle Activiteiten</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Start Datum</th>
                    <th>Eind Datum</th>
                    <th>Locatie</th>
                    <th>Omschrijving</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activiteiten as $activiteit) : ?>
                    <tr>
                        <td><?php echo $activiteit['activiteitID']; ?></td>
                        <td><?php echo $activiteit['activiteitNaam']; ?></td>
                        <td><?php echo $activiteit['activiteitStartDatum']; ?></td>
                        <td><?php echo $activiteit['activiteitEindDatum']; ?></td>
                        <td><?php echo $activiteit['activiteitLocatie']; ?></td>
                        <td><?php echo $activiteit['activiteitOmschrijving']; ?></td>
                        <td>
                            <a href="edit_activiteit.php?id=<?php echo $activiteit['activiteitID']; ?>">Edit</a>
                            <a href="delete_activiteit.php?action=delete&id=<?php echo $activiteit['activiteitID']; ?>" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        
    </div>
     </body>
</html>