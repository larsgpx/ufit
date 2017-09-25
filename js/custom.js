function captar_filtro(THIS){

      link = $(THIS).attr("data_link");
      
      if(link == 'link_row'){
          $(THIS).parent().parent().each(function(){
              $(this).find('span').removeClass('active');
          });
      }

      $(THIS).addClass('active');
      var option       = "filtro_producto";
      
      var data_catego  = '';//$(THIS).attr("data_catego");
      var tipo         = $(THIS).attr("tipo");
      var cantidades   = $(THIS).attr("cantidades");
      var marca        = $(THIS).attr("marca");
      var filtro       = $(THIS).attr("data");
      var subfiltro    = $(THIS).attr("data2");
      var categoria    = $(THIS).attr("categoria");
      var subcategoria = $(THIS).attr("subcategoria");
      var url          = $("#base_url").html();
      var url_final    = url + 'admin/gestion-mantenimiento';
      var cantidad     = 0;


     

      $.ajax({
                          url : url_final,
                          type:'POST',
                          data:{   
                                   data_catego  :  data_catego,
                                   url          :  url,
                                   option       :  option,   
                                   tipo         :  tipo,
                                   filtro       :  filtro,
                                   cantidades   :  cantidades,
                                   subfiltro    :  subfiltro,
                                   categoria    :  categoria,
                                   marca        :  marca,
                                   subcategoria :  subcategoria
                          },
                          success:function(data)
                          { console.log(data);

                              if(data!="")
                              {    
                                  object = JSON.parse(data);
                                  
                                  $i = 0; lista = '';

                                   /******************************************************************************************/
                                  $columna_tipo    = (object['n_columnas']['columna_tipo'] == 0) ? 2 : object['n_columnas']['columna_tipo'];
                                  $c = 0;
                                  $num_columna_dis = $columna_tipo ;; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)
                                  $col = 12/$num_columna_dis;console.log(object['n_columnas']['columna_tipo']);
                                  /******************************************************************************************/
                                  
                                  $.each(object['productos'], function(index, itemData) 
                                  {
                                    cantidad++;
                                    $i++;
                                    cantidad_total=itemData['total'];

                                    if($c == 0)
                                    { 
                                      lista+= '<div class="row">';
                                    }
                                    $c++;

                                    lista+= '<a class="img_producto" href="'+itemData['url']+'">';
                                       lista+= '<div class="col-xs-'+$col+' fuente_georgia columna">';
                                          lista+= '<img src="'+itemData['foto']+'" alt="" class="img-responsive">';
                                          lista+= '<div class="height-10"></div>';
                                          lista+= '<h4 class="text-center section-title font_size13" style="color: #333">'+itemData['titulo']+' - '+itemData['marca']+'</h4>';
                                          lista+= '<hr>';
                                          
                                          lista+= '<div class="text-center font_size16 precio"><span>';
                                          
                                          if (itemData['preciopro']!="0") 
                                          {
                                              lista+= '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '+itemData['preciopro']+' </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                              lista+= '&nbsp; &nbsp; &nbsp; Ahora: S/.  '+itemData['precio'];
                                          }else
                                          {
                                              lista+= 'S/. '+itemData['precio'];
                                          }
                                          

                                          lista+= '</span></div>';

                                       lista+= '</div>';
                                    lista+= '</a>';
                                       
                                    if($c == $num_columna_dis)
                                    {
                                        $c = 0;
                                        lista+='</div>';
                                    }
                                     
                                  });

                                  $("#ver_mas").css("display","block");
                                  $("#ordenar_productos").html(lista); console.log(data);
                                  $("#total_items").html(cantidad_total); console.log(data);
                                  
                                  $("#boton_mostrar").attr("cantidades",cantidad);
                                  $("#cantidad_mostrar").html(cantidad); console.log(data);
                                  $("#total_mostrar").html(cantidad_total); console.log(data);
                                 
                                  if($("#total_mostrar").html()==cantidad)
                                  {
                                    $("#boton_mostrar").css("display","none");
                                  }else
                                  {
                                    $("#boton_mostrar").css("display","block");
                                  }

                                   $("#boton_mostrar").attr("data",filtro);
                                   $("#boton_mostrar").attr("data2",subfiltro);
                                   $("#boton_mostrar").attr("marca",marca);



                              }else
                              { 
                                  $("#boton_mostrar").css("display","none");
                                  $("#ver_mas").css("display","none");
                                  $("#ordenar_productos").html(data); console.log(data);
                                  $("#total_items").html(cantidad); console.log(data);
                              }

                              

                                  //mensaje.hide(9000);
                          }
      });
}



