@include('layout.header')



<script type="text/javascript">
	$(document).ready(function() {


		@include('layout.api_generate_script');

		
		
		function countryfunction(api_token){

           $.ajax({
			url: "https://www.universal-tutorial.com/api/countries",
			type: "GET",
			headers: {
				"Accept": "application/json",
				"Authorization": api_token
			},
			success: function(response) {


// Iterate over the countries array
				for (var i = 0; i < response.length; i++) {
					var country = response[i];
					var countryName = country.country_name;
					var country_code = country.country_phone_code;


					$('#country_list').append($('<option>', {
						value: countryName,
						text: countryName
					}));

					$('#permenent_country').append($('<option>', {
						value: countryName,
						text: countryName
					}));

					$('#passport_issue_country').append($('<option>', {
						value: countryName,
						text: countryName
					}));

					$('#country_of_birth').append($('<option>', {
						value: countryName,
						text: countryName
					}));


					$('#another_nationality').append($('<option>', {
						value: countryName,
						text: countryName
					}));

					$('#study_another_contry').append($('<option>', {
						value: countryName,
						text: countryName
					}));


					$('#applied_imigaration_country').append($('<option>', {
						value: countryName,
						text: countryName
					}));


					$('#visa_refusal_country').append($('<option>', {
						value: countryName,
						text: countryName
					}));


				}


			},
			error: function(error) {
				console.error(error);
			}
		});


		}


		



		$('#country_of_birth').on('change', function() {
			var country = $(this).val();

			var url = "https://www.universal-tutorial.com/api/states/"+country;

			$.ajax({
				url: url,
				type: "GET",
				headers: {
					"Accept": "application/json",
					"Authorization": api_token
				},
				success: function(response) {

					$('#city_of_birth').removeAttr("disabled");

					$('#city_of_birth').empty();




					for (var i = 0; i < response.length; i++) {
						var state = response[i];
						var stateName = state.state_name;




						$('#city_of_birth').append($('<option>', {
							value: stateName,
							text: stateName
						}));
					}



				},
				error: function(error) {
					console.error(error);
				}
			});


		});



// Event handler for country dropdown change
		$('#country_list').on('change', function() {
			var country = $(this).val();

			var url = "https://www.universal-tutorial.com/api/states/"+country;

			$.ajax({
				url: url,
				type: "GET",
				headers: {
					"Accept": "application/json",
					"Authorization": api_token
				},
				success: function(response) {


					$('#stateDropdown').empty();

					for (var i = 0; i < response.length; i++) {
						var state = response[i];
						var stateName = state.state_name;




						$('#stateDropdown').append($('<option>', {
							value: stateName,
							text: stateName
						}));
					}



				},
				error: function(error) {
					console.error(error);
				}
			});


		});



		$('#stateDropdown').on('change', function() {
			var selectedState = $(this).val();

			var url = "https://www.universal-tutorial.com/api/cities/"+selectedState;

			$.ajax({
				url: url,
				type: "GET",
				headers: {
					"Accept": "application/json",
					"Authorization": api_token
				},
				success: function(response) {



					$('#mailing_city').empty();

					for (var i = 0; i < response.length; i++) {
						var city = response[i];
						var city_name = city.city_name;




						$('#mailing_city').append($('<option>', {
							value: city_name,
							text: city_name
						}));
					}



				},
				error: function(error) {
					console.error(error);
				}
			});
		});


//permenent_country

// Event handler for country dropdown change
		$('#permenent_country').on('change', function() {
			var country = $(this).val();

			var url = "https://www.universal-tutorial.com/api/states/"+country;

			$.ajax({
				url: url,
				type: "GET",
				headers: {
					"Accept": "application/json",
					"Authorization": api_token
				},
				success: function(response) {

					$('#permentstateDropdown').empty();

					for (var i = 0; i < response.length; i++) {
						var state = response[i];
						var stateName = state.state_name;




						$('#permentstateDropdown').append($('<option>', {
							value: stateName,
							text: stateName
						}));
					}



				},
				error: function(error) {
					console.error(error);
				}
			});


		});

		$('#permentstateDropdown').on('change', function() {
			var selectedState = $(this).val();

			var url = "https://www.universal-tutorial.com/api/cities/"+selectedState;

			$.ajax({
				url: url,
				type: "GET",
				headers: {
					"Accept": "application/json",
					"Authorization": api_token
				},
				success: function(response) {

					$('#permenent_city').empty();
					for (var i = 0; i < response.length; i++) {
						var city = response[i];
						var city_name = city.city_name;




						$('#permenent_city').append($('<option>', {
							value: city_name,
							text: city_name
						}));
					}



				},
				error: function(error) {
					console.error(error);
				}
			});
		});



	});
