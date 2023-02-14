@extends('layouts.mainlayouts')

@section('title', 'Add Users')


@section('content')
<div class="content-wrapper">
<div class="row mt-4">
    {{-- <div class="col-lg-7 grid-margin stretch-card"> --}}
    {{--  --}}
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
                <a href="/manage" class="btn btn-inverse-primary btn-sm mdi mdi mdi-undo-variant">
                  Cancel
                </a>
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  <form action="/manage-edit/{{ $users->slug }}" method="post" class="forms-sample">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Fullname</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="fullname" placeholder="Fullname" required value="{{ $users->fullname }}" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Username" required value="{{ $users->username }}" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" >
                      </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Departmen</label>
                        <div class="col-sm-9">
                            <select name="department" class="form-select col-sm-3 col-form-label" required >
                                <option value="1"{{ $users->user_group_id == "1" ? 'selected' : '' }}>IT</option>
                                <option value="2"{{ $users->user_group_id == "2" ? 'selected' : '' }}>Finance & Accounting</option>
                                <option value="3"{{ $users->user_group_id == "3" ? 'selected' : '' }}>Sales</option>
                                <option value="4"{{ $users->user_group_id == "4" ? 'selected' : '' }}>HCGA</option>
                                <option value="5"{{ $users->user_group_id == "5" ? 'selected' : '' }}>Logistic</option>
                                <option value="6"{{ $users->user_group_id == "6" ? 'selected' : '' }}>Inventory Development</option>
                             </select>
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                           <select name="status" class="form-select col-sm-3 col-form-label" placeholder="Status" required >
                            <option value="active"{{ $users->status == "active" ? 'selected' : '' }}>active</option>
                            <option value="inactive"{{ $users->status == "inactive" ? 'selected' : '' }}>inactive</option>
                             </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">User Role</label>
                        <div class="col-sm-9">
                          <select name="role_id" class="form-select col-sm-3 col-form-label" placeholder="User Role" required>
                            <option value="1"{{ $users->role_id == "1" ? 'selected' : '' }}>admin</option>
                            <option value="2"{{ $users->role_id == "2" ? 'selected' : '' }}>user</option>
                             </select>
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



@endsection