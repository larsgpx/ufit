<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../js/plupload-2.1.9/js/plupload.full.min.js"></script>
<script type="text/javascript" src="../js/plupload-2.1.9/js/i18n/es.js"></script>
<script type="text/javascript" src="../js/plupload-2.1.9/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="../webroot/assets/js/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/bootstrap-toggle.min.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../webroot/assets/js/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="../webroot/assets/js/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/summernote.min.js"></script>




<!-- ================================================
Data Tables
================================================ -->
<script src="../webroot/assets/js/datatables.min.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="../webroot/assets/js/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="../webroot/assets/js/main.js"></script>


<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/moment.min.js"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/fullcalendar.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="../webroot/assets/js/daterangepicker.js"></script>

<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->



<script>
/*$(".load_combo_ajax").click(function(){
            var op     = $(this).attr("data");
            var id     = $(this).attr("id-ajax");
            var iframe = $(this).attr("iframe");

            $.ajax({
                        url:'../admin/gestion-consultas',
                        type:'POST',
                        data:{
                               option_consulta: op
                        },
                        success:function(data){
                            console.log($("#asignar_categoria_ifr").contents().find("#titulo_categoria_tipos"));
                            console.log( '');
                            //$("#"+id).html(data);
                        }
            });
});*/

function load_combo_ajax_iframe(THIS,id,val,id2){ 
            var op  = 'combo_load_categoria_tipos';
            console.log('d');
             

            $.ajax({
                        url:'../admin/gestion-consultas',
                        type:'POST',
                        data:{
                                option_consulta: op,
                                valor:val
                        },
                        success:function(data){
                           $(THIS).contents().find("#"+id).html(data);
                        }
            });
} 

$(document).ready(function() {
    $('#example0').DataTable();
	//console.log($("#titulo_categoria_tipos").html());


} );
</script>



<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {

        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>



<!-- Basic Date Range Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-picker').daterangepicker(null, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Basic Single Date Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Date Range and Time Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-and-time-picker').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    format: 'MM/DD/YYYY h:mm A'
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>


<script type="text/javascript" src="../webroot/js/admin/admin.js"></script>

</body>
</html>