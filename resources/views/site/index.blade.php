@include('header')
<div class="card">
    <img src="{{ asset('images/main_miska.png') }}" class="card-img-top" alt="...">
</div>
<div class="container">
    <h3>Категории товаров</h3>
    <div class="col-lg-10">
        <div class="row">
            @foreach($groups as $group)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/default_category.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $group->category }} ({{ $group->count }})</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">
    <h3>Список товаров</h3>
    <div class="col-lg-10">
        <div class="row">
            @foreach($allGoods as $item)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/default_goods.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $item->title }} ({{ $item->price }}р)</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('footer')