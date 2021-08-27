<?php 
/**
 * 1) Formular zum Eintragen einer Person
 * 2) Danach (nach eintragen: weiterleiten auf 
 * eine Seite wo die tabellarische Ausgabe der Einträge erfolgt)
 */

// Am Anfang immer eine DB-Verbindung aufbauen
require_once 'db/dbconnection.inc.php';
// PersonenManager als Klasse inkludieren
require_once 'manager/personenmanager.inc.php';

// Objekt der Klasse PersonenManager erzeugen
// und die DB-Connection übergeben
$personenManager = new PersonenManager($connection);

 // Prüfen ob das Formular abgeschickt wurde
if(isset($_POST['btsubmit'])){
    // HTML input mit name="vorname" einlesen
    $vorname = $_POST['vorname']; 
    // HTML input mit name="nachname" einlesen
    $nachname = $_POST['nachname'];
    
    // Eingabe an die Methode createPerson übergeben (und ID zurückbekommen)
    $personenId = $personenManager->createPerson($vorname, $nachname);

    // Weiterleitung (um doppeltes Absenden der Formulardaten zu vermeiden)
    header("Location: ./personen.php?inserted=true&id=$personenId");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person erstellen</title>
</head>
<body>
    <h1>Person anlegen</h1>
    <form action="./index.php" method="post">
        <div>
            <label for="vorname">Vorname: </label>
            <input type="text" name="vorname" id="vorname">
        </div>
        <div>
            <label for="nachname">Nachname: </label>
            <input type="text" name="nachname" id="nachname">
        </div>
        <div>
            <button name="btsubmit">Person anlegen</button>
        </div>
    </form>
</body>
</html>