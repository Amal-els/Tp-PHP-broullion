<?php
include_once '../classes/autoloader.php';
class Student {
    private $id;
    private $name;
    private $birthday;
    private $image;
    private $section_id;

    public function __construct($id, $name, $birthday, $image, $section, $username, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->section_id = $section;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getImage() {
        return $this->image;
    }

    public function getSectionId() {
        return $this->section_id;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getSection() {
        return Section::getById($this->section_id);
    }
    public static function searchByName($search = ''){
        $bd = ConnexionBD::getInstance();
        $query = "SELECT e.id,e.name,e.birthday,s.designation,e.image FROM etudiant e join section s on e.section_id = s.id ";
        if ($search) {
            $query .= "WHERE e.name LIKE '%$search%'";
        }
        $res = $bd->query($query);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }  
    public static function updateStudent($id, $name, $birthday, $image, $section_id) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE etudiant SET name = :name, birthday = :birthday, image = :image, section_id = :section_id WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'birthday' => $birthday,
            'image' => $image,
            'section_id' => $section_id
        ]);
    }

}
?>
