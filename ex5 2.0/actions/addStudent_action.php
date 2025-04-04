<?php
$name = strip_tags($_POST['name']);
$birthday = strip_tags($_POST['birthday']);
$section = strip_tags($_POST['section']);
if (isset($_FILES["image"])) {
    $newFilePath = "../photos/".uniqid().$_FILES["image"]['name'];
    move_uploaded_file($_FILES["image"]['tmp_name'], $newFilePath);
}
else {
    header("Location:../views/addingStudent.php?errorMessage=No Image added");
    exit();    }
if (isset($name) && isset($birthday) && isset($section)) {
    addStudent($name,$birthday,$section,$newFilePath);
    header("Location:../views/students.php");
}
else {
    header("Location:../views/addingStudent.php?errorMessage=Veuillez vérifier vos crédentials");
    }
