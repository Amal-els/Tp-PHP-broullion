<?php
session_start();
$pageTitle = "Home";
include_once '../classes/autoloader.php';
if (!isset($_SESSION['user_id'])) {
  die("❌ You are not logged in. <a href='login.php'>Login</a>");
} else {
  echo "✅ Logged in as " . $_SESSION['username'] . " (" . $_SESSION['role'] . ")";
}

include_once '../fragments/header.php';
include_once '../fragments/navbar.php';
?>

<div class="main">
  <p>Hello,PHP LOVERS! Welcome to your Admnistration Platform</p>
</div>
<?php
include '../fragments/footer.php';?>  