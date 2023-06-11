@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <style>
            .custom-button {
    padding: 8px;
    color: white;
    float: right;
    background-color: #1F92D1;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
        </style>
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
                                    class="btn-ma btn-active"></a>
                        </div>
                        <div class="col-xl-2 mb-4">
                            <a href="{{ route('visa-student-application',$students->id)}}"><input type="button" value="Applications"
                                    class="btn-ma"></a>
                        </div>

                         <div class="col-xl-2 mb-4">
                            <a href="{{ route('verified-tests.edit', ['id' => $students->id]) }}"><input type="button" value="Tests"
                                    class="btn-ma"></a>
                        </div>

                        
                    </div>

                 

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
                            @if (isset($students->document->{"9th_Marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"9th_Marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">

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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="10th_marksheet[]" />
                            @if (isset($students->document->{"10th_Marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"10th_Marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="11th_marksheet[]" />
                            @if (isset($students->document->{"11th_Marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"11th_Marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="12th_marksheet[]" />
                            @if (isset($students->document->{"12th_Marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"12th_Marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="bachlors_marksheet[]" />
                            @if (isset($students->document->{"bachlors_marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"bachlors_marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="consolidate_marksheet[]" />
                            @if (isset($students->document->{"consolidate_marksheet_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"consolidate_marksheet_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="acadamic_transcript[]" />
                            @if (isset($students->document->{"acadamic_transcript_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"acadamic_transcript_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="final_degree[]" />
                            @if (isset($students->document->{"final_degree_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"final_degree_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="application_form[]" />
                            @if (isset($students->document->{"application_form_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"application_form_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="passport_file[]" />
                            @if (isset($students->document->{"passport_file_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"passport_file_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden"  name="statment_purpose[]" />
                            @if (isset($students->document->{"statment_purpose_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"statment_purpose_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="cv[]" />
                            @if (isset($students->document->{"cv_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"cv_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="latter_of_recomentation[]" />
                            @if (isset($students->document->{"latter_of_recomentation_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"latter_of_recomentation_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="english_certificate[]" />
                            @if (isset($students->document->{"english_certificate_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"english_certificate_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="bank_balance[]" />
                            @if (isset($students->document->{"bank_balance_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"bank_balance_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="financial_affidavit[]" />
                            @if (isset($students->document->{"financial_affidavit_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"financial_affidavit_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="gap_explanation_letter[]" />
                            @if (isset($students->document->{"gap_explanation_letter_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"gap_explanation_letter_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="Online_Submission_Configaration[]" />
                            @if (isset($students->document->{"Online_Submission_Configaration_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"Online_Submission_Configaration_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="sat_file[]" />
                            @if (isset($students->document->{"sat_file_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"sat_file_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="gre[]" />
                            @if (isset($students->document->{"gre_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"gre_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="gmat[]" />
                            @if (isset($students->document->{"gmat_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"gmat_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden"  name="toefl[]" />
                            @if (isset($students->document->{"toefl_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"toefl_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" name="ielts_file[]" hidden="hidden" />
                            @if (isset($students->document->{"ielts_file_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"ielts_file_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="pte[]" />
                            @if (isset($students->document->{"pte_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"pte_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="exempyion_certificate[]" />
                            @if (isset($students->document->{"exempyion_certificate_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"exempyion_certificate_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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
                        <div class="col-xl-10">
                            <input type="file" id="real-file" hidden="hidden" name="additional_documents[]" />
                            @if (isset($students->document->{"additional_documents_url"}))
                            <span class="custom-text">File chosen: {{ $students->document->{"additional_documents_url"} }}</span>
                            @else
                            <span class="custom-text">No file chosen, yet.</span>
                            @endif
                        </div>
                        <div class="col-xl-2">
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

                </div>
            </div>
            <!-- end row -->

            <!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                ©
                                <script>document.write(new Date().getFullYear())</script> EDUMMI UNIVERSE <span
                                    class="d-none d-sm-inline-block"> by GREENWORLD International</span>
                            </div>
                        </div>
                    </div>
                </footer> -->
        </div>

    </div>

    <style>
           .text-right{text-align: right;}
           th{
            text-align:left !important;
           }
       </style>
           
 

                @include('layout.footer')