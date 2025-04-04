<?php 
$pageTitle = "Ajout d'un étudiant";
include "../fragments/header.php";?>

<form method="post" action="../actions/addStudent_action.php" enctype="multipart/form-data">
name : <input name="name" type="text" class="form-control">
birthday : <input name="birthday" type="text" class="form-control">
section <input name="section" type="text" class="form-control">
image: <input name="image" type="file" class="form-control">
<button class="btn btn-primary" type="submit">
Add
</button>
</form>