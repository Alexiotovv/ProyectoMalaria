@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1">
                <i class="lni lni-plus"></i>Nuevo Registro Trabajador Comunitario de Salud
            </button>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2"  class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">DNI</th>
                                <th style="text-align: center;">Nombre TCS</th>                              
                                <th style="text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista_tcs as $tcs)
                                <tr>                    
                                    <td>{{$tcs->id}} <input type="hidden" id="hid{{$tcs->id}}" value="{{$tcs->id}}"></td>
                                    <td>{{$tcs->dni_tcs}}<input hidden id="hdni_tcs{{$tcs->dni_tcs}}"></td>
                                    <td>{{$tcs->nombre_tcs}}<input hidden id="hnombre_tcs{{$tcs->nombre_tcs}}"></td>
                                    <td style="vertical-align: middle;">
                                        <button class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleSmallModal2" onclick="EditarTCS({{$tcs->id}})">
                                        <i class="lni lni-pencil"></i>
                                        </button>
                                        <button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3"  onclick="">
                                            <i class="lni lni-cross-circle"></i>
                                        </button>
                                    </td>
                                    </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- Nuevo Asistencia Trabajadores Comunitarios de Salud --}}
        <form  action="tcs_graba" method="POST">
            @csrf
            <div class="modal fade" id="exampleSmallModal1" data-bs-target="#exampleSamllModal1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Registro de Asistencia de Trabajadores Comunitarios de Salud</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    

                                    <label for="">DNI</label>
                                    <input name="dni" id="dni" type="text" class="form-control" value="-" maxlength="9">

                                    <label for="">Nombre del TCS</label>
                                    <input name="nombre" id="nombre" type="text" class="form-control" >
                                </div>
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
{{-- Cierra Registro de Asistencia Comunitarios de Salud --}}

 {{-- EDITA Asistencia Trabajadores Comunitarios de Salud --}}
 <form  action="tcs_editar" method="POST">
    @csrf
    <div class="modal fade" id="exampleSmallModal2" data-bs-target="#exampleSamllModal2" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Asistencia de Trabajadores Comunitarios de Salud</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <input name="id" id="id" type="text" value="-" hidden>
                            <label for="">DNI</label>
                            <input name="editdni" id="editdni" type="text" class="form-control" value="-" maxlength="9">

                            <label for="">Nombre del TCS</label>
                            <input name="editnombre" id="editnombre" type="text" class="form-control" >
                        </div>
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
{{-- Cierra EDITA de Asistencia Comunitarios de Salud --}}

        

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

    var fecha = new Date();
    document.getElementById("Fecha").value = fecha.toJSON().slice(0,10);
</script>
<script>
    function EditarTCS(id) {
        document.getElementById('id').value=id;
        document.getElementById('editdni').value= document.getElementById('hdni_tcs').value;
        document.getElementById('editnombre').value= document.getElementById('hdni_tcs').value;
    }
</script>
@endsection


