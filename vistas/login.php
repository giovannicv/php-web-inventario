<div class="main-container">
	<!-- para el logo de avatar en el login -->
	<!-- <div class="modal-dialog text-center">
		<div class="col-sm-8">
			<div class="modal-content">
				<div class="col-sm-12">
					<img src="./img/avatarpanadero.png"/>
				</div>
			</div>
		</div>
	</div> -->
    <form class="box login" action="" method="POST" autocomplete="off">
	<!-- <img src="./img/fondopan.jpg"> -->
		<h5 class="title is-5 has-text-centered is-uppercase">Sistema de inventario</h5>

		<div class="field">
			<label class="label">USUARIO</label>
			<div class="control">
			    <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<label class="label">CLAVE</label>
		  	<div class="control">
		    	<input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-success is-rounded">INICIAR SESION</button>
		</p>
	</form>
</div>