function captar_filtro_descuento(THIS){

      link = $(THIS).attr("data_link");
      
      if(link == 'link_row'){
          $(THIS).parent().parent().each(function(){
              $(this).find('span').removeClass('active');
          });
      }

      $(THIS).addClass('active');
      var option       = "filtro_producto_descuento";
      var data_catego  = $(THIS).attr("data_catego");
      var tipo         = $(THIS).attr("tipo");
      var cantidades   = $(THIS).attr("cantidades");
      var marca        = $(THIS).attr("marca");
      var filtro       = $(THIS).attr("data");
      var subfiltro    = $(THIS).attr("data2");
      var categoria    = $(THIS).attr("categoria");
      var subcategoria = $(THIS).attr("subcategoria");
      var url          = $("#base_url").html();
      var url_final    = url + 'admin/gestion-mantenimiento';
      var cantidad     = 0;


     

      $.ajax({
                          url : url_final,
                          type:'POST',
                          data:{   
                                   data_catego   :  data_catego,
                                   url           :  url,
                                   option        :  option,   
                                   tipo          :  tipo,
                                   filtro        :  filtro,
                                   cantidades    :  cantidades,
                                   subfiltro     :  subfiltro,
                                   categoria     :  categoria,
                                   marca         :  marca,
                                   subcategoria  :  subcategoria
                          },
                          success:function(data)
                          { console.log(data);

                              if(data!="")
                              {    
                                  object = JSON.parse(data);
                                  
                                  $i = 0; lista = '';

                                   /******************************************************************************************/
                                  $columna_tipo    = (object['n_columnas']['columna_tipo'] == 0) ? 2 : object['n_columnas']['columna_tipo'];
                                  $c = 0;
                                  $num_columna_dis = $columna_tipo ;; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)
                                  $col = 12/$num_columna_dis;console.log(object['n_columnas']['columna_tipo']);
                                  /******************************************************************************************/
                                  
                                  $.each(object['productos'], function(index, itemData) 
                                  {
                                    cantidad++;
                                    $i++;
                                    cantidad_total=itemData['total'];

                                    if($c == 0)
                                    { 
                                      lista+= '<div class="row">';
                                    }
                                    $c++;

                                    lista+= '<a class="img_producto" href="'+itemData['url']+'">';
                                       lista+= '<div class="col-xs-'+$col+' fuente_georgia columna">';
                                          lista+= '<img src="'+itemData['foto']+'" alt="" class="img-responsive">';
                                          lista+= '<div class="height-10"></div>';
                                          lista+= '<h4 class="text-center section-title font_size13" style="color: #333">'+itemData['titulo']+' - '+itemData['marca']+'</h4>';
                                          lista+= '<hr>';
                                          
                                          lista+= '<div class="text-center font_size16 precio"><span>';
                                          
                                          if (itemData['preciopro']!="0") 
                                          {
                                              lista+= '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '+itemData['preciopro']+' </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                              lista+= '&nbsp; &nbsp; &nbsp; Ahora: S/.  '+itemData['precio'];
                                          }else
                                          {
                                              lista+= 'S/. '+itemData['precio'];
                                          }
                                          

                                          lista+= '</span></div>';

                                       lista+= '</div>';
                                    lista+= '</a>';
                                       
                                    if($c == $num_columna_dis)
                                    {
                                        $c = 0;
                                        lista+='</div>';
                                    }
                                     
                                  });

                                  $("#ver_mas").css("display","block");
                                  $("#ordenar_productos").html(lista); console.log(data);
                                  $("#total_items").html(cantidad_total); console.log(data);
                                  
                                  $("#boton_mostrar").attr("cantidades",cantidad);
                                  $("#cantidad_mostrar").html(cantidad); console.log(data);
                                  $("#total_mostrar").html(cantidad_total); console.log(data);
                                 
                                  if($("#total_mostrar").html()==cantidad)
                                  {
                                    $("#boton_mostrar").css("display","none");
                                  }else
                                  {
                                    $("#boton_mostrar").css("display","block");
                                  }

                                   $("#boton_mostrar").attr("data",filtro);
                                   $("#boton_mostrar").attr("data2",subfiltro);
                                   $("#boton_mostrar").attr("marca",marca);



                              }else
                              {
                                  $("#ver_mas").css("display","none");
                                  $("#ordenar_productos").html(data); console.log(data);
                                  $("#total_items").html(cantidad); console.log(data);
                              }

                              

                                  //mensaje.hide(9000);
                          }
      });
}








