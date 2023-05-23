@include('layout.inner2-header')

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">

			<div class="page-content">
				<div class="container-fluid">
					<ul class="nav nav-pills mb-4 pf3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active mr-5" id="pills-home-tab" data-bs-toggle="pill"
								data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
								aria-selected="true">Profile</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
								data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
								aria-selected="false">Documents</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
								data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
								aria-selected="false">Applications</button>
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

							<ul class="nav nav-pills mb-3 pf1 " id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active mr-3 sub-btn" id="pills-Personal-tab"
										data-bs-toggle="pill" data-bs-target="#pills-Personal" type="button" role="tab"
										aria-controls="pills-Personal" aria-selected="true">Personal
										Information<p>Incomplete</p></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link mr-3 sub-btn1" id="pills-academic-tab" data-bs-toggle="pill"
										data-bs-target="#pills-academic" type="button" role="tab"
										aria-controls="pills-acedamic" aria-selected="false">Academic
										Qualification<p>Incomplete</p></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link mr-3 sub-btn1" id="pills-work-tab" data-bs-toggle="pill"
										data-bs-target="#pills-work" type="button" role="tab" aria-controls="pills-work"
										aria-selected="false">Work
										Experiance<p>Incomplete</p></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link mr-2 sub-btn1" id="pills-test-tab" data-bs-toggle="pill"
										data-bs-target="#pills-test" type="button" role="tab" aria-controls="pills-test"
										aria-selected="false">Tests<p>Incomplete</p></button>
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
															<Select class="form-control" name="gender"  value="{{$students->gender}}" required>
																<option value="">Select</option>
																<option value="male">Male</option>
																<option value="female">Female</option>
															</Select>
														</div>

														<div class="form-group col-xl-4">
															<label>MARITAL STATUS</label>
															<Select class="form-control" name="marital_status"  value="{{$students->marital_status}}" required>
																<option value="">Select</option>
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
															<Select class="form-control" name="mailing_country" required>
																<option value="{{  isset($mailing_address->country) ? $mailing_address->country : '' }}" selected>{{  isset($mailing_address->country) ? $mailing_address->country : '' }}</option>
																<option  value="1" ></option>
																<option value="2"></option>
															</Select>
														</div>

														<div class="form-group col-xl-6">
															<label>STATE *</label>
															<Select class="form-control" name="mailing_state"  required>
																
																<option value="{{  isset($mailing_address->state) ? $mailing_address->state : '' }}" selected>
																	{{  isset($mailing_address->state) ? $mailing_address->state : 'Select' }}
																</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-6">
															<label>CITY *</label>
															<input type="text" value="{{  isset($mailing_address->city) ? $mailing_address->city : '' }}" class="form-control" placeholder="name" name="mailing_city" required>
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
															<Select class="form-control" name="permenent_country" required>
																<option value="{{  isset($permanent_address->country) ? $permanent_address->country : '' }}" selected>{{  isset($permanent_address->country) ? $permanent_address->country : '' }}</option>
																<option value="1">ww</option>
																<option value="2">dd</option>
															</Select>
														</div>

														<div class="form-group col-xl-6">
															<label>STATE *</label>
															<Select class="form-control" name="permenent_state" required>
																<option value="{{  isset($permanent_address->state) ? $permanent_address->state : '' }}" selected>{{  isset($permanent_address->state) ? $permanent_address->state : '' }}</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-6">
															<label>CITY *</label>
															<input type="text" class="form-control" placeholder="name" name="permenent_city"  value="{{  isset($permanent_address->city) ? $permanent_address->city : '' }}">
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
																placeholder="Enter Password Number" name="passport_number">
														</div>

														<div class="form-group col-xl-4">
															<label>ISSUE DATE *</label>
															<input type="date" class="form-control" placeholder="" name="passport_issue_date">
														</div>

														<div class="form-group col-xl-4">
															<label>EXPIRY DATE *</label>
															<input type="date" class="form-control" placeholder="" name="passport_expiry_date">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-xl-4">
															<label>ISSUE COUNTRY *</label>
															<Select class="form-control" name="passport_issue_country" required>
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>

														<div class="form-group col-xl-4">
															<label>CITY OF BIRTH *</label>
															<input type="text" class="form-control"
																placeholder="Enter City" name="city_of_birth">
														</div>

														<div class="form-group col-xl-4">
															<label>COUNTRY OF BIRTH *</label>
															<Select class="form-control" name="country_of_birth" required>
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
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
															<label>NATIONALITY *</label>
															<Select class="form-control" name="Nationality" required>
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>

														<div class="form-group col-xl-6">
															<label>CITIZENSHIP *</label>
															<Select class="form-control" name="citizenship" required>
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
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
																			value="no" checked />
																		<label for="radio-1">NO</label>
																		<input type="radio" id="radio-2" name="more_than_one_country"
																			value="yes" />
																		<label for="radio-2">YES</label>
																	</div>
																</div>
																<div class="form-group col-xl-10">
																	<Select class="form-control" name="another_nationality" >
																		<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
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
																	<Select class="form-control" name="study_another_contry">
																		<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
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
																	<Select class="form-control" name="applied_imigaration_country">
																		<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
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
																		placeholder="Specify Here" name="medical_issue_detail">
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
																	<Select class="form-control" name="visa_refusal_country">
																		<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
																	</Select>
																</div>

																<div class="form-group col-xl-2">
																</div>
																<div class="form-group col-xl-10">
																	<input type="text" class="form-control"
																		placeholder="Type of visa" name="visa_refusal_visa_type">
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
																		placeholder="Specify Here" name="criminal_offence_detail">
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
																placeholder="Enter Name" name="important_contact_name">
														</div>

														<div class="form-group col-xl-6">
															<label>PHONE *</label>
															<input type="text" class="form-control"
																placeholder="Enter Phone Number" name="important_contact_number">
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-6">
															<label>EMAIL *</label>
															<input type="email" class="form-control"
																placeholder="Enter Email id" name="important_contact_email">
														</div>

														<div class="form-group col-xl-6">
															<label>RELATION WITH APPLICANT *</label>
															<input type="email" class="form-control"
																placeholder="Enter Relation" name="important_contact_relation">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="pills-academic" role="tabpanel"
									aria-labelledby="pills-academic-tab">

									<p class="subhead mt-3">Personal Information</p>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">
													<div class="row">
														<div class="form-group col-xl-6">
															<label>COUNTRY EDUCATION *</label>
															<Select class="form-control" name="academic_education_country" >
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>

														<div class="form-group col-xl-6">
															<label>HIGHEST LEVEL OF EDUCATION</label>
															<Select class="form-control" name="academic_education_level">
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item-body-content" id="hover-div">
															<div class="row">
																<div class="form-group col-xl-6">
																	<label>COMPANY NAME *</label>
																	<input type="text" class="form-control"
																		placeholder="Enter Company Name" >
																</div>

																<div class="form-group col-xl-6">
																	<label>LOCATION *</label>
																	<input type="text" class="form-control"
																		placeholder="Enter Location">
																</div>
															</div>

															<div class="row">
																<div class="form-group col-xl-6">
																	<label>DESTINATION *</label>
																	<input type="text" class="form-control"
																		placeholder="Enter Destination" >
																</div>

																<div class="form-group col-xl-3">
																	<label>START DATE *</label>
																	<input type="date" class="form-control"
																		placeholder="" >
																</div>
																<div class="form-group col-xl-3">
																	<label>END DATE *</label>
																	<input type="date" class="form-control"
																		placeholder=""  >
																</div>
															</div>


														</div>

														<div class="row">
															<div class="form-group col-xl-12 text-center mt-4">
																<input type="button" class="footer-btn btn-active"
																	style="width: 150px;" id="SAVE"
																	value="Add Education">
															</div>
														</div>

														<script>
															$("#SAVE").on("click", function (e) {
																e.preventDefault();
																$("#hover-div").show();
															})
														</script>


													</div>
												</div>

											</div>
										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="pills-work" role="tabpanel"
									aria-labelledby="pills-work-tab">

									<p class="subhead mt-3">Work Experience</p>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">
													<div class="row">
														<div class="form-group col-xl-6">
															<label>COMANY NAME *</label>
															<input type="text" class="form-control"
																placeholder="Enter Company Name" name="experience_company_name">
														</div>

														<div class="form-group col-xl-6">
															<label>LOCATION *</label>
															<input type="text" class="form-control"
																placeholder="Enter Location"  name="experience_company_location">
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-6">
															<label>DESTINATION *</label>
															<input type="text" class="form-control"
																placeholder="Enter Destination" name="experience_company_designation">
														</div>

														<div class="form-group col-xl-3">
															<label>START DATE *</label>
															<input type="date" class="form-control" placeholder="" name="experience_company_start_date">
														</div>
														<div class="form-group col-xl-3">
															<label>END DATE *</label>
															<input type="date" class="form-control" placeholder="" name="experience_company_end_date">
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-12 text-center mt-4">
															<input type="button" class="footer-btn btn-active"
																value="Save">
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="pills-test" role="tabpanel"
									aria-labelledby="pills-test-tab">

									<p class="subhead mt-3">Tests</p>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																GRE
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="gre_overall_score">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="Enter Location" name="gre_exam_date">
																		</div>
																	</div>

																	<div class="row">
																		<div class="form-group col-xl-4">
																			<label>QUANTITATIVE *</label>
																			<input type="text" class="form-control"
																				placeholder="" name="gre_exam_quantitative" value="Q:">
																		</div>

																		<div class="form-group col-xl-4">
																			<label>VERBAL *</label>
																			<input type="text" class="form-control"
																				placeholder="" name="gre_exam_verbal" value="V:">
																		</div>
																		<div class="form-group col-xl-4">
																			<label>ANALYTICAL WRITING *</label>
																			<input type="text" class="form-control"
																				placeholder="" name="gre_analytical_writing" value="AW:">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																GMAT
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="gmat_analytical_writing">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="Enter Location" name="gmat_date_examination">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-3">
																			<label>QUANTITATIVE *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="Q:" name="gmat_quantitative">
																		</div>

																		<div class="form-group col-xl-3">
																			<label>VERBAL *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="V:" name="gmat_verbal">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>ANALYTICAL WRITING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="AW:" name="gmat_analytical_writing">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>INTEGRATED REASONING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="IR:"  name="gmat_analytical_integrated">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																TOEFL
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="toefl_overall_score">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="Enter Location" name="toefl_date_of_examination">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-3">
																			<label>READING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="R:"  name="toefl_date_of_examin">
																		</div>

																		<div class="form-group col-xl-3">
																			<label>LISENING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="L:" name="toefl_lisenting">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>SPEAKING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="S:" name="toefl_speking">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>WRITING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="W:" name="toefl_writing">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																IELTS
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="col-xl-6">
																			<div class="row">
																				<div>
																					<label>YET TO RECIEVE ?
																					</label>
																				</div>
																				<div class="form-group col-xl-2">
												<div class="switch-field">
													<input type="radio" id="radio-1"
														name="yet_recieved_status" value="no"
														checked />
													<label for="radio-1">NO</label>
													<input type="radio" id="radio-2"
														name="yet_recieved_status" 
														value="yes" />
													<label for="radio-2">YES</label>
												</div>
											</div>
																				<div class="form-group col-xl-10">
																					<Select class="form-control" name="ielts_nationality">
																						<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
																				</div>
																			</div>
																		</div>
																		<div class="form-group col-xl-6">
																			<label>TRF NO.</label>
																			<input type="text" class="form-control"
																				placeholder="" value="T:" name="ielts_trf_no">
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-xl-6">
																			<div class="row">
																				<div>
																					<label>YET TO RECIEVE ?
																					</label>
																				</div>
																				<div class="form-group col-xl-2">
																					<div class="switch-field">
																						<input type="radio" id="radio-3"
																							name="switch-2" value="no"
																							checked />
																						<label for="radio-3">NO</label>
																						<input type="radio" id="radio-4"
																							name="switch-2"
																							value="yes" />
																						<label for="radio-4">YES</label>
																					</div>
																				</div>
																				<div class="form-group col-xl-10">
																					<Select class="form-control" name="ielts_nationality">
																						<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
																					</Select>
																				</div>
																			</div>
																		</div>
																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="" name="ielts_date_of_exam">
																		</div>
																	</div>

																	<div class="row">
																		<div class="form-group col-xl-3">
																			<label>READING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="R:" name="ielts_reading">
																		</div>

																		<div class="form-group col-xl-3">
																			<label>LISENING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="L:" name="ielts_listening">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>SPEAKING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="S:"  name="ielts_speaking">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>WRITING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="W:" name="ielts_writing">
																		</div>
																	</div>

																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="" name="ielts_overall_score">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																PTE
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="pte_overall_score">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="Enter Location" name="pte_date_of_exam">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-3">
																			<label>READING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="R:" name="pte_reading">
																		</div>

																		<div class="form-group col-xl-3">
																			<label>LISENING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="L:" name="pte_listening">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>SPEAKING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="S:" name="pte_speking">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>WRITING *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="W:" name="pte_writing">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																DET
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="det_overall_score">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="Enter Location" name="det_date_of_exam">
																		</div>
																	</div>
																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
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

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">
													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																SAT
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label for="overall_score">OVERALL SCORE *</label>
																			<input type="text" class="form-control" id="overall_score" name="sat_overall_score" placeholder="Enter Company Name">
																		</div>
																		<div class="form-group col-xl-6">
																			<label for="exam_date">DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control" id="exam_date" name="sat_exam_date" placeholder="Enter Location">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-4">
																			<label for="reading_writing">READING &amp; WRITING *</label>
																			<input type="text" class="form-control" id="reading_writing" name="sat_reading_writing" placeholder="" value="R&amp;W:">
																		</div>
																		<div class="form-group col-xl-4">
																			<label for="math">MATH *</label>
																			<input type="text" class="form-control" id="math" name="sat_math" placeholder="" value="V:">
																		</div>
																		<div class="form-group col-xl-4">
																			<label for="essay">ESSAY *</label>
																			<input type="text" class="form-control" id="essay" name="sat_essay" placeholder="" value="E:">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-12">
																			<label for="remarks">REMARKS</label>
																			<textarea class="form-control" id="remarks" name="sat_remarks" rows="3"></textarea>
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-xl-12 text-center mt-4">
																			<input type="button" class="footer-btn btn-active" value="Save">
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


									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="col-lg-12">
														<div class="accordion-item">
															<div class="accordion-item-header">
																ACT
															</div>
															<div class="accordion-item-body">
																<div class="accordion-item-body-content">
																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>OVERALL SCORE *</label>
																			<input type="text" class="form-control"
																				placeholder="Enter Company Name" name="act_overall_score">
																		</div>

																		<div class="form-group col-xl-6">
																			<label>DATE OF EXAMINATION *</label>
																			<input type="date" class="form-control"
																				placeholder="" name="act_date_of_exam">
																		</div>
																	</div>

																	<div class="row">
																		<div class="form-group col-xl-3">
																			<label>READING *</label>
																			<input type="text" class="form-control"
																				value="R:" placeholder="" name="act_reading">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>MATH *</label>
																			<input type="text" class="form-control"
																				value="M:" placeholder="" name="act_math">
																		</div>


																		<div class="form-group col-xl-3">
																			<label>SCIENCE *</label>
																			<input type="text" class="form-control"
																				value="S:" placeholder="" name="act_science">
																		</div>
																		<div class="form-group col-xl-3">
																			<label>ENGLISH *</label>
																			<input type="text" class="form-control"
																				placeholder="" value="E:" name="act_english">
																		</div>
																	</div>

																	<div class="row">
																		<div class="form-group col-xl-6">
																			<label>WRITING *</label>
																			<input type="text" class="form-control"
																				value="W:"
																				placeholder="Enter Company Name" name="act_writing">
																		</div>
																	</div>

																	<div class="row">
																		<div
																			class="form-group col-xl-12 text-center mt-4">
																			<input type="button"
																				class="footer-btn btn-active"
																				value="Save">
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>

													<script>
														const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

														accordionItemHeaders.forEach(accordionItemHeader => {
															accordionItemHeader.addEventListener("click", event => {

																// Uncomment in case you only want to allow for the display of only one collapsed item at a time!

																// const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
																// if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
																//   currentlyActiveAccordionItemHeader.classList.toggle("active");
																//   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
																// }

																accordionItemHeader.classList.toggle("active");
																const accordionItemBody = accordionItemHeader.nextElementSibling;
																if (accordionItemHeader.classList.contains("active")) {
																	accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
																}
																else {
																	accordionItemBody.style.maxHeight = 0;
																}

															});
														});
													</script>

												</div>
											</div>

										</div>
									</div>

								</div>
							</div>
						</div>
						
						<div class="tab-pane fade" id="pills-profile" role="tabpanel"
							aria-labelledby="pills-profile-tab">

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img2" style="border-radius: 5px;">
											<p style="color: #fff;">Welcome to Application Lorem Ipusam</p>
											<div class="row">
												<div class="form-group col-xl-4">
													<label style="color: #fff;">NAME</label>
													<input type="text" class="form-control" placeholder="Name">
												</div>

												<div class="form-group col-xl-4">
													<label style="color: #fff;">Email</label>
													<input type="email" class="form-control" placeholder="Email">
												</div>

												<div class="form-group col-xl-3">
													<label style="color: #fff;">PHONE</label>
													<input type="text" class="form-control" placeholder="Phone Number">
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
								<li class="nav-item" role="presentation">
									<button class="nav-link active mr-3 sub-btn2" id="pills-document-tab"
										data-bs-toggle="pill" data-bs-target="#pills-document" type="button" role="tab"
										aria-controls="pills-document" aria-selected="true">Your Documents</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link mr-3 sub-btn3" id="pills-uploaded-tab" data-bs-toggle="pill"
										data-bs-target="#pills-uploaded" type="button" role="tab"
										aria-controls="pills-uploaded" aria-selected="false">Kc Uploaded
										Documents</button>
								</li>
							</ul>

							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-document" role="tabpanel"
									aria-labelledby="pills-document-tab">

									<div class="row">
										<div class="col-xl-12 col-sm-12 mt-3">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Std. 9th Marksheet</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="9th_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12 ">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Std. 10th Marksheet *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="10th_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Std. 11th Marksheet</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="11th_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Std. 12th Marksheet *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="12th_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Bachlors Individual Marksheets *
															</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="bachlors_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Consolidated Marksheet *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="consolidate_marksheet[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Academic Transcripts *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="acadamic_transcript[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Provitional/Final Degree
																Certificate *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="final_degree[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Application Form</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="application_form[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Copy of Passport *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="passport_file[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Statment Of Purpose *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden"  name="statment_purpose[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">CV *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="cv[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Latter of Recommendation *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="latter_of_recomentation[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">English Language Certificate *
															</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="english_certificate[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Bank Balance Certificate *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="bank_balance[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Financial Affidavit *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="financial_affidavit[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Gap Explanation Letter</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="gap_explanation_letter[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Online Submission Configaration
																Page(Where
																Student/Partner Associate Has Directly Done the
																University Online
																Application)</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="Online_Submission_Configaration[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">SAT</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="sat_file[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">GRE *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="gre[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">GMAT *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="gmat[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">TOEFL</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden"  name="toefl[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">IELTS</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" name="ielts_file[]" hidden="hidden" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">PTE</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="pte[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Exemption Certificate *</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="exempyion_certificate[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-12 col-sm-12">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-12 mb-1">
															<h5 style="color: #1F92D1;">Upload Additional Documents</h5>
														</div>
													</div>

													<div class="row">
														<div class="col-xl-10">
															<input type="file" id="real-file" hidden="hidden" name="additional_documents[]" />
															<span class="custom-text">No file chosen, yet.</span>
														</div>
														<div class="col-xl-2">
															<button type="submit" class="custom-button">Upload
																Files</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="pills-uploaded" role="tabpanel"
									aria-labelledby="pills-uploaded-tab">

									<div class="row">

										<div class="col-xl-12 col-sm-12">
											<div class="row text-center mt-4">
												<h5 style="color: #1F92D1;">No Documents Uploaded</h5>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel"
							aria-labelledby="pills-contact-tab">

							<div class="row">
								<div class="col-xl-12 col-sm-12">
									<div class="card mini-stat ">
										<div class="card-body mini-stat-img2" style="border-radius: 5px;">
											<p style="color: #fff;">Welcome to Application Lorem Ipusam</p>
											<div class="row">
												<div class="form-group col-xl-4">
													<label style="color: #fff;">NAME</label>
													<input type="text" class="form-control" placeholder="Name">
												</div>

												<div class="form-group col-xl-4">
													<label style="color: #fff;">Email</label>
													<input type="email" class="form-control" placeholder="Email">
												</div>

												<div class="form-group col-xl-3">
													<label style="color: #fff;">PHONE</label>
													<input type="text" class="form-control" placeholder="Phone Number">
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
															<Select class="form-control" name="request_aplication_year">
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>
														<div class="form-group col-xl-3">
															<label>INTAKE</label>
															<Select class="form-control" name="request_aplication_intake">
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>

														<div class="form-group col-xl-3">
															<label>UNIVERSITY NAME</label>
															<Select class="form-control" name="request_university_name">
																<option>Select</option>
																<option></option>
																<option></option>
															</Select>
														</div>
														<div class="form-group col-xl-3">
															<label>COURSE NAME</label>
															<Select class="form-control" name="request_course_name">
																<option value="">Select</option>
																<option value="1"></option>
																<option value="2"></option>
															</Select>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-xl-12 text-center mt-4">
															<input type="submit" class="footer-btn btn-active"
																value="Save">
														</div>
													</div>

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
													</div>

												</div>

											</div>
										</div>

										<div class="col-xl-7 col-sm-7">
											<div class="card mini-stat ">
												<div class="card-body mini-stat-img" style="border-radius: 5px;">

													<div class="row">
														<div class="col-xl-8">
															<h5>456789/22-23</h5>
															<h5 style="color: #1F92D1;">DD/MM/YY 00:00AM</h5>
															<p style="font-size: 14px;" class="mt-1">Course Name</p>
															<p style="font-size: 14px;">University Name</p>
														</div>
														<div class="col-xl-4">
															<h5 class="text-right mb-5" style="color: #1F92D1;">
																Application Status</h5>
															<p class="text-right" style="font-size: 14px;">Month-YYYY
															</p>
														</div>
													</div>

													<div class="row mb-5">
														<div class="col-xl-12" style="margin-bottom: 210px;">

														</div>

													</div>

													<div class="row">
														<div style="display: flex;">
															<div class="" style="flex-basis: 10%;">
																<img class="rounded-circle header-profile-user"
																	src="assets/images/users/user-4.jpg"
																	alt="Header Avatar">
															</div>
															<div class="" style="flex-basis: 80%;">
																<input type="text" class="form-control"
																	placeholder="Enter Massage Here">
															</div>
															<div class="" style="display:flex; flex-basis: 10%;">
																<button class="form-control"
																	style="font-size: 20; border: none;"><i
																		class="fa fa-paperclip"></i></button>

																<button class="form-control"
																	style="border: none;background-color: #1F92D1;color: #fff;"><i
																		class="mdi mdi-send"></i></button>
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
			</div>

			<script type="text/javascript">
				

						$(".edit-btn").on("click",function(e){
						// Find the input fields you want to make readonly
						var inputs = $(this).closest(".row").find("input, textarea");

						$(inputs).removeAttr("readonly");
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


	<Script>
       
const customBtn = $(".custom-button");






customBtn.on("click", function(e) {
  e.preventDefault();
  const inputFile = $(this).closest(".row").find("input[type='file']");
  inputFile.trigger("click");
  inputFile.on("change", function() {
    $(this).siblings(".custom-text").text(this.value);
  });
});

$("form").on("submit", function() {
  const inputFile = $("input[type='file']:focus");
  if (inputFile.length) {
    const fileName = inputFile.val().match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    inputFile.attr("name", "file").hide().after(`<span>${fileName}</span>`);
  }
});
</Script>

<style type="text/css">
	.custom-button {
    padding: 8px;
    color: white;
    float: right;
    background-color: #1F92D1;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-button:hover {
    background-color: #1b7eb4;
}
</style>


<!-- JAVASCRIPT -->
<script src="../../assets/libs/jquery/jquery.min.js"></script>
<script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/libs/metismenu/metisMenu.min.js"></script>
<script src="../../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../../assets/libs/node-waves/waves.min.js"></script>
<script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- App js -->
<script src="../../assets/js/app.js"></script>
<script src="../../assets/js/ajax.js"></script>


</body>

</html>