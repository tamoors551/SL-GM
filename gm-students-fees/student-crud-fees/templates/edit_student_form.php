<?php include('header.php'); ?>

<h2>Edit Student</h2>
<form id="edit_student_form" action="../ajax/edit_student.php" method="POST">
    <input type="hidden" name="id" id="edit_student_id">
    <label>Name:</label>
    <input type="text" name="name" id="edit_student_name" required><br>
    <label>Email:</label>
    <input type="email" name="email" id="edit_student_email" required><br>
    <label>Phone:</label>
    <input type="text" name="phone" id="edit_student_phone"><br>
    <label>Address:</label>
    <textarea name="address" id="edit_student_address"></textarea><br>
    <input type="submit" value="Update Student">
</form>

<?php include('footer.php'); ?>
