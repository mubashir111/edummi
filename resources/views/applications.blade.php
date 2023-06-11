@include('layout.header')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="main-content">

	<div class="page-content">
		<div class="container-fluid">
			<ul class="nav nav-pills mb-4 pf3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link  mr-5" id="pills-home-tab" type="button" role="tab"
					    aria-selected="true" onclick="window.location.href='{{ route('manage-students.edit', ['manage_student' => $students->id]) }}'">Profile</button>

				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link mr-5" id="pills-profile-tab"  type="button" role="tab" aria-controls="pills-profile"
					onclick="window.location.href = '{{ route("document.edit", ["id" =>$students->id]) }}'">Documents</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="pills-contact-tab"  type="button" role="tab" aria-controls="pills-contact" onclick="window.location.href = '{{ route("application.edit", ["id" =>$students->id]) }}'" 
					>Applications</button>
				</li>
			</ul>



<div class="row">
					<form method="POST" action="{{ route('manage-students.update', ['manage_student' => $students->student_id]) }}" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="col-xl-12 col-sm-12">
							<div class="card mini-stat ">
								<div class="card-body mini-stat-img2" style="border-radius: 5px;">
									<p style="color: #fff;">Welcome to Application Lorem Ipusam</p>
									<div class="row">
										<div class="form-group col-xl-4">
											<label style="color: #fff;">NAME</label>
											<input type="text" name="name" value="{{$students->name}}" class="form-control" placeholder="Name" readonly>
										</div>

										<div class="form-group col-xl-4">
											<label style="color: #fff;">Email</label>
											<input type="email" name="email" value="{{$students->email}}" class="form-control" placeholder="Email" readonly>
										</div>

										<div class="form-group col-xl-3">
											<label style="color: #fff;">PHONE</label>
											<input type="text" name="phone"  value="{{$students->phone}}" class="form-control" placeholder="Phone Number" readonly>
										</div>

										<div class="form-group col-xl-1">
											<label style="color: #1F92D1;">dgg</label>
											<button class="form-control edit-btn"><i
												class='fas fa-pencil-alt'></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


	<ul class="nav nav-pills mb-3 pf2" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation" style="width: 50%;">
			<button class="nav-link active mr-3 sub-btn2" id="pills-apply-tab"
			data-bs-toggle="pill" data-bs-target="#pills-apply" type="button" role="tab"
			aria-controls="pills-apply" aria-selected="true">Apply To Programs</button>
		</li>
		<li class="nav-item" role="presentation" style="width: 50%;">
			<button class="nav-link mr-3 sub-btn3" id="pills-applied-tab" data-bs-toggle="pill"
			data-bs-target="#pills-applied" type="button" role="tab"
			aria-controls="pills-applied" aria-selected="false">Applied Programs</button>
		</li>
	</ul>

	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-apply" role="tabpanel"
		aria-labelledby="pills-apply-tab">

		<div class="row mt-4">
			<div class="col-xl-12 col-sm-12">
				<div class="card mini-stat ">
					<div class="card-body mini-stat-img" style="border-radius: 5px;">


						<div class="row">
							<div class="form-group col-xl-3">
								<label>YEAR</label>
								<input type="year" name="request_application_year" value="" class="form-control" placeholder="" required>

								
							</div>
							<div class="form-group col-xl-3">
								<label>INTAKE</label>
								<label>GENDER *</label>
													<Select class="form-control" name="request_aplication_intake"  required>
														<option>Select</option>
														@foreach($intakes as $intake)
														<option value="{{ $intake->name }}" selected>{{ $intake->name }}</option>
														

														@endforeach
													</Select>
								
								
							</div>
							<div class="form-group col-xl-3">
								<label>UNIVERSITY NAME</label>
								<input type="text" name="request_university_name" value="" class="form-control" placeholder="" required="">
								
							</div>
							<div class="form-group col-xl-3">
								<label>COURSE NAME</label>
								<input type="text" name="request_course_name" value="" class="form-control" placeholder="" required="">
								
							</div>
						</div>

						<div class="row">
							<div class="form-group col-xl-12 text-center mt-4">
								<input id="application-btn" class="footer-btn btn-active" value="Save" style="text-align: center;">
							</div>
						</div>

						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
						<script>
	$(document).ready(function() {
		$('#application-btn').click(function() {
			// Get the values of the input fields
			var year = $('input[name="request_aplication_year"]').val();
			var intake = $('select[name="request_aplication_intake"]').val();
			var universityName = $('input[name="request_university_name"]').val();
			var courseName = $('input[name="request_course_name"]').val();

			// Check if any field is empty
			if (year === '' || intake === '' || universityName === '' || courseName === '') {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Please fill in all the fields!',
				});
				return; // Exit the function if any field is empty
			}

			// Create an object with the data to be sent
			var data = {
				year: year,
				intake: intake,
				universityName: universityName,
				courseName: courseName,
				_token: '{{ csrf_token() }}',
				student_id: '{{ $students->id }}'
			};

			// Perform AJAX call
			$.ajax({
				url: '{{ route("manage-students.newapplication") }}', // Replace with your actual URL
				method: 'POST', // Replace with your desired HTTP method
				data: data,
				success: function(response) {
					// Handle successful response
					console.log(response);

					Swal.fire(
						'Success!',
						'Application added successfully.',
						'success'
					);
					location.reload();
				},
				error: function(xhr, status, error) {
					// Handle error
					console.log(error);
					alert('AJAX call failed!');
				}
			});
		});
	});
