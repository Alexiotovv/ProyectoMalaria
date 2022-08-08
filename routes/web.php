<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\objetivosController;
use App\Http\Controllers\actividadesController;
use App\Http\Controllers\formatosController;
use App\Http\Controllers\AsisttrabcomsController;
use App\Http\Controllers\actaentregaimmsController;
use App\Http\Controllers\tcsController;
use App\Http\Controllers\CompetenciasController;
use App\Http\Controllers\FormSeguimientoPromotorSaludController;
use App\Http\Controllers\FormpsHoja2Controller;
use App\Http\Controllers\DtacsForm1Controller;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\PruebasyresultadosController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\FormmosquiterosController;
use App\Http\Controllers\FormpersonamqController;
use App\Http\Controllers\FormintervencionesController;
use App\Http\Controllers\FormintlocalidadController;
use App\Http\Controllers\FormMonitoreoUsoMosqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstadosFormController;
use App\Http\Controllers\AsistenciatsController;
use App\Http\Controllers\AsistenciaacsController;
use App\Http\Controllers\MonitoevaluMosqsController;
use App\Http\Controllers\ProduccionController;

Route::get('/', function () {
    return view('login');
});
/*Route::get('/cuadro', function () {
    return view('cuadro');
});*/
//Route::get('/cuadro',[casosController::class, 'casos_covid']);
Route::get("/objetivos/",[objetivosController::class, "objetivos"])->name('objetivos');
Route::post("/objetivos/editar",[objetivosController::class, "editar_objetivos"])->name('editar.objetivos');
Route::post("/objetivos/crear",[objetivosController::class, "crear_objetivos"])->name('crear.objetivos');
Route::post("/objetivos/delete",[objetivosController::class, "delete_objetivos"])->name('delete.objetivos');

Route::get("/actividades/",[actividadesController::class, "actividades"])->name('actividades');
Route::post("/actividades/crear",[actividadesController::class, "crear_actividades"])->name('crear.actividades');
Route::post("/actividades/editar",[actividadesController::class, "editar_actividades"])->name('editar.actividades');
Route::post("/actividades/delete",[actividadesController::class, "delete_actividades"])->name('delete.actividades');

Route::get("/formatos/",[formatosController::class, "formatos"])->name('formatos');

Route::get("ListarActaEntregaIMM",[actaentregaimmsController::class, "ListarActaEntregaIMM"])->name('ListarActaEntregaIMM');
Route::get("ActaEntregadeIMM",[actaentregaimmsController::class, "ActaEntregadeIMM"])->name('ActaEntregadeIMM');


Route::post("GrabarActaEntregaIMM",[actaentregaimmsController::class, "GrabarActaEntregaIMM"])->name('GrabarActaEntregaIMM');
Route::post("ActualizarActaEntregaIMM",[actaentregaimmsController::class, "ActualizarActaEntregaIMM"])->name('ActualizarActaEntregaIMM');
Route::post("/EliminarActaEntregaIMM/",[actaentregaimmsController::class, "EliminarActaEntregaIMM"])->name('EliminarActaEntregaIMM');
Route::get("EditarActaEntregaIMM/{id}",[actaentregaimmsController::class, "EditarActaEntregaIMM"])->name('EditarActaEntregaIMM');


// Route::get("AsistenciaTraCom",[AsisttrabcomsController::class, "AsistenciaTraCom"])->name('AsistenciaTraCom');
// Route::get("ListarAsistenciaTraCom",[AsisttrabcomsController::class, "ListarAsistenciaTraCom"])->name('ListarAsistenciaTraCom');
// Route::post("GrabarAsistTrabCom",[AsisttrabcomsController::class, "GrabarAsistTrabCom"])->name('GrabarAsistTrabCom');
// Route::get("EditarAsistenciaTraCom/{id}",[AsisttrabcomsController::class, "EditarAsistenciaTraCom"])->name('EditarAsistenciaTraCom');
// Route::post("ActualizarAsistTrabCom",[AsisttrabcomsController::class, "ActualizarAsistTrabCom"])->name('ActualizarAsistTrabCom');

Route::get("tcs_crud",[tcsController::class, "ListaTCS"])->name('Lista.TCS');//todos se van al mismo formulario
Route::post("tcs_graba",[tcsController::class, "GrabarTCS"])->name('GrabarTCS');
Route::get("EditarTCS/{id}",[tcsController::class, "EditarTCS"])->name('Editar.TCS');
Route::post("tcsregistro",[tcsController::class, "tcsregistro"])->name('tcs.registro');
Route::get("ListaTCSjson",[tcsController::class, "ListaTCSjson"])->name('Lista.TCSjson');
Route::get("ListaTCStable",[tcsController::class, "ListaTCStable"])->name('Lista.TCStable');
Route::get("BuscaDNIACS/{id}",[tcsController::class, "BuscaDNIACS"])->name('Busca.DNIACS');
Route::post("ActualizarACS",[tcsController::class, "ActualizarACS"])->name('Actualizar.ACS');

