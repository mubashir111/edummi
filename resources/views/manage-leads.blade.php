@include('layout.header')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                 <!-- Display success messages here -->
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
                    <div class="col-xl-12 text-right">
                         <button class="btn1" id="ledads_btn">
                                <input id="file-input" type="file" style="display: none;">
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Upload leads
                            </button>

                            <button class="btn1" id="ledads_one_btn">
                                <input id="file-input" type="file" style="display: none;">
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Add New lead
                            </button>
                           
                            @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'Branch_Owner')
                            <button class="btn1" id="assign_btn">
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Assign leads
                            </button>
                            @endif
                    </div>
                </div>

                <script type="text/javascript">
                    

                     $("#ledads_btn").on("click",function(e){

                     
                e.preventDefault();
                
               

                 $("#leadsModal").css("display", "block");


            })

                     $("#assign_btn").on("click",function(e){
                e.preventDefault();
                
               

                 $("#assign_btnModal").css("display", "block");


            })

                      $("#ledads_one_btn").on("click",function(e){


                        e.preventDefault();
                  $("#createModalshow").css("display", "block");

                      })


                </script>

                 <div id="assign_btnModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">UPLOAD LEADS</h5>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('leads.assign') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="form-group col-xl-12">
                         <label>SELECT DEPARTMENT</label>
                                                        <select class="form-control" name="department" id="department_list" required>
                                                            <option>Select the department</option>
                                                             @foreach ($departments as $department)
                                                              <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                             @endforeach
                                                            
                                                        </select>

                                                    </div>

                           <div class="form-group col-xl-12">

                                <div class="row employe_input" id="">
                                                    <div class="form-group col-xl-12">
                                                        <label>SELECT EMPLOYEE</label>
                                                        <select class="form-control" name="employee" id="employee_list" required>
                                                            <option>select</option>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>

                           </div>                          
                        <div class="form-group col-xl-12 employe_input">
                        <label>Leads count *</label>
                        <input type="number" name="limit" class="form-control " placeholder="Select count" required>

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
    $("#assign_btnModal .employe_input").hide();

    // Get a reference to the select element
    var departmentList = $("#assign_btnModal #department_list");
    var employeeInput = $("#assign_btnModal .employe_input");

    var employeelist = $("#assign_btnModal #employee_list");

    // Add an event listener to the select element
    departmentList.on("change", function() {
        // Get the selected value of the select element
        var selectedValue = departmentList.val();

        // Make an AJAX request using jQuery
        $.ajax({
            type: 'POST',
            url: '{{ route("departmentemployee") }}',
            data: {
                _token: '{{ csrf_token() }}',
                selected_value: selectedValue
            },
            dataType: "json",
            success: function(responseData) {
                // Show the employee input
                employeeInput.show();

                // Get the employees from the response data
                var employees = responseData.employees;

                // Clear the options from the department list
                employeelist.empty();

                // Add a default option to the department list
                employeelist.append("<option value=''>Select</option>");

                // Loop through the employees and add each one to the department list
                $.each(employees, function(index, employee) {
                    employeelist.append("<option value='" + employee.user_id + "'>" + employee.name + "</option>");
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Request failed. Returned status of " + jqXHR.status);
            }
        });
    });
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


<div id="createModalshow" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW STUDENT</h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('lead.store') }}" method="post" enctype="multipart/form-data">

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


                <div id="EditModalshow" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW STUDENT</h5>
                            <span class="close">&times;</span>
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

<script type="text/javascript">
    
    function closeModal() {

    console.log("hello");
    $('#leadsModal').css('display', 'none');

    $('#assign_btnModal').css('display', 'none');

   
}
</script>


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

                
                 

                



                <div class="row">

                    <div class="col-xl-12 col-sm-12">
                        <div class="card mini-stat ">
                            <div class="card-body mini-stat-img">
                                <table id="myTable" class="table table-responsive table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                         <th>SL NO.</th>
                                        <th>Stundent Name</th>
                                        
                                        <th>Student Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Current Status</th>
                                        <th>Create at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp

                                        
                                            
                                                
                                        @foreach ($leads as $lead)
    <tr>
        <td>{{$i++}}</td>
        <td>{{ isset($lead->name) ? $lead->name : '' }}</td>
        <td>{{ isset($lead->email) ? $lead->email : '' }}</td>
        <td>{{ isset($lead->phone) ? $lead->phone : '' }}</td>
        <td>{{ isset($lead->address) ? $lead->address : '' }}</td>
        <td>{{ $lead->leasstatus->name}}</td>
        <td>{{ isset($lead->current_status) ? $lead->current_status : '' }}</td>
        <td>{{ isset($lead->created_at) ? $lead->created_at : '' }}</td>
        <td>
            <button onclick="editModalcall({{ $lead->id }})" style="border: solid 1px; border-radius: 5px;" data-id="{{ $lead->id }}">
                <i class="mdi mdi-pencil"></i>
            </button>
            <button style="border: solid 1px; border-radius: 5px;" onclick="deletefn({{$lead->id}})" delete-id="{{ $lead->id }}">
                <span class="mdi mdi-delete"></span>
            </button>
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
