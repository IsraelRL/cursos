<div class="container top30">
	<div class="row">
		<div class="col-md-5 text-left nopaddingxs">
			<a href="index.php">
				<img src="images/logo.png" width="200px;">
			</a>
			<?php if (isset($_SESSION['name'])){ ?>
			<a href="arouestyinicio/usuario.php" style="float: right; margin-top: 26px; color: #CCC;">
				[Configuración de usuario]
			</a>
			<?php } ?>
		</div>
		<div class="col-md-5 text-right top20">
			<div class="widget widget_search">
				<form method="get" class="searchform form-inline" action="#">
					<div class="form-group">
						<input 
						type="text" 
						value="" 
						name="search" 
						class="form-control formblack"
						placeholder="Escriba su búsqueda aquí..." 
						id="modal-search-input">
					</div>
					<button type="submit" class="theme_button input_button buttonmag">
						Search
					</button>
				</form>
			</div>
			<!-- eof main nav -->
			<span class="toggle_menu">
				<span></span>
			</span>
		</div>
		<div class="col-md-2 header-contacts text-center hidden-xs top25">
			<a href="sistema/cerrar.php"><img src="images/login.png"></a>
		</div>
	</div>
</div>