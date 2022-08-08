@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-4">
                <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3">
                    <i class="lni lni-plus"></i> Nueva Registro del DTAC
                </button>
            </div>

        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="ficha" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Código</th>
                            <th style="text-align: center;">Acciones</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Dpto</th>
                            <th style="text-align: center;">Provincia</th>
                            <th style="text-align: center;">Distrito</th>
                            <th style="text-align: center;">Comunidad</th>
                            <th style="text-align: center;">Nombre Promotor Salud</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
        
        <form id="FormListaPaciente">
            @csrf
            <div class="modal fade" id="ListaPacienteModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista de  Pacientes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn-sm btn-primary btnCrearPaciente" data-bs-toggle="modal">
                                        <i class="lni lni-circle-plus"></i> Registrar Paciente
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">CÓDIGO DE FICHA:</label>
                                    <input type="text" class="form-control form-control-sm" id="codigo_ficha" readonly>
                                    <input type="text" class="form-control form-control-sm" name="idFicha" id="idFicha" hidden>
                                </div>
                            </div>
                            
                            <br>
                            <div class="table-responsive">
                                <table id="pacientes" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>PacienteId</th>
                                            <th>DNI</th>
                                            <th>Acciones</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>Gestante</th>
                                            <th>Etnia</th>
                                            <th>I.Síntomas</th>
                                            <th>L.P.Infección</th>
                                            <th>N/R</th>
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

        <form id="formGuardaPaciente">
            @csrf
            <div class="modal fade" id="AgregaPacienteModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Agregar Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="col-lg-3">
                                <label for="" class="form-label">Id Ficha</label>
                                <input type="text" class="form-control" name="idFichaPaciente" id="idFichaPaciente" value="0" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">DNI</label>
                                    <input type="number" class="form-control" name="dni_paciente" id="dni_paciente">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_paciente" id="nombre_paciente" required>
                                </div>
                                <div class="col-lg-5">
                                    <label for="form" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellido_paciente" id="apellido_paciente" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Edad</label>
                                    <input type="number" step="0.01" class="form-control" name="edad_paciente" id="edad_paciente" required>
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Género</label>
                                    <select name="genero" id="genero" class="form-select">
                                        <option value="H">HOMBRE</option>
                                        <option value="M">MUJER</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Gestante</label>
                                    <select name="gestante" id="gestante" class="form-select">
                                        <option value="0">NO</option>
                                        <option value="1">SI</option>
                                    </select>    
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Etnia</label>
                                    <select name="etnia" id="etnia" class="single-select">
                                        @foreach ($etnia as $e)
                                            <option value="{{$e->Descripcion_Etnia}}">{{$e->Descripcion_Etnia}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Inicio Síntomas</label>
                                    <input type="date" class="form-control" name="inicio_sintomas" id="inicio_sintomas">
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Lugar Prob. de Infec.</label>
                                    <input type="text" class="form-control" name="lugar_infeccion" id="lugar_infeccion">
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Nuevo Repetidor</label>
                                    <select name="nuevo_repetidor" id="nuevo_repetidor" class="form-select">
                                        <option value="N">NUEVO</option>
                                        <option value="R">REPETIDOR</option>
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

        <form id="formEditaPaciente">
            @csrf
            <div class="modal fade" id="EditaPacienteModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="" class="form-label">Id Paciente</label>
                                    <input type="text" class="form-control" name="EditidPaciente" id="EditidPaciente" value="0" readonly>
                                </div>
                                <div class="col-lg-3">
                                    <label for="" class="form-label">Id Ficha</label>
                                    <input type="text" class="form-control" name="EditidFichaPaciente" id="EditidFichaPaciente" value="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">DNI</label>
                                    <input type="number" class="form-control" name="Editdni_paciente" id="Editdni_paciente" >
                                </div>
                                <div class="col-lg-4">
                                    <label for="form" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="Editnombre_paciente" id="Editnombre_paciente" required>
                                </div>
                                <div class="col-lg-5">
                                    <label for="form" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="Editapellido_paciente" id="Editapellido_paciente" required>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Edad</label>
                                    <input type="number" step="0.01" class="form-control" name="Editedad_paciente" id="Editedad_paciente" required>
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Género</label>
                                    <select name="Editgenero" id="Editgenero" class="form-select">
                                        <option value="H">HOMBRE</option>
                                        <option value="M">MUJER</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Gestante</label>
                                    <select name="Editgestante" id="Editgestante" class="form-select">
                                        <option value="0">NO</option>
                                        <option value="1">SI</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="form" class="form-label">Etnia</label>
                                    <select name="etniae" id="etniae" class="single-select">
                                        @foreach ($etnia as $e)
                                            <option value="{{$e->Descripcion_Etnia}}">{{$e->Descripcion_Etnia}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="form" class="form-label">Inicio Síntomas</label>
                                        <input type="date" class="form-control" name="Editinicio_sintomas" id="Editinicio_sintomas">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="form" class="form-label">Lugar Prob. de Infec.</label>
                                        <input type="text" class="form-control" name="Editlugar_infeccion" id="Editlugar_infeccion">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="form" class="form-label">Nuevo Repetidor</label>
                                        <select name="Editnuevo_repetidor" id="Editnuevo_repetidor" class="form-select">
                                            <option value="N">NUEVO</option>
                                            <option value="R">REPETIDOR</option>
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




        <form id="FormActualiza">
            @csrf
            <div class="modal fade" id="exampleSmallModal1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Registro Diagnóstico y Tratamiento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="idform" id="idform" hidden>
                            <div class="row">
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Código</label>
                                    <input type="text" class="form form-control" name="codigoe" id="codigoe" readonly>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="single-select" name="departamentoe" id="departamentoe" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                        @endforeach
                                    </select>    
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select name="provinciae" id="provinciae" class="single-select" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select name="distritoe" id="distritoe" class="single-select" onchange="ObtieneRegiones('distritoe');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                        @endforeach
                                    </select>        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fechae" id="fechae">
                                </div>
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Comunidad</label>
                                    <input type="text" class="form-control form-control-sm" name="comunidade" id="comunidade">
                                </div>
                                <div class="col-xl-4">
                                    <label for="form" class="form-label">Nombre del Promotor</label>
                                    <input type="text" class="form-control form-control-sm" name="tcse" id="tcse">
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

        <form id="formListaResultados">
            <div class="modal fade" id="ListaResultadosModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista de Resultados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn-sm btn-primary btnCrearResultado" data-bs-toggle="modal">
                                        <i class="lni lni-circle-plus"></i>Agregar Resultado
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="resultado_nombre_paciente" readonly>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="ListaResultados" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>NombrePrueba</th>
                                                <th>FechaToma</th>
                                                <th>Resultado</th>
                                                <th>FechaResultado</th>
                                                <th>Acciones</th>
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

        <form id="formActualizarResultado">
            @csrf
            <div class="modal fade" id="ActualizarResultadoModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Resultados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Id Resultado</label>
                                    <input type="text" class="form-control form-control-sm" name="idResultado" id="idResultado" readonly>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Nombre de Prueba</label>
                                    <select class="form-select form-select-sm" name="editnombre_prueba" id="editnombre_prueba">
                                        <option value="PR-GG">PRUEBA RAPIDA GG</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha Toma Muestra</label>
                                    <input type="date" class="form-control" name="editFechaToma" id="editFechaToma" value="1900-01-01">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Resultado Prueba</label>
                                    <select class="form-select form-select-sm" name="editresultado" id="editresultado">
                                        <option value="NEG-GG">NEGATIVO GG</option>
                                        <option value="POS-GG">POSITIVO GG</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha Resultado</label>
                                    <input type="date" class="form-control form-control-sm" name="editFechaResultado" id="editFechaResultado" value="1900-01-01">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar Resultado</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="formCreaResultado">
            @csrf
            <div class="modal fade" id="CrearResultadosModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Registrar Resultados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Id Paciente</label>
                                    <input type="text" class="form-control" name="idResultadoPaciente" id="idResultadoPaciente" readonly>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Nombre de Prueba</label>
                                    <select class="form-select" name="nombre_prueba" id="nombre_prueba">
                                        <option value="PR-GG">PRUEBA RAPIDA GG</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha Toma Muestra</label>
                                    <input type="date" class="form-control" name="FechaToma" id="FechaToma" value="1900-01-01">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Resultado Prueba</label>
                                    <select class="form-select" name="resultado" id="resultado">
                                        <option value="NEG-GG">NEGATIVO GG</option>
                                        <option value="POS-GG">POSITIVO GG</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha Resultado</label>
                                    <input type="date" class="form-control" name="FechaResultado" id="FechaResultado" value="1900-01-01">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar Resultado</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form  id="formGuardaRegistroDT">
            @csrf
            <div class="modal fade" id="exampleSmallModal3" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Registro Diagnóstico Tratamiento de Malalria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha">
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="single-select" name="DepartamentoId" id ="Departamento" disabled>
                                        @foreach ($dpto as $item)
                                            @if ($item->nombre_dpto=="LORETO")
                                                <option value="{{$item->id}}" selected>{{$item->nombre_dpto}}</option>        
                                            @else
                                                <option value="{{$item->id}}">{{$item->nombre_dpto}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select class="single-select" name="ProvinciaId" id ="Provincia" disabled>
                                        @foreach ($prov as $item)
                                            @if ($item->nombre_prov=="MAYNAS")
                                                <option value="{{$item->id}}" selected>{{$item->nombre_prov}}</option>    
                                            @else
                                                <option value="{{$item->id}}">{{$item->nombre_prov}}</option>    
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select class="single-select" name="DistritoId" id ="Distrito" onchange="ObtieneRegiones('Distrito');">
                                        @foreach ($dist as $item)
                                            @if ($item->nombre_dist=="IQUITOS")
                                            <option value="{{$item->id}}" selected>{{$item->codigo}}-{{$item->nombre_dist}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->codigo}}-{{$item->nombre_dist}}</option>    
                                            @endif    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label">Comunidad</label>
                                    <input type="text" class="form-control" name="Comunidad" id="Comunidad">
                                </div>
                                <div class="col-6">
                                    <label for="form" class="form-label">Nombre del Promotor</label>
                                    <input type="text" class="form-control" name="tcsId" id ="tcsId">
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
        


        <form id="formListaMedicamentos">
            <div class="modal fade" id="ListaMedicamentosModal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Lista de Medicamentos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button" class="btn-sm btn-primary btnCrearMedicamento" data-bs-toggle="modal">
                                        <i class="lni lni-circle-plus"></i>Agregar Med. Recibido
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Nombre Paciente</label>
                                    <input type="text" class="form-control" id="medicamento_nombre_paciente" readonly>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table id="ListaMedicamentos" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Med.Recibido</th>
                                                <th>Fecha</th>
                                                <th>Dosis</th>
                                                <th>C/I</th>
                                                <th>Control</th>
                                                <th>Acciones</th>
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

        <form id="formCreaMedicamentos">
            @csrf
            <div class="modal fade" id="CrearMedicamentosModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Registrar Medicamentos Recibidos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Id Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="idMedicamentoPaciente" id="idMedicamentoPaciente" readonly>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Medicamento Recibido</label>
                                    <input type="text" class="form-control form-control-sm" name="Medicamento" id="Medicamento" >
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="Fecha" id="Fecha" value="1900-01-01">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Dosis</label>
                                    <select class="form-select form-select-sm" name="dosis" id="dosis">
                                        <option value="1°D">1° Dia</option>
                                        <option value="2°D">2° Dia</option>
                                        <option value="3°D">3° Dia</option>
                                        <option value="4°D">4° Dia</option>
                                        <option value="5°D">5° Dia</option>
                                        <option value="6°D">6° Dia</option>
                                        <option value="7°D">7° Dia</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Completo/Incompleto(C/I)</label>
                                    <select class="form-select form-select-sm" name="comp_incom" id="comp_incom">
                                        <option value="C">COMPLETO</option>
                                        <option value="I">INCOMPLETO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Control</label>
                                    <select class="form-select form-select-sm" name="control" id="control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar Resultado</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="formActualizaMedicamentos">
            @csrf
            <div class="modal fade" id="ActualizaMedicamentosModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Editar Medicamentos Recibidos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">Id Medicamento</label>
                                    <input type="text" class="form-control form-control-sm" name="idMedicamento" id="idMedicamento" readonly>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Medicamento Recibido</label>
                                    <input type="text" class="form-control form-control-sm" name="editMedicamento" id="editMedicamento" >
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="editFecha" id="editFecha" value="1900-01-01">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Dosis</label>
                                    <select class="form-select form-select-sm" name="editdosis" id="editdosis">
                                        <option value="1°D">1° Dia</option>
                                        <option value="2°D">2° Dia</option>
                                        <option value="3°D">3° Dia</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Completo/Incompleto(C/I)</label>
                                    <select class="form-select form-select-sm" name="editcomp_incom" id="editcomp_incom">
                                        <option value="C">COMPLETO</option>
                                        <option value="I">INCOMPLETO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Control</label>
                                    <select class="form-select form-select-sm" name="editcontrol" id="editcontrol">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn-sm btn-warning">Guardar Medicamento</button>
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
        $("#formActualizaMedicamentos").submit(function (e) { 
            e.preventDefault();
            var serializedData = $("#formActualizaMedicamentos").serialize();
            $.ajax({
                url: "ActualizaMedicamento",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaMedicamentos').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#ActualizaMedicamentosModal').modal('hide');
        });

        $(document).on("click",".btnEditarMedicamento",function (e) {
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarMedicamento/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idMedicamento").val(response[0].id);
                    $("#editMedicamento").val(response[0].medicamento_recibido).change();
                    $("#editFecha").val(response[0].fecha);
                    $("#editdosis").val(response[0].dosis).change();
                    $("#editcomp_incom").val(response[0].comp_incom);
                    $("#editcontrol").val(response[0].control);
                }
            });
            $('#ActualizaMedicamentosModal').modal('show');
        });

        $("#formCreaMedicamentos").submit(function (e) { 
            e.preventDefault();
            var serializedData = $("#formCreaMedicamentos").serialize();
            $.ajax({
                url: "GuardarMedicamentos",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                        $('#ListaMedicamentos').DataTable().ajax.reload();
                        $('#Medicamento').val("");
                        round_success_noti("round_success_noti");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#CrearMedicamentosModal').modal('hide');
        });

        $(document).on("click",".btnCrearMedicamento",function () { 
            $("#CrearMedicamentosModal").modal('show');
        });
        $(document).on("click",".btnListarMedicamentos",function(e) { 
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idMedicamentoPaciente").val(id);//pone el id de una vez en el input de medicamentos para guardar
            $("#ListaMedicamentos").DataTable({
                "destroy":true,
                "ajax": "ListarMedicamentos/"+id,
                "method":'GET',
                "columns":[
                    {data:"id"},
                    {data:"medicamento_recibido"},
                    {data:"fecha"},
                    {data:"dosis"},
                    {data:"comp_incom"},
                    {data:"control"},
                    {"defaultContent":
                    "<button class='btn-warning btn-sm btnEditarMedicamento'><i class='lni lni-pencil'></i></button>"
                    }       
                ],
                order:[0]
            });
            $("#medicamento_nombre_paciente").val(fila.find('td:eq(3)').text()+" "+fila.find('td:eq(4)').text());
            $("#ListaMedicamentosModal").modal('show');
        });

        $("#formActualizarResultado").submit(function (e) { 
            e.preventDefault();
            var serializedData = $("#formActualizarResultado").serialize();
            $.ajax({
                url: "ActualizaResultado",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaResultados').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#ActualizarResultadoModal').modal('hide');
         });

        
         $("#formCreaResultado").submit(function (e) {
            e.preventDefault();
            var serializedData = $("#formCreaResultado").serialize();
            $.ajax({
                url: "GuardarResultados",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaResultados').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#CrearResultadosModal').modal('hide');
        });      

        $(document).on("click",".btnCrearResultado",function(e){
            $("#CrearResultadosModal").modal('show');
        });

        $(document).on("click",".btnEditarResultado",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarResultado/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idResultado").val(response[0].id);
                    $("#editnombre_prueba").val(response[0].nombre_prueba).change();
                    $("#editFechaToma").val(response[0].fecha_toma);
                    $("#editresultado").val(response[0].resultado).change();
                    $("#editFechaResultado").val(response[0].fecha_resultado);
                }
            });
            $('#ActualizarResultadoModal').modal('show');
        });

        $(document).on("click",".btnListarResultados",function(e){    
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            $("#idResultadoPaciente").val(id);//pone el id de una vez en el input de resultados para guardar
            $("#ListaResultados").DataTable({
                "destroy":true,
                "ajax": "ListarResultados/"+id,
                "method":'GET',
                "columns":[
                    {data:"id"},
                    {data:"nombre_prueba"},
                    {data:"fecha_toma"},
                    {data:"resultado"},
                    {data:"fecha_resultado"},
                    {"defaultContent":
                    "<button class='btn-warning btn-sm btnEditarResultado'><i class='lni lni-pencil'></i></button>"
                    }       
                ],
                order:[0]
            });
            $("#resultado_nombre_paciente").val(fila.find('td:eq(3)').text()+" "+fila.find('td:eq(4)').text());
            $("#ListaResultadosModal").modal('show');
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
                            $("#departamentoe").val(item.dptoId).change();
                            $("#provinciae").val(item.provId).change();
                            return false;
                        }
                    });
                }
            });
        }

        $(document).on("click",".btnListaPaciente",function(){
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            codigo_ficha=fila.find('td:eq(1)').text();
            // $("#idFicha").val(id);
            $("#codigo_ficha").val(codigo_ficha);
            $("#idFichaPaciente").val(id);
            $("#pacientes").DataTable({
                "destroy":true,
                "ajax": "ListarPacientesdtacs/"+id,
                "method":'GET',
                "columns":[
                    {data:"PacienteId"},
                    {data:"dni"},
                    {"defaultContent":
                     "<button class='btn-warning btn-sm btnEditarPaciente'><i class='lni lni-pencil-alt'></i></button>\
                     <button class='btn-info btn-sm btnListarResultados'><i class='fadeIn animated bx bx-test-tube'></i></button>\
                     <button class='btn-danger btn-sm btnListarMedicamentos'><i class='lni lni-first-aid'></i></button>"},
                    {data:"nombres"},
                    {data:"apellidos"},
                    {data:"edad"},
                    {data:"sexo"},
                    {data:"gestante"},
                    {data:"etnia"},
                    {data:"inicio_sintomas"},
                    {data:"lugar_probable_infeccion"},
                    {data:"nuevo_repetidor"}
                ],
                order:[0],
            });
            $("#ListaPacienteModal").modal('show');
         });

        
        
         $(document).on("click",".btnCrearPaciente",function () {
            // $("#idFichaPaciente").val($("#idFicha").val(););
            $("#AgregaPacienteModal").modal('show');
        });
        
        //Editar Paciente
        $(document).on("click",".btnEditarPaciente",function (e) { 
            e.preventDefault();
            fila=$(this).closest("tr");
            dtac_id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarformPacientedtac/" + dtac_id,
                // data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#EditidPaciente").val(response[0].IdPaciente);
                    $("#EditidFichaPaciente").val(response[0].idFichaPaciente);
                    $("#Editdni_paciente").val(response[0].dni);
                    $("#Editnombre_paciente").val(response[0].nombres);
                    $("#Editapellido_paciente").val(response[0].apellidos);
                    $("#Editedad_paciente").val(response[0].edad);
                    $("#Editgenero").val(response[0].sexo).change();
                    $("#Editgestante").val(response[0].gestante).change();
                    $("#etniae").val(response[0].etnia).change();
                    $("#Editinicio_sintomas").val(response[0].inicio_sintomas);
                    $("#Editlugar_infeccion").val(response[0].lugar_probable_infeccion);
                    $("#Editnuevo_repetidor").val(response[0].nuevo_repetidor).change();
                }
            });
            $('#EditaPacienteModal').modal('show');
        });
        //Cierra Editar Paciente
        $(document).on("click",".btnEditar",function() {
            // var serializedData = $("#Editar").serialize();
            fila=$(this).closest("tr");
            dtac_id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            
            $.ajax({
                type: "GET",
                url: "Editarformdtac/" + dtac_id,
                // data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#idform").val(response[0].dtacsId);
                    $("#codigoe").val(response[0].Codigo);
                    $("#departamentoe").val(response[0].dptoId).change();
                    $("#provinciae").val(response[0].provId).change();
                    $("#distritoe").val(response[0].distId).change();
                    $("#comunidade").val(response[0].comunidad);
                    $("#fechae").val(response[0].Fecha);
                    $("#tcse").val(response[0].tcsId);
                    
                }
            });
            $('#exampleSmallModal1').modal('show');
        });

        $("#formEditaPaciente").submit(function (e) {
            e.preventDefault();
            var serializedData = $("#formEditaPaciente").serialize();
            $.ajax({
                url: "{{ route('Actualizar.Pacienteformdtac') }}",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#pacientes').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#EditaPacienteModal').modal('hide');
        })

        $("#formGuardaPaciente").submit(function(e) { 
            e.preventDefault();
            var serializedData = $("#formGuardaPaciente").serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('RegistraPaciente.formdtac') }}",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#pacientes").DataTable().ajax.reload();    
                    $('#dni_paciente').val("");
                    $('#nombre_paciente').val("");
                    $('#apellido_paciente').val("");
                    $('#edad_paciente').val("");
                    $('#lugar_infeccion').val("");
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });

            $('#AgregaPacienteModal').modal('hide');
        })

        $("#FormActualiza").submit(function (e) {
            e.preventDefault();
            $("#departamentoe").prop('disabled', false);
            $("#provinciae").prop('disabled', false);
            var serializedData = $("#FormActualiza").serialize();
            $.ajax({
                url: "{{ route('Actualizar.formdtac') }}",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ficha').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#departamentoe").prop('disabled', true);
            $("#provinciae").prop('disabled', true);
            $('#exampleSmallModal1').modal('hide');
        })

        $("#formGuardaRegistroDT").submit(function (e) {
            e.preventDefault();
            $("#Departamento").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formGuardaRegistroDT").serialize();
            $.ajax({
                url: "Guardaformdtac",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ficha').DataTable().ajax.reload();
                    // alert("Registro Guardado Código de Ficha Generado: "+response);
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#Departamento").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
            $('#exampleSmallModal3').modal('hide');
        })
    </script>

@endsection

{{-- @section('script_table')   
 <script></script>
@endsection --}}

@section('script_table_ajax')
    <script>
        $("#ficha").DataTable({
            "ajax": "ListaJsonDtac",
            "method":'GET',
            "columns":[
                {data:"dtacsId"},
                {data:"Codigo"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditar'><i class='lni lni-pencil'></i></button>\
                <button class='btn-success btn-sm btnListaPaciente'><i class='lni lni-user'></i></button>"
                },
                {data:"Fecha"},
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Comunidad"},
                {data:"tcsId"}         
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
    document.getElementById("fecha").value = fecha.toJSON().slice(0,10);
    document.getElementById("inicio_sintomas").value = fecha.toJSON().slice(0,10);
    
</script>
@endsection




