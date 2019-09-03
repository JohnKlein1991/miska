@include('site.admin.layouts.header')
@include('site.admin.layouts.messages')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    Добавить
                </a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название товара</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $item->price }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($list->total() > $list->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


@include('site.admin.layouts.footer')