</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
	<!-- Display success messages here -->
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
							        <button class="nav-link active mr-3 sub-btn" type="button" role="tab" aria-selected="true"
							            onclick="window.location.href='{{ route('manage-students.edit', ['manage_student' => $students->id]) }}'">
							            Personal Information
							            <p>Incomplete</p>
							        </button>
							    </li>
							    <li class="nav-item" role="presentation">
							        <button class="nav-link mr-3 sub-btn1" type="button" role="tab" aria-selected="false"
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

						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-Personal" role="tabpanel"
							aria-labelledby="pills-personal-tab">

							<p class="subhead mt-2">Manage Students</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-4">
													<label>DATE OF BIRTH *</label>
													<input type="date"  name="date_of_birth"  value="{{$students->date_of_birth}}" class="form-control" placeholder="" required>
												</div>

												<div class="form-group col-xl-4">
													<label>GENDER *</label>
													<Select class="form-control" name="gender"  required>
														@if(isset($students->gender))
														<option value="{{ $students->gender }}" selected>{{ $students->gender }}</option>
														@else
														<option value="" selected>Select</option>
														@endif

														<option value="male">Male</option>
														<option value="female">Female</option>
													</Select>
												</div>

												<div class="form-group col-xl-4">
													<label>MARITAL STATUS</label>
													<Select class="form-control" name="marital_status"   required>
														@if(isset($students->marital_status))
														<option value="{{ $students->marital_status }}" selected>{{ $students->marital_status }}</option>
														@else
														<option value="" selected>Select</option>
														@endif
														<option value="married">Married</option>
														<option value="unmarried">Unmarried</option>
													</Select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<p class="subhead">Mailing Address</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<label>ADDRESS LINE 1 *</label>
													<input type="text" class="form-control" placeholder="Enter Address" name="mailing_address_1" value="{{  isset($mailing_address->address_line_1) ? $mailing_address->address_line_1 : '' }}" required>

												</div>

												<div class="form-group col-xl-6">
													<label>ADDRESS LINE 2</label>
													<input type="text" class="form-control"
													placeholder="Enter Address" name="mailing_address_2"  value="{{  isset($mailing_address->address_line_2) ? $mailing_address->address_line_2 : '' }}"
													required>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>COUNTRY *</label>
													<Select class="form-control" name="mailing_country"  id="country_list" required>
														<option value="{{  isset($mailing_address->country) ? $mailing_address->country : '' }}" selected>{{  isset($mailing_address->country) ? $mailing_address->country : '' }}</option>

													</Select>
												</div>

												<div class="form-group col-xl-6">
													<label>STATE *</label>
													<Select class="form-control" name="mailing_state" id="stateDropdown" required >

														<option value="{{  isset($mailing_address->state) ? $mailing_address->state : '' }}" selected>
															{{  isset($mailing_address->state) ? $mailing_address->state : 'Select' }}
														</option>

													</Select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>CITY *</label>

													<Select class="form-control" name="mailing_city" id="mailing_city" required >

														<option value="{{  isset($mailing_address->city) ? $mailing_address->city : '' }}" selected>
															{{  isset($mailing_address->state) ? $mailing_address->state : 'Select' }}
														</option>

													</Select>






												</div>

												<div class="form-group col-xl-6">
													<label>PINCODE</label>
													<input type="text" class="form-control" placeholder="name" name="mailing_pincode" value="{{  isset($mailing_address->zip_code) ? $mailing_address->zip_code : '' }}" class="form-control"  required>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<p class="subhead">Permenant Address</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<label>ADDRESS LINE 1 *</label>
													<input type="text" class="form-control"
													placeholder="Enter Address" name="permenent_address1" value="{{  isset($permanent_address->address_line_1) ? $permanent_address->address_line_1 : '' }}">
												</div>

												<div class="form-group col-xl-6">
													<label>ADDRESS LINE 2</label>
													<input type="text" class="form-control"
													placeholder="Enter Address" name="permenent_address2"  value="{{  isset($permanent_address->address_line_2) ? $permanent_address->address_line_2 : '' }}">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>COUNTRY *</label>
													<Select class="form-control" name="permenent_country" id="permenent_country" required>
														<option value="{{  isset($permanent_address->country) ? $permanent_address->country : '' }}" selected>{{  isset($permanent_address->country) ? $permanent_address->country : '' }}</option>

													</Select>
												</div>

												<div class="form-group col-xl-6">
													<label>STATE *</label>
													<Select class="form-control" name="permenent_state" id="permentstateDropdown" required>
														<option value="{{  isset($permanent_address->state) ? $permanent_address->state : '' }}" selected>{{  isset($permanent_address->state) ? $permanent_address->state : '' }}</option>

													</Select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>CITY *</label>
													<Select class="form-control" name="permenent_city" id="permenent_city"  required>
														<option value="{{  isset($permanent_address->city) ? $permanent_address->city : '' }}" selected>{{  isset($permanent_address->state) ? $permanent_address->state : '' }}</option>

													</Select>


												</div>

												<div class="form-group col-xl-6">
													<label>PINCODE</label>
													<input type="text" class="form-control" placeholder="name" name="permenent_pincode"  value="{{  isset($permanent_address->zip_code) ? $permanent_address->zip_code : '' }}">
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<p class="subhead">Passport Information</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-4">
													<label>PASSPORT NUMBER *</label>
													<input type="text" class="form-control"
													placeholder="Enter Password Number" name="passport_number" value="{{  isset($students->passport->passport_number) ? $students->passport->passport_number : '' }}">
												</div>

												<div class="form-group col-xl-4">
													<label>ISSUE DATE *</label>
													<input type="date" class="form-control" placeholder="" name="passport_issue_date" value="{{  isset($students->passport->issue_date) ? $students->passport->issue_date : '' }}">
												</div>

												<div class="form-group col-xl-4">
													<label>EXPIRY DATE *</label>
													<input type="date" class="form-control" placeholder="" name="passport_expiry_date" value="{{  isset($students->passport->expiry_date) ? $students->passport->expiry_date : '' }}">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-xl-4">
													<label>ISSUE COUNTRY *</label>
													<Select class="form-control" name="passport_issue_country" id="passport_issue_country" value="{{  isset($students->passport->passport_issue_country) ? $students->passport->passport_issue_country : '' }}" required>

														@if(isset($students->passport->passport_issue_country))
														<option value="{{$students->passport->passport_issue_country }}" selected>{{ $students->passport->passport_issue_country }}</option>
														@else
														<option value="" selected>Select</option>
														@endif


													</Select>
												</div>

												<div class="form-group col-xl-4">
													<label>COUNTRY OF BIRTH *</label>
													<Select class="form-control" name="country_of_birth" id="country_of_birth" required>
														@if(isset($students->passport->country_of_birth))
														<option value="{{$students->passport->country_of_birth }}" selected>{{ $students->passport->country_of_birth}}</option>
														@else
														<option value="" selected>Select</option>
														@endif
													</Select>
												</div>

												<div class="form-group col-xl-4">
													<label>CITY OF BIRTH *</label>

													<Select class="form-control" name="city_of_birth" id="city_of_birth" required >
														@if(isset($students->passport->city_of_birth))
														<option value="{{$students->passport->city_of_birth }}" selected>{{ $students->passport->city_of_birth}}</option>
														@else
														<option value="" selected>Select</option>
														@endif
													</Select>
												</div>


											</div>
										</div>
									</div>
								</div>
							</div>

							<p class="subhead">Permenant Address</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<label>NATIONALITY * (upper case)</label>


													<input type="text" class="form-control" placeholder="" name="Nationality" value="{{  isset($students->nationality) ? $students->nationality : '' }}">

												</div>

												<div class="form-group col-xl-6">
													<label>CITIZENSHIP * (upper case)</label>

													<input type="text" class="form-control" placeholder="" name="citizenship" value="{{  isset($students->citizenship) ? $students->citizenship : '' }}">

												</div>
											</div>

											<div class="row">
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>IS THE APPLICANT A CITIZEN OF MORE THAN ONE
																COUNTRY? *
															</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-1" name="more_than_one_country"
																value="no"  />
																<label for="radio-1">NO</label>
																<input type="radio" id="radio-2" name="more_than_one_country"
																value="yes" />
																<label for="radio-2">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<Select class="form-control" name="another_nationality" id="another_nationality" disabled>
																@if(isset($students->another_nationality))
																<option value="{{$students->another_nationality }}" selected>{{ $students->another_nationality}}</option>
																@else
																<option value="" selected>Select</option>
																@endif

															</Select>
														</div>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>IS THE APPLICANT LIVING AND STUDYING IN AN
																ANOTHER COUNTRY?
															*</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-3" name="study_another_contry_status"
																value="no" checked />
																<label for="radio-3">NO</label>
																<input type="radio" id="radio-4"name="study_another_contry_status"
																value="yes" />
																<label for="radio-4">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<Select class="form-control" name="study_another_contry" id="study_another_contry">
																@if(isset($students->study_another_contry))
																<option value="{{$students->study_another_contry }}" selected>{{ $students->study_another_contry}}</option>
																@else
																<option value="" selected>Select</option>
																@endif
															</Select>
														</div>

													</div>

												</div>

											</div>

										</div>
									</div>
								</div>
							</div>

							<p class="subhead">Background Info</p>


							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>HAS APPLICANT APPLIED FOR ANY OF IMMIGRATION
																INTO ANY
																COUNTRY?
															</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-5" name="applied_imigaration_status"
																value="no" checked />
																<label for="radio-5">NO</label>
																<input type="radio" id="radio-6" name="applied_imigaration_status"
																value="yes" />
																<label for="radio-6">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<Select class="form-control" name="applied_imigaration_country" id="applied_imigaration_country">
																@if(isset($students->applied_imigaration_country))
																<option value="{{$students->applied_imigaration_country }}" selected>{{ $students->applied_imigaration_country}}</option>
																@else
																<option value="" selected>Select</option>
																@endif
															</Select>
														</div>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>DOES APPLICANT SUFFER FROM A SERIOUS MEDICAL
															CONDITION?</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-7" name="medical_issue_status"
																value="no" checked />
																<label for="radio-7">NO</label>
																<input type="radio" id="radio-8" name="medical_issue_status"
																value="yes" />
																<label for="radio-8">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<input type="text" class="form-control"
															placeholder="Specify Here" name="medical_issue_detail" value="{{  isset($students->medical_conditions) ? $students->medical_conditions : '' }}">
														</div>

													</div>

												</div>

											</div>

											<div class="row">
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>HAS APPLICANT VISA REFUSAL FOR ANY
															COUNTRY?</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-9" name="visa_refusal_status"
																value="no" checked />
																<label for="radio-9">NO</label>
																<input type="radio" id="radio-10"
																name="visa_refusal_status" value="yes" />
																<label for="radio-10">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<Select class="form-control" name="visa_refusal_country" id="visa_refusal_country">
																@if(isset($students->visa_refusal))
																<option value="{{$students->visa_refusal }}" selected>{{ $students->visa_refusal}}</option>
																@else
																<option value="" selected>Select</option>
																@endif
															</Select>
														</div>

														<div class="form-group col-xl-2">
														</div>
														<div class="form-group col-xl-10">
															<input type="text" class="form-control"
															placeholder="Type of visa" name="visa_refusal_visa_type"  value="{{  isset($students->visa_refusal_type) ? $students->visa_refusal_type : '' }}">
														</div>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="row">
														<div>
															<label>HAS APPLICANT EVER BEEN CONVICTED OF A
																CRIMINAL
															OFFENCE?</label>
														</div>
														<div class="form-group col-xl-2">
															<div class="switch-field">
																<input type="radio" id="radio-11"
																name="criminal_offence_status" value="no" checked />
																<label for="radio-11">NO</label>
																<input type="radio" id="radio-12"
																name="criminal_offence_status" value="yes" />
																<label for="radio-12">YES</label>
															</div>
														</div>
														<div class="form-group col-xl-10">
															<input type="text" class="form-control"
															placeholder="Specify Here" name="criminal_offence_detail" value="{{  isset($students->convicted_of_crime) ? $students->convicted_of_crime : '' }}">
														</div>

													</div>

												</div>

											</div>
										</div>

									</div>
								</div>
							</div>


							<p class="subhead">Important Contacts</p>

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<label>NAME *</label>
													<input type="text" class="form-control"
													placeholder="Enter Name" name="important_contact_name" value="{{  isset($students->important_contacts->name) ? $students->important_contacts->name : '' }}">
												</div>

												<div class="form-group col-xl-6">
													<label>PHONE *</label>
													<input type="text" class="form-control"
													placeholder="Enter Phone Number" name="important_contact_number" value="{{  isset($students->important_contacts->phone) ? $students->important_contacts->phone : '' }}">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xl-6">
													<label>EMAIL *</label>
													<input type="email" class="form-control"
													placeholder="Enter Email id" name="important_contact_email" value="{{  isset($students->important_contacts->email) ? $students->important_contacts->email : '' }}">
												</div>

												<div class="form-group col-xl-6">
													<label>RELATION WITH APPLICANT *</label>
													<input type="text" class="form-control"
													placeholder="Enter Relation" name="important_contact_relation" value="{{  isset($students->important_contacts->relation_with_applicant) ? $students->important_contacts->relation_with_applicant : '' }}">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<p class="subhead">Upload passport size photo</p>


							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img" style="border-radius: 5px;">
											<div class="row">
												<div class="form-group col-xl-6">
													<div>Upload images under 1 MB (avoid uploading compressed or scanned images)</div>
												</div>

												<div class="form-group col-xl-6">

													<input type="file" class="form-control"
													name="students_image[]">
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