function captar_filtro_recien_llegados(THIS){



      link = $(THIS).attr("data_link");
      
      if(link == 'link_row'){
          $(THIS).parent().parent().each(function(){
              $(this).find('span').removeClass('active');
          });
      }

      $(THIS).addClass('active');
      var option       = "filtro_producto_recien_llegado";
      var data_catego  = $(THIS).attr("data_catego");
      var tipo         = $(THIS).attr("tipo");
      var cantidades   = $(THIS).attr("cantidades");
      var marca        = $(THIS).attr("marca");
      var filtro       = $(THIS).attr("data");
      var subfiltro    = $(THIS).attr("data2");
      var categoria    = $(THIS).attr("categoria");
      var subcategoria = $(THIS).attr("subcategoria");
      var url          = $("#base_url").html();
      var url_final    = url + 'admin/gestion-mantenimiento';
      var cantidad     = 0;


     

      $.ajax({
                          url : url_final,
                          type:'POST',
                          data:{   
                                   data_catego:data_catego,
                                   url        :  url,
                                   option     :  option,   
                                   tipo       :  tipo,
                                   filtro     :  filtro,
                                   cantidades :  cantidades,
                                   subfiltro  :  subfiltro,
                                   categoria  :  categoria,
                                   marca      :  marca,
                                   subcategoria  :  subcategoria
                          },
                          success:function(data)
                          { 

                              if(data!="")
                              {    
                                  object = JSON.parse(data);
                                  
                                  $i = 0; lista = '';

                                   /******************************************************************************************/
                                  $columna_tipo    = (object['n_columnas']['columna_tipo'] == 0) ? 2 : object['n_columnas']['columna_tipo'];
                                  $c = 0;
                                  $num_columna_dis = $columna_tipo ;; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)
                                  $col = 12/$num_columna_dis;
                                  /******************************************************************************************/
                                  
                                  $.each(object['productos'], function(index, itemData) 
                                  {
                                    cantidad++;
                                    $i++;
                                    cantidad_total=itemData['total'];

                                    if($c == 0)
                                    { 
                                      lista+= '<div class="row">';
                                    }
                                    $c++;

                                    lista+= '<a class="img_producto" href="'+itemData['url']+'">';
                                       lista+= '<div class="col-xs-'+$col+' fuente_georgia columna">';
                                          lista+= '<img src="'+itemData['foto']+'" alt="" class="img-responsive">';
                                          lista+= '<div class="height-10"></div>';
                                          lista+= '<h4 class="text-center section-title font_size13" style="color: #333">'+itemData['titulo']+' - '+itemData['marca']+'</h4>';
                                          lista+= '<hr>';
                                          
                                          lista+= '<div class="text-center font_size16 precio"><span>';
                                          
                                          if (itemData['preciopro']!="0") 
                                          {
                                              lista+= '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '+itemData['preciopro']+' </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                              lista+= '&nbsp; &nbsp; &nbsp; Ahora: S/.  '+itemData['precio'];
                                          }else
                                          {
                                              lista+= 'S/. '+itemData['precio'];
                                          }
                                          

                                          lista+= '</span></div>';

                                       lista+= '</div>';
                                    lista+= '</a>';
                                       
                                    if($c == $num_columna_dis)
                                    {
                                        $c = 0;
                                        lista+='</div>';
                                    }
                                     
                                  });

                                  $("#ver_mas").css("display","block");
                                  $("#ordenar_productos").html(lista); 
                                  $("#total_items").html(cantidad_total); 
                                  
                                  $("#boton_mostrar").attr("cantidades",cantidad);
                                  $("#cantidad_mostrar").html(cantidad); 
                                  $("#total_mostrar").html(cantidad_total); 
                                 
                                  if($("#total_mostrar").html()==cantidad)
                                  {
                                    $("#boton_mostrar").css("display","none");
                                  }else
                                  {
                                    $("#boton_mostrar").css("display","block");
                                  }

                                   $("#boton_mostrar").attr("data",filtro);
                                   $("#boton_mostrar").attr("data2",subfiltro);
                                   $("#boton_mostrar").attr("marca",marca);



                              }else
                              {
                                  $("#ver_mas").css("display","none");
                                  $("#ordenar_productos").html(data); console.log(data);
                                  $("#total_items").html(cantidad); console.log(data);
                              }

                              

                                  //mensaje.hide(9000);
                          }
      });
}




