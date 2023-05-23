@include('layout.inner-header')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <h5 style="color: #1F92D1;">Add New Employees</h5>

                    <p class="subhead mt-2">Personal Information</p>

                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                         @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>NAME *</label>
                                            <input type="text"  name="name" class="form-control" placeholder="Enter Your Name" required>
                                        </div>
                                         
                                        <div class="form-group col-xl-6">
                                            <label>DATE OF BIRTH *</label>
                                            <input type="date" name="DOB" class="form-control" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-xl-6">
                                            <label>GENDER *</label>
                                            <Select class="form-control"  name="gender" required>
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>MARITAL STATUS</label>
                                            <Select class="form-control" name="marital_status" required>
                                                <option>Select</option>
                                                <option>Married</option>
                                                <option>Unmarried</option>
                                            </Select>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>EMAIL *</label>
                                            <input type="email"  autocomplete="new-password" name="email" class="form-control" placeholder="Enter Your Name" value="" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>PASSWORD *</label>
                                            <input type="password" autocomplete="new-password" value="" name="password" class="form-control" placeholder="Enter Your Name" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="subhead">Mailing Address</p>

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 1 *</label>
                                            <input type="text" name="mailing_addres1" class="form-control" placeholder="Enter Address" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 2</label>
                                            <input type="text" name="mailing_addres2" class="form-control" placeholder="Enter Address" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>COUNTRY *</label>
                                            <Select class="form-control" name="mailing_country" required>
                                                <option>Select</option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>STATE *</label>
                                            <Select class="form-control" name="mailing_state" required>
                                                <option>Select</option>
                                                 <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>CITY *</label> 
                                            <input type="text" class="form-control" placeholder="Enter City" name="mailing_city" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" placeholder="Enter Pincode" name="mailing_pincode" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="subhead">Permenant Address</p>

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 1 *</label>
                                            <input type="text" class="form-control" placeholder="Enter Address"  name="permenent_address1" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 2</label>
                                            <input type="text" class="form-control" placeholder="Enter Address"  name="permenent_address2" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>COUNTRY *</label>
                                            <Select class="form-control" name="permenent_country" required>
                                                <option>Select</option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>STATE *</label>
                                            <Select class="form-control" name="permenent_state" required>
                                                <option>Select</option>
                                                 <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>CITY *</label>
                                            <input type="text" class="form-control" placeholder="Enter City"  name="permenent_city" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" placeholder="name" name="permenent_pincode" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>NATIONALITY *</label>
                                            <Select class="form-control" name="permenent_nationality">
                                                <option>Select</option>
                                               <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>CITIZENSHIP *</label>
                                            <Select class="form-control" name="permenent_citizenship">
                                                <option>Select</option>
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </Select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="subhead">Other Details</p>

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>PHONE *</label>
                                            <input type="text" class="form-control" name="employee_number" placeholder="Enter Phone Number" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADD PROFILE PICTURE *</label>
                                            <input type="file" class="form-control" placeholder="Employee Image" name="profile_url[]" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                      <style>
           .text-right{text-align: right;}
       </style>

                    <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <input type="submit" class="footer-btn btn-active" value="Submit">
                        </div>
                    </div>
                </div>
            </footer>

        </form>

                </div>
            </div>



           
