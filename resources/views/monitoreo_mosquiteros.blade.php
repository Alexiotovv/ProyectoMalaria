@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-4">
                <button type="button" class="btn-sm btn-primary btnNuevoMonitoreoMosquiteros" data-bs-toggle="modal">
                    <i class="lni lni-circle-plus"></i>Registrar Monitoreo
                </button>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ListarMonitoreoMosquiteros" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Codigo</th>
                                <th>Acciones</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Localidad</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Sexo</th>
                                <th>Edad</th>
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

<form id="formEditarMoniteroMosquitero">
    @csrf
    <div class="modal fade" id="EditarMoniteroMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Editar Monitoreo y Evaluación del Uso de Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-xl-3">
                                <label for="" class="form-label">IdFicha</label>
                                <input type="text" name="idMonitoreoMosquitero" id="idMonitoreoMosquitero" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-xl-3">
                                <label for="" class="form-label">Código</label>
                                <input type="text" name="codigoe" id="codigoe" class="form-control form-control-sm" readonly>
                            </div>
                        </div>

                        <div class="col-xl-2">
                            <label for="" class="form-label">Fecha</label>
                            <input type="date" name="Fechae" id="Fechae" class="form-control form-control-sm" value="2022-01-01">
                        </div>
                        <div class="col-xl-2">
                            <label for="" class="form-label">Número de Monitoreo</label>
                            <input type="number" name="NumeroMonitoreoe" id="NumeroMonitoreoe" class="form-control form-control-sm" value="0">
                        </div>

                        <label for="" style="width: 100%;"><strong>A. UBICACIÓN E IDENTIFICACÓN DEL ENTREVITASDO(Jefe de Hogar)</strong></label>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Departamento</label>
                                </div>
                                <div class="col-xl-6">
                                    <select class="form-select form-select-sm" name="Departamentoe" id="Departamentoe" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Provincia</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Provinciae" id="Provinciae" class="form-select form-select-sm" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Distrito</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Distritoe" id="Distritoe" class="single-select" onchange="ObtieneRegiones('Distritoe');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Localidad</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Localidade" id="Localidade" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="">Apellidos</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Apellidose" id="Apellidose" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Nombres</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Nombrese" id="Nombrese" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Sexo</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Generoe" id="Generoe" class="form-select form-select-sm">
                                        <option value="H">MASCULINO</option>
                                        <option value="M">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Edad</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="number" name="Edade" id="Edade" step="0.1" value="1.00" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for=""><strong>B. PERSONAS Y MOSQUITEROS POR VIVIENDA (cantidad)</strong></label>
                        <div class="col-xl-12">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s...durmieron debajo de un mosquitero ayer?</label>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL PERSONAS</label>
                                    <input type="number" name="TotalPersonase" id="TotalPersonase" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">MENORES 5 AÑOS</label>
                                    <input type="number" name="TotalMenores5e" id="TotalMenores5e" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">NIÑOS 5-15 AÑOS</label>
                                    <input type="number" name="TotalNinos5_15e" id="TotalNinos5_15e" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL GESTANTES</label>
                                    <input type="number" name="TotalGestantee" id="TotalGestantee" class="form-control form-control-sm" >
                                </div>

                                <div class="col-xl-1">
                                    <label for="" class="form-label">CAMAS O SIMIL.</label>
                                    <input type="number" name="TotalCamase" id="TotalCamase" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL HAMAC.</label>
                                    <input type="number" name="TotalHamacase" id="TotalHamacase" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL MOSQ.</label>
                                    <input type="number" name="TotalMosquiterose" id="TotalMosquiterose" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL MOSQ. IMP.</label>
                                    <input type="number" name="TotalMosqImpregnadose" id="TotalMosqImpregnadose" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for=""><strong>C. USO DE MOSQUITEROS EL DIA ANTERIOR</strong></label>
                        <div class="col-xl-8">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s...durmieron debajo de un mosquitero ayer?</label>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">TOTAL PERSONAS</label>
                                    <input type="number" name="DBM_Personase" id="DBM_Personase" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">MENORES 5 AÑOS</label>
                                    <input type="number" name="DBM_menores5e" id="DBM_menores5e" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">NIÑOS 5-15 AÑOS</label>
                                    <input type="number" name="DBM_menores5_15e" id="DBM_menores5_15e" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">GESTANTES</label>
                                    <input type="number" name="Gestantese" id="Gestantese" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s..están cubierta(o)s con mosquiteros?</label>
                                <div class="col-xl-6">
                                    <label for="" class="form-label">CAMAS O SIMILIARES</label>
                                    <input type="number" name="CubiertosCamase" id="CubiertosCamase" class="form-control form-control-sm">
                                </div>
                                <div class="col-xl-6">
                                    <label for="" class="form-label">HAMACAS</label>
                                    <input type="number" name="CubiertosHamacase" id="CubiertosHamacase" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="" class="form-label">¿Usó Ud. un mosquitero ayer?</label>
                        </div>
                        <div class="col-xl-2">
                            <select name="UsoMosqAyere" id="UsoMosqAyere" class="form-select form-select-sm">
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                        </div>
                        <div class="col-xl-2">
                            <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                        </div>
                        <div class="col-xl-6">
                            <input type="text" name="UsoMosqAyer_Porquenoe" id="UsoMosqAyer_Porquenoe" class="form-control form-control-sm">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for=""><strong>D. ACEPTABILIDAD Y USO DE MOSQUITEROS IMPREGNADOS</strong></label>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Le entregaron un mosquitero impregnado gratuito en los últimos meses?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="EntregaMosquiteroUltimosMesese" id="EntregaMosquiteroUltimosMesese" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es si, ¿Cuantos fueron entregados en tu casa?</label>
                            </div>
                            <div class="col-xl-1">
                                <input type="number" name="N_MosquiterosEntregadose" id="N_MosquiterosEntregadose" class="form-control form-control-sm">
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">¿En qué mes fueron entregado los mosquiteros impregnados?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="MesMosquiterosEntregadose" id="MesMosquiterosEntregadose" class="form-select form-select-sm">
                                    <option value="ENE">ENERO</option>
                                    <option value="FEB">FEBRERO</option>
                                    <option value="FEB">MARZO</option>
                                    <option value="FEB">ABRIL</option>
                                    <option value="FEB">MAYO</option>
                                    <option value="FEB">JUNIO</option>
                                    <option value="FEB">JULIO</option>
                                    <option value="FEB">AGOSTO</option>
                                    <option value="FEB">SETIEMBRE</option>
                                    <option value="FEB">OCTUBRE</option>
                                    <option value="FEB">NOVIEMBRE</option>
                                    <option value="FEB">DICIEMBRE</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está usando el mosquitero impregnado entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="UsoMosquiteroEntregadoe" id="UsoMosquiteroEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="UsoMosquiteroEntregado_xNOe" id="UsoMosquiteroEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el mosquitero entregado? ¿Le agrada?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeMosquiteroEntregadoe" id="ConformeMosquiteroEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeMosquiteroEntregado_xNOe" id="ConformeMosquiteroEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el material del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeMaterialMosquiteroEntregadoe" id="ConformeMaterialMosquiteroEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeMaterialMosquiteroEntregado_xNOe" id="ConformeMaterialMosquiteroEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el color del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeColorMosquiteroEntregadoe" id="ConformeColorMosquiteroEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeColorMosquiteroEntregado_xNOe" id="ConformeColorMosquiteroEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el tamaño del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeTamanoMosquiteroEntregadoe" id="ConformeTamanoMosquiteroEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeTamanoMosquiteroEntregado_xNOe" id="ConformeTamanoMosquiteroEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el tamaño de los agujeros del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeTamanoAgujeroMosqEntregadoe" id="ConformeTamanoAgujeroMosqEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeTamanoAgujeroMosqEntregado_xNOe" id="ConformeTamanoAgujeroMosqEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Una vez colocado el mosquitero entregado, éste llega al suelo?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="LlegaSueloMosqEntregadoe" id="LlegaSueloMosqEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-5">
                                <label for="" class="form-label">Si es NO, ¿Los bordes del mosquitero entregado pueden meterse bien debajo de la cama o colchón?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="BordesEntranDebajoCamae" id="BordesEntranDebajoCamae" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con la cantidad de mosquiteros entregados en su hogar?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeCantidadMosqEntregadoe" id="ConformeCantidadMosqEntregadoe" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeCantidadMosqEntregado_xNOe" id="ConformeCantidadMosqEntregado_xNOe" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for=""><strong>E. PATRON DE LAVADO</strong></label>
                            <div class="col-xl-4">
                                <label for="" class="form-label">Desde que le entregaron el mosquitero impregnado, ¿Cuántas veces lo ha lavado?</label>
                            </div>
                            <div class="col-xl-1">
                                N° Veces
                                <input type="number" name="VecesLavadoMosquiteroe" id="VecesLavadoMosquiteroe" class="form-control form-control-sm">
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">¿Con qué frecuencia lavas tu mosquitero?</label>
                            </div>
                            <div class="col-xl-5">
                                <select name="FrecuenciaLavadoMosquiteroe" id="FrecuenciaLavadoMosquiteroe" class="form-select form-select-sm">
                                    <option value="1">1. CADA SEMANA</option>
                                    <option value="2">2. CADA DOS SEMANAS</option>
                                    <option value="3">3. CADA MES</option>
                                    <option value="4">4. CADA DOS MESES</option>
                                    <option value="5">5. CADA TRES O MAS MESES</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for=""><strong>F. REACCION ADVERSAS</strong></label>
                            <div class="col-xl-10">
                                <label for="" class="form-label">¿Ha habido alguna reacción o molestia luego que usted o cualquier miembro de su familia empezaron a usar el mosquitero que recibieron?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="ReaccionMolestiae" id="ReaccionMolestiae" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn-sm btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form id="formMoniteroMosquitero">
    @csrf
    <div class="modal fade" id="MoniteroMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Registrar Monitoreo y Evaluación del Uso de Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="" class="form-label">Fecha</label>
                            <input type="date" name="Fecha" id="Fecha" class="form-control form-control-sm" value="2022-01-01">
                        </div>
                        <div class="col-xl-2">
                            <label for="" class="form-label">Número de Monitoreo</label>
                            <input type="number" name="NumeroMonitoreo" id="NumeroMonitoreo" class="form-control form-control-sm" value="0">
                        </div>

                        <label for="" style="width: 100%;"><strong>A. UBICACIÓN E IDENTIFICACÓN DEL ENTREVITASDO(Jefe de Hogar)</strong></label>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Departamento</label>
                                </div>
                                <div class="col-xl-6">
                                    <select class="form-select form-select-sm" name="Departamento" id="Departamento" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Provincia</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Provincia" id="Provincia" class="form-select form-select-sm" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Distrito</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Distrito" id="Distrito" class="single-select" onchange="ObtieneRegiones('Distrito');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Localidad</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Localidad" id="Localidad" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="">Apellidos</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Apellidos" id="Apellidos" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Nombres</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" name="Nombres" id="Nombres" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Sexo</label>
                                </div>
                                <div class="col-xl-6">
                                    <select name="Genero" id="Genero" class="form-select form-select-sm">
                                        <option value="H">MASCULINO</option>
                                        <option value="M">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Edad</label>
                                </div>
                                <div class="col-xl-6">
                                    <input type="number" name="Edad" id="Edad" step="0.1" value="1.00" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for=""><strong>B. PERSONAS Y MOSQUITEROS POR VIVIENDA (cantidad)</strong></label>
                        <div class="col-xl-12">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s...durmieron debajo de un mosquitero ayer?</label>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL PERSONAS</label>
                                    <input type="number" name="TotalPersonas" id="TotalPersonas" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">MENORES 5 AÑOS</label>
                                    <input type="number" name="TotalMenores5" id="TotalMenores5" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">NIÑOS 5-15 AÑOS</label>
                                    <input type="number" name="TotalNinos5_15" id="TotalNinos5_15" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL GESTANTES</label>
                                    <input type="number" name="TotalGestante" id="TotalGestante" class="form-control form-control-sm" >
                                </div>

                                <div class="col-xl-1">
                                    <label for="" class="form-label">CAMAS O SIMIL.</label>
                                    <input type="number" name="TotalCamas" id="TotalCamas" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL HAMAC.</label>
                                    <input type="number" name="TotalHamacas" id="TotalHamacas" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL MOSQ.</label>
                                    <input type="number" name="TotalMosquiteros" id="TotalMosquiteros" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-1">
                                    <label for="" class="form-label">TOTAL MOSQ. IMP.</label>
                                    <input type="number" name="TotalMosqImpregnados" id="TotalMosqImpregnados" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for=""><strong>C. USO DE MOSQUITEROS EL DIA ANTERIOR</strong></label>
                        <div class="col-xl-8">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s...durmieron debajo de un mosquitero ayer?</label>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">TOTAL PERSONAS</label>
                                    <input type="number" name="DBM_Personas" id="DBM_Personas" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">MENORES 5 AÑOS</label>
                                    <input type="number" name="DBM_menores5" id="DBM_menores5" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">NIÑOS 5-15 AÑOS</label>
                                    <input type="number" name="DBM_menores5_15" id="DBM_menores5_15" class="form-control form-control-sm" >
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">GESTANTES</label>
                                    <input type="number" name="Gestantes" id="Gestantes" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <label for="" class="fom-label">¿Cuanta(o)s..están cubierta(o)s con mosquiteros?</label>
                                <div class="col-xl-6">
                                    <label for="" class="form-label">CAMAS O SIMILIARES</label>
                                    <input type="number" name="CubiertosCamas" id="CubiertosCamas" class="form-control form-control-sm">
                                </div>
                                <div class="col-xl-6">
                                    <label for="" class="form-label">HAMACAS</label>
                                    <input type="number" name="CubiertosHamacas" id="CubiertosHamacas" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="" class="form-label">¿Usó Ud. un mosquitero ayer?</label>
                        </div>
                        <div class="col-xl-2">
                            <select name="UsoMosqAyer" id="UsoMosqAyer" class="form-select form-select-sm">
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                        </div>
                        <div class="col-xl-2">
                            <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                        </div>
                        <div class="col-xl-6">
                            <input type="text" name="UsoMosqAyer_Porqueno" id="UsoMosqAyer_Porqueno" class="form-control form-control-sm">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for=""><strong>D. ACEPTABILIDAD Y USO DE MOSQUITEROS IMPREGNADOS</strong></label>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Le entregaron un mosquitero impregnado gratuito en los últimos meses?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="EntregaMosquiteroUltimosMeses" id="EntregaMosquiteroUltimosMeses" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es si, ¿Cuantos fueron entregados en tu casa?</label>
                            </div>
                            <div class="col-xl-1">
                                <input type="number" name="N_MosquiterosEntregados" id="N_MosquiterosEntregados" class="form-control form-control-sm">
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">¿En qué mes fueron entregado los mosquiteros impregnados?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="MesMosquiterosEntregados" id="MesMosquiterosEntregados" class="form-select form-select-sm">
                                    <option value="ENE">ENERO</option>
                                    <option value="FEB">FEBRERO</option>
                                    <option value="FEB">MARZO</option>
                                    <option value="FEB">ABRIL</option>
                                    <option value="FEB">MAYO</option>
                                    <option value="FEB">JUNIO</option>
                                    <option value="FEB">JULIO</option>
                                    <option value="FEB">AGOSTO</option>
                                    <option value="FEB">SETIEMBRE</option>
                                    <option value="FEB">OCTUBRE</option>
                                    <option value="FEB">NOVIEMBRE</option>
                                    <option value="FEB">DICIEMBRE</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está usando el mosquitero impregnado entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="UsoMosquiteroEntregado" id="UsoMosquiteroEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="UsoMosquiteroEntregado_xNO" id="UsoMosquiteroEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el mosquitero entregado? ¿Le agrada?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeMosquiteroEntregado" id="ConformeMosquiteroEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeMosquiteroEntregado_xNO" id="ConformeMosquiteroEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el material del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeMaterialMosquiteroEntregado" id="ConformeMaterialMosquiteroEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeMaterialMosquiteroEntregado_xNO" id="ConformeMaterialMosquiteroEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el color del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeColorMosquiteroEntregado" id="ConformeColorMosquiteroEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeColorMosquiteroEntregado_xNO" id="ConformeColorMosquiteroEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el tamaño del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeTamanoMosquiteroEntregado" id="ConformeTamanoMosquiteroEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeTamanoMosquiteroEntregado_xNO" id="ConformeTamanoMosquiteroEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con el tamaño de los agujeros del mosquitero entregado?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeTamanoAgujeroMosqEntregado" id="ConformeTamanoAgujeroMosqEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeTamanoAgujeroMosqEntregado_xNO" id="ConformeTamanoAgujeroMosqEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Una vez colocado el mosquitero entregado, éste llega al suelo?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="LlegaSueloMosqEntregado" id="LlegaSueloMosqEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-5">
                                <label for="" class="form-label">Si es NO, ¿Los bordes del mosquitero entregado pueden meterse bien debajo de la cama o colchón?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="BordesEntranDebajoCama" id="BordesEntranDebajoCama" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="" class="form-label">¿Está conforme con la cantidad de mosquiteros entregados en su hogar?</label>
                            </div>
                            <div class="col-xl-1">
                                <select name="ConformeCantidadMosqEntregado" id="ConformeCantidadMosqEntregado" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">Si es NO, ¿Por qué NO?</label>
                            </div>
                            <div class="col-xl-5">
                                <input type="text" name="ConformeCantidadMosqEntregado_xNO" id="ConformeCantidadMosqEntregado_xNO" class="form-control form-control-sm">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for=""><strong>E. PATRON DE LAVADO</strong></label>
                            <div class="col-xl-4">
                                <label for="" class="form-label">Desde que le entregaron el mosquitero impregnado, ¿Cuántas veces lo ha lavado?</label>
                            </div>
                            <div class="col-xl-1">
                                N° Veces
                                <input type="number" name="VecesLavadoMosquitero" id="VecesLavadoMosquitero" class="form-control form-control-sm">
                            </div>
                            <div class="col-xl-2">
                                <label for="" class="form-label">¿Con qué frecuencia lavas tu mosquitero?</label>
                            </div>
                            <div class="col-xl-5">
                                <select name="FrecuenciaLavadoMosquitero" id="FrecuenciaLavadoMosquitero" class="form-select form-select-sm">
                                    <option value="1">1. CADA SEMANA</option>
                                    <option value="2">2. CADA DOS SEMANAS</option>
                                    <option value="3">3. CADA MES</option>
                                    <option value="4">4. CADA DOS MESES</option>
                                    <option value="5">5. CADA TRES O MAS MESES</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for=""><strong>F. REACCION ADVERSAS</strong></label>
                            <div class="col-xl-10">
                                <label for="" class="form-label">¿Ha habido alguna reacción o molestia luego que usted o cualquier miembro de su familia empezaron a usar el mosquitero que recibieron?</label>
                            </div>
                            <div class="col-xl-2">
                                <select name="ReaccionMolestia" id="ReaccionMolestia" class="form-select form-select-sm">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>
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


