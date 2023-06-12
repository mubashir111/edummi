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
                                        <thead style="">
                                            <tr>

                                                <th>SL NO.</th>
                                                <th>STUDENTS ID</th>
                                                <th>STUDENTS NAME</th>
                                               
                                                
                                                <th>Student Details</th>
                                                
                                                
                                                 
                                                <th>Application Description</th>
                                                <th>Your Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp

                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$student->student_id}}</td>
                                                <td><img class="rounded-circle header-profile-user mr-3"
                                                        src="{{asset($student->image_url)}}" alt="" style="margin-right: 9px;"><span
                                                        style="color: rgb(96, 96, 96);">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</span></td>
                                                
                                                 
                                                          
                                                <td><a href="{{ route('visa-student-view',$student->id) }}">View
                                                       </a></td>
                                               
                                             
                                               
        






   
    <td>
        <div>
        
        @php
        $statusCounts = $student->application->groupBy('current_status')->map->count();


        @endphp

        @foreach ($statusCounts as $status => $count)
            @php
           
            
            foreach ($application_status as $application_stat) {
                if ($application_stat->id === $status) {
                    $statusMessage = $application_stat->name;
                    break;
                }
            }

            @endphp

           
            <span class="badge rounded-pill bg-primary">{{ $statusMessage }}: {{ $count }}</span>
        @endforeach
    </div>

        
    </td>












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
            </div>
            <script>
                $(document).ready(function () {
                    let table = new DataTable('#myTable', {
                        responsive: true,
                        
                    });
                });

            </script>

            <script>
function updateDocumentStatus(selectElement, studentId) {
    const selectedStatus = selectElement.value;

    // Ask for verification using SweetAlert
    Swal.fire({
        title: 'Confirmation',
        text: 'Are you sure you want to update students status?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the AJAX call to update the document status
            const token = '{{ csrf_token() }}';

            // Make the AJAX call
            $.ajax({
                url: '{{ route("studentstatus") }}',
                type: 'POST',
                data: {
                    _token: token,
                    student_id: studentId,
                    status: selectedStatus
                },
                success: function(response) {
                    // Handle the response
                    Swal.fire({
                        title: 'Success',
                        text: 'Student status updated successfully',
                        icon: 'success'
                    });
                },
                error: function(error) {
                    // Handle the error
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to update document status',
                        icon: 'error'
                    });
                }
            });
        } else {
            // Reset the select element to the previous selected status
           
        }
    });
}
</script>
        </div>

         <style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>
           
 

                @include('layout.footer')