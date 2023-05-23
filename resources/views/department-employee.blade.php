@include('layout.inner-header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>{{ $department->department_name }}</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn"><i class="mdi mdi-plus-circle"></i>Add New Member</button>
                        </div>
                    </div>
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color: #000; font-weight: bolder;">ADD NEW MEMBER</h5>
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-4">
                                     <form method="POST" action="{{ route('departments.update', ['department' => $department->id]) }}" >
 

                        @csrf
                        @method('PUT')
                                    <div class="form-group col-xl-12">
                                        <label>Select Employee</label>
                                        <div class="mm-dropdown">
                                            <div class="textfirst">Select<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png" width="10" height="10" class="down" /></div>
                                            <ul>
                                                @foreach ($employee as $employee)
                                                <li class="input-option" data-value="{{ $employee->user_id }}">
                                                    <div class="row">
                                                        <div class="col-xl-1">
                                                            <img class="rounded-circle header-profile-user" src="../assets/images/users/user-4.jpg" alt="Header Avatar">
                                                        </div>
                                                        <div class="col-xl-11">
                                                            <label>{{ $employee->name }}</label>
                                                            <div>{{ $employee->user_id }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <input type="hidden" class="option" name="user_id" value="" />
                                        </div>

                                        <script>
                                            $(function () {
                                                // Set
                                                var main = $('div.mm-dropdown .textfirst')
                                                var li = $('div.mm-dropdown > ul > li.input-option')
                                                var inputoption = $("div.mm-dropdown .option")
                                                var default_text = 'Select<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png" width="10" height="10" class="down" />';

                                                // Animation
                                                main.click(function () {
                                                    main.html(default_text);
                                                    li.toggle('fast');
                                                });

                                                // Insert Data
                                                li.click(function () {
                                                    // hide
                                                    li.toggle('fast');
                                                    var livalue = $(this).data('value');
                                                    var lihtml = $(this).html();
                                                    main.html(lihtml);
                                                    inputoption.val(livalue);
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="submit" class="footer-btn btn-active" value="Add">
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
                                    <table id="myTable" class="table table-striped table-bordered text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>EMPLOYEE ID</th>
                                                <th>NAME</th>
                                                <th>DESIGNATION</th>
                                                <th>EMAIL ID</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp

                                        @foreach ($users as $users)
                                            <tr>
                                                <td>{{ $i++}}</td>
                                                <td>{{ $users->user_id }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->role }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>{{ $users->status }}</td>
                                                <td class="text-center"><a href="" style="color: red;"><i
                                                            class="mdi mdi-24px mdi-minus-circle"></i></a>
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

                @include('layout.inner-footer')