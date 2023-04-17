<?php

declare(strict_types=1);

require_once 'Bestelling.php';

class BestellingLijst
{
    public function getBestellingen(): array
    {
        $dbh = new PDO(
            "mysql:host=localhost;dbname=broodjesbar;charset=utf8",
            "cursusgebruiker",
            "cursuspwd"
        );

        $resultSet = $dbh->query("SELECT bestellingen.id, users.naam as gebruiker, broodjes.naam from bestellingen 
        inner join users on bestellingen.userID = users.id 
        left join broodjes on bestellingen.broodjeID = broodjes.ID");

        $lijst = array();
        foreach ($resultSet as $rij) {
            $bestelling = new Bestelling((int) $rij["id"], $rij["gebruiker"], $rij["naam"]);
            array_push($lijst, $bestelling);
        }
        $dbh = null;
        return $lijst;
    }
}
