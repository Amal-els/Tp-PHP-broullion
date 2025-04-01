<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../fragments/headerStyle.css">

    <title>
        <?php
        if (isset($pageName)) {
            echo $pageName;
        }
        else {
            echo "Page";
        }
        ?>
    </title>
</head>
<body>
    <div class="container">
    
