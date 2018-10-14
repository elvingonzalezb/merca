function cargaSubcategorias(id_categoria) {
    if(id_categoria=="0")
    {
        alert('Debe elegir una categoria');
        return false;
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: 'mainpanel/ajax/cargaSubcategoria',
            data: {id_categoria: id_categoria},
            dataType : 'json',
            success: function(json) {
                envio=json.dato;
                cad=envio.split("@@");
                num=cad[0];
                str='';       
                if(num>0)
                {
                    str = '<select name="id_subcategoria" id="id_subcategoria" onchange="cargaProductos(this.value)">';
                    str += '<option value="0">Elija la subcategoria...</option>';
                    for(e=1; e<=num; e++)
                    {
                        dat=cad[e].split("$$");
                        id_subcategoria = dat[0];
                        nombre = dat[1];        
                        str += '<option value="'+id_subcategoria+'">'+nombre+'</option>';                   
                    }
                }
                else
                {
                    str = '<select name="id_subcategoria" id="id_subcategoria">';
                    str += '<option value="0">-------</option>';
                }
                str += '</select>';
                $("#divSubcategorias").html(str);
            }
        });
    } // else
}

function cargaProductos(id_subcategoria) {
    if(id_subcategoria=="0")
    {
        alert('Debe elegir una Subcategoria');
        return false;
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: 'mainpanel/ajax/cargaProductos',
            data: {id_subcategoria: id_subcategoria},
            dataType : 'json',
            success: function(json) {
                envio=json.dato;
                cad=envio.split("@@");
                num=cad[0];
                str='';       
                if(num>0)
                {
                    str = '<select name="id_producto" id="id_producto">';
                    str += '<option value="0">Elija el producto...</option>';
                    for(e=1; e<=num; e++)
                    {
                        dat=cad[e].split("$$");
                        id_producto = dat[0];
                        nom_producto = dat[1];        
                        str += '<option value="'+id_producto+'">'+nom_producto+'</option>';                   
                    }
                }
                else
                {
                    str = '<select name="id_producto" id="id_producto">';
                    str += '<option value="0">-------</option>';
                }
                str += '</select>';
                $("#divProducto").html(str);
            }
        });
    } // else
}
function updateCantidad(id) {
    precio = $("#precio_"+id).val();
       
        $.ajax({
            type: 'POST',
            url: 'frontend/pedidos/actualizar',
            data: {
                carro_id:id,
                precio:precio
              
              },
            dataType : 'json',
            success: function(resultado) {
                if (resultado.estado == 2){
                    swal("Mensaje", resultado.mensaje , "warning");
                }else{
                   $("#pedidos_view").submit();
                    rpt = resultado.dato;
                   
                    new_precio = resultado.new_precio;
                  
                       if(rpt=='ok'){
                        $("#cotizar_view").load(location.href+" #cotizar_view>*","");
                     
                        $('#precio_'+id).val(new_precio);
             
                                    
                    }
                }
            }
        });     
  
}

  function updateComentario(id) {
     precio = $("#precio_"+id).val();
     producto_id =  $("#prodID_"+id).val();
           $.ajax({
            type: 'POST',
            url: 'frontend/pedidos/actualizar',
            data: {
                id_detalle:id,
                precio:precio,
                id_pedido:id_pedido
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