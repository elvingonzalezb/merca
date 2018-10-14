function deleteArticulo(id_articulo) {
    $('#tituloModal').html('Esta a punto de borrar este artículo!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/articulos/borrar/'+id_articulo+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteServicio(id_servicio) {
    $('#tituloModal').html('Esta a punto de borrar este servicio!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/servicios/borrar/'+id_servicio+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteInformativa(id) {
    $('#tituloModal').html('Esta a punto de borrar esta Información general!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/informativa/borrar/'+id+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}


function deleteBanner(id_banner) {
    $('#tituloModal').html('Esta a punto de borrar este banner!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/banners/delete/'+id_banner+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteBannerLateral(id_banner) {
    $('#tituloModal').html('Esta a punto de borrar este banner lateral!');
    $('#cuerpoModal').html('<p>Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/bannerslateral/delete/'+id_banner+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteUsuario(id_usuario) {
    $('#tituloModal').html('Esta a punto de borrar este Usuario!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn " data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/usuarios/delete/'+id_usuario+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteClientes(id_cliente) {
    $('#tituloModal').html('Esta a punto de borrar este Cliente!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/clientes/delete/'+id_cliente+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteGaleria(id_galeria) {
    $('#tituloModal').html('Esta a punto de borrar este Imagen de la Galeria!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/galeria/delete/'+id_galeria+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteFlota(id_flota) {
    $('#tituloModal').html('Esta a punto de borrar esta la flota!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/flota/delete/'+id_flota+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteCategoria(id_categoria) {
    $('#tituloModal').html('¡Esta a punto de borrar la categoria!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/catalogo/borrarCategoria/'+id_categoria+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteSubCategoria(id_subcategoria) {
    $('#tituloModal').html('¡Esta a punto de borrar la Subcategoria!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/catalogo/borrarSubCategoria/'+id_subcategoria+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteProducto(id_producto) {
    $('#tituloModal').html('¡Esta a punto de borrar el producto!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/catalogo/borrarProducto/'+id_producto+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteColor(id_color) {
    $('#tituloModal').html('¡Esta a punto de borrar el color!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn" data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/colores/borrar/'+id_color+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function deleteEditProductoColor(id_prodxcolor) {
    $('#tituloModal').html('¡Opciones del color seleccionado!');
    $('#cuerpoModal').html('<p>Seleccione editar para modificar o eliminar para borrar el color.</p>');
    str = '<a href="mainpanel/catalogo/editVariedadColor/'+id_prodxcolor+'" class="btn btn-info">EDITAR</a>';
    str += '<a href="mainpanel/catalogo/borrarVariedadColor/'+id_prodxcolor+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show'); 
}
function deleteRegistroUsuario(id_usuario) {
    $('#tituloModal').html('Esta a punto de borrar este Usuario registrado!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn " data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/registro_usuarios/borrar/'+id_usuario+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}
function deleteMensaje(id_mensaje) {
    $('#tituloModal').html('Esta a punto de borrar este Mensaje!');
    $('#cuerpoModal').html('<p>Esta accion no puede deshacerse. Esta seguro que quiere hacerlo?</p>');
    str = '<a href="#" class="btn " data-dismiss="modal">CANCELAR</a>';
    str += '<a href="mainpanel/contactanos/borrar/'+id_mensaje+'" class="btn btn-danger">BORRAR</a>';
    $('#botoneraModal').html(str);
    $('#botoneraModal').show();
    $('#myModal').modal('show');   
}

function url_amigable(campo, url , title) {
    var nombreFormateado = "";
    //var nombre = document.getElementById(campo).value;
    var nombre = $("#"+campo).val();
    primerFormateo = quitaAcentos(nombre);
    segundoFormateo = primerFormateo.toLowerCase(nombre);
    arrayNombre = segundoFormateo.split(" ");
    for($i=0; $i<arrayNombre.length; $i++) 
    {
        if(arrayNombre.length==1)
        {
            nombreFormateado = arrayNombre[$i];
        }
        else if($i<arrayNombre.length-1)
        {
            nombreFormateado = nombreFormateado.concat(arrayNombre[$i])+"-";
        }
        else if($i==arrayNombre.length-1) {
            nombreFormateado = nombreFormateado.concat(arrayNombre[$i]);
        }
    }

    $("#"+title).val(nombre);
    $("#"+url).val(nombreFormateado);
}

function quitaAcentos(str){
    for (var i=0;i<str.length;i++)
    {
        //Sustituye "á é í ó ú"
        if (str.charAt(i)=="á") str = str.replace(/á/,"a");
        if (str.charAt(i)=="é") str = str.replace(/é/,"e");
        if (str.charAt(i)=="í") str = str.replace(/í/,"i");
        if (str.charAt(i)=="ó") str = str.replace(/ó/,"o");
        if (str.charAt(i)=="ú") str = str.replace(/ú/,"u");
        if (str.charAt(i)=="Á") str = str.replace(/Á/,"a");
        if (str.charAt(i)=="É") str = str.replace(/É/,"e");
        if (str.charAt(i)=="Í") str = str.replace(/Í/,"i");
        if (str.charAt(i)=="Ó") str = str.replace(/Ó/,"o");
        if (str.charAt(i)=="Ú") str = str.replace(/Ú/,"u");
        if (str.charAt(i)=="ñ") str = str.replace(/ñ/,"n");
        if (str.charAt(i)=="Ñ") str = str.replace(/Ñ/,"n");
        if (str.substr(i,1)=="(") str = str.replace("(","");
        if (str.substr(i,1)==")") str = str.replace(")","");
        if (str.substr(i,1)=="/") str = str.replace("/","");
        if (str.substr(i,1)=="-") str = str.replace(" - ","-");
        if (str.substr(i,1)=="-") str = str.replace("-","");
        if (str.substr(i,1)=="&") str = str.replace("&","");
    }
    return str;
}


