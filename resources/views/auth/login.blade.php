<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>EDUMMI</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

 <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
     <!-- Firebase Core -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <!-- Other Firebase services -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <!-- Add more Firebase service scripts as needed -->

<script>
        var firebaseConfig = {
            apiKey: "AIzaSyBBxWIZ6gz8dCtanNzWWWdCdtUP7EB-wl4",
            authDomain: "eduimmicrm.firebaseapp.com",
            projectId: "eduimmicrm",
            storageBucket: "eduimmicrm.appspot.com",
            messagingSenderId: "96208178281",
            appId: "1:96208178281:web:db00bca679bfee277be6f8",
            measurementId: "G-GJL90N8E57"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging.requestPermission().then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                    $("input[name=csrf_token]").val(response);
                }).catch(function (error) {
                alert(error);
              
            });
        }
        messaging.onMessage(function (payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });

        startFCM();
    </script>


<body>
  <style type="text/css">
    
    
  </style>


  <section class="login">
    <div class="container">
      <div class="row mt-4" style="display: flex;
    align-items: center;">
        <div class="col-lg-6 bg-imageclr">
          <img src="{{ asset('assets/images/Artboard – 1.png') }}" class="img-fluid " alt="">
        </div>
        <div class="col-lg-6 text-center py-5">
          <div class="spacing-top">
            <h1>Login</h1>
            <p>Enter Your Details to Sign in to Your Account</p>
          </div>

          <Form action="{{ route('login-table') }}" method="post">

              <div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

            @csrf

            <div class=" input-group form-row py-3 pt-4">

              <div class="offset-1 col-lg-10">
                @error('email')
                <div class="invalid-feedback pb-5" style="display: block;">
                    <div>{{ $message }}</div>
                </div>
               @enderror
               
                <input type="text" id="login-email" name="email_check"  value="" class="inp px-3" placeholder="Enter Your Mail Id">

                
              </div>
            </div>

            <div class="form-row">
              <div class="offset-1 col-lg-10">
                <input type="password" autocomplete="new-password" class="inp px-3" name="password" placeholder="Enter Password">
              </div>
              <input type="hidden" name="csrf_token" value="">
              <a href="{{ route('resetpassword') }}" class="frgt-pswd">Forget Password?</a>
              
            </div>



            <div class="form-row py-3">
              <div class="offset-1 col-lg-10">
                <button class="btn1">Log in</button>
              </div>
            </div>
          </Form>
        </div>

      </div>
    </div>

  </section>
  




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
