<?php
include('../includes/db_connect.php');

// SQL query to join students and fees tables
$sql = "SELECT students.id, students.name, students.email, students.phone, students.address, fees.amount ,fees.date_paid,fees.created_on	
        FROM students
        LEFT JOIN fees ON students.id = fees.student_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the data in a table
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Phone</th>';
    echo '<th>Address</th>';
    echo '<th>Amount</th>';
    echo '<th>date_paid</th>';
    echo '<th>created_on</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="student_name">' . $row['name'] . '</td>';
        echo '<td class="student_email">' . $row['email'] . '</td>';
        echo '<td class="student_phone">' . $row['phone'] . '</td>';
        echo '<td class="student_address">' . $row['address'] . '</td>';
        echo '<td class="fee_amount">' . $row['amount'] . '</td>';
        echo '<td class="date_paid">' . $row['date_paid'] . '</td>';
        echo '<td class="created_on">' . $row['created_on'] . '</td>';
        echo '<td><button class="btn btn-primary" onclick="edit_student_btn()" data-id="' . $row['id'] . '">Edit</button></td>';
        echo '<td><button class="btn btn-danger delete_student_btn" data-id="' . $row['id'] . '">Delete</button></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No students found</p>';
}

$conn->close();
?>
