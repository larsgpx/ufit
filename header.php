<!-- Custom CSS Files -->
<link href="<?php echo $BASE_URL?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $BASE_URL?>css/custom.css" rel="stylesheet">
<!-- Animate CSS Styles -->
<link href="<?php echo $BASE_URL?>css/animate.css" rel="stylesheet">
<!-- Animate CSS Styles -->
<link href="<?php echo $BASE_URL?>css/hover.min.css" rel="stylesheet">
<!-- Fonts CSS Styles -->
<link rel="stylesheet" href="<?php echo $BASE_URL?>fonts/fonts.css">
<!-- Font Awesome CSS Files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<?php

if(!isset($_SESSION)) {
     session_start();
 }
//include_once("conexion.php");
 date_default_timezone_set('America/Lima');

require_once 'utils/functions.php';
$royaltyUtils = new RoyaltyUtils;
include_once("admin/aplication/modelo/modelo_base_datos.php");
require_once 'js/Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$carro = $royaltyUtils->getValueIfExists($_SESSION, 'carro');
$contador=0;

if($carro!="")
{
    foreach($carro as $k => $v)
    {
    $contador= $contador + $v['cantidad'];
    }
}
?>
<!-- js scroll suave --><script src="<?php echo $BASE_URL?>js/smoothscroll.js"></script><!-- fin scroll suave -->
<script>

function search_autocomplete(THIS){
   var search = $(THIS).val();
   if(search.length>=4){
     $.ajax({
        url:'<?php echo $BASE_URL?>search_filtro.php',
        type:'POST',
        data:{
            search:search
        },
        success:function(data){ console.log(data);
          //object = JSON.parse(data);
          $(THIS).parent().find(".buscador_check").html('<ul class="dropdown-menu dropdown-menu-right" role="menu" style="display: block;">'+data+'</ul>');
        }
     });
   }
    else{   //console.log($(THIS).val());
            $(THIS).parent().find(".buscador_check").html('<ul class="dropdown-menu dropdown-menu-right" role="menu" style="display: block;"></ul>');
     }
}

jQuery(document).ready(function($)
{
      // Contador items visibles
      var productQuantityVisible = $('.base_productos a').length;
      $('.right_titulo_filtros_combobox td').html(productQuantityVisible + ' Ítems');
      // Ordenar filtros
      $('.filtro_relevancia').on('change', function(){
        window.location.href = jQuery.query.REMOVE('filtro').set('orden', $(this).val());
      });

      $('.filtroDynamic').on('change', function(){

        if( $('#link_categoria').val() =='')
        {
           $linkeo = 'sub'+ $('#link_subcategoria').val();
        }else
        {
           $linkeo = 'cat'+ $('#link_categoria').val();
        }
        //window.location.href = jQuery.query.REMOVE('orden').set('filtro', $(this).val());
        window.location.href = $linkeo +'-'+ $(this).val();


      });


   $("#usuario").hover(
      function() {
        $(this).find("#menu_usuario").stop( true, true ).fadeIn("0.2");
      }, function() {
        $(this).find("#menu_usuario").stop( true, true ).fadeOut("0.2");
     });


     $('.closeHomePopup').on('click', function(e){
        $.fancybox.close();
        setCookie('homePopup', '-', 1);
     });


});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}



function validando_popup_ultimo()
    {

        var email_100 = document.popup.elements['email_100'];


        if(email_100.value == "")
        {
            $("#email_100").css("border-bottom-color", "#900");
            $("#email_100").css("border-top-color", "#900");
            $("#email_100").css("border-left-color", "#900");
            $("#email_100").css("border-right-color", "#900");
            $("#error_clave_10").css("display", "block");
            return false;
        }else
        {
            $("#email_100").css("border-bottom-color", "#000");
            $("#email_100").css("border-top-color", "#000");
            $("#email_100").css("border-left-color", "#000");
            $("#email_100").css("border-right-color", "#000");
            $("#error_clave_10").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_100.value))
        {
            $("#email_100").css("border-bottom-color", "#900");
            $("#email_100").css("border-top-color", "#900");
            $("#email_100").css("border-left-color", "#900");
            $("#email_100").css("border-right-color", "#900");
            $("#error_clave_10").css("display", "block");
            return false;
        }else
        {
            $("#email_100").css("border-bottom-color", "#000");
            $("#email_100").css("border-top-color", "#000");
            $("#email_100").css("border-left-color", "#000");
            $("#email_100").css("border-right-color", "#000");
            $("#error_clave_10").css("display", "none");
        }

        $.ajax({
                  type: "POST",
                  url: "enviar_popup_home.php",
                  data : "email_10="+$('#email_100').val(),
                  success: function(data)
                  {

                      $.fancybox("#gracias_popup");
                      setTimeout("location.href='<?php echo $BASE_URL?>'", 2000);


                  }
        });

        return false;
    }


