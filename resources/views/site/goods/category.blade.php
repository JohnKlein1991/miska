@include('layouts.header')

<div class="container">
    <h3 class="text-center mt-4">Категория {{ $category }}</h3>
    <div class="col-lg-10 mx-auto">
        <div class="row">
            @foreach($models as $item)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/default_goods.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-text" href="{{ route('goods.item', ['id' => $item->id]) }}">{{ $item->title }} ({{ $item->price }}р)</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')