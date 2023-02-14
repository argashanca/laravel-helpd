@extends('layouts.mainlayouts')

@section('title', 'Detail Ticket')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

{{-- 
<style>
  #show { 
    width: 400px;
    height: 400px;
    border: 1px solid #333;
    background : #e5e5e5;
    text-align : center;

    box-sizing: border-box;
    padding: 10px;
  }
  $show img{
    width: 100%;
    height: 100%;

  }

</style> --}}


@section('content')

<div class="content-wrapper">
    <div class="row mt-4">
<div class="col-lg-7 mx-auto"">
    <div class="card">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
              <a href="/ticket" class="btn btn-inverse-primary btn-sm mdi mdi mdi-undo-variant">
                Back
              </a>
              <div class="card-body">
                
               
              <h4 class="card-title">Detail Tickets</h4>

              <table>
                    <tr>
                        <td>No Ticket</td>
                        <td> &emsp; : &emsp; </td>
                        <td>{{ $tikets->no_tiket }}</td>
                    </tr>
                    <th><br></th>
                    <tr>
                      <td>Requester</td>
                      <td>&emsp; : &emsp; </td>
                          <td>{{ $tikets->user->username }}</td> 
                      
                    </tr>
                    <th><br></th>
                    <tr>
                      <td>Subject</td>
                      <td>&emsp; : &emsp; </td>
                    
                      <td>{{ $tikets->req_subject }}</td>
                    </tr>
                    <th><br></th>
                    <tr>
                      <td>Priority</td>
                      <td>&emsp; : &emsp; </td>
                        <?php if ($tikets['priority'] == 3) : ?>
                      <td>High</td>
                      <?php elseif ($tikets['priority'] == 2) : ?>
                      <td>Medium</td>
                      <?php else : ?>
                      <td>Low</td>
                      <?php endif; ?>
                    </tr>
                    <th><br></th>
                    <tr>
                      <td>Request Date</td>
                      <td> &emsp; : &emsp; </td>
                      <td><?php echo date('d F Y', strtotime($tikets["req_date"]));   ?></td>
                    </tr> 
            </table>

            @if ($tikets->attach)
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <p class="text-dark">Image File</p>
                  <div class="d-lg-flex align-items-baseline mb-2">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 mt-4 mt-lg-0">
                  <div class="bg-inverse-primary text-white px-4 py-4 card">
                    <div class="row">
                      <div class="position-relative">
                        <a href="{{ asset('storage/' . $tikets->attach) }}" data-lightbox="models" data-title="{{ $tikets->attach }}">
                        <img src="{{ asset('storage/' . $tikets->attach) }}" class="img-thumbnail" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @else <img src="" alt="">
              @endif

            <div class="accordion mt-4">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Reply
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Comments</label>
                      <div class="col-sm-9">
                        {{-- @method('put') --}}
                        <form action= "" method="post" id="note_utama">
                          @csrf
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" name="tiket_id" value="{{ $tikets->id }}">
                          <input type="hidden" name="notes" value="0">
                          <textarea class="form-control" name="note" placeholder="Leave a comment here" id="note_utama" style="height: 100px"></textarea>
                          <input type="submit" class="mt-4 btn btn-outline-success btn-icon-text" value="Submit">
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            

              <div class="form-group mt-4">
                <p> Comment</label>
              
                @foreach($tikets->note()->orderBy('created_at', 'desc')->get() as $note)
                <div class="list-group mt-4">
                  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><u><strong>{{ $note->user->fullname }}</strong></u></h5>
                      <small>{{ $note->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1"></p>
                    <small>{{ $note->note }}</small>
                  </a>
                </div>
                @endforeach
                {{-- <button type="submit" value="cancel" class="btn btn-light">Cancel</button> --}}
            </div>
          </div>
  </div>
</div>
</div>
</div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
@endsection