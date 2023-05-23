<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>EDUMMI</title>
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>


  <section class="login">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 bg-imageclr">
          <img src="assets/images/Artboard – 2.png" class="img-fluid " alt="">
        </div>
        <div class="col-lg-6 text-center py-5">
          <div class="spacing-top1">
            <h1>Forget Password</h1>
            <p>Enter Your Details to Reset Your Password</p>
          </div>
          <div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
          <Form action="{{ route('password.email') }}" method="post" >
             @csrf
            <div class="form-row pt-4">
              <div class="offset-1 col-lg-10">
                <input  name="email" type="email" class="inp px-3" placeholder="Enter Your Registered Mail Id">
              </div>
            </div>

            <div class="form-row py-2">
              <div class="offset-1 col-lg-10">
                <button type="submit" class="btn1">Send Mail</button>
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