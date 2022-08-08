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
                    <div>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Código</th>
                                <th>Acciones</th>
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
                    </div>
                </table>
                </div>
            </div>
        </div>
        
        <form id="formNuevaIntervencion">
            @csrf
            <div class="modal fade" id="NuevaIntervencionModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Registrar Nueva Intervención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="single-select" name="Departamento" id="Departamento" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                        @endforeach
                                    </select>    
                                </div>
                                <div class="col-4">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select name="Provincia" id="Provincia" class="single-select" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select name="Distrito" id="Distrito" class="single-select" onchange="ObtieneRegiones('Distrito');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                        @endforeach
                                    </select>        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Rio/Quebrada</label>
                                    <input type="text" class="form-control form-control-sm" name="RioQuebrada" id="RioQuebrada">
                                </div>
                                <div class="col-lg-2">
                                    <label for="form" class="form-label">JefeBrigada</label>
                                    <input type="text" class="form-control form-control-sm" name="JefeBrigada" id="JefeBrigada">
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Periodo-FechaInicio</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio" >
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Periodo-FechaFinal</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_final" id="fecha_final">
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

        <form id="formEditarIntervencion">
            @csrf
            <div class="modal fade" id="EditarIntervencionModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Intervención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="">
                                <div class="col-sm-3">
                                    <input type="text" name="idIntervencion" id="idIntervencion" hidden>
                                    <label for="">Codigo</label>
                                    <input type="text" name="codigo" id="codigo" class="form-control form-control-sm" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="single-select" name="Departamentoe" id="Departamentoe" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                        @endforeach
                                    </select>    
                                </div>
                                <div class="col-4">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select name="Provinciae" id="Provinciae" class="single-select" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select name="Distritoe" id="Distritoe" class="single-select" onchange="ObtieneRegiones('Distritoe');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                        @endforeach
                                    </select>        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Rio/Quebrada</label>
                                    <input type="text" class="form-control form-control-sm" name="RioQuebradae" id="RioQuebradae">
                                </div>
                                <div class="col-lg-2">
                                    <label for="form" class="form-label">JefeBrigada</label>
                                    <input type="text" class="form-control form-control-sm" name="JefeBrigadae" id="JefeBrigadae">
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Periodo-FechaInicio</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_inicioe" id="fecha_inicioe" value="1900-01-01">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Periodo-FechaFinal</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_finale" id="fecha_finale" value="1900-01-01">
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

        <form id="FormListarLocalidad">
            @csrf
            <div class="modal fade" id="ListarLocalidadModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista de Localidades</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button" class="btn-sm btn-primary btnNuevaLocalidad" data-bs-toggle="modal">
                                        <i class="lni lni-circle-plus"></i> Registrar Localidad
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">CÓDIGO DE FICHA:</label>
                                    <input type="text" class="form-control form-control-sm" id="codigo_ficha" readonly>
                                </div>
                            </div>
                            
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="ListarLocalidad" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Acciones</th>
                                                    <th>Localidad</th>
                                                    <th>Poblacion</th>
                                                    <th>N°Viviendas</th>
                                                    <th>Lam.Últ.8Sem.</th>
                                                    <th>N°CasosÚlt.8Sem.</th>
                                                    <th>IP.Ult.8Sem</th>
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
                </div>
            </div>
        </form>

        <form id="formNuevaLocalidad">
            @csrf
            <div class="modal fade" id="NuevaLocalidadModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Registrar Localidad de Intervención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="idLocalidadIntervencion" id="idLocalidadIntervencion" hidden>
                                    <label for="form" class="form-label">Localidad</label>
                                    <input type="text" name="Localidad" id="Localidad" class="form-control form-control-sm">  
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Población</label>
                                    <input type="number" name="Poblacion" id="Poblacion" class="form-control form-control-sm">  
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">N° Viviendas</label>
                                    <input type="number" name="Nvivienda" id="Nvivienda" class="form-control form-control-sm">      
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Láminas Últimasa 8 Sem.</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Lamtul8sem" id="Lamtul8sem">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">N° Casos</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Casosul8sem" id="Casosul8sem">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Índice Positividad Últ. 8 Sem.(N°Casos/Lám)x100</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Iptul8sem" id="Iptul8sem" readonly>
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
        
        <form id="formEditarLocalidad">
            @csrf
            <div class="modal fade" id="EditarLocalidadModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Localidad de Intervención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="idLocalidade" id="idLocalidade" hidden>
                                    <label for="form" class="form-label">Localidad</label>
                                    <input type="text" name="Localidade" id="Localidade" class="form-control form-control-sm">  
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Población</label>
                                    <input type="number" step="0.01" name="Poblacione" id="Poblacione" class="form-control form-control-sm">  
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">N° Viviendas</label>
                                    <input type="number" step="0.01" name="Nviviendae" id="Nviviendae" class="form-control form-control-sm">      
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Láminas Últimasa 8 Sem.</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Lamtul8seme" id="Lamtul8seme">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">N° Casos</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Casosul8seme" id="Casosul8seme">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Índ. Pos. Últ. 8 Sem.(N°Casos/Lám)x100</label>
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="Iptul8seme" id="Iptul8seme" readonly>
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
        
        <form id="FormListarActividadProgramada">
            @csrf
            <div class="modal fade" id="ListarActividadProgramadaModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista de Actividades Programadas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button" class="btn-sm btn-primary btnAgregarActividadProgramada" data-bs-toggle="modal">
                                        <i class="lni lni-circle-plus"></i> Nueva Actividad Programada
                                    </button>
                                </div>             
                                <br>
                                <div class="table-responsive">
                                    <table id="ListaActividadProgramada" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Acciones</th>
                                                <th>A.Programada</th>
                                                <th>Laminas</th>
                                                <th>N°CasasFumigar</th>
                                                <th>Lam.Tomadas</th>
                                                <th>Vivax</th>
                                                <th>Falcip.</th>
                                                <th>%Pob.Muestr.</th>
                                                <th>IP</th>
                                                <th>TP</th>
                                                <th>Act.Desan</th>
                                                <th>CasasRociadas</th>
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
                    </div>
                </div>
            </div>
        </form>

        <form id="formAgregarActividadProgramada">
            @csrf
            <div class="modal fade" id="formAgregarActividadProgramadaModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Registrar Actividad Programada</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="idLocalidad_actpro" id="idLocalidad_actpro" hidden>
                                    <label for="form" class="form-label">Actividad Programada</label>
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
                                    <label for="form" class="form-label">Casas a Rociar y/o Fumigar</label>
                                    <input type="number" step="0.01" name="CasasRociar" id="CasasRociar" class="form-control form-control-sm">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Laminas Tomadas</label>
                                    <input type="number" value="0" name="LaminasTomadas" step="0.01" id="LaminasTomadas" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Vivax</label>
                                    <input type="number" value="0" step="0.01" name="Vivax" id="Vivax" class="form-control form-control-sm">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Falciparum</label>
                                    <input type="number" value="0" step="0.01" name="Falciparum" id="Falciparum" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Pob.Muestreada(%)</label>
                                    <input type="number" value="0" step="0.01" name="ProbMuestreada" id="ProbMuestreada" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Ind.Pos.(N°Casos/Láminas)x100</label>
                                    <input type="number" value="0" step="0.01" name="IndicePos" id="IndicePos" class="form-control form-control-sm" readonly>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">TasaPrevalencia</label>
                                    <input type="number" value="0" step="0.01" name="TasaPre" id="TasaPre" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Act.Desarrollada</label>
                                    <select class="single-select" name="ActDesa" id="ActDesa">
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
                                    <label for="form" class="form-label">Casas Rocias y/o Fumigadas</label>
                                    <input type="number" value="0" step="0.01" name="CasasRociadas" id="CasasRociadas" class="form-control form-control-sm">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha Inicio Intervención</label>
                                    <input type="date" name="FechaInicio" id="FechaInicio" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Fecha Final Intervención</label>
                                    <input type="date" name="FechaFinal" id="FechaFinal" class="form-control">
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

                    

                </div>
            </div>
        </form>

        <form id="formEditarActividadProgramada">
            @csrf
            <div class="modal fade" id="EditarActividadProgramadaModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Actividad Programada</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Id</label>
                                    <input type="text" name="idact_pro" id="idact_pro" class="form-control form-control-sm" readonly>
                                    <label for="form" class="form-label">Actividad Programada</label>
                                    <select class="single-select" name="act_programadase" id="act_programadase">
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
                                    <input type="number" step="0.01" name="LaminasTomare" id="LaminasTomare" class="form-control form-control-sm">  
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Casas a Rociar y Fumigar</label>
                                    <input type="number" step="0.01" name="CasasRociare" id="CasasRociare" class="form-control form-control-sm">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Laminas Tomadas</label>
                                    <input type="number" step="0.01" value="0" name="LaminasTomadase" id="LaminasTomadase" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Vivax</label>
                                    <input type="number"step="0.01"  value="0" name="Vivaxe" id="Vivaxe" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Falciparum</label>
                                    <input type="number" step="0.01" value="0" name="Falciparume" id="Falciparume" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Prob.Muestreada</label>
                                    <input type="number" step="0.01" value="0" name="ProbMuestreadae" id="ProbMuestreadae" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">IndicePos.(N°Casos/Lám)x100</label>
                                    <input type="number" step="0.01" value="0" name="IndicePose" id="IndicePose" class="form-control form-control-sm" readonly>      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">TasaPrevalencia</label>
                                    <input type="number" step="0.01" value="0" name="TasaPree" id="TasaPree" class="form-control form-control-sm">      
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Act.Desarrollada</label>
                                    <select class="single-select" name="ActDesae" id="ActDesae">
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
                                    <label for="form" class="form-label">Casas Rociadas y/o Fumigadas</label>
                                    <input type="number" value="0" name="CasasRociadase" id="CasasRociadase" class="form-control form-control-sm">      
                                </div>
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Fecha Inicio Intervención</label>
                                    <input type="date" name="FechaInicioe" id="FechaInicioe" class="form-control">
                                </div>
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Fecha Final Intervención</label>
                                    <input type="date" name="FechaFinale" id="FechaFinale" class="form-control">
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

    </div>
