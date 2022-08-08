@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <h6 style="text-align: center">Entrega de Mosquiteros en Hogares</h6>
            <div class="col-sm-4">
                <button type="button" class="btn-sm btn-primary btnRegistroMosquitero" data-bs-toggle="modal">
                    <i class="lni lni-plus"></i> Nuevo Registro
                </button>
                
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="ListaMosquiteros" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Acciones</th>
                            <th>Distrito</th>
                            <th>Provincia</th>
                            <th>Dpto</th>
                            <th>Loc.</th>
                            <th>F.Ent</th>
                            <th>EESS_Cer.</th>
                            <th>T.EESSCer.</th>
                            <th>EESSCerMicros.</th>
                            <th>T.EESSCer.Micros.</th>
                            <th>Resp.</th>
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

<form id="formGuardaMosquitero">
    @csrf
    <div class="modal fade" id="AgregaMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ficha Entrega Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-4">
                                <label for="form" class="form-label">Departamento</label>
                                <select class="single-select" name="departamento" id="departamento" disabled>
                                    @foreach ($dpto as $d)
                                        <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                    @endforeach
                                </select>    
                            </div>
                            <div class="col-4">
                                <label for="form" class="form-label">Provincia</label>
                                <select name="provincia" id="provincia" class="single-select" disabled>
                                    @foreach ($prov as $p)
                                        <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="form" class="form-label">Distrito</label>
                                <select name="distrito" id="distrito" class="single-select" onchange="ObtieneRegiones('distrito');">
                                    @foreach ($dist as $d)
                                        <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                    @endforeach
                                </select>        
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Localidad</label>
                            <input type="text" class="form-control form-control-sm" name="localidad" id="localidad">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">FechaEntrega</label>
                            <input type="date" value="1900-01-01" class="form-control form-control-sm" name="fecha_entrega" id="fecha_entrega">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">EESSCercano</label>
                            <input type="text" class="form-control form-control-sm" name="eess_cercano" id="eess_cercano">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">T.EESSCercano</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" name="tiempo_eesscercano" id="tiempo_eesscercano">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="form" class="form-label">EESS CercanoMicroscopio</label>
                            <input type="text" class="form-control form-control-sm" name="eess_cercano_microscopio" id="eess_cercano_microscopio">
                        </div>
                        <div class="col-lg-4">
                            <label for="form" class="form-label">T.EESSCercanoMicroscopio</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" name="tiempo_eesscercano_microscopio" id="tiempo_eesscercano_microscopio">
                        </div>
                        <div class="col-4">
                            <label for="form" class="form-label">Responsable</label>
                            <input type="text" class="form-control form-control-sm" id="responsable" name="responsable">
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

<form id="formEditarMosquitero">
    @csrf
    <div class="modal fade" id="EditarMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ficha Entrega Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="">Código</label>
                            <input type="text" id="ecodigo" name="ecodigo" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="idMosquitero" id="idMosquitero" hidden>
                            <label for="form" class="form-label">Departamento</label>
                            <select class="single-select" name="edepartamento" id="edepartamento" disabled>
                                @foreach ($dpto as $d)
                                    <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                @endforeach
                            </select>    
                        </div>
                        <div class="col-lg-4">
                            <label for="form" class="form-label">Provincia</label>
                            <select name="eprovincia" id="eprovincia" class="single-select" disabled>
                                @foreach ($prov as $p)
                                    <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="form" class="form-label">Distrito</label>
                            <select name="edistrito" id="edistrito" class="single-select" onchange="ObtieneRegiones('edistrito');">
                                @foreach ($dist as $d)
                                    <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>    
                                @endforeach
                            </select>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Localidad</label>
                            <input type="text" class="form-control form-control-sm" name="elocalidad" id="elocalidad">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">FechaEntrega</label>
                            <input type="date" value="1900-01-01" class="form-control form-control-sm" name="efecha_entrega" id="efecha_entrega">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">EESSCercano</label>
                            <input type="text" class="form-control form-control-sm" name="eeess_cercano" id="eeess_cercano">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">T.EESSCercano</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" name="etiempo_eesscercano" id="etiempo_eesscercano">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="form" class="form-label">EESS CercanoMicroscopio</label>
                            <input type="text" class="form-control form-control-sm" name="eeess_cercano_microscopio" id="eeess_cercano_microscopio">
                        </div>
                        <div class="col-lg-4">
                            <label for="form" class="form-label">T.EESSCercanoMicroscopio</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" name="etiempo_eesscercano_microscopio" id="etiempo_eesscercano_microscopio">
                        </div>
                        <div class="col-4">
                            <label for="form" class="form-label">Responsable</label>
                            <input type="text" class="form-control form-control-sm" name="eresponsable" id="eresponsable">
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

