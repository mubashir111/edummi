@include('layout.header')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

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
          

          $('#country_of_birth').append($('<option>', {
            value: countryName,
            text: countryName
          }));

         


        }


      },
      error: function(error) {
        console.error(error);
      }
    });
}

   

   

   
    // Event handler for country dropdown change
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


                                $('#stateDropdown').empty();



                             $('#stateDropdown').append($('<option>', {
                                  value: '',
                                  text: 'Select'
                                }));

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

                                    $('#mailing_city').append($('<option>', {
                                  value: '',
                                  text: 'Select'
                                }));

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
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <h5 class="mb-3">Franchise Registration</h5>


            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="card mini-stat ">
                        <div class="card-body mini-stat-img" style="border-radius: 5px;">


                           <form action="{{ route('franchise.store') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <!-- Display error messages here -->
                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="row">
                                <div class="form-group col-xl-4">
                                    <label>FRANCHISE ID</label>
                                    <input name="franchise_id" type="text" class="form-control" placeholder="Enter Company Name" value="{{ $franchise_id }}" readonly>
                                </div>

                                <div class="form-group col-xl-4">
                                    <label>FRANCHISE NAME</label>
                                    <input name="franchise_name" type="text" class="form-control" placeholder="Enter Franchise Name" value="{{ old('franchise_name') }}">
                                </div>

                                <div class="form-group col-xl-4">
                                    <label>EMAIL ID(Admin)</label>
                                    <input name="email" type="text" class="form-control" placeholder="Enter Your Email" value="{{ old('email') }}">

                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="form-group col-xl-4">
                                    <label>ADDRESS</label>
                                    <textarea name="franchise_address" class="form-control" style="height: 100px;text-align: left;"
                                    placeholder="Enter Destination" required>
                                    {{ old('franchise_address') }}
                                </textarea>
                            </div>

                            <div class="form-group col-xl-4">
                                <label>NAME(FRANCHISE OWNER)</label>
                                <input  name="head_name" type="text" class="form-control"
                                placeholder="Franchise head name" required value="{{ old('head_name') }}">
                                <label>LEBAL</label>
                                <select class="form-control" name="franchise_label">
                                    <option value="">Select</option>
                                    <option value="Green Label"{{ old('franchise_label') == 'Green Label'? 'selected' : ''  }}>Green Label</option>
                                    <option value="White Label" {{old('franchise_label') == 'White Label'? 'selected' : ''  }}>White Label</option>
                                </select>
                            </div>


                            <div class="form-group col-xl-4">
                                <label>COUNTRY</label>
                                <select id="country_of_birth" name="franchise_country" class="form-control" value="{{ old('franchise_country') }}" required>
                                   <option>Select</option>

                                </select>
                                <label   class="">STATE</label>
                                <select id="stateDropdown" name="franchise_state" class="form-control" value="{{ old('franchise_state') }}" required>
                                    <option>Select</option>
                                </select>
                            </div>



                        </div>

                        <div class="row mt-2">
                            <div class="form-group col-xl-4">
                                <label>PHONE</label>
                                <input name="franchise_number" type="number" class="form-control" placeholder="Enter Franchise Number" value="{{ old('franchise_number') }}" required>
                            </div>

                            <div class="form-group col-xl-4">



                                <label class="">WEBSITE</label>
                                <input type="text" name="franchise_website" class="form-control" placeholder="" value="{{ old('franchise_website') }}">
                            </div>



                            <div class="form-group col-xl-4">
                                <label>CITY</label>
                                <select id="mailing_city" name="franchise_city" class="form-control" value="{{ old('franchise_city') }}" required>
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-xl-4" >

                                <div>
                                    <label>SOCIAL MEDIA LINKS
                                    </label>
                                </div>

                                <div id="social-media-container">
                                 @if(old('social_media_type'))
                                 @foreach(old('social_media_type', []) as $key => $value)
                                 <div class="row media-row" id="social-media-row-{{ $key + 1 }}">
                                    <div style="display: flex;">
                                        <div class="form-group mr-1" style="flex-basis: 20%;">
                                            <select class="form-control" name="social_media_type[]">
                                                <option value="facebook" @if($value == 'facebook') selected @endif>facebook</option>
                                                <option value="twitter" @if($value == 'twitter') selected @endif>twitter</option>
                                                <option value="instagram" @if($value == 'instagram') selected @endif>instagram</option>
                                                <option value="linkedin" @if($value == 'linkedin') selected @endif>linkedin</option>
                                            </select>
                                        </div>
                                        <div class="form-group mr-4" style="flex-basis: 70%;">
                                            <input type="text" class="form-control" placeholder="Link" id="social_media_link" name="social_media_link[]" value="{{ old('social_media_link.'.$key) }}">
                                        </div>
                                        <div class="form-group" style="flex-basis: 10%;">
                                            <script type="text/javascript">
                                                function dltval(){
                                                    
                                                    $("#social_media_link").val("");
                                                }
                                            </script>
                                            <button onclick="dltval()" style="border: solid 1px;border-radius:3px;color: rgb(246, 49, 49);"><i class="mdi  mdi-18px mdi-delete"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="row media-row" id="social-media-row-1">
                                    <div style="display: flex;">
                                        <div class="form-group mr-1" style="flex-basis: 20%;">
                                            <select class="form-control" name="social_media_type[]">
                                                <option value="facebook">facebook</option>
                                                <option value="twitter">twitter</option>
                                                <option value="instagram">instagram</option>
                                                <option value="linkedin">linkedin</option>
                                            </select>
                                        </div>
                                        <div class="form-group mr-4" style="flex-basis: 70%;">
                                            <input type="text" id="social_media_link" class="form-control" placeholder="Link" name="social_media_link[]">
                                        </div>
                                        <div class="form-group" style="flex-basis: 10%;">
                                            <script type="text/javascript">
                                                function dltval(){
                                                    
                                                    $("#social_media_link").val("");
                                                }
                                            </script>
                                            <button onclick="dltval()" style="border: solid 1px;border-radius:3px;color: rgb(246, 49, 49);"><i class="mdi  mdi-18px mdi-delete"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>

                            <div class="mt-2"><input type="button" class="link-btn" id="add-so"  value="+ Add More">
                            </div>

                        </div>

                        <div class="form-group col-xl-4">
                            <div class="row">
                                 <div>
                                <label>MANAGER GENDER</label>
                                </div>
                                <div class="form-group col-xl-12">
                                <select class="form-control" name="manager_gender" value="{{ old('manager_gender') }}">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>


                                <div>
                                    <label>COMPANY LOGO</label>
                                </div>
                                <div class="form-group col-xl-12">
                                    <input name="logo[]" type="file" class="form-control"  required>
                                </div>

                            </div>
                        </div>




                        <div class="col-xl-4">
                            <div class="row">




                                <div>
                                    <label>CREATE PASSWORD</label>
                                </div>
                                <div class="form-group col-xl-12">
                                    <input name="password" type="password" class="form-control"
                                    placeholder="Create Password"  required>
                                </div>

                                <div>
                                    <label>RE-ENTER PASSWORD</label>
                                </div>
                                <div class="form-group col-xl-12">
                                    <input  name="re_password" type="password" class="form-control"
                                    placeholder="Re-enter Password" required>
                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-xl-12 text-right mt-4" style="text-align: right;">

                           <input type="submit" class="footer-btn btn-active" value="Submit">
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>

