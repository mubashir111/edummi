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





                    <script type="text/javascript">

                    	function showModal(id) {
                    		$.ajax({
                    			url: '{{ route('work_experience.show') }}',
                    			method: 'POST',
                    			data: {
                    				_token: '{{ csrf_token() }}',
                    				work_experience_id: id,
                    			},
                    			success: function(response) {
                    				var Formdiv = `<form method="POST" action="{{ route('work_experience.update') }}" enctype="multipart/form-data">
                    				@csrf
                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>COMANY NAME  *</label>
                    				<input type="text" name="experience_company_name" class="form-control" placeholder="Enter Department Name" required value="${response.response.company_name}">
                    				</div>
                    				</div>

                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>LOCATION *</label>
                    				<input type="text" name="experience_company_location" class="form-control" placeholder="Enter Department Name" required value="${response.response.location}">
                    				</div>
                    				</div>

                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>DESIGNATION *</label>
                    				<input type="text" name="experience_company_designation" class="form-control" placeholder="Enter Department Name" required value="${response.response.job_title}">
                    				</div>
                    				</div>

                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>START DATE *</label>
                    				<input type="text" name="experience_company_start_date" class="form-control" placeholder="Enter Department Name" required value="${response.response.start_date}">
                    				</div>
                    				</div>

                    				<input type="hidden" name="edit_id" value="${response.response.id}" >

                    				<div class="row mt-4">
                    				<div class="form-group col-xl-12">
                    				<label>END DATE *</label>
                    				<input type="text" name="experience_company_end_date" class="form-control" placeholder="Enter Department Name" required value="${response.response.end_date}">
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
							        <button class="nav-link  mr-3 sub-btn1" type="button" role="tab" aria-selected="false"
							            onclick="window.location.href='{{ route('academic-qualification.edit', ['id' => $students->id]) }}'">
							            Academic Qualification
							            <p>Incomplete</p>
							        </button>
							    </li>
							    <li class="nav-item" role="presentation">
							        <button class="nav-link active mr-3 sub-btn1" type="button" role="tab" aria-selected="true"
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
						
						
				

					<p class="subhead mt-3">Work Experience</p>
					<!-- Nav tabs -->
					<style>#pills-work .nav-pills .nav-link {

						width: 212px !important;

					}</style>



					<ul class="nav nav-pills mb-3 pf1" id="pills-tab" role="tablist">
						<li class="nav-item"  role="presentation" style="width: 50%;">
							 <button class="nav-link mr-2 active sub-btn1" id="pills-test-tab" type="button"  data-bs-toggle="tab" href="#home-1"role="tab" aria-selected="false">
							           Add Work Experience
							        </button>
						</li>
						<li class="nav-item "  role="presentation" style="width: 50%;">
							 <button class="nav-link mr-2  sub-btn1" id="pills-test-tab" type="button"  data-bs-toggle="tab" href="#profile-1"  role="tab" aria-selected="false">
							           Work Experience Details
							        </button>
						</li>
					</ul>

					
                   



					<div class="tab-content">
						<div class="tab-pane active " id="home-1" role="tabpanel">
							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<label>COMANY NAME *</label>
													<input type="text" class="form-control"
													placeholder="Enter Company Name" name="experience_company_name" value="{{  isset($students->work_experience->company_name) ? $students->work_experience->company_name : '' }}">
												</div>

												<div class="form-group col-xl-6">
													<label>LOCATION *</label>
													<input type="text" class="form-control"
													placeholder="Enter Location"  name="experience_company_location" value="{{  isset($students->work_experience->location) ? $students->work_experience->location : '' }}">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>DESIGNATION *</label>
													<input type="text" class="form-control"
													placeholder="Enter Destination" name="experience_company_designation" value="{{  isset($students->work_experience->job_title) ? $students->work_experience->job_title : '' }}">
												</div>

												<div class="form-group col-xl-3">
													<label>START DATE *</label>
													<input type="date" class="form-control" placeholder="" name="experience_company_start_date" value="{{  isset($students->work_experience->start_date) ? $students->work_experience->start_date : '' }}">
												</div>
												<div class="form-group col-xl-3">
													<label>END DATE *</label>
													<input type="date" class="form-control" placeholder="" name="experience_company_end_date" value="{{  isset($students->work_experience->end_date) ? $students->work_experience->end_date : '' }}">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-12 text-center mt-4">
													<input id="experiense_btn" type="button" class="footer-btn btn-active"
													value="Save">
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane " id="profile-1" role="tabpanel">
							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">

											<div class="row">
												<table class="table table-editable table-nowrap align-middle table-edits">
													<thead>
														<tr>
															<th>ID</th>
															<th>COMPANY NAME</th>
															<th>LOCATION</th>
															<th>DESIGNATION</th>
															<th>START DATE </th>
															<th>END DATE</th>



														</tr>
													</thead>
													<tbody>

														@php $i=1; @endphp

														@foreach($students->work_experience as $work_experience)
														<tr data-id="1">
															<td data-field="id" style="width: 80px">{{$i++}}</td>
															<td data-field="name">{{$work_experience->company_name}}</td>
															<td data-field="name">{{$work_experience->location}}</td>
															<td data-field="age">{{$work_experience->job_title}}</td>
															<td data-field="age">{{$work_experience->start_date}}</td>
															<td data-field="age">{{$work_experience->end_date}}</td>
															<td>
																<a class="btn btn-outline-secondary btn-sm edit" title="Edit"  onclick="showModal('{{ $work_experience->id }}')">
																	<i class="fas fa-pencil-alt"></i>
																</a>
															</td>

														</tr>
														@endforeach

													</tbody>
												</table>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



				

				<script>
					$(document).ready(function() {
						$('#experiense_btn').click(function() {
// Get the values of the input fields
							var experience_company_name = $('input[name="experience_company_name"]').val();
							var experience_company_location = $('input[name="experience_company_location"]').val();
							var experience_company_designation = $('input[name="experience_company_designation"]').val();
							var experience_company_start_date = $('input[name="experience_company_start_date"]').val();
							var experience_company_end_date = $('input[name="experience_company_end_date"]').val();

// Check if the input fields are filled
							if (experience_company_name.trim() === '') {
								alert('Please enter the  experience company name.');
								return;
							}

							if (experience_company_location.trim() === '') {
								alert('Please enter the experience company location.');
								return;
							}

							if (experience_company_designation.trim() === '') {
								alert('Please enter the experience experience company designation.');
								return;
							}

							if (experience_company_start_date.trim() === '') {
								alert('Please enter the experience experience experience company start_date.');
								return;
							}

							if (experience_company_end_date.trim() === '') {
								alert('Please enter the experience experience experience company end date.');
								return;
							}

// Create an object with the data to be sent
							var data = {
								experience_company_name: experience_company_name,
								experience_company_location: experience_company_location,
								experience_company_designation: experience_company_designation,
								experience_company_start_date: experience_company_start_date,
								experience_company_end_date: experience_company_end_date,
								_token: '{{ csrf_token() }}',
								student_id: '{{ $students->id }}'
							};

// Perform AJAX call
							$.ajax({
url: '{{ route("manage-students.work_experience") }}', // Replace with your actual URL
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
			




</div>
</div>

<script type="text/javascript">


	$(".edit-btn").on("click",function(e){
// Find the input fields you want to make readonly
		var inputs = $(this).closest(".row").find("input, textarea");

		$(inputs).removeAttr("readonly");
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