@php
$user = Auth::user();
$reg_id = $user->reg_id;
$application = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->first();    
@endphp

@extends('layouts.sidebar')

@section('content')


{{-- @dd($application) --}}
@php($user = Auth::user())

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Preview Application Form</h1>
                        <div class="page-header-subtitle">
                            Diploma Course in Guidance and Counselling (2021)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="inner-container container-xl">
        <div class="application-form shadow">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif

            <div class='preview mt-4'>
                <div class="data ">
                    <div class="row">
                        <div class="col-sm-2 text-center photo">
                            <img src="{{ asset('storage/'.$application->candidate_photo) }}" width="65%" >
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Application Id</th>
                                        <td colspan="3"><strong>{{$application->application_id}}</strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td colspan="3">{{$application->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td>{{$application->gender}}</td>
                                        <th scope="row">Date of Birth</th>
                                        <td>{{$application->dob}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nationality</th>
                                        <td>{{$application->nationality}}</td>
                                        <th scope="row">Category</th>
                                        <td>{{$application->category}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile Number</th>
                                        <td>{{$application->p_mobile}}</td>
                                        <th scope="row">Telephone Number</th>
                                        <td>{{$application->p_telephone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">State/UT</th>
                                        <td>{{$application->sc_state}}</td>
                                        <th scope="row">Study Centre</th>
                                        <td>{{$application->study_centre}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                       
                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                              <td colspan="6" class="bg"><h5>Present Address</h5></td>
                          </tr>
                          <tr>
                              
                              <th scope="row">Address</th>
                              <td>{{$application->p_address}}</td>
                              <th scope="row">City</th>
                              <td>{{$application->p_city}}</td>
                              <th scope="row"> State</th>
                              <td>{{$application->p_state}}</td>
                          </tr>
                          <tr>
                              
                              <th scope="row"> Pin Code</th>
                              <td>{{$application->p_zip}}</td>
                              <th scope="row">Telephone Number</th>
                              <td>{{$application->p_telephone}}</td>
                              <th scope="row">Mobile Number</th>
                              <td>{{$application->p_mobile}}</td>
                          </tr>
                          <tr>
                              <th scope="row">Email</th>
                              <td>{{$application->p_email}}</td>
                              <th scope="row"></th>
                              <td></td>
                              <th scope="row"></th>
                              <td></td>
                          </tr>
                          <tr>
                              <td colspan="6" class="bg"><h5>Present Occupation and Official Address</h5></td>
                          </tr>
                          <tr>
                              <th scope="row">Occupation</th>
                              <td>{{$application->occupation}}</td>
                              <th scope="row">Address</th>
                              <td>{{$application->o_address}}</td>
                              <th scope="row">City</th>
                              <td>{{$application->o_city}}</td>
                          </tr>
                          <tr>
                              <th scope="row">State</th>
                              <td>{{$application->o_state}}</td>
                              <th scope="row">Pin Code</th>
                              <td>{{$application->o_zip}}</td>
                              <th scope="row"></th>
                              <td></td>
                          </tr>
                        </tbody>
                      </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="6" class="bg"><h5>Details of Educational Qualifications (final school examination onwards)</h5></td>
                                </tr>
                                <tr>
                                <th scope="col">Examinations Passed</th>
                                <th scope="col">Examining Body</th>
                                <th scope="col">Year</th>
                                <th scope="col">%age of marks/Grade Point</th>
                                <th scope="col">Subject(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">High School</th>
                                    <td>{{$application->eq_board_x}}</td>
                                    <td>{{$application->eq_year_x}}</td>
                                    <td>{{$application->eq_marks_x}}</td>
                                    <td>{{$application->eq_subject_x}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Intermediate</th>
                                    <td>{{$application->eq_board_xii}}</td>
                                    <td>{{$application->eq_year_xii}}</td>
                                    <td>{{$application->eq_marks_xii}}</td>
                                    <td>{{$application->eq_subject_xii}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Graduation</th>
                                    <td>{{$application->eq_board_grad}}</td>
                                    <td>{{$application->eq_year_grad}}</td>
                                    <td>{{$application->eq_marks_grad}}</td>
                                    <td>{{$application->eq_subject_grad}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Post Graduation</th>
                                    <td>{{$application->eq_board_pgrad}}</td>
                                    <td>{{$application->eq_year_pgrad}}</td>
                                    <td>{{$application->eq_marks_pgrad}}</td>
                                    <td>{{$application->eq_subject_pgrad}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{$application->eq_exam_oth1}} <br> {{$application->eq_exam_oth2}} <br> {{$application->eq_exam_oth3}}</th>
                                    <td>{{$application->eq_board_oth1}} <br> {{$application->eq_board_oth2}} <br> {{$application->eq_board_oth3}}</td>
                                    <td>{{$application->eq_year_oth1}} <br> {{$application->eq_year_oth2}} <br> {{$application->eq_year_oth3}}</td>
                                    <td>{{$application->eq_marks_oth1}} <br> {{$application->eq_marks_oth2}} <br> {{$application->eq_marks_oth3}}</td>
                                    <td>{{$application->eq_subject_oth1}} <br> {{$application->eq_subject_oth2}} <br> {{$application->eq_subject_oth3}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="6" class="bg"><h5>Details of Professional Qualifications</h5></td>
                                </tr>
                                <tr>
                                  <th scope="col">Examinations Passed</th>
                                  <th scope="col">Examining Body</th>
                                  <th scope="col">Year</th>
                                  <th scope="col">%age of marks/Grade Point</th>
                                  <th scope="col">Subject(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$application->pq_degree}} <br> {{$application->pq_degree1}} <br> {{$application->pq_degree2}} <br> {{$application->pq_degree3}}</th>
                                    <td>{{$application->pq_board}} <br> {{$application->pq_board1}} <br> {{$application->pq_board2}} <br> {{$application->pq_board3}}</td>
                                    <td>{{$application->pq_year}} <br> {{$application->pq_year1}} <br> {{$application->pq_year2}} <br> {{$application->pq_year3}}</td>
                                    <td>{{$application->pq_marks}} <br> {{$application->pq_marks1}} <br> {{$application->pq_marks2}} <br> {{$application->pq_marks3}}</td>
                                    <td>{{$application->pq_subject}} <br> {{$application->pq_subject1}} <br> {{$application->pq_subject2}} <br> {{$application->pq_subject3}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="6"><h5>Work/Professional Experience</h5></td>
                                    </tr>
                                    <tr>
                                    <th scope="col">Employer</th>
                                    <th scope="col">Position Held</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Nature of Duties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{$application->work_exp_name}} <br> {{$application->work_exp_name1}} <br> {{$application->work_exp_name2}} <br> {{$application->work_exp_name3}}</th>
                                        <td>{{$application->work_exp_position}} <br> {{$application->work_exp_position1}} <br> {{$application->work_exp_position2}} <br> {{$application->work_exp_position3}}</td>
                                        <td>{{$application->work_exp_date_from}} <br> {{$application->work_exp_date_from1}} <br> {{$application->work_exp_date_from2}} <br>{{$application->work_exp_date_from3}}</td>
                                        <td>{{$application->work_exp_date_to}} <br> {{$application->work_exp_date_to1}} <br> {{$application->work_exp_date_to2}} <br> {{$application->work_exp_date_to3}}</td>
                                        <td>{{$application->work_exp_duty}} <br> {{$application->work_exp_duty1}} <br> {{$application->work_exp_duty2}} <br> {{$application->work_exp_duty3}} <br></td>
                                    </tr>
                                </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="6" class="bg"><h5>Short-Term Course/Training Attended in the Related Fields</h5></td>
                                </tr>
                                <tr>
                                  <th scope="col">Name of Course/Training</th>
                                  <th scope="col">Institute</th>
                                  <th scope="col">Year</th>
                                  <th scope="col">Duration of Course/Training</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <td>{{$application->course}} <br> {{$application->course1}} <br> {{$application->course2}} <br> {{$application->course3}} </td>
                                        <td>{{$application->course_institute}} <br> {{$application->course_institute1}} <br> {{$application->course_institute2}} <br> {{$application->course_institute3}}</td>
                                        <td>{{$application->course_year}} <br> {{$application->course_year1}} <br> {{$application->course_year2}} <br> {{$application->course_year3}}</td>
                                        <td>{{$application->course_duration}} <br> {{$application->course_duration1}} <br> {{$application->course_duration2}} <br> {{$application->course_duration3}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
					
                            <tbody>
                                <tr>
                                    <th scope="row">If you are currently in service, Please upload forwarding letter from your employer</th>
                                    <td><a href="{{ asset('storage/'.$application->forwarding_letter) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>

                                <tr>
                                    <th scope="row">Attach Disability Cerificate:</th>
                                    <td><a href="{{ asset('storage/'.$application->disability_certificate) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>
                                <tr>
                                    <th scope="row">Attach Cerificate if belong into SC, ST, OBC and EWS category</th>
                                    <td><a href="{{ asset('storage/'.$application->category_certificate) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>
                                <tr>
                                    <th scope="row">Upload your scanned signature</th>
                                    <td><a href="{{ asset('storage/'.$application->candidate_sign) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>
                                <tr>
                                    <th scope="row">Upload your passport size recent photograph</th>
                                    <td><a href="{{ asset('storage/'.$application->candidate_photo) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>
                                <tr>
                                    <th scope="row">Attach Self-attested copies of all the Mark Sheets, Certificates, Professional Experience, etc.</th>
                                    <td><a href="{{ asset('storage/'.$application->document) }}" target="_blank" class="btn btn-primary">View</a>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <tbody>
                              <tr>
                                  <td colspan="6" class="bg"><h5>Name and Full Address of Two Referees</h5<></td>
                              </tr>
                              <tr>
                                  
                                  <th scope="row">Referees 1</th>
                                  <td>
                                      <p>{{$application->ref_name1}}</p>
                                      <p>{{$application->ref_add1}}</p>
                                      <p>{{$application->ref_pin1}}</p>
                                      <p>{{$application->ref_phone1}}</p>
                                      <p>{{$application->ref_mobile1}}</p>
                                      <p>{{$application->ref_email1}}</p>
                                  </td>
                                  <th scope="row">Referees 2</th>
                                  <td>
                                    <p>{{$application->ref_name2}}</p>
                                    <p>{{$application->ref_add2}}</p>
                                    <p>{{$application->ref_pin2}}</p>
                                    <p>{{$application->ref_phone2}}</p>
                                    <p>{{$application->ref_mobile2}}</p>
                                    <p>{{$application->ref_email2}}</p>
                                  </td>
                              </tr>
                            </tbody>
                        </table>

                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection