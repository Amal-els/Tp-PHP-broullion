<?php
session_start();
require_once "../classes/Student.php";

if (!isset($_SESSION['user_id'])) {
    die("❌ You are not logged in. <a href='login.php'>Login</a>");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Students Management Studio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Listes des etudiants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sections.php">Listes des sections</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../actions/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
<h2>Bienvenu(e)
<?php echo"  " . $_SESSION['username'] . " (" . $_SESSION['role'] . ") "?></h2>
<?php if ($_SESSION['role'] == 'admin') : ?>
<?php endif; ?>