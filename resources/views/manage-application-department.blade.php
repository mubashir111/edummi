@include('layout.header')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
     

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Manage Applications</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn"><i class="mdi mdi-16px mdi-plus-circle-outline"></i>Export
                                Application Data</button>
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
                                <div class="row mt-4">
                                    <div class="form-group col-xl-12">
                                        <label>FIRST NAME *</label>
                                        <input type="text" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>MIDDLE NAME</label>
                                        <input type="text" class="form-control" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>LAST NAME *</label>
                                        <input type="text" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>MOBILE NUMBER *</label>
                                        <input type="text" class="form-control" placeholder="Enter Mobile Number ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>EMAIL ADDRESS *</label>
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
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


                     <script type="text/javascript">
                         

                      function statusChange(id) {
   $("input[name=status_application_id]").val(id);
    $('#statusmodal').css('display', 'block');
}

  function closeModal() {
    $('#statusmodal').css('display', 'none');
}


function deleteapplication(id){

    
    var id = id;
    var url = '{{ route("manage-applications.destroy", ":id") }}';
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
                            'Application has been deleted.',
                            'success'
                        );
                        location.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            'Failed to delete Application.',
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
    function status_change_function(id) {
        
        

        var id = id;
        var url = '{{ route("ApplicationstatusMarkread") }}';

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
                            location.reload();
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

    }
</script>



                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">

                                    <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <!-- <table id="tech-companies-1" class="table  table-striped"> -->
                                    <table id="myTable" class="table  table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ACK NO.</th>
                                                <th>DATE</th>
                                                <th>STUDENT NAME</th>
                                                <th>UNIVERSITY NAME</th>
                                                <th>PROGRAM NAME</th>
                                                <th>IN TAKE</th>
                                                <th>CREATED BY</th>
                                                <th>APPLICATION STATUS</th>
                                                <th>KC ASSIGNEE</th>
                                                 
                                                 @if(auth()->user()->role === 'superadmin')

                                                <th>Action</th>
                                                @endif
                                                

                                            </tr>
                                        </thead>
                                        <tbody>

                                               @php $i=1; @endphp
                                    @php $u=1; @endphp

                                    
                                    @foreach ($students as $student)

                                    @foreach ($student->application as $applications)
                                            <tr>
                                                <td>
  @if($application_status_unread->where('type', 'App\Notifications\Application_status')->where('notifiable_id', $applications->id)->count() !== 0)
    <span onclick="status_change_function({{ $applications->id }})" class="badge rounded-pill bg-success float-end">
      {{ $application_status_unread->where('type', 'App\Notifications\Application_status')->where('notifiable_id', $applications->id)->count() }}
    </span>
  @endif
  {{ $student->student_id }}
</td>
                                                    <td>
                                                       
                                                        {{$applications->created_at}}
                                                    </td>

                                                @if(isset($student->name))
                                                <td>{{$student->name}}</td>
                                                @else

                                                <td></td>

                                                @endif
                                                
                                                <td>{{ $applications->university_name}}</td>
                                                <td>{{ $applications->course}}</td>
                                                <td>{{ $applications->intake}}</td>
                                               
                                                <td>{{ $student->usersname->name }}</td>
                                             <td>
                                                    @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'department_employee')
                                                        <a onclick="statusChange({{ $applications->id }})">
                                                            {{ $applications->statusview->description }}
                                                        </a>
                                                    @else
                                                        <a>
                                                            {{ $applications->statusview->description }}
                                                        </a>
                                                    @endif
                                                </td>



                                            
                                                <td></td>

                                            

                                                 
                                                 @if(auth()->user()->role === 'superadmin')
                                                <td class="">
                                                    <button onclick="deleteapplication({{{$applications->id}}})" style="border: solid 1px;border-radius: 5px;" ><span
                                                            class="mdi mdi-delete"></span></button>
                                                </td>
                                                @endif
                                                
                                            </tr>

                                            @endforeach
                                             @endforeach
                                        </tbody>
                                    </table>
                                     </div>
                                 </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                ©
                                <script>document.write(new Date().getFullYear())</script> EDUMMI UNIVERSE <span
                                    class="d-none d-sm-inline-block"> by GREENWORLD International</span>
                            </div>
                        </div>
                    </div>
                </footer> -->
            </div>
            <script>
                $(document).ready(function () {
                    let table = new DataTable('#myTable', {
                        responsive: true,
                    });
                });

            </script>
        </div>

       

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

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




<style>
           .text-right{text-align: right;}
       </style>

                @include('layout.footer')