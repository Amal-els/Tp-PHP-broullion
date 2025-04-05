<?php
class SessionManager {
    public static function gererVisites() {
        if (!isset($_SESSION['visites'])) {
            $_SESSION['visites'] = 1;
            echo "<p class='alert alert-info text-center'>Bienvenue sur notre site !</p>";
        } else {
            $_SESSION['visites']++;
            echo "<p class='alert alert-success text-center'>Merci pour votre fidélité, c’est votre " . $_SESSION['visites'] . "ème visite.</p>";
        }
    }
}?>