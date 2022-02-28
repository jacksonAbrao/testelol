@extends("layouts.main")

@section("title", "Dashboard - Planos")

@section("content")
<div class="container mt-100 w-100">

    <div class="row">
        <div class="col-md-12">
            <div>
                <h1>Planos</h1>
                <hr>
            </div>
            <div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#criationModal" data-bs-whatever="@mdo">Criar mais</button>
                </div>
                <div class="modal fade" id="criationModal" tabindex="-1" aria-labelledby="criationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="criationModalLabel">Criar um novo Plano</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/dashboard_plans" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Nome do Plano</label>
                                        <input type="text" class="form-control" id="name" name="name" required inputmode="search">
                                    </div>
                                    <div class="mb-3">
                                        <label for="minutes" class="col-form-label">Quantidade de minutos</label>
                                        <input type="number" class="form-control" id="minutes-qty" name="minutes" required inputmode="numeric">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title">Descrição:</label>
                                        <textarea name="description" id="description" class="form-control" required placeholder="Como funciona o plano?"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" value="create-plan" id="liveToastBtn">Criar Plano</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table text-end">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Minutos</th>
                            <th scope="col">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</th>
                            <td scope="row">{{ $plan->name }}</td>
                            <td scope="row">{{ $plan->minutes }}</td>
                            <td scope="row">{{ $plan->description }}</td>
                            <td scope="row">
                                <form action="/dashboard_plans/{{$plan->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
