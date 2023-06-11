@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <style>
            th{
                text-align: left !important;
            }
        </style>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Departments</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn">Add New Department</button>
                        </div>
                    </div>
                  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">ADD NEW DEPARTMENT</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('departments.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="form-group col-xl-12">
                        <label>DEPARTMENT NAME</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Department Name" required>
                    </div>
                </div>

                @if($department_role)
                    <div class="row mt-4">
                        <div class="form-group col-xl-12">
                            <label>DEPARTMENT ROLE</label>
                            <select class="form-control" name="department_role" id="permenent_country" required>
                                <option value="">Select</option>
                                @foreach($department_role as $role)
                                    <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group col-xl-12 text-center mt-4">
                        <input type="submit" class="footer-btn btn-active" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" class="editModal modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">EDIT DEPARTMENT</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('departmentsname') }}" method="post">
                @csrf
                <div class="row mt-4">
                    <div class="form-group col-xl-12">
                        <label>DEPARTMENT NAME</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Department Name" required>
                    </div>
                </div>

                @if($department_role)
                    <div class="row mt-4">
                        <div class="form-group col-xl-12">
                            <label>DEPARTMENT ROLE</label>
                            <select class="form-control" name="department_role" id="permenent_country" required>
                               
                                @if($department_role)
                                    @foreach($department_role as $role)
                                        <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                @endif

                <input type="hidden" name="department_id" required>

                <div class="row">
                    <div class="form-group col-xl-12 text-center mt-4">
                        <input type="submit" class="footer-btn btn-active" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered text-left" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>DEPARTMENT</th>
                                                <th>ROLE</th>
                                                <th>MEMBERS</th>
                                                <th>STATUS</th>
                                                <th>EMPLOYEES</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                             @php $i=1 @endphp
                                               @php $u=1; @endphp

                                        @foreach ($departments as $department)

                                       
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ $department->department_name }}</td>
                                                <td>{{$department->department_role}}</td>
                                                <td>{{ $department->users->count() }}</td>
                                                
                                                 @php  $u++; @endphp
                                                 <td class=""><input class='input-switch' type="checkbox"
                                                        id="demo{{$u}}"  data-id="{{ $department->id }}" 
                                                       data-status="{{ $department->status }}" 
                                                       {{ $department->status == 1 ? 'checked' : '' }}/>
                                                    <label class="label-switch" for="demo{{$u}}"></label>
                                                    <span class="info-text"></span>
                                                </td>
                                                <td class=""><a href="{{ route('departments.show', ['department' => $department->id]) }}"
                                                        style="color: #1F92D1;">{{ $department->users->count() == 0 ? 'Add +' : 'View' }}</a>
                                                </td>


                                                <td class=""><button
                                                        style="border: solid 1px;border-radius: 5px;" edit-id="{{$department->id}}" department-name="{{$department->department_name}}" department_role="{{$department->department_role}}"><i
                                                            class="mdi mdi-pencil"></i></button>
                                                    <button style="border: solid 1px;border-radius: 5px;" delete-id="{{$department->id}}"><span
                                                            class="mdi mdi-delete"></span></button>
                                                </td>
                                            </tr>

                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


              <script>
    $(document).ready(function () {
    $('.input-switch').on('change', function () {
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 1 : 2;
        var url = '{{ route("departmentstatus") }}';

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to change the status.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        id: id
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.status === 'success') {
                            Swal.fire(
                                'Updated!',
                                'Status has been updated.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to update status.',
                                'error'
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });

            } else {
                $(this).prop('checked', !$(this).is(':checked'));
            }
        });
    });
});

</script> 

                <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            var editmodal = document.getElementById("editModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <script>
                $(document).ready(function () {
                    let table = new DataTable('#myTable', {
                        responsive: true,
                        columns: [
                            { responsivePriority: 1 },
                            { responsivePriority: 2 },
                            { responsivePriority: 3 },
                            { responsivePriority: 4 },
                            { responsivePriority: 5 },
                            { responsivePriority: 6 },
                            {responsivePriority: 7}

                        ]
                    });
                });

            </script>
            <script>
                
                $(".mdi-pencil").on("click",function(e){
                    e.preventDefault();

                     
                  
                    $("#editModal input[name='name']").val($(this).parent().attr("department-name"));

                    $("#editModal input[name='department_id']").val($(this).parent().attr("edit-id"));

                    var newOptionValue = $(this).parent().attr("department_role");
$("#editModal select[name='department_role'] option").each(function () {
    if ($(this).val() === newOptionValue) {
        $(this).prop("selected", true);
    }
});


                    editmodal.style.display = "block";

                })

                $("#editModal .close").on("click",function(e){
                    e.preventDefault();
                      editmodal.style.display = "none";
                })
            </script>

           <script type="text/javascript">
               $(".mdi-delete").on("click", function (e) {
    e.preventDefault();
    var id = $(this).parent().attr('delete-id');
    var url = '{{ route("departments.destroy", ":id") }}';
    url = url.replace(':id', id);

    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this department.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE', // Use DELETE method for deleting a resource
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        Swal.fire(
                            'Deleted!',
                            'Department has been deleted.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error!',
                            'Failed to delete department.',
                            'error'
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $(this).prop('checked', !$(this).is(':checked'));
        }
    });
});

           </script>

            

                <style>
           .text-right{text-align: right;}
       </style>
    @include('layout.footer')