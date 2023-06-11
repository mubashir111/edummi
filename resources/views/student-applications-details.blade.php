@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
         
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <h5><a href="assigned-students.html" style="color: black;">
                            <span class="mdi mdi-chevron-left"></span></a>Manage Application</h5>

                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn">Add New Application</button>
                        </div>
                    </div>



                    <script>
    $(document).ready(function() {
        $('#application-btn').click(function() {
            // Get the values of the input fields
            var year = $('input[name="request_aplication_year"]').val();
            var intake = $('input[name="request_aplication_intake"]').val();
            var universityName = $('input[name="request_university_name"]').val();
            var courseName = $('input[name="request_course_name"]').val();

            // Check if any field is empty
            if (year === '' || intake === '' || universityName === '' || courseName === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill in all the fields!',
                });
                return; // Exit the function if any field is empty
            }

            // Create an object with the data to be sent
            var data = {
                year: year,
                intake: intake,
                universityName: universityName,
                courseName: courseName,
                _token: '{{ csrf_token() }}',
                student_id: '{{ $students->id }}'
            };

            // Perform AJAX call
            $.ajax({
                url: '{{ route("manage-students.newapplication") }}', // Replace with your actual URL
                method: 'POST', // Replace with your desired HTTP method
                data: data,
                success: function(response) {
                    // Handle successful response
                    console.log(response);

                    Swal.fire(
                        'Success!',
                        'Application added successfully.',
                        'success'
                    );
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log(error);
                    alert('AJAX call failed!');
                }
            });
        });
    });
</script>

<script type="text/javascript">
                         

                      function statusChange(id) {
   $("input[name=status_application_id]").val(id);
    $('#statusmodal').css('display', 'block');
}

  function closeModal() {

    console.log("hello");
    $('#statusmodal').css('display', 'none');

    $('#myModal1').css('display', 'none');
}


</script>

<script type="text/javascript">


                        

                        function statussave(value){
                           
                          
                        var application_id =  $("input[name=status_application_id]").val();

                        if (application_id === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill in all the fields!',
                });
                return; // Exit the function if any field is empty
            }
                    


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
                                url: '{{ route('application-staus-change') }}',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    status: value,
                                    application_id : application_id,
                                },
                                success: function(response) {
                                     Swal.fire(
                                'Updated!',
                                'Status has been updated.',
                                'success'
                            );

                                      $('#statusmodal').css('display', 'none');
                                      location.reload();
                                    
                                },
                                error: function(xhr, status, error) {
// Handle error if needed        
                                    console.log(error);
                                    Swal.fire(
                                'Error!',
                                'Failed to update status.',
                                'error'
                            );
                                }
                            });

            } else {
                $(this).prop('checked', !$(this).is(':checked'));
            }
        });







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
                                    <input type="hidden" name="status_application_id" value="">
                                    <div class="form-group col-xl-12">
                                        <label>STATUS *</label>
                                       <select class="form-control select2" style="width:100%;" onchange="statussave(this.value)">
                                            <option>Select</option>
                                            @foreach($application_status as $status)
                                            <option value="{{ $status->id }}">{{ $status->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="button" class="footer-btn btn-active" value="Save">
                                    </div>
                                </div>
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
                                                <th>ACK NO.</th>
                                                <th>DATE</th>
                                                <th>UNIVERSITY NAME</th>
                                                <th>PROGRAM NAME</th>
                                                <th>IN TAKE</th>
                                                <th>APPLICATION STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                       <tbody>
    @php $i=1; @endphp
    @foreach ($students->application as $applications)
        <tr>
            <td>{{  $applications->id }}</td>
            <td>{{ $applications->created_at }}</td>
            <td>{{ $applications->university_name }}</td>
            <td>{{ $applications->course }}</td>
            <td>{{ $applications->intake }}</td>
            <td>

                <a {{ $user_role == 1 ? 'onclick=statusChange('.$applications->id.')' : '' }}>
    {{ $applications->statusview->description }}
</a>

            </td>
            <td class="">
                <a href='{{ route("application.edit", ["id" => $students->id]) }}'>
                    <button style="border: solid 1px; border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>
    @endforeach
</tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                     

                    <div id="myModal1" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content1">
                            <div class="modal-header">
                                <h5 style="color: #000; font-weight: bolder;">Edit Student Application Data</h5>
                                <span class="close" onclick="closeModal()">&times;</span>
                            </div>
                            <div class="modal-body">
                                 <div class="row mt-4">
                                    
                                  
                                    <div class="form-group col-xl-6">
                                        <label>UNIVERSITY NAME</label>
                                        <input type="text" name="request_university_name" value="" class="form-control" placeholder="" required="">
                                    </div>

                                    <div class="form-group col-xl-6">
                                        <label>INTAKE</label>
                                <input type="text" name="request_aplication_intake" value="" class="form-control" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="row">
                                    

                                    <div class="form-group col-xl-6">
                                        <label>YEAR</label>
                                        <input type="year" name="request_application_year" value="" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group col-xl-6">
                                       <label>COURSE NAME</label>
                                        <input type="text" name="request_course_name" value="" class="form-control" placeholder="" required="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="button" class="footer-btn" value="Cancel">
                                        <input type="submit" id="application-btn" class="footer-btn btn-active" value="Save">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
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
                            { responsivePriority: 7 }

                        ]
                    });
                });

            </script>
        </div>

       

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

           
            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
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
            var modal = document.getElementById("myModal1");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn1");

            // Get the <span> element that closes the modal
         

            // When the user clicks the button, open the modal 
            // btn.onclick = function () {
            //     modal.style.display = "block";
            // }
            $(".myBtn1").on("click", function (e) {
                e.preventDefault();

                modal.style.display = "block";
            })

          

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

<style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>



           
 

                @include('layout.footer')