@extends('layouts.base')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
				<div class="alert border-0 border-0 alert-dismissible fade show py-2 MensajeAlerta" style="position: absolute;top: 0px;left: 0px;display: none;"">
					<div class="d-flex align-items-center" style="width: 200px;">
						<div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-success">Registro Correcto</h6>
						</div>
					</div>
				</div>

				<form id="formRegistro" class="row g-3" action="{{url('register')}}" method="POST">
					@csrf
					<div class="text-center">
						<h5 class="">Registro de Usuario</h5>
					</div>
					<br>
					<br>
					<div class="row mb-3">
						<div class="col-sm-3">
							<h6 class="mb-0">Usuario</h6>
						</div>
						<div class="col-sm-9 text-secondary">
							<input type = "text" class = "form-control mb-2" placeholder = "Nombre de Usuario" id = "name" name="name"/>
							<p id="estadousuario" style="color: red"></p> 		
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-3">
							<h6 class="mb-0">Correo</h6>
						</div>
						<div class="col-sm-9 text-secondary">
							<input type = "email" class = "form-control mb-2" placeholder = "Correo" id = "email"name="email"/>
							<p id="estadoemail" style="color: red"></p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-3">
							<h6 class="mb-0">Contraseña</h6>
						</div>
						<div class="col-sm-9 text-secondary">
							<input type = "password" class ="form-control mb-2" placeholder = "Contraseña"  id = "password" name="password"/>
						</div>
					</div>
					<div class="col-4">
						<div class="d-grid" style="text-align: center">
							<button type="submit" class="btn btn-primary btnRegistrar"><i class="bx bxs-lock-open"></i>Registrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<script src="/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>
<!--app JS-->
<script src="assets/js/app.js"></script>



</html>



<script>
		$("#name").keyup(function(){
			var serializedData = $("#formRegistro").serialize();
			$.ajax({
				type: "POST",
				url: "verificanombre",
				data: serializedData,
				dataType: "json",
				success: function (response) {
					if (response['estado']=='Disponible') {
						$("#estadousuario").hide();
						// $("#estadousuario").text('Disponible');
					}else{
						$("#estadousuario").show();
						$("#estadousuario").text('No Disponible');
					}
				}
			});
		});

		$("#email").keyup(function(){
			var serializedData = $("#formRegistro").serialize();
			$.ajax({
				type: "POST",
				url: "verificaemail",
				data: serializedData,
				dataType: "json",
				success: function (response) {
					if (response['estado']=='Disponible') {
						$("#estadoemail").hide();
						// $("#estadousuario").text('Disponible');
					}else{
						$("#estadoemail").show();
						$("#estadoemail").text('No Disponible');
					}
				}
			});
		});

</script>
{{-- try{
		$("input").on('keyup', function(){
			var value = $(this).val().length;
			$("p").html(value);
		}).keyup();
	}catch(e){}}); --}}

<script>
	$(document).on("click",".btnRegistrar",function(e){
		e.preventDefault();
		var serializedData = $("#formRegistro").serialize();
		if (($("#estadousuario").val()=='No Disponible') ||($("#estadoemail").val()=='No Disponible')) {
			
		}else{
			$.ajax({
				type: "POST",
				url: "register",
				data: serializedData,
				dataType: "json",
				success: function (response) {
					round_success_noti();
				}
			});
		// $("#GuardadoModal").modal('show');
		}
		
	});

</script>
