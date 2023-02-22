@if(session()->has('array_error'))

  @foreach (session()->get('array_error') as $f)
       <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alerte!</h5>
            {{ $f->errors() }}
        </div>
  @endforeach

@endif

@if(session()->has('error'))
         <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alerte!</h5>
           {{ session()->get('error') }}
        </div>
@endif

@if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alerte!</h5>
           {{ session()->get('message') }}
        </div>
@endif

@if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alerte!</h5>
            {{ session()->get('success') }}
        </div>
@endif

@if (session('status'))
       <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alerte!</h5>
             {{ session('status') }}
        </div>
@endif
