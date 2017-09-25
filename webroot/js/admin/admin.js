var total_cara_multi = 0;

function del_caracteristica_multi(THIS){
	$(THIS).parents(".detalles_caract").find(".collapse_cara_"+total_cara_multi).remove();
	$(THIS).parents(".detalles_caract").find(".collapse_caract_"+total_cara_multi).remove();
}	

function add_caracteristica_multi(THIS){
	total_cara_multi++;
$lineas = '<div class="btn collapse_cara_+total_cara_multi" data-toggle="collapse" data-target="#collapse_caract_+total_cara_multi">'
			+'<span class="close" onclick="del_caracteristica_multi(this)">X</span>'
			+'<div class="title">Caracteristica 1</div>'
		+'</div>'
		+'<div id="collapse_caract_+total_cara_multi" class="collapse clearfix">'
			+'<div class="clearfix">'
					+'<label for="titulo_cara_+total_cara_multi" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Titulo</label>'
					+'<input type="text" name="titulo_caracteristicas[]" id="titulo_cara_+total_cara_multi" class="col-xs-8 col-sm-7 col-md-7 col-lg-7">'
			+'</div>'
			+'<div class="clearfix">'
					+'<label for="detalle_cara_+total_cara_multi" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Detalle</label>'
					+'<input type="text" name="detalle_caracteristicas[]" id="detalle_cara_+total_cara_multi" class="col-xs-7 col-sm-7 col-md-7 col-lg-7">'
			+'</div>'
			+'<div class="clearfix">'
					+'<label for="descripcion_cara_+total_cara_multi" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Descripción</label>'
					+'<textarea name="descripcion_caracteristicas[]" id="descripcion_cara_+total_cara_multi" class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="height: 126px;"></textarea>'
			+'</div>'
		+'</div>';
	//$(THIS).parent()
}

function generar_url(THIS){ 
  str = $(THIS).val().replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  ini = '';

  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes
    
    if($(".ini_url").length){

    	type = $(".ini_url").prop('tagName');
    	//console.log(type);
    	if(type == 'INPUT'){
    		ini = $(".ini_url").val();
    	}
    	else{
    		    ini = $(".ini_url option:selected").attr("data")+'/';
    			if(ini == 'undefined'){ini='';}
    	}
	}

	if(str.length){
		$urkl = verificar_url(ini + str); 
		$(".mostrar_url").val($urkl);
	}
	//$urkl = verificar_url(ini + str);  //console.log(ini + str + 'fdddd');
	//$(".mostrar_url").val($urkl);
	//$(".mostrar_url").val(ini + str);
}

function verificar_url(url){
	var url_final = url;
	//console.log(url_final);
	if(3 <= url.length){
		var op = 'url_productos_verificar'; //console.log('hi');

		$.ajax({
					        url:'../admin/gestion-mantenimiento',
			                type:'POST',
			                data:{
			                       option 		   : op,
			                       url             : url_final
			                },
					        success:function(data){   console.log(data)
								url_final = data; 
								if(data != ''){
									$(".mostrar_url").val(data);	
								}
					        }
		        });
	}
	
	return url_final;
}
function pasar_url_iframe(THIS){
	$(THIS).parent().find("iframe").attr("src",$(THIS).attr("data-link"));
}

function initUploader(condi_max_file,max_file,size,Uploader,files_uploader,extensiones,start_upload,mensaje_file,dimensiones) {
	file_count = 0; var files = Array();

    $("#"+Uploader).pluploadQueue({
		runtimes : 'html5,flash,silverlight,html4',
		url: "../../admin/aplication/upload_file.php",
		max_file_size : size,
		//max_file_count: max_file,
		init : {
		            FilesRemoved: function(up, files) {
		                if (up.files.length <= max_file) {
		                    $('#uploader_browse').fadeIn("slow");
		                }
		            },
		            FilesAdded: function (up, files) {
		            	if(start_upload == true){
		            		up.start();
		            	}
		            	else{
			            		if(max_file != 0){
			            			if(condi_max_file == '<='){
			            				if(up.files.length <= max_file )
					                     {
					                           $('.plupload_start').removeClass('plupload_disabled');  
					                     }
			            			}
				                    else{
				                    		if(condi_max_file == '>='){
				                    			if(up.files.length >= max_file )
							                     {
							                           $('.plupload_start').removeClass('plupload_disabled');  
							                     }
				                    		}
					                    	else{
					                    			if(condi_max_file == '=='){
						                    			if(up.files.length == max_file )
									                     {
									                           $('.plupload_start').removeClass('plupload_disabled');  
									                     }
						                    		}
						                    		else{
						                    				$('.plupload_start').removeClass('plupload_disabled'); 
					                     	   				$('.plupload_start').addClass('plupload_disabled'); 
						                    		}
					                     	   
					                     	} 
				                    }
				                     
				            	}
		            	}
		            },
		            UploadComplete: function (up, files) {
		                // destroy the uploader and init a new one
		                //up.destroy();
		                //initUploader();
		                //console.log(up);
		            }
        },
		chunks : {
			//size: '1mb',
			send_chunk_number: false // set this to true, to send chunk and total chunk numbers instead of offset and total bytes
		},
		rename : true,
		dragdrop: true,
		filters : [
			{title : "Image files", extensions : extensiones}
			/*{title : "Zip files"  , extensions : "zip"}*/
		],
		// Resize images on clientside if we can
		//resize : { quality : 95},
		flash_swf_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/flash/Moxie.cdn.swf',
		silverlight_xap_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/silverlight/Moxie.cdn.xap',
	});

	$("#"+Uploader+" .plupload_header_text").html(mensaje_file+" - "+dimensiones);
	var uploader = $('#'+Uploader).pluploadQueue();
    
    fil = $("#"+files_uploader).val(); var fil='';

	if($("#"+Uploader).length){ 
		    uploader.bind('FileUploaded', function(up, file, info) {
		    	file_count++; 
		    	var obj = JSON.parse(info.response);
		        $("#"+files_uploader).val($("#"+files_uploader).val()+","+obj['file']);
		    }); 
	}
}

