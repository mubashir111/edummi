@include('layout.header')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">


	 <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="color: #000; font-weight: bolder;">EDIT ACADEMIC QUALIFICATION</h5>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
           
        </div>
    </div>
</div>

	<div class="page-content">
		<div class="container-fluid">

			<ul class="nav nav-pills mb-4 pf3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active  mr-5" id="pills-home-tab" type="button" role="tab"
					    aria-selected="true" onclick="window.location.href='{{ route('manage-students.edit', ['manage_student' => $students->id]) }}'">Profile</button>

				</li>

				<li class="nav-item" role="presentation">
					<button class="nav-link mr-5" id="pills-profile-tab"  type="button" role="tab" aria-controls="pills-profile"
					onclick="window.location.href = '{{ route("document.edit", ["id" =>$students->id]) }}'">Documents</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link " id="pills-contact-tab"  type="button" role="tab" aria-controls="pills-contact" onclick="window.location.href = '{{ route("application.edit", ["id" =>$students->id]) }}'" 
					>Applications</button>
				</li>
			</ul>
			  
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
				aria-labelledby="pills-home-tab">
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

						<ul class="nav nav-pills mb-3 pf1" id="pills-tab" role="tablist">
							    <li class="nav-item" role="presentation">
							        <button class="nav-link  mr-3 sub-btn" type="button" role="tab" aria-selected="false"
							            onclick="window.location.href='{{ route('manage-students.edit', ['manage_student' => $students->id]) }}'">
							            Personal Information
							            <p>Incomplete</p>
							        </button>
							    </li>
							    <li class="nav-item" role="presentation">
							        <button class="nav-link active mr-3 sub-btn1" type="button" role="tab" aria-selected="true"
							            onclick="window.location.href='{{ route('academic-qualification.edit', ['id' => $students->id]) }}'">
							            Academic Qualification
							            <p>Incomplete</p>
							        </button>
							    </li>
							    <li class="nav-item" role="presentation">
							        <button class="nav-link mr-3 sub-btn1" type="button" role="tab" aria-selected="false"
							            onclick="window.location.href='{{ route('work-experience-edit', ['id' => $students->id]) }}'">
							            Work Experience
							            <p>Incomplete</p>
							        </button>
							    </li>
							    <li class="nav-item" role="presentation">
							        <button class="nav-link mr-2 sub-btn1" id="pills-test-tab" type="button" role="tab" aria-selected="false"
							            onclick="window.location.href='{{ route('tests.edit', ['id' => $students->id]) }}'">
							            Tests
							            <p>Incomplete</p>
							        </button>
							    </li>
							</ul>
						
						

						<p class="subhead mt-3">Personal Information</p>


						<div id="educationFormContainer">


							<!-- Dynamically added rows -->
							<section id="dynamicRowsContainer">
								<!-- Rows will be appended here -->
								<div class="row ">
									<div class="col-xl-6 col-sm-6">
										<div class="card mini-stat ">
											<div class="card-body mini-stat-img" style="border-radius: 5px;">
												<div class="row">
													<div class="form-group col-xl-6">
														<label>COUNTRY EDUCATION *</label>
														<input type="text" class="form-control" name="academic_education_country"
														value="">
													</div>

													<div class="form-group col-xl-6">
														<label>HIGHEST LEVEL OF EDUCATION</label>
														<input type="text" class="form-control" name="educationData"
														value="">
													</div>

													<div class="form-group col-xl-12 text-center mt-4">
														<button type="button" id="country_education_btn" class="footer-btn btn-active" style="width: 150px;" id="addRowBtn">
															Add Education
														</button>
													</div>
												</div>
												<script>
													$(document).ready(function() {
														$('#country_education_btn').click(function() {
// Get the values of the input fields
															var country_education = $('input[name="academic_education_country"]').val();
															var education_level = $('input[name="educationData"]').val();

// Check if the input fields are filled
															if (country_education.trim() === '') {
																alert('Please enter the country education.');
																return;
															}

															if (education_level.trim() === '') {
																alert('Please enter the education level.');
																return;
															}

// Create an object with the data to be sent
															var data = {
																country_education: country_education,
																education_level: education_level,
																_token: '{{ csrf_token() }}',
																student_id: '{{ $students->id }}'
															};

// Perform AJAX call
															$.ajax({
url: '{{ route("manage-students.country_education") }}', // Replace with your actual URL
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
                                                  




                       





                    <script type="text/javascript">

                    	function showModal(id) {
                    		$.ajax({
                    			url: '{{ route('academic-qualification.show') }}',
                    			method: 'POST',
                    			data: {
                    				_token: '{{ csrf_token() }}',
                    				academic_qalification_id: id,
                    			},
                    			success: function(response) {
                    				var Formdiv = `<form method="POST" action="{{ route('academic-qalification.update') }}" enctype="multipart/form-data">
                    				@csrf
                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>COUNTRY EDUCATION *</label>
                    				<input type="text" name="country_education" class="form-control" placeholder="Enter Department Name" required value="${response.response.institution}">
                    				</div>
                    				</div>
                    				<input type="hidden" name="edit_id" value="${response.response.id}" >

                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>HIGHEST LEVEL OF EDUCATION</label>
                    				<input type="text" name="education_level" class="form-control" placeholder="Enter Department Name" required value="${response.response.qualification}">
                    				</div>
                    				</div>

                    				<div class="row">
                    				<div class="form-group col-xl-12 text-center mt-4">
                    				<input type="submit" class="footer-btn btn-active" value="Update">
                    				</div>
                    				</div>
                    				</form>`;

                    				$('#myModal .modal-body').html(Formdiv);

// Show the modal
                    				$('#myModal').css('display', 'block');
                    			},
                    			error: function(xhr, status, error) {
// Handle error if needed
                    				console.log(error);
                    			}
                    		});
                    	}

                    	           
            $('.close').on("click",function(e){
            	e.preventDefault();
            	$('#myModal').css('display', 'none');
            })

                    </script>


											</div>
										</div>
									</div>

									<div class="col-xl-6 col-sm-6">

										<div class="card mini-stat ">
											<div class="card-body " style="border-radius: 5px;">


												<div class="row">
													<table id="academic_qualifications" class="table table-editable table-nowrap align-middle table-edits">
														<thead>
															<tr>
																<th>ID</th>
																<th>COUNTRY EDUCATION</th>
																<th>HIGHEST LEVEL OF EDUCATION</th>

															</tr>
														</thead>
														<tbody>

															@php $i=1; @endphp

															@foreach($students->academic_qualifications as $academic_qualifications)
															<tr data-id="1">
																<td data-field="id" style="width: 80px">{{$i++}}</td>
																<td data-field="age">{{$academic_qualifications->institution}}</td>
																<td data-field="name">{{$academic_qualifications->qualification}}</td>
																
																<td>
																	<a class="btn btn-outline-secondary btn-sm edit academic-edit-btn" onclick="showModal('{{ $academic_qualifications->id }}')" title="Edit">
																		    <i class="fas fa-pencil-alt"></i>
																		</a>

																</td>

															</tr>
															@endforeach

														</tbody>
													</table>
												</div>

												

       



    <script>
            

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

           

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



											</div>

										</div>

									</div>
								</div>



							</section>


						</div>

						<script type="text/javascript">
							$(document).ready(function() {
// Counter to track the number of rows
								var rowCount = 1;

								$("#addRowBtn").click(function() {
									rowCount++;

									var newRow = `
									<div class="row">
									<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
									<div class="card-body mini-stat-img" style="border-radius: 5px;">
									<div class="row">
									<div class="form-group col-xl-6">
									<label>COUNTRY EDUCATION *</label>
									<Select class="form-control" name="educationData[${rowCount}][academic_education_country]">
									<option>Select</option>
									<option value="1">one</option>
									<option value="2">two</option>
									</Select>
									</div>

									<div class="form-group col-xl-6">
									<label>HIGHEST LEVEL OF EDUCATION</label>
									<Select class="form-control"  name="educationData[${rowCount}][academic_education_level]">
									<option>Select</option>
									<option value="1">one</option>
									<option value="2">two</option>
									</Select>
									</div>
									</div>
									</div>
									</div>
									</div>
									</div>
									`;

									$("#dynamicRowsContainer").append(newRow);
								});
							});

						</script>





					
					

											
				
</div>

<script type="text/javascript">


	$(".edit-btn").on("click",function(e){
// Find the input fields you want to make readonly
		var inputs = $(this).closest(".row").find("input, textarea");

		$(inputs).removeAttr("readonly");
	});

</script>




<script>
	$(document).ready(function() {
// Function to load districts based on the selected state
		function loadDistricts(state) {



			$.ajax({
				type: 'POST',
				url: '{{ route("district_list") }}',
				data: {
					_token: '{{ csrf_token() }}',
					state: state
				},
				success: function (response) {
					console.log(response);

// Clear previous options
					$('#cityOptions').empty();



// Add new options
					for (var i = 0; i < response.length; i++) {
						var city = response[i];
						$('#cityOptions').append($('<option>', {
							value: city,
							text: city
						}));
					}

// Enable the input field
					$('#cityDropdown').prop('disabled', false);
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});







		}

// Function to update the city input field
		function updateCityInput(district) {
			var cityInput = $('input[name="mailing_city"]');
			cityInput.val(district);
cityInput.prop('disabled', false); // Enable the city input field
}

// Event handler for state dropdown change

});
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