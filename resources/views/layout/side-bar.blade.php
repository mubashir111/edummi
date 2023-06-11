<!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">

                    <li>
                        <a href="{{ route('dashboard') }}"  class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? '' : 'd-none'  }}">
                    <a  href="{{ route('departments.index') }}" class=" waves-effect">
                           <i class="mdi mdi-view-dashboard"></i>
                            <span>Departments</span>
                        </a>
                    </li>


                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? '' : 'd-none'  }}">
                            <a  href="{{ route('employees.index') }}" class="waves-effect">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span>Employees</span>
                            </a>
                        </li>

                    

                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' ? '' : 'd-none' }}">
                    <a id="manage-francais" href="{{ route('franchise.index') }}" class=" waves-effect">
                             <i class="mdi mdi-view-dashboard"></i>
                            <span>Franchise</span>
                        </a>
                    </li>


                    <li class="{{ auth()->user()->role === 'Branch_Owner' ? '' : 'd-none' }}">
                    <a id="manage-francais" href="{{ route('staff.index') }}" class=" waves-effect">
                            <i class="mdi mdi-nature"></i>
                            <span>Manage Staff</span>
                        </a>
                    </li>

                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' || auth()->user()->role === 'Sales_Staff' || auth()->user()->role === 'franchises_employee' ? '' : 'd-none' }}">



                    <a href="{{ route('manage-students.index') }}"  class=" waves-effect">
                            <i class="mdi mdi-account"></i>
                            <span>Manage Students</span>
                        </a>
                    </li>

                 @php
    $manage_students = null;
@endphp

@foreach (auth()->user()->department as $department)
    @if ($department->department->department_role === 'document_handling')
        @php
            $manage_students = '
            <li >
                <a href="' . route('department-students') . '" class="waves-effect">
                    <i class="mdi mdi-account"></i>
                    <span>Manage  documents</span>
                </a>
            </li>';
        @endphp
        @break
    @endif
@endforeach

{!! $manage_students ?? '<li class="d-none"></li>' !!}

           @php
    $manage_students = null;
@endphp

@foreach (auth()->user()->department as $department)
    @if ($department->department->department_role === 'visa_handling')
        @php
            $manage_students = '
            <li >
                <a href="' . route('department-students-visa') . '" class="waves-effect">
                    <i class="mdi mdi-account"></i>
                    <span>Manage Visa</span>
                </a>
            </li>';
        @endphp
        @break
    @endif
@endforeach

{!! $manage_students ?? '<li class="d-none"></li>' !!}

                    
<!-- 
                <li class="{{ auth()->user()->role === 'franchises_employee' || auth()->user()->role === 'department_employee' ? 'mm-active' : 'd-none' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                <i class="mdi mdi-file-find"></i>
                    <span>Manage Students</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                     @foreach (auth()->user()->department as $department)

                      @if($department->department->department_role === 'document_handling' )
                                               <li>
                <a href="{{ route('department-students') }}">Manage Documnets</a>
                </li>
                                                @endif

                                                 @if($department->department->department_role === 'application_handling' )
                                                  <li>
                <a href="{{ route('filter_students_application') }}">Manage Application</a>
                </li>
                                                @endif
                

                @endforeach
            
                </ul>
                </li> --> 


                 

    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner'  ? '' : 'd-none' }}">
                    <a href="{{route('manage-applications.index')}}" class="waves-effect">

                        <i class="mdi mdi-file-document">@if($unreadNotifications->where('type', 'App\Notifications\Application_status')->count() !== 0) 
            
                        <span class="badge rounded-pill bg-success float-end">
                            {{$unreadNotifications->where('type', 'App\Notifications\Application_status')->count()}}
                        </span>
            
            @endif</i>
                        
            
            
            
                        <span>Manage Application</span>
                    </a>
                </li>


     
    @php
    $manage_students = '';
    foreach (auth()->user()->department as $department) {
        if ($department->department->department_role !== 'document_handling') {
            $manage_students .= '
                <li>
                    <a href="'.route('manage-applications.index').'" class="waves-effect">
                        <i class="mdi mdi-file-document"></i>';
                        
            if($unreadNotifications->where('type', 'App\Notifications\Application_status')->count() !== 0) {
                $manage_students .= '
                        <span class="badge rounded-pill bg-success float-end">
                            '.$unreadNotifications->where('type', 'App\Notifications\Application_status')->count().'
                        </span>';
            }
            
            $manage_students .= '
                        <span>Manage Application</span>
                    </a>
                </li>';
            break;
        }
    }
