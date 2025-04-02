<?php
require_once "classes/Student.php";

$student = new Student(); // Instantiate the class
$students = $student->getAll(); // Call the method

// Display students
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Section</th>
        </tr>";

foreach ($students as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['birthday']}</td>
            <td>{$row['designation']}</td>
          </tr>";
}

echo "</table>";
?>