<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<input type="button" class="footer-btn mr-4" value="Save">
				<input type="submit" class="footer-btn btn-active" value="Submit">
			</div>
		</div>
	</div>
</footer>
</form>
</div>

</div>



<script type="text/javascript">
	$(document).ready(function() {
// Disable another_nationality select element by default
		$('select[name="another_nationality"]').prop('disabled', true);

		var another_namtionality = $('select[name="another_nationality"]').val();


		if(another_namtionality){
// Set the "YES" radio button as checked
			$('#radio-2').prop('checked', true);
// Enable the medical_issue_detail input field
			$('select[name="another_nationality"]').prop('disabled', false);
			$('select[name="another_nationality"]').prop('required',true);
		} else {
// Set the "NO" radio button as checked
			$('#radio-1').prop('checked', true);
// Disable the medical_issue_detail input field

			$('select[name="another_nationality"]').prop('disabled', true);
		}

// Add event listener to the radio buttons
		$('input[name="more_than_one_country"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable another_nationality select element
				$('select[name="another_nationality"]').prop('disabled', false);
				$('select[name="another_nationality"]').prop('required',true);
			} else {
// Disable another_nationality select element
				$('select[name="another_nationality"]').prop('disabled', true);
				$('select[name="another_nationality"]').val(null);
				$('select[name="another_nationality"]').prop('required',false);
			}
		});

