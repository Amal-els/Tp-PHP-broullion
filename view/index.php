<?php 
require_once "../classes/Pokemon.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Battle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
    <div class="alert alert-info" role="alert">
  Les Combattants
</div>
        <div class="mt-5 p-3 bg-white shadow rounded">
            <?php
            $i =1;
                while (!$charizard->isDead() && !$blastoise->isDead()) {
            $hp1 =$blastoise->getHp();
            $hp2 =$charizard->getHp();
                    $charizard->attack($blastoise,$dam1);
                    $blastoise->attack($charizard,$dam2);
                    if ($blastoise->isDead()) {
                        rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                        lastround($blastoise,$charizard,$blastoise->getHp(),$charizard->getHp(),$dam1,$dam2,$i);
                        echo "<h3 class='text-success text-center'>le vainqueur est{$charizard->getCard()} </strong></h3>";
                        break;

                    }
                    if ($charizard->isDead()) {
                        rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                        lastround($blastoise,$charizard,$blastoise->getHp(),$charizard->getHp(),$dam1,$dam2,$i);
                        echo "<h3 class='text-success text-center'>le vainqueur est{$blastoise->getCard()} </strong></h3>";
                        
                        break;
                    }
                    rounds($blastoise,$charizard,$hp1,$hp2,$dam1,$dam2,$i);
                }
            ?>
        </div>
    </div>
</body>
</html>