function captar_filtro_comprar_marca(THIS){

      link = $(THIS).attr("data_link");
      
      if(link == 'link_row'){
          $(THIS).parent().parent().each(function(){
              $(this).find('span').removeClass('active');
          });
      }

      $(THIS).addClass('active');
      var option       = "filtro_producto_comprar_marca";
      var data_catego  = $(THIS).attr("data_catego");
      var tipo         = $(THIS).attr("tipo");
      var cantidades   = $(THIS).attr("cantidades");
      var marca        = $(THIS).attr("marca");
      var filtro       = $(THIS).attr("data");
      var subfiltro    = $(THIS).attr("data2");
      var categoria    = $(THIS).attr("categoria");
      var subcategoria = $(THIS).attr("subcategoria");
      var url          = $("#base_url").html();
      var url_final    = url + 'admin/gestion-mantenimiento';
      var cantidad     = 0;


     

      $.ajax({
                          url : url_final,
                          type:'POST',
                          data:{   
                                   data_catego: data_catego,
                                   url        :  url,
                                   option     :  option,   
                                   tipo       :  tipo,
                                   filtro     :  filtro,
                                   cantidades :  cantidades,
                                   subfiltro  :  subfiltro,
                                   categoria  :  categoria,
                                   marca      :  marca,
                                   subcategoria  :  subcategoria
                          },
                          success:function(data)
                          { console.log(data);

                              if(data!="")
                              {    
                                  object = JSON.parse(data);
                                  
                                  $i = 0; lista = '';

                                   /******************************************************************************************/
                                  $columna_tipo    = (object['n_columnas']['columna_tipo'] == 0) ? 2 : object['n_columnas']['columna_tipo'];
                                  $c = 0;
                                  $num_columna_dis = $columna_tipo ;; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)
                                  $col = 12/$num_columna_dis;console.log(object['n_columnas']['columna_tipo']);
                                  /******************************************************************************************/
                                  
                                  $.each(object['productos'], function(index, itemData) 
                                  {
                                    cantidad++;
                                    $i++;
                                    cantidad_total=itemData['total'];

                                    if($c == 0)
                                    { 
                                      lista+= '<div class="row">';
                                    }
                                    $c++;

                                    lista+= '<a class="img_producto" href="'+itemData['url']+'">';
                                       lista+= '<div class="col-xs-'+$col+' fuente_georgia columna">';
                                          lista+= '<img src="'+itemData['foto']+'" alt="" class="img-responsive">';
                                          lista+= '<div class="height-10"></div>';
                                          lista+= '<h4 class="text-center section-title font_size13" style="color: #333">'+itemData['titulo']+' - '+itemData['marca']+'</h4>';
                                          lista+= '<hr>';
                                          
                                          lista+= '<div class="text-center font_size16 precio"><span>';
                                          
                                          if (itemData['preciopro']!="0") 
                                          {
                                              lista+= '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '+itemData['preciopro']+' </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                              lista+= '&nbsp; &nbsp; &nbsp; Ahora: S/.  '+itemData['precio'];
                                          }else
                                          {
                                              lista+= 'S/. '+itemData['precio'];
                                          }
                                          

                                          lista+= '</span></div>';

                                       lista+= '</div>';
                                    lista+= '</a>';
                                       
                                    if($c == $num_columna_dis)
                                    {
                                        $c = 0;
                                        lista+='</div>';
                                    }
                                     
                                  });

                                  $("#ver_mas").css("display","block");
                                  $("#ordenar_productos").html(lista); console.log(data);
                                  $("#total_items").html(cantidad_total); console.log(data);
                                  
                                  $("#boton_mostrar").attr("cantidades",cantidad);
                                  $("#cantidad_mostrar").html(cantidad); console.log(data);
                                  $("#total_mostrar").html(cantidad_total); console.log(data);
                                 
                                  if($("#total_mostrar").html()==cantidad)
                                  {
                                    $("#boton_mostrar").css("display","none");
                                  }else
                                  {
                                    $("#boton_mostrar").css("display","block");
                                  }

                                   $("#boton_mostrar").attr("data",filtro);
                                   $("#boton_mostrar").attr("data2",subfiltro);
                                   $("#boton_mostrar").attr("marca",marca);



                              }else
                              {
                                  $("#ver_mas").css("display","none");
                                  $("#ordenar_productos").html(data); console.log(data);
                                  $("#total_items").html(cantidad); console.log(data);
                              }

                              

                                  //mensaje.hide(9000);
                          }
      });
}





