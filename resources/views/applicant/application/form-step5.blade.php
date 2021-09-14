@extends('layouts.sidebar')

@section('content')

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> References <small>(Optional)</small></h1>
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

            <div class="application-form shadow mb-5">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif

                <form method="POST" action="{{route('application.step5.store')}}">
                    @csrf
                    <div class="color-box">
                        <h4 class="text-primary mt-2 mb-4">Name and Full Address of Two Referees 
                            <button type="submit" name="action" value="save-continue" class="btn btn-secondary btn-lg mr-3 float-right">Skip</button>
                        </h4>
                        <h5>Referees 1</h5>
                         <div class="form-row">
                                <div class="form-group col-md-4">
                                   <label for="inputZip">Name</label>
                                   <input type="text" name="ref_name1" class="form-control @error('ref_name1') is-invalid @enderror" value="{{ old('ref_name1') }}" id="" placeholder="Name" >
                                   @error('ref_name1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>This Field is required.</strong>
                                        </span>
                                    @enderror
                               </div>
                               <div class="form-group col-md-4">
                                   <label for="inputZip">Address</label>
                                   <input type="text" name="ref_add1" class="form-control @error('ref_add1') is-invalid @enderror" value="{{ old('') }}" id="" placeholder="Address" >
                                    @error('ref_add1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>This Field is required.</strong>
                                    </span>
                                    @enderror
                               </div>
                               <div class="form-group col-md-4">
                                   <label for="inputZip">Pin Code</label>
                                   <input type="text" name="ref_pin1" pattern="[0-9]{6}" class="form-control @error('ref_pin1') is-invalid @enderror" value="{{ old('') }}" id="pin" minlength="6" maxlength="6" placeholder="Six digit pin code" >
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
                                 <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ref_phone1" class="form-control @error('ref_phone1') is-invalid @enderror" value="{{ old('') }}" id="telephone" placeholder="e.g. 123-456-7890">
                                 <small>Format: 123-456-7890</small>
                                 @error('ref_phone1')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>This Field is required.</strong>
                                   </span>
                                   @enderror
                             </div>
                             <div class="form-group col-md-4">
                               <label for="inputAddress2">Mobile Number:</label>
                               <input type="text" pattern="[6-9]{1}[0-9]{9}" name="ref_mobile1" class="form-control @error('ref_mobile1') is-invalid @enderror" value="{{ old('') }}" id="mobile" placeholder="e.g. 9999999999" title="Phone number with 7-9 and remaing 9 digit with 0-9" >
                               <small>Format: Phone number with 7-9 and remaing 9 digit with 0-9</small>
                               @error('ref_mobile1')
                               <span class="invalid-feedback" role="alert">
                                   <strong>This Field is required.</strong>
                               </span>
                               @enderror
                             </div>
                             <div class="form-group col-md-4">
                                 <label for="inputEmail4">Email:</label>
                                 <input type="email" name="ref_email1" class="form-control @error('ref_email1') is-invalid @enderror"  value="{{ old('') }}" id="email_address" placeholder="Email" >
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
                                   <input type="text" name="ref_name2" class="form-control @error('ref_name2') is-invalid @enderror" value="{{ old('') }}" id="" placeholder="Name" >
                                   @error('ref_name2')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>This Field is required.</strong>
                                   </span>
                                    @enderror
                                </div>
                               <div class="form-group col-md-4">
                                   <label for="inputZip">Address</label>
                                   <input type="text" name="ref_add2" class="form-control @error('ref_add2') is-invalid @enderror" value="{{ old('') }}" id="" placeholder="Address" >
                                   @error('ref_add2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>This Field is required.</strong>
                                    </span>
                                    @enderror
                                </div>
                               <div class="form-group col-md-4">
                                   <label for="inputZip">Pin Code</label>
                                   <input type="text" name="ref_pin2" pattern="[0-9]{6}" class="form-control @error('ref_pin2') is-invalid @enderror" value="{{ old('') }}" id="pin" minlength="6" maxlength="6" placeholder="Six digit pin code">
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
                                 <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ref_phone2" class="form-control @error('ref_phone2') is-invalid @enderror" value="{{ old('') }}" id="telephone" placeholder="e.g. 123-456-7890">
                                 <small>Format: 123-456-7890</small>
                                 @error('ref_phone2')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>This Field is required.</strong>
                                   </span>
                                @enderror
                             </div>
                             <div class="form-group col-md-4">
                               <label for="inputAddress2">Mobile Number:</label>
                               <input type="text" pattern="[6-9]{1}[0-9]{9}" name="ref_mobile2" class="form-control @error('ref_mobile2') is-invalid @enderror" value="{{ old('') }}" id="mobile" placeholder="e.g. 9999999999" title="Phone number with 7-9 and remaing 9 digit with 0-9" >
                               <small>Format: Phone number with 7-9 and remaing 9 digit with 0-9</small>
                               @error('ref_mobile2')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>This Field is required.</strong>
                                   </span>
                                @enderror
                             </div>
                             <div class="form-group col-md-4">
                                 <label for="inputEmail4">Email:</label>
                                 <input type="email" name="ref_email2" class="form-control @error('ref_email2') is-invalid @enderror" value="{{ old('') }}" id="email_address" placeholder="Email" >
                                 @error('ref_email2')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>This Field is required.</strong>
                                 </span>
                              @enderror
                              </div>
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

    @endsection