</script>

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
		</div>

	</div>
	<div class="tab-pane fade" id="pills-applied" role="tabpanel"
	aria-labelledby="pills-applied-tab">

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
                                            <div class="col-xl-5">
                                                <h5 class="text-right">{{ $application->updated_at }}</h5>
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

						.application-row {
						    padding: 17px;
						    margin-bottom: 15px;
						    width: 109%;
						    left: -7px;
						    transform: translateY(-19px);
						}


					</style>
					

					


					<script>
						$(document).ready(function () {
							$('.application_edit_btn').on('click', function (e) {
								var id = $(this).attr('edit_id');

								var url = '{{ route("manage-students.edit_aplications") }}';

								Swal.fire({
									title: 'Are you sure?',
									text: 'You are about to delete this application.',
									icon: 'warning',
									showCancelButton: true,
									confirmButtonText: 'Yes, delete it!',
									cancelButtonText: 'No, cancel!',
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											type: 'POST',
											url: url,
											data: {
												_token: '{{ csrf_token() }}',
												id: id
											},
											success: function (response) {
												console.log(response);


												Swal.fire(
													'Deleted!',
													'Application has been deleted.',
													'success'
													);

												location.reload();

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



							function loadIndividualApplication(id) {
								var url = '{{route("tokens.store")}}';

// Make an AJAX request to fetch the individual application data
								$.ajax({
									type: 'GET',
									url: url,
									data: {
										id: id
									},
									success: function (data) {
// Update the content of the individual application container
										$('#Individual_application').html(data);
									},
									error: function (xhr, status, error) {
										console.log(xhr.responseText);
									}
								});
							}

						});

					</script> 

					 




<!-- <div class="row">
<div class="col-xl-8">
<h5 style="color: #1F92D1;">456789/22-23</h5>
<p style="font-size: 14px;" class="mt-1">Course Name</p>
<p style="font-size: 14px;">University Name</p>
</div>
<div class="col-xl-4">
<h5 class="text-right">DD/MM/YY 00:00AM</h5>
</div>
</div>

<div class="row">
<div class="col-xl-8">
<h5 style="color: #1F92D1;">456789/22-23</h5>
<p style="font-size: 14px;" class="mt-1">Course Name</p>
<p style="font-size: 14px;">University Name</p>
</div>
<div class="col-xl-4">
<h5 class="text-right">DD/MM/YY 00:00AM</h5>
</div>
</div>

<div class="row">
<div class="col-xl-8">
<h5 style="color: #1F92D1;">456789/22-23</h5>
<p style="font-size: 14px;" class="mt-1">Course Name</p>
<p style="font-size: 14px;">University Name</p>
</div>
<div class="col-xl-4">
<h5 class="text-right">DD/MM/YY 00:00AM</h5>
</div>
</div> -->

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

                                        <div class="row mb-5" style="max-height: 61vh;overflow-y: scroll;">
                                            <div class="col-xl-12">
                                                  
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

</div>


</div>
</div>

<script type="text/javascript">


	$(".edit-btn").on("click",function(e){
// Find the input fields you want to make readonly
		e.preventDefault();
		var inputs = $(this).closest(".row").find("input, textarea");

		$(inputs).removeAttr("readonly");
	});

</script>

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
                        <div class="col-xl-6" >
                            <h5>{{ $single_application->application_id }}</h5>
                            <input type="hidden" id="application_id" value="{{ $single_application->id }}">
                            <h5 style="color: #1F92D1;">{{ $single_application->intake }}</h5>
                            <p style="font-size: 14px;" class="mt-1">{{ $single_application->course }}</p>
                            <p style="font-size: 14px;">{{ $single_application->university_name }}</p>
                        </div>
                        <div class="col-xl-6">
                            <h5 class="text-right mb-5" style="color: #1F92D1;">{{ $single_application->statusview->description }}</h5>
                            @php $date = date('Y-m-d', strtotime($single_application->created_at));
  @endphp
                            <p class="text-right" style="font-size: 14px;">{{ $date }}</p>
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
$('#file-name').text('');

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










</form>
</div>

</div>





<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
<!-- <script src="{{asset('assets/js/ajax.js')}}"></script> -->




</body>

</html>