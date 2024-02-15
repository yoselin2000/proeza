@if(session('rechazo'))
    <div class="alert alert-danger p-1 mb-1">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <p>{{ session('rechazo') }}</p>
    </div>
@endif