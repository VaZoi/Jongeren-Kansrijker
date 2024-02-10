<?php 
class database {
    private $host;
    private $username;
    private $password;
    private $database;

    private $port;
    private $dbh;

    public function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'school';
        $this->port = 3306;
    
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database";
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    
    public function getUserByUsername(string $username) {
        $sql = 'SELECT * FROM users WHERE userName = :username';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function addUser(string $userName, string $userEmail) {
	    $sql = 'INSERT INTO users (userName, userEmail) VALUES (:name, :email)';
	    $stmt = $this->dbh->prepare($sql);
	    $stmt->execute([
            'name' => $userName, 
            'email' => $userEmail
        ]);
    }
    public function deleteUser(int $userID) { 
        $sql = 'DELETE FROM users WHERE userID =:userID';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['userID' => $userID]);
    }
    public function editUser(string $userName, string $userEmail, int $userID) { 
        $sql = 'update user SET userName=:userName, userEmail =:userEmail WHERE userID=:userID';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'userName' => $userName,
            'userEmail' => $userEmail,
            'userID' => $userID
        ]);
    }
    public function selectAllUsers() {
          $stmt = $this->dbh->query('SELECT * from users');
          $rows = $stmt->fetchAll();
          return $rows;
    }
    public function selectOneUser(int $userID) {
        $stmt = $this->dbh->prepare('SELECT * from users where userID = :userID');
        $stmt->execute(["userID" => $userID]);
        $rows = $stmt->fetch();
        return $rows;
  }

  public function addActiviteit($naam, $startDatum, $eindDatum, $locatie, $omschrijving) {
    $sql = 'INSERT INTO activiteiten (activiteitNaam, activiteitStartDatum, activiteitEindDatum, activiteitLocatie, activiteitOmschrijving) 
            VALUES (:naam, :startDatum, :eindDatum, :locatie, :omschrijving)';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'naam' => $naam,
        'startDatum' => $startDatum,
        'eindDatum' => $eindDatum,
        'locatie' => $locatie,
        'omschrijving' => $omschrijving
    ]);
}

public function deleteActiviteit($activiteitID) {
    $sql = 'DELETE FROM activiteiten WHERE activiteitID = :activiteitID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['activiteitID' => $activiteitID]);
}

public function editActiviteit($naam, $startDatum, $eindDatum, $locatie, $omschrijving, $activiteitID) {
    $sql = 'UPDATE activiteiten SET activiteitNaam = :naam, activiteitStartDatum = :startDatum, activiteitEindDatum = :eindDatum, 
            activiteitLocatie = :locatie, activiteitOmschrijving = :omschrijving WHERE activiteitID = :activiteitID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'naam' => $naam,
        'startDatum' => $startDatum,
        'eindDatum' => $eindDatum,
        'locatie' => $locatie,
        'omschrijving' => $omschrijving,
        'activiteitID' => $activiteitID
    ]);
}

public function selectAllActiviteiten() {
    $stmt = $this->dbh->query('SELECT * FROM activiteiten');
    $rows = $stmt->fetchAll();
    return $rows;
}

public function selectOneActiviteit($activiteitID) {
    $stmt = $this->dbh->prepare('SELECT * FROM activiteiten WHERE activiteitID = :activiteitID');
    $stmt->execute(["activiteitID" => $activiteitID]);
    $row = $stmt->fetch();
    return $row;
}

public function addMedewerker(string $voornaam, string $achternaam, string $functie, string $email) {
    $sql = 'INSERT INTO medewerkers (voornaam, achternaam, functie, email) VALUES (:voornaam, :achternaam, :functie, :email)';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'functie' => $functie,
        'email' => $email
    ]);
}

public function deleteMedewerker(int $medewerkerID) {
    $sql = 'DELETE FROM medewerkers WHERE medewerkerID = :medewerkerID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['medewerkerID' => $medewerkerID]);
}

public function editMedewerker(int $medewerkerID, string $voornaam, string $achternaam, string $functie, string $email) {
    $sql = 'UPDATE medewerkers SET voornaam = :voornaam, achternaam = :achternaam, functie = :functie, email = :email WHERE medewerkerID = :medewerkerID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'functie' => $functie,
        'email' => $email,
        'medewerkerID' => $medewerkerID
    ]);
}

public function selectAllMedewerkers() {
    $stmt = $this->dbh->query('SELECT * FROM medewerkers');
    $rows = $stmt->fetchAll();
    return $rows;
}

