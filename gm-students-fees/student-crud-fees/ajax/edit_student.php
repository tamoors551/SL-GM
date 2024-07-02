<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student Modal</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
  include('../includes/db_connect.php');

  function sanitize($conn, $input) {
      return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $student_id = sanitize($conn, $_POST['student_id']);
      $name = sanitize($conn, $_POST['name']);
      $email = sanitize($conn, $_POST['email']);
      $phone = sanitize($conn, $_POST['phone']);
      $address = sanitize($conn, $_POST['address']);

      $sql_update = "UPDATE students SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$student_id'";

      if ($conn->query($sql_update) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }

  $sql = "SELECT students.id, students.name, students.email, students.phone, students.address, fees.amount
          FROM students
          LEFT JOIN fees ON students.id = fees.student_id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo '<table class="table">';
      echo '<thead class="thead-dark">';
      echo '<tr>';
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>Phone</th>';
      echo '<th>Address</th>';
      echo '<th>Amount</th>';
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

  <!-- Edit Student Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <form id="editForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Student Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" id="edit_student_id" name="student_id">
                      <div class="form-group">
                          <label for="edit_name">Name:</label>
                          <input type="text" class="form-control" id="edit_name" name="name" required>
                      </div>
                      <div class="form-group">
                          <label for="edit_email">Email:</label>
                          <input type="email" class="form-control" id="edit_email" name="email" required>
                      </div>
                      <div class="form-group">
                          <label for="edit_phone">Phone:</label>
                          <input type="text" class="form-control" id="edit_phone" name="phone">
                      </div>
                      <div class="form-group">
                          <label for="edit_address">Address:</label>
                          <textarea class="form-control" id="edit_address" name="address"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="edit_amount">amount:</label>
                          <textarea class="form-control" id="edit_amount" name="address"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Update</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
     
  </script>
</body>
</html>
