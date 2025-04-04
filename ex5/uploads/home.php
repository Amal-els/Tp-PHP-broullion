<?php
$pageTitle = "Home";
include '../fragments/header.php';?>
<nav class="navbar navbar-expand-lg "id = "navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Students Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liste des étudiants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liste des sections</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="main">
  <p>Hello,PHP LOVERS! Welcome to your Admnistration Platform</p>
</div>
<?php
include '../fragments/footer.php';?>  