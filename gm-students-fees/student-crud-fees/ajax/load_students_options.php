<?php
include('../includes/db_connect.php');

$sql = "SELECT id, name FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
} else {
    echo '<option value="">No students found</option>';
}

$conn->close();
?>
