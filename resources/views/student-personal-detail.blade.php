@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-view',$students->id)}}"><input type="button" value="Profile"
                                    class="btn-ma btn-active"></a>
                        </div>
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-document',$students->id)}}"><input type="button" value="Documents"
                                    class="btn-ma"></a>
                        </div>
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-application',$students->id)}}"><input type="button" value="Applications"
                                    class="btn-ma"></a>
                        </div>

                         <div class="col-xl-2 mb-4">
                            <a href="{{ route('verified-tests.edit', ['id' => $students->id]) }}"><input type="button" value="Tests"
                                    class="btn-ma"></a>
                        </div>

                        
                    </div>

                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">PERSONAL DETAILS</h5>
                                    </header>

                                    <section style="padding: 2%;">

                                        <div class="">
                                            <img style="width: 12%; float: right;" src="assets/images/users/user-4.jpg"
                                                alt="">
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Name :</label>
                                             @if(isset($students->name))
                                              <span>{{$students->name}}</span>
                                            @endif

                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Email :</label>
                                            @if(isset($students->email))
                                               <span>{{$students->email}}</span>
                                            @endif
                                           
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Phone :</label>
                                            @if(isset($students->phone))
                                              <span>{{$students->phone}}</span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Date Of Birth :
                                            </label>
                                            @if(isset($students->date_of_birth))
                                              <span>{{$students->date_of_birth}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <label style="width: 15%;">Marital Status :
                                            </label>
                                            @if(isset($students->marital_status))
                                              <span>{{$students->marital_status}}
                                            </span>
                                            @endif
                                           
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">ADDRESS INFORMATION</h5>
                                    </header>

                                    <section style="padding: 2%;">
                                        <div class="mb-4" style="display: flex;">
                                            <label style="width: 15%;">Address :</label>
                                            @if(isset($permanent_address->address_line_2))
                                              <spn>
                                                {{$permanent_address->address_line_2}}
                                                </span>
                                            @endif
                                           
                                                
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Country :</label>
                                            @if(isset($permanent_address->country))
                                               <span>{{$permanent_address->country}}</span>
                                            @endif
                                           
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Sate :</label>
                                            @if(isset($permanent_address->state))
                                              <span>{{$permanent_address->state}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">City :</label>
                                            @if(isset($permanent_address->state))
                                               <span>{{$permanent_address->state}}
                                            </span>
                                            @endif
                                           
                                        </div>
                                        <div>
                                            <label style="width: 15%;">Pincode :
                                            </label>
                                            @if(isset($permanent_address->zip_code))
                                               <span>{{$permanent_address->zip_code}}
                                            </span>
                                            @endif
                                           
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">MAILING ADDRESS</h5>
                                    </header>

                                  <section style="padding: 2%;">
                                        <div class="mb-4" style="display: flex;">
                                            <label style="width: 15%;">Address :</label>
                                            @if(isset($mailing_address->address_line_2))
                                               <spn>
                                                {{$mailing_address->address_line_2}}
                                                </span>
                                            @endif
                                           
                                                
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Country :</label>
                                            @if(isset($mailing_address->country))
                                               <span>{{$mailing_address->country}}</span>
                                            @endif
                                           
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Sate :</label>
                                            @if(isset($mailing_address->state))
                                             <span>{{$mailing_address->state}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">City :</label>
                                            @if(isset($mailing_address->city))
                                              <span>{{$mailing_address->city}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <label style="width: 15%;">Pincode :
                                            </label>
                                            @if(isset($mailing_address->zip_code))
                                              <span>{{$mailing_address->zip_code}}
                                            </span>
                                            @endif
                                            
                                        </div>

                                    </section>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">PASSPORT INFORMATION</h5>
                                    </header>

                                    <section style="padding: 2%;">
                                        <div class="mb-4">
                                            <label style="width: 15%;">Passport Number
                                                :</label>
                                                @if(isset($students->passport->passport_number))
                                               <span>{{$students->passport->passport_number}}</span>
                                            @endif
                                               
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Issue Date :</label>
                                            @if(isset($students->passport->issue_date))
                                              <span>{{$students->passport->issue_date}}</span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Expiry Date :</label>
                                             @if(isset($students->passport->expiry_date))
                                              <span>
                                                {{$students->passport->expiry_date}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">Issue Country :</label>
                                             @if(isset($students->passport->passport_issue_country))
                                              <span>{{$students->passport->passport_issue_country}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label style="width: 15%;">City of Birth :
                                            </label>
                                             @if(isset($students->passport->city_of_birth))
                                              <span>{{$students->passport->city_of_birth}}
                                            </span>
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <label style="width: 15%;">Country of Birth :
                                            </label>
                                             @if(isset($students->passport->country_of_birth))
                                               <span>{{$students->passport->country_of_birth}}
                                            </span>
                                            @endif
                                           
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">Academic Qualification</h5>
                                    </header>

                                    <section style="padding: 2%;">
                                        
                                        <div class="row">
                                                    <table id="academic_qualifications" class="table table-editable table-nowrap align-middle table-edits">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>COUNTRY EDUCATION</th>
                                                                <th>HIGHEST LEVEL OF EDUCATION</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @php $i=1; @endphp

                                                            @foreach($students->academic_qualifications as $academic_qualifications)
                                                            <tr data-id="1">
                                                                <td data-field="id" style="width: 80px">{{$i++}}</td>
                                                                <td data-field="age">{{$academic_qualifications->institution}}</td>
                                                                <td data-field="name">{{$academic_qualifications->qualification}}</td>
                                                                
                                                               

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-xl-12 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="mini-stat-img">
                                    <header class="app-status-header">
                                        <h5 style="padding: 2%;">Work Experience</h5>
                                    </header>

                                    <section style="padding: 2%;">
                                        

                                        <div class="row">
                                                <table class="table table-editable table-nowrap align-middle table-edits">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>COMPANY NAME</th>
                                                            <th>LOCATION</th>
                                                            <th>DESIGNATION</th>
                                                            <th>START DATE </th>
                                                            <th>END DATE</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @php $i=1; @endphp

                                                        @foreach($students->work_experience as $work_experience)
                                                        <tr data-id="1">
                                                            <td data-field="id" style="width: 80px">{{$i++}}</td>
                                                            <td data-field="name">{{$work_experience->company_name}}</td>
                                                            <td data-field="name">{{$work_experience->location}}</td>
                                                            <td data-field="age">{{$work_experience->job_title}}</td>
                                                            <td data-field="age">{{$work_experience->start_date}}</td>
                                                            <td data-field="age">{{$work_experience->end_date}}</td>
                                                            

                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

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

    </div>

   
         <style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>
           
 

                @include('layout.footer')