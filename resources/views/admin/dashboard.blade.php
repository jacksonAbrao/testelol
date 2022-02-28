@extends("layouts.main")

@section("title", "Dashboard")

@section("content")

<body id="body">
    <div class="filter">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text d-flex flex-column align-items-center">
                    <h1 class="title">Você deseja?</h1>
                    <a href="/dashboard_plans" class="btn button btn-dark">Editar planos</a>
                    <a href="/dashboard_tariffs" class="btn button btn-dark">Editar tarifas</a>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
