<?php 
// Am Anfang immer eine DB-Verbindung aufbauen
require_once 'db/dbconnection.inc.php';
// PersonenManager als Klasse inkludieren
require_once 'manager/personenmanager.inc.php';

// Objekt der Klasse PersonenManager erzeugen
// und die DB-Connection übergeben
$personenManager = new PersonenManager($connection);

// Personen laden (bekommen ein Array von Personen)
$personen = $personenManager->getPersonen();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personen</title>
</head>
<body>
    <h1>Personen</h1>
    <?php
    // Prüfen ob GET-Parameter "inserted" gesetzt ist --> Meldung ausgeben,
    // dass Person angelegt wurde
    if(isset($_GET['inserted'])){
        // wird nur ausgegeben wenn "inserted" als GET-Parameter gesetzt ist
        echo '<div class="success">';
        echo '<p>Die Person wurde angelegt.</p>';
        echo '</div>';
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Für jede gefundene Person: Tabellen-Zeile
            // für jeden Eintrag in $personen: Zugriff über $person
            foreach($personen as $key => $person) {
                echo '<tr>';

                echo '<td>';
                echo $person->id;
                echo '</td>';
                echo '<td>';
                echo htmlspecialchars($person->vorname);
                echo '</td>';
                echo '<td>';
                echo htmlspecialchars($person->nachname);
                echo '</td>';

                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>