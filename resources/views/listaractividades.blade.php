@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3">
                <i class="lni lni-plus"></i> Nueva Actividad
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nro</th>
                            <th style="width: 30%;text-align: center;">Objetivo</th>
                            <th style="text-align: center;">Actividad</th>
                            <th style="text-align: center;">Acción</th>
                            <th style="text-align: center;">Meta</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($actividades as $val=>$act)    
                            <tr>         
                                <td>{{$val+=1}}</td>
                                <td>{{$act->nombre}}</td> 
                                <td>{{$act->nombre_actividades}}</td>
                                <td style="vertical-align: middle;">
                                    <button class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1{{$act->actividadId}}">
                                    <i class="lni lni-pencil"></i>
                                    </button>
                                    {{-- <button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleSmallModal2"  onclick="fdelete({{$act->id}});">
                                        <i class="lni lni-cross-circle"></i>
                                    </button> --}}
                                </td>
                                <td>Metas</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>


        @foreach ($actividades as $act)
            <form  action="{{route('editar.actividades')}}" method="POST">
                @csrf
                <div class="modal fade" id="exampleSmallModal1{{$act->actividadId}}" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Actividad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input hidden type="text" value="{{$act->id}}" id="editid" name="editid">
                                <label for="form" class="form-label">Nombre Actividad</label>
                                
                                <select class="single-select" name="objetivo{{$act->actividadId}}">
                                    @foreach ($objetivos as $obj)
                                        @if ($act->objetivo_id==$obj->id)
                                            <option value="{{$act->objetivo_id}}" selected="selected">{{$act->nombre}}</option>    
                                        @else
                                            <option value="{{$obj->id}}">{{$obj->nombre}}</option>    
                                        @endif
                                    @endforeach                                    
                                </select>
                                <label for="form" class="form-label">Nombre Actividad</label>
                                <textarea name="editnombre{{$act->id}}" id="editnombre" value="" class="form-control form-control-sm" style="height: 130">{{$act->nombre_actividades}}</textarea>
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

        <form  action="{{route('delete.actividades')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" value="" id="borrarid" name="borrarid">
                            <h6>Se procederá a eliminar el registro, esta seguro?</h6>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn-sm btn-danger">Si</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form  action="{{route('crear.actividades')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal3" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="form" class="form-label">Seleccione un Objetivo</label>
                            <select class="single-select" name="objetivoid">
                                @foreach ($objetivos as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>    
                                @endforeach
                            </select>

                            <label for="form" class="form-label">Nombre Actividad</label>
                            <textarea name="nombreactividad" id="nombreactividad" value="" class="form-control form-control-sm" style="height: 130">
                            </textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
<script>
    function feditar() {
        // var ac_id = document.getElementById(id).value;
        // var ac_nombre = document.getElementById('nombreact'+id).value;
        // document.getElementById('editid').value=ac_id;
        // document.getElementById('editnombre').value=ac_nombre;
    }
    function fdelete(id) {
        var fid = document.getElementById(id).value;
        document.getElementById('borrarid').value=fid;
    }
</script>

@section('script_table')
<script>
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