var columns  = [];
var columns2 = [];

function aplicar_caracteristicas_pro(THIS,op){
	var id        = $("#tipo").val();
	var categoria = $(THIS).parents("#categorias");
	var filtros   = $(THIS).parents("#filtros");
	
	if(op == 'categoria'){ 
	      val  = categoria.find("#categoria_producto");
	      html = categoria.find("#subcategoria_producto");
	      html.find("li").each(function(){
	    	  if($(this).hasClass("pre")){
	    		$(this).removeClass("pre");
	    		$(this).addClass("active");
	    	  }
	      });

	      if(html.parent().find(".recover .id_"+id+".cat_"+val.attr("val")+".element_"+html.find("li:eq(1)")[0].value).length){
	     	html.parent().find(".recover .id_"+id+".cat_"+val.attr("val")+".element_"+html.find("li:eq(1)")[0].value).remove();
		  }
	      html.parent().find(".recover").append('<div class="item id_'+id+' cat_'+val.attr("val")+' element_'+html.find("li:eq(1)")[0].value+'">'+html.html()+"</div>");
        
          columns  = []; 
		  categoria.find(".recover .item").each(function(){ 
		  	 ele = $(this).attr("class"); str = ele.split(" "); element = str[2].substr(4,str[2].length); 
			 $(this).find("li.active").each(function(){ 
					columns.push([id,element,$(this).attr("value")]); 
			 });
		  });
		  //console.log(columns)
	}
	else{
		  val  = $("#filtro_producto");
	      html = $("#subfiltro_producto");
	      html.find("li").each(function(){
	    	  if($(this).hasClass("pre")){
	    		 $(this).removeClass("pre");
	    		 $(this).addClass("active");
	    	  }
	      });

	      if(html.parent().find(".recover .id_"+id+".cat_"+val.attr("val")+".element_"+html.find("li:eq(1)")[0].value).length){
	     	html.parent().find(".recover .id_"+id+".cat_"+val.attr("val")+".element_"+html.find("li:eq(1)")[0].value).remove();
		  }

	      html.parent().find(".recover").append('<div class="item id_'+id+' cat_'+val.attr("val")+' element_'+html.find("li:eq(1)")[0].value+'">'+html.html()+"</div>");
	      columns2 = [];
	      filtros.find(".recover .item").each(function(){
	      	    ele = $(this).attr("class"); str = ele.split(" "); element = str[2].substr(4,str[2].length);
				$(this).find(".active").each(function(){
						columns2.push([id,element,$(this).attr("value")]); 
				});
		  });
	}
    // var a   =  new Array(); a[key[0]] = val[0]; a[key[1]] = val[1];
    // columns.push([key[0],val[0]],[key[1],val[1]]);  console.log(columns2);  hidenn.val(columns2);
	categoria.find(".caracteristicas_contents").val(JSON.stringify(columns));
	filtros.find(".caracteristicas_contents").val(JSON.stringify(columns2));
}
function quitar_caracteristicas_pro(THIS){

}
function mensaje_ok(msj){
	$("#display_error").hide();
	$("#display_success").show();
	$("#display_success .alert-success").html(msj);
	setTimeout('history.back()',3000);
}
function mensaje_error(op,msj){
	$("#display_success").hide();
	$("#display_error").show();

	if(op == '1'){
		  $("#display_error .alert-danger").html(msj);
		  $("#display_error .alert-warning").hide();
		  $("#display_error .alert-danger").show();
	}
	else{
		  $("#display_error .alert-warning").html(msj);
		  $("#display_error .alert-danger").hide();
		  $("#display_error .alert-warning").show();
	}
}
function add_new_producto(THIS){

	$("html,body").animate({ scrollTop : $("#display_error").offset().top-100  }, 900 );

	var op   			   = 'add_productos';
	var files_uploader     = $("form[name=clientes] #files_uploader").val();
	var files_uploader2    = $("form[name=clientes] #files_uploader2").val();
	/**************************************  SEO ****************************************/
	var titulo_seo         = $("form[name=clientes] input[name=titulo_seo]").val();
	var keywords_seo       = $("form[name=clientes] input[name=keywords_seo]").val();
	var descripcion_seo    = $("form[name=clientes] textarea[name=descripcion_seo]").val();
	/*************************************  form ****************************************/
	var titulo             = $("form[name=clientes] input[name=titulo]").val();
	var url                = $("form[name=clientes] input[name=url]").val();
	var precio             = $("form[name=clientes] input[name=precio]").val();
	var descripcion        = $("form[name=clientes] textarea[name=descripcion]").val();
	var codigo             = $("form[name=clientes] input[name=codigo]").val();
	var tipo 			   = $("form[name=clientes] select[name=tipo]").val();
	var tipo_moneda        = $("form[name=clientes] select[name=tipo_moneda]").val();
	var titulo_caract      = $("form[name=clientes] input[name=titulo_caracteristicas]").val();
	var detall_caract      = $("form[name=clientes] input[name=detalle_caracteristicas]").val();
	var descri_caract      = $("form[name=clientes] textarea[name=descripcion_caracteristicas]").val();
	var descuento          = $("form[name=clientes] input[name=descuento]").val();
	var periodo_descuento  = $("form[name=clientes] input[name=periodo_descuento]").val();
	var marca              = $("form[name=clientes] select[name=marca]").val();
	var tipopersona        = $("form[name=clientes] select[name=tipopersona]").val();
	var columns_var        = $("form[name=clientes] input[name=categorias_contents]").val();
	var columns2_var       = $("form[name=clientes] input[name=filtro_contents]").val();
	
	/*if($.trim($("#files_uploader").val()) == ''){
		$("#display_error .alert-danger").hide();
		$("#display_error .alert-warning").html('Debes de subir las 7 imagenes de los productos');
		$("#display_error").show();
		$("#display_error .alert-warning").show();
	}
	else{ */ 
				    $.ajax({
					          url:'aplication/modelo/model_productos.php',
					          type:'POST',
					          data:{
					          		 option_consulta 		     : op,
					          		 column_categoria 		     : columns_var,
					          		 column_filtro 		 		 : columns2_var,
					          		 files_uploader  		     : files_uploader,
					          		 titulo_seo		 		     : titulo_seo,
					          		 keywords_seo    		     : keywords_seo,
					          		 descripcion_seo 		     : descripcion_seo,
					          		 titulo          		     : titulo,
					          		 url             		     : url,
					          		 precio          		     : precio,
					          		 tipo_moneda     		     : tipo_moneda,
					          		 descripcion     		     : descripcion,
					          		 codigo          		     : codigo,
					          		 tipo            		     : tipo,
					          		 titulo_caracteristicas      : titulo_caract,
					          		 detalle_caracteristicas     : detall_caract,
					          		 descripcion_caracteristicas : descri_caract,
					          		 files_uploader2             : files_uploader2,
					          		 descuento					 : descuento,
					          		 periodo_descuento			 : periodo_descuento,
					          		 marca                       : marca,
					          		 tipopersona                 : tipopersona
					          },
					          success:function(data){ //console.log(data);
						            object = JSON.parse(data);

						            if(object['error'] == '1'){
						                mensaje_error(object['tipo_error'],object['msj']);
						            }else{
						            	mensaje_ok(object['msj']);   
						            }
					          }
		           });
				   return false;
			
	//}	
}

