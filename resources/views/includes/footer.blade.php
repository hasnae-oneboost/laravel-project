 
<!-- PAGE FOOTER -->
<div class="page-footer" style="background-color: #333; ">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">{{config('app.name')}} <span class="hidden-xs"> - Web Application </span>&copy; 2018</span>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->
	<!--================================================== -->
<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="/backend/js/plugin/pace/pace.min.js"></script>


<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="/backend/js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>


<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="/backend/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>
<!-- IMPORTANT: APP CONFIG -->
<script src="/backend/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="/backend/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="/backend/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="/backend/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="/backend/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="/backend/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="/backend/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="/backend/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="/backend/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="/backend/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="/backend/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="/backend/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="/backend/js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only 
<script src="/backend/js/demo.min.js"></script>-->

<!-- MAIN APP JS FILE -->
<script src="/backend/js/app.min.js"></script>




<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="/backend/js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="/backend/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="/backend/js/smart-chat-ui/smart.chat.manager.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="/backend/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="/backend/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="/backend/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="/backend/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="/backend/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/backend/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Full Calendar -->
<script src="/backend/js/plugin/moment/moment.min.js"></script>
<script src="/backend/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>


<script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/fr.js'></script>


<!--Select 2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    
    <!--For: search 'pays' select-->
    <script type="text/javascript">
        $(".pays_select_").select2({
            
            placeholder: "Selectionnez un pays",
            allowClear: true,
        });
       
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        
    </script>
    <!--/Search option-->


    <!--For: Add 'pays' select-->
    <script type="text/javascript">
        $(".pays_select").select2({
             width: '100%',
            placeholder: "Selectionnez un pays",
            allowClear: true,
        });
       
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        
    </script>
    <!--For: Update 'pays' select-->
    <script type="text/javascript">
        $(".pays_selected").select2({ width: '100%'});
        
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>


    <!--For: Add 'ville' select-->
    <script type="text/javascript">
        $(".ville_select").select2({
            width: '100%',
            placeholder: "Selectionnez une ville",
            allowClear: true,
        });
       
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        
    </script>
    <!--For: Update 'ville' select-->
    <script type="text/javascript">
        $(".ville_selected").select2({ width: '100%'});
        
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>

 <!--For: Add 'banque' select-->
 <script type="text/javascript">
    $(".banque_select").select2({
        width: '100%',
        placeholder: "Selectionnez une banque",
        allowClear: true,
    });
   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--For: Update 'banque' select-->
<script type="text/javascript">
    $(".banque_selected").select2({ width: '100%'});
    
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>



