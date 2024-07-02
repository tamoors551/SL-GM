$(document).ready(function() {
    // Load all students on page load

    loadStudents();
    $('#add_student_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/add_student.php',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                loadStudents(); // Reload students list after adding
                $('#add_student_form')[0].reset(); // Reset form
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
                alert("An error occurred while adding the student. Please try again.");
            }
        });
    });

    // AJAX for updating student
    $('#edit_student_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/edit_student.php',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                loadStudents(); // Reload students list after updating
            }
        });
    });

    // AJAX for deleting student
    $(document).on('click', '.delete_student_btn', function() {
        if (confirm('Are you sure you want to delete this student?')) {
            var student_id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'ajax/delete_student.php',
                data: { id: student_id },
                success: function(response) {
                    alert(response);
                    loadStudents(); // Reload students list after deletion
                }
            });
        }
    });

    // AJAX for adding fee
    $('#add_fee_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/add_fee.php',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#add_fee_form')[0].reset(); // Reset form
            }
        });
    });

    // Function to load students in select options (for add fee form)

    // Load students options on page load
    // loadStudentsOptions();


});
    // Function to load students list
    function loadStudents() {
        $.ajax({
            url: 'ajax/load_students.php',
            type: 'GET',
            success: function(response) {
                $('#students_list').html(response);
            }
        });
    }
    

    // AJAX for adding student


    // function loadStudents() {
    //     // Function to reload the list of students.
    //     // Implement your code to fetch and display the updated list of students here.
    //     console.log("Students list reloaded.");
    // }


    
    function loadStudentsOptions() {
        $.ajax({
            url: 'ajax/load_students_options.php',
            type: 'GET',
            success: function(response) {
                $('select[name="student_id"]').html(response);
            }
        });
    }


    
    // Function to load students options
    function edit_student_btn() {
        var studentId = $(this).data('id');
        var studentName = $(this).closest('tr').find('.student_name').text().trim();
        var studentEmail = $(this).closest('tr').find('.student_email').text().trim();
        var studentPhone = $(this).closest('tr').find('.student_phone').text().trim();
        var studentAddress = $(this).closest('tr').find('.student_address').text().trim();
        var studentAmount = $(this).closest('tr').find('.student_amount"').text().trim();

        $('#edit_student_id').val(studentId);
        $('#edit_name').val(studentName);
        $('#edit_email').val(studentEmail);
        $('#edit_phone').val(studentPhone);
        $('#edit_address').val(studentAddress);
        $('#edit_amount').val(studentAmount);

        $('#editModal').modal('show');
    }

    // $('.edit_student_btn').click(function() {
        
    // });
