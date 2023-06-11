@include('layout.header')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-view',$students->id)}}"><input type="button" value="Profile"
                                    class="btn-ma "></a>
                        </div>
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-document',$students->id)}}"><input type="button" value="Documents"
                                    class="btn-ma"></a>
                        </div>
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-application',$students->id)}}"><input type="button" value="Applications"
                                    class="btn-ma btn-active"></a>
                        </div>

                         <div class="col-xl-2 mb-4">
                            <a href="{{ route('verified-tests.edit', ['id' => $students->id]) }}"><input type="button" value="Tests"
                                    class="btn-ma"></a>
                        </div>

                        
                    </div>

                        <div class="row mt-4">
                            <div class="col-xl-5 col-sm-5">
                                <div class="card mini-stat ">
                                    <div class="card-body " style="border-radius: 5px;">

                                        @php
                                        $i = 0;
                                        @endphp

                                        @foreach($students->application as $application)
                                        <div class="row application-row {{ $i === 0 ? 'application-active' : '' }}" onclick="dynamicapplication({{$application->id}})">

                                            <div class="col-xl-7">
                                                <h5 style="color: #1F92D1;">{{ strval($application->application_id) }}</h5>
                                                <p style="font-size: 14px;" class="mt-1">{{ $application->course }}</p>
                                                <p style="font-size: 14px;">{{ $application->university_name }}</p>
                                            </div>
                                            <div class="col-xl-4">
                                                <h5 class="text-right">{{ $application->updated_at }}</h5>
                                            </div>
                                            <div class="col-xl-1 application_edit_btn" edit_id="{{ $application->id }}">
                                                <i class="mdi mdi-18px mdi-delete" style="color:red"></i>
                                            </div>
                                        </div>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach


                                        <style>
                                            .application-active {
                                                background-color: #ade1fd;
                                                position: relative;

                                            }

                                            .application-row{
                                                padding: 17px;
                                                margin-bottom: 15px;

                                            }


                                        </style>

                                        <script>
                                            $(document).ready(function() {
                                                $('.application-row').click(function() {
                                                    $('.application-row').removeClass('application-active');
                                                    $(this).addClass('application-active');
                                                });
                                            });
                                        </script>

                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-7 col-sm-7">
                                <div class="card mini-stat ">
                                    <div class="mini-stat-img">
                                        <header class="app-status-applctn">
                                            <div class="row" style="padding: 2%;" id="single_application">
                                                <div class="col-xl-9">
                                                    <h5>456789/22-23</h5>
                                                    <h5 style="color: #1F92D1;">DD/MM/YY 00:00AM</h5>
                                                    <p style="font-size: 14px;" class="mt-1">Course Name</p>
                                                    <p style="font-size: 14px;">University Name</p>
                                                </div>
                                                <div class="col-xl-3">
                                                    <h5 class="text-right mb-5" style="color: #1F92D1;">Application Status
                                                    </h5>
                                                    <p class="text-right" style="font-size: 14px;">Month-YYYY</p>
                                                </div>
                                            </div>
                                        </header>

                                        <div class="row mb-5" style="padding: 2%;">
                                            <div class="col-xl-12" style="margin-bottom: 210px;">
                                                  
                                                  <main class="msger-chat" >
                                                 
                                          </main>

                                            </div>

                                        </div>

                                        <div class="row" style="padding: 2%;">
                                            <div style="display: flex;">
                                                <div class="" style="flex-basis: 10%;">
                                                    <img class="rounded-circle header-profile-user"
                                                    src="{{asset('assets/images/users/user-4.jpg')}}" alt="Header Avatar">
                                                </div>
                                                <div class="" style="flex-basis: 80%;">
                                                   <input type="text" class="form-control msger-input"
                                placeholder="Enter Massage Here">
                                                </div>
                                                <div class="" style="display:flex; flex-basis: 10%;">
                                                    
                                                        <label for="file-input" class="form-control msger-send-btn"  style="font-size: 20; border: none;margin-bottom: 0px;margin-right: 10px;"><i class="fa fa-paperclip"></i></label>
                                <input id="file-input" type="file"  style="display: none;">
                                 <span id="file-name" style="display: flex;
                                    flex-direction: column;
                                    justify-content: center;"></span>

                                                       <div class="form-control"
                                style="border: none; background-color: #1F92D1; color: #fff; cursor: pointer;"
                                onclick="myFunction(event)">
                                <i class="mdi mdi-send"></i>
                            </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <script type="text/javascript">
    $(document).ready(function() {
    $('#file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $('#file-name').text(fileName);
        } else {
            $('#file-name').text('');
        }
    });
});

