<html>
<head>
	<style>
	.celda { background:#eee; padding:5px; color: #000; font-weight: 700; border:1px solid #ccc; }
	.contenido { background: #f7f7f7; padding: 5px; color: #333; font-weight: 500; border:1px solid #ccc; }
	</style>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0" style="background:#eee;">
<tr>
	<td width="600" align="center" style="background:#fff;">
		<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="3" height="80" align="center"><img src="<?php echo BASE_URL ?>/assets/frontend/imagenes/logo-top.png"></td>
		</tr>
		<tr>
			<td width="5%" height="5"></td>
			<td width="80%"></td>
			<td width="5%"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<p>Se ha recibido un mensaje desde el formulario de contacto de <?php echo NOMBRE_SITIO; ?>.</p>
				<p>Le mostramos a continuación los datos recibidos:</p>
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
					<td class="contenido"><?php echo $nombre; ?></td>
				</tr>
				<tr>
					<td class="celda">Email</td>
					<td class="contenido"><?php echo $email; ?></td>
				</tr>
				<tr>
					<td class="celda">Telefono</td>
					<td class="contenido"><?php echo $telefono; ?></td>
				</tr>
				<tr>
					<td class="celda">Asunto</td>
					<td class="contenido"><?php echo $asunto; ?></td>
				</tr>
				<tr>
					<td class="celda">Mensaje</td>
					<td class="contenido"><?php echo $mensaje; ?></td>
				</tr>
				<tr>
					<td class="celda">Fecha Ingreso</td>
					<td class="contenido"><?php echo $fecha_ingreso; ?></td>
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