// Disable study_another_contry select element by default
		$('select[name="study_another_contry"]').prop('disabled', true);

		var study_another_contry = $('select[name="study_another_contry"]').val();


		if(study_another_contry){
// Set the "YES" radio button as checked
			$('#radio-4').prop('checked', true);
// Enable the medical_issue_detail input field
			$('select[name="study_another_contry"]').prop('disabled', false);
			$('select[name="study_another_contry"]').prop('required',true);
		} else {
// Set the "NO" radio button as checked
			$('#radio-3').prop('checked', true);
// Disable the medical_issue_detail input field

			$('select[name="study_another_contry"]').prop('disabled', true);
		}

// Add event listener to the radio buttons
		$('input[name="study_another_contry_status"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable study_another_contry select element
				$('select[name="study_another_contry"]').prop('disabled', false);
				$('select[name="study_another_contry"]').prop('required',true);
			} else {
// Disable study_another_contry select element
				$('select[name="study_another_contry"]').prop('disabled', true);
				$('select[name="study_another_contry"]').val(null);
			}
		});

// Disable applied_imigaration_country select element by default
		$('select[name="applied_imigaration_country"]').prop('disabled', true);

		var applied_imigaration_country = $('select[name="applied_imigaration_country"]').val();
		if (applied_imigaration_country) {
// Set the "YES" radio button as checked
			$('#radio-6').prop('checked', true);
// Enable the medical_issue_detail input field
			$('select[name="applied_imigaration_country"]').prop('disabled', false);
			$('select[name="applied_imigaration_country"]').prop('required',true);
		} else {
// Set the "NO" radio button as checked
			$('#radio-5').prop('checked', true);
// Disable the medical_issue_detail input field
			$('select[name="applied_imigaration_country"]').prop('disabled', true);
		}

