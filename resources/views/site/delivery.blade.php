@include('layouts.header')

<div class="container mt-4">
    <div class="col-lg-9">
        <h2 class="mt-4 text-center">Условия для доставки:</h2>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                По Москве
                <span class="badge badge-primary badge-pill">300р</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                до 25 км. от МКАД
                <span class="badge badge-primary badge-pill">500р</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                25км. от МКАД
                <span class="badge badge-primary badge-pill">1000р</span>
            </li>
        </ul>
    </div>
</div>

@include('layouts.footer')