public function selectOneMedewerker(int $medewerkerID) {
    $stmt = $this->dbh->prepare('SELECT * FROM medewerkers WHERE medewerkerID = :medewerkerID');
    $stmt->execute(['medewerkerID' => $medewerkerID]);
    $row = $stmt->fetch();
    return $row;
}

public function addInstituut(string $instituutNaam, string $instituutLocatie, string $instituutOmschrijving) {
    $sql = 'INSERT INTO instituten (instituutNaam, instituutLocatie, instituutOmschrijving) VALUES (:naam, :locatie, :omschrijving)';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'naam' => $instituutNaam,
        'locatie' => $instituutLocatie,
        'omschrijving' => $instituutOmschrijving
    ]);
}

public function deleteInstituut(int $instituutID) {
    $sql = 'DELETE FROM instituten WHERE instituutID = :instituutID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['instituutID' => $instituutID]);
}

public function editInstituut(int $instituutID, string $instituutNaam, string $instituutLocatie, string $instituutOmschrijving) {
    $sql = 'UPDATE instituten SET instituutNaam = :naam, instituutLocatie = :locatie, instituutOmschrijving = :omschrijving WHERE instituutID = :instituutID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'instituutID' => $instituutID,
        'naam' => $instituutNaam,
        'locatie' => $instituutLocatie,
        'omschrijving' => $instituutOmschrijving
    ]);
}

public function selectAllInstituten() {
    $stmt = $this->dbh->query('SELECT * FROM instituten');
    $rows = $stmt->fetchAll();
    return $rows;
}

public function selectOneInstituut(int $instituutID) {
    $stmt = $this->dbh->prepare('SELECT * FROM instituten WHERE instituutID = :instituutID');
    $stmt->execute(['instituutID' => $instituutID]);
    $row = $stmt->fetch();
    return $row;
}

public function addJongere($voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $instituutID) {
    $sql = 'INSERT INTO jongeren (voornaam, achternaam, geboortedatum, email, telefoonnummer, instituutID) 
            VALUES (:voornaam, :achternaam, :geboortedatum, :email, :telefoonnummer, :instituutID)';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'instituutID' => $instituutID
    ]);

    return $this->dbh->lastInsertId();
}

public function editJongere($jongereID, $voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $instituutID) {
    $sql = 'UPDATE jongeren 
            SET voornaam = :voornaam, achternaam = :achternaam, 
                geboortedatum = :geboortedatum, email = :email, 
                telefoonnummer = :telefoonnummer, instituutID = :instituutID 
            WHERE jongereID = :jongereID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'jongereID' => $jongereID,
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'instituutID' => $instituutID
    ]);
}

public function deleteJongere($jongereID) {
    $this->deleteActiviteitenVanJongere($jongereID);

    $sql = 'DELETE FROM jongeren WHERE jongereID = :jongereID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['jongereID' => $jongereID]);
}

public function addActiviteitToJongere($jongereID, $activiteitID) {
    $sql = 'INSERT INTO activiteiten_jongeren (jongereID, activiteitID) VALUES (:jongereID, :activiteitID)';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['jongereID' => $jongereID, 'activiteitID' => $activiteitID]);
}

public function deleteActiviteitenVanJongere($jongereID) {
    $sql = 'DELETE FROM activiteiten_jongeren WHERE jongereID = :jongereID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['jongereID' => $jongereID]);
}

public function selectOneJongere($jongereID) {
    $sql = 'SELECT * FROM jongeren WHERE jongereID = :jongereID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute(['jongereID' => $jongereID]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function selectAllJongeren() {
    $sql = 'SELECT jongeren.*, GROUP_CONCAT(activiteiten.activiteitNaam) AS activiteiten
            FROM jongeren
            LEFT JOIN activiteiten_jongeren ON jongeren.jongereID = activiteiten_jongeren.jongereID
            LEFT JOIN activiteiten ON activiteiten_jongeren.activiteitID = activiteiten.activiteitID
            GROUP BY jongeren.jongereID';

    $stmt = $this->dbh->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function editJongereInstituut($jongereID, $instituutID) {
    $sql = 'UPDATE jongeren SET instituutID = :instituutID WHERE jongereID = :jongereID';
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
        'instituutID' => $instituutID,
        'jongereID' => $jongereID
    ]);
}

function getJongerenInstituutOverzicht() {
    $sql = 'SELECT jongeren.*, instituten.instituutNaam 
            FROM jongeren 
            LEFT JOIN instituten ON jongeren.instituutID = instituten.instituutID';

    $stmt = $this->dbh->query($sql);

    if ($stmt) {
        $resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultaten;
    } else {
        return false;
    }
}


}
