@include('site.admin.layouts.header')
@include('site.admin.layouts.messages')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">

                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#maindata">Основные данные</a>
                                </li>
                            </ul>
                            <br>
                            <div class="card" style="">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Имя:</strong> {{ $order->name }}</li>
                                    <li class="list-group-item"><strong>Телефон:</strong> {{ $order->phone }}</li>
                                    <li class="list-group-item"><strong>Адрес:</strong> {{ $order->address }}</li>
                                    <li class="list-group-item"><strong>Заказ:</strong></li>
                                    <li class="list-group-item">
                                        @php
                                            foreach ($cart->items as $item){
                                                echo "<strong>Наименование:</strong> {$item['item']['title']}<br>
                                                      <strong>Кол-во:</strong> {$item['qty']}<br>
                                                      <strong>Цена:</strong> {$item['price']}<hr>";
                                            }
                                        @endphp
                                    </li>
                                    <li class="list-group-item"><strong>Общая
                                            стоимость:</strong> {{ $cart->totalPrice }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Удалить
                                </button>
                            </form>
                            <a class="btn btn-primary mt-4" href="{{ route('admin.order.index') }}" role="button">Вернуться к
                                списку</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('site.admin.layouts.footer')