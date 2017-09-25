jQuery(document).ready(function($)
{
  

   $('.addCartButton').on('click', function(e)
   {
        e.preventDefault();

        var countTalla = $('#cantidad_talla').val();
            countColor = $('#cantidad_color').val();
        
        if(countColor=="1")
        {

            if(countColor > 0 && typeof $('input[name=colorProd]:checked', '#addToCart').val() == 'undefined')
            {
              $('#error_color').css("display","block");
              return false;
            }else
            {
              $('#error_color').css("display","none");
            }
        }


        if(countTalla=="1")
        {
            if(countTalla > 0 && typeof $('input[name=TallaProd]:checked', '#addToCart').val() == 'undefined')
            {
                $('#error_talla').css("display","block");
                return false;
            }else
            {
               $('#error_talla').css("display","none");
            }
        }

        $("#popup_carrito").fancybox().trigger('click');

      

         $.ajax({
            type: "GET",
            url: "../add_cart.php",
            data : "colorProd="+$('input[name=colorProd]:checked', '#addToCart').val()+"&TallaProd="+$('input[name=TallaProd]:checked', '#addToCart').val()+"&cantidad="+$('input[name=cantidad]','#addToCart').val()+"&id_producto="+$('input[name=id_producto]','#addToCart').val(),   
            success: function(data)
            {
               $("#contador_carrito_1").html(data);
               $("#contador_carrito_2").html(data); 
              
            
            }
          });
      
    });




   $('.addCartButton_prenda').on('click', function(e)
   {
        e.preventDefault();

         var countTalla = $('#cantidad_talla_2').val();
            countColor = $('#cantidad_color_2').val();
        
        if(countColor=="1")
        {

            if(countColor > 0 && typeof $('input[name=colorProd]:checked', '#addToCart_prenda').val() == 'undefined')
            {
              $('#error_color_prenda').css("display","block");
              return false;
            }else
            {
              $('#error_color_prenda').css("display","none");
            }

        }

        if(countTalla=="1")
        {
            if(countTalla > 0 && typeof $('input[name=TallaProd]:checked', '#addToCart_prenda').val() == 'undefined')
            {
                $('#error_talla_prenda').css("display","block");
                return false;
            }else
            {
               $('#error_talla_prenda').css("display","none");
            }
        }
        


        $("#popup_carrito").fancybox().trigger('click');

      

         $.ajax({
            type: "GET",
            url: "../add_cart.php",
            data : "colorProd="+$('input[name=colorProd]:checked', '#addToCart_prenda').val()+"&TallaProd="+$('input[name=TallaProd]:checked','#addToCart_prenda').val()+"&cantidad="+$('input[name=cantidad_prenda]','#addToCart_prenda').val()+"&id_producto="+$('input[name=id_producto_prenda]','#addToCart_prenda').val(),   
            success: function(data)
            {
               $("#contador_carrito_1").html(data);
               $("#contador_carrito_2").html(data); 
              
            
            }
          });
      
    });




   $('#btn_finalizar_compra').on('click', function(e)
   {
     // document.getElementById('addToCart').submit();
      window.location.assign("../validacion_cuenta.php");
      return false;
   });


    $('#btn_seguir_compra').on('click', function(e)
   {
      history.back();
   });

});
