<?php
include_once "../class/Session.php";
$s = new Session("MySession");
if (isset($_POST["reset"])){
    $s->sessionReset();
    echo "Votre session a été réinitialisée avec succés";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form method = "post">
        <button type = "submit" name = "reset">Réinitialiser la session</button>
    </form>
</body>
</html>
