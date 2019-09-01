@include('layouts.header')

<div class="container mt-4">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/default_category.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $model->title }}</h5>
            <p class="card-text">Описание товара</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Категория: {{ $model->category }}</li>
            <li class="list-group-item">Цена: {{ $model->price }} р</li>
            <li class="list-group-item"><a href="#">В корзину</a></li>
        </ul>
    </div>
</div>

@include('layouts.footer')