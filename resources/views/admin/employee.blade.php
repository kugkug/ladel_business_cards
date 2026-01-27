@include('partials.clients.headers')
    
<style>
    #div-card {
        background-color: 	rgb(211,211,211)!important;
        
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        
    }

    .demo-bg {
        opacity: 0.5;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
    }

</style>
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Employee Information
            </h3>
        </div>
        <div class="card-body"> --}}
            <div class="row demo-wrap">
                <div class="col-12" id="div-card">
                    <img class="demo-bg mt-5" src="{{ asset('images/aee_horizontal_logo.png') }}">
                    <div class="card-header border-bottom-0 " style="color: #000000;">
                        <h2 class="lead text-red"><b>
                            {{ $employee[0]->first_name}}
                            {{ $employee[0]->middle_name}}
                            {{ $employee[0]->last_name}}
                        </b></h2>
                        <p class="text-sm">
                            {{ $employee[0]->position_title}} <br />

                            {{ $employee[0]->department}} <br />
                            {{ $employee[0]->email}} <br />
                            {{ $employee[0]->employee_number}} <br />
                            <a href="http://aboitizeconomicestates.com" target="_blank">www.aboitizeconomicestates.com</a>
                        </p>
                        
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                        <div class="col-12 pb-2">
                            <p class=" text-sm" style="color: #000000;">
                                Paperless Information Transfer <br />
                                Tap to Save Contact Details
                            </p>
                            
                            {{-- <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li">
                                <i class="fas fa-lg  fa-envelope"></i></span> 
                                Email: {{ $employee[0]->email}}
                            </li>
                            <li class="small"><span class="fa-li">
                                <i class="fas fa-lg fa-phone"></i></span> 
                                Phone #: {{ $employee[0]->employee_number}}</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
            <a href="/employee/vcard/{{$employee[0]->id_no}}" class="mt-2 btn btn-sm btn-block btn-primary" id="save-btn">
                <i class="fas fa-plus"></i> Add to Contact
            </a>  
        {{-- </div> --}}
        {{-- <div class="card-footer">
            <div class="text-right">
                <a href="/employee/vcard/{{$employee[0]->id_no}}" class="btn btn-sm btn-block btn-primary" id="save-btn">
                    <i class="fas fa-plus"></i> Add to Contact
                </a>                    
            </div>
        </div>
        
    </div> --}}
    

@include('partials.clients.footers')

<script src="{{ asset('adminlte3.2/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('scripts/admin.js') }}"></script>