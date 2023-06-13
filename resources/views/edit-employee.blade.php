@include('layout.header')

 @foreach ($address as $address)
                            @if ($address->address_type === "mailing")
                                @php
                                    $mailing_address = $address;
                                @endphp
                            @else
                                @php
                                    $permanent_address = $address;
                                @endphp
                            @endif
                        @endforeach

<script type="text/javascript">
    $(document).ready(function() {
       @include('layout.api_generate_script');

       function countryfunction(api_token){

       $.ajax({
    url: "https://www.universal-tutorial.com/api/countries",
    type: "GET",
    headers: {
        "Accept": "application/json",
        "Authorization": api_token
    },
    success: function(response) {
        // Iterate over the countries array
        for (var i = 0; i < response.length; i++) {
            var country = response[i];
            var countryName = country.country_name;
            var country_code = country.country_phone_code;

            // Check if the country matches the selected country in the mailing address
            var selected = '';
            var selected2 ='';
            if ("{{$mailing_address->country }}" == countryName) {
                selected = 'selected';
            }

             if ("{{$permanent_address->country }}" == countryName) {
                selected2 = 'selected';
            }

            $('#country_of_birth').append($('<option>', {
                value: countryName,
                text: countryName,
                selected: selected
            }));


             $('#permenent_country').append($('<option>', {
                        value: countryName,
                        text: countryName,
                        selected: selected2
                    }));

            
        }
    },
    error: function(error) {
        console.error(error);
    }
});


    }
          
          
       $('#permenent_country').on('change', function() {
         var country = $(this).val();

            var url = "https://www.universal-tutorial.com/api/states/"+country;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {

                    $('#city_of_birth2').removeAttr("disabled");

                    $('#city_of_birth2').empty();




                    for (var i = 0; i < response.length; i++) {
                        var state = response[i];
                        var stateName = state.state_name;




                        $('#city_of_birth2').append($('<option>', {
                            value: stateName,
                            text: stateName
                        }));
                    }
                

                citizenship(country);


                },
                error: function(error) {
                    console.error(error);
                }
            });


        });


       



        $('#country_of_birth').on('change', function() {
            var country = $(this).val();

            var url = "https://www.universal-tutorial.com/api/states/"+country;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {

                    $('#city_of_birth').removeAttr("disabled");

                    $('#city_of_birth').empty();




                    for (var i = 0; i < response.length; i++) {
                        var state = response[i];
                        var stateName = state.state_name;




                        $('#city_of_birth').append($('<option>', {
                            value: stateName,
                            text: stateName
                        }));
                    }



                },
                error: function(error) {
                    console.error(error);
                }
            });


        });



// Event handler for country dropdown change
        $('#country_list').on('change', function() {
            var country = $(this).val();

            var url = "https://www.universal-tutorial.com/api/states/"+country;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {


                    $('#stateDropdown').empty();

                    for (var i = 0; i < response.length; i++) {
                        var state = response[i];
                        var stateName = state.state_name;




                        $('#stateDropdown').append($('<option>', {
                            value: stateName,
                            text: stateName
                        }));
                    }



                },
                error: function(error) {
                    console.error(error);
                }
            });


        });



        $('#stateDropdown').on('change', function() {
            var selectedState = $(this).val();

            var url = "https://www.universal-tutorial.com/api/cities/"+selectedState;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {



                    $('#mailing_city').empty();

                    for (var i = 0; i < response.length; i++) {
                        var city = response[i];
                        var city_name = city.city_name;




                        $('#mailing_city').append($('<option>', {
                            value: city_name,
                            text: city_name
                        }));
                    }



                },
                error: function(error) {
                    console.error(error);
                }
            });
        });


//permenent_country

// Event handler for country dropdown change
        $('#permenent_country').on('change', function() {
            var country = $(this).val();

            var url = "https://www.universal-tutorial.com/api/states/"+country;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {

                    $('#permentstateDropdown').empty();

                    for (var i = 0; i < response.length; i++) {
                        var state = response[i];
                        var stateName = state.state_name;




                        $('#permentstateDropdown').append($('<option>', {
                            value: stateName,
                            text: stateName
                        }));
                    }



                },
                error: function(error) {
                    console.error(error);
                }
            });


        });

        $('#permentstateDropdown').on('change', function() {
            var selectedState = $(this).val();

            var url = "https://www.universal-tutorial.com/api/cities/"+selectedState;

            $.ajax({
                url: url,
                type: "GET",
                headers: {
                    "Accept": "application/json",
                    "Authorization": api_token
                },
                success: function(response) {

                    $('#permenent_city').empty();
                    for (var i = 0; i < response.length; i++) {
                        var city = response[i];
                        var city_name = city.city_name;




                        $('#permenent_city').append($('<option>', {
                            value: city_name,
                            text: city_name
                        }));
                    }



                },
                error: function(error) {
                    console.error(error);
                }
            });
        });



    });