<form id="formListaReaccionAdversa">
    <div class="modal fade" id="ListaReaccionAdversaModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Lista de Reacciones Adversas en Personas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" class="btn-sm btn-primary btnRegistrarReaccionAdversa" data-bs-toggle="modal">
                                <i class="lni lni-circle-plus"></i>Registrar Reacción Adversa
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="ListaReaccionesAdversas" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Acción</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Sexo</th>
                                        <th>Reaccion Adversa Presentada</th>
                                        <th>TDespuesUso_EmpezóMolestia</th>
                                        <th>Evolución1</th>
                                        <th>Evolución2</th>
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

<form id="formGuardarReaccionAdversa">
    @csrf
    <div class="modal fade" id="GuardarReaccionAdversaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Registrar Reacción Adversa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="">Id Monitoreo</label>
                            <input type="text" class="form-control form-control-sm" name="MMosquiteroId" id="MMosquiteroId" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="">NombreCompleto</label>
                            <input type="text" class="form-control form-control-sm" name="RANombre" id="RANombre" >
                        </div>
                        <div class="col-lg-2">
                            <label for="">Edad</label>
                            <input type="number" step="1.00" class="form-control form-control-sm" name="RAEdad" id="RAEdad">
                        </div>
                        <div class="col-lg-2">
                            <label for="">Sexo</label>
                            <select class="form-select form-select-sm" name="RAGenero" id="RAGenero">
                                <option value="H">HOMBRE</option>
                                <option value="M">MUJER</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Molestia Presentada</label>
                            <textarea name="RAMolestiaPresentada" id="RAMolestiaPresentada" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="col-lg-3">
                            <label for="">¿Cuánto tiempo despúes de iniciado el uso, empezó la molestia?</label>
                            <select class="form-select form-select-sm" name="TiempoInicioMolestias" id="TiempoInicioMolestias">
                                <option value="0">1 SEMANA DESPÚES</option>
                                <option value="1">2 SEMANAS DESPUÉS</option>
                                <option value="3">3 SEMANAS DESPUÉS</option>
                                <option value="4">4 SEMANAS DESPUÉS</option>
                                <option value="5">>1 MES</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Evolución 1</label>
                            <select class="form-select form-select-sm" name="Evolucion1" id="Evolucion1">
                                <option value="0">(0)NO REQUIRIÓ NADA</option>
                                <option value="1">(1)REQUIRIÓ MEDICACIÓN</option>
                                <option value="2">(2)REQUIRIÓ HOSP.</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Evolución 2</label>
                            <select class="form-select form-select-sm" name="Evolucion2" id="Evolucion2">
                                <option value="0">(0)MEJORÓ</option>
                                <option value="1">(1)CONTINÚA</option>
                            </select>
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

