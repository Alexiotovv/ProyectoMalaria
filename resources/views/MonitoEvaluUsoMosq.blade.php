@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12">
            <button type="button" href="" class="btn-sm btn-primary btnNuevoMonitoreo">
                <i class="lni lni-plus"></i> Registrar Nuevo Monitoreo y Evaluación
            </button>
            <br>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">            
                    <table id="ListaMonitoreo" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Acción</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Comunidad</th>
                                <th>IPRESS</th>
                                <th>FechaEntrega</th>
                                <th>FechaMonitoreo</th>
                                <th>NúmeroMonitoreo</th>
                                <th>ResponsableMonitoreo</th>
                                <th>CargoResponsableM.</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="frmListaEncuestadoModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Lista de Encuestados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>       
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <button type="button" class="btn-sm btn-primary btnNuevoEncuestado">
                                <i class="lni lni-plus"></i> Registrar Nuevo Encuestado
                            </button>
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table id="ListaEncuestado" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Acción</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Edad</th>
                                        <th>DNI</th>
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

        <div class="modal fade" id="frmMonitoreoModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="NombreForm"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form  id="formMonitoreo">
                            @csrf
                            <input type="text" id="idestadoform" name="idestadoform" hidden>
                            <div class="col-xl-2">
                                <input type="text" class="form-control" id="idMonitoreo1" name="idMonitoreo1" readonly>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="form-select mb-3" name="Departamento" id="Departamento" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select class="form-select mb-3" name="Provincia" id="Provincia" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select class="single-select" name="Distrito" id="Distrito" onchange="ObtieneRegiones('Distrito');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Ipress</label>
                                    <select name="Ipress" id="Ipress" class="single-select" >
                                        @foreach ($ests as $e)
                                            <option value="{{$e->id}}">{{$e->cod}}-{{$e->nombre_estsalud}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Comunidad</label>
                                    <input type="text" class="form-control" name="Comunidad" id="Comunidad">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Fecha Entrega</label>
                                    <input type="date" class="form-control" name="FechaEntrega" id="FechaEntrega">
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Fecha Monitoreo</label>
                                    <input type="date" class="form-control" name="FechaMonitoreo" id="FechaMonitoreo">
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Número de Monitoreo</label>
                                    <select name="NumeroMonitoreo" id="NumeroMonitoreo" class="form-select">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">ResponsableMonitoreo</label>
                                    <input type="text" class="form-control" name="Responsable" id="Responsable">
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Cargo Responsable</label>
                                    <input type="text" class="form-control" name="CargoResponsable" id="CargoResponsable">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn-sm btn-warning btnGuardarMonitoreo">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="frmEncuestadoModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <form id="formEncuestado">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="NombreFormEncuestado"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <input type="text" id="idestadoformEncuestado" name="idestadoformEncuestado" hidden>
                                <input type="text" id="idEncuestado" name="idEncuestado" hidden>
                                <input type="text" id="idMonitoreo" name="idMonitoreo" hidden>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Datos del Encuestado e Información de Familia</h5>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <br>
                                                <label for="form" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="Nombre" id="Nombre">
                                            </div>
                                            <div class="col-xl-4">
                                                <br>
                                                <label for="form" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" name="Apellido" id="Apellido">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">Edad</label>
                                                <input type="text" class="form-control" step="0.01" name="Edad" id="Edad">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Documento Identidad</label>
                                                <input type="number" class="form-control" name="DNI" id="DNI">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° de Personas Femenino</label>
                                                <input type="number" class="form-control" name="NPersonasFemenino" id="NPersonasFemenino">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° de Personas Masculino</label>
                                                <input type="number" class="form-control" name="NPersonasMasculino" id="NPersonasMasculino">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° de Embarazadas</label>
                                                <input type="number" class="form-control" name="NEmbarazadas" id="NEmbarazadas">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° de Niños < 5 años</label>
                                                <input type="number" class="form-control" name="NNinosMenor5" id="NNinosMenor5">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° de camas/espacios para dormir</label>
                                                <input type="number" class="form-control" name="NCamasDormir" id="NCamasDormir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Cobertura de usos de MTILD y otros Mosquiteros</h5>
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° de mosquiteros de tel. o tocuyo</label>
                                                <input type="number" class="form-control" name="NMosqTela" id="NMosqTela">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° de MTILD antiguos</label>
                                                <input type="number" class="form-control" name="NMosqMTILDAntiguo" id="NMosqMTILDAntiguo">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° de MTILD entregados</label>
                                                <input type="number" class="form-control" name="NMTILDEntregados" id="NMTILDEntregados">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° de MTILD en uso</label>
                                                <input type="number" class="form-control" name="NMTILDUso" id="NMTILDUso">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Personas Usan Mosq.(Masculino)</label>
                                                <input type="number" class="form-control" name="NPersonasUsanMosqMasculino" id="NPersonasUsanMasculino">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Personas Usan Mosq.(Femenino)</label>
                                                <input type="number" class="form-control" name="NPersonasUsanMosqFemenino" id="NPersonasUsanMosqFemenino">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Embarazadas Usan Mosq.</label>
                                                <input type="number" class="form-control" name="NEmbarazadasUsanMosq" id="NEmbarazadasUsanMosq">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Niños < 5 años Usan Mosq.</label>
                                                <input type="number" class="form-control" name="NNinosMenor5UsanMosq" id="NNinosMenor5UsanMosq">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° de MTILD Sin Uso</label>
                                                <input type="number" class="form-control" name="NMTILDSinUso" id="NMTILDSinUso">
                                            </div>
                                            <div class="col-xl-6">
                                                <br>
                                                <label for="form" class="form-label">Razón del No Uso</label>
                                                <select name="RazonNoUso" id="RazonNoUso" class="form-select">
                                                    <option value="0">(0)Se Usaron todos</option>
                                                    <option value="1">(1)Guardado</option>
                                                    <option value="2">(2)Regalado</option>
                                                    <option value="3">(3)Perdido</option>
                                                    <option value="4">(4)Usado para otra Cosa</option>
                                                    <option value="5">(5)No le gusta</option>
                                                    <option value="6">(6)Le da molestia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Condición, Frecuencia y Lavado de Mosquiteros</h5>
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Limpios</label>
                                                <input type="number" class="form-control" name="NLimpios" id="NLimpios">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Sucios</label>
                                                <input type="number" class="form-control" name="NSucios" id="NSucios">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">N° Rotos</label>
                                                <input type="number" class="form-control" name="NRotos" id="NRotos">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">6-7 Noches</label>
                                                <input type="number" class="form-control" name="N6_7Noches" id="N6_7Noches">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">1-5 Noches</label>
                                                <input type="number" class="form-control" name="N1_5Noches" id="N1_5Noches">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">0 Noches</label>
                                                <input type="number" class="form-control" name="N0Noches" id="N0Noches">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">N° MTILD Lavados</label>
                                                <input type="number" class="form-control" name="NMTILDLavados" id="NMTILDLavados">
                                            </div>
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">Lavado Correcto(1vez)</label>
                                                <input type="number" class="form-control" name="NLavadoCorrecto" id="NLavadoCorrecto">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Lavado Incorrecto(≥2vez)</label>
                                                <input type="number" class="form-control" name="NLavadoIncorrecto" id="NLavadoIncorrecto">
                                            </div>
                                            {{-- <div class="col-xl-2">
                                                <label for="form" class="form-label">Lavado Incorrecto(≥2vez)</label>
                                                <input type="number" class="form-control" name="NLavadoIncorrecto" id="NLavadoIncorrecto">
                                            </div> --}}
                                            <div class="col-xl-2">
                                                <br>
                                                <label for="form" class="form-label">Rio, Lago o Quebrada</label>
                                                <input type="number" class="form-control" name="RioLago" id="RioLago">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Bandeja u otro recipiente</label>
                                                <input type="number" class="form-control" name="BandejaOtro" id="BandejaOtro">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Forma de Secado, Manejo adecuado y Reacciones Secundarias</h5>
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">En el Sol</label>
                                                <input type="number" class="form-control" name="Sol" id="Sol">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">En la Sombra</label>
                                                <input type="number" class="form-control" name="Sombra" id="Sombra">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Colgado</label>
                                                <input type="number" class="form-control" name="Colgado" id="Colgado">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Recogido en el día</label>
                                                <input type="number" class="form-control" name="RecogidoDia" id="RecogidoDia">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Guardado en el día</label>
                                                <input type="number" class="form-control" name="GuardadoDia" id="GuardadoDia">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Embarazadas</label>
                                                <input type="number" class="form-control" name="Embarazadas" id="Embarazadas">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Niños < 5 años</label>
                                                <input type="number" class="form-control" name="NinosMenor5" id="NinosMenor5">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Otras Personas</label>
                                                <input type="number" class="form-control" name="OtrasPersonas" id="OtrasPersonas">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 1</label>
                                                <input type="number" class="form-control" name="TipoReaccion1" id="TipoReaccion1">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 2</label>
                                                <input type="number" class="form-control" name="TipoReaccion2" id="TipoReaccion2">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 3</label>
                                                <input type="number" class="form-control" name="TipoReaccion3" id="TipoReaccion3">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 4</label>
                                                <input type="number" class="form-control" name="TipoReaccion4" id="TipoReaccion4">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 5</label>
                                                <input type="number" class="form-control" name="TipoReaccion5" id="TipoReaccion5">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Reacción 6</label>
                                                <input type="number" class="form-control" name="TipoReaccion6" id="TipoReaccion6">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Informate y Observaciones</h5>
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Informante</label>
                                                <select name="Informante" id="Informante" class="form-select">
                                                    <option value="1">(1)Padre o Madre</option>
                                                    <option value="2">(2)Abuelo(a)</option>
                                                    <option value="3">(3)Hijo(a)>15 años</option>
                                                    <option value="4">(4)Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">Observaciones</label>
                                                <textarea style="width: 300px;" type="text" class="form-control" name="Observaciones" id="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn-sm btn-warning btnGuardarEncuestado">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Basic modal</button>
            <!-- Modal -->
            <div class="modal fade" id="EliminarModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalEliminar"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Estas seguro? va a eliminar el registro Id: <p id="ficha_eliminar" style="display: inline-table;"></p></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" id="btnEliminarInteSi">Si</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    
    </div>
</div>
@endsection
@section('script_table')
    <script>
        $(document).on("click",".btnEditarEncuestado",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#NombreFormEncuestado").text("Editar Registro de Encuestado");
            $("#idestadoformEncuestado").val(0);
            $("#idEncuestado").val(id);
            $.ajax({
                type: "GET",
                url: "EditarEncuestado/"+id,
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, valor) {
                        $("#Nombre").val(response[0].Nombre);
                        $("#Apellido").val(response[0].Apellido);
                        $("#Edad").val(response[0].Edad);
                        $("#DNI").val(response[0].DNI);
                        $("#NPersonasFemenino").val(response[0].NPersonasFemenino);
                        $("#NPersonasMasculino").val(response[0].NPersonasMasculino);
                        $("#NEmbarazadas").val(response[0].NEmbarazadas);
                        $("#NNinosMenor5").val(response[0].NNinosMenor5);
                        $("#NCamasDormir").val(response[0].NCamasDormir);
                        $("#NMosqTela").val(response[0].NMosqTela);
                        $("#NMosqMTILDAntiguo").val(response[0].NMosqMTILDAntiguo);
                        $("#NMTILDEntregados").val(response[0].NMTILDEntregados);
                        $("#NMTILDUso").val(response[0].NMTILDUso);
                        $("#NPersonasUsanMosqFemenino").val(response[0].NPersonasUsanMosqFemenino);
                        $("#NPersonasUsanMosqMasculino").val(response[0].NPersonasUsanMosqMasculino);
                        $("#NEmbarazadasUsanMosq").val(response[0].NEmbarazadasUsanMosq);
                        $("#NNinosMenor5UsanMosq").val(response[0].NNinosMenor5UsanMosq);
                        $("#NMTILDSinUso").val(response[0].NMTILDSinUso);
                        $("#RazonNoUso").val(response[0].RazonNoUso).change();
                        $("#NLimpios").val(response[0].NLimpios);
                        $("#NSucios").val(response[0].NSucios);
                        $("#NRotos").val(response[0].NRotos);
                        $("#N6_7Noches").val(response[0].N6_7Noches);
                        $("#N1_5Noches").val(response[0].N1_5Noches);
                        $("#N0Noches").val(response[0].N0Noches);
                        $("#NMTILDLavados").val(response[0].NMTILDLavados);
                        $("#NLavadoCorrecto").val(response[0].NLavadoCorrecto);
                        $("#NLavadoIncorrecto").val(response[0].NLavadoIncorrecto);
                        $("#RioLago").val(response[0].RioLago);
                        $("#BandejaOtro").val(response[0].BandejaOtro);
                        $("#Sol").val(response[0].Sol);
                        $("#Sombra").val(response[0].Sombra);
                        $("#Colgado").val(response[0].Colgado);
                        $("#RecogidoDia").val(response[0].RecogidoDia);
                        $("#GuardadoDia").val(response[0].GuardadoDia);
                        $("#Embarazadas").val(response[0].Embarazadas);
                        $("#NinosMenor5").val(response[0].NinosMenor5);
                        $("#OtrasPersonas").val(response[0].OtrasPersonas);
                        $("#TipoReaccion1").val(response[0].TipoReaccion1);
                        $("#TipoReaccion2").val(response[0].TipoReaccion2);
                        $("#TipoReaccion3").val(response[0].TipoReaccion3);
                        $("#TipoReaccion4").val(response[0].TipoReaccion4);
                        $("#TipoReaccion5").val(response[0].TipoReaccion5);
                        $("#TipoReaccion6").val(response[0].TipoReaccion6);
                        $("#Informante").val(response[0].Informante).change();
                        $("#Observaciones").val(response[0].Observaciones);
                    });
                }
            });
            $("#frmEncuestadoModal").modal('show');
        });

        $(document).on("click",".btnGuardarEncuestado",function(){
            var serializedData = $("#formEncuestado").serialize();
            
            if ($("#idestadoformEncuestado").val()=='1') {
                $.ajax({
                    type: "POST",
                    url: "GuardarEncuestado",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                        $("#ListaEncuestado").DataTable().ajax.reload();
                            round_success_noti("Registro Guardado");
                        },
                        error: function (response) {
                            round_error_noti();
                        }
                });
            }else{
                $.ajax({
                    type: "POST",
                    url: "ActualizarEncuestado",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                        $("#ListaEncuestado").DataTable().ajax.reload();
                            round_success_noti("Registro Guardado");
                        },
                        error: function (response) {
                            round_error_noti();
                    }
                });
            };

            $("#frmEncuestadoModal").modal('hide');
        })
        
        $(document).on("click",".btnNuevoEncuestado",function(){
            $("#NombreFormEncuestado").text("Formulario de Registro de Encuestado");
            $("#idestadoformEncuestado").val(1);
            $("#frmEncuestadoModal").modal('show');
        });

        $(document).on("click",".btnListaPersona",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#idMonitoreo").val(id);
            $("#ListaEncuestado").DataTable({
                "destroy":true,
                "ajax":"ListaEncuestado/"+id,
                "method":"GET",
                "columns":[
                    {data:"IdEncuestado"},
                    {"defaultContent":
                    "<button class='btn-warning btn-sm btnEditarEncuestado'><i class='lni lni-pencil'></i></button>\
                    <button class='btn-danger btn-sm btnEliminarEncuestado'><i class='lni lni-cross-circle'></i></button>"},
                    {data:"Nombre"},
                    {data:"Apellido"},
                    {data:"Edad"},
                    {data:"DNI"},
                ],
                order:[0]
            });
            $("#frmListaEncuestadoModal").modal('show')
        });

        $(".btnGuardarMonitoreo").click(function(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formMonitoreo").serialize();
            if ( $("#idestadoform").val()=='1') {//Nuevo
                $.ajax({
                    type: "POST",
                    url: "GuardaMonitoreo",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                        $("#ListaMonitoreo").DataTable().ajax.reload();
                        round_success_noti("Registro Guardado");
                    },
                    error: function (response) {
                        round_error_noti()
                    }
                });
                $("#frmMonitoreoModal").modal('hide');
            }else{//Editar
                $.ajax({
                    type: "POST",
                    url: "ActualizarMonitoreo",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                        $("#ListaMonitoreo").DataTable().ajax.reload();
                        round_success_noti("Registro Actualizado");
                    },
                    error: function (response) {
                        round_error_noti()
                    }
                });

                $("#frmMonitoreoModal").modal('hide');
            }
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
        });

        $(".btnNuevoMonitoreo").click(function(){
            $("#NombreForm").text("Formulario de Registro de Monitoreo");
            $("#idestadoform").val(1);
            $("#idMonitoreo1").val("");
            $("#Comunidad").val("");
            $("#Responsable").val("");
            $("#CargoResponsable").val("");
            $("#frmMonitoreoModal").modal('show');
        });

        $(document).on("click",".btnEditarMonitoreo",function(){
            $("#NombreForm").text("Editar Registro de Monitoreo");
            $("#idestadoform").val(0);            
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#idMonitoreo1").val(id);
            $.ajax({
                type: "GET",
                url: "EditarMonitoreo/"+id,
                dataType: "json",
                success: function (response) {
                    $("#Departamento").val(response[0].Departamento).change();
                    $("#Provincia").val(response[0].Provincia).change();
                    $("#Distrito").val(response[0].Distrito).change();
                    $("#Ipress").val(response[0].Ipress).change();
                    $("#Comunidad").val(response[0].Comunidad);
                    $("#FechaEntrega").val(response[0].FechaEntrega);
                    $("#FechaMonitoreo").val(response[0].FechaMonitoreo);
                    $("#NumeroMonitoreo").val(response[0].NumeroMonitoreo);
                    $("#Responsable").val(response[0].Responsable);
                    $("#CargoResponsable").val(response[0].CargoResponsable);
                }
            });
            $("#frmMonitoreoModal").modal('show');
        })
    </script>