Route::get("ListarCompetencias",[CompetenciasController::class, "ListarCompetencias"])->name('ListarCompetencias');
Route::post("CrearCompetencias",[CompetenciasController::class, "CrearCompetencias"])->name('Crear.Competencias');
Route::post("EditarCompetencias",[CompetenciasController::class, "EditarCompetencias"])->name('Editar.Competencias');
Route::post("EliminarCompetencia",[CompetenciasController::class, "EliminarCompetencia"])->name('Eliminar.Competencia');

Route::get("Listar.formps",[FormSeguimientoPromotorSaludController::class, "Listar"])->name('Listar.formps');
Route::post("Crearformps",[FormSeguimientoPromotorSaludController::class, "Crear"])->name('Crear.formps');
Route::get("EditarFormSeg/{id}",[FormSeguimientoPromotorSaludController::class, "EditarFormSeg"])->name('EditarFormSeg');
Route::post("ActualizarFormSeg",[FormSeguimientoPromotorSaludController::class, "ActualizarFormSeg"])->name('Actualizar.FormSeg');
Route::post("GuardaStockMedicamentos",[FormSeguimientoPromotorSaludController::class, "GuardaStockMedicamentos"])->name('Guarda.StockMedicamentos');


Route::get("ListarCompetencias/{id}",[FormSeguimientoPromotorSaludController::class, "ListarCompetencias"])->name('Listar.Competencias');
Route::get("EditarCompetenciasform2/{id}",[FormSeguimientoPromotorSaludController::class, "EditarCompetenciasform2"])->name('Editar.Competenciasform2');
Route::post("ActualizarCompetenciasform2",[FormSeguimientoPromotorSaludController::class, "ActualizarCompetenciasform2"])->name('Actualizar.Competenciasform2');

Route::get("ListaStockMedicamentos/{id}",[FormSeguimientoPromotorSaludController::class, "ListaStockMedicamentos"])->name('Lista.StockMedicamentos');
Route::get("EditarStockMedicamentos/{id}",[FormSeguimientoPromotorSaludController::class, "EditarStockMedicamentos"])->name('Editar.StockMedicamentos');
Route::post("ActualizarStockMedicamentos",[FormSeguimientoPromotorSaludController::class, "ActualizarStockMedicamentos"])->name('Actualizar.StockMedicamentos');

Route::get("/Crearformps2/{id}",[FormSeguimientoPromotorSaludController::class, "CrearHoja2"])->name('Crear.formps2');
Route::post("Guardaformps2",[FormpsHoja2Controller::class, "Guardarformps2"])->name('Guarda.formps2');

//un solo form
Route::get("soloformseguiACS",[FormSeguimientoPromotorSaludController::class, "soloformseguiACS"])->name('soloform.seguiACS');
Route::get("ListarSeguimientoACS",[FormSeguimientoPromotorSaludController::class, "ListarSeguimientoACS"])->name('Listar.SeguimientoACS');
Route::post("RegistraSegumientoACS",[FormSeguimientoPromotorSaludController::class, "RegistraSegumientoACS"])->name('Registra.SegumientoACS');
Route::post("EstadoForm",[EstadosFormController::class, "EstadoForm"])->name('Estado.Form');
Route::post("ActualizaSegumientoACS",[FormSeguimientoPromotorSaludController::class, "ActualizaSegumientoACS"])->name('Actualiza.SegumientoACS');
Route::post("EliminaEstadoForm",[EstadosFormController::class, "EliminaEstadoForm"])->name('Elimina.EstadoForm');

Route::get("/Crearformps2stock/{id}",[FormSeguimientoPromotorSaludController::class, "CrearHoja2stock"])->name('Crear.formps2stock');
Route::post("Guardaformps2stock",[FormpsHoja2Controller::class, "Guardarformps2stock"])->name('Guarda.formps2stock');

