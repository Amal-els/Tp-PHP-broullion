<?php
$pageTitle = "Login";
include_once "../fragments/header.php";

?>
<form method="post" action="../actions/login_action.php" enctype="multipart/form-data">
username : <input name="username" type="text" class="form-control">
email: <input name="email" type="text" class="form-control">
<button class="btn btn-primary" type="submit">
            Login
</button>
</form>
<?php