</script>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <h5 style="color: #1F92D1;">Edit Employees</h5>

                    <p class="subhead mt-2">Personal Information</p>
                    <!-- <a href="{{ route('sendEmail') }}">Send Email</a> -->

                    <form action="{{ route('employees.update', ['employee' => $employee->user_id]) }}" method="post" enctype="multipart/form-data">
     
                        @csrf
                        @method('patch')

                         @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('error') }}
                            </div>
                            @endif

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>NAME *</label>
                                            <input type="text"  name="name" class="form-control" placeholder="Enter Your Name" value="{{$employee->name}}" required>
                                        </div>
                                         
                                        <div class="form-group col-xl-6">
                                            <label>DATE OF BIRTH *</label>
                                            <input type="date" name="DOB" class="form-control" placeholder="" value="{{$employee->date_of_birth}}" required>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-xl-6">
                                            <label>GENDER *</label>
                                            <Select class="form-control"  name="gender" required>
                                                <option>Select</option>
                                                <option value="Male" {{ $employee->gender == "Male" ? 'selected' : '' }}>Male</option>

                                                <option value="Female" {{ $employee->gender == "Female" ? 'selected' : '' }}>Female</option>
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>MARITAL STATUS</label>
                                            <Select class="form-control" name="marital_status" required>
                                                <option>Select</option>
                                                <option value="Married" {{ $employee->marital_status == "Married" ? 'selected' : '' }}>Married</option>
                                                <option value="Unmarried" {{ $employee->marital_status == "Unmarried" ? 'selected' : '' }}>Unmarried</option>
                                            </Select>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>EMAIL *</label>
                                            <input type="email"  autocomplete="new-password" name="email" class="form-control" placeholder="Enter Your Name" value="{{$employee->email}}" required>
                                        </div>


                                        <div class="form-group col-xl-6">
                                            <label>PASSWORD *</label>
                                            <input type="password" autocomplete="new-password" value="" name="password" class="form-control" placeholder="Enter Your Name" >
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
                                            <input type="text" name="mailing_addres1" class="form-control" value="{{$mailing_address->address_line_1}}" placeholder="Enter Address" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 2</label>
                                            <input type="text" name="mailing_addres2" class="form-control"  value="{{$mailing_address->address_line_2}}" placeholder="Enter Address" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>COUNTRY *</label>
                                            <Select class="form-control" id="country_of_birth" name="mailing_country" required>
                                                
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>STATE *</label>
                                            <Select class="form-control" id="city_of_birth" name="mailing_state" required>
                                                <option value="{{$mailing_address->state }}"selected>{{$mailing_address->state }}</option>
                                                 
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>CITY *</label> 
                                            <input type="text" class="form-control" placeholder="Enter City" name="mailing_city" value="{{$mailing_address->city }}" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" placeholder="Enter Pincode" name="mailing_pincode" value="{{$mailing_address->zip_code }}" required>
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
                                            <input type="text" class="form-control" placeholder="Enter Address"  name="permenent_address1" value="{{$permanent_address->address_line_1}}" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADDRESS LINE 2</label>
                                            <input type="text" class="form-control" placeholder="Enter Address"  name="permenent_address2" value="{{$permanent_address->address_line_2}}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>COUNTRY *</label>
                                            <Select class="form-control" id="permenent_country" name="permenent_country" required>
                                                
                                            </Select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>STATE *</label>
                                            <Select class="form-control" id="city_of_birth2" name="permenent_state" required>
                                                <option value="{{$permanent_address->state }}"selected>{{$permanent_address->state }}</option>
                                                 
                                            </Select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>CITY *</label>
                                            <input type="text" class="form-control" placeholder="Enter City"  name="permenent_city" value="{{$permanent_address->city }}"  required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>PINCODE</label>
                                            <input type="text" class="form-control" placeholder="name" name="permenent_pincode"  value="{{$permanent_address->zip_code }}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>NATIONALITY *</label>
                                           
                                             <input type="text" class="form-control" placeholder="name" name="permenent_nationality" value="{{$permanent_address->nationality }}" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>CITIZENSHIP *</label>
                                            <input type="text" class="form-control" placeholder="name" name="permenent_citizenship" value="{{$permanent_address->citizenship }}"required>
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
                                            <input type="text" class="form-control" name="employee_number" placeholder="Enter Phone Number" value="{{$employee->phone_number }}" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>ADD PROFILE PICTURE *</label>
                                            <input type="file" class="form-control" placeholder="Employee Image" name="profile_url[]" >
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
                            
                            <input type="submit" class="footer-btn btn-active" value="Update">
                        </div>
                    </div>
                </div>
            </footer>

        </form>

                </div>
            </div>
 @include('layout.footer')


           
