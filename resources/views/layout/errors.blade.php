@if(session()->has('errors'))
    @foreach(session()->get('errors')->all() as $error)
        <div class="alert alert-warning alert-dismissible">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
