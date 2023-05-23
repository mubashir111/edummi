@include('layout.inner-header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Representative</h5>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button class="btn1" id="myBtn">Add New Representative</button>
                        </div>
                    </div>
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color: #000; font-weight: bolder;">ADD NEW REPRESENTATIVE</h5>
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('representatives.store') }}" method="post" enctype="multipart/form-data">

                                 @csrf
                                <div class="row mt-4">
                                    <div class="form-group col-xl-12">
                                        <label>NAME *</label>
                                        <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>DESIGNATION</label>
                                        <input name="designation"  type="text" class="form-control" placeholder="Enter Designation" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>BRANCH *</label>
                                        <input name="branch" type="text" class="form-control" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>UPLOAD PROFILE PICTURE *</label>
                                        <input name="profile[]"  type="file" class="form-control" placeholder="Enter Mobile Number " readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="button" class="footer-btn" value="Clear">
                                        <input type="submit" class="footer-btn btn-active" value="Add">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">

                         @foreach($representatives as $key => $representatives)

                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="card-body text-center mini-stat-img">
                                    <div class="">
                                        <img class="rounded-circle header-profile-user1" src="{{$representatives->url}}"
                                            alt="">
                                    </div>
                                    <div class="text-black">
                                        <h4 class="card-title">{{$representatives->name}}</h4>
                                        <h4 class="card-title">{{$representatives->designation}}</h4>
                                        <h4 class="card-title">({{$representatives->branch}})</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                       
                        
                    </div>
                </div>
            </div>
        </div>

         <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>


               <style>
           .text-right{text-align: right;}
       </style>

 @include('layout.inner-footer')