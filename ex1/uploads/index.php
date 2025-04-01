<?php
$pageName = "Résultat";
include_once "../class/autoloader.php";
include '../fragments/header.php';

//var_dump($_POST);
/*
$inputArray = explode("/",$_POST["etuds"]);
foreach($inputArray as $item){
    $array = explode(",",$item,2);
    $assocArrayEtud[$array[0]] = explode(",",$array[1]);  
}
foreach($assocArrayEtud as  $key=> &$value){
    for ($i=0;$i<count($value);$i++) {
        $value[$i] = trim($value[$i]);
    }
}
//var_dump($assocArrayEtud);
$arrayEtuds = [];
$i = 0;
foreach($assocArrayEtud as $key=>$value) {
    $arrayEtuds[$i] = new Etudiant(trim($key),$value);
}
foreach($arrayEtuds as $item){
    $item->afficherNotes();
}
    */

$aymen = new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);
$skander = new Etudiant("Skander", [15, 9, 8, 16]);

$aymen->afficherNotes();
$moyenne1 = $aymen->calculerMoyenne();?>
<div class="alert alert-info" role="alert">
    Votre moyenne est <?=$moyenne1?>
</div>
</div>

<?php
$moyenne2 = $skander->calculerMoyenne();
$skander->afficherNotes();?>
<div style = "margin:0 "class="alert alert-info" role="alert">
    <?="Votre moyenne est $moyenne2" ?>
</div>
<?php
include '../fragments/footer.php';
?>