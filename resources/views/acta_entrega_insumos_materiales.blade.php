@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3">
                <i class="lni lni-plus"></i> Nuevo Acta de Entrega de Insumos, Materiales, Medicamentos y Otros...
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            
                            <th style="text-align: center;">Dpto</th>
                            <th style="width: 30%;text-align: center;">Provincia</th>
                            <th style="text-align: center;">DNI</th>
                            <th style="text-align: center;">Comunidad de Procedencia</th>
                            <th style="text-align: center;">Nombre del EESS más cercano con microscopio</th>
                            <th style="text-align: center;">Tiempo en Horas a EESS...</th>
                            <th style="text-align: center;">Insumos, Materiales, Med...</th>
                            <th style="text-align: center;">Cantidad</th>
                            <th style="text-align: center;">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ac as $act_entrega_imm)   
                            <tr>
                                <td>{{$ac->NombreCTS}}</td>
                                <td>{{$ac->DNI}}</td> 
                                <td>{{$ac->ComunidadProcendencia}}</td>
                                <td>{{$ac->NombreESS}}</td>
                                <td>{{$ac->TiempoHorasEss}}</td>
                                <td>{{$ac->IMMEntregados}}</td>
                                <td>{{$ac->Cantidad}}</td>
                                <td>{{$ac->Fecha}}</td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>

            </div>
        </div>


        <form  action="{{route('editar.actaIMM')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModalEDITIMM" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Acta de Entrega IMM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="editid" name="editid">

                            <div class="row">
                                <label for="form" class="form-label">Nombre del TCS</label>
                                <input name="editNombreTCS" id="editNombreTCS" value="" class="form-control form-control-sm" style="height: 130">
                                
                                <label for="form" class="form-label">DNI</label>
                                <input name="editDNI" id="editDNI" value="" class="form-control form-control-sm">
                                
                                <label for="form" class="form-label">Comunidad de Procedencia</label>
                                <input name="editComunidad" id="editComunidad" value="" class="form-control form-control-sm">
                                
                                <label for="form" class="form-label">Nombre del ESS</label>
                                <input name="editNombreESS" id="editNombreESS" value="" class="form-control form-control-sm">
                                
                                <label for="form" class="form-label">Tiempo en Horas a ESS</label>
                                <input name="editTiempoHorasESS" id="editTiempoHorasESS" value="" class="form-control form-control-sm">
                                
                                <label for="form" class="form-label">Insumos, Materiales, medicamento y Otros</label>
                                <input name="editIMM" id="editIMM" value="" class="form-control form-control-sm">
                                
                                <label type= class="form-label">Cantidad</label>
                                <input name="editDNI" id="editDNI" value="" class="form-control form-control-sm" required="required">
                                
                                <label type= class="form-label">Fecha</label>
                                <input name="editFecha" id="editFecha" value="" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form  action="{{route('delete.actaIMM')}}" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModalDELETEIMM" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Acta IMM</h5>
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