<form id="formEditarReaccionAdversa">
    @csrf
    <div class="modal fade" id="EditarReaccionAdversaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Editar Reacción Adversa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="">Id</label>
                            <input type="text" class="form-control form-control-sm" name="MMosquiteroIde" id="MMosquiteroIde" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="">NombreCompleto</label>
                            <input type="text" class="form-control form-control-sm" name="RANombree" id="RANombree" >
                        </div>
                        <div class="col-lg-2">
                            <label for="">Edad</label>
                            <input type="number" step="1.00" class="form-control form-control-sm" name="RAEdade" id="RAEdade">
                        </div>
                        <div class="col-lg-2">
                            <label for="">Sexo</label>
                            <select class="form-select form-select-sm" name="RAGeneroe" id="RAGeneroe">
                                <option value="H">HOMBRE</option>
                                <option value="M">MUJER</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Molestia Presentada</label>
                            <textarea name="RAMolestiaPresentadae" id="RAMolestiaPresentadae" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="col-lg-3">
                            <label for="">¿Cuánto tiempo despúes de iniciado el uso, empezó la molestia?</label>
                            <select class="form-select form-select-sm" name="TiempoInicioMolestiase" id="TiempoInicioMolestiase">
                                <option value="0">1 SEMANA DESPÚES</option>
                                <option value="1">2 SEMANAS DESPUÉS</option>
                                <option value="3">3 SEMANAS DESPUÉS</option>
                                <option value="4">4 SEMANAS DESPUÉS</option>
                                <option value="5">>1 MES</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Evolución 1</label>
                            <select class="form-select form-select-sm" name="Evolucion1e" id="Evolucion1e">
                                <option value="0">(0)NO REQUIRIÓ NADA</option>
                                <option value="1">(1)REQUIRIÓ MEDICACIÓN</option>
                                <option value="2">(2)REQUIRIÓ HOSP.</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Evolución 2</label>
                            <select class="form-select form-select-sm" name="Evolucion2e" id="Evolucion2e">
                                <option value="0">(0)MEJORÓ</option>
                                <option value="1">(1)CONTINÚA</option>
                            </select>
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



