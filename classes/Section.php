<?php
require_once "Database.php";

class Section {
    private $pdo;

    // Constructor to initialize PDO connection
    public function __construct() {
        $this->pdo = Database::connect();
    }

    // Get all sections
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM section");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a section by ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM section WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new section
    public function create($designation, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO section (designation, description) VALUES (:designation, :description)");
        return $stmt->execute([
            'designation' => $designation,
            'description' => $description
        ]);
    }

    // Update an existing section
    public function update($id, $designation, $description) {
        $stmt = $this->pdo->prepare("UPDATE section SET designation = :designation, description = :description WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'designation' => $designation,
            'description' => $description
        ]);
    }

    // Delete a section
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM section WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