function radio_opcion_categoria(THIS){
	if($(THIS).val() == '1'){
		 $("#multiple_opcion_tipo .bloque_crear_categoria").show();
		 $("#multiple_opcion_tipo .bloque_sele_categoria").hide();
	}
	else{
		 $("#multiple_opcion_tipo .bloque_crear_categoria").hide();
		 $("#multiple_opcion_tipo .bloque_sele_categoria").show();
	}
}

function load_contenidos_subfiltros(THIS){
	var op     = 'load_contenidos_subfiltros';
    var cat    = $("#filtro_producto").attr("val");
    var copia  = $("#filtro_producto").attr("copia");
    var id     = $("#tipo").val();
    var subfil = $("#subfiltro_producto");

    if($("#subfiltro_producto").parent().find(".recover .id_"+id+".cat_"+cat).length){
    	$("#multiple_opcion_tipo #subfiltro_producto").html($("#subfiltro_producto").parent().find(".recover .id_"+id+".cat_"+cat).html());
    	subfil.parent().find(".lista_dinamic_button").html(subfil.find("li:eq(0)").text());
    }
    else{	
		    $.ajax({
			                url:'../admin/gestion-consultas',
			                type:'POST',
			                data:{
			                       option_consulta : op,
			                       data 		   : cat,
			                       copia		   : copia

			                },
			                success:function(data){ 
			                    $("#multiple_opcion_tipo #subfiltro_producto").html(data);
			                    subfil.parent().find(".lista_dinamic_button").html(subfil.find("li:eq(0)").text());
			                }
	        });
	}
}

