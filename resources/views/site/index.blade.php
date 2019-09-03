@include('layouts.header')
<div class="card">
    <img src="{{ asset('images/main_miska.png') }}" class="card-img-top" alt="...">
</div>
@include('site.showMessages')
<div class="container">
    <h3 class="text-center mt-4">Категории товаров</h3>
    <div class="col-lg-10 mx-auto">
        @foreach($groups->chunk(3) as $groupChunk)
            <div class="row">
                @foreach($groupChunk as $group)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('images/default_category.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('goods.category', ['category' => $group->category_id]) }}" class="card-text">{{ $group->category_id }} ({{ $group->count }})</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <h3 class="text-center mt-4">Список товаров</h3>
    <div class="col-lg-10 mx-auto">
        @foreach($allGoods->chunk(3) as $goodsChunk)
            <div class="row mt-4">
                @foreach($goodsChunk as $item)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('images/default_goods.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="card-text" href="{{ route('goods.item', ['id' => $item->id]) }}">{{ $item->title }} ({{ $item->price }}р)</a>
                                <a href="{{ route('cart.add', ['id' => $item->id]) }}" class="btn btn-success" role="button">В корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')