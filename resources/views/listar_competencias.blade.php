@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3">
                <i class="lni lni-plus"></i> Nueva Competencia
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="width: 30%;text-align: center;">Actividad</th>
                            <th style="text-align: center;">TipoCompetencia</th>
                            <th style="text-align: center;">Competencia</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competencias as $obj)
                            <tr>               
                                <td>{{$obj->idcompetencia}}</td>
                                <td>{{$obj->nombre_actividades}}</td> 
                                <td>{{$obj->tipo_competencia}}</td>
                                <td>{{$obj->nombre_competencia}}</td>
                                <td style="vertical-align: middle;">
                                <button class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1{{$obj->idcompetencia}}">
                                    <i class="lni lni-pencil"></i>
                                </button>
                                <button class="btn-sm btn-danger btnEliminar" data-bs-toggle="modal" data-bs-target="#exampleSmallModal2{{$obj->idcompetencia}}">
                                    <i class="lni lni-circle-plus"></i>
                                </button>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        @foreach ($competencias as $obj)
        <form action="{{route('Editar.Competencias')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal1{{$obj->idcompetencia}}" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Competencia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input hidden type="text" value="{{$obj->idcompetencia}}" id="editid" name="editid">
                            <label for="form" class="form-label">Nombre Actividad</label>
                            
                            <select class="single-select" name="actividad{{$obj->idcompetencia}}">
                                @foreach ($actividades as $act)
                                    @if ($obj->actividadId==$act->id)
                                        <option value="{{$obj->actividadId}}" selected="selected">{{$obj->nombre_actividades}}</option>    
                                    @else
                                        <option value="{{$act->id}}">{{$act->nombre_actividades}}</option>    
                                    @endif
                                @endforeach
                            </select>

                            {{-- <label for="form" class="form-label">Tipo Competencia</label>
                            <input name="tipocompetencia{{$obj->idcompetencia}}" id="tipocompetencia{{$obj->idcompetencia}}" value="{{$obj->tipo_competencia}}" class="form-control form-control-sm"> --}}
                            
                            <select id="tipocompetencia{{$obj->idcompetencia}}" name="tipocompetencia{{$obj->idcompetencia}}" class="form-select form-select-sm mb-3">
                                @if ($obj->tipo_competencia=='promotor de salud')
                                    <option value="promotor de salud" selected>promotor de salud</option>
                                    <option value="stock de medicamentos">stock de medicamentos</option>    
                                @else
                                    <option value="promotor de salud">promotor de salud</option>
                                    <option value="stock de medicamentos" selected>stock de medicamentos</option>
                                @endif
                            </select>



                            <label for="form" class="form-label">Nombre Competencia</label>
                            <textarea name="nombrecompetencia{{$obj->idcompetencia}}" id="nombrecompetencia{{$obj->idcompetencia}}" class="form-control form-control-sm" style="height: 130px"> {{$obj->nombre_competencia}}</textarea>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endforeach

    
        <form  action="{{route('Crear.Competencias')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal3" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Competencia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="form" class="form-label">Seleccione una Actividad</label>
                            
                            <select class="single-select" name="actividadId" id ="actividadId" >
                                @foreach ($actividades as $item)
                                    <option value="{{$item->id}}">{{$item->nombre_actividades}}</option>    
                                @endforeach
                            </select>
                            <label for="form" class="form-label">Tipo de Competencia</label>
                            <select id="tipocompetencia" name="tipocompetencia" class="form-select form-select-sm mb-3">
                                <option value="promotor de salud">promotor de salud</option>
                                <option value="stock de medicamentos">stock de medicamentos</option>
                            </select>
                
                            <label for="form" class="form-label">Nombre Competencia</label>
                            <textarea name="nombrecompetencia" id="nombrecompetencia" value="" class="form-control form-control-sm" style="height: 130"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

       
        <form  id="formEliminarActividad" action="{{route('Eliminar.Competencia')}}" method="POST">
            @csrf
            <div class="modal fade" id="formEliminarActividadModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" value="" id="borrarid" name="borrarid" hidden>
                            <h6>Se procederá a eliminar el registro Id: <strong id="Parrafo"></strong>, esta seguro?</h6>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn-sm btn-danger">Si</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


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

@section('script_table')
<script>
    $(document).on("click",".btnEliminar",function(){
        fila=$(this).closest("tr");
        id=parseInt(fila.find('td:eq(0)').text());
        $("#borrarid").val(id);
        $("#Parrafo").text(id);
        $("#formEliminarActividadModal").modal('show');
    });

    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print'],
            order:[0]
        } 
    );
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
@endsection