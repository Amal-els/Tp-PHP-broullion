<?php
class AttackPokemon {
    public int $attackMinimal;
    public int $attackMaximal;
    public float $specialAttack;
    public int $probabilitySpecialAttack;

    public function __construct(int $attackMinimal, int $attackMaximal, float $specialAttack, int $probabilitySpecialAttack) {
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }
}
?>