<form id="formListarPersonaMosquitero">
    @csrf
    <div class="modal fade" id="ListarPersonaMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Lista Personas Recibieron Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h6 style="text-align: center">Lista Personas Recibieron Mosquitero</h6>
                        <div class="col-sm-3">
                            <button type="button" class="btn-sm btn-primary btnNuevaPersona" data-bs-toggle="modal">
                                <i class="lni lni-plus"></i> Agregar Persona
                            </button>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Código Ficha</label>
                            <input type="text" class="form-control form-control-sm" id="codigo_ficha" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="ListarPersonaMosquitero" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Acciones</th>
                                        <th>dni</th>
                                        <th>nombres</th>
                                        <th>Apellidos</th>
                                        <th>N°Personas</th>
                                        <th>TamañoMNI.</th>
                                        <th>EstadoMNI.</th>
                                        <th>TamañoMI.</th>
                                        <th>EstadoMI.</th>
                                    </tr>
                                </thead>
                                <tbody>
            
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn-sm btn-warning">Guardar</button>
                </div> --}}
            </div>
        </div>
    </div>
</form>

<form id="formGuardaPersona">
    @csrf
    <div class="modal fade" id="GuardaPersonaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Registrar Persona de Hogar y Censo antes de Entrega</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="text" name="idMosquiteroPersona" id="idMosquiteroPersona" hidden>
                            <label for="form" class="form-label">DNI</label>
                            <input type="number" name="dni" id="dni" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label" name="nombres" id="apellidos">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm">                            
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">N° Personas</label>
                            <input value="0" type="number" class="form-control form-control-sm" name="npersonas" id="npersonas">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <hr>
                            <label for="" class="form-label">Censo Antes de Entrega NO IMPREGNADOS</label>
                            
                            <div class="row">                            
                                <div class="col-lg-6">
                                    <label for="form" class="form-label">cantidad</label>
                                    <select name="tamanomos_noimp" id="tamanomos_noimp" class="form-select form-select-sm">
                                        <option value="--">--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="form" class="form-label">Estado Mosqu.NoImp.</label>
                                    <select name="estadomos_noimp" id="estadomos_noimp" class="form-select form-select-sm">
                                        <option value="--">--</option>
                                        <option value="B">BUEN ESTADO</option>
                                        <option value="M">MAL ESTADO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <hr>
                            <label for="" class="form-label">Censo Antes de Entrega IMPREGNADOS</label>
                            
                            <div class="row">                            
                                <div class="col-lg-6">
                                    <label for="form" class="form-label">Cantidad</label>
                                    <select name="tamanomos_imp" id="tamanomos_imp" class="form-select form-select-sm">
                                        <option value="--">--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="form" class="form-label">Estado Mosqu.Imp.</label>
                                    <select name="estadomos_imp" id="estadomos_imp" class="form-select form-select-sm">
                                        <option value="--">--</option>
                                        <option value="B">BUEN ESTADO</option>
                                        <option value="M">MAL ESTADO</option>
                                    </select>
                                </div>
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

<form id="formEditaPersona">
    @csrf
    <div class="modal fade" id="EditaPersonaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Editar Persona de Hogar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="text" name="idPersona" id="idPersona" hidden>
                            <label for="form" class="form-label">DNI</label>
                            <input type="number" name="edni" id="edni" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Nombres</label>
                            <input type="text" name="enombres" id="enombres" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Apellidos</label>
                            <input type="text" name="eapellidos" id="eapellidos" class="form-control form-control-sm">                            
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">N° Personas</label>
                            <input value="0" type="number" class="form-control form-control-sm" name="enpersonas" id="enpersonas">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Cantidad</label>
                            <select name="etamanomos_noimp" id="etamanomos_noimp" class="form-select form-select-sm">
                                <option value="--">--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Estado Mosqu.NoImp.</label>
                            <select name="eestadomos_noimp" id="eestadomos_noimp" class="form-select form-select-sm">
                                <option value="--">--</option>
                                <option value="B">BUEN ESTADO</option>
                                <option value="M">MAL ESTADO</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Cantidad</label>
                            <select name="etamanomos_imp" id="etamanomos_imp" class="form-select form-select-sm">
                                <option value="--">--</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="form" class="form-label">Estado Mosqu.Imp.</label>
                            <select name="eestadomos_imp" id="eestadomos_imp" class="form-select form-select-sm">
                                <option value="--">--</option>
                                <option value="B">BUEN ESTADO</option>
                                <option value="M">MAL ESTADO</option>
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

