@if (session('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        {{ session('success') }}
    </div>
@endif
@if (session('fail'))
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        {{ session('fail') }}
    </div>
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            {{ $error }}
        </div>
    @endforeach
@endif