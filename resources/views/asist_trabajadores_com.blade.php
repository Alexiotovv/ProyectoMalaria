@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary btnNuevaAsist">
                <i class="lni lni-plus"></i>Nuevo Registro Asist. Trab. Com. de Salud
            </button>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ListarAsistenciaTrabCom"  class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Acciones</th>
                                <th style="text-align: center;">Nombre Capacitación</th>
                                <th style="text-align: center;">Fecha</th>
                                <th style="text-align: center;">Sede</th>
                                <th style="text-align: center;">Nombre TCS</th>
                                <th style="text-align: center;">Comunidad Procedencia</th>
                                <th style="text-align: center;">EESS más cercano</th>
                                <th style="text-align: center;">DNI</th>
                                <th style="text-align: center;">Fecha Reg. Asit.</th>
                                <th style="text-align: center;">Respon. Capacitación</th>
                                
                            </tr>
                        </thead>
                        <tbody>     
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- Nuevo Asistencia Trabajadores Comunitarios de Salud --}}
        <form  id="formGrabarAsistenciaTraCom">
            @csrf
            <div class="modal fade" id="GrabarAsistenciaTraComModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Registro de Asistencia de Trabajadores Comunitarios de Salud</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <label for="">Capacitación..</label>
                                        <input name="NombreCapacitacion" id="NombreCapacitacion" type="text" class="form-control" value="-">
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="">Fecha</label>
                                        <input name="Fecha" id="Fecha" type="date" class="form-control" >
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="">Sede</label>
                                        <select name="Sede" id="Sede" class="single-select">
                                            @foreach ($estsalud as $s)
                                                <option value="{{$s->id}}">{{$s->cod}}-{{$s->nombre_estsalud}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="">NombreTCS</label>
                                        <input type="text" name="tcs" id="tcs" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xl-2">
                                        <label for="form" class="form-label">Com.Procede.</label>
                                        <input name="ComunidadProcedencia" id="ComunidadProcedencia" type="text" class="form-control" value="-">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="form" class="form-label">EESS más Cercano</label>
                                        <input name="EESSCercano" id="EESSCercano" value="-" class="form-control">
                                    </div>
                                    
                                    <div class="col-xl-2">
                                        <label for="form" class="form-label">DNI</label>
                                        <input type="number" name="DNI" id="DNI" value="" class="form-control">
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="form" class="form-label">FechaRegistro</label>
                                        <input type="date" name="FechaAsistencia" id="FechaAsistencia" class="form-control">
                                    </div>

                                    <div class="col-xl-2">
                                        <label for="form" class="form-label">Resp.Capaci.</label>                                        
                                        <input type="text" name="ResponsableCap" id="ResponsableCap" class="form-control">
                                    </div>
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

<form  id="formActualizarAsistenciaTraCom">
    @csrf
    <div class="modal fade" id="ActualizarAsistenciaTraComModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Editar Asistencia de Trabajadores Comunitarios de Salud</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-1">
                                <label for="">Id</label>
                                <input name="idAsis" id="idAsis" type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="col-xl-4">
                                <label for="">Capacitación..</label>
                                <input name="NombreCapacitacione" id="NombreCapacitacione" type="text" class="form-control" value="-">
                            </div>
                            <div class="col-xl-2">
                                <label for="">Fecha</label>
                                <input name="Fechae" id="Fechae" type="date" class="form-control" >
                            </div>
                            <div class="col-xl-3">
                                <label for="">Sede</label>
                                <select name="Sedee" id="Sedee" class="single-select">
                                    @foreach ($estsalud as $s)
                                        <option value="{{$s->id}}">{{$s->cod}}-{{$s->nombre_estsalud}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="">NombreTCS</label>
                                <input type="text" name="tcse" id="tcse" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-2">
                                <label for="form" class="form-label">Com.Procede.</label>
                                <input name="ComunidadProcedenciae" id="ComunidadProcedenciae" type="text" class="form-control" value="-">
                            </div>

                            <div class="col-xl-4">
                                <label for="form" class="form-label">EESS más Cercano</label>
                                <input name="EESSCercanoe" id="EESSCercanoe" value="-" class="form-control">
                            </div>
                            
                            <div class="col-xl-2">
                                <label for="form" class="form-label">DNI</label>
                                <input type="number" name="DNIe" id="DNIe" value="" class="form-control">
                            </div>
                            <div class="col-xl-2">
                                <label for="form" class="form-label">FechaRegistro</label>
                                <input type="date" name="FechaAsistenciae" id="FechaAsistenciae" class="form-control">
                            </div>

                            <div class="col-xl-2">
                                <label for="form" class="form-label">Resp.Capaci.</label>                                        
                                <input type="text" name="ResponsableCape" id="ResponsableCape" class="form-control">
                            </div>
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
        

@endsection



@section('script_table_ajax')
    <script>
        $("#formActualizarAsistenciaTraCom").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formActualizarAsistenciaTraCom").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizarAsistTrabCom",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarAsistenciaTrabCom').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) { 
                    round_error_noti()
                }
            });
            $("#ActualizarAsistenciaTraComModal").modal('hide');
        });

        $(document).on("click",".btnEditarAsistencia",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                method: "GET",
                url: "EditarAsistenciaTraCom/"+id,
                dataType: "json",
                success: function (response) {
                    $("#idAsis").val(response[0].idasist);
                    $("#NombreCapacitacione").val(response[0].asc_NombreCapacitacion);
                    $("#Fechae").val(response[0].asc_Fecha);
                    $("#Sedee").val(response[0].asc_estsaludId).change();
                    $("#tcse").val(response[0].asc_tcsId);
                    $("#ComunidadProcedenciae").val(response[0].asc_ComunidadProcedencia);
                    $("#EESSCercanoe").val(response[0].asc_ESSCercano);
                    $("#DNIe").val(response[0].asc_DNI);
                    $("#FechaAsistenciae").val(response[0].asc_FechaAsistencia);
                    $("#ResponsableCape").val(response[0].responsable_cap);
                    
                }
            });
            $("#ActualizarAsistenciaTraComModal").modal('show');
            
        });

        $("#formGrabarAsistenciaTraCom").submit(function(e){
            e.preventDefault();
            var serializedData=$("#formGrabarAsistenciaTraCom").serialize();
            $.ajax({
                type: "POST",
                url: "GrabarAsistTrabCom",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarAsistenciaTrabCom').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) { 
                    round_error_noti()
                }
            });
            $("#GrabarAsistenciaTraComModal").modal('hide');
        });
    </script>
    <script>
        $(document).on("click",".btnNuevaAsist",function(){
            $("#GrabarAsistenciaTraComModal").modal('show');
        });
    </script>
@endsection

@section('script_table')
<script>
    $("#ListarAsistenciaTrabCom").DataTable({
            "ajax": "ListarAsistenciaTraCom",
            "method":'GET',
            "columns":[
                {data:"idasist"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarAsistencia'><i class='lni lni-pencil'></i></button>"
                },
                {data:"asc_NombreCapacitacion"},
                {data:"asc_Fecha"},
                {data:"asc_estsaludId"},
                {data:"asc_tcsId"},
                {data:"asc_ComunidadProcedencia"},
                {data:"asc_ESSCercano"},
                {data:"asc_DNI"},
                {data:"asc_FechaAsistencia"},
                {data:"responsable_cap"},
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
    document.getElementById("FechaAsistencia").value = fecha.toJSON().slice(0,10);
    document.getElementById("Fecha").value = fecha.toJSON().slice(0,10);
</script>

@endsection


