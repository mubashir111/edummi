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
                                    <input name="email" type="email" class="form-control" placeholder="Enter Email Address">
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>PASSWORD *</label>
                                    <input name="password" type="password" class="form-control" placeholder="Enter Email Address" >
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
                                        <td>
                                            <div class="d-flex"><div  class="btn btn-primary edit-btn" data-id="{{ $staff->id }}">Edit</div>

                                         <div class="btn btn-danger" delete-id="{{ $staff->id}}">Delete</div></div>
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
