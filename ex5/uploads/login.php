<?php
$pageTitle = "Login";
include '../fragments/header.php';

?>
<form method="post" action="processLogin.php" enctype="multipart/form-data">
    email : <input name="email" type="text" class="form-control">
    password <input name="password" type="password" class="form-control">
    photo: <input name="fichier" type="file" class="form-control">
    <button class="btn btn-primary" type="submit">
        Login
    </button>
</form>
<?php if (isset($_GET['errorMessage'])) { ?>
    <div class="alert alert-danger">
        <?= $_GET['errorMessage'] ?>
    </div>
<?php } ?>
