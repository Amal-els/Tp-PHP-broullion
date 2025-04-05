<?php
require_once "AttackPokemon.php";
require_once "PokemonEau.php";
require_once "PokemonFeu.php";
require_once "PokemonPlante.php";
require_once "../fragments/rounds.php";
class Pokemon {
    protected string $name;
    protected string $image;
    protected int $hp;
    protected AttackPokemon $attackPokemon;
    public function __construct(string $name, string $image, int $hp, AttackPokemon $attackPokemon) {
        $this->name = $name;
        $this->image = $image;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getHp(): int {
        return $this->hp;
    }

    public function getImage(): string {
        return $this->image;
    }
    public function getAttackPokemon(): AttackPokemon {
        return $this->attackPokemon;
    }

    public function isDead(): bool {
        return $this->hp <= 0;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function setImage(string $image){
        $this->image = $image;
    }
    public function setHp(string $hp){
        $this->hp = $hp;
    }
    public function setAttackPokemon(AttackPokemon $attack){
        $this->attackPokemon = $attack;
    }
    public function WhoAmI(){
        echo" <table class='table table-bordered border-primary'>
        <thead>
        <tr>
        <th scope='col'>{$this->getName()} 
        {$this->getCard()}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th scope='row'>Points: " . ($this->getHp()) . "</th>
        <tr>
        <th scope='row'>Min attack points : {$this->getAttackPokemon()->attackMinimal} </th>
        </tr>
        <tr>
        <th scope='row'>Max attack points : {$this->getAttackPokemon()->attackMaximal}</th>
        </tr>
        <tr>
        <th scope='row'>Special Attack : {$this->getAttackPokemon()->specialAttack}</th>
        </tr>
        <tr>
        <th scope='row'>Prpbability Special Attack : {$this->getAttackPokemon()->probabilitySpecialAttack}</th>
        </tr>
        </tbody>
        </table>";
    }
    public function attack(Pokemon $opponent, &$dam) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(1, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $damage *= $this->attackPokemon->specialAttack;
        }
        $dam=$damage;
        $opponent->receiveDamage($damage, $this);
    }
    public function receiveDamage(int $damage, Pokemon $attacker) {
        $this->hp -= $damage;
    }
    public function getCard() {
        return "
            <div class='col-md-5 text-center p-3'>
                <div class='card shadow'>
                    <img src='{$this->getImage()}' class='card-img-top' alt='{$this->getName()}'>
                    <div class='card-body'>
                       
                    </div>
                </div>
            </div>
        ";
    }
}
$charizard = new PokemonFeu("Dracaufeu", "../images/Feu.png", 100, new AttackPokemon(10, 20, 2, 30));
$blastoise = new PokemonEau("Tortank", "../images/Eau.png", 120, new AttackPokemon(8, 18, 2, 40));
?>