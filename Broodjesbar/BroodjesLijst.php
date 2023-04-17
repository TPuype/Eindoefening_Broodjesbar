<?php

declare(strict_types=1);

require_once 'Broodje.php';

class BroodjesLijst
{
    public function getBroodjes(): array
    {
        $dbh = new PDO(
            "mysql:host=localhost;dbname=broodjesbar;charset=utf8",
            "cursusgebruiker",
            "cursuspwd"
        );

        $resultSet = $dbh->query("select * from broodjes");

        $lijst = array();
        foreach ($resultSet as $rij) {
            $broodje = new Broodje((int) $rij["ID"], $rij["Naam"], $rij["Omschrijving"], (float) $rij["Prijs"]);
            array_push($lijst, $broodje);
        }
        $dbh = null;
        return $lijst;
    }   

    public function addBestelling(int $userID, int $broodjeID)
    {
        if (!empty($userID) && !empty($broodjeID)) {
            $sql = "insert into bestellingen (userID, broodjeID) values (:userID, :broodjeID)";
            $dbh = new PDO(
                "mysql:host=localhost;dbname=broodjesbar;charset=utf8",
                "cursusgebruiker",
                "cursuspwd"
            );
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':userID' => $userID, ':broodjeID' => $broodjeID));
            $dbh = null;
        } 
    }
}
