<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <a href={{route('student.index')}}>Index</a>
    <form id="myform">
        @csrf
        <input type="text" name="name" placeholder="name" id="name"><br><br>
        <input type="text" name="email" placeholder="email" id="email"><br><br>
        <input type="number" name="roll" placeholder="roll" id="roll"><br><br>
        <button id="save" type="submit">Save</button>
    </form>
    <span id="output"></span>
</body>

<script>
    $(document).ready(() => {
        $('#myform').submit((event) => {
            event.preventDefault();

            let form = $('#myform')[0];
            let data = new FormData(form);

            $('#save').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('student.store') }}",
                data: data,
                processData: false,
                contentType: false,
                success: (data) => {
                    // alert(data.res);
                    $(`#output`).text(data.message)
                    $('#save').prop('disabled', false);

                    // removing valies form input feald
                    $('#name').val('');
                    $('#email').val('');
                    $('#roll').val('');
                },
                error: (e) => {
                    // console.log(e.tesponseText);
                    $(`#output`).text(e.responseText)
                    $('#save').prop('disabled', false);
                    // removing valies form input feald
                    $('#name').val('');
                    $('#email').val('');
                    $('#roll').val('');
                }
            })
        })
    })
</script>

</html>
