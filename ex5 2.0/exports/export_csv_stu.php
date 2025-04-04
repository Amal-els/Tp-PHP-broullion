<?php
require_once "../classes/autoloader.php";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=students.csv');

$pdo = ConnexionBD::getInstance();
$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nom', 'Date de Naissance', 'Section']);
$stmt = $pdo->query("SELECT e.id,e.name,e.birthday,s.designation 
                     FROM etudiant e
                     JOIN section s ON e.section_id = s.id");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['id'], $row['name'], $row['birthday'], $row['designation'] ?? 'Non assigné']);
}

fclose($output);
?>
