<?php
session_start();

require_once("user.php");
require_once("BroodjesLijst.php");;

if (!isset($_SESSION["gebruiker"])) {
    header("Location: publicpage.php");
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["User"]);


$bl = new BroodjesLijst();
$bestelGeslaagd = false;


if (isset($_GET["action"]) && $_GET["action"] === "bestel") {
    $bl->addBestelling((int) $gebruiker->getId(), (int) $_POST["broodjes"]);
    $bestelGeslaagd =true;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
require_once("header.php");
?>
<h1>Broodjesbar</h1>
<h2>Welkom <?php echo $gebruiker->getNaam(); ?></h2>
<h3>Plaats uw bestelling</h3>
<h4>Menu:</h4>
<form action="privatepage.php?action=bestel" method=POST>
    <select name="broodjes" id="broodjes">
        <?php
        $broodjesLijst = $bl->getBroodjes();
        foreach ($broodjesLijst as $broodje) {
        ?> <option value="<?php echo $broodje->getId(); ?>">
                <?php
                echo $broodje->getNaam() . " (" . $broodje->getOmschrijving() . ", " .$broodje->getPrijs() . " euro)";
                ?></option>
        <?php
        }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Bestellen">
</form>
<br>
<section>
    <?php
    if($bestelGeslaagd){
        echo "Bestelling geplaatst";
    }
    ?>
</section>
<?php
require_once("footer.php");
?>