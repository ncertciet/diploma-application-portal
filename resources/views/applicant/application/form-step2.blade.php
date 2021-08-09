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
                                            <input type="text" name="eq_exam_x" class="form-control" value="High School" readonly  />
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_board_x"  class="form-control" placeholder="Examining Body" required>
                                        </td>
                                        <td class="col-sm-2">
                                            @php($year=date('Y'))
                                            <select name="eq_year_x" id="year" class="form-control" required>
                                                <option value="" selected disabled>Select Year</option>
                                                @for($i = 1960; $i <= $year; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>

                                        <td class="col-sm-2">
                                            <input type="text" name="eq_marks_x"  class="form-control" placeholder="marks/grade" required>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_subject_x"  class="form-control" placeholder="Subject" required>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_exam_xii" class="form-control" value="Intermediate" readonly >
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_board_xii"  class="form-control" placeholder="Examining Body" required>
                                        </td>
                                        <td class="col-sm-2">

                                            @php($year=date('Y'))
                                            <select name="eq_year_xii" id="year" class="form-control" required>
                                                <option value="" selected disabled>Select Year</option>
                                                @for($i = 1960; $i <= $year; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_marks_xii"  class="form-control" placeholder="marks/grade" required>
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="text" name="eq_subject_xii"  class="form-control" placeholder="Subject" required>
                                        </td>

                                    </tr>
                                    <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_exam_grad" class="form-control" value="Graduation" readonly >
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_board_grad"  class="form-control" placeholder="Examining Body" required>
                                    </td>
                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="eq_year_grad" id="year" class="form-control" required>
                                            <option value="" selected disabled>Select Year</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_marks_grad"  class="form-control" placeholder="marks/grade" required>
                                    </td>
                                        <td class="col-sm-2">
                                        <input type="text" name="eq_subject_grad"  class="form-control" placeholder="Subject" required>
                                    </td>
                                    <td class="col-sm-2"><a class="deleteRow"></a>

                                    </td>
                                </tr>


                                <tr>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_exam_pgrad" class="form-control" value="Post Graduation" readonly >
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_board_pgrad"  class="form-control" placeholder="Examining Body" required>
                                    </td>
                                    <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="eq_year_pgrad" id="year" class="form-control" required>
                                            <option value="" selected disabled>Select Year</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_marks_pgrad"  class="form-control" placeholder="marks/grade" required>
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text" name="eq_subject_pgrad"  class="form-control" placeholder="Subject" required>
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
                                          <input type="text" name="pq_degree" class="form-control" placeholder="Name of the Degree" >
                                      </td>
                                      <td class="col-sm-2">
                                          <input type="text" name="pq_board"  class="form-control" placeholder="Examining Body" >
                                      </td>
                                      <td class="col-sm-2">
                                        @php($year=date('Y'))
                                        <select name="pq_year" id="year" class="form-control" required>
                                            <option value="" selected disabled>Select Year</option>
                                            @for($i = 1960; $i <= $year; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                      </td>
                                      <td class="col-sm-2">
                                          <input type="text" name="pq_marks"  class="form-control" placeholder="marks/grade" >
                                      </td>
                                      <td class="col-sm-2">
                                          <input type="text" name="pq_subject"  class="form-control" placeholder="Subject" >
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
                            <button type="submit" name="action" value="save-step2" class="btn btn-primary btn-lg mr-3">Save</button>
                            <button type="submit" name="action" value="save-continue-step2" class="btn btn-success btn-lg">Save & Continue</button>
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
                    cols += '<td><input type="text" class="form-control" name="eq_exam_oth' + counter + '" placeholder="Other Examination" /></td>';
                    cols += '<td><input type="text" class="form-control" name="eq_board_oth' + counter + '" placeholder="Examining Body" /></td>';
                    cols += '<td><input type="number" class="form-control" name="eq_year_oth' + counter + '" placeholder="Year" /></td>';
                    cols += '<td><input type="text" class="form-control" name="eq_marks_oth' + counter + '" placeholder="marks/grade" /></td>';
                    cols += '<td><input type="text" class="form-control" name="eq_subject_oth' + counter + '" placeholder="Subject" /></td>';

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

                cols += '<td><input type="text" class="form-control" name="pq_degree' + counter + '" placeholder="Name of the Degree" /></td>';
                cols += '<td><input type="text" class="form-control" name="pq_board' + counter + '" placeholder="Examining Body" /></td>';
                cols += '<td><input type="number" class="form-control" name="pq_year' + counter + '" placeholder="Year" /></td>';
                cols += '<td><input type="text" class="form-control" name="pq_marks' + counter + '" placeholder="marks/grade" /></td>';
                cols += '<td><input type="text" class="form-control" name="pq_subject' + counter + '" placeholder="Subject" /></td>';

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