</script>
<div id="base_url" style="display: none;"><?php echo $BASE_URL;?></div>
<!-- Header newsletter banner suscripction -->
<?php $close_sucripcion = (!isset($_COOKIE['close_sucripcion'])) ?'' : 'hide';?>
<section id="notification-top" class="notification-top animated fadeIn <?php echo $close_sucripcion;?>">
  <?php if(!isset($_GET['email_top_var'])){ ?>
  <div class="container">
    <div class="row">
      <div class="close-window pull-right close" onclick="setCookie('close_sucripcion','-',1);">
        <img width="40" src="<?php echo $BASE_URL?>images/close-icon.png" alt="Close Window">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h2>Permanece en Contacto</h2><br>
        <p>Se el primero en conocer nuestros productos. Especiales ofertas, eventos y m&aacute;s.</p>
      </div>
      <div class="col-sm-6">
        <form>
            <input type="email" name="inputEmail" id="inputEmail" placeholder="Direcci&oacute;n email" requeried>
            <div class="height-20 visible-xs visible-sm"></div>
            <button type="submit" onclick="return validando2()" >Suscribirse</button>
        </form>
        <div id="error_email_top" style="display:none;color:#F00;float:left" class="fuente_georgia font_size13">Correo Incorrecto</div>
      </div>
    </div>
    <div class="row">
      <div class="height-20"></div>
    </div>
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <p class="text-center">Al someterse. Usted esta de acuerdo con nuestros <a class="fancybox" href="#popup_terminos_condiciones_nl">Términos &amp; Condiciones</a>. Usted puede desafiliarse cualquier momento.Ver <a class="fancybox" href="#popup_info_contacto_nl">Información de contacto</a> y <a class="fancybox" href="#popup_seguridad">Política de privacidad</a>.</p>
      </div>
    </div>
  </div>
<?php }else{ ?>
  <div class="container">
    <div class="row">
      <div class="close-window pull-right close">
        <img width="40" src="<?php echo $BASE_URL?>images/close-icon.png" alt="Close Window">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h2>Thank you</h2>
        <p class="text-center">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
      </div>
      <div class="col-sm-6">
        <h4>Can't get enough vc?</h4>
        <p class="text-center">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
      </div>
    </div>
  </div>
<?php } ?>
</section>

<!-- Barra de navegación collapse -->
<section id="header-fixed">
  <nav class="navbar navbar-default navbar-inverse fuente_georgia">
    <div class="container">
      <div class="header-fixed-advise navbar-left">
        <table cellpadding="0" cellspacing="0" width="100%" height="40">
              <tr>
                  <td>
        <?php $db_Full = new db_model();  $db_Full->conectar();
        $result_popup1 = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=1");
        while ($row_popup1 = mysqli_fetch_assoc($result_popup1)){
        ?>
        <span class="texto_header_promociones fuente_georgia font_size12"><?php  echo  $row_popup1["titulo_popup"];  ?></span>
        <a href="#popup_special"  class="texto_header_promociones fuente_georgia font_size12 fancybox"> Detalles </a>
        <?php
        }
        ?>
                </td>
              </tr>
              </table>
      </div>
      <div class="header-fixed-account navbar-right">
        <table cellpadding="0" cellspacing="0" width="100%" height="40">
              <tr>
          <td class="dropdown">
            <a href="<?php echo $BASE_URL?>validar-cliente" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $BASE_URL?>images/icono_user.png"></a><a href="<?php echo $BASE_URL?>validar-cliente">Mi Cuenta</a></td>
            
                  
              <?php
              if(isset ($_SESSION['id_cliente']))
              {
              ?>
              <a href="<?php echo $BASE_URL?>logout">Cerrar Sesión</a>
              <?php
              }
              ?>
            
          <td><a href="<?php echo $BASE_URL?>preguntas-frecuentes"><img src="<?php echo $BASE_URL?>images/icono_interrogacion.png"></a></td>
          <td><a href="<?php echo $BASE_URL?>validacion_cuenta.php"><img src="<?php echo $BASE_URL?>images/icono_cartera.png"> <div id="contador_carrito_1" style="float: right; margin-left: 10px"> <?php echo $contador; ?> </div></a></td>
              </tr>
              </table>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-main fuente_georgia font_size12">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $BASE_URL?>"><img alt="Brand" src="<?php echo $BASE_URL?>images/logo.png" height="30"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if(isset($menus_page) && isset($menus_page['menu_principal2'])){echo $menus_page['menu_principal2'];}?>
         
          <?php 
             $result_popup1 = $db_Full->select_sql("SELECT * FROM tbl_page where tabla_page_tbl = 'tbl_tipos' and fk_id_menu = 3");
             while ($row = mysqli_fetch_assoc($result_popup1)){
                echo '<li><a href="'.$BASE_URL.$row['url_page_tbl'].'">'.$row['titulo_page_tbl'].'</a></li>';
             }
          ?>
         

          <li><a href="<?php echo $BASE_URL; ?>asesoria">Asesoria</a></li>
          <li><a href="<?php echo $BASE_URL; ?>catalogo">Catálogo</a></li>
          <li><a href="<?php echo $BASE_URL; ?>ofertas">Oferta</a></li> 
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</section>

