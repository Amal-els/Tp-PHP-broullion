<?php 
class PokemonEau extends Pokemon {
    public function receiveDamage(int $damage, Pokemon $attacker) {
        if ($attacker instanceof PokemonFeu) {
            $damage *= 2; 
        } elseif ($attacker instanceof PokemonEau || $attacker instanceof PokemonPlante) {
            $damage *= 0.5; 
        }
        parent::receiveDamage((int)$damage, $attacker);
    }
}?>

