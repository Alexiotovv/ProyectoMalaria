@extends('layouts.base')

@section('content')

<style>
    .translate-middle {
        transform: translate(-190%,-150%)!important;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-6">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal">
                <i class="lni lni-plus"></i> Nuevo Objetivo
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <table  id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                                <th>Actividad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont=0; ?>
                            @foreach ($objetivos as $cc)
                                <tr>
                                    <?php $cont=$cont+1; ?>

                                    <td>{{$cont}} <input type="hidden" id="{{$cc->id}}" value="{{$cc->id}}"></td>
                                    <td>{{$cc->nombre}}<input type="hidden" id="nombre{{$cc->id}}" value="{{$cc->nombre}}"></td>
                                    <td>
                                        <button class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal2" onclick="feditar({{$cc->id}});">
                                            <i class="lni lni-pencil"></i>
                                        </button>
                                        <button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleSmallModal4"  onclick="fdelete({{$cc->id}});">
                                            <i class="lni lni-cross-circle"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalActividad{{$cc->id}}" style="height: 27px; width: 35px;">
                                            <i class="lni lni-eye"></i>
                                            <span class="position-relative start-100 translate-middle badge rounded-pill bg-dark" style="font-size: xx-small;">
                                                <?php $num_act=0; ?>
                                                    @foreach ($actividades as $act)
                                                        @if ($cc->id==$act->objetivo_id)
                                                            <?php $num_act=$num_act+1; ?>
                                                        @endif                                                    
                                                    @endforeach
                                                    {{$num_act}}
                                            </span>
                                        </button>
                                        <button class="btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3" style="height: 27px; width: 35px;" onclick="fnuevoactividad({{$cc->id}});">
                                            <i class="lni lni-circle-plus"></i>   
                                        </button>
                                        <form>
                                            <div class="modal fade" id="modalactividad{{$cc->id}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Actividades</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="" id="deleteid" name="deleteid">
                                                            <h6>Lista de Actividades</h6>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <table class="table mb-0 table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">N°</th>
                                                                                <th scope="col">Nombre Actividad</th>            
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $cont2=0; ?>
                                                                            @foreach ($actividades as $act)
                                                                                @if ($cc->id==$act->objetivo_id)
                                                                                    <tr>
                                                                                        <?php $cont2=$cont2+1; ?>
                                                                                        <td>{{$cont2}}</td>
                                                                                        <td>{{$act->nombre_actividades}}</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            {{-- <button type="button" class="btn-sm btn-danger">Si</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <form  action="{{route('crear.objetivos')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Objetivo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="form" class="form-label">Nombre</label>
                            <textarea value="clear" name="nombre" id="nombre" class="form-control form-control-sm">
                            </textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        

        <form  action="{{route('editar.objetivos')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Objetivo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="editid" name="editid">
                            <label for="form" class="form-label">Nombre</label>
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

        <form  action="{{route('crear.actividades')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal3" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nueva Actividad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="objetivoid" name="objetivoid">       
                            <textarea value="" name="nombreactividad" id="nombreactividad" class="form-control form-control-sm">
                            </textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form  action="{{route('delete.objetivos')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal4" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="borrarid" name="borrarid">
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
        var mid = document.getElementById(id).value;
        var mnombre = document.getElementById('nombre'+id).value;
        document.getElementById('editid').value=mid;
        document.getElementById('editnombre').value=mnombre;
    }

    function fdelete(id) {
        var fid = document.getElementById(id).value;
        document.getElementById('borrarid').value=fid;
    }
    
    function fnuevoactividad(id) {
        var objetivoid = document.getElementById(id).value;
        document.getElementById('objetivoid').value=objetivoid;
        var mnombre = document.getElementById('nombreactividad').value;
    }
</script>

<script>
    window.onload=function (){
    document.getElementById('nombre').value="";
    document.getElementById('nombreactividad').value="";
    }
</script>