@extends('layouts.sidebar')

@section('content')

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Upload Documents</h1>
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

                <form method="POST" action="{{route('application.step4.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="color-box">
                         <div class="row">
                            <div class="col-sm-6">

                                <label for="inputZip">ANY Disability:</label>
                                <div class="disabality" id="">
                                    <div class="form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="disability" value="Yes" id="disability_yes" value="{{ old('disability') }}">
                                        <label class="form-check-label" for="disability_yes">
                                          Yes
                                        </label>
                                    
                                      </div>
                                      <div class="form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="disability" value="No" id="disability_no" value="{{ old('disability') }}">
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
                                                <textarea class="form-control @error('disability_content') is-invalid @enderror" name="disability_content" id="disability_content" rows="1">{{ old('disability_content') }}</textarea>
                                                <small class="text-primary">(Not exceeding 150 words)</small>
                                                @error('disability_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>This Field is required.</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="disability_certificate">Attach Disability Cerificate:</label>
                                                <input type="file" name="disability_certificate" class="form-control-file form-control form-control @error('disability_certificate') is-invalid @enderror" id="disability_certificate" value="{{ old('disability_certificate') }}">
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
                                        <input class="form-check-input" type="radio" name="category" id="General" value="General" value="{{ old('category') }}">
                                        <label class="form-check-label" for="General">General</label>
                                            
                                      </div>
                                      <div class="form-check form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="category" id="SC" value="SC" value="{{ old('category') }}">
                                        <label class="form-check-label" for="SC">SC</label>
                                        
                                      </div>
                                      <div class="form-check form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="category" id="ST" value="ST" value="{{ old('category') }}">
                                        <label class="form-check-label" for="ST">ST</label>
                                       
                                      </div>
                                      <div class="form-check form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="category" id="OBC" value="OBC" value="{{ old('category') }}">
                                        <label class="form-check-label" for="OBC">OBC</label>
                                        
                                      </div>
                                      <div class="form-check form-check-inline mb-4">
                                        <input class="form-check-input" type="radio" name="category" id="EWS" value="EWS" value="{{ old('category') }}">
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
                                <small class="text-primary">Upload passport size photo in JPG/PNG only.<br> Maximum size should be 200KB and maximum dimension should be 150 x 200px.</small>
                                @error('candidate_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="document">Please attach Self-attested copies of all the Mark Sheets, Certificates, Professional Experience, etc. Create a PDF file with all your documents and then upload it.</label>
                                <input type="file" name="document" class="form-control-file form-control @error('document') is-invalid @enderror" id="document" value="{{ old('document') }}">
                                <small class="text-primary">Maximum size of PDF file can be 5MB. </small>
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("input[name$='disability']").click(function() {
                var test = $(this).val();
                // console.log(test);

                if(test == 'Yes'){
                    $('.disability-content').show("slow");
                }else{
                    $('.disability-content').hide("slow");
                }
            });

            $("input[name$='category']").click(function() {
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