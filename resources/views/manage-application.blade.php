@include('layout.inner2-header')


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

                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered text-left" style="width:100%">
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
                                            </tr>
                                        </thead>
                                        <tbody>

                                               @php $i=1; @endphp
                                    @php $u=1; @endphp
                                    @foreach ($applications as $applications)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$applications->created_at}}</td>
                                                <td>{{$applications->student->name}}</td>
                                                
                                                <td>{{ $applications->university_name}}</td>
                                                <td>{{ $applications->document_name}}</td>
                                                <td>{{ $applications->intake}}</td>
                                                @php $i=1; @endphp
                                                <td>{{ $applications->student->username->name}}</td>
                                                <td>{{$applications->status}}</td>
                                                <td></td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
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