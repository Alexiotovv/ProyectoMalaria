@extends('layouts.base')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-12 col-lg-12">
				<!--<h6 class="mb-0 text-uppercase">Casos Covid</h6>-->
				<hr/>

					<h1 style="text-align: center;color:rgb(11, 6, 85)"><strong>Casos COVID-19 Loreto</strong></h1>
					<h4 style="text-align: center;color:rgb(99, 92, 37)"><strong>DIRECCIÓN REGIONAL DE SALUD LORETO</strong></h4>
					

					<div class="card">
						<div class="card-body">
							<div class="card radius-10 bg-primary bg-gradient">
								<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
									<h5 style="color:white">TOTAL CASOS 2021-2022</h5>	
									<h5 style="color:yellow">PRUEBAS PCR, RÁPIDAS Y ANTIGENAS</h5>	
								</button>
							</div>
					
							<div class="table-responsive">
								<table id="basic-datatable" class="datatables-basic table"" style="width:100%">
									<thead>
										<tr style="color: rgb(17, 16, 16);font-size: initial;text-align:center;" >
											<th style="font-size: 100%">PROVINCIA</th>
											<th style="font-size: 100%">PROVINCIA/DISTRITO</th>
												<th style="font-size: 100%">(+)2021</th>
												<th style="font-size: 100%">(-)2021</th>
												<th style="font-size: 100%">(Σ)2021</th>
												<th style="font-size: 100%">(+)2022</th>
												<th style="font-size: 100%">(-)2022</th>
												<th style="font-size: 100%">(Σ)2022</th>
										</tr>
										
									</thead>
									<tbody>
										@foreach ($casos_covid as $cc)
											<tr style="font-weight: 800;">
												<?php $pos21=$cc->Positivos_2021 ?>
												<?php $pos21=number_format($pos21); ?>

												<?php $neg21=$cc->Negativos_2021 ?>
												<?php $neg21=number_format($neg21); ?>

												<?php $tot21=$cc->Total_2021 ?>
												<?php $tot21=number_format($tot21); ?>

												<?php $pos22=$cc->Positivos_2022 ?>
												<?php $pos22=number_format($pos22); ?>

												<?php $neg22=$cc->Negativos_2022 ?>
												<?php $neg22=number_format($neg22); ?>

												<?php $tot22=$cc->Total_2022 ?>
												<?php $tot22=number_format($tot22); ?>

												<td style="text-align: right;">{{$cc->Provincia}}</td>
												<td style="text-align: right;">{{$cc->Distrito}}</td>
												<td style="text-align: right;">{{$pos21}}</td>
												<td style="text-align: right;">{{$neg21}}</td>
												<td style="text-align: right;">{{$tot21}}</td>
												<td style="text-align: right;">{{$pos22}}</td>
												<td style="text-align: right;">{{$neg22}}</td>
												<td style="text-align: right;">{{$tot22}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						
						<br>

						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
							<div class="col">
								<button type="button" class="btn btn-danger">
									POSITIVOS:
									<strong style="color: yellow">{{$pos}}</strong>
								</button>
							</div>
							
							<div class="col">
								<button type="button" class="btn btn-success">
									NEGATIVOS:
									<strong style="color: yellow">{{$neg}}</strong>
								</button>
							</div>

							<div class="col">
								<button type="button" class="btn btn-dark">
									TOTAL:
									<strong style="color: yellow">{{$tot}}</strong>
								</button>
							</div>

							<div class="col">
								<button type="button" class="btn btn-warning">
									Los Casos positivos del Total de Pacientes:
									<strong style="color: red">{{$per}}%</strong>
								</button>
							</div>

						</div>
					</div>
					
				</div>

				{{-- Grafico por PROVINCIAS INDIVIDUALES semanas epidemiológicas --}}
				<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
								<h5 style="color:white">TOTAL CASOS POR PROVINCIA/SEMANA EPIDEMIOLÓGICA 2021-2022</h5>	
								<h5 style="color:yellow">Px PCR Y Px ANTIGENOS</h5>	
							</button>
            			</div>

						<div class="row">
							<div class="col-sm-3">
								<canvas id="myChartSEMaynas"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSELoreto"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSEDatem"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSEAlto"></canvas>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<canvas id="myChartSEPutumayo"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSECastilla"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSERequena"></canvas>
							</div>
							<div class="col-sm-3">
								<canvas id="myChartSEUcayali"></canvas>
							</div>
						</div>

        			</div>
			    </div>
				
				{{-- Grafico por Provincia y SemanaEpidemiológicas --}}
				<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
								<h5 style="color:white">TOTAL CASOS POR PROVINCIA/SEMANA EPIDEMIOLÓGICA 2021-2022</h5>	
								<h5 style="color:yellow">Px PCR Y Px ANTIGENOS</h5>	
							</button>
            			</div>
						
						<div>
							<canvas id="myChartProvincia"></canvas>
						</div>	
						
        			</div>

			    </div>

				<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
								<h5 style="color:white">CASOS DE COVID 19 SEGÚN DISTRITOS REPORTADOS EN LA REGIÓN LORETO, AÑO 2022 </h5>	
								<h5 style="color:yellow">Px PCR Y Px ANTIGENOS</h5>	
							</button>
            			</div>

						<div>
							<canvas id="myChartDistric"></canvas>
						</div>

        			</div>
			    </div>

				<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
								<h5 style="color:white">TOTAL CASOS POSITIVOS-2021-2022 </h5>	
								<h5 style="color:yellow">PRUEBAS PCR, ANTIGENAS</h5>	
							</button>
            			</div>

						<div>
							<canvas id="myChartSemanaEpide"></canvas>
						</div>

        			</div>
			    </div>


				<div class="card">
					<div class="card-body">
						<div class="card radius-10 bg-primary bg-gradient">
							<button type="button" class="btn btn-primary waves-effect waves-float waves-light">
								<h5 style="color:white">CASOS COVID-19 – 2021-2022 </h5>	
								<h5 style="color:yellow">PCR, ANTIGENAS ÍNDICE POSITIVIDAD</h5>	
							</button>
            			</div>

						<div>
							<canvas id="myChartPositividad"></canvas>
						</div>

        			</div>
			    </div>	

				<div class="card">
					<div class="card-body" style="background-color: rgba(91, 131, 190, 0.89)">
					
						<h1 style="text-align: center;color:rgb(255, 255, 255)"><strong>Fallecidos COVID-19 Loreto </strong></h1>
						<h4 style="text-align: center;color:rgb(250, 237, 125)"><strong>DIRECCIÓN REGIONAL DE SALUD LORETO</strong></h4>
									
					</div>

				</div>




</div>

@endsection

@section('jsgraficoLine')
	<script>
		const labels = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"Semana '.$sem.'",';
		}?>]; 

		const data = {
		labels: labels,
		datasets: 
		[
			{
			label: 'Maynas',
			backgroundColor: 'rgb(171, 2, 2)',
			borderColor: 'rgb(171, 2, 2)',
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_may = $prov->MAYNAS;
				echo '"'.$pos_may.'",';} ?>]},
		
			{
			label: 'Loreto',
			backgroundColor: 'rgb(63, 194, 5)',
			borderColor: 'rgb(63, 194, 5)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_lor = $prov->LORETO;//atrapa el valor
				echo '"'.$pos_lor.'",'; //concatena el valor;
			}?>]
		}
		,
		{
			label: 'Datem del Marañon',
			backgroundColor: 'rgb(255, 87, 51)',
			borderColor: 'rgb(255, 87, 51)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_may = $prov->DATEM_DEL_MARANON;//atrapa el valor
				echo '"'.$pos_may.'",'; //concatena el valor;
			}?>]
		},

		{
			label: 'Alto Amazonas',
			backgroundColor: 'rgb(24, 48, 157)',
			borderColor: 'rgb(24, 48, 157)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_may = $prov->ALTO_AMAZONAS;//atrapa el valor
				echo '"'.$pos_may.'",'; //concatena el valor;
			}?>]
		},

		{
			label: 'Putumayo',
			backgroundColor: 'rgb(24, 145, 157)',
			borderColor: 'rgb(24, 145, 157)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_pu = $prov->PUTUMAYO;//atrapa el valor
				echo '"'.$pos_pu.'",'; //concatena el valor;
			}?>]
		},

		{
			label: 'Ramon Castilla',
			backgroundColor: 'rgb(240, 212, 53)',
			borderColor: 'rgb(240, 212, 53)',
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_rc = $prov->RAMON_CASTILLA;//atrapa el valor
				echo '"'.$pos_rc.'",'; //concatena el valor;
			}?>]
		},

		{
			label: 'Requena',
			backgroundColor: 'rgb(240, 53, 223)',
			borderColor: 'rgb(240, 53, 223)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_re = $prov->REQUENA;//atrapa el valor
				echo '"'.$pos_re.'",'; //concatena el valor;
			}?>]
			},

		{
			label: 'Ucayali',
			backgroundColor: 'rgb(53, 223, 240)',
			borderColor: 'rgb(53, 223, 240)',
			pointHitRadius: 10,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_uca = $prov->UCAYALI;//atrapa el valor
				echo '"'.$pos_uca.'",'; //concatena el valor;
			}?>]
		}
			
		]};

		const ChartProvin = {
		type: 'line',
		data: data,
		options: {indexAxis: 'x',}
		};
	
	</script>
	

	<script>
		
		const distritos = [<?php 
			foreach($casos_distrito as $casos_distn){
			$cdn = $casos_distn->DISTRITO; echo '"'.$cdn.'",' ;
		}?>];

		const positivos = [<?php 
			foreach($casos_distrito as $casos_distp){
			$cdp = $casos_distp->POSITIVOS; echo '"'.$cdp.'",' ;
		}?>];


		const ChartDistric = {
		type: 'bar',
    	data: {
			labels: distritos,
			datasets: [	
			{
				label:['Casos'],
				backgroundColor: 'rgba(33, 24, 234, 0.7)',
				borderColor: 'rgb(8, 1, 159)',
				data: positivos,
				pointHitRadius: 60,

			},
			
			]
    	},

    	options: {
			indexAxis: 'y',
			// Elements options apply to all of the options unless overridden in a dataset
			// In this case, we are setting the border of each horizontal bar to be 2px wide
			elements: {
			bar: {
				borderWidth: 2,
			}
			},
			responsive: true,
			plugins: {
				legend: {
					position: 'right',
				},
				title: {
					display: true,
					text: '2022- Casos Positivos Px PCR y Px RÁPIDAS  '
				}
			}
    	}
		
	}
	</script>
	

	<script>
		const Semanas = [<?php 
			foreach($semana_epide as $sem_epi){
			$se = $sem_epi->SEMANA; echo '"Semana '.$se.'",' ;
		}?>];

		const PosIquitos = [<?php 
			foreach($semana_epide as $sem_epi){
			$pi = $sem_epi->POSITIVOS_IQUITOS; echo '"'.$pi.'",' ;
		}?>];

		const PosRural = [<?php 
			foreach($semana_epide as $sem_epi){
			$pr = $sem_epi->POSITIVOS_RURAL; echo '"'.$pr.'",' ;
		}?>];

		
		const ChartSemEpide = {
		type: 'bar',
    	data: {
			labels: Semanas,
			datasets: [	
			{
				label:['IQUITOS CIUDAD'],
				backgroundColor: 'rgba(26, 17, 211, 0.7)',
				borderColor: 'rgb(113, 108, 212)',
				data: PosIquitos,
				pointHitRadius: 30,
			},
			{
				label:['RURAL'],
				backgroundColor: 'rgba(219, 67, 57, 0.7)',
				borderColor: 'rgb(202, 98, 92)',
				data: PosRural,
				pointHitRadius: 30,
			},
			
			]
    	},

    	options: {
			indexAxis: 'x',
			// Elements options apply to all of the options unless overridden in a dataset
			// In this case, we are setting the border of each horizontal bar to be 2px wide
			elements: {
			bar: {
				borderWidth: 2,
			}
			},
			responsive: true,
			plugins: {
			legend: {
				position: 'bottom',
			},
			
			filler: {
        		propagate: false,
      		},
			  
			title: {
				display: true,
				text: 'Total de Casos por Semana Epidemiológica',
				position:'top',
			}
			}
    	}
		}

	</script>


	<script>
		const labelsMY = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 

		const dataMY = {
		labels: labelsMY,
		datasets: 
		[
			{
			label: 'Maynas',
			backgroundColor: 'rgb(171, 2, 2)',
			borderColor: 'rgb(171, 2, 2)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			xAxisID:'x',
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_may = $prov->MAYNAS;
				echo '"'.$pos_may.'",';} ?>]},
			
			]};

		const ChartSEMaynas = {
		type: 'line',
		data: dataMY,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};

	</script>


	<script>
		const labelsLR = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataLR = {
		labels: labelsLR,
		datasets: 
		[
			{
			label: 'Loreto',
			backgroundColor: 'rgb(63, 194, 5)',
			borderColor: 'rgb(63, 194, 5)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_lor = $prov->LORETO;
				echo '"'.$pos_lor.'",';} ?>]},
			
			]};

		const ChartSELoreto = {
		type: 'line',
		data: dataLR,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};

	</script>

	<script>
		const labelsDM = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataDM = {
		labels: labelsDM,
		datasets: 
		[
			{
			label: 'Datem del Marañon',
			backgroundColor: 'rgb(255, 87, 51)',
			borderColor: 'rgb(255, 87, 51)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_dm = $prov->DATEM_DEL_MARANON;
				echo '"'.$pos_dm.'",';} ?>]},
			
			]};

		const ChartSEDatem = {
		type: 'line',
		data: dataDM,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>

	<script>
		const labelsAAM = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataAAM = {
		labels: labelsAAM,
		datasets: 
		[
			{
			label: 'Alto Amazonas',
			backgroundColor: 'rgb(24, 48, 157)',
			borderColor: 'rgb(24, 48, 157)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_AA = $prov->ALTO_AMAZONAS;
				echo '"'.$pos_AA.'",';} ?>]},
			]};
		const ChartSEAlto = {
		type: 'line',
		data: dataAAM,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>

	<script>
		const labelsPU = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataPU = {
		labels: labelsPU,
		datasets: 
		[
			{
			label: 'Putumayo',
			backgroundColor: 'rgb(24, 145, 157)',
			borderColor: 'rgb(24, 145, 157)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_PU = $prov->PUTUMAYO;
				echo '"'.$pos_PU.'",';} ?>]},
			]};
		const ChartSEPutumayo = {
		type: 'line',
		data: dataPU,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>

	<script>
		const labelsRC = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataRC = {
		labels: labelsRC,
		datasets: 
		[
			{
			label: 'Ramón Castilla',
			backgroundColor: 'rgb(240, 212, 53)',
			borderColor: 'rgb(240, 212, 53)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_RC = $prov->RAMON_CASTILLA;
				echo '"'.$pos_RC.'",';} ?>]},
			]};
		const ChartSECastilla = {
		type: 'line',
		data: dataRC,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>

	<script>
		const labelsRQ = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataRQ = {
		labels: labelsRQ,
		datasets: 
		[
			{
			label: 'Requena',
			backgroundColor: 'rgb(240, 53, 223)',
			borderColor: 'rgb(240, 53, 223)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_RQ = $prov->REQUENA;
				echo '"'.$pos_RQ.'",';} ?>]},
			]};
		const ChartSERequena = {
		type: 'line',
		data: dataRQ,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>
	
	<script>
		const labelsUY = [<?php 
			foreach($prov_semanas_provincia as $semana){
			$sem = $semana->SEMANA; echo '"'.$sem.'",' ;
		}?>]; 
		const dataUY = {
		labels: labelsUY,
		datasets: 
		[
			{
			label: 'Ucayali',
			backgroundColor: 'rgb(53, 223, 240)',
			borderColor: 'rgb(53, 223, 240)',
			borderWidth: 1,
			pointRadius: 2,
			pointHitRadius: 30,
			data: [<?php 
			foreach($prov_semanas_provincia as $prov){
				$pos_UY = $prov->UCAYALI;
				echo '"'.$pos_UY.'",';} ?>]},
			]};
		const ChartSEUcayali = {
		type: 'line',
		data: dataUY,
		options:{
			scales:{
				x:{
					title:{
						display:true,
						position:'bottom',
						text:'Sem.Epide.-2021-2022',
					}
				}
			}
		}
		};
	</script>

	<script>
		const myChartProvincia = new Chart(
		document.getElementById('myChartProvincia'),
		ChartProvin
		);
	</script>
	

	<script>
		const Periodo = [<?php 
			foreach($positividad as $periodo){
			$per = $periodo->PERIODO; echo '"'.$per.'",' ;
		}?>];

		const Pos = [<?php 
			foreach($positividad as $positivo){
			$pos = $positivo->POSITIVOS; echo '"'.$pos.'",' ;
		}?>];

		const Neg = [<?php 
			foreach($positividad as $negativo){
			$neg = $negativo->NEGATIVOS; echo '"'.$neg.'",' ;
		}?>];

		const Porcentaje = [<?php 
			foreach($positividad as $posi){
			$tivi = $posi->POSITIVIDAD; echo '"'.$tivi.'",' ;
		}?>];
		
		const ChartPositividad = {
		type: 'bar',
    	data: {
			labels: Periodo,
			datasets: [	
			{
				label:['POSITIVOS'],
				backgroundColor: 'rgba(249, 32, 32, 0.7)',
				borderColor: 'rgb(166, 32, 24)',
				data: Pos,
				yAxisID:'y',
			},
			{
				label:['NEGATIVOS'],
				backgroundColor: 'rgba(7, 26, 122, 0.7)',
				borderColor: 'rgb(27, 54, 191)',
				data: Neg,
				yAxisID:'y',
			},
			{
				label:['POSITIVIDAD % '],
				backgroundColor: 'rgba(33, 128, 12, 0.7)',
				borderColor: 'rgb(75, 198, 48)',
				data: Porcentaje,
				pointRadius: 5,
				pointHitRadius: 160,
				type:'line',
				yAxisID:'percentage',
			},

			]
    	},

    	options: {

			indexAxis: 'x',
			// Elements options apply to all of the options unless overridden in a dataset
			// In this case, we are setting the border of each horizontal bar to be 2px wide
			elements: {
				bar: {
					borderWidth: 2,
				}
			},
			responsive: true,
			plugins: {
				legend: {
					position: 'top',
				},
				
				filler: {
					propagate: false,
				},
				
				title: {
					display: true,
					text: '2021-2022',
					position:'bottom',
				}
			},
			
			scales:{
				percentage:{
					position:'right',
					title:{
						display:true,
						text:'Índice-Positividad %',
					}
				},
				y:{
					title:{
						display:true,
						position:'left',
						text:'N° Tamizados',
					}
				}
			}
			,

		}
		
	}

	</script>



	<script>
		const myChartDistric = new Chart(
		document.getElementById('myChartDistric'),
		ChartDistric
		);

		const myChartSemanaEpide = new Chart(
		document.getElementById('myChartSemanaEpide'),
		ChartSemEpide
		);

		const myChartSEMaynas = new Chart(
		document.getElementById('myChartSEMaynas'),
		ChartSEMaynas
		);

		const myChartSELoreto = new Chart(
		document.getElementById('myChartSELoreto'),
		ChartSELoreto
		);

		const myChartSEDatem = new Chart(
		document.getElementById('myChartSEDatem'),
		ChartSEDatem
		);

		const myChartSEAlto = new Chart(
		document.getElementById('myChartSEAlto'),
		ChartSEAlto
		);

		const myChartSEPutumayo = new Chart(
		document.getElementById('myChartSEPutumayo'),
		ChartSEPutumayo
		);

		const myChartSECastilla = new Chart(
		document.getElementById('myChartSECastilla'),
		ChartSECastilla
		);

		const myChartSERequena = new Chart(
		document.getElementById('myChartSERequena'),
		ChartSERequena
		);

		const myChartSEUcayali = new Chart(
		document.getElementById('myChartSEUcayali'),
		ChartSEUcayali
		);

		const myChartPositividad = new Chart(
		document.getElementById('myChartPositividad'),
		ChartPositividad
		);
	</script>
	

  @endsection