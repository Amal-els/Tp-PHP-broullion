<?php
include_once '../class/autoloader.php';
$db = ConnexionBD::getInstance();
$query = 'SELECT * FROM student;';
$resultat = $db->query($query);
$etudiants = $resultat->fetchAll(PDO::FETCH_OBJ); 

include_once '../fragments/header.php';
?>

<div class="container mt-2">
  <table class="table table-striped">
    <thead class="table-secondary" style = "border-bottom:black;">
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">birthday</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($etudiants as $etudiant): ?>
        <tr>
          <th scope="row"><?= htmlspecialchars($etudiant->id) ?></th>
          <td><?= htmlspecialchars($etudiant->name) ?></td>
          <td><?= htmlspecialchars($etudiant->birthday) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include_once '../fragments/footer.php'; ?>
