<?php
include('../includes/db_connect.php');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="student_name">' . $row['name'] . '</td>';
        echo '<td class="student_email">' . $row['email'] . '</td>';
        echo '<td class="student_phone">' . $row['phone'] . '</td>';
        echo '<td class="student_address">' . $row['address'] . '</td>';
        echo '<td><button class="btn btn-primary edit_student_btn" data-id="' . $row['id'] . '">Edit</button></td>';
        echo '<td><button class="btn btn-danger delete_student_btn" data-id="' . $row['id'] . '">Delete</button></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">No students found</td></tr>';
}

$conn->close();
?>