function load_contenidos_subcategorias(){
	var op     = 'load_contenidos_subcategoria';
    var cat    = $("#categoria_producto").attr("val");
    var tipo   = $("#tipo").val();
    var data   = $("#categoria_producto").attr("data"); 
    var subcat = $("#subcategoria_producto");

    if($("#subcategoria_producto").parent().find(".recover .id_"+tipo+".cat_"+cat).length){
    	$("#multiple_opcion_tipo #subcategoria_producto").html($("#subcategoria_producto").parent().find(".recover .id_"+tipo+".cat_"+cat).html());
    	subcat.parent().find(".lista_dinamic_button").html(subcat.find("li:eq(0)").text());
    }
    else{
	    	$.ajax({
			                url:'../admin/gestion-consultas',
			                type:'POST',
			                data:{
			                       option_consulta: op,
			                       tipo:tipo,
			                       cat:cat,
			                       data:data
			                },
			                success:function(data){
			                    $("#multiple_opcion_tipo #subcategoria_producto").html(data);
			                    subcat.parent().find(".lista_dinamic_button").html(subcat.find("li:eq(0)").text());
			                }
	    	});
    }
}
function asignar_producto_categoria(){

}
function load_contenidos_tipo(THIS){
	var op   = 'load_contenidos_tipo';
    var tipo = $("#tipo").val();

	$.ajax({
		                url:'../admin/gestion-consultas',
		                type:'POST',
		                data:{
		                       option_consulta : op,
		                       tipo            : tipo
		                },
		                success:function(data){ //console.log(data);
		                	obj = JSON.parse(data);
		                    $("#multiple_opcion_tipo #categoria_producto").html(obj['categoria']);
		                    $("#multiple_opcion_tipo #filtro_producto").html(obj['filtro']);
		                }
    });
}
function change_ul(THIS,op){ 
	
	if(op == 's'){
		// $(THIS).parent().find("li").each(function(){
  //  			$(this).removeClass("pre");
  //  		});
        $(THIS).removeClass("pre");
   		$(THIS).addClass("pre");
	}
	else{ 
		  //$(THIS).toggleClass("pre");
		  if($(THIS).hasClass("pre")){
                $(THIS).removeClass("pre");
		  }
		  else{ 
		  	    $(THIS).addClass("pre");
		  }
		  
		  if($(THIS).hasClass("active")){
		  	 $(THIS).removeClass("pre");
             $(THIS).removeClass("active");
		  }
		  else{ 
		  	    $(THIS).addClass("active");
		  }
	}
   
   
   $(THIS).parent().parent().find("span").text($(THIS).text());
   $(THIS).parent().attr("val",$(THIS).attr("value"));
   $(THIS).parent().attr("data",$(THIS).attr("data"));
   $(THIS).parent().attr("copia",$(THIS).attr("copia"));
   opdata = $(THIS).parent().attr("opdata");
   if(opdata != ''){eval(opdata);}
   //trigger.click();
}
function checkbox_reporte(THIS){ 
	if($(THIS).is(":checked")){ 
		  app = '<div class="box lista_'+$(THIS).val()+'">';
		  app +=$(THIS).parents("tr").html();
		  app += "</div>";
		  $(THIS).parents("table").parent().parent().find(".elementos").append(app);
	}
	else{
		  $(THIS).parents("table").parent().parent().find(".elementos").find(".lista_"+$(THIS).val()).remove();
	}
	
}
function update_reporte(THIS,option){
	$(THIS).parent().parent().find("elementos .box").each(function(){

	});
	/*$.ajax({
		                url:'../admin/gestion-mantenimiento',
		                type:'POST',
		                data:{
		                       option : option,
		                       pagina : pagina
		                },
		                success:function(data){ //console.log(data);
		                	obj = JSON.parse(data);
		                    $(THIS).find(".reporte").html(obj['reporte']);
		                    $(THIS).find(".paginador").html(obj['paginacion']);
		                }
    });*/
}
function delete_reporte(THIS){
	
}
function change_form_reporte(THIS){
	switch($(THIS)[0].tagName){
		case "INPUT":  s = $(THIS).val(); $(THIS).attr("value",s); break;
		case "SELECT": s = $(THIS).val(); $(THIS).attr("value",s); 
					   s = $(THIS).attr("value"); 
						   $(THIS).find("option").each(function(){ //console.log("s:"+s+"-"+$(this).attr("value"));
								if($(this).attr("value") == s){
									$(this).attr("selected", true);
								}
								else{
									$(this).removeAttr("selected")
								}
							});

						break;   
	}

	$(THIS).attr("change",'1');
}
function list_dinamic_click(THIS){
	$(THIS).toggleClass('active');
	$(THIS).parent().find("ul").stop().slideToggle();
}
function reporte_ajax(THIS,op){ //
	var option   = op;
	if($(THIS).find(".paginador .pagina").length){
		var pagina   = $(THIS).find(".paginador .pagina").attr("pag");
	}
    else{
    	var pagina   = 1;
    }

	$.ajax({
		                url:'../admin/gestion-mantenimiento',
		                type:'POST',
		                data:{
		                       option : option,
		                       pagina : pagina
		                },
		                success:function(data){ //console.log(data);
		                	obj = JSON.parse(data);
		                    $(THIS).find(".reporte").html(obj['reporte']);
		                    $(THIS).find(".paginador").html(obj['paginacion']);
		                }
    });
}
$(window).click(function(){
  	  if($(".lista_dinamic ul").is(":visible") == true && $(".lista_dinamic .lista_dinamic_button").hasClass('active') == false){ 
  	  	//console.log('invisible')
  	 	 $(".lista_dinamic ul").hide();
  	  }

  	  $(".lista_dinamic .lista_dinamic_button").removeClass("active");
});

