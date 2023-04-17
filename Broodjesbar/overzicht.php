<?php

declare(strict_types=1);

require_once "BestellingLijst.php";

$bestel = new BestellingLijst();

?>


<?php
require_once("header.php");
?>
<h1>Broodjesbar</h1>
<h2>Overzicht</h2>
<h3>Bestellingen:</h3>
<ul>
    <?php
    $bestelLijst = $bestel->getBestellingen();
    foreach ($bestelLijst as $bestelling) {
    ?>
        <li>
            <?php echo $bestelling->getUser() . ",  " . $bestelling->getBroodje() ?>    
        </li>
    <?php
    }
    ?>
</ul>
<?php
require_once("footer.php");
?>