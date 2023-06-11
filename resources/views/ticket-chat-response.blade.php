@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->


        <script>
            
            function statusChange(id,status){

                
            
        }
        </script>
        
        <div class="main-content1">
        
        

            <div class="page-content1">
                <div class="container-fluid1">

                        
                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <section class="msger">
                                <header class="msger-header">
                                    <div class="msger-header-title">
                                        {{$messages->user->name}} ({{$messages->user->role}})
                                    </div>
                                    <div class="msger-header-options">
                                        <span><i class='fas fa-bars'></i></span>
                                    </div>
                                </header>

                                

                                <main class="msger-chat">

                                     @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('success') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                 {{ session('error') }}
                            </div>
                            @endif

    
        <div class="msg left-msg">
            <div class="msg-bubble">
                <div class="msg-info">
                    <div class="msg-info-time">{{ $messages->created_at }}</div>
                </div>
                <div class="msg-text">
                    {{ $messages->content ?? '' }} <br>
                    @if ($messages->attachment)
                          <?php $extension = pathinfo($messages->attachment, PATHINFO_EXTENSION); ?>
    @switch($extension)
        @case('jpg')
        @case('jpeg')
        @case('png')
        @case('webp')
        @case('gif')
         <a href="../{{ $messages->attachment }}" target="_blank">
            <img src="{{ asset($messages->attachment) }}" class="img-fluid" style="max-width:320px;">
            </a>
            @break
        @case('pdf')
            <!-- Display PDF icon or link -->
            <a href="../{{ $messages->attachment }}" target="_blank">View PDF ({{ $messages->attachment }})</a>
            @break
        @case('csv')
            <!-- Display CSV icon or link -->
            <a href="../{{ $messages->attachment }}" target="_blank">View CSV ({{ $messages->attachment }})</a>
            @break
        @case('xls')
        @case('xlsx')
            <!-- Display Excel icon or link -->
            <a href="../{{ $messages->attachment }}" target="_blank">View Excel ({{ $messages->attachment }})</a>
            @break
        @default
            <!-- Display generic document icon or link -->
            <a href="../{{ $messages->attachment }}" target="_blank">View Document ({{ $messages->attachment }})</a>
    @endswitch
                  
                     


                    @endif

                       <div>
                           
                           
                           <a href="{{ route('tokenstatuschange', ['id' => $messages->id, 'status' => 1]) }}"> <span  
                             class="badge  bg-success">Verified</span></a>

                             <a href="{{ route('tokenstatuschange', ['id' => $messages->id, 'status' => 2]) }}">
                            <span  class="badge  bg-warning">Pending</span></a>

                            <a href="{{ route('tokenstatuschange', ['id' => $messages->id, 'status' => 3]) }}">
                            <span  class="badge  bg-danger">Rejected</span> <a>
                            
                            
                        </div>  
                </div>
            </div>
        </div>

       @if ($messages->response_message != null || $messages->response_attachment != null)
    <div class="msg right-msg"  messege_id="{{$messages->id}}">
        <div class="msg-bubble">
            <div class="msg-info">
                <div class="msg-info-time">{{ $messages->updated_at }}</div>
            </div>
            <div class="msg-text">
                

                @if ($messages->response_message !==null)
    @foreach (json_decode($messages->response_message) as $message)
        {{ $message }} <br>
    @endforeach
