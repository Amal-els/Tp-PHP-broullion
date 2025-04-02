<?php
require_once "Database.php";

class Student {
    private $pdo;

    // Constructor to initialize PDO connection
    public function __construct() {
        $this->pdo = Database::connect();
    }

    // Get all students (Non-static)
    public function getAll() {
        $stmt = $this->pdo->query("SELECT etudiant.*, section.designation 
                                   FROM etudiant 
                                   LEFT JOIN section ON etudiant.section_id = section.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
