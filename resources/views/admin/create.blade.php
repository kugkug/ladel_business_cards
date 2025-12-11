@include('partials.clients.headers')
<div class="row">
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa-solid fa-clipboard-user"></i>
                    New Employee
                </h3>
            </div>

            <form action="/execute/emp-save" method="POST">
                @csrf
                
                <div class="card-body">
                    @if(session()->has('message'))
                        <h4 class="text-success">{{session('message')}}</h4>
                    @endif
                    <div class="form-group">
                        <label for="id_no">Id No.</label>
                        <input type="text" name="id_no" class="form-control " placeholder="I.D. Number" value="{{ old('id_no') }}">
                        @if($errors->has('id_no'))
                            <div class="text-danger">{{ $errors->first('id_no') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Lastname</label>
                        <input type="text" name="last_name" class="form-control " placeholder="Lastname" value="{{ old('last_name') }}">
                        @if($errors->has('last_name'))
                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middlename</label>
                        <input type="text" name="middle_name" class="form-control " placeholder="Middlename" value="{{ old('middle_name') }}">
                        @if($errors->has('middle_name'))
                            <div class="text-danger">{{ $errors->first('middle_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name">Firstname</label>
                        <input type="text" name="first_name" class="form-control " placeholder="Firstname" value="{{ old('first_name') }}">
                        @if($errors->has('first_name'))
                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control " placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="department" class="d-flex justify-content-between">
                            <span>Department</span> 
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" data-trigger="department">
                                <span data-type="add">
                                    <i class="fa fa-plus"></i>
                                </span>                                
                            </a>
                        </label>
                        <input type="text" name="department" class="form-control " placeholder="Department" style="display: none;" value="{{ old('department') }}">
                        <select class="form-control mt-2" name="select_department">
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{$department}}" <?= (strtoupper(old('department')) == strtoupper($department)) ? " selected" : ""; ?>>{{strtoupper($department)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('department'))
                            <div class="text-danger">{{ $errors->first('department') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="position_title">Position Title</label>
                        <input type="text" name="position_title" class="form-control " placeholder="Position Title" value="{{ old('position_title') }}">
                        @if($errors->has('position_title'))
                            <div class="text-danger">{{ $errors->first('position_title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="employee_number">Employee Contact No.</label>
                        <input type="text" name="employee_number" class="form-control " placeholder="Employee Contact No." value="{{ old('employee_number') }}">
                        @if($errors->has('employee_number'))
                            <div class="text-danger">{{ $errors->first('employee_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="employee_number_alt">Employee Contact No. Alt.</label>
                        <input type="text" name="employee_number_alt" class="form-control " placeholder="Employee Contact No. Alt." value="{{ old('employee_number_alt') }}">
                        @if($errors->has('employee_number_alt'))
                            <div class="text-danger">{{ $errors->first('employee_number_alt') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control " placeholder="Address" value="{{ old('address') }}">
                        @if($errors->has('address'))
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" name="contact_person" class="form-control " placeholder="Contact Person" value="{{ old('contact_person') }}">
                        @if($errors->has('contact_person'))
                            <div class="text-danger">{{ $errors->first('contact_person') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_person_number">Contact Person No.</label>
                        <input type="text" name="contact_person_number" class="form-control " placeholder="Contact Person No." value="{{ old('contact_person_number') }}">
                        @if($errors->has('contact_person_number'))
                            <div class="text-danger">{{ $errors->first('contact_person_number') }}</div>
                        @endif
                    </div>

                    
                <div class="card-footer">
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Add
                        </button>

                        <a href="/admin/employee-list" class="btn btn-danger">
                            <i class="fa fa-undo"></i>
                            Back To List
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('partials.clients.footers')

<script src="{{ asset('adminlte3.2/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('scripts/create.js') }}"></script>