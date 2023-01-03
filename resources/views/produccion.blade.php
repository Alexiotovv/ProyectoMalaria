@extends('layouts.base')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    <table id="ListaTablas" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>NombreFormulario</th>
                                <th>DescargadeRegistros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Intervenciones({{$fich_int}})</td>
                                <td>
                                    <a type='button' href="{{url('Exportar')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$reg_inter}} Registros)</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SeguimientoACS({{$fich_seg_acs}})</td>
                                <td>
                                    <a type='button' href="{{url('ExportarSeguimientoACS')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$reg_seg_acs}} Registros/Actividades)</a>
                                    <a type='button' href="{{url('ExportarSeguimientoACSStock')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$acsStock}} Registros/Stock Mat.)</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Acta de Entrega de IMM({{$fich_imm}})</td>
                                <td>
                                    <a type='button' href="{{url('ExportarActaEntrega')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$reg_entrega_imm}} Registros)</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Asist.CapacitaciónACS({{$fich_cap_acs}})</td>
                                <td>
                                    <a type='button' href="{{url('ExportarAsistCapacACS')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$reg_cap_acs}} Registros)</a>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Entrega de Mosquiteros({{$fich_entrega_mosq}})</td>
                                <td>
                                    <a type='button' href="{{url('ExportarEntregaMosquiteros')}}" class='btn btn-warning btnDescarga'><i class='lni lni-download'></i>Excel({{$reg_entrega_mosq}} Registros)</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script_table_ajax')
    <script>
        // $("#ListarIntervenciones").DataTable({
        // "ajax": "ProduccionIntervenciones",
        // "method": 'GET',
        // "columns": [
        //     {data: "ID"},
        //     {data: "CODIGO"},
        //     {data: "FICHA_DISTRITO"},
        //     {data: "FICHA_PROVINCIA"},
        //     {data: "FICHA_RIOQUEBRADA"},
        //     {data: "FICHA_JEFEBRIGADA"},
        //     {data: "FICHA_FECHA_INICIO"},
        //     {data: "FICHA_FECHA_FINAL"},
        //     {data: "LOC_LOCALIDAD"},
        //     {data: "LOC_POBLACION"},
        //     {data: "LOC_NUMEROVIVIENDAS"},
        //     {data: "LOC_LAMINAS_ULTIMAS_SEMANAS"},
        //     {data: "LOC_CASOS_ULTIMAS_8SEMANAS"},
        //     {data: "LOC_INDICE_POSITIVIDAD_ULT_8SEMANAS"},
        //     {data: "LOC_FECHA_INICIO"},
        //     {data: "LOC_FECHA_FINAL"},
        //     {data: "AP_ACTIVIDADES_PROGRAMADAS"},
        //     {data: "AP_LAMINAS"},
        //     {data: "AP_CASAS"},
        //     {data: "AP_LAMINAS_TOMADAS"},
        //     {data: "AP_VIVAX"},
        //     {data: "AP_FALCIPARUM"},
        //     {data: "AP_PROB_MUESTREADA"},
        //     {data: "AP_INDICE_PSOTIVIDAD"},
        //     {data: "AP_TASA_PREVALENCIA"},
        //     {data: "AP_ACTIVIDAD_DESARROLLADA"},
        //     {data: "AP_CASAS_ROCIADAS"},
        //     {data: "AP_FECHA_INICIO"},
        //     {data: "AP_FECHA_FINAL"},
        //     {data: "USUARIO"},
        //     ],
        // order: [0],
        // dom: 'Bfrtip',
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        // });
        
        // $("#ListarSeguimientoACSActividades").DataTable({
        // "ajax": "ProduccionSeguimientoACSActividades",
        // "method": 'GET',
        // "columns": [
        //     {data: "FICHA_CODIGO"},
        //     {data: "FICHA_LOCALIDAD"},
        //     {data: "FICHA_DISTRITO"},
        //     {data: "FICHA_PROVINCIA"},
        //     {data: "FICHA_ESTABLECIMIENTO"},
        //     {data: "FICHA_TIEMPOEESLOCALIDAD"},
        //     {data: "FICHA_TIEMPOLOCALIDADESS"},
        //     {data: "FICHA_MEDIOTRANSPORTE"},
        //     {data: "FICHA_VISITA"},
        //     {data: "FICHA_NOMBRE_ACS"},
        //     {data: "FICHA_CODIGO_ACS"},
        //     {data: "FICHA_NOMBRE_TS"},
        //     {data: "FICHA_CODIGO_HIS_TS"},
        //     {data: "FICHA_NUMERO_VISITA"},
        //     {data: "USUARIO"},
        //     {data: "VISITA"},
        //     {data: "OBSERVACION"},
        //     {data: "ACTIVIDAD"},
        //     ],
        // order: [0],
        // dom: 'Bfrtip',
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        // });
 
        // $("#ListarSeguimientoACSStock").DataTable({
        // "ajax": "ProduccionSeguimientoACSStock",
        // "method": 'GET',
        // "columns": [
        //     {data: "FICHA_CODIGO"},
        //     {data: "FICHA_LOCALIDAD"},
        //     {data: "FICHA_DISTRITO"},
        //     {data: "FICHA_PROVINCIA"},
        //     {data: "FICHA_ESTABLECIMIENTO"},
        //     {data: "FICHA_TIEMPOEESLOCALIDAD"},
        //     {data: "FICHA_TIEMPOLOCALIDADESS"},
        //     {data: "FICHA_MEDIOTRANSPORTE"},
        //     {data: "FICHA_VISITA"},
        //     {data: "FICHA_NOMBRE_ACS"},
        //     {data: "FICHA_CODIGO_ACS"},
        //     {data: "FICHA_NOMBRE_TS"},
        //     {data: "FICHA_CODIGO_HIS_TS"},
        //     {data: "FICHA_NUMERO_VISITA"},
        //     {data: "USUARIO"},
        //     {data: "UNIDADES"},
        //     {data: "FECHA_VCMTO"},
        //     {data: "ACTIVIDAD"},
        //     ],
        // order: [0],
        // dom: 'Bfrtip',
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        // });

        // $("#ListaTablas tbody").html("");
        // var NroFichInt=0;
        // var NroFichSegACS=0;
        // var Nroreg_inter=0;
        // var Nroreg_seg_acs=0;
        // var lista_prueba=[];
        // $.ajax({
        //     type: "GET",
        //     url: "NumeroRegistros",
        //     dataType: "json",
        //     success: function (response) {
        //        NroFichInt=response.intervenciones;
        //        NroFichSegACS=response.seguimientoacs;
        //        Nroreg_inter=response.reg_inter;
        //        Nroreg_seg_acs=response.reg_seg_acs;  
        //        lista_prueba=[
        //         {'NombreFichas':'Intervenciones','CantidadFichas':NroFichInt,'CantidadRegistros':Nroreg_inter},
        //         {'NombreFichas':'SeguimientoACS','CantidadFichas':NroFichSegACS,'CantidadRegistros':Nroreg_seg_acs}
        //         ];

        //         $.each(lista_prueba, function (indexInArray, valueOfElement) {
        //             $("tbody").append('<tr>\
        //                 <td>'+indexInArray+'</td>\
        //                 <td>'+lista_prueba[indexInArray]['NombreFichas']+'</td>\
        //                 <td>'+"<button type='button' class='btn btn-warning btnDescarga'>"+"<i class='lni lni-download'></i>Descargar(" + lista_prueba[indexInArray]['CantidadFichas'] +")</button>"+'</td>\
        //             </tr');
        //         });
        //     }
        // });
        //<td>'+"<button type='button' class='btn btn-warning btnSeguimientoACS'>"+"<i class='lni lni-download'></i>Descargar(" + lista_prueba[indexInArray]['CantidadRegistros'] +")</button>"+'</td>\

        // $(document).on("click",".btnIntervenciones",function(){
        //     e.preventDefault();
        //     fila=$(this).closest("tr");
        //     nombre_ficha=fila.find('td:eq(2)').text();
        //     if (nombre_ficha=='Intervenciones') {
        //         $.ajax({
        //             type: "GET",
        //             url: "Exportar",
        //             dataType: "json",
        //             success: function (response) {

        //             }
        //         });
        //     }
        // });


        // $("#Prueba").click(function(){

        //     $.each(lista_prueba, function (indexInArray, valueOfElement) { 
        //         alert(lista_prueba[indexInArray]['NombreFichas']);
        //     });
        // });

        var table = $('#ListaTablas').DataTable({
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print'],
            // order:[0]
        });
    </script>
@endsection

@section('script_select2')
    <script></script>
@endsection
