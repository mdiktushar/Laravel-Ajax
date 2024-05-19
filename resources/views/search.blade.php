<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studet</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <input type="text" id="search" placeholder="search">
    <div id="list">
    </div>
</body>

<script>
    $(document).ready(() => {
        $('#search').on('keyup', () => {
            let search = $('#search').val();
            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: {
                    'name': search,
                },
                success: (data) => {
                    $('#list').html(data);
                },
                error: (error) => {
                    console.log(error);
                }
            })
        })

        // $(document).on('click', 'li', function() {
        //     let value = $(this).text();
        //     $('#search').val(value);
        //     $('#list').html('');
        // })

        $(document).on('click', 'li', (event) => {
            let value = $(event.currentTarget).text();
            $('#search').val(value);
            $('#list').html('');
        });
    });
</script>

</html>
