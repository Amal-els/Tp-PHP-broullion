<?php
$pageTitle = "Détails Cv";
include_once "../class/autoloader.php";
include_once '../fragments/header.php';
$db = ConnexionBD::getInstance();
$id = $_GET['id'];
if (!isset($id)) {
    header('Location: listeEtudiants.php');
}
$query = "SELECT * FROM student where id = '$id';";
$resultat = $db->query($query);
$info = $resultat->fetch(PDO::FETCH_OBJ); 
if (!isset($info)) {
    header('Location: listeEtudiants.php ');
}
else {
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><?= $info->name?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $info->specialite ?></td>
        </tr>
        <tr>
            <td><?= $info->birthday?></td>
        </tr>
    </tbody>
</table>
<?php }
include '../fragments/footer.php' ?>