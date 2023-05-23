@include('layout.inner2-header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <h5 class="mb-3">User Profile</h5>

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img" style="border-radius: 5px;">
                                    <form action="{{ route('profile.update', ['profile' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                                    <div class="row">
                                        <div class="col-xl-12">
                                             @if (!empty($profile->profile_url))
                                                         
                                                           <img class="rounded-circle" src="../../{{$profile->profile_url}}" id="profile-picture-preview" alt="" style="max-width: 160px;">
                                                        @else
                                                            
                                                             <img id="profile-picture-preview" class="rounded-circle" src="../../assets/images/users/user-4.jpg" alt="" style="max-width: 160px;">
                                                        @endif
                                            
                                            <div class="mt-3 ml-3">
                                                <div class="footer-btn" style="position:relative;">
                                                    <span style="text-align: center;
                                                            position: absolute;
                                                            left: 12px;
                                                            top: 6px;">Upload Picture</span>
                                                <input type="file" name="profile[]"  id="profile-image-upload"  value="" style="opacity: 0; position: absolute;left: 0px;">
                                                </div>
                                                
                                            </div>

                                            

                                        </div>
                                    </div>

                                  

                                    <div class="row mt-3">
                                        <div class="form-group col-xl-6">
                                            <label>YOUR NAME *</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$profile->name}}">
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>YOUR PHONE *</label>
                                            <input type="number" name="number" class="form-control" placeholder="Enter Number" value="{{$profile->phone_number}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>YOUR ADDRESS</label>
                                            <textarea class="form-control" style="height: 125px;"
                                                placeholder="Enter Destination" name="address">{{$profile->address}}</textarea>
                                            </textarea>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>YOUR EMAIL *</label>
                                            <input type="email" class="form-control" placeholder="Enter Name" name="email" value="{{$profile->email}}">
                                            <label class="mt-3">YOUR PASSWORD *</label>
                                            <input type="password" class="form-control"
                                                placeholder="Enter Company Name" name="password" value="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label>GENDER</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label>EMAIL NOTIFICATION</label>
                                            <div>
                                                <label class="radio-inline mr-5">
                                                    <input type="radio" name="optradio" checked>Enable
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio">Disable
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-xl-12 text-right mt-4">
                                            <input type="submit" class="pr-5 pl-5 pt-2 pb-2"
                                                style="background-color: green;color: white;border: none;border-radius: 5px;"
                                                value="Update">
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

      <style>
           .text-right{text-align: right;}
       </style>


       <script>
    $(document).ready(function() {
       
          $('#profile-image-upload').on('change', function() {
  var file = $(this).get(0).files[0];
  var reader = new FileReader();
  reader.onload = function() {
    $('#profile-picture-preview').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
});
      });

</script>

</div>
</div>
</body>
</html>