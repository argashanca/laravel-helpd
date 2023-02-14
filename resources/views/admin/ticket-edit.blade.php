@extends('layouts.mainlayouts')

@section('title', 'Add Users')



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
            <a href="/ticket" class="btn btn-inverse-primary btn-sm mdi mdi mdi-undo-variant">
              Cancel
            </a>
            <div class="card-body">
              <h4 class="card-title">Edit Tickets</h4>
              <form action="/ticket-edit/{{ $tikets->sleg }}" method="post" class="forms-sample">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Requester</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="username" placeholder="Fullname" readonly required value="{{ $tikets->user->username }}" >
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="department" placeholder="Department" readonly required value="{{ $tikets->department }}" >
                    </div>
                </div> --}}
                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Subject</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="req_subject" placeholder="Fullname" required value="{{ $tikets->req_subject }}" >
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="req_desc" placeholder="Username" required value="{{ $tikets->req_desc }}" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Priority</label>
                  <div class="col-sm-9">
                    <select name="priority" class="form-select col-sm-3 col-form-label" required >
                            <option value="1"{{ $tikets->priority == "1" ? 'selected' : '' }}>Low</option>
                            <option value="2"{{ $tikets->priority == "2" ? 'selected' : '' }}>Medium</option>
                            <option value="3"{{ $tikets->priority == "3" ? 'selected' : '' }}>High</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="tiket_stat" class="form-select col-sm-3 col-form-label" required >
                            <option value="1"{{ $tikets->tiket_stat == "1" ? 'selected' : '' }}>Pending</option>
                            <option  value="2"{{ $tikets->tiket_stat == "2" ? 'selected' : '' }} >Process</option>
                            <option value="3"{{ $tikets->tiket_stat == "3" ? 'selected' : '' }}>Solved</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Request Date</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="req_date"  placeholder="Request Date" value="{{ $tikets->req_date }}">
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Close Date</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="req_close"  placeholder="Close Date" >
                    </div>
                </div>
                  
                <button type="submit" class="btn btn-primary me-2">Update</button>
                
                {{-- <button type="submit" value="cancel" class="btn btn-light">Cancel</button> --}}
              </form>
            </div>
          </div>
  </div>
</div>
</div>
</div>
</div>

@endsection