<!--For: Add 'agence' select-->
<script type="text/javascript">
    $(".agence_select").select2({
        width: '100%',
        placeholder: "Selectionnez une agence bancaire",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Get List Agence from Bank -->
<script type="text/javascript"> 

    $('select[name="banque"]').on('change', function(){
     var banqueID = $(this).val();
     if(banqueID) {
         $.ajax({
             url: '/agences/get/'+banqueID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
 
             success:function(data) {
                 $('select[name="agence"]').select2().empty();
                 $.each(data, function(key, value){
 
                     $('select[name="agence"]').append('<option value="'+ key +'">' + value + '</option>');
 
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="agence"]').select2().empty();
     }
 
     }); 
    
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};
     
</script>


<!--Get List Cities from Countries -->
<script type="text/javascript">                                                                                     
   $('select[name="pays"]').on('change', function(){
    var paysID = $(this).val();
    if(paysID) {
        $.ajax({
            url: '/villes/get/'+paysID,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },
            success:function(data) {
                $('select[name="ville"]').select2({ width: '100%'}).empty();
                $.each(data, function(key, value){
                    $('select[name="ville"]').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[name="ville"]').select2().empty();
    }
    });   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};    
</script>

<!--For: Update 'agence' select-->
<script type="text/javascript">
    $(".agence_selected").select2({ width: '100%'});
    
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--For: Update 'roles' select -->
<script type="text/javascript">
    $(".role_selected").select2({ width: '200%' });
    
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--For: Add 'societes d'assurance' select societe_select-->
<script type="text/javascript">
    $(".societe_select").select2({
        width: '100%',
        placeholder: "Selectionnez une société d'assurance",
        allowClear: true,
    });
   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Numero compte comptable select-->
<script type="text/javascript">
    $(".num_compte_comptable_select").select2({
        width: '100%',
        placeholder: "Selectionnez un numero de compte comptable",
        allowClear: true,
    });
   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--For: search by name of 'courtier' select courtier_select-->
<script type="text/javascript">
    $(".courtier_select").select2({
        width: '100%',
        placeholder: "Selectionnez un courtier d'assurance",
        allowClear: true,
    });
   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--For: Add 'types d'infraction select-->
<script type="text/javascript">
    $(".typeinf_select").select2({
        width: '100%',
        placeholder: "Selectionnez un type d'infraction",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!-- Catégorie du Motif d'encaissement select-->
<script type="text/javascript">
    $(".categorie_motif_enc_select").select2({
        width: '100%',
        placeholder: "Selectionnez une catégorie de motif d'encaissement",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!-- Catégorie du Motif du decaissement select-->
<script type="text/javascript">
    $(".categorie_motif_dec_select").select2({
        width: '100%',
        placeholder: "Selectionnez une catégorie de motif de decaissement",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!-- Libelle du Motif d'encaissement select-->
<script type="text/javascript">
    $(".libelle_motif_enc_select").select2({
        width: '100%',
        placeholder: "Selectionnez un libelle de motif d'encaissement",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!-- Libelle du Motif du decaissement select-->
<script type="text/javascript">
    $(".libelle_motif_dec_select").select2({
        width: '100%',
        placeholder: "Selectionnez un libelle de motif de decaissement",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>


<!-- TVA type select-->
<script type="text/javascript">
    $(".type_tva_select").select2({
        width: '100%',
        placeholder: "Selectionnez la TVA",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>


<!-- User name select-->
<script type="text/javascript">
    $(".utilisateur_select").select2({
        width: '100%',
        placeholder: "Selectionnez un nom d'utilisateur",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!-- Type lieux select-->
<script type="text/javascript">
    $(".type_lieux_select").select2({
        width: '100%',
        placeholder: "Selectionnez un type",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Datepicker-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <!--Datepicker/FR/-->
    <script>
        $.fn.datepicker.dates['fr'] = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
         months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
            var date_input=$('input[name="date_création"]'); 
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            language: 'fr',
            };
            date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->
<!--Datepicker/FR/-->
<script>
        $.fn.datepicker.dates['fr'] = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
        months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
              var date_input=$('input[name="date_debut"]'); 
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
               language: 'fr',
              };
              date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->
<!--Datepicker/FR/-->
<script>
        $.fn.datepicker.dates['fr'] = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
        months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
              var date_input=$('input[name="date_fin"]'); 
              var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
              var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
               language: 'fr',
              };
              date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <!--Datepicker/FR/-->
    <script>
        $.fn.datepicker.dates['fr'] = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
          months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
            var date_input=$('input[name="date_naissance"]'); 
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            language: 'fr',
            };
            date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->
<!--Datepicker/FR/-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <!--Datepicker/FR/-->
    <script>
        $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
        months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
            var date_input=$('input[name="date_entree"]'); 
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            language: 'fr',
            };
            date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->
<!--Datepicker-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <!--Datepicker/FR/-->
    <script>
        $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi","Dimanche"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam","Dim","Dim"],
        daysMin: ["Dim", "Lu", "Ma", "Me", "Je", "Ve", "Sa","Dim"],
        months: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juiller", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
        monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Dec"]
        };
        
            $(document).ready(function(){
            var date_input=$('input[id="date"]'); 
            var container=
            $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            language: 'fr',
            };
            date_input.datepicker(options);
            })
</script>
<!--/Datepicker-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
            var date_input=$('input[id="heure"]'); 
            var container=
            $('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'HH:mm',
                //datepicker: false,
               
            };
            date_input.datetimepicker(options);
            })
    
</script>

<!--Timepicker-->
<script type="text/javascript">
    $(document).ready(function() {
      $('#date_heure').datetimepicker({
        format: 'yyyy-MM-dd hh:mm',
        allowInputToggle: true
                  
      });
     
    });

  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#date_heure_m').datetimepicker({
        format: 'yyyy-MM-dd hh:mm',
        allowInputToggle: true
                  
      });
     
    });

  </script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#date_heure_c').datetimepicker({
            format: 'yyyy-MM-dd hh:mm',
            allowInputToggle: true
                      
          });
         
        });
    
      </script>
  <script type="text/javascript">
    $('#prochain_appel').datetimepicker({
        format: 'yyyy-MM-dd hh:mm'

    });

  </script>
   <script type="text/javascript">
    $('#prochain_appel_m').datetimepicker({
        format: 'yyyy-MM-dd hh:mm'

    });

  </script>
   <script type="text/javascript">
    $('#prochain_appel_c').datetimepicker({
        format: 'yyyy-MM-dd hh:mm'

    });

  </script>


<!--/TimePicker-->

<!--Select Lieu de chargement1-->
<script>
    $('select[name="lieu_chargement1"]').select2({
        width: '100%',
        placeholder: "Selectionnez un lieu de chargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>
<!--Select Lieu de chargement2-->
<script>
        $('select[name="lieu_chargement2"]').select2({
            width: '100%',
            placeholder: "Selectionnez un lieu de chargement",
            allowClear: true,
            maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de chargement3-->
<script>
        $('select[name="lieu_chargement3"]').select2({
            width: '100%',
            placeholder: "Selectionnez un lieu de chargement",
            allowClear: true,
            maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de chargement4-->
<script>
        $('select[name="lieu_chargement4"]').select2({
            width: '100%',
            placeholder: "Selectionnez un lieu de chargement",
            allowClear: true,
            maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de chargement5-->
<script>
        $('select[name="lieu_chargement5"]').select2({
            width: '100%',
            placeholder: "Selectionnez un lieu de chargement",
            allowClear: true,
            maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--*************-->
<!--Select Lieu de dechargement1-->
<script>
        $('select[name="lieu_dechargement1"]').select2({
            width: '100%',
        placeholder: "Selectionnez un lieu de dechargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de dechargement2-->
<script>
        $('select[name="lieu_dechargement2"]').select2({
            width: '100%',
        placeholder: "Selectionnez un lieu de dechargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de dechargement3-->
<script>
        $('select[name="lieu_dechargement3"]').select2({
            width: '100%',
        placeholder: "Selectionnez un lieu de dechargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script> 
<!--Select Lieu de dechargement4-->
<script>
        $('select[name="lieu_dechargement4"]').select2({
            width: '100%',
        placeholder: "Selectionnez un lieu de dechargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Lieu de dechargement5-->
<script>
        $('select[name="lieu_dechargement5"]').select2({
            width: '100%',
        placeholder: "Selectionnez un lieu de dechargement",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select nom modele-->
<script>
        $('select[name="nom_modele"]').select2({
            width: '100%',
        placeholder: "Selectionnez un nom",
        allowClear: true,
        maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select trajet-->
<script>
    $('select[name="trajet"]').select2({
    width: '100%',
    placeholder: "Selectionnez un trajet",
    allowClear: true,
    maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>   
<!--Select Douane-->
<script>
        $('select[name="douane"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script> 

<!--Select categorie trajet-->
<script>
        $('select[name="categorie_trajet"]').select2({
        width: '100%',
        placeholder: "Selectionnez une catégorie",
        allowClear: true,
        maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script> 

<!--Select type marchandise-->
<script>
    $('select[name="type_marchandise"]').select2({
    width: '100%',
    placeholder: "Selectionnez un type de marchandise",
    allowClear: true,
    maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>

<!--Select tva-->
<script>
    $('select[name="tva"]').select2({
    width: '100%',
    placeholder: "Selectionnez la TVA",
    allowClear: true,
    maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>

<!--Select unité-->
<script>
    $('select[name="unite"]').select2({
    width: '100%',
    placeholder: "Selectionnez une unité",
    allowClear: true,
    maximumSelectionLength: 5,

    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>

<!--Select direction-->
<script>
        $('select[name="direction"]').select2({
        width: '100%',
        placeholder: "Selectionnez une diréction",
        allowClear: true,
        maximumSelectionLength: 5,
    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Select departement-->
<script>
        $('select[name="departement"]').select2({
        width: '100%',
        placeholder: "Selectionnez un département",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Select intervention-->
<script>
        $('select[name="intervention"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Select categorie famille intervention-->
<script>
        $('select[name="categories"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>

<!--Put select values in (libelle) input-->
<script  type="text/javascript">
 
    $(function() {
        const $selects = $('#lieu_chargement1, #lieu_chargement2,#lieu_chargement3,#lieu_chargement4,#lieu_chargement5,#lieu_dechargement1, #lieu_dechargement2,#lieu_dechargement3,#lieu_dechargement4,#lieu_dechargement5');
        
        const $select1 = $('#lieu_chargement1');
        const $select2 = $('#lieu_chargement2');
        const $select3 = $('#lieu_chargement3');
        const $select4 = $('#lieu_chargement4');
        const $select5 = $('#lieu_chargement5');

        const $selectd1 = $('#lieu_dechargement1');
        const $selectd2 = $('#lieu_dechargement2');
        const $selectd3 = $('#lieu_dechargement3');
        const $selectd4=  $('#lieu_dechargement4');
        const $selectd5 = $('#lieu_dechargement5');
    
        const $input = $('#libelle');

        $selects.on('change', () => {
            var $selectch1= $select1.find(':selected').text();
            var $selectch2= $select2.find(':selected').text();
            var $selectch3= $select3.find(':selected').text();
            var $selectch4= $select4.find(':selected').text();
            var $selectch5= $select5.find(':selected').text();        
        
            var $selectdech1= $selectd1.find(':selected').text();
            var $selectdech2= $selectd2.find(':selected').text();
            var $selectdech3= $selectd3.find(':selected').text();
            var $selectdech4= $selectd4.find(':selected').text();
            var $selectdech5= $selectd5.find(':selected').text();
            
            //Values 'chargement'
            if($selectch1)
                var $charg = $selectch1;
            if($selectch1 && $selectch2)  
                var $charg = $selectch1+'; '+$selectch2;
            if($selectch1 && $selectch2 && $selectch3)  
                var $charg = $selectch1+'; '+$selectch2+'; '+$selectch3;
            if($selectch1 && $selectch2 && $selectch3 && $selectch4)  
                var $charg = $selectch1+'; '+$selectch2+'; '+$selectch3+'; '+$selectch4; 
            if($selectch1 && $selectch2 && $selectch3 && $selectch4 && $selectch5)  
                var $charg = $selectch1+'; '+$selectch2+'; '+$selectch3+'; '+$selectch4+'; '+$selectch5;       

            //Values 'dechargement'    
            if($selectdech1)
                var $decharg = $selectdech1; 
            if($selectdech1 && $selectdech2)
                var $decharg = $selectdech1+'; '+$selectdech2;
            if($selectdech1 && $selectdech2 && $selectdech3)
                var $decharg = $selectdech1+'; '+$selectdech2+'; '+$selectdech3;
            if($selectdech1 && $selectdech2 && $selectdech3 && $selectdech4)
                var $decharg = $selectdech1+'; '+$selectdech2+'; '+$selectdech3+'; '+$selectdech4;
            if($selectdech1 && $selectdech2 && $selectdech3 && $selectdech4 && $selectdech5)
                var $decharg = $selectdech1+'; '+$selectdech2+'; '+$selectdech3+'; '+$selectdech4+'; '+$selectdech5;

            //    
            $('#libelle').val("");
            $('#libelle').val(`${$charg} ==> ${$decharg}`);   

            //Disable selected option from other select box
            $('option').removeAttr('disabled');
            $($selects).each(function(i, elt) {
                    $($selects).not(this).find('option[value="'+$(elt).val()+'"]').attr('disabled', true);
            }); 
        })
    });


</script>

<!--Select service station-->
<script>
        $('select[name="service_station"]').select2({
        width: '100%',
        placeholder: "Selectionnez un service de station",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select categorie vehicule-->
<script>
        $('select[name="categorie_vehicule"]').select2({
        width: '100%',
        placeholder: "Selectionnez une catégorie de véhicule",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select peage de depart-->
<script>
        $('select[name="peage_depart"]').select2({
        width: '100%',
        placeholder: "Selectionnez un péage de départ",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select peage d'arrivée'-->
<script>
        $('select[name="peage_arrivee"]').select2({
        width: '100%',
        placeholder: "Selectionnez un péage d'arrivée",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Type equipement-->
<script>
        $('select[name="type_equipement"]').select2({
        width: '100%',
        placeholder: "Selectionnez un type d'équipement",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select marque-->
<script>
    $('select[name="marque"]').select2({
    width: '100%',
    placeholder: "Selectionnez une marque",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>
<!--Select gamme-->
<script>
        $('select[name="gamme"]').select2({
        width: '100%',
        placeholder: "Selectionnez une gamme",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select boite_vitesse-->
<script>
        $('select[name="boite_vitesse"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
    </script>
<!--Select confort-->
<script>
    $('select[name="confort"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

</script>
<!--Select energie-->
<script>
        $('select[name="energie"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
    </script>

<!--Select echeance-->
<script>
        $('select[name="echeance"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>  
<!-- nationalite select-->
<script type="text/javascript">
    $('select[name="nationalite"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!-- banque select-->
<script type="text/javascript">
    $('select[name="banque"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!-- pays select-->
<script type="text/javascript">
    $('select[name="pays"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!-- ville select-->
<script type="text/javascript">
    $('select[name="ville"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select raison_sociale-->
<script>
        $('select[name="raison_sociale"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select sexe-->
<script>
        $('select[name="sexe"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select Code de client-->
<script>
        $('select[name="code"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>    
<!--Select type fournisseur-->
<script>
        $('select[name="type"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>  
<!--Select libelle fournisseur-->
<script>
        $('select[name="libelle"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script> 

<!--Select Role-->
<script type="text/javascript">
    $("select[name='role]").select2({
        width: '100%',
        placeholder: "Selectionnez un role",
        allowClear: true,
    });
   
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Select categorie vehicules-->
<script>
        $('select[name="categorie"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select parc-->
<script>
        $('select[name="parc"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select client-->
<script>
        $('select[name="client"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select type acquisition-->
<script>
        $('select[name="type_acquisition"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select modele-->
<script>
        $('select[name="modele"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    
</script>
<!--Select document-->
<script>
        $('select[name="document"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select prestataire-->
<script>
        $('select[name="prestataire"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select alerte-->
<script>
        $('select[name="alerte"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select vehicule multiple-->
<script>
        $('select[name="vehicule[]"]').select2({
        width: '100%',
        placeholder: "Selectionnez un/ou plusieurs choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select vehicule-->
<script>
        $('select[name="vehicule"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select fournisseur-->
<script>
        $('select[name="fournisseur"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Select numero contrat-->
<script>
        $('select[name="numContrat"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Select type reforme-->
<script>
    $('select[name="type_reforme"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Hidden DIVS ****Lieu de chargement****-->
<script type="text/javascript">
        function Addlieu2() {
    document.getElementById('lieu2').style.display = "block";
    document.getElementById('btnAddLieu2').style.display = "none";
    }
    function Addlieu3() {
    document.getElementById('lieu3').style.display = "block";
    document.getElementById('btnAddLieu3').style.display = "none";
    }
    function Addlieu4() {
    document.getElementById('lieu4').style.display = "block";
    document.getElementById('btnAddLieu4').style.display = "none";
    }
    function Addlieu5() {
    document.getElementById('lieu5').style.display = "block";
    document.getElementById('btnAddLieu5').style.display = "none";
    }
</script>

<!--Hidden DIVS ****Lieu de dechargement****-->
<script type="text/javascript">
    function Addlieude2() {
    document.getElementById('lieude2').style.display = "block";
    document.getElementById('btnAddLieude2').style.display = "none";
    }
    function Addlieude3() {
    document.getElementById('lieude3').style.display = "block";
    document.getElementById('btnAddLieude3').style.display = "none";
    }
    function Addlieude4() {
    document.getElementById('lieude4').style.display = "block";
    document.getElementById('btnAddLieude4').style.display = "none";
    }
    function Addlieude5() {
    document.getElementById('lieude5').style.display = "block";
    document.getElementById('btnAddLieude5').style.display = "none";
    }
</script>



<!--*********CALCUL TVA*********-->
<!--Calcul TVA / Ajouter tarifs gasoil-->
<script>
        function calcule_ht_ttc(event) // fonction de calcul
        {
            var prix_ht = $('input[name="montant_ht"]').val();
            var taux_tva  = $('select[name="montant_tva"]').val();
            var prix_ttc = $('input[name="montant_ttc"]').val();
            
            if(event.target.name=='prix_ttc')
            {
                var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);		
                $('input[name="montant_ht"]').val(new_prix_ht);
            }
            else
            {
                var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);		
                $('input[name="montant_ttc"]').val(new_prix_ttc);
            }	
        }
        $(function() 
        {
            $('.input').on('keyup change', calcule_ht_ttc);
        });

</script>
<!--Calcul TVA / Modifier tarifs gasoil-->
<script>
        function calcule_ht_ttc_edit(event) // fonction de calcul
        {
            var $prixht = $('input[name="ht"]').val();
            var $tva  = $('select[name="tva"]').val();
            var $prixttc = $('input[name="ttc"]').val();
            
            if(event.target.name=='prixttc')
            {
                var $new_prixht = ($prixttc/(1+$tva/100)).toFixed(2);		
                $('input[name="ht"]').val($new_prixht);
            }
            else
            {
                var $new_prixttc = ($prixht*(1+$tva/100)).toFixed(2);		
                $('input[name="ttc"]').val($new_prixttc);
            }	
        } 
        $(function() 
        {
           // $('input[name="ttc"]').on('change ', calcule_ht_ttc_edit);
            $('input').on('change', calcule_ht_ttc_edit);
        }); 
</script>
<!--****************************-->
<!--Afficher les activités si le fournisseur est de type: fournisseur de vehicules-->
<script type="text/javascript">
   function showDiv(elem){
   if(elem.value == 'Fournisseur de vehicules' )
      document.getElementById('hidden_div').style.display=" block";
   else
      document.getElementById('hidden_div').style.display=" none";       
    }
</script>


<!--Open in new tab **Appel/Rendez-vous** -->
<script type="text/javascript">
    $(document).ready(function() {
    $(".fc-event-container").click(function() {
        var test = $(this).find("a");

        test.attr("target", "_blank");
        window.open(test.attr("href"));

        return false;
    });
    });
</script>
<!---->
<script type="text/javascript">	
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function() {
        
        pageSetUp();
        
        /*
         * Autostart Carousel
         */
        $('.carousel.slide').carousel({
            interval : 3000,
            cycle : true
        });
            
     
    
    });

</script>

<!--****************************************************-->
<!--Counting number of months between 'date 1er prelevement' & 'date fin contrat'-->
<script type="text/javascript">
    function calcule_month() //fonction de calcul
    {
        var dt1 = $('input[name="date_premier_prelevement"]').val();
        var dt2 = $('input[name="date_fin_contrat"]').val();

        var date1= new Date(dt1);
        var date2= new Date(dt2);
        var year1=date1.getFullYear();
        var year2=date2.getFullYear();
        var month1=date1.getMonth();
        var month2=date2.getMonth();
        if(month1==0){ 
            month1++;
            month2++;
        }
        var numberOfMonths=(year2 - year1) * 12 + (month2 - month1) - 1;
        if(numberOfMonths >= 0){
            $('input[name="duree"]').val(numberOfMonths+1); 
        }
        else if(numberOfMonths < 0){
            $('input[name="duree"]').val('!Err!');
        }
        else{
            $('input[name="duree"]').val('0');    
        }        
    } 
    $(function() 
    {
        $('input').on('change', calcule_month);
    }); 
</script>

<!--Get List Equipments from TypeEquipment -->
<script type="text/javascript">                                                                                     
    $('select[name="type_equipement"]').on('change', function(){
     var type_equipementID = $(this).val();
     if(type_equipementID) {
         $.ajax({
             url: '/equipements/get/'+type_equipementID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="equipement"]').select2({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="equipement"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="equipement"]').select2().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    
</script>

 <!--Select equipement-->
<script>
        $('select[name="equipement"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

 <!--Select matricule-->
 <script>
        $('select[name="matricule"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
 <!--Select nom-->
 <script>
        $('select[name="nom"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
 <!--Select prenom-->
 <script>
        $('select[name="prenom"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Document Personnel if CDD hide date d'expiration-->
<script>
 $(function () {
     $('#date_expir').show();
     $('#document').change(function () {
         $('#date_expir').show();
         if (this.options[this.selectedIndex].value == 'CDD') {
             $('#date_expir').hide();
         }
     });
 });
</script>

 <!--Select tracteur-->
 <script>
    $('select[name="tracteur"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
 <!--Select semiremorque-->
 <script>
    $('select[name="semiremorque"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
 <!--Select autorite du proces verbal-->
 <script>
    $('select[name="autorite_proces_verbal"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select conducteur1-->
<script>
    $('select[name="conducteur1"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select conducteur2-->
<script>
    $('select[name="conducteur2"]').select2({
    width: '100%',
    placeholder: "Selectionnez un choix",
    allowClear: true,
    maximumSelectionLength: 5,    
    });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select sinistre cloturé?-->
<script>
        $('select[name="sinistre_cloture"]').select2({
        width: '100%',
        placeholder: "Selectionnez OUI ou NON ",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select year?-->
<script>
        $('select[name="annee"]').select2({
        width: '100%',
        placeholder: "Selectionnez l'année",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select type d'absence-->
<script>
        $('select[name="type_absence"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select type d'absence-->
<script>
        $('select[name="employe"]').select2({
        width: '100%',
        placeholder: "Selectionnez",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select demandeur-->
<script>
        $('select[name="demandeur"]').select2({
        width: '100%',
        placeholder: "Selectionnez un demandeur",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select gravite-->
<script>
        $('select[name="gravite"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select urgence-->
<script>
        $('select[name="urgence"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Select categorie-->
<script>
        $('select[name="categorie[]"]').select2({
        width: '100%',
        placeholder: "Selectionnez un/plusieurs choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Select familles des pieces-->
<script>
        $('select[name="famille"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select pieces-->
<script>
        $('select[name="piece"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<!--Select demande-->
<script>
        $('select[name="demande"]').select2({
        width: '100%',
        placeholder: "Selectionnez un choix",
        allowClear: true,
        maximumSelectionLength: 5,    
        });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<!--Annees -->
<script>
    $(function() {
    var start_year = new Date().getFullYear();
    for (var i = start_year; i > start_year - 8; i--) {
        $('select[name="annee"]').append('<option value="' + i + '">' + i + '</option>');
    }
    });
</script>

<!--Button-->
<script>
    $("#save_demande_intervention").click(function () {
        //alert("Ema");
        window.location.href = $(this).data('href');
    });
</script>
 
 <!--Table Pieces (diagnostic)-->
<script>
        $(function(){
            $('#addMore').on('click', function() {
                      var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                      data.find("input").val('');
                     // $('#tb tr:eq(1).remove').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-check');
                     });
             $(document).on('click', '.remove', function() {
                 var trIndex = $(this).closest("tr").index();
                    if(trIndex>0) {
                     $(this).closest("tr").remove();
                   } else {
                     alert("Vous ne pouvez pas supprimer la 1ère ligne!");
                   }
              });
        });      
</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[id="famille1"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[id="categori1"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[id="categori1"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[id="categori1"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[id="categori1"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[id="piece1"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[id="piece1"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[id="piece1"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[id="famille2"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[id="categori2"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[id="categori2"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[id="categori2"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[id="categori2"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[id="piece2"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[id="piece2"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[id="piece2"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille3"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori3"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori3"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori3"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori3"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece3"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece3"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece3"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille4"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori4"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori4"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori4"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori4"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece4"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece4"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece4"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille5"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori5"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori5"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori5"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori5"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece5"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece5"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece5"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille6"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori6"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori6"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori6"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori6"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece6"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece6"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece6"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille7"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori7"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori7"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori7"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori7"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece7"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece7"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece7"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>


<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille8"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori8"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori8"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori8"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori8"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece8"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece8"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece8"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille9"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori9"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori9"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori9"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori9"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece9"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece9"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece9"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>

<!--Get List categories piece from famille -->
<script type="text/javascript">    

    $('select[name="famille10"]').on('change', function(){
     var familleID = $(this).val();
     if(familleID) {
         $.ajax({
             url: '/categories/get/'+familleID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="categori10"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="categori10"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="categori10"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};    


    $('select[name="categori10"]').on('change', function(){
     var categoriID = $(this).val();
     if(categoriID) {
         $.ajax({
             url: '/pieces/get/'+categoriID,
             type:"GET",
             dataType:"json",
             beforeSend: function(){
                 $('#loader').css("visibility", "visible");
             },
             success:function(data) {
                 $('select[name="piece10"]').select({ width: '100%'}).empty();
                 $.each(data, function(key, value){
                     $('select[name="piece10"]').append('<option value="'+ key +'">' + value + '</option>');
                 });
             },
             complete: function(){
                 $('#loader').css("visibility", "hidden");
             }
         });
     } else {
         $('select[name="piece10"]').select().empty();
     }
     });   
     $.fn.modal.Constructor.prototype.enforceFocus = function() {}; 

</script>






<!--Hidden DIVS ****Lieu de chargement****-->
<script type="text/javascript">
function Addrow2() {
$('.row2').show();
document.getElementById('btnAddrow2').style.display = "none";
document.getElementById('btncheck2').style.display = "block";

}
function Addrow3() {
$('.row3').show();
document.getElementById('btnAddrow3').style.display = "none";
document.getElementById('btncheck3').style.display = "block";

}
function Addrow4() {
$('.row4').show();
document.getElementById('btnAddrow4').style.display = "none";
document.getElementById('btncheck4').style.display = "block";

}
function Addrow5() {
$('.row5').show();  
document.getElementById('btnAddrow5').style.display = "none";
document.getElementById('btncheck5').style.display = "block";

}
function Addrow6() {
$('.row6').show();   
document.getElementById('btnAddrow6').style.display = "none";
document.getElementById('btncheck6').style.display = "block";

}
function Addrow7() {
$('.row7').show();  
document.getElementById('btnAddrow7').style.display = "none";
document.getElementById('btncheck7').style.display = "block";

}
function Addrow8() {
$('.row8').show();  
document.getElementById('btnAddrow8').style.display = "none";
document.getElementById('btncheck8').style.display = "block";

}
function Addrow9() {
$('.row9').show();   
document.getElementById('btnAddrow9').style.display = "none";
document.getElementById('btncheck9').style.display = "block";

}
function Addrow10() {
$('.row10').show();  
document.getElementById('btnAddrow10').style.display = "none";
document.getElementById('btncheck10').style.display = "block";

}
</script>

