<?php
$pageName = "Acceuil";
include 'fragments/header.php';
?>
<form action="index.php" method = "post">
    Saisir les coordonnées des etudiants (séparés par /): <input type="text" name = "etuds">
    <input type="submit" value = "submit">
</form>