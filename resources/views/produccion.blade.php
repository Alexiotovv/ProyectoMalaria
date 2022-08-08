@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" id="Prueba">
                <i class="lni lni-plus">Prueba</i>
            </button>
        </div>

        {{-- <br> --}}
        <div class="card">
            <div class="card-body">
                <table id="ListaTablas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>NombreFormulario</th>
                            <th>NroFichasRegistradas</th>
                            <th>NroRegistros</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script_table')

<script>
    $("#ListaTablas tbody").html("");
    var NroFichInt=0;
    var NroFichSegACS=0;
    var Nroreg_inter=0;
    var Nroreg_seg_acs=0;
    var lista_prueba=[];
    $.ajax({
        type: "GET",
        url: "NumeroRegistros",
        dataType: "json",
        success: function (response) {
           NroFichInt=response.intervenciones;
           NroFichSegACS=response.seguimientoacs;
           Nroreg_inter=response.reg_inter;
           Nroreg_seg_acs=response.reg_seg_acs;  
           lista_prueba=[
            {'NombreFichas':'Intervenciones','CantidadFichas':NroFichInt,'CantidadRegistros':Nroreg_inter},
            {'NombreFichas':'SeguimientoACS','CantidadFichas':NroFichSegACS,'CantidadRegistros':Nroreg_seg_acs}
            ];

            $.each(lista_prueba, function (indexInArray, valueOfElement) {
                $("tbody").append('<tr>\
                    <td>'+indexInArray+'</td>\
                    <td>'+lista_prueba[indexInArray]['NombreFichas']+'</td>\
                    <td>'+"<button type='button' class='btn btn-warning btnDescargar1'>"+"<i class='lni lni-download'></i>Descargar(" + lista_prueba[indexInArray]['CantidadFichas'] +")</button>"+'</td>\
                    <td>'+"<button type='button' class='btn btn-warning btnDescargar2'>"+"<i class='lni lni-download'></i>Descargar(" + lista_prueba[indexInArray]['CantidadRegistros'] +")</button>"+'</td>\
                </tr');
            });
        }
    });
    
    $(document).on("click",".btnDescargar1",function(){
        e.preventDefault();
        fila=$(this).closest("tr");
        nombre_ficha=fila.find('td:eq(1)').text();

        if (nombre_ficha=='Intervenciones') {
            alert("presionaste boton descargar de intervenciones");
        }
        if (nombre_ficha=='SeguimientoACS') {
            alert("presionaste boton descargar de SeguimientoACS");
        }

    });
    // $("#Prueba").click(function(){
        
    //     $.each(lista_prueba, function (indexInArray, valueOfElement) { 
    //         alert(lista_prueba[indexInArray]['NombreFichas']);
    //     });
    // });

    

        // var table = $('#ListaTablas').DataTable( {
        //     lengthChange: false,
        //     dom: 'Bfrtip',
        //     buttons: [ 'copy', 'excel', 'pdf', 'print'],
        //     order:[0]
        //     });

</script>
@endsection

@section('script_select2')
<script>

</script>
@endsection