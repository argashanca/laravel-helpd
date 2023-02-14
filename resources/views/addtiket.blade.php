@extends('layouts.mainlayouts')

@section('title', 'Ticket')


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
    
    
    
                    <a href="/ticket" class="btn btn-inverse-primary btn-sm mdi mdi mdi-undo-variant">
                      Cancel
                    </a>
                    <div class="card-body">
                      <h4 class="card-title">New Ticket Form</h4>

                      <form action="" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">No. Ticket</label>
                          <div class="col-sm-9">
                            <input type="text" style="text-transform: uppercase" class="form-control" name="no_tiket" placeholder="No Tickets" value="{{$ticket_num}}" required readonly >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">Ticket Subject</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="req_subject" placeholder="Ticket Subject" value ="{{old('req_subject')}}" required >
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">Requester</label>
                          <div class="col-sm-9"> 
                            <input type="text" class="form-control" name="requester" required readonly value="{{Auth::user()->username}}">
                            <input type="hidden" class="form-control" name="user_id" required  value="{{Auth::user()->id}}">
                            <input type="hidden" class="form-control" name="user_group_id" required  value="{{Auth::user()->user_group_id}}">
                          </div>
                        </div>
                        {{-- <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">

                            <select name="user_group_id" class="form-select col-sm-3 col-form-label" required>
                            <option value="1"{{ Auth::user()->user_group_id  == "1" ? 'selected' : '' }}>IT</option>
                            <option value="2"{{ Auth::user()->user_group_id  == "2" ? 'selected' : '' }}>Finance & Accounting</option>
                            <option value="3"{{ Auth::user()->user_group_id  == "3" ? 'selected' : '' }}>Sales</option>
                            <option value="4"{{ Auth::user()->user_group_id  == "4" ? 'selected' : '' }}>HCGA</option>
                            <option value="5"{{ Auth::user()->user_group_id  == "5" ? 'selected' : '' }}>Logistic</option>
                            <option value="6"{{ Auth::user()->user_group_id  == "6" ? 'selected' : '' }}>Inventory Development</option>
                            </select>
                            

                            <?php if (Auth::user()->user_group_id == 1) : ?>
                            <input name="user_group_id" type="text" class="form-control" value="IT" readonly required>
                            <?php elseif (Auth::user()->user_group_id == 2) : ?>
                            <input name="user_group_id"  type="text" class="form-control" value="Finance & Accounting" readonly required>  
                            <?php elseif (Auth::user()->user_group_id == 3) : ?>
                            <input name="user_group_id" type="text" class="form-control" value="Sales" readonly required>
                            <?php elseif (Auth::user()->user_group_id == 4) : ?>
                            <input name="user_group_id" type="text" class="form-control" value="HCGA" readonly required>
                            <?php elseif (Auth::user()->user_group_id == 5) : ?>
                            <input name="user_group_id" type="text" class="form-control" value="IT" readonly required>
                            <?php else : ?>
                            <input name="user_group_id" type="text" class="form-control" value="Inventory Development" readonly required>
                            <?php endif; ?>
                          </div>
                        </div> --}}
                       
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Priority</label>
                            <div class="col-sm-9">
                                <select name="priority" class="form-select col-sm-3 col-form-label" placeholder="Departmen" required>
                                    <option value="">--</option>
                                    <option value="1">Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                 </select>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="control-label label-required" for="ticket_body">Ticket Description</label>		                        			     	
                            <textarea  style="height: 200px;" class="form-control app-html-editor force-bv" id="ticket_body" name="req_desc"  required="required"  placeholder="Ticket Body" data-bv-notempty="true" 	data-bv-notempty-message="Ticket Body is required"></textarea>
                        </div>  
                        
                         <div id="main_file_btn" class="form-group app-file-main-container">
                        <div class="card card-default m-b-5">
                            <div class="card-body app-file-upload-container">
                              <div class="mb-3">
                                <label for="formFileMultiple" class="form-label mb-4">Image File</label>
                                <input class="form-control @error('attach') is-invalid @enderror" type="file" name="attach" id="attach" multiple>
                                @error('attach')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                             
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary me-2 mt-4">Submit</button>
                      </form>
                    </div>
                  </div>
          </div>
    </div>
    </div>
</div>

@endsection