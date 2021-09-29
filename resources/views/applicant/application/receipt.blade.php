<!doctype html>
<html lang="en">
  <head>
    <title>Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>

    <style>
        .table {
            font-size:14px;
        }
        .table-bordered th {
         border: 1px solid #034085;
        }
        .table-bordered td {
         border: 1px solid #034085;
        }
        .table thead th {
            border-bottom: 2px solid #034085;
            background: #c6dbf3;
        }
        .bg{
            background:#F2F2F2;
        }
        .table td {
            font-weight: 400;
        }
        .pdf-title{
            color:#981f4d;
        }
        </style>

      <div class="containerss py-5">
          {{-- <div class="row">
              <div class="col-xl-12 text-right">
                  <a href="{{ route('export-pdf') }}" class="btn btn-success btn-sm">Export to PDF</a>
              </div>
          </div> --}}

          <div class=" mt-4 mb-6">
                <div class="text-center">
                    <h3>Application Receipt</h3>
                    <h4 class="pdf-title">Diploma Course in Guidance and Counselling (2022)</h4>
                    <br>
                </div>


              <div class="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2" class="bg font-weight-bold text-center"><h5>Diploma Course in Guidance and Counselling (2022) Receipt</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <th scope="row">Application Id</th>
                                <td>{{ $application->title }} {{ $application->application_id }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $application->name }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">Email Id</th>
                                <td>{{ $application->p_email }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">Submit Date</th>
                                <td>{{ $application->submit_date }}</td>
                            </tr>   
                        </tbody>
                      </table>


              </div>
          </div>
      </div>
  </body>
</html>