@endphp

{!! $manage_students ?? '<li class="d-none"></li>' !!}



                  
                    

                   


                   

                      <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect" >
                                <i class="mdi mdi-account"></i>
                            <span>Manage leads</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="{{ route('lead.index') }}">unassigned leads</a></li>
                                <li><a href="{{ route('signedlead') }}">assigned leads</a></li>
                                
                                @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'Branch_Owner' )
                                <li><a href="{{ route('convertedlead') }}">Converted leads</a></li>
                                @endif
                               
                            </ul>
                        </li>

            

                         <li id="course_finder_dropddown">
                    <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                <i class="mdi mdi-file-find"></i>
                    <span>Course Finder</span>
                </a>
                <ul class="sub-menu mm-collapse" aria-expanded="false">
                
                    @php $userRole = auth()->user()->role; @endphp
                    @if ($userRole === "superadmin") 
                    <li>
                        <a id="course-finder" href="{{ route('course-finder.index') }}">Add New +</a>
                    </li>

                    @endif

                     @if(isset($course_finder) && $course_finder->count() > 0)
                      @foreach ($course_finder as $course_finder)

                         
                          <li><div class="d-flex" style="justify-content: flex-end;align-items: center;margin-right: 20px;">
                              
                              <div>
                                <a href="{{ route('course-finder-view', ['url' => $course_finder->id]) }}"  >{{ $course_finder->label }}</a>
  
                              
                          </div>
                          @if ($userRole === "superadmin") 
                          <div class="course_finder_dlt_btn" dlt_id="{{$course_finder->id}}">
                            
                                                    <span class="mdi mdi-delete"></span>
                                                </div>
                                                @endif

                                                </div>
                                            </li>

                         @endforeach
                          @endif
                <!-- Add more list items if needed -->
                </ul>
                </li>

           <script>
    $(".course_finder_dlt_btn").on("click", function(e) {
        e.preventDefault();

        var dlt_id = $(this).attr("dlt_id");

        console.log("clicked");

         Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete course finder.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
               // Make AJAX call
        $.ajax({
            url: "{{ route('courserfinderdelete') }}",
            method: "POST",
            data: { dlt_id: dlt_id ,
          _token: '{{ csrf_token() }}',},
            success: function(response) {
                // Handle the success response
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle the error
                console.error(error);
            }
        });

            } else {
                $(this).prop('checked', !$(this).is(':checked'));
            }
        });


        
    });
</script>


             <script type="text/javascript">
    $(document).ready(function() {
      $('.coursefinder_link').click(function(event) {
        event.preventDefault(); // Prevent the default click behavior

        // Get the link from the data-link attribute
        var link = $(this).attr('data-link');

        // Access the iframe and set its source to the link
        $('#coursefinder_iframe').attr('src', link);
      });
    });
  </script>



                        <li  class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' ? '' : 'd-none' }}">
                            <a href="{{ route('representatives.index') }}" class=" waves-effect">
                                <i class="mdi mdi-nature"></i>
                                <span>Representative</span>
                            </a>
                        </li>

                       

                      <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? '' : 'd-none' }}">
    <a href="{{ route('tokens.index') }}" class="waves-effect">
        <i class="mdi mdi-nature"></i>
        @php  $user_id = auth()->user()->id; @endphp
        @if($unreadNotifications->where('type', 'App\Notifications\token_status')->count() != 0) 
            <span class="badge rounded-pill bg-success float-end">
                {{ $unreadNotifications->where('type', 'App\Notifications\token_status')->where('notifiable_id', $user_id)->count() }}
            </span>
        @endif
        <span>Tickets</span>
    </a>
</li>



                     <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? 'd-none' : '' }}">
    <a href="{{ route('tokens.ticketView') }}" class="waves-effect">
        <i class="mdi mdi-nature"></i>
        
        @php  $user_id = auth()->user()->id; @endphp
        @if($unreadNotifications->where('type', 'App\Notifications\token_status')->count() != 0) 
            <span class="badge rounded-pill bg-success float-end">
                {{ $unreadNotifications->where('type', 'App\Notifications\token_status')->where('notifiable_id', $user_id)->count() }}
            </span>
        @endif
        <span>Tickets</span>
    </a>
</li>



                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' ? '' : 'd-none' }}">
                    <a  href="{{ route('news.index') }}" class=" waves-effect">
                            <i class="mdi mdi-nature"></i>
                            <span>News</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->