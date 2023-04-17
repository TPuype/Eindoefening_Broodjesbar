<?php
session_start();
unset($_SESSION["gebruiker"]);
require_once("header.php");
?>
<h1>Logout</h1>
<h2>U bent uitgelogd</h2>
<?php
require_once("footer.php");
?>