<form id="formListarEntregaMosquitero">
    @csrf
    <div class="modal fade" id="ListarEntregaMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Listar Entrega de Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="button" class="btn-sm btn-primary btnNuevaEntregaMosquitero" data-bs-toggle="modal">
                                <i class="lni lni-plus"></i> Agregar Entrega Mosquitero
                            </button>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Pesona de Hogar</label>
                            <input type="text" name="PersonaHogarLista" id="PersonaHogarLista" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="ListarEntregaMosquitero" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Acciones</th>
                                        <th>Doble</th>
                                        <th>Familiar1</th>
                                        <th>Familiar2</th>
                                        <th>PersonasUti.Mosq.</th>
                                        <th>N°Afich.UsoEntre.</th>
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

<form id="formGuardarEntregaMosquitero">
    @csrf
    <div class="modal fade" id="GuardarEntregaMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Registrar Entrega de Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" id="idEntregaPersona" name="idEntregaPersona" hidden>
                                    <label for="">PERSONAL(180x100x150)</label>
                                    <input type="number" name="doble" id="doble"class="form-control form-control-sm" value="0">

                                </div>
                                <div class="col-lg-4">
                                    <label for="">MEDIANO(180x130x150)</label>
                                    <input type="number" name="familiar1" id="familiar1" class="form-control form-control-sm" value="0">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">FAM. GRANDE(180x160x150)</label>
                                    <input type="number" name="familiar2" id="familiar2" class="form-control form-control-sm" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">N°Pers.UtilizaránMosq.</label>
                                    <input type="number" name="nro_personas" id="nro_personas" class="form-control form-control-sm" value="0">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">N° Afiches de uso Entregadas</label>
                                    <input type="number" name="nro_afiches" id="nro_afiches" class="form-control form-control-sm" value="0">
                                </div>
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

