<?php
class PokemonFeu extends Pokemon {
    public function receiveDamage(int $damage, Pokemon $attacker) {
        if ($attacker instanceof PokemonPlante) {
            $damage *= 2; 
        } elseif ($attacker instanceof PokemonEau || $attacker instanceof PokemonFeu) {
            $damage *= 0.5; 
        }
        parent::receiveDamage((int)$damage, $attacker);
    }
}
?>