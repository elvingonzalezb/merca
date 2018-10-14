<html>
<head>
	<style>
	.celda { background:#eee; padding:5px; color: #000; font-weight: 700; border:1px solid #ccc; }
	.contenido { background: #f7f7f7; padding: 5px; color: #333; font-weight: 500; border:1px solid #ccc; }
	.boton { background: #a61493; color:#fff; padding: 7px 20px; text-decoration: none; border-radius: 5px; }
	p a .boton{ color #FFF; }
	</style>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0" style="background:#eee;">
<tr>
	<td width="600" align="center" style="background:#fff;">
		<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="3" height="80" align="center"><img src="<?php echo base_url(); ?>/assets/frontend/images/logo.png"></td>
		</tr>
		<tr>
			<td width="5%" height="5"></td>
			<td width="80%"></td>
			<td width="5%"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td><h1>Felicitaciones!</h1></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" height="5"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<p>Hemos recibido una solicitud de registro de su parte en <?php echo NOMBRE_SITIO; ?></p>
				<p>A continuación le mostramos los datos de su registro:</p>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" height="5"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td class="celda">Nombre</td>
					<td class="contenido"><?php echo $nombres; ?></td>
				</tr>
				<tr>
					<td class="celda">Apellidos</td>
					<td class="contenido"><?php echo $apellidos; ?></td>
				</tr>
				<tr>
					<td class="celda">Teléfono</td>
					<td class="contenido"><?php echo $telefono; ?></td>
				</tr>
				<tr>
					<td class="celda">Email</td>
					<td class="contenido"><?php echo $email; ?></td>
				</tr>
				<tr>
					<td class="celda">Clave</td>
					<td class="contenido"><?php echo $clave; ?></td>
				</tr>
				</table>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" height="5"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<p>Puede empezar a usar nuestros servicios. Para ello haga click en el siguiente link:<br><br>
					<a href="<?php echo base_url().'ingresar_registrate' ?>" class="boton">INGRESAR</a></p>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" height="5"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<p>Atte.</p>
				<p><strong>El equipo de <?php echo DOMINIO_SITIO; ?></strong></p>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" height="5"></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</body>