// Add event listener to the radio buttons
		$('input[name="applied_imigaration_status"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable applied_imigaration_country select element
				$('select[name="applied_imigaration_country"]').prop('disabled', false);
				$('select[name="applied_imigaration_country"]').prop('required',true);
			} else {
// Disable applied_imigaration_country select element
				$('select[name="applied_imigaration_country"]').prop('disabled', true);
				$('select[name="applied_imigaration_country"]').val(null);
			}
		});

// Check if medical_issue_detail value is set
		var medicalIssueDetail = $('input[name="medical_issue_detail"]').val();
		if (medicalIssueDetail) {
// Set the "YES" radio button as checked
			$('#radio-8').prop('checked', true);
// Enable the medical_issue_detail input field
			$('input[name="medical_issue_detail"]').prop('disabled', false);
			$('input[name="medical_issue_detail"]').prop('required',true);
		} else {
// Set the "NO" radio button as checked
			$('#radio-7').prop('checked', true);
// Disable the medical_issue_detail input field
			$('input[name="medical_issue_detail"]').prop('disabled', true);
		}

// Add event listener to the radio buttons
		$('input[name="medical_issue_status"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable medical_issue_detail input field
				$('input[name="medical_issue_detail"]').prop('disabled', false);
				$('input[name="medical_issue_detail"]').prop('required',true);
			} else {
// Disable medical_issue_detail input field
				$('input[name="medical_issue_detail"]').prop('disabled', true);
				$('input[name="medical_issue_detail"]').val(null);
			}
		});



