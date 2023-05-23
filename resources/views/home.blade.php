@include('layout.header')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <h5>Dashboard</h5>

                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Leads</h6>
                                        <h2> 123 </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Application</h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Applications Submitted
                                        </h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white"> Applications Rejected
                                        </h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Documentation Pending
                                        </h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Waiting For Offer Latter
                                        </h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Follow Up</h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-airplane mdi-rotate-45 float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">visa Rejected</h6>
                                        <h2>123</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">


                       @foreach ($news as $news)
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img1">
                                    <div class="mini-stat-icon1">
                                        <i class='fas fa-laptop' style="background-color: #8fcaea;"></i>
                                    </div>
                                    <div class="text-black">
                                        <h5 class="card-title mb-4">{{ $news->title }}</h5>
                                        <div class="row mt-4">
                                            <p style="font-size: 12px;">{{ $news->content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach

                        

                      

                       

                    </div>

                    
                    <!-- end row -->
                    <div class="row">


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

                <style type="text/css">
                     .mini-stat .mini-stat-img1 {
    height: auto;
    background-size: cover;
}
                </style>
                <!-- end row -->
@include('layout.footer')
