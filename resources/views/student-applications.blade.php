
@include('layout.header')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    

                    <div class="row mt-4">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <h5 class="mb-4" style="color: #1F92D1;">Assigned Students</h5>
                                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>STUDENTS ID</th>
                                                <th>STUDENTS NAME</th>
                                                <th>APPLICATION</th>
                                                <th>STATUS</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @php $i=1; @endphp
                                    
                                    @foreach ($students as $application)

                                         


                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$application->student_id}}</td>
                                                <td><img class="rounded-circle header-profile-user mr-3"
                                                        src="{{asset($application->image_url)}}" alt=""><span
                                                        style="color: rgb(96, 96, 96);">{{ $application->name}}</span></td>

                                                <td class="text-center">
    <a href="{{ route('students-application-user', ['id' => $application->id]) }}" style="color: #1F92D1;">
        View Application
    </a>
</td>
                                            
                                                <td>{{$application->status}}

                                                <Select class="tbl-slct">
                                                        <option>Select</option>
                                                        <option style="color: green;">Verified</option>
                                                        <option style="color: orange;">Pending</option>
                                                    </Select>

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
                            { responsivePriority: 5 }

                        ]
                    });
                });

            </script>
        </div>

       


<style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>
           
 

                @include('layout.footer')