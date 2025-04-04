<?php
session_start();
include_once '../fragments/tableEtudiants.php';
include_once '../classes/Student.php';
if (isset($_GET["search"])) {
    $etudiants = Student::searchByName(strip_tags($_GET["search"]));
    include_once '../fragments/header.php';
    tableauEtudiant($etudiants);
    include_once '../fragments/footer.php';

}
