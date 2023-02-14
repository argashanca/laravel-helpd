

@extends('layouts.mainlayouts')

@section('title', 'Ticket')


@section('content')

<!-- tikTables -->
<link rel="stylesheet" href="../../plugins/tiktables-bs4/css/tikTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/tiktables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/tiktables-buttons/css/buttons.bootstrap4.min.css">






<div class="content-wrapper">
    <div class="row mt-4">
<div class="col-lg-9 mx-auto">
      
<div class="card">

  @if (session('status'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
  @endif

  
  <a href="addticket" class="btn btn-inverse-primary btn-sm mdi mdi mdi-ticket-account"> Create Ticket </a>

    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between">
        <h4 class="card-title">Ticket List</h4>
        
       
        
        <form method="GET" action="/ticket" >
        <li class="nav-search d-none d-lg-block ms-8">
          <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" name="keyword" class="form-control" placeholder="search" aria-label="search" aria-describedby="search" value="{{ $keyword }}">
              {{-- value="{{ $keyword }}"> --}}
            </div>
          </li>	
        </form>
     
      </div>
      <div class="d-flex justify-content-end">
        </div>
          <div class="table-responsive">
    
            <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th><strong> No Ticket</th>
                  <th><strong>Requester</th>
                  <th><strong>Group</th>
                  <th><strong>Subject</th>
                  <th><strong>Description</th>
                  <th><strong>Priority</th>
                  <th><strong>Status</th>
                  <th><strong>Request Date</th>
                  <th><strong>Date Close</th>
                  <th class="text-center"><strong>Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($tikets as $index => $tik)
                <tr>
                  
                  <td>{{ $index + $tikets->firstItem() }}</td>
                  <td>{{ $tik->no_tiket }}</td>
                  <td>{{ $tik->username }}</td>
                  

                  <?php if ($tik->user_group_id == 1) : ?>
                  <td>IT</td> 
                  <?php elseif ($tik->user_group_id == 2) : ?>
                  <td>Finance & Accounting</td> 
                  <?php elseif ($tik->user_group_id == 3) : ?>
                  <td>Sales</td> 
                  <?php elseif ($tik->user_group_id == 4) : ?>
                  <td>HCGA</td> 
                  <?php elseif ($tik->user_group_id == 5) : ?>
                  <td>Logistic</td>
                  <?php else : ?>
                  <td>Inventory Development</td>
                  <?php endif; ?>


                  <td>{{ $tik->req_subject }}</td>
                  <td>{{ $tik->req_desc }}</td>

                  {{-- <td>{{ $tik->priority }}</td> --}}
                  
                  <?php if ($tik->priority == 3) : ?>
                  <td class="text-danger">High</td> 
                  <?php elseif ($tik->priority == 2) : ?>
                  <td class="text-warning">Medium</td> 
                  <?php else : ?>
                  <td class="text-secondary">Low</td>
                  <?php endif; ?>
                  
                  
                  <?php if ($tik->tiket_stat == 3) : ?>
                  <td> <label class="badge badge-success">Solved</label></td> 
                  <?php elseif ($tik->tiket_stat == 2) : ?>
                  <td><label class="badge badge-warning">Process</label></td>
                  <?php else : ?>
                  <td> <label class="badge badge-danger" >Pending</label></td>
                  <?php endif; ?>
                  
                  <td>{{ $tik->req_date }}</td>
                  <td>{{ $tik->req_close}}</td>
                  {{-- @endforeach --}}


                  <td>
                    {{-- @foreach ($data as $dat) --}}
                      <div class="template-demo d-flex justify-content-between flex-nowrap">
                        <button type="button" class="btn btn-inverse-primary btn-icon" >
                          <a href="ticket-detail/{{$tik->sleg}}" class="mdi mdi-disqus"></a>
                        </button>
                        @if (Auth::user()->role_id == 1)
                        <button type="button" class="btn btn-inverse-dark btn-icon">
                          <a href="ticket-edit/{{$tik->sleg}}" class="mdi mdi-table-edit"></a>
                        </button>
                        <button type="button" class="btn btn-inverse-danger btn-icon">
                          <a href="ticket-delete/{{ $tik->sleg }}" onclick="return confirm('Are you sure?')" class="mdi mdi-delete-forever"></a>
                        </button>
                      </div>
                    {{-- @endforeach --}}
                    @endif
                  </td>

                  {{-- <td>
                      <a href="ticket-detail/{{$tik->slug}}">Detail</a>
                      @if (Auth::user()->role_id == 1)
                    <a href="ticket-edit/{{$tik->slug}}">Edit</a>
                    <a href="ticket-delete/{{ $tik->slug }}" onclick="return confirm('Are you sure?')" >Delete</a>
                  </td>
                      @endif --}}
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <br><br>
        {{ $tikets->links() }}
    </div>

</div>

</div>
</div>

</div>



<!-- tikTables  & Plugins -->
<script src="../../plugins/tiktables/jquery.tikTables.min.js"></script>
<script src="../../plugins/tiktables-bs4/js/tikTables.bootstrap4.min.js"></script>
<script src="../../plugins/tiktables-responsive/js/tikTables.responsive.min.js"></script>
<script src="../../plugins/tiktables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/tiktables-buttons/js/tikTables.buttons.min.js"></script>
<script src="../../plugins/tiktables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/tiktables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/tiktables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/tiktables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").tikTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').tikTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


@endsection

