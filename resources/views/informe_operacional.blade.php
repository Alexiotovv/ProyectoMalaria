@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-sm-12">
            <button type="button" class="btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal3">
                <i class="lni lni-plus"></i>Nuevo Informe Operacional
            </button>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <table id="InformeOperacional" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Código</th>
                            <th style="text-align: center;">Departamento</th>
                            <th style="text-align: center;">Provincia</th>
                            <th style="text-align: center;">Mes</th>
                            <th style="text-align: center;">Año</th>
                            <th style="text-align: center;">Oficina</th>
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



@section('script_table_ajax')
    <script>
        $("#InformeOperacional").DataTable(function(){
            
        });
    </script>
@endsection

@section('script_table')
    <script>
    
    </script>
@endsection

@section('script_select2')
<script>

</script>
@endsection