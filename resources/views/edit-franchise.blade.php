@include('layout.inner2-header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <h5 class="mb-3">Franchise Registration</h5>
                    
               
                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    

                                     <form method="POST" action="{{ route('franchise.update', ['franchise' => $franchises->user_id]) }}" enctype="multipart/form-data">
 
                         @method('patch')
                        @csrf


                        <!-- Display error messages here -->
                }
                }
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
                                            <select name="franchise_country" class="form-control" value="{{ $franchises->country }}" required>
                                                <option value="india">India</option>
                                            </select>
                                            <label class="mt-4">STATE</label>
                                            <select name="franchise_state" class="form-control" value="{{ $franchises->state }}" required>
                                                <option>Select</option>
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
                                            <select name="franchise_city" class="form-control" value="{{ old('franchise_city') }}" required>
                                                <option>Select</option>
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
                <div class="form-group" style="flex-basis: 10%;">
                    <button style="border: solid 1px;border-radius:3px;color: rgb(246, 49, 49);"><i class="mdi  mdi-18px mdi-delete"></i></button>
                </div>
            </div>
        </div>
    @endforeach
@endif




                                            </div>

                                            <div><input type="button" class="link-btn" id="add-so"  value="+ Add More">
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
                                                        placeholder="Create Password" value="{{ $password }}" required>
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


    @include('layout.inner2-footer')