@endif

                @if ($messages->response_attachment !==null)
  @foreach (json_decode($messages->response_attachment) as $response_attachment)
    <?php $extension = pathinfo($response_attachment, PATHINFO_EXTENSION); ?>
   
    @switch($extension)
        @case('jpg')
        @case('jpeg')
        @case('png')
        @case('webp')
        @case('gif')
         <a href="../{{ response_attachment }}" target="_blank">
            <img src="{{ asset($response_attachment) }}" class="img-fluid" style="max-width:320px;">
            </a>
            @break
        @case('pdf')
            <!-- Display PDF icon or link -->
            <a href="../{{ $response_attachment }}" target="_blank">View PDF ({{ $response_attachment }})</a>
            @break
        @case('csv')
            <!-- Display CSV icon or link -->
            <a href="../{{ $response_attachment }}" target="_blank">View CSV ({{ $response_attachment }})</a>
            @break
        @case('xls')
        @case('xlsx')
            <!-- Display Excel icon or link -->
            <a href="../{{ $response_attachment }}" target="_blank">View Excel ({{ $response_attachment }})</a>
            @break
        @default
            <!-- Display generic document icon or link -->
            <a href="../{{ $response_attachment }}" target="_blank">View Document ({{ $response_attachment }})</a>
    @endswitch
    <br>

     @endforeach

                    
                @endif
            </div>
        </div>
    </div>
@endif

  
</main>


                                <form class="msger-inputarea">
                                <input type="text" class="msger-input" placeholder="Enter your message...">
                                <label for="file-input" class="msger-send-btn"><i class="mdi mdi-24px mdi-paperclip"></i></label>
                                <input id="file-input" type="file"  style="display: none;">
                                <span id="file-name" style="display: flex;
                                    flex-direction: column;
                                    justify-content: center;"></span>
                                <button type="submit" class="msger-send-btn1"><i class="mdi mdi-24px mdi-telegram"></i></button>
                            </form>

                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
$(document).ready(function() {
  const msgerForm = $(".msger-inputarea");
  const msgerInput = $(".msger-input");
  const msgerChat = $(".msger-chat");

  const BOT_MSGS = [
    "Hi, how are you?",
    "Ohh... I can't understand what you're trying to say. Sorry!",
    "I like to play games... But I don't know how to play!",
    "Sorry if my answers are not relevant. :))",
    "I feel sleepy! :("
  ];

  const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
  const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
  const BOT_NAME = "BOT";
  const PERSON_NAME = "Sajad";

  msgerForm.on("submit", function(event) {
    event.preventDefault();
   console.log(msgerForm);
    const formData = new FormData();
    const message = msgerInput.val();
    const fileInput = document.getElementById("file-input");
    const file = fileInput.files[0];
    
    formData.append("message", message);
    if (file) {
      formData.append("file", file);
    }


    formData.append("_token", '{{ csrf_token() }}');
    formData.append("_method", "PATCH");

    saveMessage(formData); // Save message to the server

    appendMessage(PERSON_NAME, PERSON_IMG, "right", message, file);
    msgerInput.val("");
    fileInput.value = "";
     //location.reload();

    //botResponse();
  });

  function saveMessage(formData) {


    $.ajax({
     url: '{{ route("tokens.update", $messages->id) }}',
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // Handle the response if needed
        location.reload();
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

    msgerChat.append(msgHTML);
    msgerChat.scrollTop(msgerChat[0].scrollHeight);
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


  function botResponse() {
    const r = random(0, BOT_MSGS.length - 1);
    const msgText = BOT_MSGS[r];
    const delay = msgText.split(" ").length * 100;

    setTimeout(function() {
      appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
    }, delay);
  }

  function formatDate(date) {
    const h = ("0" + date.getHours()).slice(-2);
    const m = ("0" + date.getMinutes()).slice(-2);

    return `${h}:${m}`;
  }

  function random(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
  }
});
</script>

<script type="text/javascript">
    
    $(".right-msg").on("click",function(e){
        e.preventDefault();
        console.log("hello");

        var message_id =$(this).attr('messege_id');
        var url = '{{ route("tokens.edit", [":message_id"]) }}';
            url = url.replace(':message_id', message_id);

          Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete this message.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: message_id
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.status === 'success') {
                            window.location.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to update status.',
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
    });

</script>


    </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="../assets/libs/jquery/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/libs/node-waves/waves.min.js"></script>
    <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/ajax.js"></script>

</body>

</html>