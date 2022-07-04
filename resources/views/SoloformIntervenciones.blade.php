@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-4">
                <button type="button" class="btn-sm btn-primary btnNuevaIntervencion" data-bs-toggle="modal">
                    <i class="lni lni-plus"></i> Nueva Intervención
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="ListarIntervenciones" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Dpto</th>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Rio/Quebrada</th>
                            <th>JefeBrigada</th>
                            <th>FechaInicio</th>
                            <th>FechaFinal</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
        
        
        <div class="modal fade" id="NuevaIntervencionModal" aria-hidden="true"> 
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Registrar Nueva Intervención</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form id="formNuevaIntervencion">
                                    @csrf   
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label for="" class="form-label">Código</label>
                                                <input type="text" class="form-control form-control-sm" name="codigo" id="codigo" readonly>
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="" class="form-label">idIntervencion</label>
                                                <input type="text" class="form-control form-control-sm" name="idIntervencion" id="idIntervencion" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label for="form" class="form-label">Departamento</label>
                                                <select class="single-select" name="Departamento" id="Departamento" disabled>
                                                    @foreach ($dpto as $d)
                                                        <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                                    @endforeach
                                                </select>    
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="form" class="form-label">Provincia</label>
                                                <select name="Provincia" id="Provincia" class="single-select" disabled>
                                                    @foreach ($prov as $p)
                                                        <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="form" class="form-label">Distrito</label>
                                                <select name="Distrito" id="Distrito" class="single-select" onchange="ObtieneRegiones('Distrito');">
                                                    @foreach ($dist as $d)
                                                        <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                                    @endforeach
                                                </select>        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <label for="form" class="form-label">Rio/Quebrada</label>
                                                <input type="text" class="form-control form-control-sm" name="RioQuebrada" id="RioQuebrada">
                                            </div>
                                            <div class="col-xl-2">
                                                <label for="form" class="form-label">JefeBrigada</label>
                                                <input type="text" class="form-control form-control-sm" name="JefeBrigada" id="JefeBrigada">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="form" class="form-label">Periodo-FechaInicio</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio" >
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="form" class="form-label">Periodo-FechaFinal</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha_final" id="fecha_final">
                                            </div>
                                        </div>
                                </form>
                                <br>
                                
                                <div class="row">
                                    <div class="col-xl-12">
                                        <button type="button" class="btn-sm btn-primary btnNuevoRegistro" data-bs-toggle="modal">
                                            <i class="lni lni-plus"></i> Nuevo Registro
                                        </button>
                                    </div>
                                    <div class="col-xl-8">
                                        <h5>Registro de Intervenciones</h5>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="ListarLocalidadActividades" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Localidad</th>
                                                <th>Población</th>
                                                <th>N°Viviendas</th>
                                                <th>Lám.8Sem</th>
                                                <th>N°CasosUlt.8sem</th>
                                                <th>IP*Ult.8 sem</th>
                                                <th>Act.Prog.</th>
                                                <th>Lam. a Tomar</th>
                                                <th>Casas a Rociar</th>
                                                <th>Fech.Int.</th>
                                                <th>Lam.Tomadas</th>
                                                <th>Vivax</th>
                                                <th>Falcip.</th>
                                                <th>%Pob.Muest.</th>
                                                <th>IP*</th>
                                                <th>TP**</th>
                                                <th>Act.Desarr.</th>
                                                <th>C.Rociadas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="text-align: right">

                            {{-- <button type="button" class="btn-sm btn-danger btnDescartar">Descartar</button>                                     --}}

                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning btnFinalizar">Finalizar</button>

                    </div>
                </div>

            </div>
        </div>


        <div class="modal fade" id="AgregarIntervencionModal" aria-hidden="true"> 
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Agregar Intervención</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form id="formNuevaLocalidad">
                                    @csrf
                                    <h5>Registrar Localidad de Intervención</h5>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <input type="text" name="idLocalidadIntervencion" id="idLocalidadIntervencion" hidden>
                                            <label for="form" class="form-label">Localidad</label>
                                            <input type="text" name="Localidad" id="Localidad" class="form-control form-control-sm">  
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Población</label>
                                            <input type="number" step="0.01" name="Poblacion" id="Poblacion" class="form-control form-control-sm">  
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">N° Viviendas</label>
                                            <input type="number" step="0.01" name="Nvivienda" id="Nvivienda" class="form-control form-control-sm">      
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Láminas Últimasa 8 Sem.</label>
                                            <input type="number" step="0.01" class="form-control form-control-sm" name="Lamtul8sem" id="Lamtul8sem">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">N° Casos</label>
                                            <input type="number" step="0.01" class="form-control form-control-sm" name="Casosul8sem" id="Casosul8sem">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Índice Positividad Últ. 8 Sem.</label>
                                            <input type="number" step="0.01" class="form-control form-control-sm" name="Iptul8sem" id="Iptul8sem" value="1900-01-01">
                                        </div>

                                    </div>   
                                </form>

                                <form id="formAgregarActividadProgramada">
                                    @csrf
                                    <h5>Registrar Actividad Programada</h5>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="text" name="idLocalidad_actpro" id="idLocalidad_actpro" hidden>
                                            <label for="form" class="form-label">Actividad</label>
                                            <select class="single-select" name="act_programadas" id="act_programadas">
                                                <option value="BA">BA-BÚSQUEDA ACTIVA</option>    
                                                <option value="BH">BH-BARRIDO HEMÁTICO</option>    
                                                <option value="TM">TM-TRATAMIENTO MASIVO</option>
                                                <option value="M">M-ENTREGA DE MOSQUITERO</option>
                                                <option value="RV">RV-ROCIADO DE VIVIENDA</option>  
                                                <option value="IP">IP-ÍNDICE DE POSITIVIDAD</option>
                                                <option value="TP">TP-TASA DE PREVALENCIA</option>
                                                <option value="IPHH">IPHH-ÍNDICE PICADURA HOMBRE HORA</option>
                                                <option value="C">C-CONTROL</option>
                                                <option value="ABC">ABC-ABASTECIMIENTO A BOTIQUÍN COMUNAL</option>
                                                <option value="APS">APS-ABASTECIMIENTO A PUESTO DE SALUD</option>
                                                <option value="TS">TS-TRATAMIENTO SELECTIVO</option>
                                                <option value="BFF">BFF-BLOQUEO FARMACOLÓGIO FAMILIAR</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Láminas a tomar</label>
                                            <input type="number" step="0.01" name="LaminasTomar" id="LaminasTomar" class="form-control form-control-sm">  
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Casas a Rociar y Fumigar</label>
                                            <input type="number" step="0.01" name="CasasRociar" id="CasasRociar" class="form-control form-control-sm">      
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Fecha Intervención</label>
                                            <input type="date" value="1900-01-01" name="FechaIntervencion" id="FechaIntervencion" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Laminas Tomadas</label>
                                            <input type="number" step="0.01" value="0" name="LaminasTomadas" id="LaminasTomadas" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Vivax</label>
                                            <input type="number" step="0.01" value="0" name="Vivax" id="Vivax" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Falciparum</label>
                                            <input type="number" step="0.01" value="0" name="Falciparum" id="Falciparum" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Prob.Muestreada</label>
                                            <input type="number" step="0.01" value="0" name="ProbMuestreada" id="ProbMuestreada" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">IndicePositividad</label>
                                            <input type="number" step="0.01" value="0" name="IndicePos" id="IndicePos" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">TasaPrevalencia</label>
                                            <input type="number" step="0.01" value="0" name="TasaPre" id="TasaPre" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Act.Desan.</label>
                                            <input type="number" step="0.01" value="0" name="ActDesa" id="ActDesa" class="form-control form-control-sm">      
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="form" class="form-label">Casas Rociadas</label>
                                            <input type="number" step="0.01" value="0" name="CasasRociadas" id="CasasRociadas" class="form-control form-control-sm">      
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn-sm btn-warning btnAgregarIntervención">Agregar</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="modal fade" id="EliminarIntervencionModal" aria-hidden="true"> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Descartar</h5>
                    </div>
                            <div class="card-body">
                                <h5>Esta seguro?</h5>
                            </div>

                    <div class="modal-footer" style="text-align: right">
                        <button type="button" class="btn-sm btn-info" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn-sm btn-Danger btnDescartarSi">Si</button>
                    </div>
                </div>
            </div>
        </div> --}}



    </div>
