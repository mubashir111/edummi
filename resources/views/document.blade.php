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
					<button class="nav-link active mr-5" id="pills-profile-tab"  type="button" role="tab" aria-controls="pills-profile"
					onclick="window.location.href = '{{ route("document.edit", ["id" =>$students->id]) }}'">Documents</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link " id="pills-contact-tab"  type="button" role="tab" aria-controls="pills-contact" onclick="window.location.href = '{{ route("application.edit", ["id" =>$students->id]) }}'" 
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="9th_marksheet[]" />
							@if (isset($students->document->{"9th_Marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"9th_Marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">

							@if (isset($students->document->{"9th_Marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif

							@if (isset($students->document->{"9th_Marksheet_url"}))
							<a href="{{ asset($students->document->{"9th_Marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Std. 10th Marksheet *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="10th_marksheet[]" />
							@if (isset($students->document->{"10th_Marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"10th_Marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"10th_Marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"10th_Marksheet_url"}))
							<a href="{{ asset($students->document->{"10th_Marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Std. 11th Marksheet</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="11th_marksheet[]" />
							@if (isset($students->document->{"11th_Marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"11th_Marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"11th_Marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"11th_Marksheet_url"}))
							<a href="{{ asset($students->document->{"11th_Marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Std. 12th Marksheet *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="12th_marksheet[]" />
							@if (isset($students->document->{"12th_Marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"12th_Marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"12th_Marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"12th_Marksheet_url"}))
							<a href="{{ asset($students->document->{"12th_Marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Bachelors Individual Marksheets *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="bachlors_marksheet[]" />
							@if (isset($students->document->{"bachlors_marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"bachlors_marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"bachlors_marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"bachlors_marksheet_url"}))
							<a href="{{ asset($students->document->{"bachlors_marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Consolidated Marksheet *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="consolidate_marksheet[]" />
							@if (isset($students->document->{"consolidate_marksheet_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"consolidate_marksheet_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"consolidate_marksheet_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"consolidate_marksheet_url"}))
							<a href="{{ asset($students->document->{"consolidate_marksheet_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Academic Transcripts *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="acadamic_transcript[]" />
							@if (isset($students->document->{"acadamic_transcript_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"acadamic_transcript_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"acadamic_transcript_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"acadamic_transcript_url"}))
							<a href="{{ asset($students->document->{"acadamic_transcript_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Provisional/Final Degree Certificate *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="final_degree[]" />
							@if (isset($students->document->{"final_degree_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"final_degree_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"final_degree_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"final_degree_url"}))
							<a href="{{ asset($students->document->{"final_degree_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Application Form</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="application_form[]" />
							@if (isset($students->document->{"application_form_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"application_form_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"application_form_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"application_form_url"}))
							<a href="{{ asset($students->document->{"application_form_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
					<div class="row">
						<div class="col-xl-12 mb-1">
							<h5 style="color: #1F92D1;">Copy of Passport *</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="passport_file[]" />
							@if (isset($students->document->{"passport_file_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"passport_file_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"passport_file_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"passport_file_url"}))
							<a href="{{ asset($students->document->{"passport_file_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden"  name="statment_purpose[]" />
							@if (isset($students->document->{"statment_purpose_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"statment_purpose_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"statment_purpose_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"statment_purpose_url"}))
							<a href="{{ asset($students->document->{"statment_purpose_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="cv[]" />
							@if (isset($students->document->{"cv_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"cv_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"cv_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"cv_url"}))
							<a href="{{ asset($students->document->{"cv_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="latter_of_recomentation[]" />
							@if (isset($students->document->{"latter_of_recomentation_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"latter_of_recomentation_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"latter_of_recomentation_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"latter_of_recomentation_url"}))
							<a href="{{ asset($students->document->{"latter_of_recomentation_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="english_certificate[]" />
							@if (isset($students->document->{"english_certificate_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"english_certificate_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"english_certificate_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"english_certificate_url"}))
							<a href="{{ asset($students->document->{"english_certificate_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="bank_balance[]" />
							@if (isset($students->document->{"bank_balance_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"bank_balance_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"bank_balance_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"bank_balance_url"}))
							<a href="{{ asset($students->document->{"bank_balance_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="financial_affidavit[]" />
							@if (isset($students->document->{"financial_affidavit_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"financial_affidavit_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"financial_affidavit_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"financial_affidavit_url"}))
							<a href="{{ asset($students->document->{"financial_affidavit_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="gap_explanation_letter[]" />
							@if (isset($students->document->{"gap_explanation_letter_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"gap_explanation_letter_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"gap_explanation_letter_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"gap_explanation_letter_url"}))
							<a href="{{ asset($students->document->{"gap_explanation_letter_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="Online_Submission_Configaration[]" />
							@if (isset($students->document->{"Online_Submission_Configaration_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"Online_Submission_Configaration_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"Online_Submission_Configaration_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"Online_Submission_Configaration_url"}))
							<a href="{{ asset($students->document->{"Online_Submission_Configaration_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="sat_file[]" />
							@if (isset($students->document->{"sat_file_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"sat_file_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"sat_file_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"sat_file_url"}))
							<a href="{{ asset($students->document->{"sat_file_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="gre[]" />
							@if (isset($students->document->{"gre_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"gre_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"gre_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"gre_url"}))
							<a href="{{ asset($students->document->{"gre_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="gmat[]" />
							@if (isset($students->document->{"gmat_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"gmat_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"gmat_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"gmat_url"}))
							<a href="{{ asset($students->document->{"gmat_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden"  name="toefl[]" />
							@if (isset($students->document->{"toefl_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"toefl_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"toefl_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"toefl_url"}))
							<a href="{{ asset($students->document->{"toefl_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" name="ielts_file[]" hidden="hidden" />
							@if (isset($students->document->{"ielts_file_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"ielts_file_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"ielts_file_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"ielts_file_url"}))
							<a href="{{ asset($students->document->{"ielts_file_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="pte[]" />
							@if (isset($students->document->{"pte_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"pte_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"pte_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"pte_url"}))
							<a href="{{ asset($students->document->{"pte_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="exempyion_certificate[]" />
							@if (isset($students->document->{"exempyion_certificate_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"exempyion_certificate_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"exempyion_certificate_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"exempyion_certificate_url"}))
							<a href="{{ asset($students->document->{"exempyion_certificate_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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
						<div class="col-xl-9">
							<input type="file" id="real-file" hidden="hidden" name="additional_documents[]" />
							@if (isset($students->document->{"additional_documents_url"}))
							<span class="custom-text">File chosen: {{ $students->document->{"additional_documents_url"} }}</span>
							@else
							<span class="custom-text">No file chosen, yet.</span>
							@endif
						</div>
						<div class="col-xl-3">
							@if (isset($students->document->{"additional_documents_url"}))
							<button type="submit" class="custom-button">Edit Files</button>
							@else
							<button type="submit" class="custom-button">Upload Files</button>
							@endif
							@if (isset($students->document->{"additional_documents_url"}))
							<a href="{{ asset($students->document->{"additional_documents_url"}) }}" target="_blank" class="btn btn-primary">View File</a>
							@endif
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