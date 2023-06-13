@include('layout.header')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <script type="text/javascript">
    
    function closeModal1() {

    console.log("hello");
    $('#EditModalshow').css('display', 'none');

    


   
}
</script>

        <div class="page-content">
            <div class="container-fluid">
                 @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('error') }}
                            </div>
                            @endif
                <div class="row">
                    <div class="col-xl-12">
                        <h5>Manage Leads</h5>
                    </div>
                </div>
                <div class="row text-right">
                    
                </div>

                <script type="text/javascript">
                     $("#ledads_btn").on("click",function(e){
                e.preventDefault();
                
               

                 $("#leadsModal").css("display", "block");


            })


                </script>

    <div id="leadsModal" class="modal">
        
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">UPLOAD LEADS</h5>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('leads.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="form-group col-xl-12">
                        <label>Upload file *</label>
                        <input type="file" name="leads_docs" class="form-control" placeholder="Upload file" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-12 text-center mt-4">
                        <input type="submit" class="footer-btn btn-active" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function closeModal() {

    console.log("hello");
    $('#leadsModal').css('display', 'none');
    
    $('#EditModalshow').css('display', 'none');
   
}
</script>

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
    var url = '{{ route("lead.destroy", ":id") }}';
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

            <script type="text/javascript">
                         

                      function statusChange(id) {
   $("input[name=status_lead_id]").val(id);
    $('#statusmodal').css('display', 'block');
}

  function closeModal() {
    $('#statusmodal').css('display', 'none');
}
</script>


<div id="statusmodal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color: #000; font-weight: bolder;">CHANGE APPLICATION STATUS</h5>
                                <span class="close" onclick="closeModal()">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-4">
                                      <form action="{{ route('lead.statuschange', ['staff' =>1]) }}" method="post" enctype="multipart/form-data" id="edit-form">
                        
                        @csrf
                                    <input type="hidden" name="status_lead_id" value="">
                                    <div class="form-group col-xl-12">
                                        <label>STATUS *</label>
                                       <select class="form-control select2" name="status_name" style="width:100%;" >
                                            <option>Select</option>
                                            @foreach($leadstatus as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="form-group col-xl-12">
                                        <label>DESCRIPTION *</label>
                                        <textarea class="form-control" name="description" ></textarea>
                                     </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="submit" class="footer-btn btn-active" value="Save">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>




  <div id="EditModalshow" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">EDIT LEAD</h5>
                            <span class="close" onclick="closeModal1()">&times;</span>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('lead.storedata') }}" method="post" enctype="multipart/form-data">

                        @csrf
                         

                            <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                   <label>FULL NAME *</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>

                            <input type="hidden"  name="edit_id" value="">

                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>MOBILE NUMBER *</label>
                                    <input type="text" name="number" class="form-control" placeholder="Enter Mobile Number " required>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>EMAIL ADDRESS *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>ADDRESS *</label>
                                    
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>

                            
                            

                            <div class="row">
                                <div class="form-group col-xl-12 text-center mt-4">
                                    <input type="submit" class="footer-btn btn-active" value="Save">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>


                <script type="text/javascript">
    window.editModalcall = function(id) {
        var edit_id = id;
        var url = '{{ route("lead.editview") }}';
        
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                edit_id: edit_id
            },
            success: function(response) {
                console.log(response);

                var lead = response.lead;
                 
                 $("#EditModalshow input[name=first_name]").val(lead.name);
                 $("#EditModalshow input[name=number]").val(lead.phone);
                 $("#EditModalshow input[name=email]").val(lead.email);
                 $("#EditModalshow input[name=edit_id]").val(lead.id);
                  $("#EditModalshow [name=address]").val(lead.address);

                 $("#EditModalshow").css("display","block");

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
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
                                         <th>SL NO.</th>
                                        <th>Stundent Name</th>
                                        
                                        <th>Student Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Current Status</th>
                                        <th>Create at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp

                                        
                                            
                                                
                                        @foreach ($leads as $lead)
    <tr>
        <td>{{$lead->id}}</td>
        <td>{{ isset($lead->name) ? $lead->name : '' }}</td>
        <td>{{ isset($lead->email) ? $lead->email : '' }}</td>
        <td>{{ isset($lead->phone) ? $lead->phone : '' }}</td>
        <td>{{ isset($lead->address) ? $lead->address : '' }}</td>
        <td> <button class="ml-3" onclick="statusChange({{$lead->id}})" style="border: none; border-radius: 5px;background-color: #1F92D1; color: #fff;">{{ $lead->leasstatus->name}}</button></td>
        <td>{{ isset($lead->discription) ? $lead->discription : ''}}</td>
        <td>{{ isset($lead->current_status) ? $lead->current_status : '' }}</td>
        <td>{{ isset($lead->created_at) ? $lead->created_at : '' }}</td>
        <td>
            <button onclick="editModalcall({{ $lead->id }})" style="border: solid 1px; border-radius: 5px;" >
                <i class="mdi mdi-pencil"></i>
            </button>
             @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'Branch_Owner' )
            <button style="border: solid 1px; border-radius: 5px;" onclick="deletefn({{$lead->id}})" delete-id="{{ $lead->id }}">
                <span class="mdi mdi-delete"></span>
            </button>
            @endif
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
