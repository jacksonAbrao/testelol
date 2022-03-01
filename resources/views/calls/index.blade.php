@extends("layouts.main")

@section("title", "Calculando Chamadas")

@section("content")


<div class="container mt-100">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text d-flex flex-column align-items-center">
                <h1 class="title black">Calcular chamada</h1>
                <h1 id="typewriter" class="text-center">
                    <div id="typing"></div>
                    <div class="blink">|</div>
                </h1>
                <form action="/dashboard_plans" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="plano" class="col-form-label">Escolha um plano</label>

                        <select class="form-select" id="plano" aria-label="Example select with button addon">
                            <option selected>escolha...</option>

                            @foreach($plans as $plan)
                                <option value="{{$plan->id}}">{{$plan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tarifa" class="col-form-label">Escolha o DDD de origem e destino</label>

                        <select class="form-select" id="tarifa" aria-label="Example select with button addon">
                            <option selected>escolha...</option>
                            @foreach($tariffs as $tariff)
                            <option value="{{$tariff->tariff}}">{{$tariff->area_code_origin}} para {{$tariff->area_code_destination}} com R$ {{number_format($tariff->tariff, 2, ',', '.')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="minutos" class="col-form-label">Quantidade de minutos que pretende chamar</label>
                        <input type="number" class="form-control" id="minutos"required inputmode="numeric">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark"  id="btncalcular">Calcular</button>
                    </div>
                </form>

                <div class="modal" id="calcmodal" tabindex="-1" aria-labelledby="calcmodalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="calcmodalLabel">Criar um novo Plano</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="complano">Você não colocou informações suficientes </p>
                                <p id="semplano"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var planos = @json($plans);
    $(document).ready(function(){
        $("#btncalcular").on("click", function(){
            $("#calcmodal").modal("show");
            var planoid = $("#plano").val();
            var plano = null;
            for(var i = 0; i < planos.length; i++){
                if(planos[i].id == planoid){
                    plano = planos[i];
                    break;
                }
            }

            var tarifa = parseFloat($("#tarifa").val());
            var minutos = parseFloat($("#minutos").val());
            var jurus = tarifa * 0.10;
            var tarifaCorrigida = tarifa + jurus;

            if(minutos > plano.minutes){

                var total = (minutos - plano.minutes) * tarifaCorrigida

            }else {
                var total = 0
            };
                if(total == 0){
                    $("#complano").html(`Sua ligação sairá de graça pelo plano ${plano.name}`);
                }else {
                    $("#complano").html(`Você pagara R$ ${total.toFixed(2)} com o plano ${plano.name}`);
                }
                var texto = `Você pagara R$ ${(minutos * tarifa).toFixed(2)} sem o plano ${plano.name}`;
                $("#semplano").html(texto);

            });

    });
</script>

@endsection
