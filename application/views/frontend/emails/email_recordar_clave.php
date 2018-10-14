<html>
<head>
	<style>
	.celda { background:#eee; padding:5px; color: #000; font-weight: 700; border:1px solid #ccc; }
	.contenido { background: #f7f7f7; padding: 5px; color: #333; font-weight: 500; border:1px solid #ccc; }
	.boton { background: #337ab7; color:#fff; padding: 7px 20px; text-decoration: none; border-radius: 5px; }
	</style>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0" style="background:#eee;">
<tr>
	<td width="600" align="center" style="background:#fff;">
		<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="3" height="80" align="center"><img src="<?php echo base_url(); ?>/assets/frontend/imagenes/logo-top.png"></td>
		</tr>
		<tr>
			<td width="5%" height="5"></td>
			<td width="80%"></td>
			<td width="5%"></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td><strong>Estimado: <?php echo $nombre.' ' .$apellidos; ?></strong></td>
			<td></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>
				<p>Hemos recibido una solicitud para recuperar su clave de usuario en <?php echo NOMBRE_SITIO; ?></p>
				<p>Su clave es:</p>
				<h3><?php echo $clave; ?></h3>
			</td>
			<td></td>
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