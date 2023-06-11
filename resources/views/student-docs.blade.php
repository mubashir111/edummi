@include('layout.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style type="text/css">
                th,tbody{
                    text-align: left !important;
                }
            </style>

            <div class="page-content">
                <div class="container-fluid">
                    

                    <h5><a href="assigned-students.html" style="color: black;">
                            <span class="mdi mdi-chevron-left"></span></a>@foreach ($students as $student) {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}} @endforeach</h5>
                   
                    

                    <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #000; font-weight: bolder;">REGISTER NEW STUDENT</h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('manage-students.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                         

                            <div class="row mt-4">
                                <div class="form-group col-xl-12">
                                   <label>FIRST NAME *</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="form-group col-xl-12">
                                    <label>MIDDLE NAME</label>
                                        <input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>LAST NAME *</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>MOBILE NUMBER *</label>
                                    <input type="text" name="number" class="form-control" placeholder="Enter Mobile Number " required>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="form-group col-xl-12">
                                        <label>EMAIL ADDRESS *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </div>

                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>STUDENTS IMAGE  *</label>
                                    <input type="file" name="students_image[]" class="form-control" >
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="form-group col-xl-12  mt-4">
                                    <input type="submit" class="footer-btn btn-active" value="Save">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>

                    <div class="row">

                        <div class="col-xl-12 col-sm-12">
                            <div class="card mini-stat ">
                                <div class="card-body mini-stat-img">
                                    <table id="myTable" class="table table-striped table-bordered  text-left" style="width:100%">
                                        <thead class=" text-left">
                                            <tr>

                                                <th>SL NO.</th>
                                                <th>DOCUMENT NAME</th>
                                                <th>FILE</th>
                                               
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    @php $i=1 ; $student=$students ;@endphp
    @foreach ($students as $student)
        <tr>
            <td>1</td>
            <td>9th Marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"9th_Marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"9th_Marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>10th Marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"10th_Marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"10th_Marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>11th Marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"11th_Marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"11th_Marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>12th Marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"12th_Marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"12th_Marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>5</td>
            <td>Bachlors Marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"bachlors_marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"bachlors_marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>6</td>
            <td>consolidate marksheet</td>
            <td>
                @php
                    if(isset($student->document->{"consolidate_marksheet_url"})) {
                        echo "<a href='../" . $student->document->{"consolidate_marksheet_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


         <tr>
            <td>7</td>
            <td>acadamic transcript</td>
            <td>
                @php
                    if(isset($student->document->{"acadamic_transcript_url"})) {
                        echo "<a href='../" . $student->document->{"acadamic_transcript_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>

        <tr>
            <td>8</td>
            <td>final degree</td>
            <td>
                @php
                    if(isset($student->document->{"final_degree_url"})) {
                        echo "<a href='../" . $student->document->{"final_degree_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>9</td>
            <td>Application form</td>
            <td>
                @php
                    if(isset($student->document->{"application_form_url"})) {
                        echo "<a href='../" . $student->document->{"application_form_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>10</td>
            <td>Passport file</td>
            <td>
                @php
                    if(isset($student->document->{"passport_file_url"})) {
                        echo "<a href='../" . $student->document->{"passport_file_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>



         <tr>
            <td>11</td>
            <td>Statment purpose</td>
            <td>
                @php
                    if(isset($student->document->{"statment_purpose_url"})) {
                        echo "<a href='../" . $student->document->{"statment_purpose_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


         <tr>
            <td>12</td>
            <td>CV</td>
            <td>
                @php
                    if(isset($student->document->{"cv_url"})) {
                        echo "<a href='../" . $student->document->{"cv_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


<tr>
            <td>13</td>
            <td>latter of recomentation</td>
            <td>
                @php
                    if(isset($student->document->{"latter_of_recomentation_url"})) {
                        echo "<a href='../" . $student->document->{"latter_of_recomentation_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>




        <tr>
            <td>14</td>
            <td>english certificate</td>
            <td>
                @php
                    if(isset($student->document->{"english_certificate_url"})) {
                        echo "<a href='../" . $student->document->{"english_certificate_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>15</td>
            <td>bank balance</td>
            <td>
                @php
                    if(isset($student->document->{"bank_balance_url"})) {
                        echo "<a href='../" . $student->document->{"bank_balance_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>



         <tr>
            <td>16</td>
            <td>financial affidavit</td>
            <td>
                @php
                    if(isset($student->document->{"financial_affidavit_url"})) {
                        echo "<a href='../" . $student->document->{"financial_affidavit_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


       <tr>
            <td>17</td>
            <td>gap explanation letter</td>
            <td>
                @php
                    if(isset($student->document->{"gap_explanation_letter_url"})) {
                        echo "<a href='../" . $student->document->{"gap_explanation_letter_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>



        <tr>
            <td>17</td>
            <td>Online Submission Configaration</td>
            <td>
                @php
                    if(isset($student->document->{"Online_Submission_Configaration_url"})) {
                        echo "<a href='../" . $student->document->{"Online_Submission_Configaration_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>



        <tr>
            <td>18</td>
            <td>sat file</td>
            <td>
                @php
                    if(isset($student->document->{"sat_file_url"})) {
                        echo "<a href='../" . $student->document->{"sat_file_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


         <tr>
            <td>19</td>
            <td>GRE</td>
            <td>
                @php
                    if(isset($student->document->{"gre_url"})) {
                        echo "<a href='../" . $student->document->{"gre_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>19</td>
            <td>GMAT</td>
            <td>
                @php
                    if(isset($student->document->{"gmat_url"})) {
                        echo "<a href='../" . $student->document->{"gmat_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>20</td>
            <td>TOEFL</td>
            <td>
                @php
                    if(isset($student->document->{"toefl_url"})) {
                        echo "<a href='../" . $student->document->{"toefl_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>21</td>
            <td>Ielts file</td>
            <td>
                @php
                    if(isset($student->document->{"ielts_file_url"})) {
                        echo "<a href='../" . $student->document->{"ielts_file_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>

         <tr>
            <td>22</td>
            <td>PTE file</td>
            <td>
                @php
                    if(isset($student->document->{"pte_url"})) {
                        echo "<a href='../" . $student->document->{"pte_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>


        <tr>
            <td>23</td>
            <td>Exempyion Certicate</td>
            <td>
                @php
                    if(isset($student->document->{"exempyion_certificate_url"})) {
                        echo "<a href='../" . $student->document->{"exempyion_certificate_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>
      
      <tr>
            <td>24</td>
            <td>Additional Documents</td>
            <td>
                @php
                    if(isset($student->document->{"additional_documents_url"})) {
                        echo "<a href='../" . $student->document->{"additional_documents_url"} . "'>View</a>";
                    } else {
                        echo "<div>Not uploaded</div>";
                    }
                @endphp
            </td>
             
            <td class="">
                <a href='{{ route("document.edit", ["id" =>$student->id]) }}'>
                    <button style="border: Solid 1px;border-radius: 5px;">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>




    @endforeach
</tbody>

                                    </table>

                                 

                                </div>

                              <script type="text/javascript">
    $("#myModal1 #employe_input").hide();

    // Get a reference to the select element
    var departmentList = $("#myModal1 #department_list");
    var employeeInput = $("#myModal1 #employe_input");

    var employeelist = $("#myModal1 #employee_list");

    // Add an event listener to the select element
    departmentList.on("change", function() {
        // Get the selected value of the select element
        var selectedValue = departmentList.val();

        // Make an AJAX request using jQuery
        $.ajax({
            type: 'POST',
            url: '{{ route("departmentemployee") }}',
            data: {
                _token: '{{ csrf_token() }}',
                selected_value: selectedValue
            },
            dataType: "json",
            success: function(responseData) {
                // Show the employee input
                employeeInput.show();

                // Get the employees from the response data
                var employees = responseData.employees;

                // Clear the options from the department list
                employeelist.empty();

                // Add a default option to the department list
                employeelist.append("<option value=''>Select</option>");

                // Loop through the employees and add each one to the department list
                $.each(employees, function(index, employee) {
                    employeelist.append("<option value='" + employee.id + "'>" + employee.name + "</option>");
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Request failed. Returned status of " + jqXHR.status);
            }
        });
    });
</script>





                                <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            var modal1 = document.getElementById("myModal1");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = $(".close");

            

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

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

        <script>
            // Get the modal
            var modal1 = document.getElementById("myModal1");



            // Get the button that opens the modal
            var btn = document.getElementById("myBtn1");

            // Get the <span> element that closes the modal
            var span1 = document.getElementsByClassName("close")[0];

            var span2 = $("#myModal1 .close")

            // When the user clicks the button, open the modal 
            // btn.onclick = function () {
            //     modal.style.display = "block";
            // }
            $(".myBtn1").on("click", function (e) {
                e.preventDefault();
                
               
                $("input[name='student_id']").val($(this).attr("st_id"));
                modal1.style.display = "block";
            })

            // When the user clicks on <span> (x), close the modal
            span1.onclick = function () {
                modal.style.display = "none";
            }

             span2.onclick = function () {
                modal1.style.display = "none";
            }

             

             $(".card-body .close").on("click",function(e){
                 modal1.style.display = "none";
             })

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


        </script>

         <script>
                $(document).ready(function () {
                    let table = new DataTable('#myTable', {
                        responsive: true,
                        
                    });
                });

            </script>
                            

                
             <style>
           .text-right{text-align: right;}
       </style>
           
 

                @include('layout.footer')