function captar_filtro_arrivals(THIS){

      link = $(THIS).attr("data_link");
      
      if(link == 'link_row'){
          $(THIS).parent().parent().each(function(){
              $(this).find('span').removeClass('active');
          });
      }

      $(THIS).addClass('active');
      var option       = "filtro_producto_arrival";
      var data_catego  = $(THIS).attr("data_catego");
      var tipo         = $(THIS).attr("tipo");
      var cantidades   = $(THIS).attr("cantidades");
      var marca        = $(THIS).attr("marca");
      var persona      = $(THIS).attr("persona");
      var filtro       = $(THIS).attr("data");
      var subfiltro    = $(THIS).attr("data2");
      var categoria    = $(THIS).attr("categoria");
      var subcategoria = $(THIS).attr("subcategoria");
      var url          = $("#base_url").html();
      var url_final    = url + 'admin/gestion-mantenimiento';
      var cantidad     = 0;


     

      $.ajax({
                          url : url_final,
                          type:'POST',
                          data:{   
                                   data_catego:data_catego,
                                   url        :  url,
                                   option     :  option,   
                                   tipo       :  tipo,
                                   filtro     :  filtro,
                                   cantidades :  cantidades,
                                   persona    :  persona,
                                   subfiltro  :  subfiltro,
                                   categoria  :  categoria,
                                   marca      :  marca,
                                   subcategoria  :  subcategoria
                          },
                          success:function(data)
                          { console.log(data);

                              if(data!="")
                              {    
                                  object = JSON.parse(data);
                                  
                                  $i = 0; lista = '';

                                   /******************************************************************************************/
                                  $columna_tipo    = (object['n_columnas']['columna_tipo'] == 0) ? 2 : object['n_columnas']['columna_tipo'];
                                  $c = 0;
                                  $num_columna_dis = $columna_tipo ;; //(CANTIDAD DE COLUMNAS EN PRODUCTOS)
                                  $col = 12/$num_columna_dis;console.log(object['n_columnas']['columna_tipo']);
                                  /******************************************************************************************/
                                  
                                  $.each(object['productos'], function(index, itemData) 
                                  {
                                    cantidad++;
                                    $i++;
                                    cantidad_total=itemData['total'];

                                    if($c == 0)
                                    { 
                                      lista+= '<div class="row">';
                                    }
                                    $c++;

                                    lista+= '<a class="img_producto" href="'+itemData['url']+'">';
                                       lista+= '<div class="col-xs-'+$col+' fuente_georgia columna">';
                                          lista+= '<img src="'+itemData['foto']+'" alt="" class="img-responsive">';
                                          lista+= '<div class="height-10"></div>';
                                          lista+= '<h4 class="text-center section-title font_size13" style="color: #333">'+itemData['titulo']+' - '+itemData['marca']+'</h4>';
                                          lista+= '<hr>';
                                          
                                          lista+= '<div class="text-center font_size16 precio"><span>';
                                          
                                          if (itemData['preciopro']!="0") 
                                          {
                                              lista+= '<span class="text-danger" style="padding:0px;" >Antes: <s>S/. '+itemData['preciopro']+' </s>&nbsp;&nbsp;&nbsp;<br></span>';
                                              lista+= '&nbsp; &nbsp; &nbsp; Ahora: S/.  '+itemData['precio'];
                                          }else
                                          {
                                              lista+= 'S/. '+itemData['precio'];
                                          }
                                          

                                          lista+= '</span></div>';

                                       lista+= '</div>';
                                    lista+= '</a>';
                                       
                                    if($c == $num_columna_dis)
                                    {
                                        $c = 0;
                                        lista+='</div>';
                                    }
                                     
                                  });

                                  $("#ver_mas").css("display","block");
                                  $("#ordenar_productos").html(lista); console.log(data);
                                  $("#total_items").html(cantidad_total); console.log(data);
                                  
                                  $("#boton_mostrar").attr("cantidades",cantidad);
                                  $("#cantidad_mostrar").html(cantidad); console.log(data);
                                  $("#total_mostrar").html(cantidad_total); console.log(data);
                                 
                                  if($("#total_mostrar").html()==cantidad)
                                  {
                                    $("#boton_mostrar").css("display","none");
                                  }else
                                  {
                                    $("#boton_mostrar").css("display","block");
                                  }

                                   $("#boton_mostrar").attr("data",filtro);
                                   $("#boton_mostrar").attr("data2",subfiltro);
                                   $("#boton_mostrar").attr("marca",marca);



                              }else
                              {
                                  $("#ver_mas").css("display","none");
                                  $("#ordenar_productos").html(data); console.log(data);
                                  $("#total_items").html(cantidad); console.log(data);
                              }

                              

                                  //mensaje.hide(9000);
                          }
      });
}

