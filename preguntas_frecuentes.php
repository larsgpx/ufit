<?php
//include("inc.aplication_top.php");
session_start();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFIT</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/jquery.row-grid.js"></script>


<!-- Popup Plugin Files -->
<script type="text/javascript" src="fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="fancyapps/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- ./Popup Plugin Files -->

<!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/principal_ie.css" />
<![endif]-->

<!--[if !IE]><!-->
    <link href="css/principal.css" rel="stylesheet" type="text/css">
 <!--<![endif]-->

<!-- Owl Carousel Assets -->
<link href="owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="owl-carousel/owl.theme.css" rel="stylesheet">
<script src="owl-carousel/owl.carousel.js"></script>

<script>
jQuery(document).ready(function($)
{

    $( ".titulo_pregunta" ).click(function()
    {
    $(this).find(".respuesta").toggle("fast");
    });



        $('.fancybox').fancybox();

        $('.fancybox-media')
          .fancybox({
              maxWidth    : 800,
              maxHeight    : 600,
              openEffect : 'none',
              closeEffect : 'none',
              prevEffect : 'none',
              nextEffect : 'none',
              arrows : false,
              helpers : {
                  media : {},
                  buttons : {}
              }
          });
      $(".base_item_menu").hover(
      function() {
        $(this).find(".vista_menu").stop( true, true ).fadeIn(10);
      }, function() {
        $(this).find(".vista_menu").stop( true, true ).fadeOut(10);
      });

      $(".vista_menu").hover(
      function() {
        $(this).parent().find("#titulo_menu").removeClass("item_menu");
        $(this).parent().find("#titulo_menu").addClass("item_menu_hover");
      }, function() {
        $(this).parent().find("#titulo_menu").removeClass("item_menu_hover");
        $(this).parent().find("#titulo_menu").addClass("item_menu");
      });



      var owl = $("#owl-demo");

      owl.owlCarousel(
      {
          itemsCustom :
          [
            [0, 1],
            [450, 2],
            [600, 3],
            [700, 3],
            [1000, 5],
            [1200, 6],
            [1400, 6],
            [1600, 6]
          ],
          navigation : false,
          pagination : false,
          paginationNumbers : false,
          navigationText: false,
          autoPlay: 2000
    });



});

</script>



<script>


    function validando()
    {


        var email_1 = document.cuenta.elements['email_1'];
        var email_2 = document.cuenta.elements['email_2'];



        if(email_1.value == "")
        {
            $("#email_1").css("border-bottom-color", "#900");
            $("#email_1").css("border-top-color", "#900");
            $("#email_1").css("border-left-color", "#900");
            $("#email_1").css("border-right-color", "#900");
            $(".alerta_2").css("display", "block");
            $("#error_email_1").css("display", "block");
            return false;
        }else
        {
            $("#email_1").css("border-bottom-color", "#000");
            $("#email_1").css("border-top-color", "#000");
            $("#email_1").css("border-left-color", "#000");
            $("#email_1").css("border-right-color", "#000");
            $(".alerta_2").css("display", "none");
            $("#error_email_1").css("display", "none");
        }


        var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if (!re.test(email_1.value))
        {
            $("#email_1").css("border-bottom-color", "#900");
            $("#email_1").css("border-top-color", "#900");
            $("#email_1").css("border-left-color", "#900");
            $("#email_1").css("border-right-color", "#900");
            $(".alerta_2").css("display", "block");
            $("#error_email_1").css("display", "block");
            return false;
        }else
        {
            $("#email_1").css("border-bottom-color", "#000");
            $("#email_1").css("border-top-color", "#000");
            $("#email_1").css("border-left-color", "#000");
            $("#email_1").css("border-right-color", "#000");
            $(".alerta_2").css("display", "none");
            $("#error_email_1").css("display", "none");
        }





        if( (email_2.value == "") || (email_2.value != email_1.value) )
        {
            $("#email_2").css("border-bottom-color", "#900");
            $("#email_2").css("border-top-color", "#900");
            $("#email_2").css("border-left-color", "#900");
            $("#email_2").css("border-right-color", "#900");
            $(".alerta_3").css("display", "block");
            $("#error_correo").css("display", "block");
            return false;
        }else
        {
            $("#email_2").css("border-bottom-color", "#000");
            $("#email_2").css("border-top-color", "#000");
            $("#email_2").css("border-left-color", "#000");
            $("#email_2").css("border-right-color", "#000");
            $(".alerta_3").css("display", "none");
            $("#error_correo").css("display", "none");
        }








         $.ajax({
                  type: "POST",
                  url: "enviar_ofertas_home.php",
                  data : "email_1="+$('#email_1').val(),
                  success: function(data)
                  {

                      $.fancybox("#gracias_popup");
                      setTimeout("location.href='index.php'", 2000);


                  }
            });


        return false;
    }
    </script>


