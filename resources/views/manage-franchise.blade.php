@include('layout.header')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <h5>Manage Franchise</h5>
                </div>
            </div>
            <div class="row text-right">
                <div class="col-xl-12 text-right">
                    <button class="btn1" id="myBtn">Register New Franchise</button>

                </div>
            </div>
            <div id="myModal" class="modal">

                <form action="{{ route('franchise.store') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW FRANCHISE</h5>
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
                                    <input name="franchise_name" type="text" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>STATE *</label>
                                    <input name="franchise_state" type="text" class="form-control" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>COUNTRY *</label>
                                    <input name="franchise_country" type="text" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>MOBILE NUMBER *</label>
                                    <input type="text" name="franchise_number" class="form-control" placeholder="Enter Mobile Number ">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>LOGO *</label>
                                    <input type="file" name="logo[]" class="form-control">
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


            <div id="EditModal" class="modal">

             <form action="{{ route('franchise.update', ['franchise' =>1]) }}" method="post" enctype="multipart/form-data" id="edit-form">

                @csrf
                @method('patch')

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: #000; font-weight: bolder;">EDIT FRANCHISE</h5>
                        <span id="closeModal2" class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-4">
                            <div class="form-group col-xl-12">
                                <label>BRANCH OWNER EMAIL ADDRESS *</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter Email Address" >
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-group col-xl-12">
                                <label>PASSWORD *</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter Email Address" >
                            </div>
                        </div>
                        <input type="hidden" name="edit_id" value="">

                        <div class="row ">
                            <div class="form-group col-xl-12">
                                <label>Franchise Name *</label>
                                <input name="franchise_name" id="franchise_name" value="" type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <label>STATE *</label>
                                <input name="franchise_state" value="" type="text" class="form-control" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <label>COUNTRY *</label>
                                <input name="franchise_country" value="" type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <label>MOBILE NUMBER *</label>
                                <input type="text" name="franchise_number" value="" class="form-control" placeholder="Enter Mobile Number ">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-12">
                                <label>LOGO *</label>
                                <input type="file" name="logo[]" class="form-control">
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
                        <table id="myTable" class="table table-striped table-bordered text-leftr" style="width:100%">
                            <thead">
                                   <!--  <tr>
                                        <th>Franchise Name</th>
                                        <th>Manager Name</th>
                                        <th>Manager Email</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>logo</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr> -->
                                    <tr  style="text-align:left;">
                                        <th>SL NO.</th>
                                        <th>FRANCHISE ID</th>
                                        <th>FRANCHISE NAME</th>
                                        <th>LOCATION</th>
                                        <th>EMAIL ID</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @php $u=1; @endphp
                                    @foreach ($franchises as $franchise)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $franchise->franchise_id }}</td>

                                        <td>
                                            <a class="myBtn">
                                                @if (!empty($franchise->logo))
                                                <img class="rounded-circle header-profile-user mr-5" src="{{ $franchise->logo }}" alt="" style="margin-right: 10px;">
                                                @else
                                                <img class="rounded-circle header-profile-user mr-5" src="assets/images/users/user-4.jpg" alt="" style="margin-right: 10px;">
                                                @endif
                                                <span style="color: rgb(96, 96, 96);">{{ $franchise->name }}</span>
                                            </a>
                                        </td>
                                        <td>{{ $franchise->address }}</td>
                                        <td>{{ $franchise->user->email }}</td>
                                       
                                         @php  $u++; @endphp
                                        <td class=""><input class='input-switch' type="checkbox"
                                            id="demo{{$u}}"  data-id="{{ $franchise->id }}" 
                                            data-status="{{ $franchise->status }}" 
                                            {{ $franchise->status == 'active' ? 'checked' : '' }}/>
                                            <label class="label-switch" for="demo{{$u}}"></label>
                                            <span class="info-text"></span>
                                        </td>
                                        <td class="text-center"><a href="{{ route('franchise.edit', ['franchise' => $franchise->user_id]) }}"><button
                                            style="border: Solid 1px;border-radius: 5px;"><i
                                            class="mdi mdi-pencil"></i>
                                        </button></a></td>
                                        
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

        <script>
            var modal = document.getElementById("myModal");
            var editModal = document.getElementById("EditModal");
            var btn = document.getElementById("myBtn");
            var closeBtn1 = document.getElementById("closeModal1");
            var closeBtn2 = document.getElementById("closeModal2");



            btn.onclick = function() {
              window.location.href = '{{ route('franchise.create') }}';
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
            var franchiseId = $(this).data('id');
            editModal.style.display = "block";

            $.ajax({
                url: "{{ route('franchise.edit', ['franchise' => ':franchiseId']) }}".replace(':franchiseId', franchiseId),
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var franchise = data.franchises;

                    var user = data.franchises[0].user;

            // Populate the edit form with the data
            // console.log(user.email);

                    $('#edit-form [name="email"]').val(user.email);
                    $('#edit-form #franchise_name').val(franchise[0].name);
                    $('#edit-form [name="franchise_state"]').val(franchise[0].state);
                    $('#edit-form [name="franchise_country"]').val(franchise[0].country);
                    $('#edit-form [name="franchise_number"]').val(franchise[0].phone_number);
                    $('#edit-form [name="edit_id"]').val(franchise[0].user_id);



            // Show the modal
                },
                error: function(xhr, status, error) {
            // Handle the error
                }
            });

        });





    </script>

    <script>
        $(document).ready(function () {
            $('.input-switch').on('change', function () {
                var id = $(this).data('id');
                var status = $(this).is(':checked') ? "active" : "inactive";
                var url = '{{ route("franchisestatus") }}';

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


    <style>
     .text-right{text-align: right;}
 </style>
 @include('layout.footer')
