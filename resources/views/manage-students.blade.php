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
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Manage Students</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn"><i class="mdi mdi-16px mdi-plus-circle-outline"></i>Register
                                New Student</button>

                            


                        </div>
                    </div>
                    


                    <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW STUDENT</h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('manage-students.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                         

                            <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                   <label>FIRST NAME *</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>MIDDLE NAME</label>
                                        <input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>LAST NAME *</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            
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

                           <!--  <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>STUDENTS IMAGE  *</label>
                                    <input type="file" name="students_image[]" class="form-control" >
                                </div>
                            </div> -->
                            

                            <div class="row">
                                <div class="form-group col-xl-12 text-center mt-4">
                                    <input type="submit" class="footer-btn btn-active" value="Save">
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
                                    <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="myTable" class="table table-responsive table-striped table-bordered" style="min-width:100%">
                                        <thead>
                                            <tr>

                                                <th>STUDENT NO.</th>
                                                <th>DATE</th>
                                                <th>STDENT NAME</th>
                                                <th>EMAIL ADDRESS</th>
                                                <th>MOBILE NUMBER</th>
                                                <th>CREATED BY</th>
                                                <th>ASSIGNED TO</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                   @php $i=1 @endphp

                                                   

                                        @foreach ($students as $student)
                                        
                                            <tr>
                                                <td>{{$student->student_id}}</td>
                                                <td>{{$student->created_at}}</td>

                                                 <td>
                                                    <a class="myBtn" student_id="{{$student->student_id }}">
                                                        @if (!empty($student->image_url))
                                                            <img class="rounded-circle header-profile-user mr-5" src="{{ asset($student->image_url) }}" alt="" style="margin-right: 10px;">
                                                        @else
                                                            <img class="rounded-circle header-profile-user mr-5" src="assets/images/users/user-4.jpg" alt="" style="margin-right: 10px;">
                                                        @endif
                                                        <span style="color: rgb(96, 96, 96);">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</span>
                                                    </a>
                                                </td>
                                                
                                                <td>{{$student->email }}</td>
                                                <td>{{$student->phone}}</td>
                                                <td>{{ isset($student->usersname->name) ? $student->usersname->name : "" }}</td>


                                                     
                                               <td>
    
                                                        @if (empty($student->assigned_to))
                                                            Not Assigned
                                                            @if($users_role == "superadmin")
                                                            <a class="myBtn1" st_id="{{ $student->id }}">
                                                                <button class="ml-3" style="border: none; border-radius: 5px;background-color: #1F92D1; color: #fff;">Assign To</button>
                                                            </a>
                                                            @endif
                                                        @else
                                                            @if($users_role == "superadmin")
                                                            <a class="myBtn1" st_id="{{ $student->id }}">
                                                            @endif
                                                            @if ($student->assignedto)
                                                                @php
                                                                    $assignedToname = $student->assignedto->user->name;
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $assignedToname = '<a class="myBtn1" st_id="'.$student->id.'">
                                                                                        <button class="ml-3" style="border: none; border-radius: 5px;background-color: #1F92D1; color: #fff;">Assign To</button>
                                                                                    </a>'; // or any other value or logic you want to use
                                                                @endphp
                                                            @endif

                                                            {!! $assignedToname !!}

                                                            @if($users_role == "superadmin")
                                                            </a>
                                                            @endif
                                                        @endif
                                                    </td>

<td>
    {{$student->current_status}}
</td>


                                                <td class="text-center"><a href="{{ route('manage-students.edit', ['manage_student' => $student->id]) }}"><button
                                                            style="border: Solid 1px;border-radius: 5px;"><i
                                                                class="mdi mdi-pencil"></i>
                                                        </button></a></td>
                                            </tr>
                                             @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                                       <div id="leadsModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">UPLOAD LEADS</h5>
            <span class="close">&times;</span>
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


                                    <div id="myModal1" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color: #000; font-weight: bolder;">ASSIGN TO</h5>
                                                <span class="close">&times;</span>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-4">
                                                    <div class="form-group col-xl-12">
                                                         <form action="{{ route('assigntoemployee') }}" method="post" enctype="multipart/form-data">

                                                   @csrf
                                                        <label>SELECT DEPARTMENT</label>
                                                        <select class="form-control" name="department" id="department_list" required>
                                                            <option>Select the department</option>
                                                             @foreach ($departments as $department)
                                                              <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                             @endforeach
                                                            
                                                        </select>

                                                    </div>
                                                </div>
                                                <input type="hidden" name="student_id" required>
                                                <div class="row" id="employe_input">
                                                    <div class="form-group col-xl-12">
                                                        <label>SELECT EMPLOYEE</label>
                                                        <select class="form-control" name="employee" id="employee_list" required>
                                                            <option>select</option>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xl-12 text-center mt-4">
                                                        <input type="submit" class="footer-btn btn-active"
                                                            value="Assign">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                              

                              <script type="text/javascript">
    $("#myModal1 #employe_input").hide();

    // Get a reference to the select element
    var departmentList = $("#myModal1 #department_list");
    var employeeInput = $("#myModal1 #employe_input");

    var employeelist = $("#myModal1 #employee_list");

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





                                <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            var modal1 = document.getElementById("myModal1");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = $(".close");

            

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
            // Get the modal
            var modal1 = document.getElementById("myModal1");



            // Get the button that opens the modal
            var btn = document.getElementById("myBtn1");

            // Get the <span> element that closes the modal
            var span1 = document.getElementsByClassName("close")[0];

            var span2 = $("#myModal1 .close")

            // When the user clicks the button, open the modal 
            // btn.onclick = function () {
            //     modal.style.display = "block";
            // }
            $("#myTable .myBtn1").on("click", function (e) {
                e.preventDefault();
                
               
                $("input[name='student_id']").val($(this).attr("st_id"));
                modal1.style.display = "block";
            })

            $("#ledads_btn").on("click",function(e){
                e.preventDefault();
                
               

                 $("#leadsModal").css("display", "block");


            })

            // When the user clicks on <span> (x), close the modal
            span1.onclick = function () {
                modal.style.display = "none";
            }

             span2.onclick = function () {
                modal1.style.display = "none";
            }

             

             $(".card-body .close").on("click",function(e){
                 modal1.style.display = "none";
             })

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


        </script>


           


         <div id="student_profile_modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">EMPLOYEE PROFILE</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="row mt-3">
                <div class="col-xl-1"></div>
                <div class="col-xl-4">
                    <img class="rounded-circle" id="student_profile_modal_url" src="assets/images/users/user-4.jpg" alt="Header Avatar"
                        style="width:150px">
                </div>
                <div class="col-xl-7 mt-5">
                    <label class="name"></label>
                    <p>GW01234</p>
                   
                      <div class="footer-btn" style="position:relative;">
                                                    <span style="text-align: center;
                                                            position: absolute;
                                                            left: 12px;
                                                            top: 6px;">Upload Picture</span>
                                                <input type="file" name="profile[]"  id="profile-image-upload"  value="" style="opacity: 0; position: absolute;left: 0px;">
                                                </div>
                    
                </div>
            </div>
            <div class="mt-2" style="border:1px solid rgb(224, 222, 222);width: 100%;"></div>
            <div class="row mt-3">
                <div class="col-xl-1"></div>
                <div class="col-xl-11">
                    <div>
                        <label class="profile-details">Gender</label>: <span></span>
                    </div>
                    <div>
                        <label class="profile-details">Date Of Birth</label>: <span>1-2-2022</span>
                    </div>
                    <div>
                        <label class="profile-details">Marital Status</label>: <span>Unmarried</span>
                    </div>
                    <div>
                        <label class="profile-details">Email ID</label>: <span>Loreum ipsum</span>
                    </div>
                    <div>
                        <label class="profile-details">Phone Number</label>: <span>Loreum ipsum</span>
                    </div>
                    <div>
                        <label class="profile-details">Permanent Address</label>: <span>Loreum ipsum</span>
                    </div>
                    <div class="mb-5">
                        <label class="profile-details">Mailing Address</label>: <span>Loreum ipsum</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




   <script>
   // Get the modal
var student_profile_modal = $("#student_profile_modal");

// Get the <span> element that closes the modal
var span = $(".close");

// When the user clicks the button, open the modal 
$(".myBtn").on("click", function (e) {
    e.preventDefault();

    var id = $(this).attr("student_id");
    var url = '{{ route("students_profile") }}';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: '{{ csrf_token() }}',
            id: id
        },
        success: function (response) {
            
            var employee = response.response;


            if (employee) {
                // Update the modal content with the retrieved data


              if( employee.image_url){
                 student_profile_modal.find(".modal-body .col-xl-4 img").attr("src", "{{asset('') }}" + employee.image_url);
              }

             

              
                student_profile_modal.find(".name").text(employee.name);
                student_profile_modal.find(".modal-body p").text(employee.user_id);
                student_profile_modal.find(".modal-body a").attr("href", "{{ route('employees.edit', ':id') }}".replace(':id', employee.user_id));
                student_profile_modal.find(".modal-body span:eq(1)").text(employee.gender);
                student_profile_modal.find(".modal-body span:eq(2)").text(employee.date_of_birth);
                student_profile_modal.find(".modal-body span:eq(3)").text(employee.marital_status);
                student_profile_modal.find(".modal-body span:eq(4)").text(employee.email);
                student_profile_modal.find(".modal-body span:eq(5)").text(employee.phone_number);

                student_profile_modal.show();

            } else {
                Swal.fire(
                    'Error!',
                    'Failed to load data.',
                    'error'
                );
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});

// When the user clicks on <span> (x), close the modal
span.on("click", function () {
    student_profile_modal.css("display", "none");
});

// When the user clicks anywhere outside of the modal, close it
$(window).on("click", function (event) {
    if (event.target == student_profile_modal[0]) {
        student_profile_modal.css("display", "none");
    }
});

   
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
                            { responsivePriority: 7 },
                            { responsivePriority: 8 },
                            { responsivePriority: 9 }

                        ]
                    });
                });

            </script>
                            

                
             <style>
           .text-right{text-align: right;}
       </style>
           
 

                @include('layout.footer')