<!--HEADER-->
<div id="header">

    <div class="base_header_1">
        <div class="container">
          <!-- Aviso de promociones -->
          <div class="header_promociones">
              <table cellpadding="0" cellspacing="0" width="100%" height="40">
              <tr>
                  <td>
                     <?php
                    $result_popup1 = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=1");
                    while ($row_popup1 = mysqli_fetch_assoc($result_popup1))
                    {
                    ?>
                      <span class="texto_header_promociones fuente_georgia font_size12"><?php  echo  $row_popup1["titulo_popup"];  ?></span>
                      <a href="#popup_special"  class="texto_header_promociones fuente_georgia font_size12 fancybox"> Detalles </a>
                       <?php
                    }
                    ?>
                  </td>
              </tr>
              </table>
          </div>

          <div class="height-20 visible-xs"></div>

          <!-- Detalles de cuenta & compra -->
          <div class="header_botones">
              <table cellpadding="0" cellspacing="0" width="100%" height="40">
              <tr>
                  <td align="center" class="header_rollover_botones" style="border-left:solid 1px #4a484a;">
                      <a href="<?php echo $BASE_URL?>validar-cliente" id="usuario">
                      <table cellpadding="0" cellspacing="0" width="100%" height="40">
                      <tr>
                          <td align="center"><img src="<?php echo $BASE_URL?>images/icono_user.png"></td>
                       </tr>
                      </table>
                      <div id="menu_usuario" style=" display:none; position:absolute;  background-color:#FFF; margin-left:-13px; color:#000; padding:10px; z-index:999; border:solid 1px; color:#000;">
                      <table cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td class="fuente_georgia font_size14"><a href="<?php echo $BASE_URL?>validar-cliente" style="text-decoration:none; color:#000">Mi Cuenta</a></td>
                      </tr>
                      <?php
                      if(isset ($_SESSION['id_cliente']))
                      {
                      ?>
                       <tr><td height="20" align="center"><div style="width:100%; height:1px; background-color:#000;">&nbsp;</div></td></tr>
                      
                        <tr>
                        <td class="fuente_georgia font_size14"><a href="<?php echo $BASE_URL?>logout" style="text-decoration:none; color:#000">Cerrar Sesión</a></td>
                        </tr>
                      <?php
                      }
                      ?>
                      </table>
                      </div>
                      </a>
                  </td>

                  <td align="center" class="header_rollover_botones" style="border-left:solid 1px #4a484a;">
                      <a href="<?php echo $BASE_URL?>preguntas-frecuentes">
                      <table cellpadding="0" cellspacing="0" width="100%" height="40">
                      <tr>
                          <td align="center"><img src="<?php echo $BASE_URL?>images/icono_interrogacion.png"></td>
                      </tr>
                      </table>
                      </a>
                  </td>

                  <!-- <td align="center" class="header_rollover_botones" style="border-left:solid 1px #4a484a; border-right:solid 1px #4a484a;">
                      <table cellpadding="0" cellspacing="0" width="100%" height="40">
                      <tr>
                          <td align="center"><img src="images/icono_corazon.png"></td>
                          <td width="10"></td>
                          <td align="center" class="fuente_georgia font_size12" style="color:#FFF;">0</td>
                      </tr>
                      </table>
                  </td> -->
                  <td align="center" class="header_rollover_botones" >
                      <a href="<?php echo $BASE_URL?>validacion_cuenta.php">
                      <table cellpadding="0" cellspacing="0" width="100%" height="40">
                      <tr>
                          <td align="center"><img src="<?php echo $BASE_URL?>images/icono_cartera.png"></td>
                          <td width="10"></td>
                          <td align="center" class="fuente_georgia font_size12" style="color:#FFF;" id="contador_carrito_2"><?php echo $contador; ?></td>
                      </tr>
                      </table>
                      </a>
                  </td>
              </tr>
              </table>
          </div>
        </div>
        <div class="header_1">

          <!-- Pop-up de la página de inicio -->

              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup_home where orden_popup_home=0 and NOW() BETWEEN desde_popup_home AND hasta_popup_home ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              
              <div id="popup_principal" style="<?php if($row_popup["id_popup_home"] == "4" && $deviceType == 'computer'){ echo 'width: ' . $row_popup["ancho_popup_home"] .'px;';}?> max-width:<?php  echo  $row_popup["ancho_popup_home"];  ?>px;display: none; background-color:#FFF;">

					          <?php
                    if($row_popup["foto_popup_home"]!=".")
                    {
                    ?>
                        <!-- Imagen referencial del lightbox -->
                        <div class="row padding-off">
                          <div class="col-sm-12 padding-off">
                            <img src="<?php echo $BASE_URL?>webroot/archivos/<?php  echo  $row_popup["foto_popup_home"];  ?>" alt="" class="img-responsive">
                          </div>
                        </div>
          					<?php
          					}
                		?>


                    <?php
                    if($row_popup["id_popup_home"]=="4")
                    {
                    ?>

                    <script>


    function validando_popup()
    {

        var email_10 = document.popup.elements['email_10'];


        if(email_10.value == "")
        {
            $("#email_10").css("border-bottom-color", "#900");
            $("#email_10").css("border-top-color", "#900");
            $("#email_10").css("border-left-color", "#900");
            $("#email_10").css("border-right-color", "#900");
            $("#error_clave_10").css("display", "block");
            return false;
        }else
        {
            $("#email_10").css("border-bottom-color", "#000");
            $("#email_10").css("border-top-color", "#000");
            $("#email_10").css("border-left-color", "#000");
            $("#email_10").css("border-right-color", "#000");
            $("#error_clave_10").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_10.value))
        {
            $("#email_10").css("border-bottom-color", "#900");
            $("#email_10").css("border-top-color", "#900");
            $("#email_10").css("border-left-color", "#900");
            $("#email_10").css("border-right-color", "#900");
            $("#error_clave_10").css("display", "block");
            return false;
        }else
        {
            $("#email_10").css("border-bottom-color", "#000");
            $("#email_10").css("border-top-color", "#000");
            $("#email_10").css("border-left-color", "#000");
            $("#email_10").css("border-right-color", "#000");
            $("#error_clave_10").css("display", "none");
        }

        $.ajax({
                  type: "POST",
                  url: "enviar_popup_home.php",
                  data : "email_10="+$('#email_10').val(),
                  success: function(data)
                  {

                      $.fancybox("#gracias_popup");
                      setTimeout("location.href='<?php echo $BASE_URL?>'", 2000);


                  }
        });

        return false;
    }

    function validando_popup_comentario()
    {
          $.ajax({
                  type: "POST",
                  url: "validar_cliente_popup.php",
                  data : "",
                  success: function(data)
                  {

                      if(data==0)
                      {
                          $.fancybox("#popup_ingresar_comentario");
                      }
                      else
                      {
                          $.fancybox("#popup_registro_comentario");

                      }

                  }
            });


        return false;
    }


    </script>


                        <form action="" name="popup" method="post" enctype="multipart/form-data" >
                        <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                        <tr><td height="20"></td></tr>
                        <tr>
                        <td align="left" class="fuente_georgia font_size28" style="color:#000; padding-left:10px;">
                        ¿QUÉ HAY DE NUEVO?
                        </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                        <tr>
                        <td align="left" class="fuente_georgia font_size13" style="color:#000;padding-left:10px;">
                        Suscríbete a nuestro newsletter y enterate de nuestras últimas novedades.
                        </td>
                        </tr>
                         <tr><td height="10"></td></tr>
                        <tr><td style="padding-left:10px;">
                        <input type="text" name="email_10" id="email_10"  placeholder="Correo Electrónico" style="background-color:#f5f5f5; border:solid 1px #e7e7e7;width:80%; padding:5px">
                         <div id="error_clave_10" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo Electrónico</div>
                        </td></tr>
                         <tr><td height="10"></td></tr>
                        <tr><td align="center"><input type="submit" style="cursor:pointer;" onclick="return validando_popup()" class="boton_crear_cuenta fuente_georgia font_size12"  value="SUSCRIBIRSE"></td></tr>

                        <tr><td height="20"></td></tr>
                        </table>
                        </form>
                    <?php
                      }else
                    {
                    ?>


                    <!-- Contenido del lightbox de inicio -->

                    <div class="row padding-off">
                      <div class="col-sm-12"><?php  echo  $row_popup["des_popup_home"];  ?></div>
                    </div>

                    <?php
                    }
                    ?>

            </div>
            <?php
              }
            ?>