$(document).ready(function(){
	reporte_ajax($("#reporte_ajax"),'reporte_tipo_cambio');

	$(".generar_url").bind('input propertychange', function() {
	    $(".generar_url").val($(this).val()); 
	    $(".bloque_seo .titulo_seo").val($(this).val());
	    generar_url($(".generar_url"));
	});

  if($("#display_error").length){	
     $("html,body").animate({ scrollTop : $("#display_error").offset().top-100  }, 900 );
  }

  $(".titulo_subseo").keyup(function(){
  		$(".bloque_seo .titulo_seo").val($(this).val());
  });

  $('#periodo_descuento').daterangepicker({
	     locale: {
      format: 'YYYY-MM-DD'
    }
   });

   initUploader('<=',7,'0.5mb','uploader','files_uploader',"jpg,gif,png",false,"Tamaño máximo permitido: 500 kb","Tamaño recomendable 1050x1136px px");
   initUploader('',0,'0.5mb','uploader2','files_uploader2',"jpg,gif,png",false,"Tamaño máximo permitido: 500 kb","Tamaño recomendable 1051x1078 px");
  //initUploader (0,'1mb','uploader2','files_uploader2',"jpg,gif,png");   
/******NETKROM******/
/*$(".load_combo_ajax").click(function(){
		    var op = $(this).attr("data");
		    var id = $(this).attr("id-ajax");

		    $.ajax({
		                url:'../admin/gestion-consultas',
		                type:'POST',
		                data:{
		                       option_consulta: op
		                },
		                success:function(data){
		                    $(id).html(data);
		                }
		    });
});*/
			

$('.tooltip-info').tooltip();


});

jQuery("#categoria").change(function(){
        jQuery("#categoria option:selected").each(function () {
            categoria = jQuery(this).val();
             jQuery.post("ubigeos.php?tipe=categoria", { categoria: categoria }, function(data){
            jQuery("#subcategoria").html(data);
           });
        });
    });
	
	
	
	jQuery("#copia_categoria").change(function(){
        jQuery("#copia_categoria option:selected").each(function () {
            filtro_categoria = jQuery(this).val();
            filtro = jQuery("#filtro").val();
             jQuery.post("ubigeos.php?tipe=filtro_categoria", { filtro_categoria: filtro_categoria,filtro:filtro }, function(data){
            jQuery("#item").html(data);
           });
        });
    });


	jQuery("#filtro").change(function(){
        jQuery("#filtro option:selected").each(function () {
            filtro = jQuery(this).val();
             jQuery.post("ubigeos.php?tipe=filtro", { filtro: filtro }, function(data){
            jQuery("#item").html(data);
           });
        });
    });
	
 

		jQuery("#eleg_c").change(function(){
				jQuery("#eleg_c option:selected").each(function () {
					proveedor = jQuery(this).val();
					jQuery.post("ubigeos.php?tipe=cat", { proveedor: proveedor }, function(data){
						jQuery(".box_categoria").slideDown(250);
						jQuery(".box_audifono").slideUp(250);
						jQuery("#eleg_c1").html(data);
					});
				});
			});

		jQuery("#eleg_c1").change(function(){
				jQuery("#eleg_c1 option:selected").each(function () {
					categoria = jQuery(this).val();
					jQuery.post("ubigeos.php?tipe=au", { categoria: categoria }, function(data){
						jQuery(".box_audifono").slideDown(250);
						jQuery("#uleleg").html(data);
					});
				});
			});


			

