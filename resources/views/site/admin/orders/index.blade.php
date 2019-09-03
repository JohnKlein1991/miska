@include('site.admin.layouts.header')
@include('site.admin.layouts.messages')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Адрес</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.order.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.show', $item->id) }}">
                                        {{ $item->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.show', $item->id) }}">
                                        {{ substr($item->address, 0, 20) }}
                                    </a>
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