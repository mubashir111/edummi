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

                    <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' || auth()->user()->role === 'Sales_Staff' ? '' : 'd-none' }}">



                    <a href="{{ route('manage-students.index') }}"  class=" waves-effect">
                            <i class="mdi mdi-account"></i>
                            <span>Manage Students</span>
                        </a>
                    </li>

                     <li class="{{ auth()->user()->role === 'franchises_employee' || auth()->user()->role === 'department_employee'  ? '' : 'd-none' }}">



                    <a href="{{ route('department-students') }}"  class=" waves-effect">
                            <i class="mdi mdi-account"></i>
                            <span>Manage Students</span>
                        </a>
                    </li>

                  
                    

                    <li>
                        <a    href="{{ route('manage-applications.index') }}" class=" waves-effect">
                            <i class="mdi mdi-file-document"></i>
                            <span>Manage Application</span>
                        </a>
                    </li>
                  

                    <li>
                            <a id="course-finder" class="has-arrow waves-effect">
                                <i class="mdi mdi-file-find"></i>
                                <span>Course Finder</span>
                            </a>
                            @if(isset($course_finder) && $course_finder->count() > 0)
                            <ul class="sub-menu" aria-expanded="false">
                                 @foreach ($course_finder as $course_finder)

                         
                          <li><a href="{{$course_finder->link}}">{{$course_finder->label}}</a></li>

                         @endforeach
                            </ul>
                            @endif
                        </li>
                        <script type="text/javascript">
                          var i=1;
                        </script>



                        <li  class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' ? '' : 'd-none' }}">
                            <a href="{{ route('representatives.index') }}" class=" waves-effect">
                                <i class="mdi mdi-nature"></i>
                                <span>Representative</span>
                            </a>
                        </li>

                       

                      <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? '' : 'd-none' }}">
                    <a  href="{{ route('tokens.index') }}" class=" waves-effect">
                            <i class="mdi mdi-nature"></i>
                            <span>Tickets</span>
                        </a>
                    </li>


                     <li class="{{ auth()->user()->role === 'superadmin' || auth()->user()->role === 'major_admin' || auth()->user()->role === 'Branch_Owner' ? 'd-none' : '' }}">
                    <a  href="{{ route('tokens.ticketView') }}" class=" waves-effect">
                            <i class="mdi mdi-nature"></i>
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