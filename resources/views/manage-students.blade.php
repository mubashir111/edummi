@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Manage Students</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn"><i class="mdi mdi-16px mdi-plus-circle-outline"></i>Register
                                New Student</button>

                             <button class="btn1" id="ledads_btn">
                                <input id="file-input" type="file" style="display: none;">
                                <i class="mdi mdi-16px mdi-plus-circle-outline"></i>Upload leads
                            </button>


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

                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>STUDENTS IMAGE  *</label>
                                    <input type="file" name="students_image[]" class="form-control" >
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

                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
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
                                                <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                                <td>{{$student->email }}</td>
                                                <td>{{$student->phone}}</td>
                                                <td>{{$student->usersname->name }}</td>

                                                     
                                               <td>
                                                    @if (empty($student->assigned_to))
                                                        Not Assigned
                                                        @if($users_role == "superadmin")
                                                        <a class="myBtn1" st_id="{{$student->id}}">
                                                            <button class="ml-3" style="border: none; border-radius: 5px;background-color: #1F92D1; color: #fff;">Assign To</button>
                                                        </a>
                                                        @endif
                                                    @else
                                                        @if($users_role == "superadmin")
                                                        <a class="myBtn1" st_id="{{$student->id}}">
                                                        @endif
                                                        @if ($student->assignedto)
                                                            @php
                                                                $assignedToname = $student->assignedto->name;
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

                                                <td>{{$student->status }}</td>
                                                <td class="text-center"><a href="{{ route('manage-students.edit', ['manage_student' => $student->id]) }}"><button
                                                            style="border: Solid 1px;border-radius: 5px;"><i
                                                                class="mdi mdi-pencil"></i>
                                                        </button></a></td>
                                            </tr>
                                             @endforeach
                                            
                                        </tbody>
                                    </table>

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




                                   <div id="leadsModal" class="modal">

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

                                                    <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                   <label>FIRST NAME *</label>
                                        <input type="file" name="leads_docs" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>
                                                       

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
                    employeelist.append("<option value='" + employee.id + "'>" + employee.name + "</option>");
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
            $(".myBtn1").on("click", function (e) {
                e.preventDefault();
                
               
                $("input[name='student_id']").val($(this).attr("st_id"));
                modal1.style.display = "block";
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

