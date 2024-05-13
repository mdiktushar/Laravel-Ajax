<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studet</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Student</h1>
    <a href={{ route('student.create') }}>create</a>
    <table style="margin-top: 20px;" border="1" id="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roll</th>
            <th>Action</th>

        </tr>
    </table>

</body>

</html>


<script>
    $(document).ready(() => {
        $.ajax({
            type: "GET",
            url: `{{ route('all-students') }}`,
            success: (data) => {
                console.log(data);
                if (data.students.length > 0) {
                    data = data.students;
                    for (let i = 0; i < data.length; i++) {
                        $('#table').append(`
                        <tr>
                            <td>${data[i].id}</td>    
                            <td><a href="/student/${data[i].id}/edit">${data[i].name}</a></td> 
                            <td>${data[i].email}</td>    
                            <td>${data[i].roll}</td>
                            <td><button>Delete</button></td>
                        </tr>
                    `);
                    }
                } else {
                    $('#table').append('<tr><td>Data Not Found</td></tr>')
                }

            },
            error: (e) => {
                console.log(e.responseText);
            }
        })
    })
</script>
