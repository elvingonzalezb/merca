<main>
	<div id="hero_register" class="padding_50">
		<div class="alert alert-success" role="alert">
			<?php
				switch($resultado)
				{
					case "activo":
						echo '<div class="alert alert-success" role="alert"><i class="pe-7s-check"></i> <p>Tu cuenta se activó correctamente<br>A partir de ahora podras ingresar a nuestra Web, para realizar compras de nuestros productos.</p></div>';
					break;

					case "noexiste":
						echo '<div class="alert alert-danger" role="alert"><i class="pe-7s-close-circle"></i> <p>Lo sentimos pero no pudimos activar tu cuenta en este momento. <br>Si crees que hubo un error repórtalo con nosotros a través de nuestro <a href="contactanos">Formulario de Contacto.</a></p></div>';
					break;
				}
			?>
		</div>
	</div>
</main>