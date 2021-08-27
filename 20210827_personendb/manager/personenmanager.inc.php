<?php  

require_once __DIR__ . '/../model/person.inc.php';

// Alles für die Tabelle "person"
// --> Datensätzen einfügen, bearbeiten, löschen, auslesen,...

class PersonenManager {
    private PDO $connection;

    // Konstruktor
    function __construct(PDO $connection){
        // Übergabeparameter --> Eigenschaften zuweisen
        // $this->connection   <-- Eigenschaft der Klasse
        $this->connection = $connection;
    }

    // function funktionsName() : Rückgabedatentyp {  }
    function createPerson(string $vorname, string $nachname) : int {
        /**
         * vorname: Admin
         * nachname: Chef
         * INSERT INTO person
         * (vorname, nachname)
         * VALUES
         * ('Admin', 'Chef')
         * 
         * vorname: '',''); DELETE FROM person;
         * nachname: 
         * INSERT INTO person
         * (vorname, nachname)
         * VALUES
         * ('',''); DELETE FROM person;)
         */

        // SQL-Anweisung
        $ps = $this->connection->prepare(
                'INSERT INTO person 
                (vorname, nachname) 
                VALUES 
                (:vorname, :nachname) ');
        // Named Parameter mit Values ersetzen
        $ps->bindValue(':vorname', $vorname);
        $ps->bindValue(':nachname', $nachname); 
        // SQL-Statement an die Datenbank senden und ausführen
        $ps->execute();

        // ID des generierten Datensatzes
        $id = $this->connection->lastInsertId();

        // Rückgabe der ID
        return $id;
    }

    // Liefert ein Array von Personen
    function getPersonen() : array {
        $ps = $this->connection->prepare("SELECT * FROM person");
        $ps->execute();

        $personen = [];
        while($row = $ps->fetch()){
            // Array befüllen
            $id = $row['id'];
            $vorname = $row['vorname'];
            $nachname = $row['nachname'];

            // Objekt der Klasse Person erzeugen
            $person = new Person($id, $vorname, $nachname);

            // Person-Objekt in die List einfügen
            $personen[] = $person;
        }

        // Liste (Array) mit Personen-Objekten zurückgeben
        return $personen;
    }

}

?>