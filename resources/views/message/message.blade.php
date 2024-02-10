@if(session()->has('message'))
    <div class="alert alert-{{session('type')}} fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{ session('message') }}
    </div>
@endif
