<?php
include_once '../class/autoloader.php';
$db = ConnexionBD::getInstance();
$query = 'select * from student;';
$resultat = $db->query($query);
$etudiants = $resultat->fetchAll(PDO::FETCH_OBJ); 

include_once '../fragments/header.php';
?>
<table class="studentTable">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Birthday</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($etudiants as $etudiant){
        ?>
        <tr>
        <th scope="row"> <?= $etudiant->id ?>
        <td><?= $etudiant->name ?></td>
        <td><?= $etudiant->birthday ?></td>
        </tr>

    <?php } 
    include_once '../fragments/footer.php';
    ?>
  </tbody>
</table>
