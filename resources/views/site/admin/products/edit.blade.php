@include('site.admin.layouts.header')
@include('site.admin.layouts.messages')

@if($product->exists)
    <form method="post" action="{{ route('admin.products.update', $product->id) }}">
        @method('PATCH')
        @else
            <form method="post" action="{{ route('admin.products.store') }}">
                @endif
                @csrf
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
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="maindata" role="tabpanel">
                                                    <div class="form-group">
                                                        <label for="title">Заголовок</label>
                                                        <input type="text" value="{{ old('title', $product->title) }}"
                                                               id="title"
                                                               name="title"
                                                               class="form-control"
                                                               minlength="3"
                                                               required
                                                        >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="price">Цена</label>
                                                        <input type="text" value="{{ old('price', $product->price) }}"
                                                               id="price"
                                                               name="price"
                                                               class="form-control"
                                                        >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="parent_id">Категория</label>
                                                        <select type="text"
                                                                id="category_id"
                                                                name="category_id"
                                                                class="form-control"
                                                                required
                                                        >
                                                            @foreach($categoryList as $item)
                                                                <option value="{{ $item->id }}"
                                                                        @if($item->id === $product->category_id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                            <a class="btn btn-primary" href="{{ route('admin.products.index') }}" role="button">Вернуться к списку</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if($product->exists)
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body ml-auto">
                                        <button type="submit" class="btn btn-link">
                                            Удалить
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
@endif

@include('site.admin.layouts.footer')