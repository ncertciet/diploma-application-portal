@extends('layouts.sidebar')

@section('content')


<div class="container-fluid">
    <h1 class="text-left">Personal Details</h1>

    <hr>

<div class="application-form shadow mt-5">
    <form method="POST" action="{{route('application.step1.store')}}">

        @csrf

        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autofocus>
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
                          <input type="radio" class="form-check-input" id="male" value="Male" name="gender"  @error('gender') is-invalid @enderror value="{{ old('male') }}">Male
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label" for="female">
                          <input type="radio" class="form-check-input" id="female" value="Female" name="gender" @error('gender') is-invalid @enderror value="{{ old('female') }}">Female
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label" for="transgender">
                          <input type="radio" class="form-check-input" id="transgender" value="Transgender" name="gender" @error('gender') is-invalid @enderror value="{{ old('transgender') }}">Transgender
                        </label>
                      </div>
                </div>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"  value="{{ old('dob') }}">
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="nationality">Nationality</label>
                <input type="text" placeholder="Nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality"  value="{{ old('nationality') }}">
                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-3">
                <label for="sc_state">State/UT</label>
                    <select class="form-control @error('sc_state') is-invalid @enderror" name="sc_state" id="sc_state"  value="{{ old('sc_state') }}">
                        <option value="">Select State</option>
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
                    @error('sc_state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="study_centre">Study Centre</label>
                <input type="text" placeholder="Study Centre" class="form-control @error('study_centre') is-invalid @enderror" name="study_centre" id="study_centre"  value="{{ old('study_centre') }}">
                @error('study_centre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
          </div>

          <h4 class="text-primary mt-4">Present Address</h3>

            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="p_address">Address</label>
                    <textarea class="form-control @error('p_address') is-invalid @enderror" name="p_address" id="p_address"  value="{{ old('p_address') }}"></textarea>
                    @error('p_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-3">
                    <label for="p_city">City</label>
                    <input type="text" class="form-control @error('p_city') is-invalid @enderror" name="p_city" id="p_city" placeholder="City"  value="{{ old('p_city') }}">
                    @error('p_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-sm-3">
                    <label for="p_state">State</label>
                    <select class="form-control @error('p_state') is-invalid @enderror" name="p_state" id="p_state"  value="{{ old('p_state') }}">
                        <option value="">Select State</option>
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
                    <input type="number" class="form-control @error('p_zip') is-invalid @enderror" name="p_zip" id="p_zip" placeholder="Pin Code"  value="{{ old('p_zip') }}">
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
                    <input type="text" class="form-control @error('p_telephone') is-invalid @enderror" name="p_telephone" id="p_telephone" placeholder="e.g. 123-456-7890"  value="{{ old('p_telephone') }}">
                    <small class="text-primary">Format: 123-456-7890</small>
                    @error('p_telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-sm-4">
                    <label for="p_mobile"> Mobile</label>
                    <input type="tel" class="form-control @error('p_mobile') is-invalid @enderror" name="p_mobile" id="p_mobile" placeholder="e.g. 9999999999"  value="{{ old('p_mobile') }}">
                    <small class="text-primary">Format: Phone number with 6-9 and remaing 9 digit with 0-9</small>
                    @error('p_mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-sm-4">
                    <label for="p_email"> Email</label>
                    <input type="email" class="form-control @error('p_email') is-invalid @enderror" name="p_email" id="p_email" placeholder="Email"  value="{{ old('p_email') }}">
                    @error('p_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <h4 class="text-primary mt-4">Present Occupation and Official Address</h4>


            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" id="occupation" placeholder="Occupation"  value="{{ old('occupation') }}">
                    @error('occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-3">
                    <label for="o_address">Address</label>
                    <textarea class="form-control @error('o_address') is-invalid @enderror" name="o_address" id="o_address"  value="{{ old('o_address') }}"></textarea>
                    @error('o_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-2">
                    <label for="o_city">City</label>
                    <input type="text" class="form-control @error('o_city') is-invalid @enderror" name="o_city" id="o_city" placeholder="City"  value="{{ old('o_city') }}">
                    @error('o_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-sm-2">
                    <label for="o_state">State</label>
                    <select class="form-control @error('o_state') is-invalid @enderror" name="o_state" id="o_state"  value="{{ old('o_state') }}">
                        <option value="">Select State</option>
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
                    <input type="number" class="form-control @error('o_zip') is-invalid @enderror" name="o_zip" id="o_zip" placeholder="Pin Code"  value="{{ old('o_zip') }}">
                    @error('o_zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        <div class="form-row justify-content-end">
            <div class="col-sm-6 text-right"> 
                <button type="submit" name="action" value="save" class="btn btn-primary mr-3">Save</button>
                <button type="submit" name="action" value="save-continue" class="btn btn-success">Save & Continue</button>
            </div>
        </div>
      </form>
    
</div>
</div>




@endsection