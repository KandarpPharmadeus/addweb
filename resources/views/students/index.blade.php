<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach (['danger', 'warning', 'success', 'info', 'message'] as $msg)
                        @if(Session::has($msg))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">{{ Session::get($msg) }}</p>
                        </div>
                    
                    @endif
                    @endforeach
                    
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Grade</th>
                                <th>Photo</th>
                                <th>date Of Birth</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
   
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('students') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
            {data: 'studentName', name: 'studentName', orderable: true},
            {data: 'grade', name: 'grade', orderable: true},
            {data: 'photo', name: 'photo', orderable: false},
            {data: 'dateOfBirth', name: 'dateOfBirth', orderable: true},
            {data: 'address', name: 'address', orderable: false},
            {data: 'city', name: 'city', orderable: false},
            {data: 'country', name: 'country', orderable: false},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    $('.yajra-datatable').on('click', '.delete', function (e) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data("url");
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('.yajra-datatable').DataTable().draw(false);
        });
    });
});

</script>
</x-app-layout>
