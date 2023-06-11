@include('layout.header')
 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

          


            <div class="page-content p-0">
                <div class="container-fluid p-0">
                    <!-- <div class="row">
                        <div class="col-xl-12">
                            <h5>Course Finder</h5>
                        </div>

                        
                    </div> -->

               @if (!is_null($url))
    <iframe id="coursefinder_iframe" src="{{ $url}}" style="width: 100%; height: 100vh;"></iframe>
@else
    <p>The URL is invalid or not available.</p>
@endif


                    

                </div>
            </div>
        </div>

    </div>

    </div>

   


    

    @include('layout.footer')

