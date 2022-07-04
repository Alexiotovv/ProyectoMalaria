@extends('layouts.base')
@section('content')
<div class="page-wrapper" onload="limpiartextare()">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal">
                <i class="lni lni-plus"></i> Nueva Actividad
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                {{-- <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal">
                    <i class="lni lni-eye"></i> Ver todas las actividades
                </button>
                <button type="button" class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal">
                    <i class="lni lni-search"></i> Filtrar por Actividad
                </button> --}}
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nro</th>
                            <th style="width: 30%;text-align: center;">Objetivo</th>
                            <th style="text-align: center;">Actividad</th>
                            <th style="text-align: center;">Acción</th>
                            <th style="text-align: center;">Meta</th>
                            {{-- <th style="text-align: center;">Acción</th> --}}
                            {{-- <th style="text-align: center;">Meta</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cont=0; ?>
                        @foreach ($objetivos as $obj)
                            <?php $cont=$cont+1; ?>
                            @foreach ($actividades as $act)    
                            <tr>        
                                     
                                @if ($obj->id==$act->objetivo_id)            
                                    <td>{{$cont}}</td>
                                    <td>{{$obj->nombre}}</td> 
                                    <td>{{$act->nombre_actividades}}
                                        <input type="hidden" id="{{$act->id}}" value="{{$act->id}}">
                                        <input type="hidden" id="nombreact{{$act->id}}" value="{{$act->nombre_actividades}}">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <button class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1" onclick="feditar({{$act->id}});">
                                        <i class="lni lni-pencil"></i>
                                        </button>
                                        <button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleSmallModal2"  onclick="fdelete({{$act->id}});">
                                            <i class="lni lni-cross-circle"></i>
                                        </button>
                                    </td>
                                    <td>Metas</td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        

        <form  action="{{route('editar.metas')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Meta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="editid" name="editid">
                            <label for="form" class="form-label">Nombre Meta</label>
                            <textarea name="editnombre" id="editnombre" value="" class="form-control form-control-sm" style="height: 130">
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

        <form  action="{{route('delete.metas')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Meta</h5>
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

    </div>
</div>

@endsection

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

<script>
    function feditar(id) {
        var ac_id = document.getElementById(id).value;
        var ac_nombre = document.getElementById('nombremet'+id).value;
        document.getElementById('editid').value=ac_id;
        document.getElementById('editnombre').value=ac_nombre;
    }
    function fdelete(id) {
        var fid = document.getElementById(id).value;
        document.getElementById('borrarid').value=fid;
    }
</script>
