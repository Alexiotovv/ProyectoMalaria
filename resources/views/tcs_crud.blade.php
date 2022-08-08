@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1">
                <i class="lni lni-plus"></i>Nuevo Registro Agente Comunitario de Salud
            </button>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ListaACS"  class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Acción</th>
                                <th style="text-align: center;">DNI</th>                              
                                <th style="text-align: center;">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <h6 class="modal-title">Registro de Agente Comunitario de Salud</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    

                                    <label for="">DNI</label>
                                    <input name="dni" id="dni" type="text" class="form-control" value="-" maxlength="9">

                                    <label for="">Nombre del ACS</label>
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
 <form  id="formActualizarACS">
    @csrf
    <div class="modal fade" id="ActualizarACSModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Agente Comunitario de Salud</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <input name="id" id="id" type="text" value="-" hidden>
                            <label for="" class="form-label">DNI</label>
                            <input name="dni_tcs" id="dni_tcs" type="text" class="form-control" value="-" maxlength="9">

                            <label for="" class="form-label">Nombre del ACS</label>
                            <input name="nombre_tcs" id="nombre_tcs" type="text" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn-sm btn-warning btnActualizarACS">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
        

@endsection

@section('script_table')
<script>

    $(document).on("click",".btnActualizarACS",function(){
        var serializedData = $("#formActualizarACS").serialize();
        $.ajax({
            type: "POST",
            url: "ActualizarACS",
            data: serializedData,
            dataType: "json",
            success: function (response) {        
                round_success_noti("Registro Actualizado");
                $("#ListaACS").DataTable().ajax.reload();
            },
            error: function (response) {
                round_error_noti();
            }
        });
        $("#ActualizarACSModal").modal('hide')
    });

    $(document).on("click",".btnEditarACS",function(){
        fila=$(this).closest("tr");
        id=parseInt((fila).find('td:eq(0)').text());
        $("#id").val(id);
        $.ajax({
            type: "GET",
            url: "EditarTCS/"+id,
            dataType: "json",
            success: function (response) {
                $("#dni_tcs").val(response[0].dni_tcs);
                $("#nombre_tcs").val(response[0].nombre_tcs);
                $("#ActualizarACSModal").modal('show')
            }
        });
        
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
    
    $("#ListaACS").DataTable({
        "ajax": "ListaTCStable",
        "method":'GET',
        "columns":[
            {data:"id"},
            {"defaultContent":
            "<button class='btn-warning btn-sm btnEditarACS'><i class='lni lni-pencil'></i></button>"},
            {data:"dni_tcs"},
            {data:"nombre_tcs"},
            
        ],
        order:[0]
    });

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