<form id="formEditarEntregaMosquitero">
    @csrf
    <div class="modal fade" id="EditarEntregaMosquiteroModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Editar Entrega de Mosquitero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" id="idEntregaPersonae" name="idEntregaPersonae" hidden>
                                    <label for="">PERSONAL(180x100x150)</label>
                                    <input type="number" name="doblee" id="doblee"class="form-control form-control-sm" value="0">

                                </div>
                                <div class="col-lg-4">
                                    <label for="">MEDIANO(180x130x150)</label>
                                    <input type="number" name="familiar1e" id="familiar1e" class="form-control form-control-sm" value="0">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">FAM. GRANDE(180x160x150)</label>
                                    <input type="number" name="familiar2e" id="familiar2e" class="form-control form-control-sm" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">N°Pers.UtilizaránMosq.</label>
                                    <input type="number" name="nro_personase" id="nro_personase" class="form-control form-control-sm" value="0">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">N° Afiches de uso Entregadas</label>
                                    <input type="number" name="nro_afichese" id="nro_afichese" class="form-control form-control-sm" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnActualizarEntregaMosq" class="btn-sm btn-warning">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('script_table')
    <script>

        $("#btnActualizarEntregaMosq").click(function (){
            var serializedData = $("#formEditarEntregaMosquitero").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizaEntregaMosq",
                data: serializedData,
                dataType: "json",
                success: function (response) {    
                    round_success_noti("Registro Actualizado");
                    $('#ListarEntregaMosquitero').DataTable().ajax.reload();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#EditarEntregaMosquiteroModal").modal('hide');
        }); 

        $(document).on("click",".btnEditarEntrega",function(e){
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarEntregaMosq/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idEntregaPersonae").val(response[0].id);
                    $("#doblee").val(response[0].doble);
                    $("#familiar1e").val(response[0].familiar1);
                    $("#familiar2e").val(response[0].familiar2);
                    $("#nro_personase").val(response[0].personas_usaran);
                    $("#nro_afichese").val(response[0].nro_afiches);
                    
                }
            });

            $("#EditarEntregaMosquiteroModal").modal('show');
        })

        $("#formGuardarEntregaMosquitero").submit(function(e){
            e.preventDefault();
            var serializedData = $("#formGuardarEntregaMosquitero").serialize();
            $.ajax({
                url: "GuardarEntregaMosquitero",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $("#doble").val("0");
                    $("#familiar1").val(0);
                    $("#familiar2").val(0);
                    $("#nro_personas").val(0);
                    $("#nro_afiches").val(0);
                    $('#ListarEntregaMosquitero').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#GuardarEntregaMosquiteroModal').modal('hide');
        });

        $(document).on("click",".btnNuevaEntregaMosquitero",function(){ 
            $('#GuardarEntregaMosquiteroModal').modal('show');
            
        });

        $(document).on("click",".btnEntregaMosquitero",function(e){ 
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#idEntregaPersona").val(id);
            $("#PersonaHogarLista").val((fila).find('td:eq(2)').text() +" " + (fila).find('td:eq(3)').text());
            //aqui va el id de editar entrega
            $("#ListarEntregaMosquitero").DataTable({
                "destroy":true,
                "ajax": "ListarEntregaMosquitero/"+id,
                "method":'GET',
                "columns":[
                    {data:"formlistaentregamosqsId"},
                    {"defaultContent":
                    "<button class='btn-warning btn-sm btnEditarEntrega'><i class='lni lni-pencil-alt'></i></button>"},
                    {data:"doble"},
                    {data:"familiar1"},
                    {data:"familiar2"},
                    {data:"personas_usaran"},
                    {data:"nro_afiches"},
                ],
                order:[0],
            });

            $('#ListarEntregaMosquiteroModal').modal('show');
        });

        $("#formEditaPersona").submit(function(e) { 
            e.preventDefault();
            var serializedData = $("#formEditaPersona").serialize();
            $.ajax({
                url: "ActualizaPersonaMosquitero",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                        $("#edni").val("");
                        $("#enombres").val("");
                        $("#eapellidos").val("");
                        $("#npersonas").val(0);
                        $('#ListarPersonaMosquitero').DataTable().ajax.reload();
                        round_success_noti();
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#EditaPersonaModal').modal('hide');
        })

        $(document).on("click",".btnEditarPersona",function(e) {
            e.preventDefault();
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $.ajax({
                type: "GET",
                url: "EditarPersonaMosquitero/" + id,
                dataType: "json",
                success: function (response) {
                    $("#idPersona").val(response[0].id);
                    $("#edni").val(response[0].dni);
                    $("#enombres").val(response[0].nombres);
                    $("#eapellidos").val(response[0].apellidos);
                    $("#enpersonas").val(response[0].numero_personas);
                    $("#etamanomos_noimp").val(response[0].mq_noimpregnados_tamano).change();
                    $("#eestadomos_noimp").val(response[0].mq_noimpregnados_estado).change();
                    $("#etamanomos_imp").val(response[0].mq_impregnados_tamano).change();
                    $("#eestadomos_imp").val(response[0].mq_impregnados_estado).change();
                }
            });
            $('#EditaPersonaModal').modal('show');
        });

        $("#formGuardaPersona").submit(function(e) { 
            e.preventDefault();
            var serializedData = $("#formGuardaPersona").serialize();
            $.ajax({
                url: "GuardaPersonaMosquitero",
                type: "POST",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListarPersonaMosquitero').DataTable().ajax.reload();
                    $("#dni").val("");
                    $("#nombres").val("");
                    $("#apellidos").val("");
                    $("#personas").val(0);

                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $('#GuardaPersonaModal').modal('hide');
        });

        $(document).on("click",".btnNuevaPersona",function() { 
            $('#GuardaPersonaModal').modal('show');
        });

        $(document).on("click",".btnListaPersonaMosquitero",function() {
            fila=$(this).closest("tr");
            id=parseInt(fila.find('td:eq(0)').text());
            codigo_ficha=fila.find('td:eq(1)').text();
            $("#codigo_ficha").val(codigo_ficha);
            $("#idMosquiteroPersona").val(id);
            $("#ListarPersonaMosquitero").DataTable({
                "destroy":true,
                "ajax": "ListarPersonaMosquitero/"+id,
                "method":'GET',
                "columns":[
                    {data:"formpersonamqsId"},
                    {"defaultContent":
                     "<button class='btn-warning btn-sm btnEditarPersona'><i class='lni lni-pencil-alt'></i></button>\
                     <button class='btn-success btn-sm btnEntregaMosquitero'><i class='lni lni-grid'></i></button>"},
                     {data:"dni"},
                     {data:"nombres"},
                    {data:"apellidos"},
                    {data:"numero_personas"},
                    {data:"mq_noimpregnados_tamano"},
                    {data:"mq_noimpregnados_estado"},
                    {data:"mq_impregnados_tamano"},
                    {data:"mq_impregnados_estado"}
                ],
                order:[0],
            });
            $('#ListarPersonaMosquiteroModal').modal('show');
        });

        $("#formEditarMosquitero").submit(function(e) { 
            e.preventDefault();
            $("#edepartamento").prop('disabled', false);
            $("#eprovincia").prop('disabled', false);
            var serializedData = $("#formEditarMosquitero").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizarMosquiteros",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaMosquiteros').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#edepartamento").prop('disabled', true);
            $("#eprovincia").prop('disabled', true);
            $('#EditarMosquiteroModal').modal('hide');
         });

        $(document).on("click",".btnEditarMosquitero", function() { 
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());//capturo el Id seleccionado
            $.ajax({
                type: "GET",
                url: "EditarMosquiteros/"+id,
                dataType: "json",
                success: function (response) {
                    $("#idMosquitero").val(response[0].mosquiteroId);
                    $("#ecodigo").val(response[0].Codigo);
                    $("#edepartamento").val(response[0].dptoId).change();
                    $("#eprovincia").val(response[0].provId).change();
                    $("#edistrito").val(response[0].distId).change();
                    $("#elocalidad").val(response[0].Localidad);
                    $("#efecha_entrega").val(response[0].fecha_entrega);
                    $("#eeess_cercano").val(response[0].eess_cercano);
                    $("#etiempo_eesscercano").val(response[0].tiempo_eesscercano);
                    $("#eeess_cercano_microscopio").val(response[0].eess_cercano_microscopio);
                    $("#etiempo_eesscercano_microscopio").val(response[0].tiempo_eesscercano_microscopio);
                    $("#eresponsable").val(response[0].Responsable);
                }
            });
            $("#EditarMosquiteroModal").modal('show');
        });

        $(document).on("click",".btnRegistroMosquitero",function() { 
            $("#AgregaMosquiteroModal").modal('show');
        });

        $("#formGuardaMosquitero").submit(function(e) { 
            e.preventDefault();
            $("#departamento").prop('disabled', false);
            $("#provincia").prop('disabled', false);
            var serializedData = $("#formGuardaMosquitero").serialize();
            $.ajax({
                type: "POST",
                url: "GuardarMosquiteros",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaMosquiteros').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) {
                    round_error_noti()
                }
            });
            $("#departamento").prop('disabled', true);
            $("#provincia").prop('disabled', true);
            $('#AgregaMosquiteroModal').modal('hide');
         });

         function ObtieneRegiones(dist) { 
            $.ajax({
                url:"ListarRegiones/" + $("#"+dist+"").val(),
                method:"GET",
                dataType:"json",
                success: function (response) {
                    $.each(response.lista_regiones, function (key, item) { 
                        if ((item.distId)==($("#"+dist+"").val())) {
                            $("#departamento").val(item.dptoId).change();
                            $("#provincia").val(item.provId).change();
                            $("#edepartamento").val(item.dptoId).change();
                            $("#eprovincia").val(item.provId).change();
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
        $("#ListaMosquiteros").DataTable({
            "ajax": "ListarMosquiteros",
            "method":'GET',
            "columns":[
                {data:"mosquiteroId"},
                {data:"Codigo"},
                {"defaultContent":
                "<button class='btn-warning btn-sm btnEditarMosquitero'><i class='lni lni-pencil'></i></button>\
                <button class='btn-success btn-sm btnListaPersonaMosquitero'><i class='lni lni-user'></i></button>"
                },
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Localidad"},
                {data:"fecha_entrega"},
                {data:"eess_cercano"},
                {data:"tiempo_eesscercano"},
                {data:"eess_cercano_microscopio"},
                {data:"tiempo_eesscercano_microscopio"},
                {data:"Responsable"}
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

</script>

@endsection
