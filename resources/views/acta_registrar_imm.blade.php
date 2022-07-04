@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary btnNuevoIMM">
                <i class="lni lni-plus"></i>Nueva Acta IMM
            </button>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ListaInsumosMaterialesM"  class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Acción</th>
                                <th style="text-align: center;">Depart.</th>
                                <th style="text-align: center;">Prov.</th>
                                <th style="text-align: center;">Dist.</th>
                                <th style="text-align: center;">Localidad</th>
                                <th style="text-align: center;">Nombre del TCS</th>
                                <th style="text-align: center;">DNI</th>
                                <th style="text-align: center;">Com. de Procedencia</th>
                                <th style="text-align: center;">Nombre del ESS</th>
                                <th style="text-align: center;">Tiempo Horas del ESS</th>
                                <th style="text-align: center;">Insumos Med. y Otros</th>
                                <th style="text-align: center;">Cantidad</th>
                                <th style="text-align: center;">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <form  id="formGrabarEntregaMateriales">
            @csrf
            <div class="modal fade" id="GrabarEntregaMaterialesModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Acta de Entrega IMM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Departamento:</label>
                                        <select name="Departamento" id="" class="single-select">
                                            @foreach ($dpto as $d )
                                                <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>    
                                            @endforeach
                                        </select>      
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Provincia:</label>
                                        <select name="Provincia" id="" class="single-select">
                                            @foreach ($prov as $p)
                                                <option value="{{$p->id}}">{{$p->nombre_prov}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Distrito:</label>
                                        <select name="Distrito" id="" class="single-select">
                                            @foreach ($dist as $di)
                                                <option value="{{$di->id}}">{{$di->nombre_dist}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Localidad:</label>
                                        <input name="Localidad" type="text" class="form-control form-control-sm" value="-">
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="form" class="form-label">Nombre del TCS</label>
                                        <input name="NombreTCS" id="NombreTCS" value="-" class="form-control form-control-sm" >
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <label for="form" class="form-label">DNI</label>
                                        <input name="DNI" id="DNI" value="" class="form-control form-control-sm" type="number">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="form" class="form-label">Com. Proc.</label>
                                        <input name="Comunidad" id="Comunidad" value="-" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="form" class="form-label">Nombre del ESS</label>
                                        <input name="NombreESS" id="NombreESS" value="-" class="form-control form-control-sm" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Tiemp.Horas EESS</label>
                                        <input name="Tiempo" type="number" id="Tiempo" value="0" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Insumos, Med. y Otros</label>
                                        <input name="IMM" id="IMM" value="0" class="form-control form-control-sm" required="required" >        
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Cantidad de Mat.</label>
                                        <input name="Cantidad" type="number" id="Cantidad" value="0" class="form-control form-control-sm">        
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Fecha de Entre.</label>
                                        <input name="Fecha" type="date" id="Fecha" class="form-control form-control-sm">
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


        <form  id="formEditarEntregaMateriales" action="ActualizarActaEntregaIMM" method="POST">
            @csrf
            <div class="modal fade" id="EditarEntregaMaterialesModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Acta de Entrega IMM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    <input type="text" id="editId" name="editId" hidden>
                                    <div class="col-lg-3">
                                        <label for="">Departamento:</label>
                                        <select name="editDepartamento" id="editDepartamento" class="single-select" >
                                            @foreach ($dpto as $d)
                                                <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>        
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Provincia:</label>
                                        <select name="editProvincia" id="editProvincia" class="single-select" >
                                            @foreach ($prov as $p)
                                                <option value="{{$p->id}}" selected>{{$p->nombre_prov}}</option>        
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Distrito:</label>
                                            <select name="editDistrito" id="editDistrito" class="single-select" onchange="ObtieneRegiones('editDistrito');">
                                                @foreach ($dist as $d)
                                                    <option value="{{$d->id}}">{{$d->nombre_dist}}</option>    
                                                @endforeach
                                            </select>
                                        
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Localidad:</label>
                                        <input name="editLocalidad" id="editLocalidad"  type="text" class="form-control form-control-sm" required="required">
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="form" class="form-label">Nombre Agente Cmo.</label>
                                        <input name="editNombreTCS" id="editNombreTCS" class="form-control form-control-sm" required="required">
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <label for="form" class="form-label">DNI</label>
                                        <input name="editDNI" id="editDNI" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="form" class="form-label">Comu.Proc.</label>
                                        <input name="editComunidad" id="editComunidad" class="form-control form-control-sm" required="required">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="form" class="form-label">Nombre del ESS</label>
                                        <input name="editNombreESS" id="editNombreESS" v class="form-control form-control-sm" required="required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Tiemp.Horas EESS</label>
                                        <input name="editTiempo" type="number" id="editTiempo"  class="form-control form-control-sm" required="required">
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Insumos, Med. y Otros</label>
                                        <input name="editIMM" id="editIMM" class="form-control form-control-sm" required="required" >        
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Cantidad de Mate.</label>
                                        <input name="editCantidad" type="number" id="editCantidad" value="0.00" class="form-control form-control-sm" required="required">        
                                    </div>
                                    <div class="col-lg-2">
                                        <label type= class="form-label">Fecha de Entrega</label>
                                        <input name="editFecha" type="date" id="editFecha" class="form-control form-control-sm" value="2022-06-01" required="required">
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

        
    </div>
</div>

@endsection

@section('script_table')
    <script>
        $("#formGrabarEntregaMateriales").submit(function(e){
            e.preventDefault();
            var serializedData=$("#formGrabarEntregaMateriales").serialize();
            $.ajax({
                type: "POST",
                url: "GrabarActaEntregaIMM",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaInsumosMaterialesM').DataTable().ajax.reload();
                    round_success_noti("Registro Guardado");
                },
                error: function (response) { 
                    round_error_noti()
                }
            });
            $("#GrabarEntregaMaterialesModal").modal('hide');
        });

        $(document).on("click",".btnNuevoIMM",function(){
            $("#GrabarEntregaMaterialesModal").modal('show');
        });
    </script>
    <script>
        $("#formEditarEntregaMateriales").submit(function(e){
            e.preventDefault();
            // $("#editDepartamento").prop('disabled', false);
            // $("#editProvincia").prop('disabled', false);
            var serializedData = $("#formEditarEntregaMateriales").serialize();
            $.ajax({
                type: "POST",
                url: "ActualizarActaEntregaIMM",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('#ListaInsumosMaterialesM').DataTable().ajax.reload();
                }
            });
            // $("#editDepartamento").prop('disabled', true);
            // $("#editProvincia").prop('disabled', true);
            $("#EditarEntregaMaterialesModal").modal('hide');
        });
    </script>

    <script>
        $(document).on("click",".btnEditarIMM",function(){
            fila=$(this).closest("tr");
            id=parseInt((fila).find('td:eq(0)').text());
            $("#editId").val(id);
            $.ajax({
                method: "GET",
                url: "EditarActaEntregaIMM/"+id,
                dataType: "json",
                success: function (response) {
                    $("#editId").val(response[0].idacta);
                    $("#editDepartamento").val(response[0].dptoId).change();
                    $("#editProvincia").val(response[0].provId).change();
                    $("#editDistrito").val(response[0].distId).change();
                    $("#editDNI").val(response[0].DNI);
                    $("#editLocalidad").val(response[0].Localidad);
                    $("#editNombreTCS").val(response[0].NombreTCS);
                    $("#editComunidad").val(response[0].Comunidad);
                    $("#editNombreESS").val(response[0].NombreESS);
                    $("#editTiempo").val(response[0].TiempoHorasESS);
                    $("#editIMM").val(response[0].IMM);
                    $("#editCantidad").val(response[0].Cantidad);
                    $("#editFecha").val(response[0].Fecha);
                }
            });
            $("#EditarEntregaMaterialesModal").modal('show');
        });
    </script>
@endsection

@section('script_table_ajax')
    <script>
        //<button class='btn-sm btn-danger btnEliminarIMM'><i class='lni lni-cross-circle'></i></button>
        $("#ListaInsumosMaterialesM").DataTable({
            "ajax":"ListarActaEntregaIMM",
            "method":"GET",
            "columns":[
                {data:"idacta"},
                {"defaultContent":
                "<button class='btn-sm btn-warning btnEditarIMM'><i class='lni lni-pencil'></i></button>"
                },
                {data:"nombre_dpto"},
                {data:"nombre_prov"},
                {data:"nombre_dist"},
                {data:"Localidad"},
                {data:"NombreTCS"},
                {data:"DNI"},
                {data:"Comunidad"},
                {data:"NombreESS"},
                {data:"TiempoHorasESS"},
                {data:"IMM"},
                {data:"Cantidad"},
                {data:"Fecha"}
            ]
            ,
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
                            // $("#departamento").val(item.dptoId).change();
                            // $("#provincia").val(item.provId).change();
                            $("#editDepartamento").val(item.dptoId).change();
                            $("#editProvincia").val(item.provId).change();
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

    var fecha = new Date();
    document.getElementById("Fecha").value = fecha.toJSON().slice(0,10);
</script>

@endsection


