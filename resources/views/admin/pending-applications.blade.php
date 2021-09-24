{{-- @php
$user = Auth::user();
$reg_id = $user->reg_id;
// $application = \Illuminate\Support\Facades\DB::table('applications')->get();   
$application = DB::select('select * from applications where status = "completed"');
@endphp --}}

@extends('layouts.sidebar')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endsection


@section('content')

{{-- @dd($application) --}}
{{-- @php($user = Auth::user()) --}}

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i>All Applications</h1>
                        <div class="page-header-subtitle">
                            Diploma Course in Guidance and Counselling (2021)
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
               

        <div class='preview mt-4'>
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <div class="form-group mb-2">
                        <input id="myInput" type="text" class="form-control" placeholder="Search..">
                    </div>
                </div>
            </div>
            
            
           <table id="myTable" class="table table-bordered table-striped table-class" >
            <thead>
                <tr>
                    <th >Application Id <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th >Name <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th>Gender <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th>Mobile <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th>Email <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th>Steps <span class="sort-right"><i class="fas fa-sort"></i></span></th>
                    <th>Status</th>
                </tr>
            </thead>

            {{-- @dd($applications); --}}
              @foreach ($applications as $application)
              <tr>
                <td>{{ $application->application_id }}</td>
                <td>{{ $application->title }} {{ $application->name }}</td>
                <td>{{ $application->gender }}</td>
                <td>{{ $application->p_mobile }}</td>
                <td>{{ $application->p_email }}</td>
                <td>{{ $application->step }}</td>
                <?php if(($application->status) == 'pending'):?>
                    <td><h5><span class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> {{ $application->status }}</span></h5></td>
                <?php endif?>
                <?php if(($application->status) == 'completed'):?>
                <td><h5><span class="badge badge-success"><i class="far fa-check-circle"></i> {{ $application->status }}</span></h5></td>
                <?php endif?>
                {{-- <td>{{ $application->status }}</td> --}}
              </tr>
              @endforeach
            </table>


            <div class="row">
                <div class="col-sm-6">Showing {{ $applications->count()}} of {{ $applications->total()}} results</div>
                <div class="col-sm-6 text-right">{{ $applications->links() }}</div>
            </div>
            {{-- <div class="card mt-3">
                <div class="card-body p-2">
                    <div class="row align-items-center">
                        <div class="col-sm-6">Showing {{ $applications->count()}} of {{ $applications->total()}} results</div>
                        <div class="col-sm-6 text-right">{{ $applications->links() }}</div>
                    </div>
                </div>
            </div>
             --}}
        </div>


           
            
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });





    $(function() {
  const ths = $("th");
  let sortOrder = 1;

  ths.on("click", function() {
    const rows = sortRows(this);
    rebuildTbody(rows);
    updateClassName(this);
    sortOrder *= -1; //反転
  })

  function sortRows(th) {
    const rows = $.makeArray($('tbody > tr'));
    const col = th.cellIndex;
    const type = th.dataset.type;
    rows.sort(function(a, b) {
      return compare(a, b, col, type) * sortOrder;      
    });
    return rows;
  }

  function compare(a, b, col, type) {
    let _a = a.children[col].textContent;
    let _b = b.children[col].textContent;
    if (type === "number") {
      _a *= 1;
      _b *= 1;
    } else if (type === "string") {
      //全て小文字に揃えている。toLowerCase()
      _a = _a.toLowerCase();
      _b = _b.toLowerCase();
    }

    if (_a < _b) {
      return -1;
    }
    if (_a > _b) {
      return 1;
    }
    return 0;
  }

  function rebuildTbody(rows) {
    const tbody = $("tbody");
    while (tbody.firstChild) {
      tbody.remove(tbody.firstChild);
    }

    let j;
    for (j=0; j<rows.length; j++) {
      tbody.append(rows[j]);
    }
  }

  function updateClassName(th) {
    let k;
    for (k=0; k<ths.length; k++) {
      ths[k].className = "";
    }
    th.className = sortOrder === 1 ? "asc" : "desc";   
  }
  
});


    </script>

@endsection

