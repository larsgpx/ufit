/** Alert Position Top  **/
$(document).ready(function(){
   
    $("#showtop").click(function(){
        $("#alerttop").fadeToggle(350);
    });
});
function updateImagenesColumnasMagazine(THIS,op,id){  
    var url_imagen      =  '';
    iframe              =  $(id);
    var tipo            =  iframe.find("table tbody .tipo").serializeArray();
    var apertura_column =  iframe.find("table tbody .apertura_columna").serializeArray();
    var anumero_columna =  iframe.find("table tbody .anumero_columnas").serializeArray();
    var numero_columnas =  iframe.find("table tbody .numero_columnas").serializeArray();
    var orden_imagen    =  iframe.find("table tbody .orden_imagen").serializeArray();
    var tipo_imagen     =  (iframe.find("table tbody .tipo_imagen").length) ? iframe.find("table tbody .tipo_imagen").serializeArray()   : '';
    var ancho_imagen    =  (iframe.find("table tbody .ancho_imagen").length) ? iframe.find("table tbody .ancho_imagen").serializeArray() : '';
    var alto_imagen     =  (iframe.find("table tbody .alto_imagen").length) ? iframe.find("table tbody .alto_imagen").serializeArray()   : '';
    var texto_imagen    =  (iframe.find("table tbody .texto_imagen").length) ? iframe.find("table tbody .texto_imagen").serializeArray()   : '';
    var clases_imagen   =  (iframe.find("table tbody .clases_imagen").length) ? iframe.find("table tbody .clases_imagen").serializeArray()   : '';
    var size_texto_ima  =  (iframe.find("table tbody .size_texto_imagen").length) ? iframe.find("table tbody .size_texto_imagen").serializeArray()   : '';
    var op              =  op;
    var mensaje         =  $(THIS).parents(".modal-content").find(".mensaje");
    
    if(iframe.find("table tbody .url_imagen").length){
        url_imagen      = iframe.find("table tbody .url_imagen").serializeArray();
    }
    //console.log(iframe.html());

    mensaje.hide();
    
    $.ajax({
                        url:'../admin/gestion-mantenimiento',
                        type:'POST',
                        data:{      
                                    option                    : op,
                                    tipo                      : tipo,
                                    tipo_imagen               : tipo_imagen,
                                    ancho_imagen              : ancho_imagen,
                                    alto_imagen               : alto_imagen,
                                    texto_imagen              : texto_imagen,
                                    clases_imagen             : clases_imagen,
                                    size_texto_ima            : size_texto_ima,
                                    numero_columnas           : numero_columnas,
                                    anumero_columnas          : anumero_columna,
                                    orden_imagen              : orden_imagen,
                                    apertura_column           : apertura_column
                              },
                        success:function(data){ 
                                console.log(data);
                                object = JSON.parse(data);
                                mensaje.show();

                                if(object['error'] == 1){
                                    mensaje.find(".alert-success").hide();
                                    mensaje.find(".alert-danger").show();
                                    mensaje.find(".alert-danger").text(object['mensaje']);     
                                }else{
                                    mensaje.find(".alert-danger").hide();
                                    mensaje.find(".alert-success").show();
                                    mensaje.find(".alert-success").text(object['mensaje']);         
                                }

                                mensaje.hide(9000);
                        }
            });         
}

function updateImagenesColumnas(THIS,op){  
    var url_imagen      =  '';
    iframe              =  $(THIS).parents(".modal-content").find("iframe").contents();
    var tipo            =  iframe.find("table tbody .tipo").serializeArray();
    var url_1           =  (0 < iframe.find("table tbody .url_n_1").length) ? iframe.find("table tbody .url_n_1").val(): '';
    var url_2           =  (0 < iframe.find("table tbody .url_n_2").length) ? iframe.find("table tbody .url_n_2").serializeArray(): '';
    var numero_columnas =  iframe.find("table tbody .numero_columnas").serializeArray();
    var orden_imagen    =  iframe.find("table tbody .orden_imagen").serializeArray();
    var op              =  op;
    var mensaje         =  $(THIS).parents(".modal-content").find(".mensaje");
    
    if(iframe.find("table tbody .url_imagen").length){
        url_imagen      = iframe.find("table tbody .url_imagen").serializeArray();
    }
    //console.log(iframe.find("table tbody .url_n_1").val());

    mensaje.hide();
    
    $.ajax({
                        url:'../admin/gestion-mantenimiento',
                        type:'POST',
                        data:{      url_1                     : url_1,
                                    url_2                     : url_2,
                                    option                    : op,
                                    tipo                      : tipo,
                                    numero_columnas           : numero_columnas,
                                    orden_imagen              : orden_imagen,
                                    url_imagen                : url_imagen
                              },
                        success:function(data){ console.log(data);
                                object = JSON.parse(data);
                                mensaje.show();

                                if(object['error'] == 1){
                                    mensaje.find(".alert-success").hide();
                                    mensaje.find(".alert-danger").show();
                                    mensaje.find(".alert-danger").text(object['mensaje']);     
                                }else{
                                    mensaje.find(".alert-danger").hide();
                                    mensaje.find(".alert-success").show();
                                    mensaje.find(".alert-success").text(object['mensaje']);         
                                }

                                mensaje.hide(9000);
                        }
    });
    
 }
 function modal_tipos_iframe(THIS){
    $(THIS).parent().find("iframe").attr("src",$(THIS).attr("data-modal"));
 }

 
/** Alert Position Bottom  **/
$(document).ready(function(){
    $("#showbottom").click(function(){
        $("#alertbottom").fadeToggle(350);
    });
});

/** Alert Position Top Left  **/
$(document).ready(function(){
    $("#showtopleft").click(function(){
        $("#alerttopleft").fadeToggle(350);
    });
});

/** Alert Position Top Right  **/
$(document).ready(function(){
    $("#showtopright").click(function(){
        $("#alerttopright").fadeToggle(350);
    });
});

/** Alert Position Bottom Left  **/
$(document).ready(function(){
    $("#showbottomleft").click(function(){
        $("#alertbottomleft").fadeToggle(350);
    });
});

/** Alert Position Bottom Right  **/
$(document).ready(function(){
    $("#showbottomright").click(function(){
        $("#alertbottomright").fadeToggle(350);
    });
});
