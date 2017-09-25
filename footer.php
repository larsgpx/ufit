<!--Footer-->

<section id="ofertas">
    <div class="container">
        <div class="row visible-xs">
            <div class="height-30"></div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12 pt20">
                <h2>Ofertas del día</h2>
                <p>Obtén descuentos exclusivos en ropa, zapatos y accesorios de grandes marcas, compra ahora</p>
                <img class="pull-right hidden-sm hidden-xs" style="margin-top:-80px;" src="<?php echo $BASE_URL?>images/circulo_footer.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="height-30"></div>
        </div>

      <div class="row">
         <?php
         $result = $db_Full->select_sql("SELECT url_page_tbl,foto_cate_oferta FROM tbl_categorias_ofertas");
		 $cantidad=0;
         while ($row_tipo = mysqli_fetch_assoc($result))
         {

			 if($cantidad % 2 == 0)
			 {
             ?>

            <div class="col-sm-5 col-sm-offset-1">
                <a href="<?php echo $BASE_URL.$row_tipo['url_page_tbl']; ?>">
                    <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $row_tipo['foto_cate_oferta']; ?>" alt="" class="img-responsive">
                </a>
            </div>
            <?php
			}else
			{
			?>
            <div class="col-sm-5">
                  <a href="<?php echo $BASE_URL.$row_tipo['url_page_tbl']; ?>">
                    <img src="<?php echo $BASE_URL?>webroot/archivos/<?php echo $row_tipo['foto_cate_oferta']; ?>" alt="" class="img-responsive">
                </a>
            </div>
            </div>
        <div class="row hidden-xs">
            <div class="height-30"></div>
        </div>

        <div class="row">
            <?php
			}
			?>


         <?php
		 $cantidad++;
         }
         ?>

    </div>
</section>


