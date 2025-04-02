<?php
session_start();
require_once "../classes/Student.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$studentObj = new Student();
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$students = $studentObj->getAll($search);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
        .student-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable({
                "paging": true,         
                "info": true,             
                "lengthChange": false,     
                "pageLength": 2         
            });
        });
    </script>
</head>
<body>
    <h2>Liste des etudiants</h2>
    <form method="GET" action="">
        <label for="search">Rechercher par nom :</label>
        <input type="text" id="search" name="search" value="<?= htmlspecialchars($search); ?>">
        <button type="submit">Filtrer</button>
    </form>
    <br>
    <table id="studentsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']); ?></td>
                    <td>
                    <img src="<?= !empty($student['image']) ? htmlspecialchars($student['image']) : 'default.jpg'; ?>" 
     alt="Photo de <?= htmlspecialchars($student['name'] ?? 'Inconnu'); ?>" 
     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
     onerror="this.onerror=null; this.src='default.jpg';">
                    </td>
                    <td><?= htmlspecialchars($student['name']); ?></td>
                    <td><?= htmlspecialchars($student['birthday']); ?></td>
                    <td><?= htmlspecialchars($student['designation'] ?? 'Non assigné'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="../exports/export_csv_stu.php" target="_blank">📤 Export CSV</a>
    <a href="../exports/export_pdf_stu.php" target="_blank">📤 Export PDF</a>
    <a href="../exports/export_excel_stu.php" target="_blank">📤 Export Excel</a>
</body>
</html>