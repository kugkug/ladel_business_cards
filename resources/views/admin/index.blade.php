@include('partials.clients.headers')

    <div class="card">
        <div class="card-header">
            
                <h3 class="card-title">
                    List of Employees
                </h3>

                <div class="card-tools">
                    <a href="/add/employee" class="btn btn-info">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <!-- /.card-tools -->
            
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <h4 class="text-success">{{session('message')}}</h4>
            @endif
            <div class="row">
                @foreach ($employees as $employee)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <p>{{ $employee->id_no}}</p>
                        {{-- {{ $employee->position_title}} --}}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                        <div class="col-12">
                            <h2 class="lead"><b>
                                <?=ucwords(strtolower($employee->first_name ." " . $employee->middle_name ." ". $employee->last_name));?>
                            </b></h2>
                            {{-- <p class="text-muted text-sm"><b>Position: 
                                </b> {{ $employee->position_title}}
                            </p> --}}
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li">
                                <i class="fas fa-lg fa-envelope"></i></span> 
                                Email: {{ $employee->email}}
                            </li>
                            <li class="small"><span class="fa-li">
                                <i class="fas fa-lg fa-phone"></i></span> 
                                Phone #: {{ $employee->employee_number}}</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="/edit/employee/{{$employee->id_no}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                            <a href="/employee/generate/qrcode/{{$employee->id_no}}" target="_blank" class="btn btn-sm btn-success">
                                <i class="fas fa-qrcode"></i> Generate Qr Code
                            </a>
                            <form action="/execute/emp-delete/{{$employee->id_no}}" method="POST">
                                @method("DELETE")
                                @csrf
                                    <button class="btn btn-sm bg-danger" data-trigger="delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                            </form>
                        
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            
                
        </div>
        
        <div class="card-footer">
            {{ $employees->links() }}
            
        </div>
    </div>

@include('partials.clients.footers')

<script src="{{ asset('adminlte3.2/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('scripts/admin.js') }}"></script>