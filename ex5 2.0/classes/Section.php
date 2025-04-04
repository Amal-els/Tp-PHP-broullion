<?php
include_once '../classes/autoloader.php';
class Section {
    private $id;
    private $designation;
    private $description;

    public function __construct($id, $designation, $description) {
        $this->id = $id;
        $this->designation = $designation;
        $this->description = $description;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getDesignation() { return $this->designation; }
    public function getDescription() { return $this->description; }

    public static function getAll(){
        $bd = ConnexionBD::getInstance();
        $query = "SELECT * FROM section";
        $res = $bd->query($query);
        return $res->fetchAll(PDO::FETCH_OBJ);   
    }
    // Retourner tous les étudiants d'une section
    public static function getStudents($section_id = '') {
        $bd = ConnexionBD::getInstance();
        $query = "SELECT e.id,e.name,e.birthday,s.designation,e.image FROM etudiant e join section s on e.section_id = s.id ";
        if ($section_id) {
            $query .= "where s.id = '$section_id' ;";

        }
        $res = $bd->query($query);
        return $res->fetchAll(PDO::FETCH_OBJ);        
    }

    // Méthode pour récupérer une section par ID
    public static function getById($id) {
        $bd = ConnexionBD::getInstance();
        $query = "SELECT * FROM section WHERE id = '$id'";
        $res = $bd->query($query);
        return $res->fetch(PDO::FETCH_OBJ);    
    }
}

?>
