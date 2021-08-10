@extends('layouts.sidebar')

@section('content')

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Qualification</h1>
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

                <form method="POST" action="{{route('application.step2.store')}}">
                    @csrf
                    <h4 class="text-primary mt-2 mb-4">Details of Educational Qualifications (final school examination onwards):</h4>
                    <div class="color-box">
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
                                            <input type="text" name="eq_board_x"  class="form-control @error('eq_board_x') is-invalid @enderror" placeholder="Examining Body" >
                                            @error('eq_board_x')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="col-sm-2">
                                            @php($year=date('Y'))
                                            <select name="eq_year_x" id="year" class="form-control @error('eq_year_x') is-invalid @enderror" >
                                                <option value="" selected disabled>Select Year</option>
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
                                            <input type="text" name="eq_marks_x"  class="form-control @error('eq_marks_x') is-invalid @enderror" placeholder="marks/grade" >
                                            @error('eq_marks_x')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_subject_x"  class="form-control @error('eq_subject_x') is-invalid @enderror" placeholder="Subject" >
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
                                            <input type="text" name="eq_board_xii"  class="form-control @error('eq_board_xii') is-invalid @enderror" placeholder="Examining Body" >
                                            @error('eq_board_xii')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="col-sm-2">

                                            @php($year=date('Y'))
                                            <select name="eq_year_xii" id="year" class="form-control @error('eq_year_xii') is-invalid @enderror" >
                                                <option value="" selected disabled>Select Year</option>
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
                                            <input type="text" name="eq_marks_xii"  class="form-control @error('eq_marks_xii') is-invalid @enderror" placeholder="marks/grade" >
                                            @error('eq_marks_xii')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This field is required</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_subject_xii"  class="form-control @error('eq_subject_xii') is-invalid @enderror" placeholder="Subject" >
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
                                        <input type="text" name="eq_board_grad"  class="form-control @error('eq_board_grad') is-invalid @enderror" placeholder="Examining Body" >
                                        @error('eq_board_grad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="eq_year_grad" id="year" class="form-control @error('eq_year_grad') is-invalid @enderror" >
                                            <option value="" selected disabled>Select Year</option>
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
                                        <input type="text" name="eq_marks_grad"  class="form-control @error('eq_marks_grad') is-invalid @enderror" placeholder="marks/grade" >
                                        @error('eq_marks_grad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="eq_subject_grad"  class="form-control @error('eq_subject_grad') is-invalid @enderror" placeholder="Subject" >
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
                                        <input type="text" name="eq_board_pgrad"  class="form-control @error('eq_board_pgrad') is-invalid @enderror" placeholder="Examining Body" >
                                        @error('eq_board_pgrad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="eq_year_pgrad" id="year" class="form-control @error('eq_year_pgrad') is-invalid @enderror" >
                                            <option value="" selected disabled>Select Year</option>
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
                                        <input type="text" name="eq_marks_pgrad"  class="form-control @error('eq_marks_pgrad') is-invalid @enderror" placeholder="marks/grade" >
                                        @error('eq_marks_pgrad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>This Field is required.</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_subject_pgrad"  class="form-control @error('eq_subject_pgrad') is-invalid @enderror" placeholder="Subject" >
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
                                </thead>
                            </table>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3 custom-btn">
                            <input type="button" class="btn btn-primary" id="addrowschool" value="Add More Qualification"  />
                        </div>
                        <div class="form-group col-md-6">

                        </div>
                        <div class="form-group col-md-3">
                        </div>
                      </div>
                    </div>

                    <h4 class="text-primary mt-2 mb-4">Details of Professional Qualifications:</h4>

                    <div class="color-box">
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
                                          <input type="text" name="pq_degree" class="form-control @error('pq_degree') is-invalid @enderror" placeholder="Name of the Degree" >
                                             @error('pq_degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                      </td>
                                      <td class="col-sm-2">
                                          <input type="text" name="pq_board"  class="form-control @error('pq_board') is-invalid @enderror" placeholder="Examining Body" >
                                          @error('pq_board')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                      </td>
                                      <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="pq_year" id="year" class="form-control @error('pq_year') is-invalid @enderror" >
                                            <option value="" selected disabled>Select Year</option>
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
                                          <input type="text" name="pq_marks"  class="form-control @error('pq_marks') is-invalid @enderror" placeholder="marks/grade" >
                                            @error('pq_marks')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>This Field is required.</strong>
                                                </span>
                                            @enderror
                                      </td>
                                      <td class="col-sm-2">
                                          <input type="text" name="pq_subject"  class="form-control @error('pq_subject') is-invalid @enderror" placeholder="Subject" >
                                            @error('pq_subject')
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

                        <div class="form-row">
                          <div class="form-group col-md-3 custom-btn">
                              <input type="button" class="btn btn-primary" id="addrow" value="Add More Qualification"  />
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
    <script src="https://cdn.jsdelivr.net/npm/yearpicker@0.2.0/lib/index.min.js"></script>

    <script>
        $(document).ready(function () {
            var counter = 0;
            var limit = 3;

            $("#addrowschool").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                if (counter < limit) {
                    counter++;
                    cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="eq_exam_oth' + counter + '" placeholder="Other Examination" /></td>';
                    cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="eq_board_oth' + counter + '" placeholder="Examining Body" /></td>';
                    cols += '<td><input type="number" class="form-control @error('name') is-invalid @enderror" name="eq_year_oth' + counter + '" placeholder="Year" /></td>';
                    cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="eq_marks_oth' + counter + '" placeholder="marks/grade" /></td>';
                    cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="eq_subject_oth' + counter + '" placeholder="Subject" /></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                    $(newRow).append(cols); //add input box
                    $("table.order-list-school").append(newRow);
                } else {
                alert('You Reached the limits')
                    }

                });






            $("table.order-list-school").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });


        });


        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list-school").find('input[name^="price"]').each(function () {
                grandTotal += +$(this).val();
            });
             $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>



<script>
    $(document).ready(function () {
        var counter = 0;
        var limit = 3;

        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            if (counter < limit) {
                counter++;

                cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="pq_degree' + counter + '" placeholder="Name of the Degree" /></td>';
                cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="pq_board' + counter + '" placeholder="Examining Body" /></td>';
                cols += '<td><input type="number" class="form-control @error('name') is-invalid @enderror" name="pq_year' + counter + '" placeholder="Year" /></td>';
                cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="pq_marks' + counter + '" placeholder="marks/grade" /></td>';
                cols += '<td><input type="text" class="form-control @error('name') is-invalid @enderror" name="pq_subject' + counter + '" placeholder="Subject" /></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            } else {
            alert('You Reached the limits')
                }


        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });



    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
         $("#grandtotal").text(grandTotal.toFixed(2));
    }
    </script>

@endsection
