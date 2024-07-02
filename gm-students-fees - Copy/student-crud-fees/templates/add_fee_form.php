<?php include('header.php'); ?>

<h2>Add Fee</h2>
<form id="add_fee_form" action="../ajax/add_fee.php" method="POST">
    <label>Select Student:</label>
    <select name="student_id" required>
        <!-- Options will be loaded dynamically via AJAX -->
    </select><br>
    <label>Amount:</label>
    <input type="text" name="amount" required><br>
    <label>Date Paid:</label>
    <input type="date" name="date_paid" required><br>
    <input type="submit" value="Add Fee">
</form>

<?php include('footer.php'); ?>
