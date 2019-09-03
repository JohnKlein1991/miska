@include('site.admin.layouts.header')
@include('site.admin.layouts.messages')

@if($category->exists)
    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
        @method('PATCH')
        @else
            <form method="post" action="{{ route('admin.category.store') }}">
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
                                                        <label for="name">Название</label>
                                                        <input type="text" value="{{ old('title', $category->name) }}"
                                                               id="name"
                                                               name="name"
                                                               class="form-control"
                                                               minlength="3"
                                                               required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                            <a class="btn btn-primary" href="{{ route('admin.category.index') }}" role="button">Вернуться к списку</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

@include('site.admin.layouts.footer')