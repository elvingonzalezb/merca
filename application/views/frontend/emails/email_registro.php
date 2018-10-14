<html>
<head>
	<style>
	.celda { background:#eee; padding:5px; color: #000; font-weight: 700; border:1px solid #ccc; }
	.contenido { background: #f7f7f7; padding: 5px; color: #333; font-weight: 500; border:1px solid #ccc; }
	.texto18 { font-size: 18px; }
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
			<td class="texto18">
				<p>Estimado <strong>"<?php echo $nombres_contacto.' '.$apellidos_contacto; ?>"</strong>. </p>
				<p>Gracias por registrar a <?php echo $nombre_institucion; ?> en tu Plan "<?php echo $nombre_plan; ?>". </p>
				<p>A la brevedad nos pondremos en contacto contigo para realizar la validación de tus datos, y posteriormente recibirás la confirmación de tu registro.</p>
				<p>Gracias por confiar en <strong>LogrosPeru.com</strong></p>
				<p>Un abrazo,</p>
				<p><strong>Tu equipo de LogrosPeru.com</strong></p>
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