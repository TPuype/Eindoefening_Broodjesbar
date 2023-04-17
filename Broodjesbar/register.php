<?php
require_once("user.php");
require_once("exceptions.php");

$error = "";
if (isset($_POST["btnRegistreer"])) {
    $naam;
    $email = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";

    if(!empty($_POST["txtNaam"])){
        $naam = $_POST["txtNaam"];
    } else{
        $error .= "Vul een gebruikersnaam in.<br>";
    }

    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (
        !empty($_POST["txtWachtwoord"]) &&
        !empty($_POST["txtWachtwoordHerhaal"])
    ) {
        $wachtwoord = $_POST["txtWachtwoord"];
        $wachtwoordHerhaal = $_POST["txtWachtwoordHerhaal"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.<br>";
    }

    if ($error == "") {
        try {
            $gebruiker = new User();
            $gebruiker->setNaam($naam);
            $gebruiker->setEmail($email);
            $gebruiker->setWachtwoord($wachtwoord, $wachtwoordHerhaal);
            $gebruiker = $gebruiker->register();
            $_SESSION["gebruiker"] = serialize($gebruiker);
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is geen geldig e-mailadres.<br>";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit e-mailadres.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h2>Herhalingsoefening 2</h2>
    </header>
    <h1>Registreren</h1>
    <?php

    if ($error == "" && isset($_SESSION["gebruiker"])) {
        echo "U bent succesvol geregistreerd.";
        ?> <a href="index.php">Terug</a> <?php
    } else if ($error != "") {
        echo "<span style=\"color:red;\">" . $error . "</span>";
    }
    if (!isset($_SESSION["gebruiker"])) {
    ?>
        <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
            Naam: <input type="text" name="txtNaam"><br>
            E-mailadres: <input type="email" name="txtEmail"><br>
            Wachtwoord: <input type="password" name="txtWachtwoord"><br>
            Herhaal wachtwoord: <input type="password" name="txtWachtwoordHerhaal"><br>
            <input type="submit" value="Inloggen" name="btnRegistreer">
        </form>
    <?php
    }
    ?>
</body>

</html>