$(document).ready(function() {
    // Load all students on page load
    loadStudents();

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
            }
        });
    });

    // AJAX for editing student (populate form fields)
    $(document).on('click', '.edit_student_btn', function() {
        var student_id = $(this).data('id');
        var student_name = $(this).closest('tr').find('.student_name').text();
        var student_email = $(this).closest('tr').find('.student_email').text();
        var student_phone = $(this).closest('tr').find('.student_phone').text();
        var student_address = $(this).closest('tr').find('.student_address').text();

        $('#edit_student_id').val(student_id);
        $('#edit_student_name').val(student_name);
        $('#edit_student_email').val(student_email);
        $('#edit_student_phone').val(student_phone);
        $('#edit_student_address').val(student_address);
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
    function loadStudentsOptions() {
        $.ajax({
            url: 'ajax/load_students_options.php',
            type: 'GET',
            success: function(response) {
                $('select[name="student_id"]').html(response);
            }
        });
    }

    // Load students options on page load
    loadStudentsOptions();
});