Route::post("Guardaformdtac",[DtacsForm1Controller::class, "Guardardtacs"])->name('Crear.formdtac');
Route::post("GuardaformPacientedtac",[DtacsForm1Controller::class, "GuardarPacientedtacs"])->name('RegistraPaciente.formdtac');
Route::get("Listarformdtac",[DtacsForm1Controller::class, "Listardtacs"])->name('Listar.formdtac');
Route::get("ListarPacientesdtacs/{id}",[DtacsForm1Controller::class, "ListarPacientesdtacs"])->name('Lista.PacientesDtac');
Route::get("ListaJsonDtac",[DtacsForm1Controller::class, "ListaJsonDtac"])->name('Lista.JsonDtac');
Route::get("Editarformdtac/{id}",[DtacsForm1Controller::class, "Editardtacs"])->name('Editar.formdtac');
Route::get("EditarformPacientedtac/{id}",[DtacsForm1Controller::class, "EditarformPacientedtac"])->name('EditarPaciente.formdtac');
Route::post("Actualizarformdtac",[DtacsForm1Controller::class, "Actualizar"])->name('Actualizar.formdtac');
Route::post("ActualizarformPacientedtac",[DtacsForm1Controller::class, "ActualizaPaciente"])->name('Actualizar.Pacienteformdtac');
Route::get("ListarRegiones/{id}",[DtacsForm1Controller::class, "ListaRegiones"])->name('Listar.Regiones');


Route::get('AsistenciaTS', [AsistenciatsController::class,"AsistenciaTS"])->name('Asistencia.TS');
Route::get('ListaAsistenciaTS', [AsistenciatsController::class,"ListaAsistenciaTS"])->name('Lista.AsistenciaTS');
Route::post('GuardarAsistenciaTS', [AsistenciatsController::class,"GuardarAsistenciaTS"])->name('Guardar.AsistenciaTS');
Route::get('EditarAsistenciaTS/{id}', [AsistenciatsController::class,"EditarAsistenciaTS"])->name('Editar.AsistenciaTS');
Route::post('ActualizarAsistenciaTS', [AsistenciatsController::class,"ActualizarAsistenciaTS"])->name('Actualizar.AsistenciaTS');
Route::post('NuevoNombreTS', [AsistenciatsController::class,"NuevoNombreTS"])->name('Nuevo.NombreTS');
Route::get('ListaNombresTS/{id}', [AsistenciatsController::class,"ListaNombresTS"])->name('Lista.NombresTS');
Route::get('EditarRegistroNombre/{id}', [AsistenciatsController::class,"EditarRegistroNombre"])->name('Editar.RegistroNombre');
Route::post('ActualizarRegistroNombre', [AsistenciatsController::class,"ActualizarRegistroNombre"])->name('Actualizar.RegistroNombre');

Route::get('AsistenciaACS', [AsistenciaacsController::class,"AsistenciaACS"])->name('Asistencia.ACS');
Route::get('ListaAsistenciaACS', [AsistenciaacsController::class,"ListaAsistenciaACS"])->name('Lista.AsistenciaACS');
Route::post('GuardarAsistenciaACS', [AsistenciaacsController::class,"GuardarAsistenciaACS"])->name('Guardar.AsistenciaACS');
Route::get('EditarAsistenciaACS/{id}', [AsistenciaacsController::class,"EditarAsistenciaACS"])->name('Editar.AsistenciaACS');
Route::post('ActualizarAsistenciaACS', [AsistenciaacsController::class,"ActualizarAsistenciaACS"])->name('Actualizar.AsistenciaACS');
Route::post('NuevoNombreACS', [AsistenciaacsController::class,"NuevoNombreACS"])->name('Nuevo.NombreACS');
Route::get('ListaNombresACS/{id}', [AsistenciaacsController::class,"ListaNombresACS"])->name('Lista.NombresACS');
Route::get('EditarRegistroNombreACS/{id}', [AsistenciaacsController::class,"EditarRegistroNombreACS"])->name('Editar.RegistroNombre');
Route::post('ActualizarRegistroNombreACS', [AsistenciaacsController::class,"ActualizarRegistroNombreACS"])->name('Actualizar.RegistroNombre');


Route::get("ListarResultados/{id}",[PruebasyresultadosController::class, "ListarResultados"])->name('Listar.Resultados');
Route::post("GuardarResultados",[PruebasyresultadosController::class, "GuardarResultados"])->name('Guardar.Resultados');
Route::get("EditarResultado/{id}",[PruebasyresultadosController::class, "EditarResultado"])->name('Editar.Resultado');
Route::post("ActualizaResultado",[PruebasyresultadosController::class, "ActualizaResultado"])->name('Actualiza.Resultado');

Route::get("ListarMedicamentos/{id}",[medicamentosController::class, "ListarMedicamentos"])->name('Listar.Medicamentos');
Route::post("GuardarMedicamentos",[medicamentosController::class, "GuardarMedicamentos"])->name('Guardar.Medicamentos');
Route::get("EditarMedicamento/{id}",[medicamentosController::class, "EditarMedicamento"])->name('Editar.Medicamento');
Route::post("ActualizaMedicamento",[medicamentosController::class, "ActualizaMedicamento"])->name('Actualiza.Medicamento');