<!-- Lightbox menu registro -->
<div id="popup_registro"  style="max-width: 650px; display: none; background-color:#FFF; border:solid 1px #666;">
  <div class="row padding-off">
    <div class="col-sm-12 padding-off" style="tet-aling:center;">
      <img src="<?php echo $BASE_URL;?>webroot/archivos/160831053634160829011019imagen_popup.jpg" alt="" class="img-responsive">
    </div>
  </div>
  <div class="row padding-off">
    <div class="col-sm-12">
      <form action="" name="popup" method="post" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" width="98%" align="center">
          <tr><td height="20"></td></tr>
          <tr>
            <td align="left" class="fuente_georgia font_size28" style="color:#000; padding-left:10px;">¿QUÉ HAY DE NUEVO?</td>
          </tr>
          <tr><td height="10"></td></tr>
          <tr>
            <td align="left" class="fuente_georgia font_size13" style="color:#000;padding-left:10px;">Suscríbete a nuestro newsletter y entérate de nuestras últimas novedades.</td>
          </tr>
         <tr><td height="10"></td></tr>
          <tr>
            <td style="padding-left:10px; text-align:center;">
              <input type="email" name="email_100" id="email_100"  placeholder="" style="background-color:#f5f5f5; border:solid 1px #333; width:80%; padding:5px">
              <div id="error_clave_10" style="display:none;color:#F00;" class="fuente_georgia font_size13">Ingrese su Correo electrónico</div>
            </td>
          </tr>
          <tr><td height="10"></td></tr>
          <tr><td align="center"><input type="submit" style="cursor:pointer;" onclick="return validando_popup_ultimo()" class="boton_crear_cuenta fuente_georgia font_size12"  value="SUSCRIBIRSE"></td></tr>
          <tr><td height="20"></td></tr>
        </table>
      </form>
    </div>
  </div>
