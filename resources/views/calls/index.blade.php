@extends("layouts.main")

@section("title", "Planos")

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
                                <h1 id="complano">Você pagara  x  com o plano </h1>
                                <h1 id="semplano">Você pagara  x  sem o plano </h1>
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
            }
            var texto = `Você pagara R$ ${total.toFixed(2)} com o plano ${plano.name}`;
            $("#complano").html(texto);
            var texto = `Você pagara R$ ${(total + tarifa).toFixed(2)} sem o plano ${plano.name}`;
            $("#semplano").html(texto);

        });

    });
</script>

@endsection

<?php

/*  if (isset($tarifa)) {
  $jurus = $tarifa * 0.10;
  $tarifaCorrigida = $tarifa + $jurus;
  $valorPagarPlano = ($min - $plano) * $tarifaCorrigida;
  $valorPagarSem = $min * $tarifa;

  if ($min <= $plano) { echo "Sua ligação sairá de graça pelo plano fale mais $plano ou <br> Pagara R$" . number_format($valorPagarSem, 2, ',' , '.' ) . " sem o plano" ; } else { echo "você pagará R$ " . number_format($valorPagarPlano, 2, ',' , '.' ) . " com o plano Fale mais $plano ou <br> Pagara R$ " . number_format($valorPagarSem, 2, ',' , '.' ) . " sem o plano." ; } } else { echo "Não temos plano para essa ligação" ; }
  */
?>
