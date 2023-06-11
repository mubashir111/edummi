@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <script type="text/javascript">
  $(document).ready(function() {
    var api_token = "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJtdWJhNHNoaXJAZ21haWwuY29tIiwiYXBpX3Rva2VuIjoiWFFUZ0dyWmVpdU5jMkl3UmVTUDI0UEFTTkd0Ylk1M3BFSFMyWWlLaGJraE43Wm5rdjlmaGdBYVA1cTJ2cDdGTWt3MCJ9LCJleHAiOjE2ODU2Nzk3NzR9.HzvJ1K659OgB8XQaMEIQqLA2OdtqjqHR0yOUKQGEQyk";
     
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
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                           <!--  <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this
                                    important alert message</a>.
                            </div> -->

                    <h5 class="mb-3">Franchise Registration</h5>
                    
               
                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    

                                     <form method="POST" action="{{ route('franchise.update', ['franchise' => $franchises->user_id]) }}" enctype="multipart/form-data">
 
                         @method('patch')
                        @csrf


                        <!-- Display error messages here -->
                   @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

                                    <div class="row">
                                        <div class="form-group col-xl-4">
                                            <label>FRANCHISE ID</label>
                                            <input name="franchise_id" type="text" class="form-control" placeholder="Enter Company Name" value="{{ $franchises->franchise_id }}" readonly>
                                        </div>
                                        <input type="hidden" name="edit_id" value="{{$franchises->user_id}}">

                                        <div class="form-group col-xl-4">
                                            <label>FRANCHISE NAME</label>
                                            <input name="franchise_name" type="text" class="form-control" placeholder="Enter Company Name" value="{{ $franchises->name }}">
                                        </div>

                                        <div class="form-group col-xl-4">
                                            <label>EMAIL ID(Admin)</label>
                                            <input name="email" type="text" class="form-control" placeholder="Enter Location" value="{{ $franchises->user->email }}">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-4">
                                            <label>ADDRESS</label>
                                            <textarea name="franchise_address" class="form-control" style="height: 120px;"
                                                placeholder="Enter Destination" >
                                                {{ $franchises->address }}
                                            </textarea>
                                        </div>

                                        <div class="form-group col-xl-4">
                                            <label>LABAL</label>
                                            <select class="form-control" name="franchise_label">
    <option value="">Select</option>
    <option value="Green Label"{{ $franchises->label == 'Green Label'? 'selected' : ''  }}>Green Label</option>
    <option value="White Label" {{$franchises->label == 'White Label'? 'selected' : ''  }}>White Label</option>
</select>


                                            <label class="mt-4">WEBSITE</label>
                                            <input type="text" name="franchise_website" class="form-control" placeholder="" value="{{ $website }}">


                                        </div>
                                        <div class="form-group col-xl-4">
                                            <label>COUNTRY</label>
                                            <select id="country_of_birth" name="franchise_country" class="form-control" required>
                                               @if(isset( $franchises->country))
                                                                <option value="{{ $franchises->country }}" selected>{{  $franchises->country}}</option>
                                                            @else
                                                                <option value="" selected>Select</option>
                                                            @endif
                                            </select>
                                            <label class="mt-4">STATE</label>
                                            <select id="stateDropdown" name="franchise_state" class="form-control"  required>
                                                @if(isset( $franchises->state))
                                                                <option value="{{ $franchises->state }}" selected>{{  $franchises->state}}</option>
                                                            @else
                                                                <option value="" selected>Select</option>
                                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-4">
                                            <label>PHONE</label>
                                            <input name="franchise_number" type="number" class="form-control" placeholder="Enter Company Name" value="{{ $franchises->phone_number }}" required>
                                        </div>

                                     <div class="form-group col-xl-4">

                                        <label>MANAGER GENDER</label>
                                        <select class="form-control" name="manager_gender" value="{{ old('manager_gender') }}">
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                        <div class="form-group col-xl-4">
                                            <label>CITY</label>
                                            <select id="mailing_city" name="franchise_city" class="form-control"  required>
                                                @if(isset( $franchises->city))
                                                                <option value="{{ $franchises->city }}" selected>{{  $franchises->city}}</option>
                                                            @else
                                                                <option value="" selected>Select</option>
                                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4" >

                                            <div>
                                                    <label>SOCIAL MEDIA LINKS
                                                    </label>
                                                </div>

                                                <div id="social-media-container">
                                                    

         @if(isset($socialMediaTypes) && is_array($socialMediaTypes))
    @foreach($socialMediaTypes as $key => $socialMediaType)
        <div class="row media-row" id="social-media-row-{{ $key + 1 }}">
            <div style="display: flex;">
                <div class="form-group mr-1" style="flex-basis: 20%;">
                    <select class="form-control" name="social_media_type[]">
                        <option value="facebook" @if($socialMediaType == 'facebook') selected @endif>facebook</option>
                        <option value="twitter" @if($socialMediaType == 'twitter') selected @endif>twitter</option>
                        <option value="instagram" @if($socialMediaType == 'instagram') selected @endif>instagram</option>
                        <option value="linkedin" @if($socialMediaType == 'linkedin') selected @endif>linkedin</option>
                    </select>
                </div>
                <div class="form-group mr-4" style="flex-basis: 70%;">
                    <input type="text" class="form-control" placeholder="Link" name="social_media_link[]" value="{{ $socialMediaLinks[$key] ?? '' }}">
                </div>
                <div class="form-group" style="flex-basis: 10%;margin-left: 10px;">
                    <button style="border: solid 1px;border-radius:3px;"><i class="mdi  mdi-18px mdi-delete"></i></button>
                </div>
            </div>
        </div>
    @endforeach
@endif




                                            </div>

                                            <div class="mt-2"><input type="button" class="link-btn" id="add-so"  value="+ Add More">
                                                </div>

                                        </div>
                                        <div class="col-xl-4">
                                            <div class="row">
                                                <div>
                                                    <label>COMPANY LOGO</label>
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <input name="logo[]" type="file" class="form-control"  >
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xl-4">
                                            <div class="row">


                                                <div>
                                                    <label>HEAD NAME</label>
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <input  name="head_name" type="text" class="form-control"
                                                        placeholder="Franchise head name" required value="{{ $franchises->user->name }}">
                                                </div>

                                                <div>
                                                    <label>PASSWORD</label>
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <input name="password" type="text" class="form-control"
                                                        placeholder="Update  Password Only IF Needed" value="" >
                                                </div>

                                               

                                            </div>

                                        </div>

                                     
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-12 text-right mt-4">
                                           
                                             <input type="submit" class="footer-btn btn-active" value="Update">
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