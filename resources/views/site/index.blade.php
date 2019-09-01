@include('layouts.header')
<div class="card">
    <img src="{{ asset('images/main_miska.png') }}" class="card-img-top" alt="...">
</div>
<div class="container">
    <h3 class="text-center mt-4">Категории товаров</h3>
    <div class="col-lg-10 mx-auto">
        <div class="row">
            @foreach($groups as $group)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/default_category.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('goods.category', ['category' => $group->category]) }}" class="card-text">{{ $group->category }} ({{ $group->count }})</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <h3 class="text-center mt-4">Список товаров</h3>
    <div class="col-lg-10 mx-auto">
        <div class="row">
            @foreach($allGoods as $item)
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