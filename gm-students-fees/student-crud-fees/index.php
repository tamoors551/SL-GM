


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