// Disable visa_refusal_country and visa_refusal_visa_type input fields by default
		$('select[name="visa_refusal_country"]').prop('disabled', true);
		$('input[name="visa_refusal_visa_type"]').prop('disabled', true);

// Check if values are set for visa_refusal_country and visa_refusal_visa_type
		var visaRefusalCountry = $('select[name="visa_refusal_country"]').val();
		var visaRefusalVisaType = $('input[name="visa_refusal_visa_type"]').val();
		if (visaRefusalCountry && visaRefusalVisaType) {
// Set the "YES" radio button as checked
			$('#radio-10').prop('checked', true);
// Enable the input fields
			$('select[name="visa_refusal_country"]').prop('disabled', false);
			$('input[name="visa_refusal_visa_type"]').prop('disabled', false);
		} else {
// Set the "NO" radio button as checked
			$('#radio-9').prop('checked', true);
		}

// Add event listener to the radio buttons
		$('input[name="visa_refusal_status"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable the input fields
				$('select[name="visa_refusal_country"]').prop('disabled', false);
				$('input[name="visa_refusal_visa_type"]').prop('disabled', false);
				$('select[name="visa_refusal_country"]').prop('required',true);
				$('input[name="visa_refusal_visa_type"]').prop('required',true);
			} else {
// Disable the input fields
				$('select[name="visa_refusal_country"]').prop('disabled', true);
				$('input[name="visa_refusal_visa_type"]').prop('disabled', true);
				$('select[name="visa_refusal_country"]').prop('required',false);
				$('input[name="visa_refusal_visa_type"]').prop('required',false);
				$('input[name="visa_refusal_visa_type"]').val(null);
				$('select[name="visa_refusal_country"]').val(null);
			}
		});

// Disable criminal_offence_detail input field by default
		$('input[name="criminal_offence_detail"]').prop('disabled', true);

// Check if value is set for criminal_offence_detail
		var criminalOffenceDetail = $('input[name="criminal_offence_detail"]').val();
		if (criminalOffenceDetail) {
// Set the "YES" radio button as checked
			$('#radio-12').prop('checked', true);
// Enable the input field
			$('input[name="criminal_offence_detail"]').prop('disabled', false);
			$('input[name="criminal_offence_detail"]').prop('required',true);
		} else {
// Set the "NO" radio button as checked
			$('#radio-11').prop('checked', true);
		}

// Add event listener to the radio buttons
		$('input[name="criminal_offence_status"]').change(function() {
			if ($(this).val() === 'yes') {
// Enable the input field
				$('input[name="criminal_offence_detail"]').prop('disabled', false);
				$('input[name="criminal_offence_detail"]').prop('required',true);
			} else {
// Disable the input field
				$('input[name="criminal_offence_detail"]').prop('disabled', true);
				$('input[name="criminal_offence_detail"]').val(null);
			}
		});


	});
</script>




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