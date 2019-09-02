@include('layouts.header')
@if(Session::has('cart'))
    <div class="offset-md-4 col-sm-8">
        <div class="row mt-4">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge badge-primary">{{ $product['qty'] }}</span>
                        <strong>{{ $product['item']['title'] }}</strong>
                        <span class="badge badge-info">{{ $product['price'] }} p</span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a role="button" class="btn btn-success"
                               href="{{ route('cart.add', ['id' => $product['item']['id']]) }}">Добавить</a>
                            <a role="button" class="btn btn-secondary"
                               href="{{ route('cart.remove', ['id' => $product['item']['id']]) }}">Удалить</a>
                            <a role="button" class="btn btn-secondary"
                               href="{{ route('cart.removeAllById', ['id' => $product['item']['id']]) }}">Удалить
                                все</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <strong>Общая сумма: {{ $totalPrice }}</strong>
            </div>
        </div>
        <div class="row mt-4">
            <form action="" method="post">
                @csrf
                <div class="col-lg-12 m-auto">
                    <div class="form-group ">
                        <label for="name">Имя</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-12 m-auto">
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-12 m-auto">
                    <div class="form-group">
                        <label for="address">Адрес</label>
                        <textarea id="address" class="form-control" name="address" cols="65" required></textarea>
                    </div>
                </div>
                <div class="col-lg-12 m-auto">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Оформить заказ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

@include('layouts.footer')