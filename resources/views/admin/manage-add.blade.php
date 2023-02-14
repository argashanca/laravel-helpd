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
                  <h4 class="card-title">New User</h4>
                  <form action="" method="post" class="forms-sample">
                    @csrf
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Fullname</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="fullname" placeholder="Fullname" value ="{{old('fullname')}}" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Username" required value ="{{old('username')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">User Code</label>
                      <div class="col-sm-9">
                        <input type="text" style="text-transform: uppercase" class="form-control" name="user_code" placeholder="User Code" value ="{{old('user_code')}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Re Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Departmen</label>
                        <div class="col-sm-9">
                            <select name="user_group_id" class="form-select col-sm-3 col-form-label" placeholder="Departmen" required>
                                <option value="">--</option>
                                <option value="1">IT</option>
                                <option value="2">Finance & Accounting</option>
                                <option value="3">Sales</option>
                                <option value="4">HCGA</option>
                                <option value="5">Logistic</option>
                                <option value="6">Inventory Development</option>
                             </select>
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                           <select name="status" class="form-select col-sm-3 col-form-label" placeholder="Status" required>
                                <option value="">--</option>
                                <option>active</option>
                                <option>inactive</option>
                             </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Role</label>
                        <div class="col-sm-9">
                           <select name="role_id" class="form-select col-sm-3 col-form-label" placeholder="User Role" required>
                            <option value="">--</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                             </select>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    {{-- <button type="submit" value="cancel" class="btn btn-light">Cancel</button> --}}
                  </form>
                </div>
              </div>
      </div>
</div>
</div>



@endsection