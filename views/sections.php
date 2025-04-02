<?php
require_once "../classes/Section.php";

$section = new Section(); // Instantiate the class
$sections = $section->getAll(); // Get all sections

// Display sections
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Designation</th>
            <th>Description</th>
        </tr>";

foreach ($sections as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['designation']}</td>
            <td>{$row['description']}</td>
          </tr>";
}
echo "</table>";
echo '
    <a href="../exports/export_csv_sec.php" target="_blank">📤 Export CSV</a> 
    <a href="../exports/export_pdf_sec.php" target="_blank">📤 Export PDF</a> 
    <a href="../exports/export_excel_sec.php" target="_blank">📤 Export Excel</a>
'

?>