Route::post("GuardarMosquiteros",[FormmosquiterosController::class, "GuardaMosquiteros"])->name('Guardar.Mosquiteros');
Route::get("Mosquiteros",[FormmosquiterosController::class, "Mosquiteros"])->name('Mosquiteros');
Route::get("ListarMosquiteros",[FormmosquiterosController::class, "ListarMosquiteros"])->name('Listar.Mosquiteros');
Route::get("EditarMosquiteros/{id}",[FormmosquiterosController::class, "EditarMosquiteros"])->name('Editar.Mosquiteros');
Route::post("ActualizarMosquiteros",[FormmosquiterosController::class, "ActualizarMosquiteros"])->name('Actualizar.Mosquiteros');
Route::post("ActualizaEntregaMosq",[FormmosquiterosController::class, "ActualizaEntregaMosq"])->name('Actualiza.EntregaMosq');
Route::get("EditarEntregaMosq/{id}",[FormmosquiterosController::class, "EditarEntregaMosq"])->name('Editar.EntregaMosq');


Route::get("ListarPersonaMosquitero/{id}",[FormmosquiterosController::class, "ListarPersonaMosquitero"])->name('Listar.PersonaMosquitero');
Route::post("GuardaPersonaMosquitero",[FormmosquiterosController::class, "GuardaPersonaMosquitero"])->name('Guarda.PersonaMosquitero');
Route::get("EditarPersonaMosquitero/{id}",[FormmosquiterosController::class, "EditarPersonaMosquitero"])->name('Editar.PersonaMosquitero');
Route::post("ActualizaPersonaMosquitero",[FormmosquiterosController::class, "ActualizaPersonaMosquitero"])->name('Actualiza.PersonaMosquitero');
Route::get("ListarEntregaMosquitero/{id}",[FormmosquiterosController::class, "ListarEntregaMosquitero"])->name('Listar.EntregaMosquitero');
Route::post("GuardarEntregaMosquitero",[FormmosquiterosController::class, "GuardarEntregaMosquitero"])->name('Guardar.EntregaMosquitero');

Route::get("Intervenciones",[FormintervencionesController::class, "Intervenciones"])->name('Intervenciones');
Route::get("ListarIntervenciones",[FormintervencionesController::class, "ListarIntervenciones"])->name('Listar.Intervenciones');
Route::post("GuardaNuevaIntervencion",[FormintervencionesController::class, "GuardaNuevaIntervencion"])->name('Guarda.NuevaIntervencion');
Route::get("EditarIntervencion/{id}",[FormintervencionesController::class, "EditarIntervencion"])->name('Editar.Intervencion');
Route::post("ActualizarIntervencion",[FormintervencionesController::class, "ActualizarIntervencion"])->name('Actualizar.Intervencion');
Route::get("formIntervencion",[FormintervencionesController::class, "formIntervencion"])->name('form.Intervencion');
Route::post("ActualizarIntervencionNew",[FormintervencionesController::class, "ActualizarIntervencionNew"])->name('ActualizarIntervencionNew');
Route::get("ListarLocalidadActividades/{id}",[FormintervencionesController::class, "ListarLocalidadActividades"])->name('Listar.LocalidadActividades');
Route::get("EliminarIntervencion/{id}",[FormintervencionesController::class, "EliminarIntervencion"])->name('Eliminar.Intervencion');


Route::get("ListarLocalidad/{id}",[FormintervencionesController::class, "ListarLocalidad"])->name('Listar.Localidad');
Route::post("NuevaLocalidad",[FormintervencionesController::class, "NuevaLocalidad"])->name('Nueva.Localidad');
Route::get("EditarLocalidad/{id}",[FormintervencionesController::class, "EditarLocalidad"])->name('Editar.Localidad');
Route::post("ActualizarLocalidad",[FormintervencionesController::class, "ActualizarLocalidad"])->name('Actualizar.Localidad');

Route::get("ListaActividadProgramada/{id}",[FormintervencionesController::class, "ListaActividadProgramada"])->name('Lista.ActividadProgramada');
Route::post("AgregarActividadProgramada",[FormintervencionesController::class, "AgregarActividadProgramada"])->name('Agregar.ActividadProgramada');
Route::get("EditarActividadProgramada/{id}",[FormintervencionesController::class, "EditarActividadProgramada"])->name('Editar.ActividadProgramada');
Route::post("ActualizaActividadProgramada",[FormintervencionesController::class, "ActualizaActividadProgramada"])->name('Actualidad.ActividadProgramada');

