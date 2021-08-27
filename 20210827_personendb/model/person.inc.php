<?php 

/**
 * Klasse Person beschreibt woraus genau eine Person besteht
 * (Eigenschaften wurden direkt aus der Tabelle "person" übernommen)
 */
class Person {
    public int $id;
    public string $vorname;
    public string $nachname;

    function __construct(int $id, string $vorname, string $nachname)
    {
        // Zuweisung der Übergabeparameter auf die Eigenschaften der Klasse
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
    }
}

?>