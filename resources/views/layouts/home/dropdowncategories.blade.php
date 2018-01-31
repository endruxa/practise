<div class="container">
    <div class="btn btn-group-vertical" role="group" aria-label="Категории">
        <!-- Left Side Of Navbar -->
        <ul class="dropdown-menu">
            @include('layouts._top_menu', ['categories' => $categories])
        </ul>
    </div>
</div>