@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <p class="subhead mt-2">Update News</p>
                    <div class="row text-right">
                        <div class="col-xl-12 text-right">
                            <button style="color: white;background-color: #1F92D1;
                            border: none;border-radius: 5px; font-size: 15px;padding: 10px;" id="myBtn"><i
                                    class="mdi mdi-16px mdi-plus-circle-outline"></i><span
                                    style="margin-left: 5px;">Create
                                    News</span></button>
                        </div>
                    </div>
<!-- <form method="POST" action="{{ route('excel') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file">
    <button type="submit">Upload</button>
</form>

 <form method="POST" action="{{ route('state_excel') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file">
    <button type="submit">Upload</button>
</form> -->




 

                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color: #000; font-weight: bolder;">CREATE NEWS</h5>
                                <span class="close">&times;</span>
                            </div>
                            <div class="modal-body">
                                 <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">

                                @csrf
                                <div class="row mt-4">
                                    <div class="form-group col-xl-12">
                                        <label>TITLE *</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-xl-12">
                                        <label>SUB TITLE</label>
                                        <input type="text" name="sub_title" class="form-control" placeholder="Enter Sub Title">
                                    </div>
                                </div>
                                <input type="hidden" name="manager_id" value="{{auth()->user()->id}}">
                                <input name="news_type" type="hidden" value="all" class="form-control" placeholder="Enter First Name">
                                <div class="row mt-2">
                                    <div class="form-group col-xl-12">
                                        <label>DESCRIPTION *</label>
                                        <textarea class="form-control" placeholder="Enter Last Name" name="content" style="text-align: left;">
                                            </textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-xl-12">
                                        <label>UPLOAD ICON</label>
                                        <input type="file" name="icon[]" class="form-control" placeholder="Enter upload icon ">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="form-group col-xl-12 text-center mt-4">
                                        <input type="button" class="footer-btn" value="Clear">
                                        <input type="submit" class="footer-btn btn-active" value="Publish">

                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>

                     <script type="text/javascript">
               
                function deletefn(id){
    
    var id = id;
    var url = '{{ route("news.destroy", ":id") }}';
    url = url.replace(':id', id);

    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this news.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE', // Use DELETE method for deleting a resource
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        Swal.fire(
                            'Deleted!',
                            'news has been deleted.',
                            'success'
                        );
                        location.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            'Failed to delete news.',
                            'error'
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $(this).prop('checked', !$(this).is(':checked'));
        }
    });
}


           </script>

                    <p class="subhead mt-2"><i class="mdi mdi-24px mdi-update"></i>Recents</p>
                    <div class="row">
                        

                         @foreach ($news as $news)
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat ">

                                <div class="card-body mini-stat-img1">
                                    <div style="text-align: right;">
                                        <button style="border: solid 1px;border-radius: 5px;" onclick="deletefn({{$news->id}})" delete-id="{{ $news->id}}"><span
                                                            class="mdi mdi-delete"></span></button>
                                    </div>
                                    

                                    <div class="mini-stat-icon1">
                                        <i class='fas fa-laptop' style="background-color: #8fcaea;"></i>
                                    </div>
                                    <div class="text-black">
                                        <h5 class="card-title mb-4">{{ $news->title }}</h5>
                                        <div class="row mt-4">
                                            <p style="font-size: 12px;">{{ $news->content }}
                                            </p>
                                            <a href="" style="color: #1F92D1;">Know More>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        

                       

                      

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
           .mini-stat .mini-stat-img1 {
    height: auto;
    background-size: cover;
}
       </style>
@include('layout.footer')