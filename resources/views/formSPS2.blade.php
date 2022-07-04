@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('Guardaformps2')}}" method="POST">@csrf
                    <div class="col-12">
                        <div class="box">
                            <strong style="background-color:rgb(233, 233, 233);color:black;padding: 5px;">Código de Ficha: {{$codigo}}</strong>
                        </div>
                        
                    </div>
                    <input type="text" name="id" value="{{$id}}" id="{{$id}}" hidden>
                    <h6 style="text-align:center">Formato de seguimiento del AGENTE COMUNITARIO DE SALUD (Hoja2)</h6>
                    <h6 style="text-align:center">Competencias y/o Funciones</h6>
                    @foreach ($competencias as $item)
                        <div class="row" style="margin-top:10px;">
                            <div class="col-xl-6">
                                <label for="">{{$item->nombre_competencia}}</label>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Hizo la actividad?</label>
                                <select class="form-select form-select-sm mb-3" id="visita1{{$item->id}}" name="visita1{{$item->id}}">
                                    <option value="--">--</option>
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="">Observación</label>
                                <textarea type="text" class=" form-control form-control-sm" name="obs1{{$item->id}}"></textarea>
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
