@extends('layouts.sidebar')

@section('content')


<div class="container-fluid">
    <h1 class="text-left">Personal Details</h1>

    <hr>

<div class="application-form shadow">
    <form>
        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-group col-md-3">
                <label for="inputGender">Gender</label><br>
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="Male">Male
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="Female">Female
                    </label>
                  </div>
                  <div class="form-check-inline disabled">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="Transgender" >Transgender
                    </label>
                  </div>
            </div>
            <div class="form-group col-md-3">
                <label for="inputDob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob">
              </div>
              <div class="form-group col-md-3">
                <label for="inputDob">Nationality</label>
                <input type="text" placeholder="Nationality" class="form-control" name="nationality" id="nationality">
              </div>
          </div>

          <h4 class="font-weight-bold">Present Address</h3>

            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="p_address">Address</label>
                    <textarea class="form-control" name="p_address" id="p_address" ></textarea>
                </div>
                <div class="form-group col-sm-3">
                    <label for="p_city">City</label>
                    <input type="text" class="form-control" name="p_city" id="p_city" placeholder="City">
                </div>

                <div class="form-group col-sm-3">
                    <label for="p_state">City</label>
                    <select class="form-control" name="p_state" id="p_state">
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
                </div>

                <div class="form-group col-sm-3">
                    <label for="p_zip">City</label>
                    <input type="number" class="form-control" name="p_zip" id="p_zip" placeholder="Pin Code">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        
        <div class="form-row justify-content-end">
            <div class="col-sm-6 text-right"> 
                <button type="submit" class="btn btn-primary mr-3">Save</button>
                <button type="submit" class="btn btn-success">Save & Continue</button> 
            </div>
        </div>
      </form>
    
</div>
</div>




@endsection