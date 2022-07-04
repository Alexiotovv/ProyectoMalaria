@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary btnRegistrarPrueba">
                <i class="lni lni-plus"></i> Registrar Nueva Prueba
            </button>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <table id="ListaPruebas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre Prueba</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        

        <form id="formRegistrarPrueba">
            @csrf
            <div class="modal fade" id="RegistraPruebaModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registrar Prueba</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="form" class="form-label">Nombre de Prueba</label>
                            <input name="nombreprueba" id="nombrePrueba" value="" class="form-control form-control-sm">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="formEditarPruebas">
            @csrf
            <div class="modal fade" id="EditarPruebaModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Prueba</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="editidPrueba" name="editidPrueba">
                            
                            <label for="form" class="form-label">Nombre de Prueba</label>
                            <input name="editnombreprueba" id="editnombreprueba" value="" class="form-control form-control-sm">
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



@section('script_table_ajax')
    <script>
        $("#ListaPruebas").DataTable({
            "ajax": "ListarPruebas",
            "method":'GET',
            "columns":[
                {data:"idPrueba"},
                {data:"nombre_prueba"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarPrueba'><i class='lni lni-pencil'></i></button>"
                }    
            ],
            order:[0]
        });

        $(document).on("click",".btnEditarPrueba",function() {
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            
            $.ajax({
                type: "GET",
                url: "EditarPrueba/" + id,
                // data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#editidPrueba").val(response[0].idPrueba);
                    $("#editnombreprueba").val(response[0].nombre_prueba);
                }
            });
            $('#EditarPruebaModal').modal('show');
        });

        $(document).on("click",".btnRegistrarPrueba",function() {
            e.preventDefault();
            var serializedData = $("#formRegistrarPrueba").serialize();
            $.ajax({
                type: "POST",
                url: "",//aqui me quede en registrar Prueba 
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    if (response) {
                        $("#pacientes").DataTable().ajax.reload();    
                        $('#dni_paciente').val("");
                        $('#nombre_paciente').val("");
                        $('#apellido_paciente').val("");
                        $('#edad_paciente').val("");
                        $('#lugar_infeccion').val("");
                    }
                }
            });

            $('#AgregaPacienteModal').modal('hide');
        });

        $("#formEditarPruebas").submit(function (e) {
            e.preventDefault();
            var serializedData = $("#formEditarPruebas").serialize();
            $.ajax({
                url: "ActualizaPruebas",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    if (response) {
                        $('#ListaPruebas').DataTable().ajax.reload();
                        $('#EditarPruebaModal').modal('hide');
                    }
                }
            })
        });



    </script>
@endsection
