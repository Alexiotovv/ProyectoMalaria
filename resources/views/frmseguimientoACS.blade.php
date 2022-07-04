@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12">
            <button type="button" href="" class="btn-sm btn-primary btnNuevoSeguimiento">
                <i class="lni lni-plus"></i> Nuevo Seguimiento del Agente Comunitario de Salud
            </button>
            <br>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">            
                    <table id="ListaSeguimientoACS" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Codigo</th>
                                <th style="text-align: center;">Departamento</th>
                                <th style="text-align: center;">Provincia</th>
                                <th style="text-align: center;">Distrito</th>
                                <th style="text-align: center;">Localidad</th>
                                <th style="text-align: center;">Est.S.Cercano</th>
                                <th style="text-align: center;">T.EESSaLocalidad</th>
                                <th style="text-align: center;">T.LocalidadEESS</th>
                                <th style="text-align: center;">N°Visita</th>
                                <th style="text-align: center;">TransporteMasUsado</th>
                                <th style="text-align: center;">FechaVisita</th>
                                <th style="text-align: center;">NombreACS</th>
                                <th style="text-align: center;">CódigoACS</th>
                                <th style="text-align: center;">NombreTS</th>
                                <th style="text-align: center;">CódigoHIS</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="frmRegistroSeguimientoModal" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Formulario de Registro de Seguimiento al ACS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="box">
                                <strong style="background-color:rgb(233, 233, 233);color:black;padding: 5px;" id="codigoP"></strong>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form  id="formCreaSegPS">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <input type="text" id="idform" name="idform">
                                    <input type="text" id="iduser" name="iduser" value="iduser" >
                                    <input type="text" id="nombre_tabla" name="nombre_tabla" value="iduser">
                                    <input type="text" id="idestadoform" name="idestadoform" >
                                    
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Localidad</label>
                                            <input type="text" value="--" class="form-control" name="Localidad" id="Localidad">
                                        </div>
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
                                        <div class="col-xl-5">
                                            <label for="form" class="form-label">Distrito</label>
                                            <select class="single-select" name="Distrito" id="Distrito" onchange="ObtieneRegiones('Distritoe');">
                                                @foreach ($dist as $d)
                                                    <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Est. Salud Cercano</label>
                                            <select name="EstSalud" id="EstSalud" class="single-select" >
                                                @foreach ($ests as $e)
                                                    <option value="{{$e->id}}">{{$e->cod}}-{{$e->nombre_estsalud}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Tiempo EESS a Localidad</label>
                                            <input type="number" value="0" class="form-control" name="TiempoEESSLocalidad" id="TiempoEESSLocalidad">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Tiempo Localidad a EESS</label>
                                            <input type="number" value="0" class="form-control " name="TiempoLocalidadEESS" id="TiempoLocalidadEESS">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">M. Transporte mas Usado</label>
                                            <select class="single-select" name="Transporte" id="Transporte">
                                                @foreach ($medios_transportes as $mt)
                                                    <option value="{{$mt->id}}">{{$mt->nombre_medio}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Fecha de Visita </label>
                                            <input type="date" class="form-control" name="FechaVisita1" id="FechaVisita1">
                                        </div>
                                        
                                        <div class="col-xl-5">
                                            <label class="form-label">Nombre del ACS</label>
                                            <div class="input-group">
                                                <select class="single-select " name="NombreTCS1" id="NombreTCS1">
                                                    @foreach ($tcs as $tc)
                                                        <option value="{{$tc->dni_tcs}}">{{$tc->dni_tcs}}-{{$tc->nombre_tcs}}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-outline-secondary btnAgregarACSn" type="button"><i class='bx bx-user-plus'></i>
                                                </button>
                                            </div>  
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Código del ACS </label>
                                            <input type="text" class="form-control" name="CodigoTCS1" id="CodigoTCS1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Nombre del TS </label>
                                            <input type="text" class="form-control" name="NombreTS1" id="NombreTS1">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Código HIS del TS </label>
                                            <input type="text" class="form-control" name="CodigoHISTS1" id="CodigoHISTS1">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="" class="form-label">Número de Visita</label>
                                            <select class="form-select mb-3" name="NumeroVisita" id="NumeroVisita">
                                                <option value="1">1° Visita</option>
                                                <option value="2">2° Visita</option>
                                                <option value="3">3° Visita</option>
                                                <option value="4">4° Visita</option>
                                                <option value="5">5° Visita</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form id="formCompetenciasFunciones">
                                    @csrf
                                    <input type="text" name="id" value="" id="id" hidden>
                                    <h6 style="text-align:center">Competencias y/o Funciones</h6>
                                    @foreach ($competencias as $item)
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-xl-6">
                                                <label for="">{{$item->nombre_competencia}}</label>
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="" class="form-label">Hizo la actividad?</label>
                                                <select class="form-select form-select-sm mb-3" id="visita1{{$item->id}}" name="visita1{{$item->id}}">
                                                    <option value="--">--</option>
                                                    <option value="NO">NO</option>
                                                    <option value="SI">SI</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="">Observación</label>
                                                <textarea type="text" class=" form-control form-control-sm" name="obs1{{$item->id}}"></textarea>
                                            </div>
                                        </div>
                                        <hr>               
                                    @endforeach
                                    
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form id="formGuardaStockMedicamentos">
                                    @csrf
                                    <input type="text" name="idStock" value="" id="idStock" hidden>
                                    <h6 style="text-align:center">Stock y Medicamentos</h6>
                                    @foreach ($stock as $item)
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <label for="" class="form-label">Insumos y Medicamentos</label>
                                                    <label for="">{{$item->nombre_competencia}}</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="" class="form-label">Unidades</label>
                                                <input type="number" step="0.10" class=" form-control form-control-sm" name="unidades1{{$item->id}}">                                
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="" class="form-label">Fecha de Vencimiento</label>
                                                <input type="date" value="2022-09-01" class=" form-control form-control-sm" name="fecha1{{$item->id}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn-sm btn-warning btnGuardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script_table')
    <script>
        $(document).on("click",".btnNuevoSeguimiento",function(){
            //PRIMERO: PREGUNTA A LA BD SI TIENE FORM PENDIENTE SINO GRABA DIRECTO
            var id_user=$("#IdUsuario").text();
            var nombre_tabla="SEG_ACS";
            $("#nombre_tabla").val(nombre_tabla);
            var token = $("#token").val();
            $.ajax({
                type: "POST",
                url: "EstadoForm",
                data: {'id_user':id_user,'nombre_tabla':nombre_tabla,'_token':token},
                dataType: "json",
                success: function (response) {
                    if (response.Mensaje=='No_Existe') {
                        //lim,piando cajas
                        $("#Localidad").val("");
                        $('#TiempoEESSLocalidad').val(0);
                        $('#TiempoLocalidadEESS').val(0);
                        $('#NumeroVisita').val(1).change();
                        $('#CodigoTCS1').val("");
                        $('#NombreTS1').val("");
                        $('#CodigoHISTS1').val("");
                        GuardaSeguimiento();
                    }else{
                        EditarSeguimiento(response.idRegistro);
                    }
                }
            });
        });

        $(document).on("click",".btnGuardar",function(e){
            e.preventDefault();
            ActualizaSeguimiento();
            GuardarCompetencias();
            GuardarStockMedicamentos();
            EliminarEstadoForm();
            $("#ListaSeguimientoACS").DataTable().ajax.reload();
            $("#frmRegistroSeguimientoModal").modal('hide');
        });

        function GuardarStockMedicamentos(){
                var serializedData = $("#formGuardaStockMedicamentos").serialize();
                $.ajax({
                    type: "POST",
                    url: "GuardaStockMedicamentos",
                    data: serializedData,
                    dataType: "json",
                    success: function (response) {
                    },
                });
                $("#EditarStockMedicamentosModal").modal('hide');
            
        }


        function EliminarEstadoForm(){
            var id_user=$("#IdUsuario").text();
            var nombre_tabla="SEG_ACS";
            var token = $("#token").val();
            
            //obtenemos el id del estado form
            $.ajax({
                type: "POST",
                url: "EstadoForm",
                data:  {'id_user':id_user,'nombre_tabla':nombre_tabla,'_token':token},
                dataType: "json",
                success: function (response) {
                    var idestadoform=response.id;

                    
                    $.ajax({
                        type: "POST",
                        url: "EliminaEstadoForm",
                        data:  {'idestadoform':idestadoform,'_token':token},
                        dataType: "json",
                        success: function (response) {
                            round_success_noti("Registro Guardado");
                        },
                        error: function (response) {
                            round_error_noti()
                        }
                    });
                }
            });

        }

        function EditarSeguimiento(id){
            var id_form = $("#idform").val();
            $.ajax({
                type: "GET",
                url: "EditarFormSeg/"+id,                
                dataType: "json",
                success: function (response) {
                    $("#idStock").val(response[0].idform);
                    $("#id").val(response[0].idform);
                    $("#idform").val(response[0].idform);
                    $("#codigoP").text('CÓDIGO DE FICHA: '+ response[0].Codigo);
                    $("#Localidad").val(response[0].Localidad);
                    $('#Distrito').val(response[0].distId).change();
                    $('#Provincia').val(response[0].provId).change();
                    $('#Departamento').val(response[0].dptoId).change();
                    $('#EstSalud').val(response[0].esId).change();
                    $('#TiempoEESSLocalidad').val(response[0].TiempoEesLocalidad);
                    $('#TiempoLocalidadEESS').val(response[0].TiempoLocalidadEess);
                    $('#NumeroVisita').val(response[0].NumeroVisita).change();
                    $('#Transporte').val(response[0].mtId).change();
                    $('#FechaVisita1').val(response[0].FechaVisita1);
                    $('#NombreTCS1').val(response[0].NombreTcsVisita1).change();
                    $('#CodigoTCS1').val(response[0].CodigoTcsVisita1);
                    $('#NombreTS1').val(response[0].NombreTsVisita1);
                    $('#CodigoHISTS1').val(response[0].CodigoHisTsVisita1);
                }
            });
            $("#frmRegistroSeguimientoModal").modal('show');
        }

        function GuardaSeguimiento(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formCreaSegPS").serialize();
            $.ajax({
                type: "POST",
                url: "RegistraSegumientoACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#idform").val(response.id);
                    $("#codigoP").text('CÓDIGO DE FICHA: '+ response.codigo);
                    $("#id").val(response.id);//pone en el input del formdeRegistrarCompetencias
                    $("#idStock").val(response.id);
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
            $("#frmRegistroSeguimientoModal").modal('show');
        }
        
        function ActualizaSeguimiento(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);

            var serializedData = $("#formCreaSegPS").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizaSegumientoACS",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
        }
        function GuardarCompetencias(){
            var serializedData = $("#formCompetenciasFunciones").serialize();

            $.ajax({
                type: "POST",
                url: "Guardaformps2",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                }
            });
        }
    </script>
@endsection

@section('script_table_ajax')
    <script>
        $(document).ready(function(){
            setInterval(function() {
                ActualizaSeguimiento();
            }, 40000);
            //para que pueda grabar cuando existe registro del form en estadoform
            $("#iduser").val($("#IdUsuario").text());
            
            function ObtenerFechaActual(){
                var fecha = new Date();
                var result=fecha.toJSON().slice(0,10);
                return result
            }
        });

        $("#ListaSeguimientoACS").DataTable({
            "destroy":true,
            "ajax": "ListarSeguimientoACS",
            "method":'GET',
            "columns":[
                {data:"idform"},  
                {data:"Codigo"},
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Localidad"}, 
                {data:"nombre_estsalud"}, 
                {data:"TiempoEesLocalidad"},
                {data:"TiempoLocalidadEess"},
                {data:"NumeroVisita"},
                {data:"nombre_medio"},
                {data:"FechaVisita1"},
                {data:"NombreTcsVisita1"},
                {data:"CodigoTcsVisita1"},
                {data:"NombreTsVisita1"},
                {data:"CodigoHisTsVisita1"},
            ],
            order:[0]
        });

        function ObtieneRegiones(dist) { 
            $.ajax({
                url:"ListarRegiones/" + $("#"+dist+"").val(),
                method:"GET",
                dataType:"json",
                success: function (response) {
                    $.each(response.lista_regiones, function (key, item) { 
                        if ((item.distId)==($("#"+dist+"").val())) {
                            $("#Departamento").val(item.dptoId).change();
                            $("#Provincia").val(item.provId).change();
                            // $("#Departamentoe").val(item.dptoId).change();
                            // $("#Provinciae").val(item.provId).change();
                            return false;
                        }
                    });
                }
            });
        }

        
    </script>
    <script>
        

        var fecha = new Date();
        document.getElementById("FechaVisita1").value = fecha.toJSON().slice(0,10);
        
    </script>    
@endsection