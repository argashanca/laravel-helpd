@extends('layouts.mainlayouts')

@section('title', 'Management Users')


@section('content')
<div class="content-wrapper">
<div class="row mt-4">
    {{-- <div class="col-lg-7 grid-margin stretch-card"> --}}
     
    <div class="col-lg-9 mx-auto">
      
        <div class="card">

          @if (session('status'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif

          <a href="manage-add" class="btn btn-inverse-primary btn-sm mdi mdi-account-plus">   Add User</a>
            <div class="card-body">
              <h4 class="card-title">User List</h4>
              <div class="d-flex justify-content-end">
                </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>User Code</th>
                          <th>Group</th>
                          <th>Fullname</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $index => $us)
                        <tr>
                          <td>{{ $index + $users->firstItem() }}</td>
                          <td>{{ $us->username }}</td>
                          <td>{{ $us->user_code }}</td>
                          {{-- <td>{{ $us->department }}</td> --}}

                          <?php if ($us['user_group_id'] == 1) : ?>
                          <td>IT</td> 
                          <?php elseif ($us['user_group_id'] == 2) : ?>
                          <td>Finance & Accounting</td> 
                          <?php elseif ($us['user_group_id'] == 3) : ?>
                          <td>Sales</td> 
                          <?php elseif ($us['user_group_id'] == 4) : ?>
                          <td>HCGA</td> 
                          <?php elseif ($us['user_group_id'] == 5) : ?>
                          <td>Logistic</td>
                          <?php else : ?>
                          <td>Inventory Development</td>
                          <?php endif; ?>

                          <td>{{ $us->fullname }}</td>
                          <td>{{ $us->status }}</td>
                          <td>
                              <button type="button" class="btn btn-inverse-dark btn-icon">
                                <a href="manage-edit/{{$us->slug}}" class="mdi mdi-table-edit"></a>
                              </button>
                              <button type="button" class="btn btn-inverse-danger btn-icon">
                                <a href="manage-delete/{{ $us->slug }}" onclick="return confirm('Are you sure?')" class="mdi mdi-delete-forever"> 
                                  @method('delete')
                                  @csrf
                                </a>
                              </button>
                            {{-- <a href="manage-edit/{{$us->slug}}">Edit</a>
                              <a href="manage-delete/{{ $us->slug }}" onclick="return confirm('Are you sure?')" >Delete
                              @method('delete')
                              @csrf
                            </a> --}}
                            
                            {{-- <a href=""></a> --}}
                          </td>
                        </tr>
                      @endforeach
                        
                      </tbody>
                    </table>
                    <br><br>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
      </div>
    </form>
</div>
    {{-- <div class="col-lg-5 mb-3 mb-lg-0">
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editor</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Fullname</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Fullname">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Departmen</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Departmen">
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                           <select class="form-select col-sm-3 col-form-label" placeholder="Status">
                                <option selected>Status</option>
                                <option value="1">active</option>
                                <option value="2">inactive</option>
                             </select>
                        </div>
                      </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
      </div>
</div> --}}
</div>



@endsection