$(document).ready(function(){
    if($(".roww .columna").length){ 
       col = $(".roww .columna a img");
       //col.height(col.parent().height());
    }
});


$(window).click(function(){
  // Remove list loaded on searchbox
  $('.buscador_check ul').remove();
});

if($(window).width() <= 480){
  $('.filters-title').click(function(){
    $(this).siblings('.filters-list').toggle();
  });
}

$('.notification-top .close').click(function(){

  setTimeout(function(){
    $('.notification-top').addClass('hide');
  }, 100);

});

// Remove elements from navbar: marcas, newarrivalsdamas, newarrivalshombres, asesoriapersonal

$('.base_menu .base_item_menu #titulo_menu').each(function(){
  var contenido = $(this).text().toLowerCase().replace(/ /g,'');

  var n1 = contenido.search("marcas");
  var n2 = contenido.search("newarrivalsdamas");
  var n3 = contenido.search("newarrivalshombres");
  var n4 = contenido.search("asesoríapersonal");

  if(n1!=-1 || n2!=-1 || n3!=-1 || n4!=-1) $(this).parent('span.base_item_menu').remove();
});

$('.cantidad-list button').click(function(){
  var set_button = $(this).hasClass('set-less');
  var get_amount = $('#cantidadProd').val();

  if(set_button) get_amount--;
  else get_amount++;

  if(get_amount>0) $('#cantidadProd').val(get_amount);

});

$('.cantidad-list-prenda button').click(function(){
  var set_button = $(this).hasClass('set-less');
  var get_amount = $('#cantidadProd_prenda').val();

  if(set_button) get_amount--;
  else get_amount++;

  if(get_amount>0) $('#cantidadProd_prenda').val(get_amount);

});

$('.collapse-banner-category span').click(function(){
  var bannerState = $(this).parent('div').attr('state');

  if(bannerState=='on'){
    $('.collapse-banner-category').height(200).attr('state','off');
    $('.collapse-banner-category span').html('Perfil de marca <b>&#9013;</b>');
  }else{
    $('.collapse-banner-category').height(500).attr('state','on');
  }
});

$(document).scroll(function () {
  var hTop = $(window).scrollTop();
  var notHide = $('#notification-top').hasClass('hide');

  if(notHide){
    if(hTop > 310){
       $('#header-fixed').show().addClass('animated fadeInDown');
    }
    else $('#header-fixed').hide().removeClass();
  }else{
    if(hTop > 580){
       $('#header-fixed').show().addClass('animated fadeInDown');
    }
    else $('#header-fixed').hide().removeClass();
  }

});

function validando2()
{

    //var email_footer = document.footer.elements['inputEmail'];
    var email_top = document.getElementById("inputEmail").value;

    if(email_top.value == "")
    {
        $("#error_email_top").css("display", "block");
        return false;
    }else
    {
        $("#error_email_top").css("display", "none");
    }


    var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    if (!re.test(email_top))
    {
        $("#error_email_top").css("display", "block");
        return false;
    }else
    {
        $("#error_email_top").css("display", "none");
    }

     $.ajax({
              type: "POST",
              url: "enviar_ofertas_home.php",
              data : "email_1="+$('#inputEmail').val(),
              success: function(data)
              {

                  //imprime el mensaje de confirmacion de registro
                  $('.container-primary').hide();
                  setTimeout("location.href=''", 2000);


              }
        });

    return false;

}

  wow = new WOW({
    boxClass:     'wow',      // default
    animateClass: 'fadeIn', // fadeIn
    offset:       0,          // default
    mobile:       true,       // default
    live:         true        // default
  })

  wow.init();
