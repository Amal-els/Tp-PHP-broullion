<?php
session_start();
require_once "../classes/Student.php";

if (!isset($_SESSION['user_id'])) {
    die("❌ You are not logged in. <a href='login.php'>Login</a>");
} else {
    echo "✅ Logged in as " . $_SESSION['username'] . " (" . $_SESSION['role'] . ")";
}
?>


<h2>Bienvenue</h2>
<?php


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
    <h2>Liste des étudiants</h2>
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
                    <img src="<?= htmlspecialchars($student['image'] ?? 'photos/default.jpg'); ?>" 
     alt="Photo de <?= htmlspecialchars($student['name']); ?>" 
     style="width: 50px; height: 50px; border-radius: 50%;">

                    </td>
                    <td><?= htmlspecialchars($student['name']); ?></td>
                    <td><?= htmlspecialchars($student['birthday']); ?></td>
                    <td><?= htmlspecialchars($student['designation'] ?? 'Non assigné'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </body>
</html>
<a href="../actions/logout.php">Déconnexion</a>

<?php if ($_SESSION['role'] == 'admin') : ?>
    <a href="students.php">Gérer les étudiants</a>
    <a href="sections.php">Gérer les sections</a>
<?php endif; ?>
