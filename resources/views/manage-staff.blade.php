@include('layout.header')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <h5>Manage Staff</h5>
                    </div>
                </div>
                <div class="row text-right">
                    <div class="col-xl-12 text-right">
                        <button class="btn1" id="myBtn">Register New Staff</button>
                    </div>
                </div>
                <div id="myModal" class="modal">

                    <form action="{{ route('staff.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW STAFF</h5>
                            <span id="closeModal1" class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                    <label>EMAIL ADDRESS *</label>
                                    <input name="email_staff" type="email"   autocomplete="off" class="form-control" placeholder="Enter Email Address">
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>PASSWORD *</label>
                                    <input name="password_staff" autocomplete="off" type="password" class="form-control" placeholder="Enter Email Address" >
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>Name *</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="form-group col-xl-12 text-center mt-4">

                                    <button class="footer-btn btn-active">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>
                 

                  <div id="EditModal" class="modal">

                   <form action="{{ route('staff.update', ['staff' =>1]) }}" method="post" enctype="multipart/form-data" id="edit-form">
                        
                        @csrf
                        @method('patch')
                        
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">EDIT STAFF</h5>
                            <span id="closeModal2" class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                    <label>STAFF EMAIL ADDRESS *</label>
                                    <input name="email" type="email" class="form-control" placeholder="Enter Email Address" >
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>PASSWORD *</label>
                                    <input name="password" type="text" class="form-control" autocomplete="off" placeholder="Enter Email Address" >
                                </div>
                            </div>

                            <input type="hidden" name="edit_id" value="">

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>Staff Name *</label>
                                    <input name="name" id="franchise_name" value="" type="text" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                           
                            

                            <div class="row">
                                <div class="form-group col-xl-12 text-center mt-4">

                                    <button class="footer-btn btn-active"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>

                <script type="text/javascript">
               
                function deletefn(id){
    
    var id = id;
    var url = '{{ route("staff.destroy", ":id") }}';
    url = url.replace(':id', id);

    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this staff.',
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
                        location.reload();
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
}


           </script>


                <div class="row">

                    <div class="col-xl-12 col-sm-12">
                        <div class="card mini-stat ">
                            <div class="card-body mini-stat-img">
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        
                                        <th>Staff Email</th>
                                        <th>Role</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staff as $staff)
                                    <tr>
                                        <td>{{ $staff->name }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->role }}</td>
                                        
                                        <td>{{ $staff->created_at }}</td>
                                        

                                     <td class=""><button
                                                        style="border: solid 1px;border-radius: 5px;" data-id="{{ $staff->id }}"><i
                                                            class="mdi mdi-pencil"></i></button>
                                                    <button style="border: solid 1px;border-radius: 5px;" onclick="deletefn({{$staff->id}})" delete-id="{{ $staff->id}}"><span
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
                    let table = new DataTable('#myTable', {
                        responsive: true,
                       
                    });
                });

            </script>

            <script>
                var modal = document.getElementById("myModal");
var editModal = document.getElementById("EditModal");
var btn = document.getElementById("myBtn");
var closeBtn1 = document.getElementById("closeModal1");
var closeBtn2 = document.getElementById("closeModal2");



btn.onclick = function() {
  modal.style.display = "block";
};

closeBtn1.onclick = function() {
  modal.style.display = "none";
};

closeBtn2.onclick = function() {
  editModal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
};

$('.edit-btn').on('click',function(e) {
    e.preventDefault();
    var staffId = $(this).data('id');
           editModal.style.display = "block";
   
    $.ajax({
        url: "{{ route('staff.edit', ['staff' => ':staffId']) }}".replace(':staffId',staffId),
        type: 'get',
        dataType: 'json',
        success: function(data) {
            var staff = data.staff[0];

            // var user = data.franchises[0].user;
            
            // Populate the edit form with the data
             console.log(staff);

            $('#edit-form [name="email"]').val(staff.email);
            $('#edit-form [name="name"]').val(staff.name);
            $('#edit-form [name="edit_id"]').val(staff.id);
            
            
            
            // Show the modal
        },
        error: function(xhr, status, error) {
            // Handle the error
        }
    });
    
});





            </script>

       <style>
           .text-right{text-align: right;}
       </style>
@include('layout.footer')
