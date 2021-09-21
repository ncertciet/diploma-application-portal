@php
$user = Auth::user();
$reg_id = $user->reg_id;
$application = \Illuminate\Support\Facades\DB::table('applications')->where('reg_id', $reg_id)->first();    
@endphp

@extends('layouts.sidebar')

@section('content')
@php($user = Auth::user())

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Edit Details</h1>
                        <div class="page-header-subtitle">
                            Please Fill up the form carefully.
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
            <form method="POST" action="{{route('application.formedit.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="name">Title</label>
                        <select class="form-control  @error('title') is-invalid @enderror"  name="title" id="title"  value="{{ old('title') }}">

                            <option value="{{ $application->title }}"  selected="true">{{ $application->title }}</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Dr.">Dr.</option>
                        </select>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name"  value="{{$application->name}}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender">Gender</label><br>
                        <div class="form-group mt-2 mb-0">
                            <div class="form-check-inline">
                                <label class="form-check-label" for="male">
                                    <input type="radio" class="form-check-input" id="male" value="Male" name="gender"  @error('gender') is-invalid @enderror {{ ($application->gender=="Male")? "checked" : "" }} value="{{ old('male') }}">Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="female">
                                    <input type="radio" class="form-check-input" id="female" value="Female" name="gender" @error('gender') is-invalid @enderror {{ ($application->gender=="Female")? "checked" : "" }} value="{{ old('female') }}">Female
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="transgender">
                                    <input type="radio" class="form-check-input" id="transgender" value="Transgender" name="gender" @error('gender') is-invalid @enderror {{ ($application->gender=="Transgender")? "checked" : "" }} value="{{ old('transgender') }}">Transgender
                                </label>
                            </div>
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"   value="{{$application->dob}}">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nationality">Nationality</label>
                        <input type="text" placeholder="Nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality"  value="{{ $application->nationality }}">
                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="product">State/UT</label>
                        <select class="form-control product @error('sc_state') is-invalid @enderror" data-related-regime="#regime" name="sc_state" id="product"  value="{{ old('sc_state') }}">

                            <option value="{{ $application->sc_state }}"  selected="true">{{ $application->sc_state }}</option>
                        </select>
                        @error('sc_state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="regime">Study Centre</label>

                        <select class="form-control regime @error('study_centre') is-invalid @enderror" data-related-category="" data-related-product="#product" name="study_centre" id="regime"  value="{{ old('study_centre') }}">
                            <option value="{{$application->study_centre}}"  selected="selected">{{$application->study_centre}}</option>
                        </select>
                        @error('study_centre')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>


                <h4 class="text-primary mt-4">Present Address</h4>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="p_address">Address</label>
                            <textarea class="form-control @error('p_address') is-invalid @enderror" name="p_address" id="p_address"  value="{{ old('p_address') }}">{{ $application->p_address }}</textarea>
                            @error('p_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="p_city">City</label>
                            <input type="text" class="form-control @error('p_city') is-invalid @enderror" name="p_city" id="p_city" placeholder="City"  value="{{ $application->p_city }}">
                            @error('p_city')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="p_state">State</label>
                            <select class="form-control @error('p_state') is-invalid @enderror" name="p_state" id="p_state"  value="{{ old('p_state') }}">
                                <option value="{{ $application->p_state }}"  selected="selected">{{ $application->p_state }}</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Daman and Diu, Dadar and Nagar Haveli</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            @error('p_state')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="p_zip">Pin Code</label>
                            <input type="number" class="form-control @error('p_zip') is-invalid @enderror" name="p_zip" id="p_zip" placeholder="Pin Code"  value="{{ $application->p_zip }}">
                            @error('p_zip')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="p_telephone">Telephone <small>(Optional)</small></label>
                            <input type="text" class="form-control @error('p_telephone') is-invalid @enderror" name="p_telephone" id="p_telephone" placeholder="e.g. 123-456-7890"  value="{{ $application->p_telephone }}">
                            <small class="text-primary">Format: 123-456-7890</small>
                            @error('p_telephone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="p_mobile"> Mobile</label>
                            <input type="tel" class="form-control @error('p_mobile') is-invalid @enderror" name="p_mobile" id="p_mobile" placeholder="e.g. 9999999999"  value="{{ $application->p_mobile }}">
                            <small class="text-primary">Format: Phone number with 6-9 and remaing 9 digit with 0-9</small>
                            @error('p_mobile')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="p_email"> Email</label>
                            <input type="email" readonly class="form-control @error('p_email') is-invalid @enderror" name="p_email" id="p_email" placeholder="Email"  value="{{ $user->email }}">
                            @error('p_email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <!--
                    <h4 class="text-primary mt-4">Present Occupation and Official Address</h4>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" id="occupation" placeholder="Occupation"  value="{{ $application->occupation }}">
                            @error('occupation')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="o_address">Address</label>
                            <textarea class="form-control @error('o_address') is-invalid @enderror" name="o_address" id="o_address"  value="{{ old('o_address') }}">{{ $application->o_address }}</textarea>
                            @error('o_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="o_city">City</label>
                            <input type="text" class="form-control @error('o_city') is-invalid @enderror" name="o_city" id="o_city" placeholder="City"  value="{{ $application->o_city }}">
                            @error('o_city')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="o_state">State</label>
                            <select class="form-control @error('o_state') is-invalid @enderror" name="o_state" id="o_state"  value="{{ old('o_state') }}">
                                <option value="{{ $application->o_state }}"  selected="selected">{{ $application->o_state }}</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Daman and Diu, Dadar and Nagar Haveli</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            @error('o_state')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="o_zip">Pin Code</label>
                            <input type="number" class="form-control @error('o_zip') is-invalid @enderror" name="o_zip" id="o_zip" placeholder="Pin Code"  value="{{ $application->o_zip }}">
                            @error('o_zip')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>-->

                    {{-- step 2 --}}
                    <h4 class="text-primary mt-2 mb-4">Details of Educational Qualifications (final school examination onwards):</h4>
                    <div class="form-row">
                        <table id="myTable" class=" table order-list-school">
                            <thead>
                                <tr>
                                    <th>Examinations Passed</th>
                                    <th>Examining Body</th>
                                    <th>Year</th>
                                    <th>%age of marks/Grade Point</th>
                                    <th>Subject(s)</th>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_exam_x" class="form-control @error('eq_exam_x') is-invalid @enderror" value="High School" readonly  />
                                        @error('eq_exam_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_board_x"  class="form-control @error('eq_board_x') is-invalid @enderror" value="{{$application->eq_board_x}}" placeholder="Examining Body" >
                                        @error('eq_board_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="eq_year_x" id="year" class="form-control @error('eq_year_x') is-invalid @enderror" >
                                            <option value="{{$application->eq_year_x}}" selected >{{$application->eq_year_x}}</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('eq_year_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>

                                    <td class="col-sm-2">
                                        <input type="text" name="eq_marks_x"  class="form-control @error('eq_marks_x') is-invalid @enderror" value="{{$application->eq_marks_x}}" placeholder="marks/grade" >
                                        @error('eq_marks_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_subject_x"  class="form-control @error('eq_subject_x') is-invalid @enderror" value="{{$application->eq_subject_x}}" placeholder="Subject" >
                                        @error('eq_subject_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_exam_xii" class="form-control @error('eq_exam_xii') is-invalid @enderror" value="Intermediate" readonly >
                                        @error('eq_exam_xii')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_board_xii"  class="form-control @error('eq_board_xii') is-invalid @enderror" value="{{$application->eq_board_xii}}" placeholder="Examining Body" >
                                        @error('eq_board_xii')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">

                                        @php($year=date('Y'))
                                        <select name="eq_year_xii" id="year" class="form-control @error('eq_year_xii') is-invalid @enderror" >
                                            <option value="{{$application->eq_year_xii}}" selected >{{$application->eq_year_xii}}</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('eq_year_xii')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_marks_xii"  class="form-control @error('eq_marks_xii') is-invalid @enderror" value="{{$application->eq_marks_xii}}" placeholder="marks/grade" >
                                        @error('eq_marks_xii')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This field is required</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_subject_xii"  class="form-control @error('eq_subject_xii') is-invalid @enderror" value="{{$application->eq_subject_xii}}" placeholder="Subject" >
                                        @error('eq_subject_xii')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_exam_grad" class="form-control @error('eq_exam_grad') is-invalid @enderror" value="Graduation" readonly >
                                    @error('eq_exam_grad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_board_grad"  class="form-control @error('eq_board_grad') is-invalid @enderror" value="{{ $application->eq_board_grad }}" placeholder="Examining Body" >
                                    @error('eq_board_grad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="eq_year_grad" id="year" class="form-control @error('eq_year_grad') is-invalid @enderror" >
                                        <option value="{{ $application->eq_year_grad }}" selected >{{ $application->eq_year_grad }}</option>
                                        @for($i = 1960; $i <= $year; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('eq_year_grad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_marks_grad"  class="form-control @error('eq_marks_grad') is-invalid @enderror" value="{{ $application->eq_marks_grad }}" placeholder="marks/grade" >
                                    @error('eq_marks_grad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                    <td class="col-sm-2">
                                    <input type="text" name="eq_subject_grad"  class="form-control @error('eq_subject_grad') is-invalid @enderror" value="{{ $application->eq_subject_grad }}" placeholder="Subject" >
                                    @error('eq_subject_grad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>


                            <tr>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_exam_pgrad" class="form-control @error('eq_exam_pgrad') is-invalid @enderror" value="Post Graduation" readonly >
                                    @error('eq_exam_pgrad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_board_pgrad"  class="form-control @error('eq_board_pgrad') is-invalid @enderror" value="{{$application->eq_board_pgrad}}" placeholder="Examining Body" >
                                    @error('eq_board_pgrad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="eq_year_pgrad" id="year" class="form-control @error('eq_year_pgrad') is-invalid @enderror" >
                                        <option value="{{$application->eq_year_pgrad}}" selected >{{$application->eq_year_pgrad}}</option>
                                        @for($i = 1960; $i <= $year; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('eq_year_pgrad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_marks_pgrad"  class="form-control @error('eq_marks_pgrad') is-invalid @enderror" value="{{$application->eq_marks_pgrad}}" placeholder="marks/grade" >
                                    @error('eq_marks_pgrad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_subject_pgrad"  class="form-control @error('eq_subject_pgrad') is-invalid @enderror" value="{{$application->eq_subject_pgrad}}" placeholder="Subject" >
                                    @error('eq_subject_pgrad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>

                              
                            <tr>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_exam_oth1" class="form-control @error('eq_exam_oth1') is-invalid @enderror" value="{{$application->eq_exam_oth1}}" Placeholder="Other Examination" >
                                    @error('eq_exam_oth1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_board_oth1"  class="form-control @error('eq_board_oth1') is-invalid @enderror" value="{{$application->eq_board_oth1}}" placeholder="Examining Body" >
                                    @error('eq_board_oth1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="eq_year_oth1" id="year" class="form-control @error('eq_year_oth1') is-invalid @enderror" >
                                        <option value="{{$application->eq_year_oth1}}" selected >{{$application->eq_year_oth1}}</option>
                                        @for($i = 1960; $i <= $year; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('eq_year_oth1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_marks_oth1"  class="form-control @error('eq_marks_oth1') is-invalid @enderror" value="{{$application->eq_marks_oth1}}" placeholder="marks/grade" >
                                    @error('eq_marks_oth1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_subject_oth1"  class="form-control @error('eq_subject_oth1') is-invalid @enderror" value="{{$application->eq_subject_oth1}}" placeholder="Subject" >
                                    @error('eq_subject_oth1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>

                            <tr>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_exam_oth2" class="form-control @error('eq_exam_oth2') is-invalid @enderror" value="{{$application->eq_exam_oth2}}" Placeholder="Other Examination" >
                                    @error('eq_exam_oth2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_board_oth2"  class="form-control @error('eq_board_oth2') is-invalid @enderror" value="{{$application->eq_board_oth2}}" placeholder="Examining Body" >
                                    @error('eq_board_oth2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="eq_year_oth2" id="year" class="form-control @error('eq_year_oth2') is-invalid @enderror" >
                                        <option value="{{$application->eq_year_oth2}}" selected >{{$application->eq_year_oth2}}</option>
                                        @for($i = 1960; $i <= $year; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('eq_year_oth2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_marks_oth2"  class="form-control @error('eq_marks_oth2') is-invalid @enderror" value="{{$application->eq_marks_oth2}}" placeholder="marks/grade" >
                                    @error('eq_marks_oth2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_subject_oth2"  class="form-control @error('eq_subject_oth2') is-invalid @enderror" value="{{$application->eq_subject_oth2}}" placeholder="Subject" >
                                    @error('eq_subject_oth2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>

                            <tr>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_exam_oth3" class="form-control @error('eq_exam_oth3') is-invalid @enderror" value="{{$application->eq_exam_oth3}}" Placeholder="Other Examination" >
                                    @error('eq_exam_oth3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_board_oth3"  class="form-control @error('eq_board_oth3') is-invalid @enderror" value="{{$application->eq_board_oth3}}" placeholder="Examining Body" >
                                    @error('eq_board_oth3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="eq_year_oth3" id="year" class="form-control @error('eq_year_oth3') is-invalid @enderror" >
                                        <option value="{{$application->eq_year_oth3}}" selected >{{$application->eq_year_oth3}}</option>
                                        @for($i = 1960; $i <= $year; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('eq_year_oth3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_marks_oth3"  class="form-control @error('eq_marks_oth3') is-invalid @enderror" value="{{$application->eq_marks_oth3}}" placeholder="marks/grade" >
                                    @error('eq_marks_oth3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2">
                                    <input type="text" name="eq_subject_oth3"  class="form-control @error('eq_subject_oth3') is-invalid @enderror" value="{{$application->eq_subject_oth3}}" placeholder="Subject" >
                                    @error('eq_subject_oth3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>


                            </thead>
                        </table>
                    </div>

                    <h4 class="text-primary mt-2 mb-4">Details of Professional Qualifications:</h4>
                    <div class="form-row">
                        <table id="myTable" class=" table order-list">
                            <thead>
                                <tr>
                                    <th>Examinations Passed</th>
                                    <th>Examining Body</th>
                                    <th>Year</th>
                                    <th>%age of marks/Grade Point</th>
                                    <th>Subject(s)</th>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_degree" class="form-control @error('pq_degree') is-invalid @enderror" value="{{ $application->pq_degree }}" placeholder="Name of the Degree" >
                                           @error('pq_degree')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_board"  class="form-control @error('pq_board') is-invalid @enderror" value="{{ $application->pq_board }}" placeholder="Examining Body" >
                                        @error('pq_board')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="pq_year" id="year" class="form-control @error('pq_year') is-invalid @enderror" >
                                          <option value="{{ $application->pq_year }}" selected >{{ $application->pq_year }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                          @error('pq_year')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_marks"  class="form-control @error('pq_marks') is-invalid @enderror" value="{{ $application->pq_marks }}" placeholder="marks/grade" >
                                          @error('pq_marks')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_subject"  class="form-control @error('pq_subject') is-invalid @enderror" value="{{ $application->pq_subject }}" placeholder="Subject" >
                                          @error('pq_subject')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_degree1" class="form-control @error('pq_degree1') is-invalid @enderror" value="{{ $application->pq_degree1 }}" placeholder="Name of the Degree" >
                                           @error('pq_degree1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_board1"  class="form-control @error('pq_board1') is-invalid @enderror" value="{{ $application->pq_board1 }}" placeholder="Examining Body" >
                                        @error('pq_board1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>

                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="pq_year1" id="year" class="form-control @error('pq_year1') is-invalid @enderror" >
                                            <option value="{{ $application->pq_year1 }}" selected >{{ $application->pq_year1 }}</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                            @error('pq_year1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                      </td>

                                    <td class="col-sm-2">
                                        <input type="text" name="pq_marks1"  class="form-control @error('pq_marks1') is-invalid @enderror" value="{{ $application->pq_marks1 }}" placeholder="marks/grade" >
                                          @error('pq_marks1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_subject1"  class="form-control @error('pq_subject1') is-invalid @enderror" value="{{ $application->pq_subject1 }}" placeholder="Subject" >
                                          @error('pq_subject1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_degree2" class="form-control @error('pq_degree2') is-invalid @enderror" value="{{ $application->pq_degree2 }}" placeholder="Name of the Degree" >
                                           @error('pq_degree2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_board2"  class="form-control @error('pq_board2') is-invalid @enderror" value="{{ $application->pq_board2 }}" placeholder="Examining Body" >
                                        @error('pq_board2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="pq_year2" id="year" class="form-control @error('pq_year2') is-invalid @enderror" >
                                          <option value="{{ $application->pq_year2 }}" selected >{{ $application->pq_year2 }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                          @error('pq_year2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_marks2"  class="form-control @error('pq_marks2') is-invalid @enderror" value="{{ $application->pq_marks2 }}" placeholder="marks/grade" >
                                          @error('pq_marks2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_subject2"  class="form-control @error('pq_subject2') is-invalid @enderror" value="{{ $application->pq_subject2 }}" placeholder="Subject" >
                                          @error('pq_subject2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_degree3" class="form-control @error('pq_degree3') is-invalid @enderror" value="{{ $application->pq_degree3 }}" placeholder="Name of the Degree" >
                                           @error('pq_degree3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_board3"  class="form-control @error('pq_board3') is-invalid @enderror" value="{{ $application->pq_board3 }}" placeholder="Examining Body" >
                                        @error('pq_board3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="pq_year3" id="year" class="form-control @error('pq_year3') is-invalid @enderror" >
                                          <option value="{{ $application->pq_year3 }}" selected >{{ $application->pq_year3 }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                          @error('pq_year3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_marks3"  class="form-control @error('pq_marks3') is-invalid @enderror" value="{{ $application->pq_marks3 }}" placeholder="marks/grade" >
                                          @error('pq_marks3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="pq_subject3"  class="form-control @error('pq_subject3') is-invalid @enderror" value="{{ $application->pq_subject3 }}" placeholder="Subject" >
                                          @error('pq_subject3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    {{-- step 3 --}}
                       
                    <h4 class="text-primary mt-2 mb-4">Work/Professional Experience:</h4> 
                    <div class="form-row">
                        <table id="myTable" class=" table order-list-exp">
                            <thead>
                                <tr>
                                    <th>Employer</th>
                                    <th>Position Held</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Nature of Duties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_name" class="form-control" value="{{ $application->work_exp_name }}" placeholder="Employer Name" >
                                          @error('work_exp_name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_position"  class="form-control" value="{{ $application->work_exp_position }}" placeholder="Position" >
                                        @error('work_exp_position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_from" class="form-control" value="{{ $application->work_exp_date_from }}">
                                        @error('work_exp_date_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_to" class="form-control" value="{{ $application->work_exp_date_to }}">
                                        @error('work_exp_date_to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="work_exp_duty"  class="form-control" placeholder="Nature of Duties" value="{{ $application->work_exp_duty }}">
                                        @error('work_exp_duty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_name1" class="form-control" value="{{ $application->work_exp_name1 }}" placeholder="Employer Name" >
                                          @error('work_exp_name1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_position1"  class="form-control" value="{{ $application->work_exp_position1 }}" placeholder="Position" >
                                        @error('work_exp_position1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_from1" class="form-control" value="{{ $application->work_exp_date_from1 }}">
                                        @error('work_exp_date_from1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_to1" class="form-control" value="{{ $application->work_exp_date_to1 }}">
                                        @error('work_exp_date_to1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="work_exp_duty1"  class="form-control" placeholder="Nature of Duties" value="{{ $application->work_exp_duty1 }}">
                                        @error('work_exp_duty1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_name2" class="form-control" value="{{ $application->work_exp_name2 }}" placeholder="Employer Name" >
                                          @error('work_exp_name2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_position2"  class="form-control" value="{{ $application->work_exp_position2 }}" placeholder="Position" >
                                        @error('work_exp_position2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_from2" class="form-control" value="{{ $application->work_exp_date_from2 }}">
                                        @error('work_exp_date_from2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_to2" class="form-control" value="{{ $application->work_exp_date_to2 }}">
                                        @error('work_exp_date_to2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="work_exp_duty2"  class="form-control" placeholder="Nature of Duties" value="{{ $application->work_exp_duty2 }}">
                                        @error('work_exp_duty2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_name3" class="form-control" value="{{ $application->work_exp_name3 }}" placeholder="Employer Name" >
                                          @error('work_exp_name3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="work_exp_position3"  class="form-control" value="{{ $application->work_exp_position3 }}" placeholder="Position" >
                                        @error('work_exp_position3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_from3" class="form-control" value="{{ $application->work_exp_date_from3 }}">
                                        @error('work_exp_date_from3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="date" name="work_exp_date_to3" class="form-control" value="{{ $application->work_exp_date_to3 }}">
                                        @error('work_exp_date_to3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="work_exp_duty3"  class="form-control" placeholder="Nature of Duties" value="{{ $application->work_exp_duty3 }}">
                                        @error('work_exp_duty3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                        
                    </div>
                       
                    <h4 class="text-primary mt-2 mb-4">Short-Term Course/Training Attended in the Related Fields:</h4>
                    <div class="form-row">
                        <table id="myTable" class=" table order-list-course">
                            <thead>
                                <tr>
                                    <th>Name of Course/Training</th>
                                    <th>Institute</th>
                                    <th>Year</th>
                                    <th>Duration of Course/Training</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="course" class="form-control" value="{{ $application->course }}" placeholder="Course" >
                                        @error('course')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_institute"  class="form-control" value="{{ $application->course_institute }}" placeholder="Institute" >
                                          @error('course_institute')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="course_year" id="year" class="form-control @error('course_year') is-invalid @enderror" >
                                          <option value="{{ $application->course_year }}" selected >{{ $application->course_year }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                      @error('course_year')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                      @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_duration"  class="form-control" value="{{ $application->course_duration }}" placeholder="Duration in Days/Months" >
                                        @error('course_duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                      @enderror
                                    </td>
                                        
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="course1" class="form-control" value="{{ $application->course1 }}" placeholder="Course" >
                                        @error('course1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_institute1"  class="form-control" value="{{ $application->course_institute1 }}" placeholder="Institute" >
                                          @error('course_institute1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="course_year1" id="year" class="form-control @error('course_year1') is-invalid @enderror" >
                                          <option value="{{ $application->course_year1 }}" selected >{{ $application->course_year1 }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                      @error('course_year1')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                      @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_duration1"  class="form-control" value="{{ $application->course_duration1 }}" placeholder="Duration in Days/Months" >
                                        @error('course_duration1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                      @enderror
                                    </td>
                                        
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>   
                                
                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="course2" class="form-control" value="{{ $application->course2 }}" placeholder="Course" >
                                        @error('course2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_institute2"  class="form-control" value="{{ $application->course_institute2 }}" placeholder="Institute" >
                                          @error('course_institute2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="course_year2" id="year" class="form-control @error('course_year2') is-invalid @enderror" >
                                          <option value="{{ $application->course_year2 }}" selected >{{ $application->course_year2 }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                      @error('course_year2')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                      @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_duration2"  class="form-control" value="{{ $application->course_duration2 }}" placeholder="Duration in Days/Months" >
                                        @error('course_duration2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                      @enderror
                                    </td>
                                        
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="course3" class="form-control" value="{{ $application->course3 }}" placeholder="Course" >
                                        @error('course3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_institute3"  class="form-control" value="{{ $application->course_institute3 }}" placeholder="Institute" >
                                          @error('course_institute3')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>This Field is required.</strong>
                                              </span>
                                          @enderror
                                    </td>
                                    <td class="col-sm-2">
                                      @php($year=date('Y'))
                                      <select name="course_year3" id="year" class="form-control @error('course_year3') is-invalid @enderror" >
                                          <option value="{{ $application->course_year3 }}" selected >{{ $application->course_year3 }}</option>
                                          @for($i = 1960; $i <= $year; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                      </select>
                                      @error('course_year3')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                      @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="course_duration3"  class="form-control" value="{{ $application->course_duration3 }}" placeholder="Duration in Days/Months" >
                                        @error('course_duration2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                      @enderror
                                    </td>
                                        
                                    <td class="col-sm-2"><a class="deleteRow"></a>
            
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    {{-- step 4 --}}

                     <div class="color-box">
                        <div class="row">
                           <div class="col-sm-6">

                               <label for="inputZip">ANY Disability:</label>
                               <div class="disabality" id="">
                                   <div class="form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="disability" value="Yes" id="disability_yes" {{ ($application->disability=="Yes")? "checked" : "" }} value="{{ old('disability') }}">
                                       <label class="form-check-label" for="disability_yes">
                                         Yes
                                       </label>
                                   
                                     </div>
                                     <div class="form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="disability" value="No" id="disability_no" {{ ($application->disability=="No")? "checked" : "" }} value="{{ old('disability') }}">
                                       <label class="form-check-label" for="disability_no">
                                         No
                                       </label>
                                     </div>

                                       @error('disability')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>This Field is required.</strong>
                                           </span>
                                       @enderror
                                     
                                     <div class="disability-content" style="display: none; @error('disability_certificate') display: block; @enderror" >
                                       <div class="form-row">
                                           <div class="form-group col-sm-7">
                                               <label for="disability_content">Disability, (extent may be mentioned):</label>
                                               <textarea class="form-control @error('disability_content') is-invalid @enderror" name="disability_content" id="disability_content" rows="1">{{ old('disability_content') }} {{ $application->disability_content }}</textarea>
                                               <small class="text-primary">(Not exceeding 150 words)</small>
                                               @error('disability_content')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>This Field is required.</strong>
                                                   </span>
                                               @enderror
                                           </div>
                                           <div class="form-group col-sm-5">
                                               <label for="disability_certificate">Attach Disability Cerificate:</label>
                                               <input type="file" name="disability_certificate" class="form-control-file form-control form-control @error('disability_certificate') is-invalid @enderror" id="disability_certificate" >
                                               <span>{{ $application->disability_certificate }}</span>
                                               <small class="text-primary">Maximum size of PDF file can be 5MB. </small>
                                               @error('disability_certificate')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{$message}}</strong>
                                                   </span>
                                               @enderror
                                           </div>
                                         </div>
                                     </div>
                               </div>

                           
                           </div>
                           <div class="col-sm-6">
                               <label for="inputZip">Category:</label>
                               <div class="category" id="">
                                   <div class="form-check form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="category" id="General" value="General" {{ ($application->category=="General")? "checked" : "" }}  value="{{ old('category') }}">
                                       <label class="form-check-label" for="General">General</label>
                                           
                                     </div>
                                     <div class="form-check form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="category" id="SC" value="SC" {{ ($application->category=="SC")? "checked" : "" }} value="{{ old('category') }}">
                                       <label class="form-check-label" for="SC">SC</label>
                                       
                                     </div>
                                     <div class="form-check form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="category" id="ST" value="ST" {{ ($application->category=="ST")? "checked" : "" }} value="{{ old('category') }}">
                                       <label class="form-check-label" for="ST">ST</label>
                                      
                                     </div>
                                     <div class="form-check form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="category" id="OBC" value="OBC" {{ ($application->category=="OBC")? "checked" : "" }} value="{{ old('category') }}">
                                       <label class="form-check-label" for="OBC">OBC</label>
                                       
                                     </div>
                                     <div class="form-check form-check-inline mb-4">
                                       <input class="form-check-input" type="radio" name="category" id="EWS" value="EWS" {{ ($application->category=="EWS")? "checked" : "" }} value="{{ old('category') }}">
                                       <label class="form-check-label" for="EWS">EWS</label>
                                     </div>

                                     @error('category')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{$message}}</strong>
                                       </span>
                                     @enderror

                                     
                                     <div class="category-content" style="display: none; @error('disability_content') display: block; @enderror">
                                       <div class="form-row">
                                           <div class="form-group col-sm-12">
                                               <label for="category_certificate">Attach Category Cerificate:</label>
                                               <input type="file" name="category_certificate" class="form-control-file form-control @error('category_certificate') is-invalid @enderror" id="category_certificate" value="{{ old('category_certificate') }}">
                                               <span>{{ $application->category_certificate }}</span>
                                               <small>Maximum size of PDF file can be 5MB. </small>
                                               @error('category_certificate')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{$message}}</strong>
                                                   </span>
                                               @enderror
                                           </div>
                                         </div>
                                     </div>
                               </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="candidate_sign">Upload your scanned signature</label>
                               <input type="file" name="candidate_sign" class="form-control-file form-control @error('candidate_sign') is-invalid @enderror" id="candidate_sign" value="{{ old('candidate_sign') }}">
                               <span>{{ $application->candidate_sign }}</span>
                               <small class="text-primary">The maximum size should be 200KB and maximum dimension should be 100 x 150px.</small>
                               @error('candidate_sign')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{$message}}</strong>
                                   </span>
                               @enderror
                           </div>
                           <div class="form-group col-md-6">
                               <label for="candidate_photo">Upload your passport size recent photograph</label>
                               <input type="file" name="candidate_photo" class="form-control-file form-control @error('candidate_photo') is-invalid @enderror" id="candidate_photo" value="{{ old('candidate_photo') }}">
                               <span>{{ $application->candidate_photo }}</span>
                               <small class="text-primary">Upload passport size photo in JPG/PNG only.<br> Maximum size should be 200KB and maximum dimension should be 150 x 200px.</small>
                               @error('candidate_photo')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{$message}}</strong>
                                   </span>
                               @enderror
                           </div>

                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="document">Please attach Self-attested copies of all the Mark Sheets, Certificates, Professional Experience, etc. Create a PDF file with all your documents and then upload it.</label>
                                <input type="file" name="document" placeholder="" class="form-control-file form-control @error('document') is-invalid @enderror" id="document" value="">
                                <span>{{ $application->document }}</span>
                                <small class="text-primary">Maximum size of PDF file can be 5MB. </small>
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="forwarding_letter">If you are currently in service, Please upload forwarding letter from your employer.</label>
                                <input type="file" name="forwarding_letter" class="form-control-file form-control mt-3 @error('forwarding_letter') is-invalid @enderror" id="forwarding_letter" value="">
                                <span>{{ $application->forwarding_letter }}</span>
                                <small class="text-primary">Maximum size of PDF file can be 5MB. </small>
                                @error('forwarding_letter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                   </div>  

                   {{-- step 5  --}}
                   
                    <h4 class="text-primary mt-2 mb-4">Name and Full Address of Two Referees</h4>
                    <h5>Referees 1</h5>
                     <div class="form-row">
                            <div class="form-group col-md-4">
                               <label for="inputZip">Name</label>
                               <input type="text" name="ref_name1" class="form-control @error('ref_name1') is-invalid @enderror" id="" value="{{ $application->ref_name1 }}" placeholder="Name" >
                               @error('ref_name1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>This Field is required.</strong>
                                    </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-4">
                               <label for="inputZip">Address</label>
                               <input type="text" name="ref_add1" class="form-control @error('ref_add1') is-invalid @enderror" value="{{ $application->ref_add1 }}" id="" placeholder="Address" >
                                @error('ref_add1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>This Field is required.</strong>
                                </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-4">
                               <label for="inputZip">Pin Code</label>
                               <input type="text" name="ref_pin1" pattern="[0-9]{6}" class="form-control @error('ref_pin1') is-invalid @enderror" value="{{ $application->ref_pin1 }}" id="pin" minlength="6" maxlength="6" placeholder="Six digit pin code" >
                               @error('ref_pin1')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                               @enderror
                            </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-4">
                             <label for="inputPassword4">Telephone number (with STD code):</label>
                             <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ref_phone1" class="form-control @error('ref_phone1') is-invalid @enderror" value="{{ $application->ref_phone1 }}" id="telephone" placeholder="e.g. 123-456-7890">
                             <small>Format: 123-456-7890</small>
                             @error('ref_phone1')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                               @enderror
                         </div>
                         <div class="form-group col-md-4">
                           <label for="inputAddress2">Mobile Number:</label>
                           <input type="text" pattern="[6-9]{1}[0-9]{9}" name="ref_mobile1" class="form-control @error('ref_mobile1') is-invalid @enderror" value="{{ $application->ref_mobile1 }}" id="mobile" placeholder="e.g. 9999999999" title="Phone number with 7-9 and remaing 9 digit with 0-9" >
                           <small>Format: Phone number with 7-9 and remaing 9 digit with 0-9</small>
                           @error('ref_mobile1')
                           <span class="invalid-feedback" role="alert">
                               <strong>This Field is required.</strong>
                           </span>
                           @enderror
                         </div>
                         <div class="form-group col-md-4">
                             <label for="inputEmail4">Email:</label>
                             <input type="email" name="ref_email1" class="form-control @error('ref_email1') is-invalid @enderror"  value="{{ $application->ref_email1 }}" id="email_address" placeholder="Email" >
                             @error('ref_email1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>This Field is required.</strong>
                                </span>
                            @enderror

                          </div>
                    </div>
                    <h5>Referees 2</h5>
                    <div class="form-row">
                             <div class="form-group col-md-4">
                               <label for="inputZip">Name</label>
                               <input type="text" name="ref_name2" class="form-control @error('ref_name2') is-invalid @enderror" value="{{ $application->ref_name2 }}" id="" placeholder="Name" >
                               @error('ref_name2')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                                @enderror
                            </div>
                           <div class="form-group col-md-4">
                               <label for="inputZip">Address</label>
                               <input type="text" name="ref_add2" class="form-control @error('ref_add2') is-invalid @enderror" value="{{ $application->ref_add2 }}" id="" placeholder="Address" >
                               @error('ref_add2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>This Field is required.</strong>
                                </span>
                                @enderror
                            </div>
                           <div class="form-group col-md-4">
                               <label for="inputZip">Pin Code</label>
                               <input type="text" name="ref_pin2" pattern="[0-9]{6}" class="form-control @error('ref_pin2') is-invalid @enderror" value="{{ $application->ref_pin2 }}" id="pin" minlength="6" maxlength="6" placeholder="Six digit pin code">
                               @error('ref_pin2')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                                @enderror
                            </div>
                     </div>
                    <div class="form-row">
                         <div class="form-group col-md-4">
                             <label for="inputPassword4">Telephone number (with STD code):</label>
                             <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ref_phone2" class="form-control @error('ref_phone2') is-invalid @enderror" value="{{ $application->ref_phone2 }}" id="telephone" placeholder="e.g. 123-456-7890">
                             <small>Format: 123-456-7890</small>
                             @error('ref_phone2')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                            @enderror
                         </div>
                         <div class="form-group col-md-4">
                           <label for="inputAddress2">Mobile Number:</label>
                           <input type="text" pattern="[6-9]{1}[0-9]{9}" name="ref_mobile2" class="form-control @error('ref_mobile2') is-invalid @enderror" value="{{ $application->ref_mobile2 }}" id="mobile" placeholder="e.g. 9999999999" title="Phone number with 7-9 and remaing 9 digit with 0-9" >
                           <small>Format: Phone number with 7-9 and remaing 9 digit with 0-9</small>
                           @error('ref_mobile2')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                            @enderror
                         </div>
                         <div class="form-group col-md-4">
                             <label for="inputEmail4">Email:</label>
                             <input type="email" name="ref_email2" class="form-control @error('ref_email2') is-invalid @enderror" value="{{ $application->ref_email2 }}" id="email_address" placeholder="Email" >
                             @error('ref_email2')
                             <span class="invalid-feedback" role="alert">
                                 <strong>This Field is required.</strong>
                             </span>
                          @enderror
                          </div>
                    </div>
                

                    <div class="form-row justify-content-end mt-3">
                        <div class="col-sm-6 text-right">
                             <button type="submit" name="action" value="save" class="btn btn-primary btn-lg mr-3">Save</button>
                            <button type="submit" name="action" value="save-continue" class="btn btn-success btn-lg">Save & Continue</button> 
                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 <script>
    var products = [
            {
                "name": "Andhra Pradesh", "id": "Andhra Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Andman and Nicobar Islands", "id": "Andman and Nicobar Islands",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Arunachal Pradesh", "id": "Arunachal Pradesh",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Assam", "id": "Assam",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Bihar", "id": "Bihar",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Chandigarh", "id": "Chandigarh",
                "regimes": [{"name": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi", "id": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi"}]
            },
            {
                "name": "Chhattisgarh", "id": "Chhattisgarh",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Daman and Diu, Dadra and Nagar Haveli", "id": "Daman and Diu, Dadra and Nagar Haveli",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            /*{
                "name": "Daman and Diu", "id": "Daman and Diu",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },*/
            {
                "name": "Delhi-NCR (viz.,Delhi, Gurgaon, Faridabad, Noida, Ghaziabad and other surrounding areas)", "id": "Delhi-NCR (viz.,Delhi, Gurgaon, Faridabad, Noida, Ghaziabad and other surrounding areas)",
                "regimes": [{"name": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi", "id": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi"}]
            },
            {
                "name": "Goa", "id": "Goa",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Gujrat", "id": "Gujrat",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Haryana", "id": "Haryana",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Himachal Pradesh", "id": "Himachal Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Jammu and Kashmir", "id": "Jammu and Kashmir",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Jharkhand", "id": "Jharkhand",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Karnataka", "id": "Karnataka",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Kerala", "id": "Kerala",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Ladakh", "id": "Ladakh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Lakshadweep", "id": "Lakshadweep",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Madhya pradesh", "id": "Madhya pradesh",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Maharashtra", "id": "Maharashtra",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Manipur", "id": "Manipur",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Meghalaya", "id": "Meghalaya",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Mizoram", "id": "Mizoram",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Nagaland", "id": "Nagaland",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Odisha", "id": "Odisha",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Puducherry", "id": "Puducherry",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Punjab", "id": "Punjab",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Rajasthan", "id": "Rajasthan",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Sikkim", "id": "Sikkim",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Tamil Nadu", "id": "Tamil Nadu",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Telangana", "id": "Telangana",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Tiripura", "id": "Tiripura",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Uttar Pradesh", "id": "Uttar Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "UttaraKhanad", "id": "UttaraKhanad",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "West Bengal", "id": "West Bengal",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            }

        ];

        $(function () {
            $.each(products, function (index, value) {
                $(".product").append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            $('.product').on('change', function (e) {
                loadRegimeOptions($(this));
            });

            $('.regime').on('change', function () {
                loadCategories($(this));
            });
        });

        var loadRegimeOptions = function ($productElement) {
            var $regimeElement = $($productElement.data('related-regime'));
            var $categoryElement = $($regimeElement.data('related-category'));

            var selectedProductIndex = $productElement[0].selectedIndex - 1;

            $regimeElement.html('');
            $.each(products[selectedProductIndex].regimes, function (index, value) {
                $regimeElement.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
            //...and blank out category since it no longer applies
            $categoryElement.html('<option>-- Select --</option>');
        };

        var loadCategories = function($regimeElement) {
            var $productElement = $($regimeElement.data('related-product'));
            var $categoryElement = $($regimeElement.data('related-category'));

            var selectedProductIndex = $productElement[0].selectedIndex - 1;
            var selectedRegimeIndex = $regimeElement[0].selectedIndex - 1;

            $categoryElement.html('<option>-- Select --</option>');
            $.each(products[selectedProductIndex].regimes[selectedRegimeIndex].categories, function (index, value) {
                $categoryElement.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        };
    </script>



{{-- step 4 --}}
<script>

     $(document).ready(function() {

        var checked_button = $('input[name$="disability"]:checked');
        checked_button.each(function(){
            if($(this).val() == 'Yes'){
                $('.disability-content').show("slow");
            }else{
                $('.disability-content').hide("slow");
            }
        });

        $("input[name$='disability']").change(function() {
            var test = $(this).val();
            
            // console.log(test);

            if(test == 'Yes'){
                $('.disability-content').show("slow");
            }else{
                $('.disability-content').hide("slow");
            }
            
        });



        var checked_button_cat = $('input[name$="category"]:checked');
        checked_button_cat.each(function(){
            if($(this).val() == 'General'){
                $('.category-content').hide("slow");
            }
            else{
                $('.category-content').show("slow");
            }
        });

        $("input[name$='category']").change(function() {
            var test = $(this).val();
            // console.log(test);

            if(test == 'SC'){
                $('.category-content').show("slow");
            }else if(test == 'ST'){
                $('.category-content').show("slow");
            }else if(test == 'OBC'){
                $('.category-content').show("slow");
            }else if(test == 'EWS'){
                $('.category-content').show("slow");
            }else{
                $('.category-content').hide("slow");
            }
        });
    });
</script>

@endsection
