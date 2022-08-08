@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary btnNuevoRegistro">
                <i class="lni lni-plus"></i> Nuevo Registro
            </button>
        </div>
        <br>
        
        <div class="card">
            <div class="card-body">
                <table id="ListaAsistenciaTS" class="table table-striped table-bordered">
                    <thead>
                        <tr> 
                            <th style="text-align: center;">Id</th>
                            <th>Acciones</th>
                            <th>Nombre Capacitación</th>
                            <th>Fecha</th>
                            <th>FechaFinal</th>
                            <th>Nombre Est.</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>

            </div>
        </div>
        
        <form id="formNuevoRegistro">
            @csrf
            <div class="modal fade" id="formNuevoRegistroModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Nueva Capacitación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="" class="form-label">Nombre Capacitación</label>
                                    <input type="text" class="form-control" id="NombreCapacitacion" name="NombreCapacitacion">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="Fecha" name="Fecha">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="FechaFinal" name="FechaFinal">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Establecimiento</label>
                                    <select class="single-select" name="Establecimiento" id="Establecimiento">
                                        @foreach ($est as $item)
                                            <option value="{{$item->id}}">{{$item->cod}}-{{$item->nombre_estsalud}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnGuardarRegistro">Guardar</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <form id="formEditarRegistro">
            @csrf
            <div class="modal fade" id="formEditarRegistroModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Capacitación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" id=idRegistro name="idRegistro" hidden>
                                    <label for="" class="form-label">Nombre Capacitación</label>
                                    <input type="text" class="form-control" id="NombreCapacitacione" name="NombreCapacitacione">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="Fechae" name="Fechae">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="FechaFinale" name="FechaFinale">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Establecimiento</label>
                                    <select class="single-select" name="Establecimientoe" id="Establecimientoe">
                                        @foreach ($est as $item)
                                            <option value="{{$item->id}}">{{$item->cod}}-{{$item->nombre_estsalud}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnActualizarRegistro">Guardar</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <form id="formListaNombre">
            <div class="modal fade" id="formListaNombreModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista Registrados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="btn-sm btn-primary btnNuevoNombre">
                                <i class="lni lni-plus"></i> Nuevo Registro Nombre
                            </button>
                            <div class="table-responsive">
                                <table id="ListaNombres" class="table table-striped table-bordered">
                                    <thead>
                                        <tr> 
                                            <th>IdNombre</th>
                                            <th>Acción</th>
                                            <th>Nombre ACS</th>
                                            <th>Comunidad de Procedencia</th>
                                            <th>EESS</th>
                                            <th>Fecha Registro</th>
                                            <th>Responsable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="formNuevoNombre">
            @csrf
            <div class="modal fade" id="formNuevoNombreModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Nuevo Registro de Nombre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <input type="text" name="idAsistencia" id="idAsistencia" hidden>
                                    
                                    <label class="form-label">Nombre del ACS</label>
                                    <div class="input-group">
                                        <select class="single-select" name="tcs" id="tcs">
                                            @foreach ($tcs as $tc)
                                                <option value="{{$tc->id}}">{{$tc->dni_tcs}}-{{$tc->nombre_tcs}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary btnAgregarACS" type="button"><i class='bx bx-user-plus'></i>
                                        </button>
                                    </div>  
                                    
                                </div>
                                <div class="col-lg-5">
                                    <label for="" class="form-label">Comunidad Procedencia</label>
                                    <input type="text" class="form-control" name="ComunidadProcedencia" id="ComunidadProcedencia">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha Registro</label>
                                    <input type="date" class="form-control" id="FechaRegistro" name="FechaRegistro">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">EESS más cercano</label>
                                    <input type="text" class="form-control" id="eesscercano" name="eesscercano">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Nombre del Responsable</label>
                                    <input type="text" class="form-control" id="responsable" name="responsable">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnGuardarNombre">Guardar</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <form id="formEditarNombre">
            @csrf
            <div class="modal fade" id="formEditarNombreModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Registro de Nombre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" name="idEditarNombre" id="idEditarNombre" hidden>
                                    <label class="form-label">Nombre del ACS</label>
                                    <div class="input-group">
                                        <select class="single-select" name="tcse" id="tcse">
                                            @foreach ($tcs as $tc)
                                                <option value="{{$tc->id}}">{{$tc->dni_tcs}}-{{$tc->nombre_tcs}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary btnAgregarACS" type="button"><i class='bx bx-user-plus'></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Comunidad Procedencia</label>
                                    <input type="text" class="form-control" name="ComunidadProcedenciae" id="ComunidadProcedenciae">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha Registro</label>
                                    <input type="date" class="form-control" id="FechaRegistroe" name="FechaRegistroe">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">EESS más cercano</label>
                                    <input type="text" class="form-control" id="eesscercanoe" name="eesscercanoe">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Nombre del Responsable</label>
                                    <input type="text" class="form-control" id="responsablee" name="responsablee">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnActualizarNombre">Guardar</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <form id="formAgregaACS">
            @csrf
            <div class="modal fade" id="formAgregaACSModal" aria-hidden="true" style="z-index: 5000">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registrar ACS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label for="" class="form-label">DNI</label>
                                
                                <input type="text" class="form-control" id="dni_tcs"name="dni_tcs" aria-describedby="validationServer05Feedback" required>
                                <div id="validationServer05Feedback" class="invalid-feedback">El N° Documento ya existe.</div>
                            </div>
                            <div class="col-sm-12">
                                <label for="" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control formm-control-sm" id="nombre_tcs" name="nombre_tcs">
                            </div>
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnGuardarACS">Guardar</button>
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
        $("#dni_tcs").keyup(function(){
            $.ajax({
                type: "GET",
                url: "BuscaDNIACS/"+$("#dni_tcs").val(),
                dataType: "json",
                success: function (response) {
                    if (response['estado']=='No_Disponible') {
                        $("#dni_tcs").addClass('is-invalid');
                        $(".btnGuardarACS").hide();
                    }else{
                        $("#dni_tcs").removeClass('is-invalid');
                        $(".btnGuardarACS").show();
                    }
                }
            });
        });
        $(document).on("click",".btnGuardarACS",function(e){
            e.preventDefault(); 
            CargarACS();
        });

        $(document).on("click",".btnAgregarACS",function(){
            $("#formAgregaACSModal").modal('show')
        });
        $(document).on("click",".btnAgregarACSn",function(){
            $("#formAgregaACSModal").modal('show')
        });

        function CargarACS(){
            var serializedData = $("#formAgregaACS").serialize();
            $.ajax({
                type: "POST",
                url: "tcsregistro",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    round_success_noti("ACS Registrado");
                    $.ajax({
                        type: "GET",
                        url: "ListaTCSjson",
                        dataType: "json",
                        success: function (response) {
                            $("#NombreTCS").empty();
                            $("#editNombreTCS").empty();
                            $.each(response, function (key, item){
                                if ((item.dni_tcs)==$("#dni_tcs").val()) {
                                    $("#tcs").append('<option selected value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                    $("#tcse").append('<option selected value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                }else{
                                    $("#tcs").append('<option value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                    $("#tcse").append('k<option value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');    
                                }
                                
                            });  
                        }
                    });
                },
                error: function (response) {
                    round_error_noti()
                }
                
            });
            $("#formAgregaACSModal").modal('hide');
        }

        $(document).on("click",".btnActualizarNombre",function(){
            var serializedData = $("#formEditarNombre").serialize();
            
            $.ajax({
                type: "POST",
                url: "ActualizarRegistroNombreACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    round_success_noti("Registro Actualizado");
                    $('#ListaNombres').DataTable().ajax.reload();
                },
                error: function (response) {
                    round_error_noti("Error al guardar");
                }
            });
            $("#formEditarNombreModal").modal('hide');
        });

        $(document).on("click",".btnEditarNombre",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idEditarNombre").val(id);
            $.ajax({
                type: "GET",
                url: "EditarRegistroNombreACS/"+id,
                dataType: "json",
                success: function (response) {
                    $("#tcse").val(response[0].idACS).change();
                    $("#ComunidadProcedenciae").val(response[0].ts_ComunidadProcedencia);
                    $("#FechaRegistroe").val(response[0].ts_FechaAsistencia);
                    $("#eesscercanoe").val(response[0].ts_ESSCercano);
                    $("#responsablee").val(response[0].ts_responsable_cap);
                }
            });

            $("#formEditarNombreModal").modal('show');
        });

        $(document).on("click",".btnGuardarNombre",function(){
            var serializedData = $("#formNuevoNombre").serialize();
            
            $.ajax({
                type: "POST",
                url: "NuevoNombreACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaNombres').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti("Error al actualizar");
                }
            });
            $("#formNuevoNombreModal").modal('hide');
        });

        $(document).on("click",".btnNuevoNombre",function(){
            $("#formNuevoNombreModal").modal('show');
        });

        $(document).on("click",".btnAgregarNombres",function(){
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idAsistencia").val(id);
            $('#ListaNombres').DataTable({
                "destroy":true,
                "ajax":"ListaNombresACS/"+id,
                "method":"GET",
                "columns":[
                    {data:"IdNombre"},
                    {"defaultContent":"<button class='btn-warning btn-sm btnEditarNombre'><i class='lni lni-pencil'></i></button>"},
                    {data:"ts_NombreACS"},
                    {data:"ts_ComunidadProcedencia"},
                    {data:"ts_ESSCercano"},
                    {data:"ts_FechaAsistencia"},
                    {data:"ts_responsable_cap"},
                ],
                order:[0] 
            });

            $("#formListaNombreModal").modal("show");
        });


        $(".btnActualizarRegistro").on("click",function(){
            var serializedData = $("#formEditarRegistro").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizarAsistenciaACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaAsistenciaTS').DataTable().ajax.reload();
                    round_success_noti("Registro Actualizado");
                },
                error: function (response) {
                    round_error_noti("Error al actualizar");
                }
            });
            $("#formEditarRegistroModal").modal("hide");
        });

        $(document).on("click",".btnEditarRegistro",function(){
            
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idRegistro").val(id);

            $.ajax({
                type: "GET",
                url: "EditarAsistenciaACS/"+id,
                dataType: "json",
                success: function (response) {
                    $("#NombreCapacitacione").val(response[0].ts_NombreCapacitacion);
                    $("#Fechae").val(response[0].ts_Fecha);
                    $("#FechaFinale").val(response[0].ts_FechaFinal);
                    $("#Establecimientoe").val(response[0].ts_estsaludId).change();
                }
            });
            $("#formEditarRegistroModal").modal("show");
        });

        $(".btnGuardarRegistro").on("click",function(){
            var serializedData = $("#formNuevoRegistro").serialize();
            $.ajax({
                type: "POST",
                url: "GuardarAsistenciaACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaAsistenciaTS').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti("Error al guardar");
                }
            });
            $("#formNuevoRegistroModal").modal("hide");
        });

        $(".btnNuevoRegistro").on("click",function(){
            $("#formNuevoRegistroModal").modal("show");
        });
    </script>
@endsection

@section('script_table')
<script>


    $("#ListaAsistenciaTS").DataTable({
        "destroy":true,
        "ajax":"ListaAsistenciaACS",
        "method":"GET",
        "columns":[
            {data:"IdTS"},
            {"defaultContent":"<button class='btn-warning btn-sm btnEditarRegistro'><i class='lni lni-pencil'></i></button>\
            <button class='btn-info btn-sm btnAgregarNombres'><i class='lni lni-checkbox'></i></button>"},
            {data:"ts_NombreCapacitacion"},
            {data:"ts_Fecha"},
            {data:"ts_FechaFinal"},
            {data:"nombre_estsalud"}

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
    document.getElementById("Fechae").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaFinal").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaFinale").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaRegistro").value = fecha.toJSON().slice(0,10);
    
</script>
@endsection