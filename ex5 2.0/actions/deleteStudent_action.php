<?php
include_once '../fragments/studentActions.php';
if (isset($_GET['id'])) {
    deleteStudent($_GET['id']);
    header("Location: ../views/students.php");
}