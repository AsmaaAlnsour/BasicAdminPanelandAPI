@if(Session::has('success'))
    <div class="alert alert-success text-center mr-2 h6" role="alert">
        {{ Session('success') }}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger text-center mr-2 h6" role="alert">
        {{ Session('danger') }}
    </div>
@endif
