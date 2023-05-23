@include('layout.inner-header')
 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <script type="text/javascript">
                        $(document).ready(function() {

                             var i=2;
                        }
                      
                        </script>


            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5>Course Finder</h5>
                        </div>

                        
                    </div>

                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-body">

                                 <form action="{{ route('course-finder.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                                <div class="row mt-4">
                                    <div class="form-group col-xl-12">
                                        <label>LABEL</label>
                                        <input name="label" type="text" class="form-control" placeholder="Enter Label" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>ADD EXTERNAL LINK</label>
                                        <input name="link" type="text" class="form-control" placeholder="Add Link" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="submit" class="pt-2 pb-2 pr-3 pl-3"
                                            style="border: none; border-radius: 5px; color: #fff; background-color: rgb(46, 44, 44);"
                                            value="Add Link">
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

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("course-finder");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        modal.style.display = "block";

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


    

    @include('layout.inner-footer')

