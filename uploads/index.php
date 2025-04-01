<?php
include_once '../class/autoloader.php';
function combat(&$p1,&$p2)
{
    include_once '../fragments/header.php'; ?>
    <div  class="title alert alert-info" role="alert">
        Les combattants
    </div>
    <?php
    $round = 1;

    while(!($p1->isDead()) && !($p2->isDead())){
        $p1->whoAmI();
        $p2->whoAmI();
        $atk1=  $p1->attack($p2);
        $atk2=  $p2->attack($p1);
        ?>
        <div class = "title alert alert-danger" role="alert">
            Round <?=$round?>
            <div class="round">
                <div class="first">
                    <p><?=$atk1?></p>
                </div>
                <div class="second">
                <p><?=$atk2?></p>

                </div>
            </div>
        </div>

    <?php
        $round++;
    }
    $p1->whoAmI();
    $p2->whoAmI();
    if ($p1->getHp()>$p2->getHp()) {
        $vainquer = $p1;}
    elseif ($p1->getHp()<$p2->getHp()) {
        $vainquer = $p2;}
    ?>
    <div class=" title alert alert-success" role="alert">
    <?php 
    if (isset($vainquer)) {
        echo "Le vainqueur est: {$vainquer->getName()}"  ;?>
        <img src="<?=$vainquer->getUrl()?>" alt="pokemon's image">

    <?php }
    else {
        echo "Tie";
    ?>
    </div>

    <?php
    }
    include_once '../fragments/footer.php';
}
$a1 = new AttackPokemon(10,100,2,20);
$p1 = new PokemonFeu("Charmeleon","../images/pokemonFeu.webp",200,$a1);
$a2 = new AttackPokemon(30,80,4,20);
$p2 = new PokemonEau("Giganex","../images/pokemonEau.webp",200,$a2);
$a3 = new AttackPokemon(50,90,3,20);
$p3 = new PokemonPlante("Planta","../images/pokemonPlante.webp",200,$a3);

//combat($p1,$p2);
combat($p1,$p3);
 
