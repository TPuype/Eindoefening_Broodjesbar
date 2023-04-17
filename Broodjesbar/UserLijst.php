<?php
declare(strict_types=1);

class UserLijst{
    public function getNaamByEmail(string $email): string
    {
        $sql = "select naam from users where email = :email";
        $dbh = new PDO(
            "mysql:host=localhost;dbname=broodjesbar;charset=utf8",
            "cursusgebruiker",
            "cursuspwd"
        );
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $naam = $rij["naam"];
        $dbh = null;
        return $naam;
    }
}
?>