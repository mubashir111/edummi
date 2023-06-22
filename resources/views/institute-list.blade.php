@include('layout.header')



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <script type="text/javascript">
    
    function closeModal() {

    console.log("hello");
    $('#leadsModal').css('display', 'none');

    $('#assign_btnModal').css('display', 'none');

   $('#createModalshow').css('display', 'none');

   $('#EditModalshow').css('display', 'none');


   
}
</script>

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
                        <h5>Manage Institution</h5>
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


    







                       <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <a href="{{route('institute_csv')}}">
                            <button class="btn1" >
                               
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Export CSV
                            </button>
                            </a>


                            <button class="btn1" id="ledads_btn">
                                <input id="file-input" type="file" style="display: none;">
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Upload Institutions
                            </button>
                            </div>
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
            <h5 style="color: #000; font-weight: bolder;">UPLOAD CSV</h5>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('institution_excel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="form-group col-xl-12">
                        <label>Upload file *</label>
                        <input type="file" name="institution_file" class="form-control" placeholder="Upload file" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-12 text-center mt-4 mb-4">
                        <input type="submit" class="footer-btn btn-active" value="Submit">
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
                                <table id="myTable" class="table table-responsive table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                         <th>SL NO.</th>
                                        <th>Institution</th>
                                        
                                        <th>Universiti</th>
                                        <th>Country</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp

                                        
                                            
                                                
                                        @foreach ($institute_list as $institute)
    <tr>
        <td>{{$i++}}</td>
        <td>{{ isset($institute->institute_name) ? $institute->institute_name : '' }}</td>
        <td>{{ isset($institute->university_name) ? $institute->university_name : '' }}</td>
        <td>{{ isset($institute->country) ? $institute->country : '' }}</td>

        <td>
       
            <button onclick="editModalcall({{ $institute->id }})" style="border: solid 1px; border-radius: 5px;" data-id="{{ $institute->id }}">
                <i class="mdi mdi-pencil"></i>
            </button>
            <button style="border: solid 1px; border-radius: 5px;" onclick="deletefn({{$institute->id}})" delete-id="{{ $institute->id }}">
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

document.addEventListener('DOMContentLoaded', function() {

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

})
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
