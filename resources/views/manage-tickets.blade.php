@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5 class="mb-4">Tickets</h5>
                        </div>
                    </div>
                           
                    <div class="row">




                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>USER</th>
                                                <th>AGENT</th>
                                                <th>REQUESTED ON</th>
                                                <th>UPDATED</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php $i=1 @endphp

                                                   

                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$ticket->sender_id}}</td>
                                                <td>{{$ticket->id}}</td>
                                                <td>{{$ticket->created_at}}</td>
                                                <td>{{$ticket->updated_at}}</td>
                                                @if ($ticket->status == 'rejected')
                                                    <td class="text-center" style="color: red;">Rejected</td>
                                                @elseif ($ticket->status == 'success')
                                                    <td class="text-center" style="color: green;">Success</td>
                                                @else
                                                    <td class="text-center" style="color: orange;">Pending</td>
                                                @endif
                                             <td class="text-center"><a href="{{ route('tokens.show', $ticket->id) }}"><button
                                                            style="border:none;color: #1F92D1;">Open<i
                                                                class="mdi mdi-16px mdi-chevron-right"></i></button></a>
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
        </div>

        <style>
           .text-right{text-align: right;}
       </style>
@include('layout.footer')
