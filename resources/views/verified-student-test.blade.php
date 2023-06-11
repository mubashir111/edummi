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
                                    class="btn-ma"></a>
                        </div>

                         <div class="col-xl-2 mb-4">
                            <a href="{{ route('tests.edit', ['id' => $students->id]) }}"><input type="button" value="Tests"
                                    class="btn-ma btn-active"></a>
                        </div>

                        
                    </div>

<p class="subhead mt-3">Tests</p>

				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<div class="card mini-stat ">
							<div class="card-body mini-stat-img" style="border-radius: 5px;">
                          
								<div class="col-lg-12">
									<div class="accordion-item">
										<div class="accordion-item-header active">
											GRE
										</div>
										<div class="accordion-item-body ">
											<div class="accordion-item-body-content">
												<div class="row">
													<div class="form-group col-xl-6">
														<label>OVERALL SCORE *</label>
														<input type="text" class="form-control"
														placeholder="Enter Company Name" name="gre_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gre_overall_score']) ? json_decode($students->test_attendance->score, true)['gre_overall_score'] : '' }}">
													</div>

													<div class="form-group col-xl-6">
														<label>DATE OF EXAMINATION *</label>
														<input type="date" class="form-control"
														placeholder="Enter Location" name="gre_exam_date" value="{{  isset($students->test_attendance->test_date) ? $students->test_attendance->test_date : '' }}">
													</div>
												</div>

												<div class="row">
													<div class="form-group col-xl-4">
														<label>QUANTITATIVE *</label>
														<input type="text" class="form-control" placeholder="" name="gre_exam_quantitative" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gre_exam_quantitative']) ? json_decode($students->test_attendance->score, true)['gre_exam_quantitative'] : '' }}">
													</div>

													<div class="form-group col-xl-4">
														<label>VERBAL *</label>
														<input type="text" class="form-control" placeholder="" name="gre_exam_verbal" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gre_exam_verbal']) ? json_decode($students->test_attendance->score, true)['gre_exam_verbal'] : '' }}">
													</div>

													<div class="form-group col-xl-4">
														<label>ANALYTICAL WRITING *</label>
														<input type="text" class="form-control" placeholder="" name="gre_analytical_writing" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gre_analytical_writing']) ? json_decode($students->test_attendance->score, true)['gre_analytical_writing'] : '' }}">
													</div>
												</div>



												<div class="row">
													<div
													class="form-group col-xl-12 text-center mt-4">
													<input id="gre_submit_btn" type="button"
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

			<script type="text/javascript">
				$(document).ready(function() {


                     

					$('#gre_submit_btn').click(function() {
// Get the values of the input fields
						var gre_overall_score = $('input[name="gre_overall_score"]').val();
						var gre_exam_date = $('input[name="gre_exam_date"]').val();
						var gre_exam_quantitative = $('input[name="gre_exam_quantitative"]').val();
						var gre_exam_verbal = $('input[name="gre_exam_verbal"]').val();
						var gre_analytical_writing = $('input[name="gre_analytical_writing"]').val();

// Check if the input fields are filled
						if (gre_overall_score.trim() === '') {
							alert('Please enter the  gre overall score.');
							return;
						}

						if (gre_exam_date.trim() === '') {
							alert('Please enter the gre eaxam date.');
							return;
						}

						if (gre_exam_quantitative.trim() === '') {
							alert('Please enter the gre exam qantitative.');
							return;
						}

						if (gre_exam_verbal.trim() === '') {
							alert('Please enter the gre exam verbal.');
							return;
						}

						if (gre_analytical_writing.trim() === '') {
							alert('Please enter the gre analytical writing.');
							return;
						}

// Create an object with the data to be sent
						var data = {
							gre_overall_score: gre_overall_score,
							gre_exam_date: gre_exam_date,
							gre_exam_quantitative: gre_exam_quantitative,
							gre_exam_verbal: gre_exam_verbal,
							gre_analytical_writing: gre_analytical_writing,
							_token: '{{ csrf_token() }}',
							student_id: '{{ $students->id }}'
						};

// Perform AJAX call
						$.ajax({
url: '{{ route("manage-students.gre_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'GRE text added successfully.',
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
													placeholder="Enter Company Name" name="gmat_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_overall_score']) ? json_decode($students->test_attendance->score, true)['gmat_overall_score'] : '' }}">
												</div>

												<div class="form-group col-xl-6">
													<label>DATE OF EXAMINATION *</label>
													<input type="date" class="form-control"
													placeholder="Enter Location" name="gmat_date_examination" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_date_examination']) ? json_decode($students->test_attendance->score, true)['gmat_date_examination'] : '' }}">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-xl-3">
													<label>QUANTITATIVE *</label>
													<input type="text" class="form-control"
													placeholder=""  name="gmat_quantitative" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_quantitative']) ? json_decode($students->test_attendance->score, true)['gmat_quantitative'] : '' }}">
												</div>

												<div class="form-group col-xl-3">
													<label>VERBAL *</label>
													<input type="text" class="form-control"
													placeholder=""  name="gmat_verbal"  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_verbal']) ? json_decode($students->test_attendance->score, true)['gmat_verbal'] : '' }}">
												</div>
												<div class="form-group col-xl-3">
													<label>ANALYTICAL WRITING *</label>
													<input type="text" class="form-control"
													placeholder=""  name="gmat_analytical_writing" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_analytical_writing']) ? json_decode($students->test_attendance->score, true)['gmat_analytical_writing'] : '' }}">
												</div>
												<div class="form-group col-xl-3">
													<label>INTEGRATED REASONING *</label>
													<input type="text" class="form-control"
													placeholder=""   name="gmat_analytical_integrated" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['gmat_analytical_integrated']) ? json_decode($students->test_attendance->score, true)['gmat_analytical_integrated'] : '' }}">
												</div>
											</div>

											<div class="row">
												<div
												class="form-group col-xl-12 text-center mt-4">
												<input id="gmat_btn" type="button"
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#gmat_btn').click(function() {
// Get the values of the input fields
					var gmat_overall_score = $('input[name="gmat_overall_score"]').val();
					var gmat_date_examination = $('input[name="gmat_date_examination"]').val();
					var gmat_quantitative = $('input[name="gmat_quantitative"]').val();
					var gmat_verbal = $('input[name="gmat_verbal"]').val();
					var gmat_analytical_writing = $('input[name="gmat_analytical_writing"]').val();
					var gmat_analytical_integrated = $('input[name="gmat_analytical_integrated"]').val();

// Check if the input fields are filled
					if (gmat_overall_score.trim() === '') {
						alert('Please enter the  gre overall score.');
						return;
					}

					if (gmat_date_examination.trim() === '') {
						alert('Please enter the gre eaxam date.');
						return;
					}

					if (gmat_quantitative.trim() === '') {
						alert('Please enter the gre exam qantitative.');
						return;
					}

					if (gmat_verbal.trim() === '') {
						alert('Please enter the gre exam verbal.');
						return;
					}

					if (gmat_analytical_writing.trim() === '') {
						alert('Please enter the gre analytical writing.');
						return;
					}

					if (gmat_analytical_integrated.trim() === '') {
						alert('Please enter the gre analytical writing.');
						return;
					}

// Create an object with the data to be sent
					var data = {
						gmat_overall_score: gmat_overall_score,
						gmat_date_examination: gmat_date_examination,
						gmat_quantitative: gmat_quantitative,
						gmat_verbal: gmat_verbal,
						gmat_analytical_writing: gmat_analytical_writing,
						gmat_analytical_integrated: gmat_analytical_integrated,
						_token: '{{ csrf_token() }}',
						student_id: '{{ $students->id }}'
					};

// Perform AJAX call
					$.ajax({
url: '{{ route("manage-students.gmat_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'GRE text added successfully.',
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
												placeholder="Enter Company Name" name="toefl_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_overall_score']) ? json_decode($students->test_attendance->score, true)['toefl_overall_score'] : '' }}">
											</div>

											<div class="form-group col-xl-6">
												<label>DATE OF EXAMINATION *</label>
												<input type="date" class="form-control"
												placeholder="Enter Location" name="toefl_date_of_examination" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_date_of_examination']) ? json_decode($students->test_attendance->score, true)['toefl_date_of_examination'] : '' }}">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-xl-3">
												<label>READING *</label>
												<input type="text" class="form-control"
												placeholder=""  name="toefl_reading" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_reading']) ? json_decode($students->test_attendance->score, true)['toefl_reading'] : '' }}">
											</div>

											<div class="form-group col-xl-3">
												<label>LISENING *</label>
												<input type="text" class="form-control"
												placeholder=""  name="toefl_lisenting" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_lisenting']) ? json_decode($students->test_attendance->score, true)['toefl_lisenting'] : '' }}">
											</div>
											<div class="form-group col-xl-3">
												<label>SPEAKING *</label>
												<input type="text" class="form-control"
												placeholder="" name="toefl_speking" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_speking']) ? json_decode($students->test_attendance->score, true)['toefl_speking'] : '' }}">
											</div>
											<div class="form-group col-xl-3">
												<label>WRITING *</label>
												<input type="text" class="form-control"
												placeholder=""  name="toefl_writing" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['toefl_writing']) ? json_decode($students->test_attendance->score, true)['toefl_writing'] : '' }}">
											</div>
										</div>

										<div class="row">
											<div
											class="form-group col-xl-12 text-center mt-4">
											<input id="toefl_btn" type="button"
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

	<script type="text/javascript">
		$(document).ready(function() {
			$('#toefl_btn').click(function() {
// Get the values of the input fields
				var toefl_overall_score = $('input[name="toefl_overall_score"]').val();
				var toefl_date_of_examination = $('input[name="toefl_date_of_examination"]').val();
				var toefl_reading = $('input[name="toefl_reading"]').val();
				var toefl_lisenting = $('input[name="toefl_lisenting"]').val();
				var toefl_speking = $('input[name="toefl_speking"]').val();
				var toefl_writing = $('input[name="toefl_writing"]').val();

// Check if the input fields are filled
				if (toefl_overall_score.trim() === '') {
					alert('Please enter the  toefl overall score.');
					return;
				}

				if (toefl_date_of_examination.trim() === '') {
					alert('Please enter the toefl eaxam date.');
					return;
				}

				if (toefl_reading.trim() === '') {
					alert('Please enter the toefl reading exam .');
					return;
				}

				if (toefl_lisenting.trim() === '') {
					alert('Please enter the toefl listening exam .');
					return;
				}

				if (toefl_speking.trim() === '') {
					alert('Please enter the toefl speaking exam.');
					return;
				}

				if (toefl_writing.trim() === '') {
					alert('Please enter the toefl writing exam.');
					return;
				}

// Create an object with the data to be sent
				var data = {
					toefl_overall_score: toefl_overall_score,
					toefl_date_of_examination: toefl_date_of_examination,
					toefl_reading: toefl_reading,
					toefl_lisenting: toefl_lisenting,
					toefl_speking: toefl_speking,
					toefl_writing: toefl_writing,
					_token: '{{ csrf_token() }}',
					student_id: '{{ $students->id }}'
				};

// Perform AJAX call
				$.ajax({
url: '{{ route("manage-students.toefl_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'TOEFL text added successfully.',
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
														<input type="radio" id="radio-111"
														name="yet_recieved_status" value="no"
														checked />
														<label for="radio-111">NO</label>
														<input type="radio" id="radio-222"
														name="yet_recieved_status" 
														value="yes" />
														<label for="radio-222">YES</label>
													</div>
												</div>
												<div class="form-group col-xl-10">
													<select class="form-control" name="ielts_nationality">
														@if(isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_nationality']))
														<option value="{{ json_decode($students->test_attendance->score, true)['ielts_nationality'] }}" selected>{{ json_decode($students->test_attendance->score, true)['ielts_nationality'] }}</option>
														@else
														<option value="">Select Nationality</option>
														@endif
														<option value="1">1</option>
														<option value="2">2</option>
													</select>
												</div>

											</div>
										</div>
										<div class="form-group col-xl-6">
											<label>TRF NO.</label>
											<input type="text" class="form-control"
											placeholder=""  name="ielts_trf_no" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_trf_no']) ? json_decode($students->test_attendance->score, true)['ielts_trf_no'] : '' }}">
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="row">
												<div class="form-group col-xl-12">

													<label>TEXT CENTER *</label>
													<Select class="form-control" name="ielts_center">
														@if(isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_center']))
														<option value="{{ json_decode($students->test_attendance->score, true)['ielts_center'] }}" selected>{{ json_decode($students->test_attendance->score, true)['ielts_center'] }}</option>
														@else
														<option value="">Select</option>
														@endif

														<option value="1">1</option>
														<option value="2">2</option>
													</Select>
												</div>
											</div>
										</div>
										<div class="form-group col-xl-6">
											<label>DATE OF EXAMINATION *</label>
											<input type="date" class="form-control"
											placeholder="" name="ielts_date_of_exam" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_date_of_exam']) ? json_decode($students->test_attendance->score, true)['ielts_date_of_exam'] : '' }}">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-xl-3">
											<label>READING *</label>
											<input type="text" class="form-control"
											placeholder=""  name="ielts_reading" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_reading']) ? json_decode($students->test_attendance->score, true)['ielts_reading'] : '' }}">
										</div>

										<div class="form-group col-xl-3">
											<label>LISENING *</label>
											<input type="text" class="form-control"
											placeholder="" name="ielts_listening" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_listening']) ? json_decode($students->test_attendance->score, true)['ielts_listening'] : '' }}">
										</div>
										<div class="form-group col-xl-3">
											<label>SPEAKING *</label>
											<input type="text" class="form-control"
											placeholder=""  name="ielts_speaking" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_speaking']) ? json_decode($students->test_attendance->score, true)['ielts_speaking'] : '' }}">
										</div>
										<div class="form-group col-xl-3">
											<label>WRITING *</label>
											<input type="text" class="form-control"
											placeholder=""  name="ielts_writing" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_writing']) ? json_decode($students->test_attendance->score, true)['ielts_writing'] : '' }}">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-xl-6">
											<label>OVERALL SCORE *</label>
											<input type="text" class="form-control"
											placeholder="" name="ielts_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['ielts_overall_score']) ? json_decode($students->test_attendance->score, true)['ielts_overall_score'] : '' }}">
										</div>
									</div>

									<div class="row">
										<div
										class="form-group col-xl-12 text-center mt-4">
										<input id="IELTS_btn" type="button"
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#IELTS_btn').click(function() {
			var ielts_nationality = $('select[name="ielts_nationality"]').val();
			var ielts_trf_no = $('input[name="ielts_trf_no"]').val();
			var ielts_center = $('select[name="ielts_center"]').val();
			var ielts_date_of_exam = $('input[name="ielts_date_of_exam"]').val();
			var ielts_reading = $('input[name="ielts_reading"]').val();
			var ielts_listening = $('input[name="ielts_listening"]').val();
			var ielts_speaking = $('input[name="ielts_speaking"]').val();
			var ielts_writing = $('input[name="ielts_writing"]').val();
			var ielts_overall_score = $('input[name="ielts_overall_score"]').val();

			var status = $('input[name="yet_recieved_status"]:checked').val();

			if (status === 'no') {
// Check if the input fields are filled
				if (ielts_nationality.trim() === '') {
					alert('Please enter the IELTS nationality.');
					return;
				}

				if (ielts_date_of_exam.trim() === '') {
					alert('Please enter the IELTS exam date.');
					return;
				}

				if (ielts_reading.trim() === '') {
					alert('Please enter the IELTS reading exam score.');
					return;
				}

				if (ielts_listening.trim() === '') {
					alert('Please enter the IELTS listening exam score.');
					return;
				}

				if (ielts_speaking.trim() === '') {
					alert('Please enter the IELTS speaking exam score.');
					return;
				}

				if (ielts_writing.trim() === '') {
					alert('Please enter the IELTS writing exam score.');
					return;
				}

				if (ielts_center.trim() === '') {
					alert('Please enter the IELTS  exam center.');
					return;
				}

				if (ielts_overall_score.trim() === '') {
					alert('Please enter the IELTS  over all score.');
					return;
				}

// Create an object with the data to be sent
				var data = {
					ielts_nationality: ielts_nationality,
					ielts_trf_no: ielts_trf_no,
					ielts_center:ielts_center,
					ielts_date_of_exam: ielts_date_of_exam,
					ielts_reading: ielts_reading,
					ielts_listening: ielts_listening,
					ielts_speaking: ielts_speaking,
					ielts_writing: ielts_writing,
					ielts_overall_score: ielts_overall_score,
					_token: '{{ csrf_token() }}',
					student_id: '{{ $students->id }}'
				};

// Perform AJAX call
				$.ajax({
url: '{{ route("manage-students.ielts_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'IELTS test added successfully.',
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
			} else {
				Swal.fire(
					'Error!',
					'Please select "NO" for "YET TO RECEIVE?"',
					'error'
					);
			}
		});
	});

</script>
<script type="text/javascript">
// Add event listener to the radio buttons
	$('select[name="ielts_nationality"]').prop('disabled', false);
	$('input[name="yet_recieved_status"]').change(function() {
		if ($(this).val() === 'yes') {
// Enable another_nationality select element
			$('select[name="ielts_nationality"]').prop('disabled', true);
			$('input[name="ielts_trf_no"]').prop('disabled', true);
			$('select[name="ielts_center"]').prop('disabled', true);
			$('input[name="ielts_date_of_exam"]').prop('disabled', true);
			$('input[name="ielts_reading"]').prop('disabled', true);
			$('input[name="ielts_listening"]').prop('disabled', true);
			$('input[name="ielts_speaking"]').prop('disabled', true);
			$('input[name="ielts_writing"]').prop('disabled', true);
			$('input[name="ielts_overall_score"]').prop('disabled', true);

			$('select[name="ielts_nationality"]').val(null);
			$('input[name="ielts_trf_no"]').val(null);
			$('select[name="ielts_center"]').val(null);
			$('input[name="ielts_date_of_exam"]').val(null);
			$('input[name="ielts_reading"]').val(null);
			$('input[name="ielts_listening"]').val(null);
			$('input[name="ielts_speaking"]').val(null);
			$('input[name="ielts_writing"]').val(null);
			$('input[name="ielts_overall_score"]').val(null);
			$('#radio-111').prop('checked', false);
			$('#radio-222').prop('checked', true);

		} else {
// Disable another_nationality select element
			$('select[name="ielts_nationality"]').prop('disabled', false);
			$('input[name="ielts_trf_no"]').prop('disabled', false);
			$('select[name="ielts_center"]').prop('disabled', false);
			$('input[name="ielts_date_of_exam"]').prop('disabled', false);
			$('input[name="ielts_reading"]').prop('disabled', false);
			$('input[name="ielts_listening"]').prop('disabled', false);
			$('input[name="ielts_speaking"]').prop('disabled', false);
			$('input[name="ielts_writing"]').prop('disabled', false);
			$('input[name="ielts_overall_score"]').prop('disabled', false);

		}
	});
</script>






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
										placeholder="Enter Company Name" name="pte_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_overall_score']) ? json_decode($students->test_attendance->score, true)['pte_overall_score'] : '' }}">
									</div>

									<div class="form-group col-xl-6">
										<label>DATE OF EXAMINATION *</label>
										<input type="date" class="form-control"
										placeholder="Enter Location" name="pte_date_of_exam" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_date_of_exam']) ? json_decode($students->test_attendance->score, true)['pte_date_of_exam'] : '' }}">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xl-3">
										<label>READING *</label>
										<input type="text" class="form-control"
										placeholder=""  name="pte_reading" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_reading']) ? json_decode($students->test_attendance->score, true)['pte_reading'] : '' }}">
									</div>

									<div class="form-group col-xl-3">
										<label>LISENING *</label>
										<input type="text" class="form-control"
										placeholder="" name="pte_listening" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_listening']) ? json_decode($students->test_attendance->score, true)['pte_listening'] : '' }}">
									</div>
									<div class="form-group col-xl-3">
										<label>SPEAKING *</label>
										<input type="text" class="form-control"
										placeholder="" name="pte_speaking" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_speaking']) ? json_decode($students->test_attendance->score, true)['pte_speaking'] : '' }}">
									</div>
									<div class="form-group col-xl-3">
										<label>WRITING *</label>
										<input type="text" class="form-control"
										placeholder="" name="pte_writing" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['pte_writing']) ? json_decode($students->test_attendance->score, true)['pte_writing'] : '' }}">
									</div>
								</div>

								<div class="row">
									<div
									class="form-group col-xl-12 text-center mt-4">
									<input id="pte_btn" type="button"
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#pte_btn').click(function() {
// Get the values of the input fields
			var pte_overall_score = $('input[name="pte_overall_score"]').val();
			var pte_date_of_exam = $('input[name="pte_date_of_exam"]').val();
			var pte_reading = $('input[name="pte_reading"]').val();
			var pte_listening = $('input[name="pte_listening"]').val();
			var pte_speaking = $('input[name="pte_speaking"]').val();
			var pte_writing = $('input[name="pte_writing"]').val();

// Check if the input fields are filled
			if (pte_overall_score.trim() === '') {
				alert('Please enter the PTE overall score.');
				return;
			}

			if (pte_date_of_exam.trim() === '') {
				alert('Please enter the PTE exam date.');
				return;
			}

			if (pte_reading.trim() === '') {
				alert('Please enter the PTE reading exam score.');
				return;
			}

			if (pte_listening.trim() === '') {
				alert('Please enter the PTE listening exam score.');
				return;
			}

			if (pte_speaking.trim() === '') {
				alert('Please enter the PTE speaking exam score.');
				return;
			}

			if (pte_writing.trim() === '') {
				alert('Please enter the PTE writing exam score.');
				return;
			}

// Create an object with the data to be sent
			var data = {
				pte_overall_score: pte_overall_score,
				pte_date_of_exam: pte_date_of_exam,
				pte_reading: pte_reading,
				pte_listening: pte_listening,
				pte_speaking: pte_speaking,
				pte_writing: pte_writing,
				_token: '{{ csrf_token() }}',
				student_id: '{{ $students->id }}'
			};

// Perform AJAX call
			$.ajax({
url: '{{ route("manage-students.pte_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'PTE test added successfully.',
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
										placeholder="Enter Company Name" name="det_overall_score" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['det_overall_score']) ? json_decode($students->test_attendance->score, true)['det_overall_score'] : '' }}">
									</div>

									<div class="form-group col-xl-6">
										<label>DATE OF EXAMINATION *</label>
										<input type="date" class="form-control"
										placeholder="Enter Location" name="det_date_of_exam" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['det_date_of_exam']) ? json_decode($students->test_attendance->score, true)['det_date_of_exam'] : '' }}">
									</div>
								</div>
								<div class="row">
									<div
									class="form-group col-xl-12 text-center mt-4">
									<input id="det_btn" type="button"
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#det_btn').click(function() {
// Get the values of the input fields
			var det_overall_score = $('input[name="det_overall_score"]').val();
			var det_date_of_exam = $('input[name="det_date_of_exam"]').val();

// Check if the input fields are filled
			if (det_overall_score.trim() === '') {
				alert('Please enter the DET overall score.');
				return;
			}

			if (det_date_of_exam.trim() === '') {
				alert('Please enter the DET exam date.');
				return;
			}

// Create an object with the data to be sent
			var data = {
				det_overall_score: det_overall_score,
				det_date_of_exam: det_date_of_exam,
				_token: '{{ csrf_token() }}',
				student_id: '{{ $students->id }}'
			};

// Perform AJAX call
			$.ajax({
url: '{{ route("manage-students.det_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'DET test added successfully.',
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
										<input type="text" class="form-control" id="overall_score" name="sat_overall_score" placeholder="Enter Company Name" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_overall_score']) ? json_decode($students->test_attendance->score, true)['sat_overall_score'] : '' }}">
									</div>
									<div class="form-group col-xl-6">
										<label for="exam_date">DATE OF EXAMINATION *</label>
										<input type="date" class="form-control" id="exam_date" name="sat_exam_date" placeholder="Enter Location"  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_exam_date']) ? json_decode($students->test_attendance->score, true)['sat_exam_date'] : '' }}">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xl-4">
										<label for="reading_writing">READING &amp; WRITING *</label>
										<input type="text" class="form-control" id="reading_writing" name="sat_reading_writing" placeholder=""  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_reading_writing']) ? json_decode($students->test_attendance->score, true)['sat_reading_writing'] : '' }}">
									</div>
									<div class="form-group col-xl-4">
										<label for="math">MATH *</label>
										<input type="text" class="form-control" id="math" name="sat_math" placeholder="" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_math']) ? json_decode($students->test_attendance->score, true)['sat_math'] : '' }}">
									</div>
									<div class="form-group col-xl-4">
										<label for="essay">ESSAY *</label>
										<input type="text" class="form-control" id="essay" name="sat_essay" placeholder="" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_essay']) ? json_decode($students->test_attendance->score, true)['sat_essay'] : '' }}">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xl-12">
										<label for="remarks">REMARKS</label>
										<textarea class="form-control" id="editor" name="sat_remarks" rows="3">
											{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['sat_remarks']) ? json_decode($students->test_attendance->score, true)['sat_remarks'] : '' }}
										</textarea>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xl-12 text-center mt-4">
										<input id="sat_btn" type="button" class="footer-btn btn-active" value="Save">
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
	$(document).ready(function() {
		$('#sat_btn').click(function() {
// Get the values of the input fields
			var sat_overall_score = $('input[name="sat_overall_score"]').val();
			var sat_exam_date = $('input[name="sat_exam_date"]').val();
			var sat_reading_writing = $('input[name="sat_reading_writing"]').val();
			var sat_math = $('input[name="sat_math"]').val();
			var sat_essay = $('input[name="sat_essay"]').val();
			var sat_remarks = $('textarea[name="sat_remarks"]').val();

// Check if the input fields are filled
			if (sat_overall_score.trim() === '') {
				alert('Please enter the SAT overall score.');
				return;
			}

			if (sat_exam_date.trim() === '') {
				alert('Please enter the SAT exam date.');
				return;
			}

// Create an object with the data to be sent
			var data = {
				sat_overall_score: sat_overall_score,
				sat_exam_date: sat_exam_date,
				sat_reading_writing: sat_reading_writing,
				sat_math: sat_math,
				sat_essay: sat_essay,
				sat_remarks: sat_remarks,
				_token: '{{ csrf_token() }}',
				student_id: '{{ $students->id }}'
			};

// Perform AJAX call
			$.ajax({
url: '{{ route("manage-students.sat_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'SAT test added successfully.',
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
										placeholder="Enter Company Name" name="act_overall_score"  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_overall_score']) ? json_decode($students->test_attendance->score, true)['act_overall_score'] : '' }}">
									</div>

									<div class="form-group col-xl-6">
										<label>DATE OF EXAMINATION *</label>
										<input type="date" class="form-control"
										placeholder="" name="act_date_of_exam" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_date_of_exam']) ? json_decode($students->test_attendance->score, true)['act_date_of_exam'] : '' }}">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-xl-3">
										<label>READING *</label>
										<input type="text" class="form-control"
										placeholder="" name="act_reading" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_reading']) ? json_decode($students->test_attendance->score, true)['act_reading'] : '' }}">
									</div>
									<div class="form-group col-xl-3">
										<label>MATH *</label>
										<input type="text" class="form-control"
										placeholder="" name="act_math"  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_math']) ? json_decode($students->test_attendance->score, true)['act_math'] : '' }}">
									</div>


									<div class="form-group col-xl-3">
										<label>SCIENCE *</label>
										<input type="text" class="form-control"
										placeholder="" name="act_science" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_science']) ? json_decode($students->test_attendance->score, true)['act_science'] : '' }}">
									</div>
									<div class="form-group col-xl-3">
										<label>ENGLISH *</label>
										<input type="text" class="form-control"
										placeholder="" name="act_english" value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_english']) ? json_decode($students->test_attendance->score, true)['act_english'] : '' }}">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-xl-6">
										<label>WRITING *</label>
										<input type="text" class="form-control"

										placeholder="Enter Company Name" name="act_writing"  value="{{ isset($students->test_attendance) && isset(json_decode($students->test_attendance->score, true)['act_writing']) ? json_decode($students->test_attendance->score, true)['act_writing'] : '' }}">
									</div>
								</div>

								<div class="row">
									<div
									class="form-group col-xl-12 text-center mt-4">
									<input id="act_btn" type="button"
									class="footer-btn btn-active"
									value="Save">
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<script type="text/javascript">
				$(document).ready(function() {
					$('#act_btn').click(function() {
// Get the values of the input fields
						var act_overall_score = $('input[name="act_overall_score"]').val();
						var act_date_of_exam = $('input[name="act_date_of_exam"]').val();
						var act_reading = $('input[name="act_reading"]').val();
						var act_math = $('input[name="act_math"]').val();
						var act_science = $('input[name="act_science"]').val();
						var act_english = $('input[name="act_english"]').val();
						var act_writing = $('input[name="act_writing"]').val();

// Check if the input fields are filled
						if (act_overall_score.trim() === '') {
							alert('Please enter the ACT overall score.');
							return;
						}

						if (act_date_of_exam.trim() === '') {
							alert('Please enter the ACT exam date.');
							return;
						}

// Create an object with the data to be sent
						var data = {
							act_overall_score: act_overall_score,
							act_date_of_exam: act_date_of_exam,
							act_reading: act_reading,
							act_math: act_math,
							act_science: act_science,
							act_english: act_english,
							act_writing: act_writing,
							_token: '{{ csrf_token() }}',
							student_id: '{{ $students->id }}'
						};

// Perform AJAX call
						$.ajax({
url: '{{ route("manage-students.act_test") }}', // Replace with your actual URL
method: 'POST', // Replace with your desired HTTP method
data: data,
success: function(response) {
// Handle successful response
	console.log(response);

	Swal.fire(
		'Success!',
		'ACT test added successfully.',
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
				const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");


const firstInputBox = accordionItemHeaders[0].nextElementSibling.querySelector("input");


if (firstInputBox && firstInputBox.value.trim() !== '') {
  accordionItemHeaders.forEach(accordionItemHeader => {
    accordionItemHeader.classList.add("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
  });
}

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if (accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    } else {
      accordionItemBody.style.maxHeight = 0;
    }
  });
});

			</script>


			 <style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>
           
 

                @include('layout.footer')