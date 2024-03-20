<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <div class="container mt-5">
        <a href="{{route('export')}}" class="btn btn-primary float-right m-3">Export CSV</a>
    </div>
    <div class="container">
    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '{{route("fetchList")}}',
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    var tbody = $("#tbody");
                    var html;
                    var i = 1;
                    $.each(response, function(index, value) {
                        var editUrl = "{{ route('edit', ['id' => ':id']) }}";
                        var deleteUrl = "{{ route('delete', ['id' => ':id']) }}";
                        editUrl = editUrl.replace(':id', value.id);
                        deleteUrl = deleteUrl.replace(':id', value.id);
                        html += '<tr>'
                        html += '<td>' + i + '</td>';
                        html += '<td>' + value.name + '</td>';
                        html += '<td>' + value.email + '</td>';
                        html += '<td><a href="' + editUrl + '" class="btn btn-primary" >Edit</a> <a href="' + deleteUrl + '" class="btn btn-danger" >Delete</a></td>';
                        html += '</tr>';
                        i++;
                    });

                    tbody.html(html);
                }
            })
        });
    </script>

</x-app-layout>