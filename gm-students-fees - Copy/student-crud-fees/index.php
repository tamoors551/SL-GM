<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
    <!-- Bootstrap CSS v5.2.1 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Your custom CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS v5.2.1 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your custom script.js -->
<script src="js/script.js"></script>


    </head>

    <body>
    <?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Student</h2>
            <?php include('templates/add_student_form.php'); ?>
        </div>
        
        <div class="col-md-6">
            <h2>Add Fee</h2>
            <?php include('templates/add_fee_form.php'); ?>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2>All Students</h2>
            <div id="students_list">
                <!-- Students list will be loaded dynamically via AJAX -->
               
            </div>
        </div>
    </div>
</div>
<hr><hr><hr><h1><hr></h1>
<?php include('templates/footer.php'); ?>

<script>
// You can add any additional JavaScript or jQuery scripts here
</script>


    </body>
</html>