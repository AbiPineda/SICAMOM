    <?php

    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
        $modi = $_GET['ir'];
        ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="../dist/css/styleconsulta.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-steps/steps.css">

    <div class="page-wrapper">

        <div class="container-fluid">
           <div>        
               <div >
                    <h5 class="card-title" >Consulta General</h3>
                    
                      <form action="#" method="post" id="example_form">
                    <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
   <h5>Datos Generales del Paciente</h5> 
   
<div>


        <h3>Signos Vitales</h3>
                                <section>
                         <!--   <h5 class="card-title" style="color: white">Registro de Signos Vitales</h5>-->
                                                            
                                            <label style="color: white">Peso:  <small class="text-muted"></small></label>
                                            <input type="text" name="peso"  class="form-control" id="peso" placeholder="Kg" autocomplete="off" maxlength="6" class="required form-control"> 

                                            <label style="color: white">Talla:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6" class="form-control">  
                                            
                                            <label style="color: white">Temp:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="°C" autocomplete="off" maxlength="4" class="required form-control">  
                                            
                                     </section>
                                <h3>Enfermedades</h3>
                                <section>
                                        <label style="color: white">Síntomas y Diagnóstico: <small class="text-muted"></small></label>
                                        <textarea class="form-control" rows="3" id="comment" name="diagnostico" class="form-control"></textarea> 
                                </section>
                                <h3>Insumo</h3>
                                <section>
                                                <label style="color: white">Guantes:  <small class="text-muted"></small></label>
                                                <input type="number" min="1" class="form-control" id="lname" name="minimo" placeholder="1" value="" size="10">
                                                                                
                                            <label style="color: white">Paletas:<small class="text-muted"></small></label>                           
                                            <input type="number" min="1"  class="form-control" id="lname" name="minimo" placeholder="1"  value="">
                                      
                                            <label style="color: white">Torundas:<small class="text-muted"></small></label>
                                               <input type="number" min="1"  class="form-control" id="lname" name="minimo" placeholder="1" value="">
                                       
                                            <label style="color: white">Papel:<small class="text-muted"></small></label>
                                               <input type="number" min="1"  class="form-control" id="lname" name="minimo" placeholder="1"  value="">
                                        
                                            <label style="color: white">Isopo:<small class="text-muted"></small></label>
                                              <input type="number" min="0"  class="form-control" id="lname" name="minimo" placeholder="0"  value="">
                                                                               
                                            <label style="color: white">Jeringas:<small class="text-muted"></small></label>
                                              <input type="number" min="0" class="form-control" id="lname" name="minimo" placeholder="0"  value="">
                                                                              
                                                                         </section>
                                                                              <h3>Finish</h3>
                                <section>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </section>

    
</div>   
<div class="actions clearfix"><ul role="menu" aria-label="Pagination"><li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font></a></li><li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente</font></font></a></li><li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Finish</a></li></ul></div>
<?php
                                    //}
                                    ?>
                </form>
    </div>
    </div>
    </div>
    </div>

     <?php
    date_default_timezone_set('America/El_Salvador');
    $d1 = date("d");
    $m1 = date("m");
    $y1 = date("Y");

        if (isset($_REQUEST['btnEnviar'])) {
        include_once '../Conexion/conexion.php';
         $diagnostico = $_REQUEST['diagnostico'];
     
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_inventario,con_fecha_atiende,con_diagnostico) VALUES('$modi',1,'$y1-$m1-$d1','$diagnostico')");
           echo '<script>swal({
                        title: "Registro",
                        text: "Guardado!",
                        type: "success",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                    },
                    function () {
                        location.href="../Expediente_Admin/verCola.php";
                        
                    });</script>';
            

              }


        include_once '../plantilla/pie.php';

    ?>

            <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="../../assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
                <script>
        // Basic Example with form
    var form = $("#example_form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#peso"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });


    </script>