</div>

@endsection

@section('script_table')
    <script>
        // $(document).on("click",".btnDescartarSi",function(){
        //     var id=$("#idLocalidadIntervencion").val();
        //     $.ajax({
        //         type: "GET",
        //         url: "EliminarIntervencion/"+id,
        //         dataType: "json",
        //         success: function (response) {
        //             round_success_noti("Eliminado");
                    
        //             $("#ListarIntervenciones").DataTable().ajax.reload();
        //             $("#NuevaIntervencionModal").DataTable().ajax.reload();
                    
        //         }
        //     });
        //     $("#EliminarIntervencionModal").modal('hide');

        // });

        // $(document).on("click",".btnDescartar",function(){
        //     $("#EliminarIntervencionModal").modal('show');
        // });
        
        $(document).on("click",".btnFinalizar",function (){
            ActualizaIntervencion();
            round_success_noti("Registro Guardado");
            $("#NuevaIntervencionModal").modal('hide');
        });

        $(document).on("click",".btnAgregarIntervención",function(){
            GuardaLocalidad();//dentro de esta funcion guarda Actividade
            //GuardarActividad();
            $("#AgregarIntervencionModal").modal('hide');
            
        });

        $(document).on("click",".btnNuevoRegistro",function(){
            LimpiarCajasLocalidadActividades();
            $("#AgregarIntervencionModal").modal('show');
        });
        $(document).on("click",".btnNuevaIntervencion",function(){
            GuardarIntervenvión();
            $("#RioQuebrada").val('');
            $("#JefeBrigada").val('');
            $("#NuevaIntervencionModal").modal('show');
        });
        function LimpiarCajasLocalidadActividades(){
            $("#Localidad").val('');
            $("#Poclacion").val('');
            $("#Nvivienda").val('');
            $("#Lamtul8sem").val('');
            $("#Casosul8sem").val('');
            $("#Iptul8sem").val('');   
            $("#LaminasTomar").val('');
            $("#CasasRociar").val('');
            $("#LaminasTomadas").val('');
            $("#Vivax").val('');
            $("#Falciparum").val('');
            $("#ProbMuestreada").val('');
            $("#IndicePos").val('');
            $("#TasaPre").val('');
            $("#CasasRociadas").val('');
        }

        function ActualizaIntervencion(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formNuevaIntervencion").serialize();
            $.ajax({
                url: "ActualizarIntervencionNew",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarIntervenciones').DataTable().ajax.reload();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
        }

        function GuardarIntervenvión(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formNuevaIntervencion").serialize();
            $.ajax({
                url: "GuardaNuevaIntervencion",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarIntervenciones').DataTable().ajax.reload();
                    EditarIntervencion(response.id);
                    $("#idLocalidadIntervencion").val(response.id);
                },
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
        }

        function GuardaLocalidad(){
            var serializedData = $("#formNuevaLocalidad").serialize();
            $.ajax({
                url: "NuevaLocalidad",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    // round_success_noti("guardado en localidad")
                    $("#idLocalidad_actpro").val(response.id);
                    GuardaActividades();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
        }
        function GuardaActividades(){
            var serializedData = $("#formAgregarActividadProgramada").serialize();
            $.ajax({
                type: "POST",
                url: "AgregarActividadProgramada",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    // round_success_noti("guardado en actividades");
                    RecargarTablaLocalActividades();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
        }
        function EditarIntervencion(id){
            //capturo el Id seleccionado
            $.ajax({
                type: "GET",
                url: "EditarIntervencion/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idIntervencion").val(response[0].idIntervencion);
                    $("#codigo").val("ICM-"+response[0].idIntervencion);
                    $("#Departamento").val(response[0].dptoId).change();
                    $("#Provincia").val(response[0].provId).change();
                    $("#Distrito").val(response[0].distId).change();
                    $("#RioQuebrada").val(response[0].RioQuebrada);
                    $("#JefeBrigada").val(response[0].JefeBrigada);
                    $("#fecha_inicio").val(response[0].FechaInicio);
                    $("#fecha_final").val(response[0].FechaFinal);
                }
            });
        }
    </script>
    <script>

        function RecargarTablaLocalActividades(){
            id=$("#idLocalidadIntervencion").val();
            // alert("id es "+id);
            $("#ListarLocalidadActividades").DataTable({
                "destroy":true,
                "ajax": "ListarLocalidadActividades/"+id,
                "method":'GET',
                "columns":[
                    {data:"IdLocalidad"},
                    {data:"Localidad"},
                    {data:"Poblacion"},
                    {data:"Nvivienda"},
                    {data:"Lamtul8sem"}, 
                    {data:"Casosul8sem"},
                    {data:"Iptul8sem"},
                    {data:"act_programadas"},
                    {data:"laminas"},
                    {data:"casas_fumigar"},
                    {data:"FechaIntervencion"},
                    {data:"LaminasTomadas"},
                    {data:"Vivax"},
                    {data:"Falciparum"},
                    {data:"ProbMuestreada"},
                    {data:"IndicePos"},
                    {data:"TasaPre"},
                    {data:"ActDesa"},
                    {data:"CasasRociadas"},
                ],
                order:[0]
                });
            }
    </script>
@endsection

@section('script_table_ajax')
    <script>


        $("#ListarIntervenciones").DataTable({
            "ajax": "ListarIntervenciones",
            "method":'GET',
            "columns":[
                {data:"IntervencionId"},   
                {data:"codigo"},
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"RioQuebrada"}, 
                {data:"JefeBrigada"},
                {data:"FechaInicio"},
                {data:"FechaFinal"},
            ],
            order:[0]
        });
    </script>
    <script>
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
                          return false;
                      }
                  });
              }
          });
        }

        var fecha = new Date();
        document.getElementById("fecha_inicio").value = fecha.toJSON().slice(0,10);
        document.getElementById("fecha_final").value = fecha.toJSON().slice(0,10);
        document.getElementById("FechaIntervencion").value = fecha.toJSON().slice(0,10);
        
    </script>
@endsection