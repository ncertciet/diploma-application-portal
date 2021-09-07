<!doctype html>
<html lang="en">
  <head>
    <title>Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
      <div class="container py-5">
          {{-- <div class="row">
              <div class="col-xl-12 text-right">
                  <a href="{{ route('export-pdf') }}" class="btn btn-success btn-sm">Export to PDF</a>
              </div>
          </div> --}}

          <div class=" mt-4 mb-6">
              <div >
                    <h5 class=" font-weight-bold text-center">Diploma Application Receipt</h4>
              </div>

              <div class="">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Application Id</th>
                                <td>{{ $application->application_id }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $application->name }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $application->p_email }}</td>
                            </tr> 
                            <tr>
                                <th scope="row">submit Date</th>
                                <td>{{ $application->submit_date }}</td>
                            </tr>   
                        </tbody>
                      </table>


              </div>
          </div>
      </div>
  </body>
</html>