</script>


                    <script>
    // Assign the PHP variable to a JavaScript variable
    var applicationIds = @json($students->application->pluck('id'));
    var defaultId = applicationIds.length > 0 ? applicationIds[0] : null;
    dynamicapplication(defaultId);

    function dynamicapplication(id) {
        // Check if the id exists in the array of applicationIds
        if (applicationIds.includes(id)) {
            @foreach($students->application as $single_application)
                if ({{ $single_application->id }} == id) {
                    var single_application_test = `
                        <div class="col-xl-9" >
                            <h5>{{ $single_application->application_id }}</h5>
                            <input type="hidden" id="application_id" value="{{ $single_application->id }}">
                            <h5 style="color: #1F92D1;">{{ $single_application->created_at }}</h5>
                            <p style="font-size: 14px;" class="mt-1">{{ $single_application->course }}</p>
                            <p style="font-size: 14px;">University Name</p>
                        </div>
                        <div class="col-xl-3">
                            <h5 class="text-right mb-5" style="color: #1F92D1;">{{ $single_application->status }}</h5>
                            <p class="text-right" style="font-size: 14px;">{{ $single_application->created_at }}</p>
                        </div>
                    `;
                    $("#single_application").html(single_application_test);
                }
            @endforeach
 

            var chatbox = ''; // Initialize the chatbox variable outside the loop

@foreach($students->application as $single_application1)
      if ({{ $single_application1->id }} == id) {
     @foreach($single_application1->chat as $applicationchat)
    @if($applicationchat->sender_id == auth()->user()->id ) 
        chatbox += `<div class="msg right-msg" messege_id="{{$applicationchat->id}}">
                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-time">{{ $applicationchat->created_at }}</div>
                            </div>
                            <div class="msg-text">
                                {{ $applicationchat->sender_message ?? '' }}



                                @if ($applicationchat->attachment)
    <?php $extension = pathinfo($applicationchat->attachment, PATHINFO_EXTENSION); ?>
    @switch($extension)
        @case('jpg')
        @case('jpeg')
        @case('png')
        @case('webp')
        @case('gif')
         <a href="../{{ $applicationchat->attachment }}" target="_blank">
            <img src="../{{ $applicationchat->attachment }}" class="img-fluid" style="max-width: 220px;">
            </a>
            @break
        @case('pdf')
            <!-- Display PDF icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View PDF ({{ $applicationchat->attachment }})</a>
            @break
        @case('csv')
            <!-- Display CSV icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View CSV ({{ $applicationchat->attachment }})</a>
            @break
        @case('xls')
        @case('xlsx')
            <!-- Display Excel icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View Excel ({{ $applicationchat->attachment }})</a>
            @break
        @default
            <!-- Display generic document icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View Document ({{ $applicationchat->attachment }})</a>
    @endswitch
@endif


                            </div>
                        </div>
                    </div>`;
    @else
        chatbox += `<div class="msg left-msg">
                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-time">{{ $applicationchat->created_at }}</div>
                            </div>
                            <div class="msg-text">
                                {{ $applicationchat->sender_message ?? '' }}
                               @if ($applicationchat->attachment)
    <?php $extension = pathinfo($applicationchat->attachment, PATHINFO_EXTENSION); ?>
    @switch($extension)
        @case('jpg')
        @case('jpeg')
        @case('png')
        @case('webp')
        @case('gif')
            <img src="../{{ $applicationchat->attachment }}" class="img-fluid" style="max-width: 220px;">
            @break
        @case('pdf')
            <!-- Display PDF icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View PDF</a>
            @break
        @case('csv')
            <!-- Display CSV icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View CSV</a>
            @break
        @case('xls')
        @case('xlsx')
            <!-- Display Excel icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View Excel</a>
            @break
        @default
            <!-- Display generic document icon or link -->
            <a href="../{{ $applicationchat->attachment }}" target="_blank">View Document</a>
    @endswitch
@endif


                            </div>
                        </div>
                    </div>`;
    @endif
@endforeach
}
@endforeach


$(".msger-chat").html(chatbox); // Append the chatbox variable to the .msger-chat element

        }
    }
</script>




                        <script>
    function myFunction(event) {
        event.preventDefault();

        console.log("hhel");
        const formData = new FormData();
        const message = $(".msger-input").val();
        const fileInput = document.getElementById("file-input");
        const file = fileInput.files[0];
         
        const application_id =  $("#application_id").val();

        formData.append("application_id", application_id);
        formData.append("message", message);
        if (file) {
            formData.append("file", file);
        }
        console.log(message);

        formData.append("_token", '{{ csrf_token() }}');

        saveMessage(formData); // Save message to the server

        appendMessage("Sajad", "https://image.flaticon.com/icons/svg/145/145867.svg", "right", message, file);
        $(".msger-input").val("");
        fileInput.value = "";
    }

    function saveMessage(formData) {
        $.ajax({
            url: '{{ route("application-chat.store") }}',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
// Handle the response if needed
            },
            error: function(error) {
// Handle the error if needed
            }
        });
    }

    function appendMessage(name, img, side, text, file) {
    const msgHTML = `
        <div class="msg ${side}-msg">
            <div class="msg-bubble">
                <div class="msg-info">
                    <div class="msg-info-time">${formatDate(new Date())}</div>
                </div>
                <div class="msg-text">${text}</div>
                ${file ? getAttachmentHTML(file) : ""}
            </div>
        </div>
    `;

    $(".msger-chat").append(msgHTML);
    $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
}

function getAttachmentHTML(file) {
    const fileExtension = file.name.split('.').pop().toLowerCase();

    switch (fileExtension) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'webp':
        case 'gif':   
            return `<a href="${URL.createObjectURL(file)}" target="_blank"><img src="${URL.createObjectURL(file)}" alt="attachment" class="msg-attachment" style="max-width:220px"></a>`;
        case 'pdf':
            return `<a href="${URL.createObjectURL(file)}" target="_blank">View PDF</a>`;
        case 'csv':
            return `<a href="${URL.createObjectURL(file)}" target="_blank">View CSV</a>`;
        case 'xls':
        case 'xlsx':
            return `<a href="${URL.createObjectURL(file)}" target="_blank">View Excel</a>`;
        default:
            return `<a href="${URL.createObjectURL(file)}" target="_blank">View Document</a>`;
    }
}


    function formatDate(date) {
        const h = ("0" + date.getHours()).slice(-2);
        const m = ("0" + date.getMinutes()).slice(-2);

        return `${h}:${m}`;
    }

    function random(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
</script>

<!-- <footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
©
<script>document.write(new Date().getFullYear())</script> EDUMMI UNIVERSE <span
class="d-none d-sm-inline-block"> by GREENWORLD International</span>
</div>
</div>
</div>
</footer> -->
</div>

</div>

<style>
    .text-right{text-align: right;}
    th{
        text-align:left !important;
    }
</style>



@include('layout.footer')