</head>

<body>



<?php
include("header.php");
?>


<div id="gracias" style="width:350px;display: none; background-color:#FFF;">
    <form>
                    <table cellpadding="0" cellspacing="0" width="98%" align="center" style="border:solid 1px #666; margin:1%">
                    <tr><td>

                    <table cellpadding="0" cellspacing="0" width="100%" height="40" style="padding:10px; background-color:#000" >
                    <tr>
                    <td width="320" align="left" style="color:#FFF">ESTAS REGISTRADO</td>
                    <td align="right" valign="top" width="30"><a href="detalle_cuenta.php" style="cursor:pointer;text-decoration:none;color:#FFF">X</a></td>
                    </tr>
                    </table>

                    </td></tr>
                    <tr>
                    <td align="left" class="fuente_georgia font_size12" style="color:#000;padding-left:10px; line-height:10px;">
                    <br><br><br>
                    GRACIAS POR REGISTRARTE.<BR><br>
                    Desde ahora recibirás muchas novedades. <br><br>
                    Compra en UFIT.PE
                    <br><br>
                    </td>
                    </tr>
                    <tr><td height="10"></td></tr>
                    </table>
                    </form>
  </div>



<!-- Sección de Preguntas frecuentes -->
<section id="preguntas-frecuentes">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row text-center">
                    <div class="col-xs-10 col-xs-offset-1">
                        <h1 class="font_size18">Preguntas y respuestas frecuentes</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="height-30"></div>
                </div>
                <!-- Preguntas -->
                <div class="row">

                    <?php

                        $n=0;
                        $result10 = $db_Full->select_sql("SELECT * FROM tbl_temas order by orden_tema asc");
                        while ($row10 = mysqli_fetch_array($result10)){
                            $n++;
                            ?>

                    <div class="col-xs-6">
                        <div class="circle text-center pull-left"><?php echo $n;?></div><a href="preguntas_frecuentes.php?id_tema=<?php echo $row10['id_tema'];?>"><h4><?php echo $row10['titulo_tema'];?></h4></a>
                        <ul>

                            <?php

                            $result100 = $db_Full->select_sql("SELECT * FROM tbl_preguntas where fktema_pre='".$row10['id_tema']."' ");
                            while ($row100 = mysqli_fetch_array($result100)){
                                ?>

                            <li><a href="preguntas_frecuentes.php?id_tema=<?php echo $row10['id_tema'];?>"><?php echo $row100['titulo_pre'];?></a></li>

                                <?php
                            }

                            ?>

                        </ul>
                    </div>

                            <?php
                            if($n%2==0){
                                ?>

                </div>
                <div class="row visible-xs">
                    <div class="height-30"></div>
                </div>
                <div class="row">

                                <?php
                            }

                        }

                    ?>

                </div>
                <div class="row"><hr></div>
                <div class="row">

                    <?php

                        $n = $_GET['id_tema'];
                        $result10 = $db_Full->select_sql("SELECT * FROM tbl_temas where id_tema='".$_GET['id_tema']."' order by orden_tema asc");
                        while ($row10 = mysqli_fetch_array($result10)){
                            ?>

                    <div class="col-sm-12 pb-20">
                        <div class="circle text-center pull-left"><?php echo $n;?></div>
                        <h4><?php echo $row10['titulo_tema'];?></h4>
                    </div>
                    <div class="col-sm-12">
                        <!-- Accordion -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <?php

                                $j=1;

                                $result100 = $db_Full->select_sql("SELECT * FROM tbl_preguntas where fktema_pre='".$row10['id_tema']."' ");
                                while ($row100 = mysqli_fetch_array($result100)){
                                    ?>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?php echo $j; ?>">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#preg1<?php echo $j; ?>" aria-expanded="<?php if($j==1) echo 'true'; else echo 'false'; ?>" aria-controls="preg1<?php echo $j; ?>"><?php echo $row100['titulo_pre'];?></a>
                                  </h4>
                                </div>
                                <div id="preg1<?php echo $j; ?>" class="panel-collapse collapse<?php if($j==1) echo ' in'; ?>" role="tabpanel" aria-labelledby="heading<?php echo $j; ?>">
                                  <div class="panel-body">
                                    <?php echo $row100['respuesta_pre'];?>
                                  </div>
                                </div>
                            </div>

                                    <?php
                                    $j++;
                                }

                        }

                    ?>

                        </div>
                        <!-- ./Accordion -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>

</body>
</html>
