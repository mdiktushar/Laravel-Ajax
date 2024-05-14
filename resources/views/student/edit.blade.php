<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <a href={{ route('student.index') }}>Home</a>
    <form style="margin-top: 20px;" id="myform">
        <input type="text" name="name" value="{{ $student->name }}" placeholder="name" id="name"><br><br>
        <input type="text" name="email" value="{{ $student->email }}" placeholder="email" id="email"><br><br>
        <input type="number" name="roll" value="{{ $student->roll }}" placeholder="roll" id="roll"><br><br>
        <button id="edit" type="submit">Edit</button>
    </form>
    <span id="output"></span>
</body>

<script>
    $(document).ready(() => {
        $('#myform').submit((event) => {
            event.preventDefault();

            // Get values by ID
            let name = $('#name').val();
            let email = $('#email').val();
            let roll = $('#roll').val();

            $('#edit').prop('disabled', true); // This line seems fine
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: `{{ route('student.update', $student->id) }}`,
                data: {
                    name: name,
                    email: email,
                    roll: roll,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                // processData: false,
                // contentType: false,
                success: (response) => {
                    if(response.success) {
                        $('#output').text(response.message);
                    } else {
                        $('#output').text('Error: '+response.message);
                    }
                    $('#edit').prop('disabled', false);
                },
                error: (e) => {
                    $('#output').text('Error: ' + e.responseJSON.message);
                    $('#edit').prop('disabled', false);
                }
            });
        });
    });
</script>
