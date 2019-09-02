@include('layouts.header')
@if(Session::has('cart'))
    <div class="row mt-4">
        <div class="col-sm-6">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge badge-primary">{{ $product['qty'] }}</span>
                        <strong>{{ $product['item']['title'] }}</strong>
                        <span class="badge badge-info">{{ $product['price'] }} p</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" class="btn btn-success" href="{{ route('cart.add', ['id' => $product['item']['id']]) }}">Добавить</a>
                            <a role="button" class="btn btn-secondary" href="{{ route('cart.remove', ['id' => $product['item']['id']]) }}">Удалить</a>
                            <a role="button" class="btn btn-secondary" href="{{ route('cart.removeAllById', ['id' => $product['item']['id']]) }}">Удалить все</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6">
            <strong>Общая сумма: {{ $totalPrice }}</strong>
        </div>
    </div>
    @if($totalPrice)
    <div class="row mt-4">
        <div class="col-sm-6">
            <a role="button" class="btn btn-success" href="{{ route('order.form') }}">Перейти к оформлению</a>
        </div>
    </div>
    @endif
@else
    <div class="row mt-4">
        <div class="col-sm-6">
            <strong>Общая сумма: 0</strong>
        </div>
    </div>
@endif

@include('layouts.footer')