@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('Guardaformps2stock')}}" method="POST">@csrf
                    <div class="col-12">
                        <div class="box">
                            <strong style="background-color:rgb(233, 233, 233);color:black;padding: 5px;">Código de Ficha: {{$codigo}}</strong>
                        </div>
                    </div>
                    <input type="text" name="id" value="{{$id}}" id="{{$id}}" hidden>
                    <h6 style="text-align:center">Formato de seguimiento del PROMOTOR DE SALUD (Hoja2)</h6>
                    <h6 style="text-align:center">Stock de Medicamentos e Insumos</h6>
                    @foreach ($competencias as $item)
                        <div class="row" style="margin-top:10px;">
                            <div class="col-xl-6">
                                <div class="row">
                                    <label for="" class="form-label">Insumos y Medicamentos</label>
                                    <label for="">{{$item->nombre_competencia}}</label>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Unidades</label>
                                <input type="number" step="0.10" class=" form-control form-control-sm" name="unidades1{{$item->id}}">                                
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Fecha de Vencimiento</label>
                                <input type="date" value="2022-06-01" class=" form-control form-control-sm" name="fecha1{{$item->id}}">
                            </div>
                        </div>
                        <hr>       
                    @endforeach
                    <button type="submit" class="btn-sm btn-warning">Guardar</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script_select2')
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

</script>
@endsection