$("#proveedor_producto").change(function(){
		$("#proveedor_producto option:selected").each(function () {
            proveedor = $(this).val();
            $.post("ubigeos.php?tipe=prov", { proveedor: proveedor }, function(data){
				$(".categoria_producto").slideDown(250);
				$("#categoria_producto").html("<option>Elegir...</option>");
				$("#categoria_producto").html(data);
        	});
        });
	});

	

// MANTENIMIENTO NETKROM

function mantenimiento_categoria(url,id,opcion){
	if(opcion!="delete"){
		location.replace(url+'&action='+opcion+'&id='+id);
	}else if(opcion=="delete"){
		if(!confirm("Esta Seguro que desea Eliminar el Registro")){
			return false;
		}else{
			location.replace(url+'&action='+opcion+'&id='+id);
		}
	}
	
}


// FIN MANTENIMIENTO NETKROM


function mantenimientob(url,id,opcion){
	if(opcion!="estado"){
		location.replace(url+'?action='+opcion+'&id='+id);
	}else if(opcion=="estado"){
		if(!confirm("Esta Seguro que desea Anular la Boleta")){
			return false;
		}else{
			location.replace(url+'?action='+opcion+'&id='+id);
		}
	}
}




function mantenimiento1(url,id,opcion){
	if(opcion!="imagen"){
		location.replace(url+'?action='+opcion+'&id='+id);
	}else if(opcion=="imagen"){

		if(!confirm("Esta Seguro de Borrar la Imagen")){
			return false;
		}else{
			location.replace(url+'?action='+opcion+'&id='+id);
		}
	}
}

function valida_usuarios(action,id){
								if(document.usuarios.id_rol.value==""){
									alert('ERROR: El campo  rol debe llenarse');
									document.usuarios.id_rol.focus();
									return false;
								}

								if(document.usuarios.nombre_usuario.value==""){
									alert('ERROR: El campo nombre usuario debe llenarse');
									document.usuarios.nombre_usuario.focus();
									return false;
								}

							
								if(document.usuarios.email_usuario.value==""){
									alert('ERROR: El campo email usuario debe llenarse');
									document.usuarios.email_usuario.focus();
									return false;
								}

								if(document.usuarios.login_usuario.value==""){
									alert('ERROR: El campo login usuario debe llenarse');
									document.usuarios.login_usuario.focus();
									return false;
								}
								if(action=="add"){
								if(document.usuarios.password_usuario.value==""){
									alert('ERROR: El campo password usuario debe llenarse');
									document.usuarios.password_usuario.focus();
									return false;
								}
								}
								document.usuarios.action="usuarios.php?action="+action+"&id="+id;
				document.usuarios.submit();
			}



    /*function load_combo_ajax(THIS){ 
		    console.log('data');
		    var op = 'combo_load_categoria_tipos';

		    $.ajax({
		                url:'../admin/gestion-consultas',
		                type:'POST',
		                data:{
		                        option_consulta: op
		                },
		                success:function(data){
		                    console.log(data);
		                    $(THIS).html(data);
		                }
		    });
  } */

function valida_caja(opcion, id){
	var descripcion_caja = document.caja.elements['descripcion_caja'];
	var ingreso_caja = document.caja.elements['ingreso_caja'];
	var egreso_caja = document.caja.elements['egreso_caja'];

	if(descripcion_caja.value == ""){
		alert("Ingrese el Descripción");
		descripcion_caja.focus();
		return false;
	}
	
	if(ingreso_caja.value == "" &&  egreso_caja.value == ""){
		alert("Ingrese datos");
		return false;
	}
	

	document.caja.action="caja_chica.php?action="+opcion+"&id="+id;
	document.caja.submit();
}








// GUSTAVO

jQuery("#departamento").change(function(){
        jQuery("#departamento option:selected").each(function () {
            departamento = jQuery(this).val();
            jQuery.post("ubigeos.php?tipe=p", { departamento: departamento }, function(data){
             jQuery("#provincia").html(data);
			 });
        });
    });






jQuery("#provincia").change(function(){
        jQuery("#provincia option:selected").each(function () {
            provincia = jQuery(this).val();
            jQuery.post("ubigeos.php?tipe=d", { provincia: provincia }, function(data){
             jQuery("#distrito").html(data);
			 });
        });
    });