</div>

@endsection
@section('script_ajax')
    <script>
        
        // <button class='btn-danger btn-sm btnEjecucionActividadProgramada'><i class='lni lni-control-panel'></i></button>"
        $("#Casosul8sem").keyup(function(){
            IndicePositividad($("#Lamtul8sem").val(),$("#Casosul8sem").val());
        });
        $("#Lamtul8sem").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividad($("#Lamtul8sem").val(),$("#Casosul8sem").val());
        });

        $("#Casosul8seme").keyup(function(){
            IndicePositividad($("#Lamtul8seme").val(),$("#Casosul8seme").val());
        });
        $("#Lamtul8seme").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividad($("#Lamtul8seme").val(),$("#Casosul8seme").val());
        });

        
        $("#LaminasTomadas").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadas").val(),parseInt($("#Vivax").val())+parseInt($("#Falciparum").val()));
        });
        $("#LaminasTomadase").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadase").val(),parseInt($("#Vivaxe").val())+parseInt($("#Falciparume").val()));
        });
        
        $("#Vivax").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadas").val(),parseInt($("#Vivax").val())+parseInt($("#Falciparum").val()));
        });
        $("#Falciparum").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadas").val(),parseInt($("#Vivax").val())+parseInt($("#Falciparum").val()));
        });

        $("#Vivaxe").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadase").val(),parseInt($("#Vivaxe").val())+parseInt($("#Falciparume").val()));
        });
        $("#Falciparume").keyup(function(){
            // IndicePositividad(parseFloat($("#Casosul8sem").val()),parseFloat($("#Lamtul8sem").val()));
            IndicePositividadA($("#LaminasTomadase").val(),parseInt($("#Vivaxe").val())+parseInt($("#Falciparume").val()));
        });


        function IndicePositividadA(laminas,casos){
            if (laminas>0) {
            }else{
                laminas=0
            }
            if (casos>0) {
            }else{
                casos=0
            }
            // alert(casos+" y "+ laminas);
            var ip=(casos/laminas)*100;
            // alert(ip);
            $("#IndicePos").val(ip.toFixed(2));
            $("#IndicePose").val(ip.toFixed(2));
        }

        function IndicePositividad (laminas,casos){
            if (laminas>0) {
            }else{
                laminas=0
            }
            if (casos>0) {
            }else{
                casos=0
            }
            // alert(casos+" y "+ laminas);
            var ip=(casos/laminas)*100;
            // alert(ip);
            $("#Iptul8sem").val(ip.toFixed(2));
            $("#Iptul8seme").val(ip.toFixed(2));
        }

        $("#formEditarActividadProgramada").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formEditarActividadProgramada").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizaActividadProgramada",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#ListaActividadProgramada").DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#EditarActividadProgramadaModal").modal('hide');
        });


        $(document).on("click",".btnEditarActividadProgramada",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());

            $.ajax({
                type: "GET",
                url: "EditarActividadProgramada/"+id,
                dataType: "json",
                success: function (response){
                    $("#idact_pro").val(response[0].idActProgram);
                    $("#act_programadase").val(response[0].act_programadas).change();
                    $("#LaminasTomare").val(response[0].laminas);
                    $("#CasasRociare").val(response[0].casas_fumigar);
                    $("#LaminasTomadase").val(response[0].LaminasTomadas);
                    $("#Vivaxe").val(response[0].Vivax);
                    $("#Falciparume").val(response[0].Falciparum);
                    $("#ProbMuestreadae").val(response[0].ProbMuestreada);
                    $("#IndicePose").val(response[0].IndicePos);
                    $("#TasaPree").val(response[0].TasaPre);
                    $("#ActDesae").val(response[0].ActDesa).change();
                    $("#CasasRociadase").val(response[0].CasasRociadas);
                    $("#FechaInicioe").val(response[0].FechaInicio);
                    $("#FechaFinale").val(response[0].FechaFinal);
                   
                }
            });
            $("#EditarActividadProgramadaModal").modal('show');
        });

        $("#formAgregarActividadProgramada").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formAgregarActividadProgramada").serialize();
            $.ajax({
                type: "POST",
                url: "AgregarActividadProgramada",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#ListaActividadProgramada").DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#formAgregarActividadProgramadaModal").modal('hide');
        });

        $(document).on("click",".btnAgregarActividadProgramada",function(){

            $("#formAgregarActividadProgramadaModal").modal('show');
        });

        $(document).on("click",".btnListaActividadProgramada",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idLocalidad_actpro").val(id);

            // numero_casos=parseInt((fila).find('td:eq(6)').text());
            // $("#NumeroCasos").val(numero_casos);
            // $("#NumeroCasose").val(numero_casos);

            $("#ListaActividadProgramada").DataTable({
            "destroy":true,
            "ajax": "ListaActividadProgramada/"+id,
            "method":'GET',
            "columns":[
                {data:"ActiProgramadaId"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarActividadProgramada'><i class='lni lni-pencil'></i></button>"},
                {data:"act_programadas"},
                {data:"laminas"},
                {data:"casas_fumigar"},
                {data:"LaminasTomadas"},
                {data:"Vivax"},
                {data:"Falciparum"},
                {data:"ProbMuestreada"},
                {data:"IndicePos"},
                {data:"TasaPre"},
                {data:"ActDesa"},
                {data:"CasasRociadas"},
                {data:"FechaInicio"},
                {data:"FechaFinal"},
            ],
            order:[0]
            });
            $("#ListarActividadProgramadaModal").modal('show');
        });

        $("#formEditarLocalidad").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formEditarLocalidad").serialize();
            $.ajax({
                url: "ActualizarLocalidad",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarLocalidad').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#EditarLocalidadModal').modal('hide');
        });

        $(document).on("click",".btnEditarLocalidad",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            $.ajax({
                type: "GET",
                url: "EditarLocalidad/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idLocalidade").val(response[0].idLocalidad);
                    $("#Localidade").val(response[0].Localidad);
                    $("#Poblacione").val(response[0].Poblacion);
                    $("#Nviviendae").val(response[0].Nvivienda);
                    $("#Lamtul8seme").val(response[0].Lamtul8sem);
                    $("#Casosul8seme").val(response[0].Casosul8sem);
                    $("#Iptul8seme").val(response[0].Iptul8sem);
                }
            });
            $('#EditarLocalidadModal').modal('show');
        });


        $("#formNuevaLocalidad").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formNuevaLocalidad").serialize();
            $.ajax({
                url: "NuevaLocalidad",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarLocalidad').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#NuevaLocalidadModal').modal('hide');
        });

        $(document).on("click",".btnNuevaLocalidad",function(){
            $("#NuevaLocalidadModal").modal('show');
        });
        
        $(document).on("click",".btnListarLocalidad",function () {
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            codigo=fila.find('td:eq(1)').text();
            $("#codigo_ficha").val(codigo);
            $("#idLocalidadIntervencion").val(id);

            $("#ListarLocalidad").DataTable({
            "destroy":true,
            "ajax": "ListarLocalidad/"+id,
            "method":'GET',
            "columns":[
                {data:"localidadId"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarLocalidad'><i class='lni lni-pencil'></i></button>\
                <button class='btn-success btn-sm btnListaActividadProgramada'><i class='lni lni-agenda'></i></button>"
                },
                {data:"Localidad"},
                {data:"Poblacion"},
                {data:"Nvivienda"},
                {data:"Lamtul8sem"}, 
                {data:"Casosul8sem"},
                {data:"Iptul8sem"},
            ],
            order:[0]
            });
            $("#ListarLocalidadModal").modal('show');
        });
        
        $("#formEditarIntervencion").submit(function (e) {
            e.preventDefault();
            $("#Departamentoe").prop('disabled', false);
            $("#Provinciae").prop('disabled', false);
            var serializedData = $("#formEditarIntervencion").serialize();
            $.ajax({
                url: "ActualizarIntervencion",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarIntervenciones').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#Departamentoe").prop('disabled', true);
            $("#Provinciae").prop('disabled', true);
            $('#EditarIntervencionModal').modal('hide');
        })
        
        $(document).on("click",".btnEditarIntervencion",function() {
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            $.ajax({
                type: "GET",
                url: "EditarIntervencion/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idIntervencion").val(response[0].idIntervencion);
                    $("#codigo").val(response[0].codigo);
                    $("#Departamentoe").val(response[0].dptoId).change();
                    $("#Provinciae").val(response[0].provId).change();
                    $("#Distritoe").val(response[0].distId).change();
                    $("#RioQuebradae").val(response[0].RioQuebrada);
                    $("#JefeBrigadae").val(response[0].JefeBrigada);
                    $("#fecha_inicioe").val(response[0].FechaInicio);
                    $("#fecha_finale").val(response[0].FechaFinal);
                }
            });
            $('#EditarIntervencionModal').modal('show');
        });

        $(document).on("click",".btnEditarIntervencion",function () {
            $("#EditarIntervencionModal").modal('show');
        });

        $("#formNuevaIntervencion").submit(function (e) {
            e.preventDefault();
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
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti();
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
            $('#NuevaIntervencionModal').modal('hide');
        });

        $(document).on("click",".btnNuevaIntervencion",function () {
            $("#NuevaIntervencionModal").modal('show');
        });
        
    </script>

@endsection

@section('script_table')   
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
                            $("#Departamentoe").val(item.dptoId).change();
                            $("#Provinciae").val(item.provId).change();
                            return false;
                        }
                    });
                }
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
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarIntervencion'><i class='lni lni-pencil'></i></button>\
                <button class='btn-success btn-sm btnListarLocalidad'><i class='lni lni-world'></i></button>"
                },
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"RioQuebrada"}, 
                {data:"JefeBrigada"},
                {data:"FechaInicio"},
                {data:"FechaFinal"},
            ],
            order:[0],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
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
    document.getElementById("fecha_inicio").value = fecha.toJSON().slice(0,10);
    document.getElementById("fecha_final").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaInicio").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaFinal").value = fecha.toJSON().slice(0,10);
</script>
@endsection




