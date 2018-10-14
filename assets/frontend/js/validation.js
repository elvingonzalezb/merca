/* FORMULARIO DE CONTACTO */
$('#contactform').submit(function() {
	nombre = $('#nombre').val();
	email = $('#email').val();
    telefono = $('#telefono').val();
	asunto = $('#asunto').val();
	mensaje = $('#mensaje').val();
	captcha = $('#captcha').val();
    if(is.empty(nombre.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su nombre',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
    	$('#nombre').focus();
        return false;
    }
    else if(is.not.email(email) || is.empty(email.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su correo electrónico',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
    	$('#email').focus();
        return false;
    }
     else if(is.empty(telefono.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque el número de teléfono',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#telefono').focus();
        return false;
    }
    else if(is.empty(asunto.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque el asunto del mensaje',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
    	$('#asunto').focus();
        return false;
    }
    else if(is.empty(mensaje.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Escribe tu mensaje',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
    	$('#mensaje').focus();
        return false;
    }
    else {
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function(data) {
            var mensaje = data.split('|');
            if(mensaje[0] === 'success') {
                swal(
                    {
                        title: 'Mercasub',
                        text: mensaje[1],
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#a61493',
                        type : 'error'
                    }
                );
              	grecaptcha.reset();
            }else {
                swal(
                    {
                        title: 'Ha enviado su correo a Mercasub',
                        text: mensaje[1],
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#a61493',
                        type : 'success'


                    }
                );
                $('#nombre, #email, #telefono, #asunto, #mensaje').val('');
                grecaptcha.reset();
            }
          }
        })
        return false;
    }
});

/*FORMULARIO VALIDA COLOR Y CANTIDAD*/
$('#agregarform').submit(function(){
    id_color = $('#id_color').val();
    cantidad = $('#cantidad').val();
    if (id_color == 0){
        swal(
            {
                title: 'Mercasub',
                text: 'Seleccione un color',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        return false;     
    } else if (cantidad == 0 || is.empty(cantidad.trim())){
        swal(
            {
               title: 'Mercasub',
                text: 'Ingresa una cantidad',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        return false;
      
    } else {
   
     
        $('#pedidos_view').submit();
   
      
    }
});

/* FORMULARIO DE INGRESO */
$('#ingresarform').submit(function() {
    email = $('#emailLogin').val();
    clave = $('#claveLogin').val();
    if(is.empty(email.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su email',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#email').focus();
        return false;
    }
    else if(is.not.email(email) || is.empty(email.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque dirección de correo valida',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#email').focus();
        return false;
    }
     else if(is.empty(clave.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque clave de acceso',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#clave').focus();
        return false;
    }
  
});

/*FORMULARIO DE REGISTRO*/
$('#registerform').submit(function(){
    nombres = $('#nombres').val();
    apellidos = $('#apellidos').val();
    telefono = $('#telefono').val();
    email = $('#email').val();
    clave = $('#clave').val();
    clave2 = $('#clave2').val();
    if(is.empty(nombres.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su nombre',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#nombres').focus();
        return false;
    }
    else if(is.empty(apellidos.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su apellido',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#apellidos').focus();
        return false;
    }
        else if(is.empty(telefono.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su teléfono',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#telefono').focus();
        return false;
    }

   else if(is.empty(email.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque su email',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#email').focus();
        return false;
    }
  
    else if(is.not.email(email) || is.empty(email.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque dirección de correo valida',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#email').focus();
        return false;
    }
     else if(is.empty(clave.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque clave de acceso',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#clave').focus();
        return false;
    }
    else if(is.empty(clave2.trim())) {
        swal(
            {
                title: 'Mercasub',
                text: 'Coloque repetir clave de acceso',
                html: true,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#a61493',
                type : 'warning'
            }
        );
        $('#clave2').focus();
        return false;
    }
    
    
});


/* ELIMINAR PEDIDO INDIVIDUALES */
function deleteItem(id) {
    swal({
        title: "Mercasub",
        text: "¿Está seguro que desea eliminar el pedido?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#a61493",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/eliminaItemPedido',
            data: { id: id},
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt == 'ok'){
                    swal({
                        title: 'Mercasub',
                        text: 'El pedido fue eliminado.',
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#a61493',
                        type : 'success'
                    },function(){}
                    );
               
                    $("#pedidos_view").load(location.href+" #pedidos_view>*","");
                 
                    $('#numItem').text(resultado.num);
                    if(resultado.num == 0){
                        $('.shopping-cart').addClass('vacio');
                        $('.vacio').html('Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a>');
                    }
                }
            }
        });
    });
}




function eliminaPedidos() {
    swal({
      title: "Mercasub",
      text: "Esta a punto de eliminar su pedido. ¿Esta seguro que desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#a61493",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
      closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/eliminaPedidos',
            data: { },
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt=='ok'){
                    $('.shop_cart_table').addClass('vacio');
                    $('.vacio').html('<h3>Su lista está vacía. Dirígete a la sección de nuestros productos para realizar una nueva solicitud de cotización dando click <a href="catalogo">aquí</a></h3>');
                    $('#numItem').text(resultado.num);
                    swal({
                            title: 'Mercasub',
                            text: 'Su lista ha sido eliminada.',
                            html: true,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#a61493',
                            type : 'success'
                        },
                        function(){}
                    );
                }
            }
        });
    });
}

function updateCantidad(id) {
    precio = $("#precio_"+id).val();
    subtotal = $("#subtotal_"+id).val();
    aux =  $("#cant_"+id).val();
    cantidad = parseInt(aux);
    if( cantidad == 0 || isNaN(cantidad) || (aux.trim()) === '' ) {
        $("#cant_"+id).focus();
        return false;
    }else {
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/actualizaPedido',
            data: {
                carro_id:id,
                precio:precio,
                subtotal:subtotal,
                cantidad:cantidad
              },
            dataType : 'json',
            success: function(resultado) {
                if (resultado.estado == 2){
                    swal("Mensaje", resultado.mensaje , "warning");
                }else{
                   $("#pedidos_view").submit();
                    rpt = resultado.dato;
                    new_cantidad = resultado.new_cantidad;
                    new_precio = resultado.new_precio;
                    new_subtotal = resultado.new_subtotal;
                       if(rpt=='ok'){
                        $("#pedidos_view").load(location.href+" #pedidos_view>*","");
                        $('#cant_'+id).val(new_cantidad);
                        $('#precio_'+id).val(new_precio);
                        $('#subtotal__'+id).val(new_subtotal_);
                                    
                    }
                }
            }
        });     
    }
}

  function updateComentario(id) {
    observaciones =  $("#comen_"+id).val();
    producto_id =  $("#prodID_"+id).val();
           $.ajax({
            type: 'POST',
            url: 'frontend/ajax/actualizaPedido',
            data: {
                carro_id:id,
                observaciones:observaciones,
                producto_id:producto_id
            },
            dataType : 'json',
            success: function(resultado) {
             
               rpt = resultado.dato;
                if(rpt=='ok'){
                    $("#pedidos_view").load(location.href+" #pedidos_view>*","");
                 
                }
            }
        });     
}