@endsection

@section('script_table_ajax')
    <script>
         $("#btnEliminarInteSi").click(function(e){
            e.preventDefault();
            ruta="";
            nombre_tabla="";
            id=$("#ficha_eliminar").text();

            if ($("#ModalEliminar").text()=="Monitoreo") {
                ruta="EliminarMonitoreo/";
                nombre_tabla="#ListaMonitoreo"
            }
            if ($("#ModalEliminar").text()=="Encuestado") {
                ruta="EliminarEncuestado/";
                nombre_tabla="#ListaEncuestado";
            }
            // if ($("#ModalEliminar").text()=="ActividadProgramada") {
            //     ruta="EliminarActProgramada/";
            //     nombre_tabla="#ListaActividadProgramada";
            // }
            
            $.ajax({
                type: "GET",
                url: ruta + id,
                dataType: "json",
                success: function (response) {
                    round_success_noti("Registro Eliminado");
                    $(nombre_tabla).DataTable().ajax.reload();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#EliminarModal").modal('hide');

        });


        
        $(document).on("click",".btnEliminarEncuestado",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=(fila).find('td:eq(0)').text();
            
            $("#ModalEliminar").text("Encuestado");//Se le pone eEncuestado porque pregunta al Modal si tiene ese nombre para poder eliminar el encuestado porque se usa el mismo modal para eliminar vregistros de varias tablas   
            $("#ficha_eliminar").text(id);//el <p> para mostrar el id al momento de eliminar
            $("#EliminarModal").modal('show')
        });
        $(document).on("click",".btnEliminarMonitoreo",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=(fila).find('td:eq(0)').text();
            
            $("#ModalEliminar").text("Monitoreo");      
            $("#ficha_eliminar").text(id);//el <p> para mostrar el id al momento de eliminar
            $("#EliminarModal").modal('show')
        });



        $("#ListaMonitoreo").DataTable({
            "ajax": "ListaMonitoreo",
            "method":'GET',
            "columns":[
                {data:"MonId"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarMonitoreo'><i class='lni lni-pencil'></i></button>\
                <button class='btn-success btn-sm btnListaPersona'><i class='lni lni-user'></i></button>\
                <button class='btn-danger btn-sm btnEliminarMonitoreo'><i class='lni lni-cross-circle'></i></button>",
                },
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Comunidad"},
                {data:"Ipress"},
                {data:"FechaEntrega"},
                {data:"FechaMonitoreo"},
                {data:"NumeroMonitoreo"},
                {data:"Responsable"},
                {data:"CargoResponsable"},
            ],
            order:[0]
        });
    </script>
    <script>
        function ObtieneRegiones(dist){ 
            $.ajax({
                url:"ListarRegiones/" + $("#"+dist+"").val(),
                method:"GET",
                dataType:"json",
                success: function (response) {
                    $.each(response.lista_regiones, function (key, item) { 
                        if ((item.distId)==($("#"+dist+"").val())) {
                            $("#Departamento").val(item.dptoId).change();
                            $("#Provincia").val(item.provId).change();
                            return false;
                        }
                    });
                }
            });
        }
        var fecha = new Date();
        document.getElementById("FechaEntrega").value = fecha.toJSON().slice(0,10);
        document.getElementById("FechaMonitoreo").value = fecha.toJSON().slice(0,10);
    </script>    
@endsection