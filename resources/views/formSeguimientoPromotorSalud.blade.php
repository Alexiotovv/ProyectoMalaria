@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            @if(session('message'))
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2" style="height: 55px;">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3" style="margin-top: -13px;">
                            <h6 class="mb-0 text-white">Guardado Correctamente </h6>
                            <div class="text-white">No olvides anotar el código <strong style="font-color:black;">{{ session('message') }}</strong> en la ficha !</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <button type="button" href="" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal1">
                <i class="lni lni-plus"></i> Nuevo Seguimiento del Agente Comunitario de Salud
            </button>

        </div>
        <br>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered embed-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Id</th>
                                    <th style="text-align: center;">Codigo</th>
                                    <th style="text-align: center;">Acciones</th>
                                    <th style="text-align: center;">Compete.</th>
                                    <th style="width:20px;">StockMed.</th>
                                    <th style="width: 30%;text-align: center;">Departamento</th>
                                    <th style="text-align: center;">Provincia</th>
                                    <th style="text-align: center;">Distrito</th>
                                    <th style="text-align: center;">Localidad</th>
                                    <th style="text-align: center;">Est.S.Cercano</th>
                                    <th style="text-align: center;">T.EESSaLocalidad</th>
                                    <th style="text-align: center;">T.LocalidadEESS</th>
                                    <th style="text-align: center;">N°Visita</th>
                                    <th style="text-align: center;">TransporteMasUsado</th>
                                    <th style="text-align: center;">FechaVisita</th>
                                    <th style="text-align: center;">DNI_ACS</th>
                                    <th style="text-align: center;">CódigoACS</th>
                                    <th style="text-align: center;">NombreTS</th>
                                    <th style="text-align: center;">CódigoHIS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lista as $item)
                                    <tr>
                                        <td>{{$item->idform}}</td>
                                        <td>{{$item->Codigo}}</td>
                                        <td><button class='btn-sm btn-warning btnEditarSegu'><i class='lni lni-pencil'></i></button></td>
                                        <td>
                                            <a class="btn-sm btn-success" href="{{url('Crearformps2',[$item->idform])}}">
                                                <i class="lni lni-circle-plus"></i>
                                            </a>
                                            <button class='btn-info btn-sm btnListarCompetencias'><i class='lni lni-eye'></i></button>
                                        </td>
                                        <td>
                                            <a class="btn-sm btn-success" href="{{url('Crearformps2stock',[$item->idform])}}">
                                                <i class="lni lni-circle-plus"></i>
                                            </a>
                                                <button class='btn-info btn-sm btnListarStockMed'><i class='lni lni-eye'></i></button>
                                        </td>

                                        <td>{{$item->nombre_dpto}}</td>
                                        <td>{{$item->nombre_prov}}</td>
                                        <td>{{$item->nombre_dist}}</td>
                                        <td>{{$item->Localidad}}</td>
                                        <td>{{$item->nombre_estsalud}}</td>
                                        <td>{{$item->TiempoEesLocalidad}}</td>
                                        <td>{{$item->TiempoLocalidadEess}}</td>
                                        <td>{{$item->NumeroVisita}}</td>
                                        <td>{{$item->nombre_medio}}</td>
                                        <td>{{$item->FechaVisita1}}</td>
                                        <td>{{$item->NombreTcsVisita1}}</td>
                                        <td>{{$item->CodigoTcsVisita1}}</td>
                                        <td>{{$item->NombreTsVisita1}}</td>
                                        <td>{{$item->CodigoHisTsVisita1}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        
        </div>
       

        <div class="modal fade" id="ListaStockMedicamentosModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Lista de Stock de Medicamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="ListaStockMedicamentos" class="table table-striped table-bordered embed-responsive">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Id</th>
                                                <th style="text-align: center;">Acción</th>
                                                <th style="text-align: center;">Medicamento/Ins.</th>
                                                <th style="text-align: center;">Stock</th>
                                                <th style="text-align: center;">Fecha</th>
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

        </div>

        <form id="formEditarStockMedicamentos">
            @csrf
            <div class="modal fade" id="EditarStockMedicamentosModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Stock de Medicamento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="" class="form-label">Id</label>
                                    <input type="text" class="form-control form-control-sm" name="idStock" id="idStock" readonly>
                                </div>
                                <div class="col-xl-8">
                                    <label for="" class="form-label">NombreMedicamento</label>
                                    <input type="text" class="form-control form-control-sm" name="NombreMedicamento" id="NombreMedicamento" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-4">
                                    
                                    <label for="" class="form-label">Stock</label>
                                    <input type="number" name="stock1e" id="stock1e" class="form-control form-control-sm">

                                    <label for="" class="form-label">Fecha</label>
                                    <input type="date" name="fecha1e" id="fecha1e" class="form-control form-control-sm">
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

        <div class="modal fade" id="ListaCompetenciasModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Lista de Competencias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="ListaCompetencias" class="table table-striped table-bordered embed-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Id</th>
                                                    <th style="text-align: center;">Acción</th>
                                                    <th style="text-align: center;">Competencia</th>
                                                    <th style="text-align: center;">Visita1</th>
                                                    <th style="text-align: center;">Observación1</th>
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
        
        <form id="formEditarCompetencia">
            @csrf
            <div class="modal fade" id="EditarCompetenciaModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Competencia de Seguimiento al ACS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="" class="form-label">Id</label>
                                    <input type="text" class="form-control" name="idCompe" id="idCompe" readonly>
                                </div>
                                <div class="col-xl-8">
                                    <label for="" class="form-label">NombreCompetencia</label>
                                    <input type="text" class="form-control" name="NombreCompe" id="NombreCompe" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Visita</label>
                                    <select class="form-select form-select-sm mb-3" name="visita1e" id="visita1e">
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Obs</label>
                                    <textarea name="obs1e" id="obs1e" class="form-control"></textarea>
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
        
        <form  id="formEditarformps" action="{{route('Actualizar.FormSeg')}}" method="POST">
            @csrf
            <div class="modal fade" id="EditarformpsModal" >
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">EditarSeguimiento del ACS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-1">
                                    <label for="" class="form-label">Id</label>
                                    <input type="text" class="form-control" name="idFormSeg" id="idFormSeg" readonly>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Localidad</label>
                                    <input type="text" value="--" class="form-control" name="Localidade" id="Localidade">
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label" >Departamento</label>
                                    <select class="single-select" name="Departamentoe" id="Departamentoe" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select class="single-select" name="Provinciae" id="Provinciae" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select class="single-select" name="Distritoe" id="Distritoe" onchange="ObtieneRegiones('Distritoe');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Est. Salud Cercano</label>
                                    <select name="EstSalude" id="EstSalude" class="single-select" >
                                        @foreach ($ests as $e)
                                            <option value="{{$e->id}}">{{$e->cod}}-{{$e->nombre_estsalud}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Tiempo EESS a Localidad</label>
                                    <input type="number" value="0" step="0.01" class="form-control" name="TiempoEESSLocalidade" id="TiempoEESSLocalidade">
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Tiempo Localidad a EESS</label>
                                    <input type="number" value="0" step="0.01" class="form-control" name="TiempoLocalidadEESSe" id="TiempoLocalidadEESSe">
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">M. Transporte mas Usado</label>
                                    <select class="single-select" name="Transportee" id="Transportee">
                                        @foreach ($medios_transportes as $mt)
                                            <option value="{{$mt->id}}">{{$mt->nombre_medio}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Fecha de Visita </label>
                                    <input type="date" class="form-control" name="FechaVisita1e" id="FechaVisita1e">
                                </div>
                                <div class="col-xl-5">
                                    <label class="form-label">Nombre del ACS</label>
                                    <div class="input-group">
                                        <select class="single-select " name="NombreTCS1e" id="NombreTCS1e">
                                            @foreach ($tcs as $tc)
                                                <option value="{{$tc->dni_tcs}}">{{$tc->dni_tcs}}-{{$tc->nombre_tcs}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary btnAgregarACS" type="button"><i class='bx bx-user-plus'></i>
                                        </button>
                                    </div>  
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Código del ACS </label>
                                    <input type="text" class="form-control" name="CodigoTCS1e" id="CodigoTCS1e">
                                </div>
                            </div>
                                    
                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Nombre del TS </label>
                                    <input type="text" class="form-control" name="NombreTS1e" id="NombreTS1e">
                                </div>
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Código HIS del TS </label>
                                    <input type="text" class="form-control" name="CodigoHISTS1e" id="CodigoHISTS1e">
                                </div>
                                <div class="col-xl-4">
                                    <label for="" class="form-label">Número de Visita</label>
                                    <select class="form-select form-select-sm mb-3" name="NumeroVisitae" id="NumeroVisitae">
                                        <option value="1">1° Visita</option>
                                        <option value="2">2° Visita</option>
                                        <option value="3">3° Visita</option>
                                        <option value="4">4° Visita</option>
                                        <option value="5">5° Visita</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning btnActualizaSegPS">Guardar</button>
                        </div>
                    
                    
                    </div>
                        
                    </div>
                </div>
            </div>
        </form>
      
        <form  id="formCreaSegPS" action="{{route('Crear.formps')}}" method="POST">
                    @csrf
                    <div class="modal fade" id="exampleSmallModal1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crear Seguimiento del ACS</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Localidad</label>
                                            <input type="text" value="--" class="form-control" name="Localidad" id="Localidad">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label" >Departamento</label>
                                            <select class="single-select" name="Departamento" id="Departamento" disabled>
                                                @foreach ($dpto as $d)
                                                    <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Provincia</label>
                                            <select class="single-select" name="Provincia" id="Provincia" disabled>
                                                @foreach ($prov as $p)
                                                    <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="form" class="form-label">Distrito</label>
                                            <select class="single-select" name="Distrito" id="Distrito" onchange="ObtieneRegiones('Distrito');">
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
                                            <input type="number" value="0" step="0.01" class="form-control" name="TiempoEESSLocalidad" id="TiempoEESSLocalidad">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Tiempo Localidad a EESS</label>
                                            <input type="number" value="0" step="0.01" class="form-control" name="TiempoLocalidadEESS" id="TiempoLocalidadEESS">
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
                                            <select class="form-select form-select-sm mb-3" name="NumeroVisita" id="NumeroVisita">
                                                <option value="1">1° Visita</option>
                                                <option value="2">2° Visita</option>
                                                <option value="3">3° Visita</option>
                                                <option value="4">4° Visita</option>
                                                <option value="5">5° Visita</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn-sm btn-warning btnGuardarSegPS">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
        </div>

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
@endsection
@section('script_table_ajax')
    <script>
        $(document).on("click",".btnGuardarACS",function(){
            CargarACS();
        });

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
                            $("#NombreTCS1").empty();
                            $("#NombreTCS1e").empty();
                            $.each(response, function (key, item){
                                if ((item.dni_tcs)==$("#dni_tcs").val()) {
                                    $("#NombreTCS1").append('<option selected value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                    $("#NombreTCS1e").append('<option selected value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                }else{
                                    $("#NombreTCS1").append('<option value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');
                                    $("#NombreTCS1e").append('<option value=' + item.dni_tcs + '>'+item.dni_tcs+"-"+item.nombre_tcs+'</option>');    
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

        $("#formAgregaACS").submit(function(e){
            e.preventDefault(); 
            CargarACS();
        });

        $(document).on("click",".btnAgregarACS",function(){
            $("#formAgregaACSModal").modal('show')
        });
        $(document).on("click",".btnAgregarACSn",function(){
            $("#formAgregaACSModal").modal('show')
        });

        $(document).on("click",".btnActualizaSegPS",function(){
            $("#Departamentoe").prop('disabled', false);
            $("#Provinciae").prop('disabled', false);
        });

        $(document).on("click",".btnGuardarSegPS",function(){
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
        });

        $("#formEditarStockMedicamentos").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formEditarStockMedicamentos").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizarStockMedicamentos",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaStockMedicamentos').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#EditarStockMedicamentosModal").modal('hide');
        });

        $(document).on("click",".btnEditarStockMedicamentos",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());

            $.ajax({
                type: "GET",
                url: "EditarStockMedicamentos/"+id,
                dataType: "json",
                success: function (response) {
                    $("#idStock").val(response[0].id);
                    $("#NombreMedicamento").val(response[0].nombre_competencia);
                    $("#stock1e").val(response[0].unidades1);
                    $("#fecha1e").val(response[0].fecha1);
                }
            });
            $("#EditarStockMedicamentosModal").modal('show');
        });

        $(document).on("click",".btnListarStockMed",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#ListaStockMedicamentos").DataTable({
                "destroy":true,
                "ajax": "ListaStockMedicamentos/"+id,
                "method":'GET',
                "columns":[
                    {data:"id"},
                    {"defaultContent":
                     "<button class='btn-warning btn-sm btnEditarStockMedicamentos'><i class='lni lni-pencil-alt'></i></button>"},
                    {data:"nombre_competencia"},
                    {data:"unidades1"},
                    {data:"fecha1"},
                ],
                order:[0],

            });
            $("#ListaStockMedicamentosModal").modal('show');
        });

        $("#formEditarCompetencia").submit(function(e){
            e.preventDefault();
            var serializedData=$("#formEditarCompetencia").serialize();

            $.ajax({
                type: "POST",
                url: "ActualizarCompetenciasform2",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaCompetencias').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#EditarCompetenciaModal").modal('hide');
        });


        $(document).on("click",".btnEditarCompetencia",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarCompetenciasform2/"+id,
                dataType: "json",
                success: function (response) {
                    $("#idCompe").val(response[0].id);
                    $("#NombreCompe").val(response[0].nombre_competencia);
                    $("#visita1e").val(response[0].visita1).change();
                    $("#obs1e").val(response[0].obs1);
                }
            });
            $("#EditarCompetenciaModal").modal('show');
        });

        $(document).on("click",".btnListarCompetencias",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());

            $("#ListaCompetencias").DataTable({
                "destroy":true,
                "ajax": "ListarCompetencias/"+id,
                "method":'GET',
                "columns":[
                    {data:"id"},
                    {"defaultContent":
                     "<button class='btn-warning btn-sm btnEditarCompetencia'><i class='lni lni-pencil-alt'></i></button>"},
                    {data:"nombre_competencia"},
                    {data:"visita1"},
                    {data:"obs1"},
                ],
                order:[0],
            });

            $('#ListaCompetenciasModal').modal('show');
        });
    </script>
    <script>
        $(document).on("click",".btnEditarSegu",function(){
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            codigo_ficha=fila.find('td:eq(1)').text();
            $.ajax({
                type: "GET",
                url: "EditarFormSeg/"+id,
                dataType: "json",
                success: function (response) {
                    $("#idFormSeg").val(response[0].idform);
                    $("#Localidade").val(response[0].Localidad);
                    $('#Distritoe').val(response[0].distId).change();
                    $('#Provinciae').val(response[0].provId).change();
                    $('#Departamentoe').val(response[0].dptoId).change();
                    $('#EstSalude').val(response[0].esId).change();
                    $('#TiempoEESSLocalidade').val(response[0].TiempoEesLocalidad);
                    $('#TiempoLocalidadEESSe').val(response[0].TiempoLocalidadEess);
                    $('#NumeroVisitae').val(response[0].NumeroVisita).change();
                    $('#Transportee').val(response[0].mtId).change();
                    $('#FechaVisita1e').val(response[0].FechaVisita1);
                    $('#NombreTCS1e').val(response[0].NombreTcsVisita1).change();
                    $('#CodigoTCS1e').val(response[0].CodigoTcsVisita1);
                    $('#NombreTS1e').val(response[0].NombreTsVisita1);
                    $('#CodigoHISTS1e').val(response[0].CodigoHisTsVisita1);
                }
            });
            $("#EditarformpsModal").modal('show');
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
    document.getElementById("FechaVisita1").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaVisita2").value = fecha.toJSON().slice(0,10);
    document.getElementById("FechaVisita3").value = fecha.toJSON().slice(0,10);
</script>
@endsection