</div>
<!-- ./Lightbox menu registro -->

               <div id="popup_ingresar_comentario" style="width:350px;display: none; background-color:#FFF;">
                <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">COMENTARIOS</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    PARA PODER INGRESAR COMENTARIOS DEBES REGSITRARTE.<BR><br>
                    <a href="cuenta" style="text-decoration:none;"><div class="fuente_georgia font_size16 boton_carrito">REGISTRARME</div></a>
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>

            <div id="gracias_popup" style="width:350px;display: none; background-color:#FFF;">
                <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">GRACIAS</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    GRACIAS POR INSCRIBIRTE A UFIT.PE<BR><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>




               <div id="gracias_popup_venta" style="width:350px;display: none; background-color:#FFF;">
                <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">GRACIAS</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br>
                    GRACIAS POR REALIZAR TU COMPRA.<BR><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>



               <div id="gracias_comentario_recomendar" style="width:350px;display: none; background-color:#FFF;">
                <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">GRACIAS</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    GRACIAS POR RECOMENDAR ESTE PRODUCTO EN UFIT.PE<BR><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>

               <div id="gracias_comentario" style="width:350px;display: none; background-color:#FFF;">
                <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">GRACIAS</td>
                    <td align="right" valign="top" width="30"></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px;">
                    <br><br><br>
                    GRACIAS POR REGISTRAR TU COMENTARIO EN UFIT.PE<BR><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
               </div>

             <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=2");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_gratuito" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
                    <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

                    <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="100%" align="center"><img src="images/logo.png"></td>
                     </tr>
                    </table>




               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
              </div>
              <?php
              }
              ?>


              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=4");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_entrega" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="border:solid 1px #999; margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
              </div>
             <?php
              }
              ?>



              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=16");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_compra_catalogo" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="border:solid 1px #999; margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
              </div>
             <?php
              }
              ?>



              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=3");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_devolucion" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>



              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=1 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_special" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style=" margin-left: 20px" >
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>


              <!-- Listado de Popup (Lightbox) del footer -->

              <!-- Mapa del Sitio -->

               <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=6 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_sitio" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Términos y Noticias -->

              <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=7 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_noticias" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Privacidad y Seguridad -->

               <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=8 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_seguridad" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Privacidad Perú -->

               <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=9 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_privacidad" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Tecnología -->

               <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=10 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_tecnologia" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Trabaja con Nosotros -->

               <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=12 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_trabaja" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- SSL Pago Seguro -->

                <?php
              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=11 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_pago" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>


              <?php

              // Pop-up Terminos y Condiciones - Suscripción (Header)

              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=13 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_terminos_condiciones_nl" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <?php

              // Pop-up Información de Contacto - Suscripción (Header)

              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=14 ");
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
              <div id="popup_info_contacto_nl" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">
              <table cellpadding="0" cellspacing="0" width="96%" align="center" style="margin:2%">
              <tr>
              <td>
              <table cellpadding="0" cellspacing="0" width="100%" style="padding:10px;" >
                    <tr>
                    <td width="320"></td>
                    <td align="right" width="30"></td>
                    </tr>
                    </table>

               <?php  echo  $row_popup["des_popup"];  ?>
               </td>
               </tr>
               </table>
               </div>
              <?php
              }
              ?>

              <!-- Pop-up de Beneficios de Royalty Card -->

              <?php

              $result_popup = $db_Full->select_sql("SELECT * FROM tbl_popup where id_popup=5 ");

              if(mysqli_num_rows($result_popup)){
              while ($row_popup = mysqli_fetch_assoc($result_popup))
              {
              ?>
               <div id="popup_beneficios" style="max-width:<?php  echo  $row_popup["ancho_popup"];  ?>px;display: none; background-color:#FFF;">

                    <div class="row padding-off">
                      <div class="col-sm-12 padding-off">
                        <img src="images/imagen_popup.jpg" alt="" class="img-responsive">
                      </div>
                    </div>

                    <div class="row fuente_georgia font_size28 padding-off">
                      <div class="col-sm-12">
                        <h2 class="section-title">Beneficio de mi cuenta</h2>
                      </div>
                    </div>

                    <div class="row fuente_georgia padding-off">
                      <div class="col-sm-12"><?php  echo  $row_popup["des_popup"];  ?></div>
                    </div>
                </div>
              <?php
              }}
              ?>

        </div>
    </div>

    <section class="base_header_2">
      <div class="container-fluid">
        <div class="row">
          <ul class="list-inline text-center">

            <?php //if(isset($menus_page)){echo $menus_page['menu_marcas'];}
             $result = $db_Full->select_sql("SELECT * FROM tbl_marcas order by orden_marca asc");
              while ($row_marcas = mysqli_fetch_assoc($result))
              {
            ?>
              <li><a href="<?php echo $BASE_URL.$row_marcas["url_page_tbl"] ?>"><img height="30" src="<?php echo $BASE_URL;?>webroot/archivos/<?php echo  $row_marcas["foto1_marca"]; ?>"></a></li> 
            <?php
              }
            ?>

          </ul>
        </div>
      </div>
    </section>

    <div class="base_header_3">
        <div class="header_3">

            <div class="header_3_left">
                <table cellpadding="0" cellspacing="0" width="150" height="90">
                 	<tr>
                 		<td valign="top" style="padding-top: 4px" class="fuente_georgia font_size12">MONEDA</td>
                    <?php 
                    $db_Full = new db_model();  $db_Full->conectar();
                    $result_moneda = $db_Full->select_sql("SELECT icono_moneda FROM tbl_tipo_cambio");
                    
                    if(mysqli_num_rows($result_moneda)){
                          while ($row_moneda = mysqli_fetch_assoc($result_moneda)){ ?>
                             <td valign="top"><img src="<?php echo $BASE_URL."images/".$row_moneda['icono_moneda'];?>"></td>
                            <?php
                          }
                    }
                    ?>
                 	</tr>
                </table>
            </div>

            <div class="header_3_center">
                <table cellpadding="0" cellspacing="0" width="100%" height="90">
                    <tr>
                        <td><a href="<?php echo $BASE_URL?>"><img src="<?php echo $BASE_URL?>images/logo.png"></a></td>
                    </tr>
                </table>
            </div>

            <div class="header_3_right">
                   <table cellpadding="0" width="100%" cellspacing="0"  height="90">
                <tr>
                    <td class="fuente_georgia font_size11" align="right">
                        <table cellpadding="0" width="200" cellspacing="0">
                        <?php if(isset($menus_page)){echo $menus_page['menu_usuario'];}?>
                        </table>
                    </td>
                </tr>
                </table>
            </div>

        </div>
    </div>