Route::get("MonitoreoMosquiteros",[FormMonitoreoUsoMosqController::class, "MonitoreoMosquiteros"])->name('Monitoreo.Mosquiteros');
Route::get("ListarMonitoreoMosquiteros",[FormMonitoreoUsoMosqController::class, "ListarMonitoreoMosquiteros"])->name('Listar.MonitoreoMosquitero');
Route::post("GuardaMonitoreoMosquiteros",[FormMonitoreoUsoMosqController::class, "GuardaMonitoreoMosquiteros"])->name('Guarda.MonitoreoMosquiteros');
Route::get("EditarMonitoreoMosquiteros/{id}",[FormMonitoreoUsoMosqController::class, "EditarMonitoreoMosquiteros"])->name('Editar.MonitoreoMosquiteros');
Route::post("ActualizaMonitoreoMosquiteros",[FormMonitoreoUsoMosqController::class, "ActualizaMonitoreoMosquiteros"])->name('Actualiza.MonitoreoMosquiteros');

Route::get("ListarReaccionesAdversas/{id}",[FormMonitoreoUsoMosqController::class, "ListarReaccionesAdversas"])->name('Listar.ReaccionesAdversas');
Route::post("GuardarReaccionAdversa",[FormMonitoreoUsoMosqController::class, "GuardarReaccionAdversa"])->name('Guardar.ReaccionAdversa');
Route::get("EditarReaccionAdversa/{id}",[FormMonitoreoUsoMosqController::class, "EditarReaccionAdversa"])->name('Editar.ReaccionAdversa');
Route::post("ActualizarReaccionAdversa",[FormMonitoreoUsoMosqController::class, "ActualizarReaccionAdversa"])->name('Actualizar.ReaccionAdversaReaccionAdversa');

Route::get("MonitoEvaluUsoMosq",[MonitoevaluMosqsController::class, "MonitoEvaluUsoMosq"])->name('Monito.EvaluUsoMosq');
Route::get("ListaMonitoreo",[MonitoevaluMosqsController::class, "ListaMonitoreo"])->name('Lista.Monitoreo');
Route::post("GuardaMonitoreo",[MonitoevaluMosqsController::class, "GuardaMonitoreo"])->name('Guarda.Monitoreo');
Route::get("EditarMonitoreo/{id}",[MonitoevaluMosqsController::class, "EditarMonitoreo"])->name('Editar.Monitoreo');
Route::post("ActualizarMonitoreo",[MonitoevaluMosqsController::class, "ActualizarMonitoreo"])->name('Actualizar.Monitoreo');

Route::get("ListaEncuestado/{id}",[MonitoevaluMosqsController::class, "ListaEncuestado"])->name('Lista.Encuestado');
Route::post("GuardarEncuestado",[MonitoevaluMosqsController::class, "GuardarEncuestado"])->name('Guardar.Encuestado');
Route::get("EditarEncuestado/{id}",[MonitoevaluMosqsController::class, "EditarEncuestado"])->name('Editar.Encuestado');
Route::post("ActualizarEncuestado",[MonitoevaluMosqsController::class, "ActualizarEncuestado"])->name('Actualizar.Encuestado');

Route::get("Produccion",[ProduccionController::class, "Produccion"])->name('Lista.Produccion');
Route::get("NumeroRegistros",[ProduccionController::class, "NumeroRegistros"])->name('Numero.Registros');


/////////////////////////////////////////LOGIN AND REGISTER
Route::get('login',function(){
    return view('login');
})->name('login')->middleware('guest');

Route::get('home',function(){
    return view('home');
})->middleware('auth')->name('home');

Route::get('register',function(){
    return view('register');
})->name('register');


Route::post("register",[UserController::class,'create'])->name('Registro');
Route::post("verificanombre",[UserController::class,'verificanombre'])->name('verificanombre');
Route::post("verificaemail",[UserController::class,'verificaemail'])->name('verificaemail');
Route::post("login",[LoginController::class, 'login']);
Route::put('login', [LoginController::class, 'logout']);


Route::get("Pruebas",[PruebasController::class, "Pruebas"])->name('Pruebas');
Route::post("ActualizaPruebas",[PruebasController::class, "ActualizaPruebas"])->name('Actualiza.Pruebas');
Route::get("ListarPruebas",[PruebasController::class, "ListarPruebas"])->name('Listar.Pruebas');
Route::get("EditarPrueba/{id}",[PruebasController::class, "EditarPrueba"])->name('Editar.Prueba');