<?php
include('../includes/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $date_paid = $_POST['date_paid'];

    $sql = "INSERT INTO fees (student_id, amount, date_paid) VALUES ($student_id, $amount, '$date_paid')";

    if ($conn->query($sql) === TRUE) {
        echo "Fee added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
