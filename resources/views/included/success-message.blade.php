@if(session('success'))
    <div class="alert alert-success">
        {{(session('success'))}}
    </div>
@endif


@if(session('header'))
    <div class="alert alert-danger">
        {{(session('header'))}}
    </div>
@endif
