@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Total Employees</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn">Add New Employee</button>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered text-left" style="width:100%">
                                        <thead>
                                            <tr style="text-align:left !important;">
                                                <th>SL NO.</th>
                                                <th>EMPLOYEE ID</th>
                                                <th>NAME</th>
                                                <th>DESIGNATION</th>
                                                <th>EMAIL ID</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @php $i=1; @endphp
                                              @php $u=1; @endphp
                                        @foreach ($employee as $employee)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        
                                                
                                                <td>{{ $employee->user_id }}</td>
                                                <!-- <td>{{ $employee->name }}</td> -->
                                                <td>
                                                    <a class="myBtn" employr_id="{{ $employee->user_id }}">
                                                        @if (!empty($employee->profile_url))
                                                            <img class="rounded-circle header-profile-user mr-5" src="{{ $employee->profile_url }}" alt="" style="margin-right: 10px;">
                                                        @else
                                                            <img class="rounded-circle header-profile-user mr-5" src="assets/images/users/user-4.jpg" alt="" style="margin-right: 10px;">
                                                        @endif
                                                        <span style="color: rgb(96, 96, 96);">{{ $employee->name }}</span>
                                                    </a>
                                                </td>

                                                <td>{{ $employee->role }}</td>
                                                <td>{{ $employee->email }}</td>
                                                  @php  $u++; @endphp
                                                <td class="text-center">
                                                    <input class='input-switch status_check demo1' id="demo{{$u}}" type="checkbox"
                                                            data-id="{{ $employee->id }}"
                                                           data-status="{{ $employee->status }}"
                                                           {{ $employee->status == 'active' ? 'checked' : '' }}/>
                                                    <label class="label-switch" for="demo{{$u}}"></label>
                                                    <span class="info-text"></span>
                                                </td>


                                                <script>
    $(document).ready(function () {
    $('.input-switch').on('change', function () {
        var id = $(this).data('id');
        var status = $(this).is(':checked') ? 'active' : 'inactive';
        var url = '{{ route("employestatus") }}';

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




                                                
                                            </tr>

                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="myModal" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="color: #000; font-weight: bolder;">EMPLOYEE PROFILE</h5>
                                                <span class="close">&times;</span>
                                            </div>
                                            <div class="modal-body">


                                                <div class="row mt-3">
                                                    <div class="col-xl-1">
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <img class="rounded-circle" src="assets/images/users/user-4.jpg"
                                                            alt="Header Avatar" style="width:150px">
                                                    </div>
                                                    <div class="col-xl-7 mt-5">
                                                        <label>Lorem Impsum</label>
                                                        <p>GW01234</p>
                                                        <a href="employees.html"><input type="button" style="color: #1F92D1; background-color: #fff;
                                                            border-radius: 5px;border: #1F92D1 solid 1px;"
                                                                value="Edit Employee Profile"></a>
                                                    </div>
                                                </div>
                                                <div class="mt-2"
                                                    style="border:1px solid rgb(224, 222, 222);width: 100%;">
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-xl-1">

                                                    </div>
                                                    <div class="col-xl-11">
                                                        <div>
                                                            <label class="profile-details">Gender</label>: <span>
                                                                male</span>
                                                        </div>

                                                        <div>
                                                            <label class="profile-details">Date Of Birth</label>:
                                                            <span>1-2-2022</span>
                                                        </div>

                                                        <div>
                                                            <label class="profile-details">Marital Status</label>:
                                                            <span>Unmarried</span>
                                                        </div>
                                                        <div>
                                                            <label class="profile-details">Email ID </label>:
                                                            <span>Loreum
                                                                ipsum</span>
                                                        </div>

                                                        <div>
                                                            <label class="profile-details">Phone Number </label>:
                                                            <span>Loreum
                                                                ipsum</span>
                                                        </div>

                                                        <div>
                                                            <label class="profile-details">Permenant Address </label>:
                                                            <span>Loreum
                                                                ipsum</span>
                                                        </div>

                                                        <div class="mb-5">
                                                            <label class="profile-details">Mailing Address </label>:
                                                            <span>Loreum
                                                                ipsum</span>
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
                            { responsivePriority: 6 }

                        ]
                    });
                });

            </script>

                  <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            // btn.onclick = function () {
            //     modal.style.display = "block";
            // }
            $(".myBtn").on("click", function (e) {
                e.preventDefault();

                var id=$(this).attr("employr_id");
                  var url = '{{ route("employees.show", ":id") }}';
                   url = url.replace(':id', id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                   success: function (response) {
                        console.log(response);

                       var employee = response.response[0];
    var mailing_address = employee.address[0];
    var permanent_address = employee.address[1];
                       console.log(employee);

    if (employee) {
        // Update the modal content with the retrieved data
        $("#myModal .modal-content .modal-body .col-xl-4 img").attr("src", employee.profile_url);
        $("#myModal .modal-content .modal-body label").text(employee.name);
        $("#myModal .modal-content .modal-body p").text(employee.user_id);
        $("#myModal .modal-content .modal-body a").attr("href", "{{ route('employees.edit', ':id') }}".replace(':id', employee.user_id));
        $("#myModal .modal-content .modal-body span:eq(0)").text(employee.gender);
        $("#myModal .modal-content .modal-body span:eq(1)").text(employee.date_of_birth);
        $("#myModal .modal-content .modal-body span:eq(2)").text(employee.marital_status);
        $("#myModal .modal-content .modal-body span:eq(3)").text(employee.email);
        $("#myModal .modal-content .modal-body span:eq(4)").text(employee.phone_number);
        $(".modal-content .modal-body span:eq(5)").text(permanent_address.address_line_1);
        $(".modal-content .modal-body span:eq(6)").text(mailing_address.address_line_1);


                            // Show the modal
                            modal.style.display = "block";
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

               
            })

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

            $("#myBtn").on("click", function() {
    window.location.href = "{{ route('employees.create') }}";
});


            
        </script>

        <script type="text/javascript">
            
$(document).ready(function() {
    var checkbox = $(".input-switch .demo1");
    checkbox.prop("checked", checkbox.attr("data-status") === "active");
});



        </script>

        <style>
           .text-right{text-align: right;}
       </style>

                @include('layout.footer')