<div id="footer">

    <div class="base_footer_dos">
        <div class="footer_dos">

            <div class="item_footer_dos">
                <table cellpadding="0" cellspacing="0" width="100%" align="center">
                <tr><td class="fuente_georgia font_size14" align="center"><b>AYUDA</b></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>preguntas-frecuentes" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Servicio al Cliente</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>estilos" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Estilo & consejos fit</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Chat en vivo</a></td></tr>
                </table>
            </div>

           <div class="item_footer_dos">
                <table cellpadding="0" cellspacing="0" width="100%" align="center">
                <tr><td class="fuente_georgia font_size14" align="center"><b>MI CUENTA UFIT</b></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>validar-cliente" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Mi cuenta</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Lista de deseos</a></td></tr>
                </table>
            </div>

             <div class="item_footer_dos">
                <table cellpadding="0" cellspacing="0" width="100%" align="center">
                <tr><td class="fuente_georgia font_size14" align="center"><b>SUBSCRIBIRSE</b></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>registro-email" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Email</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>registro-novedades" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Catálogos y novedades</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="<?php echo $BASE_URL?>registro-ofertas" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Ofertas</a></td></tr>
                </table>
            </div>

            <div class="item_footer_dos">
                <table cellpadding="0" cellspacing="0" width="100%" align="center">
                <tr><td class="fuente_georgia font_size14" align="center"><b>UFIT CARD</b></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Administra tu tarjeta</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="#popup_beneficios" class="fuente_georgia font_size12 fancybox" style="color:#000; text-decoration:none;">Beneficios</a></td></tr>
                <tr><td height="5"></td></tr>
                <tr><td align="center"><a href="#" class="fuente_georgia font_size12" style="color:#000; text-decoration:none;">Hazlo ahora</a></td></tr>
                </table>



            </div>

            <div class="raya_footer_dos"></div>

            <script>


    function validando()
    {


        var email_footer = document.footer.elements['email_footer'];



        if(email_footer.value == "")
        {
            $("#email_footer").css("border-bottom-color", "#900");
            $("#email_footer").css("border-top-color", "#900");
            $("#email_footer").css("border-left-color", "#900");
            $("#email_footer").css("border-right-color", "#900");
            $("#error_email_footer").css("display", "block");
            return false;
        }else
        {
            $("#email_footer").css("border-bottom-color", "#000");
            $("#email_footer").css("border-top-color", "#000");
            $("#email_footer").css("border-left-color", "#000");
            $("#email_footer").css("border-right-color", "#000");
            $("#error_email_footer").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_footer.value))
        {
            $("#email_footer").css("border-bottom-color", "#900");
            $("#email_footer").css("border-top-color", "#900");
            $("#email_footer").css("border-left-color", "#900");
            $("#email_footer").css("border-right-color", "#900");
            $("#error_email_footer").css("display", "block");
            return false;
        }else
        {
            $("#email_footer").css("border-bottom-color", "#000");
            $("#email_footer").css("border-top-color", "#000");
            $("#email_footer").css("border-left-color", "#000");
            $("#email_footer").css("border-right-color", "#000");
            $("#error_email_footer").css("display", "none");
        }



         $.ajax({
                  type: "POST",
                  url: "enviar_ofertas_home.php",
                  data : "email_1="+$('#email_footer').val(),
                  success: function(data)
                  {

                      $.fancybox("#gracias_popup");
                      setTimeout("location.href='inicio'", 2000);


                  }
            });


        return false;
    }
    </script>



            <div class="email_footer_dos">
                <table cellpadding="0" cellspacing="0" width="100%" class="espacio_footer_dos">
                    <tr>
                        <td class="fuente_georgia font_size12" style="color:#000" >INGRESA TU EMAIL</td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    <tr>
                        <td>
                        <form action="" name="footer" method="post" enctype="multipart/form-data" >
                        <input class="inputFooterNewsletter" type="text" name="email_footer" style="background-color:#e7e7e7; border:0px; float:left">
                        <input class="inputFooterNewsletter" type="submit" onclick="return validando()" value=">" style="float:left; cursor:pointer; background-color:#e7e7e7; width:20px;border: solid 0px;">
                        </form>
                        <div id="error_email_footer" style="display:none;color:#F00;float:left" class="fuente_georgia font_size13">Correo Incorrecto</div>
                        </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    <tr>
                        <td class="fuente_georgia font_size12" style="color:#000" >Obtén ofertas especiales y más!</td>
                    </tr>
                </table>
            </div>

            <div class="detalle_footer_dos">


                <div class="tarjeta_footer_dos text-center">
                  <a href="<?php echo $BASE_URL?>gift-card"><img src="<?php echo $BASE_URL?>images/gift-footer.jpg" alt="" class="icono-footer"></a>
                  <a href="<?php echo $BASE_URL?>gift-card" style="color: #333; text-decoration: none"><p class="titulo-seccion-footer">Compra un Gift Card</p></a>
                </div>

                <div class="tarjeta_footer_dos text-center">
                    <a href="<?php echo $BASE_URL?>tiendas"><img src="<?php echo $BASE_URL?>images/marker-footer.jpg" alt="" class="icono-footer"></a>
                    <a href="<?php echo $BASE_URL?>tiendas" style="color: #333; text-decoration: none"><p class="titulo-seccion-footer">Encuentra una tienda</p></a>
                </div>

                <div class="tarjeta_footer_dos text-center">
                    <a href="#popup_compra_catalogo" class="fancybox"><img src="<?php echo $BASE_URL?>images/catalog-footer.jpg" alt="" class="icono-footer"></a>
                    <a href="#popup_compra_catalogo" class="fancybox" style="color: #333; text-decoration: none"><p class="titulo-seccion-footer">Compra un catálogo</p></a>
                </div>



                <div class="redes_footer_dos">
                    <table cellpadding="0" cellspacing="0" width="100%" align="center">
                    <tr><td height="10"></td></tr>
                    <tr>
                        <td class="fuente_georgia font_size12" style="color:#000" align="center" >Conéctate con nosotros</td>
                    </tr>
                     <tr><td height="5"></td></tr>
                    <tr>
                        <td align="center">
                        <a href="https://www.facebook.com/UFIT.peru" target="_blank"><img src="<?php echo $BASE_URL?>images/facebook_footer.png" width="27" ></a>
                        <a href="#"><img src="<?php echo $BASE_URL?>images/youtube_footer.png" width="27" ></a>
                        <a href="#"><img src="<?php echo $BASE_URL?>images/instagram_footer.png" width="27" ></a>
                        <a href="mailto:ventas@ufit.pe"><img src="<?php echo $BASE_URL?>images/email_footer.png" width="27"></a>
                        </td>
                    </tr>

                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-inline list-unstyled text-center">
                    <li><a href="#popup_sitio" class="fancybox">Mapa del Sitio</a></li>
                    <li><a href="#popup_noticias" class="fancybox">Términos & Noticias</a></li>
                    <li><a href="#popup_seguridad" class="fancybox">Privacidad y Seguridad</a></li>
                    <li><a href="#popup_privacidad" class="fancybox">Privacidad Perú</a></li>
                    <li><a href="#popup_tecnologia" class="fancybox">Tecnología</a></li>
                    <li><a href="#popup_trabaja" class="fancybox">Trabaja con Nosotros</a></li>
                    <li><a href="#popup_pago" class="fancybox">SSL Pago Seguro</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="height-20"></div>
        </div>
        <div class="row">
            <p class="text-center">2016 &copy; UFIT. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
<!--./Footer-->

<!-- Wow JS Script -->
<script src="<?php echo $BASE_URL?>js/wow.min.js"></script>

<!-- Bootstrap JS Files -->
<script src="<?php echo $BASE_URL?>js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.carousel').carousel()
    });
</script>

<!-- Custom JS Files -->
<script src="<?php echo $BASE_URL?>js/custom.js"></script>
