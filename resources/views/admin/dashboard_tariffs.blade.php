@extends("layouts.main")

@section("title", "Dashboard - Tarifas")

@section("content")
<div class="container mt-100">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1>Tarifas</h1>
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
                                <h5 class="modal-title" id="criationModalLabel">Criar nova tarifa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/dashboard_tariffs" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Código de área de origem</label>
                                        <input type="number" class="form-control" id="area_code_origin" name="area_code_origin" required inputmode="numeric">
                                    </div>
                                    <div class="mb-3">
                                        <label for="minutes" class="col-form-label">Código de área de destino</label>
                                        <input type="number" class="form-control" id="area_code_destination" name="area_code_destination" required inputmode="numeric">
                                    </div>
                                    <div class="mb-3">
                                        <label for="minutes" class="col-form-label">Preço da tarifa</label>
                                        <input type="number" class="form-control" id="tariff" name="tariff" required inputmode="numeric">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" value="create-tariff" id="liveToastBtn">Criar Plano</button>
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
                            <th scope="col">Origem</th></th>
                            <th scope="col">Destino</th>
                            <th scope="col">Tarifa</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="">

                        @foreach($tariffs as $tariff)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td scope="row">{{ $tariff->area_code_origin }}</td>
                            <td scope="row">{{ $tariff->area_code_destination }}</td>
                            <td scope="row">R$ {{ number_format($tariff->tariff, 2, ',')}}</td>
                            <td scope="row">
                                <form action="/dashboard_tariffs/{{$tariff->id}}" method="POST">
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