function validando_direcciones(opcion, id){
	var direccion = document.direcciones.elements['direccion'];
	var abreviatura = document.direcciones.elements['abreviatura'];
	var director = document.direcciones.elements['director'];

	if(direccion.value == ""){
		alert("Ingrese dirección");
		direccion.focus();
		return false;
	}
	
	if(abreviatura.value == ""){
		alert("Ingrese abreviatura");
		abreviatura.focus();
		return false;
	}
	
if(director.value == ""){
		alert("Ingrese el director");
		director.focus();
		return false;
	}
	

	document.direcciones.action="direcciones.php?action="+opcion+"&id="+id;
	document.direcciones.submit();
}








function validando_areas(opcion, id){
	var area = document.areas.elements['area'];
	var abreviatura = document.areas.elements['abreviatura'];
	var direccion = document.areas.elements['direccion'];

	if(area.value == ""){
		alert("Ingrese Área");
		area.focus();
		return false;
	}
	
	if(abreviatura.value == ""){
		alert("Ingrese abreviatura");
		abreviatura.focus();
		return false;
	}
	
if(direccion.value == ""){
		alert("Ingrese direccion");
		direccion.focus();
		return false;
	}
	

	document.areas.action="areas.php?action="+opcion+"&id="+id;
	document.areas.submit();
}



function validando_estaciones(opcion, id){
	var estacion = document.estaciones.elements['estacion'];
	var departamento = document.estaciones.elements['departamento'];
	var provincia = document.estaciones.elements['provincia'];
	var distrito = document.estaciones.elements['distrito'];

	if(estacion.value == ""){
		alert("Ingrese Estación");
		estacion.focus();
		return false;
	}
	
	if(departamento.value == ""){
		alert("Ingrese departamento");
		departamento.focus();
		return false;
	}
	
if(provincia.value == ""){
		alert("Ingrese provincia");
		provincia.focus();
		return false;
	}
	
	
	if(distrito.value == ""){
		alert("Ingrese distrito");
		distrito.focus();
		return false;
	}
	

	document.estaciones.action="estaciones.php?action="+opcion+"&id="+id;
	document.estaciones.submit();
}




function actualizando_vacunas(opcion, id){
	
		var nombre_categoria = document.vacunas.elements['vacuna'];

   if(nombre_categoria.value == ""){
		alert("Ingrese Vacuna");
		nombre_categoria.focus();
		return false;
	}
	
	
	document.vacunas.action="vacunas.php?action="+opcion+"&id="+id;
	document.vacunas.submit();
}













function validando_trabajadores(opcion, id){
	var nombres = document.trabajadores.elements['nombres'];
	var apellidos = document.trabajadores.elements['apellidos'];
	var materno = document.trabajadores.elements['materno'];
	var dni = document.trabajadores.elements['dni'];
	var cargo = document.trabajadores.elements['cargo'];
	var contrato = document.trabajadores.elements['contrato'];
	var direccion = document.trabajadores.elements['direccion'];
	var area = document.trabajadores.elements['area'];
	var estacion = document.trabajadores.elements['estacion'];

	if(nombres.value == ""){
		alert("Ingrese Nombres");
		nombres.focus();
		return false;
	}
	
	if(apellidos.value == ""){
		alert("Ingrese apellidos");
		apellidos.focus();
		return false;
	}
	
	
	if(materno.value == ""){
		alert("Ingrese apellidos");
		materno.focus();
		return false;
	}
	
	
if(dni.value == ""){
		alert("Ingrese DNI");
		dni.focus();
		return false;
	}
	
	
	if(cargo.value == ""){
		alert("Ingrese Cargo");
		cargo.focus();
		return false;
	}
	
	
	if(contrato.value == ""){
		alert("Ingrese Contrato");
		contrato.focus();
		return false;
	}
	
	if(direccion.value == ""){
		alert("Ingrese Dirección");
		direccion.focus();
		return false;
	}
	
	
	if(area.value == ""){
		alert("Ingrese área");
		area.focus();
		return false;
	}
	
	
	if(estacion.value == ""){
		alert("Ingrese Estaion");
		estacion.focus();
		return false;
	}
	
	
	document.trabajadores.action="trabajadores.php?action="+opcion+"&id="+id;
	document.trabajadores.submit();
}







function validando_ordenes(opcion, id){
	
		var motivo = document.ordenes.elements['motivo'];
		var dias = document.ordenes.elements['dias'];

   if(motivo.value == ""){
		alert("Ingrese Motivo de Viaje");
		motivo.focus();
		return false;
	}
	
	
	 if(dias.value == ""){
		alert("Ingrese Número de días");
		dias.focus();
		return false;
	}
	
	
	document.ordenes.action="ordenes.php?action="+opcion+"&id="+id;
	document.ordenes.submit();
}











