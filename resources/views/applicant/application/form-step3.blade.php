@extends('layouts.sidebar')

@section('content')

<div class="hero-section">
    <div class="container-xl">
        <div class="page-header pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Experience and Training</h1>
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

            <form method="POST" action="{{route('application.step3.store')}}">
                @csrf
                <h4 class="text-primary mt-2 mb-4">Work/Professional Experience:</h4>
                <div class="color-box ">
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
                                      <input type="text" name="work_exp_name" class="form-control" value="{{ old('work_exp_name') }}" placeholder="Employer Name" >
                                        @error('work_exp_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                  </td>
                                  <td class="col-sm-2">
                                      <input type="text" name="work_exp_position"  class="form-control" value="{{ old('work_exp_position') }}" placeholder="Position" >
                                      @error('work_exp_position')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                  @enderror
                                  </td>
                                  <td class="col-sm-2">
                                      <input type="date" name="work_exp_date_from" class="form-control" value="{{ old('work_exp_date_from') }}">
                                      @error('work_exp_date_from')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                  @enderror
                                  </td>
                                  <td class="col-sm-2">
                                      <input type="date" name="work_exp_date_to" class="form-control" value="{{ old('work_exp_date_to') }}">
                                      @error('work_exp_date_to')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                  @enderror
                                  </td>
                                      <td class="col-sm-2">
                                      <input type="text" name="work_exp_duty"  class="form-control" placeholder="Nature of Duties" value="{{ old('work_exp_duty') }}">
                                      @error('work_exp_duty')
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
                    
                    <div class="form-row">
                      <div class="form-group col-md-3 custom-btn">
                          <input type="button" class="btn btn-primary" id="addrowexp" value="Add More Experience"  />
                      </div>
                      <div class="form-group col-md-6">
                          
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                    </div>
                  </div>

                  <h4 class="text-primary mt-2 mb-4">Short-Term Course/Training Attended in the Related Fields:</h4>

                  <div class="color-box course">
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
                                      <input type="text" name="course" class="form-control" placeholder="Course" value="{{ old('course') }}">
                                      @error('course')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>This Field is required.</strong>
                                      </span>
                                  @enderror
                                  </td>
                                  <td class="col-sm-2">
                                      <input type="text" name="course_institute"  class="form-control" placeholder="Institute" value="{{ old('course_institute') }}">
                                        @error('course_institute')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                  </td>
                                  <td class="col-sm-2">
                                    @php($year=date('Y'))
                                    <select name="course_year" id="year" class="form-control @error('course_year') is-invalid @enderror" value="{{ old('course_year') }}">
                                        <option value="" selected disabled>Select Year</option>
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
                                      <input type="text" name="course_duration"  class="form-control" placeholder="Duration in Days/Months" value="{{ old('course_duration') }}">
                                      @error('course_duration')
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
                    
                    <div class="form-row">
                      <div class="form-group col-md-3 custom-btn">
                          <input type="button" class="btn btn-primary" id="addrowcourse" value="Add More Course"  />
                      </div>
                      <div class="form-group col-md-6">
                          
                      </div>
                      <div class="form-group col-md-3">
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

{{-- script for work/experience --}}

<script>
    $(document).ready(function () {
        var counter = 0;
        var limit = 3;
    
        $("#addrowexp").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
    
            if (counter < limit) {
                counter++;

            cols += '<td><input type="text" class="form-control" name="work_exp_name' + counter + '" placeholder="Employer Name" /></td>';
            cols += '<td><input type="text" class="form-control" name="work_exp_position' + counter + '" placeholder="Position" /></td>';
            cols += '<td><input type="date" class="form-control" name="work_exp_date_from' + counter + '" placeholder="Year" /></td>';
            cols += '<td><input type="date" class="form-control" name="work_exp_date_to' + counter + '" placeholder="marks/grade" /></td>';
            cols += '<td><input type="text" class="form-control" name="work_exp_duty' + counter + '" placeholder="Nature of Duties" /></td>';
    
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list-exp").append(newRow);

        } else {
            alert('You Reached the limits')
                }
           
        });
    
    
    
        $("table.order-list-exp").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });
    
    
    });
    
    
    
    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();
    
    }
    
    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list-exp").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
         $("#grandtotal").text(grandTotal.toFixed(2));
    }
    </script>

    {{-- Script for course/training --}}
    <script>
        $(document).ready(function () {
            var counter = 0;
            var limit = 3;
        
            $("#addrowcourse").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                if (counter < limit) {
                    counter++;
            
                    cols += '<td><input type="text" class="form-control" name="course' + counter + '" placeholder="Course" /></td>';
                    cols += '<td><input type="text" class="form-control" name="course_institute' + counter + '" placeholder="Institute" /></td>';
                    cols += '<td><input type="number" class="form-control" name="course_year' + counter + '" placeholder="Year" /></td>';
                    cols += '<td><input type="text" class="form-control" name="course_duration' + counter + '" placeholder="Duration of Days/Month" /></td>';
            
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.order-list-course").append(newRow);
                
                } else {
                    alert('You Reached the limits')
                    }
            });
        
        
        
            $("table.order-list-course").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();       
                counter -= 1
            });
        
        
        });
        
        
        
        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();
        
        }
        
        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list-course").find('input[name^="price"]').each(function () {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>

@endsection