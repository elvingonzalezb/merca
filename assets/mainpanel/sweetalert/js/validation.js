//////////////CATEGORIA/////////////
function validaCategoria() {
    nom_cat = $("#nom_cat").val();
    imagen = $("#imagen").val();
    orden = $("#orden").val();
  
    if(nom_cat=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre de la categoria'})
          return false;
    }

    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen de la categoria'})
          return false;
    }

    if(orden=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar orden de la categoria'})
          return false;
    }
      if(isNaN(orden))
    {
        swal({type: 'error',
             title: '¡Campo Invalido!',
             text: 'Debe ingresar solo números'})
             return false;
    }
}
//////////////SUBCATEGORIA/////////////
function validaSubCategoria() {
    categoria = $("#id_categoria").val();
    nombre = $("#nombre").val();
    imagen = $("#imagen").val();
    orden = $("#orden").val();

    if(categoria<=0)
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre de la categoria'})
          return false;
        
    }
  
    if(nombre=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre de la subcategoria'})
          return false;
        
    }
    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen de la subcategoria'})
          return false;
    }
 
    if(orden=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar orden de la subcategoria'})
          return false;
    }
      if(isNaN(orden))
    {
        swal({type: 'error',
             title: '¡Campo Invalido!',
             text: 'Debe ingresar solo números'})
             return false;
    }
}
//////////////PRODUCTO POR COLOR/////////////
function validaProductoVarColor() {
    categoria = $("#id_categoria").val();
    subcategoria = $("#id_subcategoria").val();
    producto = $("#id_producto").val();
    color = $("#id_color").val();
  
    if(categoria<=0)
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre de la categoria'})
          return false;
        
    }
    if(subcategoria<=0)
    {
          swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre de la subcategoria'})
          return false;        
    } 
    if(producto<=0)
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre del producto'})
          return false;
    }
    if(color<=0)
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar el color'})
          return false;
    }

}
//////////////PRODUCTO/////////////
function validaProducto() {
    categoria = $("#id_categoria").val();
    subcategoria = $("#id_subcategoria").val();
    producto = $("#nom_producto").val();
    codigo = $("#codigo").val();
    imagen = $("#imgprod").val();
   
  
    if(categoria<=0)
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe seleccionar una categoria del combo'})
          return false;
        
    }
    if(subcategoria<=0)
    {
          swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe seleccionar una subcategoria del combo'})
          return false;        
    } 
    if(producto=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar nombre del producto'})
          return false;
    }
    if(codigo=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar código del producto'})
          return false;
    }
    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen del producto'})
          return false;
    }
}
//////////////ARTICULO/////////////
function validaArticulo() {
    titulo = $("#titulo").val();
    imagen = $("#imagen").val();
   
    if(titulo=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar titulo del articulo'})
          return false;
    }
  
    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen del articulo'})
          return false;
    }
}
//////////////BANNER/////////////
function validaBanner() {
    imagen = $("#banner").val();
  
    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen del banner'})
          return false;
    }
}
//////////////BANNER LATERAL/////////////
function validaBannerlateral() {
    imagen = $("#banner").val();
  
    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar una imagen del banner lateral'})
          return false;
    }
}
//////////////STOCK/////////////
function validaStock() {
    titulo = $("#titulo").val();
    imagen = $("#imagen").val();
    archivo = $("#archivo").val();
  
    if(titulo=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar un titulo al Stock'})
          return false;
    }

    if(imagen=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe subir una imagen del stock'})
          return false;
    }

    if(archivo=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe subir un archivo PDF del stock'})
          return false;
    }
}
//////////////COLOR/////////////
function validaColor() {
    nombre_color = $("#nombre_color").val();
  
    if(nombre_color=="")
    {
        swal({type: 'error',
          title: '¡Campo Requerido!',
          text: 'Debe ingresar un nombre de color'})
          return false;
    }
}
//////////////LOGIN/////////////
function validaLogin() {
    emailLogin = $("#emailLogin").val();
    if(emailLogin=="")
    {
        $.sweetModal({
            content: 'Debe ingresar su correo electrónico',
            icon: $.sweetModal.ICON_ERROR,
            buttons: [
                {
                    label: 'CERRAR',
                    classes: 'redB'
                }
            ]
        });
        $("#emailLogin").focus();
        return false;         
    }

    claveLogin = $("#claveLogin").val();
    if(claveLogin=="")
    {
        $.sweetModal({
            content: 'Debe ingresar su clave',
            icon: $.sweetModal.ICON_ERROR,
            buttons: [
                {
                    label: 'CERRAR',
                    classes: 'redB'
                }
            ]
        });
        $("#claveLogin").focus();
        return false;         
    }
}








function chequea_email(emailStr) {
    if(emailStr=="")
    {
        return false;
    }   
    /* Verificar si el email tiene el formato user@dominio. */
    var emailPat=/^(.+)@(.+)$/ 
    /* Verificar la existencia de caracteres. ( ) < > @ , ; : \ " . [ ] */
    var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]" 
    /* Verifica los caracteres que son válidos en una dirección de email */
    var validChars="\[^\\s" + specialChars + "\]" 
    var quotedUser="(\"[^\"]*\")" 
    /* Verifica si la dirección de email está representada con una dirección IP Válida */ 
    var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
    /* Verificar caracteres inválidos */ 
    var atom=validChars + '+'
    var word="(" + atom + "|" + quotedUser + ")"
    var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
    //domain, as opposed to ipDomainPat, shown above. */
    var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
    var matchArray=emailStr.match(emailPat)
    if (matchArray==null)
    {
        return false
    }
    var user=matchArray[1]
    var domain=matchArray[2]
    // Si el user "user" es valido 
    if (user.match(userPat)==null)
    {
        // Si no
        return false
    }
    /* Si la dirección IP es válida */
    var IPArray=domain.match(ipDomainPat)
    if (IPArray!=null)
    {
        for (var i=1;i<=4;i++)
        {
            if (IPArray[i]>255)
            {
            return false
            }
        }
        //return true
    }
    var domainArray=domain.match(domainPat)
    if (domainArray==null)
    {
        return false
    }
    var atomPat=new RegExp(atom,"g")
    var domArr=domain.match(atomPat)
    var len=domArr.length
    if (domArr[domArr.length-1].length<2 || domArr[domArr.length-1].length>3) 
    {
        return false
    }
    if (len<2)
    {
        return false
    }
    return true;
}