</div>
<!--FIN HEADER-->


<!--MENU-->
<div class="base_menu">
    <div class="menu">
        <table cellpadding="0" cellspacing="0" align="center">
        <tr>

            <td align="center">

                <span id="logo_menu"  style="float:left;background-color:#FFF; border:solid 0px;padding-top:7px; padding-right:20px;">
                     <a href="<?php echo $BASE_URL?>"><img src="<?php echo $BASE_URL?>images/logo_menu.png" ></a>
                </span>

                <span class="base_item_menu" style="background-color:#FFF; border:solid 0px">
                    <a href="<?php echo $BASE_URL?>marcas"  class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;">
                    MARCAS
                    </a>
                </span>

               <?php
               $result = $db_Full->select_sql("SELECT id_tipo,nombre_tipo,url_page_tbl FROM tbl_tipos  order by orden_tipo asc");
               if(mysqli_num_rows($result)){
               while ($row_tipos = mysqli_fetch_assoc($result))
               {
               ?>

                <span class="base_item_menu">
                    <a href="<?php echo $BASE_URL.$row_tipos["url_page_tbl"]?>" id="titulo_menu" class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;">
                    <?php echo $row_tipos["nombre_tipo"]; ?>
                    </a>

                    <!-- Menu de contenido del tipo de prenda -->
                    <div  class="vista_menu contenedor_menu text-left fuente_georgia">

                      <div class="wrapper">
                        <div class="col-sm-9">

                          <div class="row">

                            <?php
                              $ncols = 1;
                              //$result2 = $db_Full->select_sql("call menu_categorias(".$row_tipos["id_tipo"].")");
                              $result2 = $db_Full->select_sql("SELECT * FROM tbl_categorias where  fktipo_cate='".$row_tipos["id_tipo"]."' order by orden_cate asc");
                              while ($row_cate = mysqli_fetch_assoc($result2))
                              {
                            ?>

                            <div class="col-sm-3 menuPropiedad">
                            <?php
                                   $url           = $BASE_URL.$row_cate["url_page_tbl"];
                                   $categoria_url = $row_cate["url_page_tbl"];
                            ?>
                              <a href="<?php echo $url;?>" class="menuPropiedad-title"><?php echo $row_cate["nombre_cate"]; ?></a>
                              <ul class="list-unstyled font_size11">

                                <?php 
                                  $result3 = $db_Full->select_sql("SELECT *
                                                                   FROM tbl_items_categoria 
                                                                   where fk_item_categoria = '".$row_cate["id_cate"]."' ");

                                if(mysqli_num_rows($result3)){
                                      while ($row_sub = mysqli_fetch_assoc($result3)){
                                ?>
                                      <?php
                                            $url2= $BASE_URL.$row_sub["url_page_tbl"];
                                      ?>
                                      <li><a href="<?php echo $url2;?>"><?php echo ($row_sub["nombre_item_categoria"]); ?></a></li>

                                      <?php
                                      }
                                }
                                else{
                                      if($row_cate['tipo_categoria'] == 'compra'){
                                      $resultf = $db_Full->select_sql("select url_page_tbl,nombre_marca from tbl_tipos_marcas,tbl_tipos, tbl_marcas
WHERE  fkmarcas_tipos_marcas =id_marca and fktipos_tipos_marcas=id_tipo and tipo='prod' and id_tipo =".$row_tipos["id_tipo"]." GROUP BY id_marca ORDER BY fkmarcas_tipos_marcas desc");
                                      while ($row_subf = mysqli_fetch_assoc($resultf)){
                                            
                                            $url3=$BASE_URL.$row_subf["url_page_tbl"];
                                      ?>
                                      <li><a href="<?php echo $url3;?>"><?php echo strtolower($row_subf["nombre_marca"]); ?></a>
                                      </li>
                                    <?php
                                    }
                                  }
                                  else{
                                          if($row_cate['tipo_categoria'] == 'marca'){
                                          $resultf = $db_Full->select_sql("select m.url_page_tbl,m.nombre_marca from tbl_marcas m
   inner join tbl_tipos_marcas tmar on fkmarcas_tipos_marcas =id_marca and fktipos_tipos_marcas =".$row_tipos["id_tipo"]." inner join tbl_productos_marcas pm on pm.fkmarca_productos_marcas =id_marca and pm.fktipo_productos_marcas=".$row_tipos["id_tipo"]." group by id_marca");   

                                          while ($row_subf = mysqli_fetch_assoc($resultf)){
                                              $ure     = explode('/', $row_subf["url_page_tbl"]);
                                              $len_ure = count($ure)-1;
                                              $url3 = $BASE_URL.$categoria_url.'/'.$ure[$len_ure];
                                          ?>
                                          <li><a href="<?php echo $url3;?>"><?php echo strtolower($row_subf["nombre_marca"]); ?></a>
                                          </li>
                                        <?php
                                        }
                                      }
                                  }
                                }
                                ?>
                              </ul>
                            </div>

                            <?php
                                if ($ncols % 4 == 0) {
                            ?>
                          </div>
                          <div class="row">
                            <hr>
                          </div>
                          <div class="row">
                            <?php
                                } $ncols++;
                              }
                            ?>
                          </div>

                        </div>
                        <div class="col-sm-3 menuGenerales">
                          <ul class="list-unstyled font_size16">
                            <li><a href="<?php echo $BASE_URL;?>marcas">Compra por marca</a></li>
                            <li><a href="<?php echo $BASE_URL;?>asesoria">Asesoramos tu buen vestir</a></li>
                            <li><a href="<?php echo $BASE_URL;?>catalogo">Lo último de la moda</a></li>
                            <li><a href="<?php echo $BASE_URL;?>ofertas">Te encantarán las ofertas</a></li>
                            <li><a href="#popup_registro" class="fancybox">Regístrate para recibir novedades</a></li>
                          </ul>
                        </div>
                      </div>

                    </div>
                    <!-- ./Menu de contenido del tipo de prenda -->
                </span>

                <?php
                }}
                ?>
                <!--  <span class="base_item_menu" style="background-color:#FFF; border:solid 0px">
                    <a href="<?php echo $BASE_URL?>accesorios" id="titulo_menu" class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;background-color:#FFF; border:solid 0px">
                    ACCESORIOS
                    </a>
                </span> -->

                <span class="base_item_menu" style="background-color:#FFF; border:solid 0px">
                    <a href="<?php echo $BASE_URL?>asesoria" id="titulo_menu" class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;background-color:#FFF; border:solid 0px">
                    ASESORÍA
                    </a>
                </span>

                <span class="base_item_menu" style="background-color:#FFF; border:solid 0px">
                    <a href="<?php echo $BASE_URL?>catalogo" id="titulo_menu" class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;background-color:#FFF; border:solid 0px">
                    CATÁLOGO
                    </a>
                </span>

                <span class="base_item_menu" style="background-color:#FFF; border:solid 0px">
                    <a href="<?php echo $BASE_URL?>ofertas" id="titulo_menu" class="item_menu fuente_georgia font_size13" style="position:relative;z-index:999;text-decoration:none;background-color:#FFF; border:solid 0px">
                    OFERTA
                    </a>
                </span>

            </td>
        </tr>
        </table>
    </div>

  <!-- Mobiles display view -->
  <div class="menu-xs visible-xs visible-sm text-center">
    <ul class="list-inline text-center">
      <li><a href="<?php echo $BASE_URL;?>marcas">Marcas</a></li>
    <?php
      $resultwe = $db_Full->select_sql("SELECT id_tipo,nombre_tipo,url_page_tbl FROM tbl_tipos where lower(tipo)='prod' order by orden_tipo asc");
      if(mysqli_num_rows($resultwe)){
         while ($row_tiposss = mysqli_fetch_assoc($resultwe))
         {
            echo '<li><a href="'.$BASE_URL.$row_tiposss['nombre_tipo'].'">'.$row_tiposss['nombre_tipo'].'</a></li>';
         }}
      ?>   
      
      <!-- <li><a href="<?php echo $BASE_URL;?>camisas">Camisas</a></li>
      <li><a href="<?php echo $BASE_URL;?>zapatos">Zapatos</a></li>
      <li><a href="<?php echo $BASE_URL;?>polos">Polos</a></li>
      <li><a href="<?php echo $BASE_URL;?>pantalones">Pantalones</a></li>
      <li><a href="<?php echo $BASE_URL;?>ropa">Ropa</a></li>-->
      <li><a href="<?php echo $BASE_URL;?>accesorios">Accesorios</a></li> 
      <li><a href="<?php echo $BASE_URL;?>asesoria">Asesoría</a></li>
      <li><a href="<?php echo $BASE_URL;?>catalogo">Catálogo</a></li>
      <li><a href="<?php echo $BASE_URL;?>ofertas">Oferta</a></li>

    </ul>
  </div>
</div>
<!--FIN MENU-->


<!-- Sección de buscador -->
<section id="buscador">
  <div class="container">
    <div class="row fuente_georgia">
      <div class="col-sm-12">
        <form class="form-inline pull-right" action="<?php echo $BASE_URL?>busqueda" method="get">
          <div class="form-group">
            <label class="sr-only" for="inputBusqueda">Ingrese su búsqueda</label>
            <div class="input-group">
              <div class="input-group-addon">
                <img src="http://www.itsscorp.cl/images/icons/search-icon.png" alt="">
              </div>
              <input type="text" class="form-control" id="inputBusqueda" name="buscador" onkeyup="search_autocomplete(this);" placeholder="Buscar">
              <div class="buscador_check"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