</div>
</div>

</div>

</div>

<script type="text/javascript">

 var socialMediaContent = `
 <div class="row media-row" id="" >

 <div style="display: flex;" >
 <div class="form-group mr-1" style="flex-basis: 20%;">
 <Select class="form-control" name="social_media_type[]">
 <option value="facebook">facebook</option>
 <option value="twitter">twitter</option>
 <option value="instagram">instagram</option>
 <option value="linkedin">linkedin</option>
 </Select>
 </div>
 <div class="form-group mr-4" style="flex-basis: 70%;">
 <input type="text" class="form-control" placeholder="Link" name="social_media_link[]">
 </div>
 <div class="form-group" style="flex-basis: 10%;">
 <button
 style="border: solid 1px;border-radius:3px;color: rgb(246, 49, 49);"><i
 class="mdi  mdi-18px mdi-delete"></i>
 </button>
 </div>
 </div>

 </div>
 `;


 var socialMediaCounter = 1;

 function sosialMedia() {
    socialMediaCounter++;
    var socialMediaRow = $(socialMediaContent).attr('id', 'social-media-row-' + socialMediaCounter);
    $('#social-media-container').append(socialMediaRow);
}

$("#add-so").on("click",function(e){
    e.preventDefault();
    sosialMedia();
});

$(document).ready(function() {
    $("#social-media-container").on("click", ".mdi-delete", function(e) {
        e.preventDefault();
        console.log("hello");
        var mediaRow = $(this).closest(".media-row");
        var mediaRowId = mediaRow.attr("id");
        if(mediaRowId=="social-media-row-1"){

        }else{
          $("#" + mediaRowId).remove();  
      }

  });

});









</script>


@include('layout.footer')