function actualizar_ordenes(opcion, id,orden){
	
		var motivo = document.ordenes.elements['motivo'];
		var dias = document.ordenes.elements['dias'];

   if(motivo.value == ""){
		alert("Ingrese Motivo de Viaje");
		motivo.focus();
		return false;
	}
	
	
	 if(dias.value == ""){
		alert("Ingrese Número de días");
		dias.focus();
		return false;
	}
	
	
	
	
	
	document.ordenes.action="ordenes.php?action="+opcion+"&id="+id+"&id_orden="+orden;
	document.ordenes.submit();
}









function ingresar_ordenes(opcion, id,orden){
		var estacion1 = document.ordenes.elements['estacion1'];
		var estacion2 = document.ordenes.elements['estacion2'];


 if(estacion1.value == ""){
		alert("Ingrese Origen");
		estacion1.focus();
		return false;
	}
	
	
	 if(estacion2.value == ""){
		alert("Ingrese Destino");
		estacion2.focus();
		return false;
	}
	
	
	document.ordenes.action="ordenes.php?action="+opcion+"&id="+id+"&id_orden="+orden;
	document.ordenes.submit();
}















function actualizar_destinos(opcion, id,orden,destino){
	
		var estacion1 = document.ordenes.elements['estacion1'];
		var estacion2 = document.ordenes.elements['estacion2'];


 if(estacion1.value == ""){
		alert("Ingrese Origen");
		estacion1.focus();
		return false;
	}
	
	
	 if(estacion2.value == ""){
		alert("Ingrese Destino");
		estacion2.focus();
		return false;
	}
	
	
	document.ordenes.action="ordenes.php?action="+opcion+"&id="+id+"&id_orden="+orden+"&id_viaje="+destino;
	document.ordenes.submit();
}








function validando_viaticos(opcion, id,orden){
	
		var viatico = document.viaticos.elements['viatico'];
		var siaf = document.viaticos.elements['siaf'];
		var certificacion = document.viaticos.elements['certificacion'];
		var monto = document.viaticos.elements['monto'];
		var fuente = document.viaticos.elements['fuente'];
		var inicio = document.viaticos.elements['inicio'];
		var fin = document.viaticos.elements['fin'];

   if(viatico.value == ""){
		alert("Ingrese Número de Viático");
		viatico.focus();
		return false;
	}
	
	
	 if(siaf.value == ""){
		alert("Ingrese Número de Siaf");
		siaf.focus();
		return false;
	}
	
	
	if(certificacion.value == ""){
		alert("Ingrese Número de Certificación");
		certificacion.focus();
		return false;
	}
	
	
	if(monto.value == ""){
		alert("Ingrese Monto");
		monto.focus();
		return false;
	}
	
	if(fuente.value == ""){
		alert("Ingrese Fuente");
		fuente.focus();
		return false;
	}
	
	
	if(inicio.value == ""){
		alert("Ingrese Fecha de Inicio");
		inicio.focus();
		return false;
	}
	
	if(fin.value == ""){
		alert("Ingrese Fecha de Retorno");
		fin.focus();
		return false;
	}
	
	
	document.viaticos.action="viaticos.php?action="+opcion+"&id="+id+"&id_orden="+orden;
	document.viaticos.submit();
}







function validando_concepto(opcion, id,orden,tra){
	
		var documento = document.concepto.elements['documento'];
		var concepto = document.concepto.elements['concepto'];
		var importe = document.concepto.elements['importe'];
		var fecha = document.concepto.elements['fecha'];
	

   if(documento.value == ""){
		alert("Ingrese Documento");
		documento.focus();
		return false;
	}
	
	
	 if(concepto.value == ""){
		alert("Ingrese el concepto");
		concepto.focus();
		return false;
	}
	
	
	if(importe.value == ""){
		alert("Ingrese el importe");
		importe.focus();
		return false;
	}
	
	

	
	if(fecha.value == ""){
		alert("Ingrese Fecha");
		fecha.focus();
		return false;
	}
	
	
	document.concepto.action="rendicion.php?action="+opcion+"&id="+id+"&id_orden="+orden+"&id_tra="+tra;
	document.concepto.submit();
}






function validando_rendicion(opcion,id,orden,tra){
	
		var rendicion = document.rendicion.elements['tipo'];

   if(rendicion.value == ""){
		alert("Ingrese Tipo de Pago");
		rendicion.focus();
		return false;
	}
	

	
	document.rendicion.action="rendicion.php?action="+opcion+"&id="+id+"&id_orden="+orden+"&id_tra="+tra;
	document.rendicion.submit();
}






/*******/