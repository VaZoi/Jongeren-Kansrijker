<?php
session_start();

require_once '../db.php';
$db = new database();

if (!isset($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit();
}

if (isset($_POST['activiteiten']) && is_array($_POST['activiteiten'])) {
    foreach ($_POST['activiteiten'] as $activiteitID) {
        $db->addActiviteitToJongere($jongere['jongereID'], $activiteitID);
    }

    header('Location: Overzicht_jongeren.php');
    exit();
}

$jongeren = $db->selectAllJongeren();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Jongeren</title>
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
    <a href="add_jongeren.php"><h2>Jongeren Toevoegen</h2></a>
        <h2>Alle Jongeren</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Geboortedatum</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Instituut ID</th>
                    <th>Activiteiten</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jongeren as $jongere) : ?>
                    <tr>
                        <td><?php echo $jongere['jongereID']; ?></td>
                        <td><?php echo $jongere['voornaam']; ?></td>
                        <td><?php echo $jongere['achternaam']; ?></td>
                        <td><?php echo $jongere['geboortedatum']; ?></td>
                        <td><?php echo $jongere['email']; ?></td>
                        <td><?php echo $jongere['telefoonnummer']; ?></td>
                        <td><?php echo $jongere['instituutID']; ?></td>
                        <td>
                            <?php
                            echo is_array($jongere['activiteiten']) ? implode(', ', $jongere['activiteiten']) : $jongere['activiteiten'];
                            ?>
                        </td>
                        <td>
                            <a href="edit_jongere.php?id=<?php echo $jongere['jongereID']; ?>">Edit</a>
                            <a href="delete_jongere.php?action=delete&id=<?php echo $jongere['jongereID']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>