@section('script_table')
    <script>
        

        $("#formEditarReaccionAdversa").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formEditarReaccionAdversa").serialize();
            $.ajax({
                url: "ActualizarReaccionAdversa",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                        $('#ListaReaccionesAdversas').DataTable().ajax.reload();
                        round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#EditarReaccionAdversaModal').modal('hide');
        });

        $(document).on("click",".btnEditarReaccion",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarReaccionAdversa/" + id,
                dataType: "json",
                success: function (response) {
                    $("#MMosquiteroIde").val(response[0].id);
                    $("#RANombree").val(response[0].Nombre);
                    $("#RAEdade").val(response[0].Edad);
                    $("#RAGeneroe").val(response[0].Genero).change();
                    $("#RAMolestiaPresentadae").val(response[0].MolestiaPresentada);
                    $("#TiempoInicioMolestiase").val(response[0].TiempoInicioMolestias).change();
                    $("#Evolucion1e").val(response[0].Evolucion1).change();
                    $("#Evolucion2e").val(response[0].Evolucion2).change();
                }
            });
            $('#EditarReaccionAdversaModal').modal('show');
        });

        $("#formGuardarReaccionAdversa").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formGuardarReaccionAdversa").serialize();
            $.ajax({
                url: "GuardarReaccionAdversa",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaReaccionesAdversas').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#GuardarReaccionAdversaModal').modal('hide');
        });

        $(document).on("click",".btnRegistrarReaccionAdversa",function(e){
            e.preventDefault();
            $("#GuardarReaccionAdversaModal").modal('show');
        });

        $(document).on("click",".btnListarReaccionesAdversas",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#MMosquiteroId").val(id);
            $("#ListaReaccionesAdversas").DataTable({
                "destroy":true,
                "ajax": "ListarReaccionesAdversas/"+id,
                "method":'GET',
                "columns":[
                    {data:"ReaccionesAdversasId"},
                    {"defaultContent":
                    "<button class='btn-warning btn-sm btnEditarReaccion'><i class='lni lni-pencil'></i></button>"
                    },
                    {data:"Nombre"},
                    {data:"Edad"},
                    {data:"Genero"},
                    {data:"MolestiaPresentada"},
                    {data:"TiempoInicioMolestias"},
                    {data:"Evolucion1"},
                    {data:"Evolucion2"}
                ],
                order:[0]
            });
            $('#ListaReaccionAdversaModal').modal('show');
        });

        $("#formEditarMoniteroMosquitero").submit(function(e){
            e.preventDefault();
            $("#Departamentoe").prop('disabled', false);
            $("#Provinciae").prop('disabled', false);
            var serializedData = $("#formEditarMoniteroMosquitero").serialize();
            $.ajax({
                url: "ActualizaMonitoreoMosquiteros",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarMonitoreoMosquiteros').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#Departamentoe").prop('disabled', true);
            $("#Provinciae").prop('disabled', true);
            $('#EditarMoniteroMosquiteroModal').modal('hide');
        });

        $(document).on("click",".btnEditar",function(e){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            $.ajax({
                type: "GET",
                url: "EditarMonitoreoMosquiteros/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idMonitoreoMosquitero").val(response[0].MonitoreoMosquiteroId)
                    $("#codigoe").val(response[0].Codigo)
                    $("#Fechae").val(response[0].Fecha)
                    $("#NumeroMonitoreoe").val(response[0].NumeroMonitoreo)
                    $("#Departamentoe").val(response[0].dptoId).change();
                    $("#Provinciae").val(response[0].provId).change();
                    $("#Distritoe").val(response[0].distId).change();
                    $("#Localidade").val(response[0].Localidad)
                    $("#Nombrese").val(response[0].Nombres)
                    $("#Apellidose").val(response[0].Apellidos)
                    $("#Generoe").val(response[0].Genero).change();
                    $("#Edade").val(response[0].Edad)
                    $("#TotalPersonase").val(response[0].TotalPersonas)
                    $("#TotalMenores5e").val(response[0].TotalMenores5)
                    $("#TotalNinos5_15e").val(response[0].TotalNinos5_15)
                    $("#TotalGestantee").val(response[0].TotalGestante)
                    $("#TotalCamase").val(response[0].TotalCamas)
                    $("#TotalHamacase").val(response[0].TotalHamacas)
                    $("#TotalMosquiterose").val(response[0].TotalMosquiteros)
                    $("#TotalMosqImpregnadose").val(response[0].TotalMosqImpregnados)
                    $("#DBM_Personase").val(response[0].DBM_Personas)
                    $("#DBM_menores5e").val(response[0].DBM_menores5)
                    $("#DBM_menores5_15e").val(response[0].DBM_menores5_15)
                    $("#Gestantese").val(response[0].Gestantes)
                    $("#CubiertosCamase").val(response[0].CubiertosCamas)
                    $("#CubiertosHamacase").val(response[0].CubiertosHamacas)
                    $("#UsoMosqAyere").val(response[0].UsoMosqAyer).change();
                    $("#UsoMosqAyer_Porquenoe").val(response[0].UsoMosqAyer_Porqueno)
                    $("#EntregaMosquiteroUltimosMesese").val(response[0].EntregaMosquiteroUltimosMeses).change();
                    $("#N_MosquiterosEntregadose").val(response[0].N_MosquiterosEntregados)
                    $("#MesMosquiterosEntregadose").val(response[0].MesMosquiterosEntregados).change();
                    $("#UsoMosquiteroEntregadoe").val(response[0].UsoMosquiteroEntregado).change();
                    $("#UsoMosquiteroEntregado_xNOe").val(response[0].UsoMosquiteroEntregado_xNO)
                    $("#ConformeMosquiteroEntregadoe").val(response[0].ConformeMosquiteroEntregado).change();
                    $("#ConformeMosquiteroEntregado_xNOe").val(response[0].ConformeMosquiteroEntregado_xNO)
                    $("#ConformeMaterialMosquiteroEntregadoe").val(response[0].ConformeMaterialMosquiteroEntregado).change();
                    $("#ConformeMaterialMosquiteroEntregado_xNOe").val(response[0].ConformeMaterialMosquiteroEntregado_xNO)
                    $("#ConformeColorMosquiteroEntregadoe").val(response[0].ConformeColorMosquiteroEntregado).change();
                    $("#ConformeColorMosquiteroEntregado_xNOe").val(response[0].ConformeColorMosquiteroEntregado_xNO)
                    $("#ConformeTamanoMosquiteroEntregadoe").val(response[0].ConformeTamanoMosquiteroEntregado).change();
                    $("#ConformeTamanoMosquiteroEntregado_xNOe").val(response[0].ConformeTamanoMosquiteroEntregado_xNO)
                    $("#ConformeTamanoAgujeroMosqEntregadoe").val(response[0].ConformeTamanoAgujeroMosqEntregado).change();
                    $("#ConformeTamanoAgujeroMosqEntregado_xNOe").val(response[0].ConformeTamanoAgujeroMosqEntregado_xNO)
                    $("#LlegaSueloMosqEntregadoe").val(response[0].LlegaSueloMosqEntregado).change();
                    $("#BordesEntranDebajoCamae").val(response[0].BordesEntranDebajoCama).change();
                    $("#ConformeCantidadMosqEntregadoe").val(response[0].ConformeCantidadMosqEntregado)
                    $("#ConformeCantidadMosqEntregado_xNOe").val(response[0].ConformeCantidadMosqEntregado_xNO)
                    $("#VecesLavadoMosquiteroe").val(response[0].VecesLavadoMosquitero)
                    $("#FrecuenciaLavadoMosquiteroe").val(response[0].FrecuenciaLavadoMosquitero).change();
                    $("#ReaccionMolestiae").val(response[0].ReaccionMolestia).change();
                }
            });
            $("#EditarMoniteroMosquiteroModal").modal('show');
        });

        $("#formMoniteroMosquitero").submit(function(e){
            e.preventDefault();
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formMoniteroMosquitero").serialize();
            $.ajax({
                url: "GuardaMonitoreoMosquiteros",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarMonitoreoMosquiteros').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
            $('#MoniteroMosquiteroModal').modal('hide');
        });

        $(document).on("click",".btnNuevoMonitoreoMosquiteros",function(){
            $("#MoniteroMosquiteroModal").modal('show')
        });


        $("#ListarMonitoreoMosquiteros").DataTable({
            "ajax": "ListarMonitoreoMosquiteros",
            "method":'GET',
            "columns":[
                {data:"MonitoreoMosquiteroId"},
                {data:"Codigo"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditar'><i class='lni lni-pencil'></i></button>\
                <button class='btn-danger btn-sm btnListarReaccionesAdversas'><i class='lni lni-user'></i></button>"
                },
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Localidad"},
                {data:"Nombres"},
                {data:"Apellidos"},
                {data:"Genero"},
                {data:"Edad"},
            ],
            order:[0]
        });
    </script>
@endsection


@section('script_table_ajax')
<script>

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
