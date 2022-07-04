@extends('layouts.base')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-12 col-lg-12">
				<!--<h6 class="mb-0 text-uppercase">Casos Covid</h6>-->
				<hr/>
				<form action="">@csrf
					<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
										<h4 class="my-1 text-white">TOTAL CASOS 2021-2022/</h4>
										<h4 class="my-1" style="color:yellow"> PRUEBAS PCR, RÁPIDAS Y ANTÍGENOS </h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<select name="period" id="period" class="single-select">
									<option value="todo">todo</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
								</select>
							</div>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-success" value="Filtrar">
							</div>
						</div>
					
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>PROVINCIA</th>
										<th>DISTRITO</th>
										
										@if ($period=='todo')
											<th>(+) 2020</th>
											<th>(-) 2020</th>
											<th>(Σ) 2020</th>
											<th>(+) 2021</th>
											<th>(-) 2021</th>
											<th>(Σ) 2021</th>
											<th>(+) 2022</th>
											<th>(-) 2022</th>
											<th>(Σ) 2022</th>
										@endif

										@if ($period=='2020')
											<th>(+) 2020</th>
											<th>(-) 2020</th>
											<th>(Σ) 2020</th>
										@endif
										
										@if ($period=='2021')
											<th>(+) 2021</th>
											<th>(-) 2021</th>
											<th>(Σ) 2021</th>
										@endif

										@if ($period=='2022')
											<th>(+) 2022</th>
											<th>(-) 2022</th>
											<th>(Σ) 2022</th>
										@endif
									</tr>
								</thead>
								<tbody>

									@foreach ($casos_covid as $cc)
										<tr>
											<td>{{$cc->Provincia}}</td>
											<td>{{$cc->Distrito}}</td>
											
											@if ($period=='todo')
												<td>{{$cc->Positivos_2020}}</td>
												<td>{{$cc->Negativos_2020}}</td>
												<td>{{$cc->Total_2020}}</td>
												<td>{{$cc->Positivos_2021}}</td>
												<td>{{$cc->Negativos_2021}}</td>
												<td>{{$cc->Total_2021}}</td>
												<td>{{$cc->Positivos_2022}}</td>
												<td>{{$cc->Negativos_2022}}</td>
												<td>{{$cc->Total_2022}}</td>
											@endif

											@if ($period=='2020')
												<td>{{$cc->Positivos_2020}}</td>
												<td>{{$cc->Negativos_2020}}</td>
												<td>{{$cc->Total_2020}}</td>
											@endif
											@if ($period=='2021')
												<td>{{$cc->Positivos_2021}}</td>
												<td>{{$cc->Negativos_2021}}</td>
												<td>{{$cc->Total_2021}}</td>
											@endif
											@if ($period=='2022')
												<td>{{$cc->Positivos_2022}}</td>
												<td>{{$cc->Negativos_2022}}</td>
												<td>{{$cc->Total_2022}}</td>
											@endif
											
										
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
							<div class="col">
								<button type="button" class="btn btn-danger">
									POSITIVOS:
									<span class="badge">15,5222.00</span>
								</button>
							</div>
							
							<div class="col">
								<button type="button" class="btn btn-success">
									NEGATIVOS:
									<span class="badge">15,5222.00</span>
								</button>
							</div>

							<div class="col">
								<button type="button" class="btn btn-dark">
									TOTAL:
									<span class="badge">15,5222.00</span>
								</button>
							</div>

							<div class="col">
								<button type="button" class="btn btn-warning">
									Los Casos positivos del Total de Pacientes:
									<span class="badge bg-dark">28.66 %</span>
								</button>
							</div>
						</div>

						



					</div>
				</form>
				</div>
			

            </div>
        </div>
    </div>
</div>


    
@endsection

@section('script_table')
<script>
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