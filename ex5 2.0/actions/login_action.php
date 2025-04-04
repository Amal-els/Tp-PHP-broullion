<?php

session_start();
require_once '../classes/autoloader.php';  // Inclure la classe User

// Connexion à la base de données
$db = ConnexionBD::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_email = $_POST['email'];
    // Requête pour récupérer l'utilisateur
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username'=>$input_username]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user_data && $input_email == $user_data['email'] && $input_username == $user_data['username']) {
        // Création de l'objet utilisateur
        $user = new User($user_data['id'], $user_data['username'], $user_data['email'], $user_data['role']);
        
        // Stockage dans la session
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['role'] = $user->getRole();

        header("Location: ../views/home.php");
        exit;
    } else {
        echo "Identifiants incorrects.";
    }
}
?>

