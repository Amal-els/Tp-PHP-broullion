<?php
class PokemonPlante extends Pokemon {
    public function receiveDamage(int $damage, Pokemon $attacker) {
        if ($attacker instanceof PokemonEau) {
            $damage *= 2; 
        } elseif ($attacker instanceof PokemonPlante || $attacker instanceof PokemonFeu) {
            $damage *= 0.5;
        }
        parent::receiveDamage((int)$damage, $attacker);
    }
}?>