@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
