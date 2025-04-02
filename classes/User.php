<?php
require_once "Database.php";

class User {
    public static function login($email) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location:../views/login.php");
        exit();
    }
}
?>
