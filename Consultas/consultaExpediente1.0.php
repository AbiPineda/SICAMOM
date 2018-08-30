<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnEnviar'])) {
    include_once '../Conexion/conexion.php';

    $nombre  = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido']; 
    
     $dui = $_REQUEST['dui'];
    
    $telefono = $_REQUEST['telefono'];
   
    $fecha = $_REQUEST['fecha'];


    $tipo = $_REQUEST['tipo'];
  
      $tipo = $_REQUEST['tipo'];

   
    
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_paciente(pac_cnombre,pac_capellidos,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta) VALUES('$nombre','$apellido','$dui','$telefono','$_fecha','$tipo')"; 

   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();

    
    
}

else {

     ?>
     <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                      
                    <div class="card-body wizard-content">
                        
                        <form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">
                          <div class="table-container">
                                      <div class="table-header">
                                        <h2>Customer Table</h2>
                                        <button class="add-another btn btn-success">Add another customer</button>
                                      </div>
                                      <table class="customer-table table table-hover" style="width:100%">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Phone Number</th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                      </table>
                                    </div>

                                    <div class="form-container">
                                  <form name="customer-details" class="customer-details form-horizontal">
                                    <fieldset>
                                      <legend>Customer details</legend>
                                      <div class="form-group">
                                        <label for="txtName" class="control-label col-md-4">*Name:</label>
                                        <div class="col-md-8">
                                          <input type="text" id="txtName" name="name" placeholder="Enter Your Name Here" maxlength="50">
                                          <div class="error-msg"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="rdoGender" class="control-label col-md-4">*Gender:</label>
                                        <div class="col-md-8">
                                          <label><input type="radio" class="rdo-gender" id="rdoGenderMale" name="gender" value="Male"><span>Male</span></label>
                                          <label class="radio-gender"><input type="radio" name="gender" id="rdoGenderFemale" class="rdo-gender" value="Female"><span>Female</span></label>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtCountry" class="control-label col-md-4">*Country:</label>
                                        <div class="col-md-8">
                                          <input type="text" id="txtCountry" name="country" placeholder="Country Name" maxlength="50">
                                          <div class="error-msg"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtNumber" class="control-label col-md-4">*Phone Number:</label>
                                        <div class="col-md-8">
                                          <input type="text" id="txtNumber" name="phone" placeholder="Phone Number Here" maxlength="20">
                                          <div class="error-msg"></div>
                                        </div>
                                      </div>
                                      <button class="reset-button btn btn-danger">Reset</button>
                                      <button class="add-button btn btn-success">Add</button>
                                      <button class="update-button btn btn-primary">Update</button>
                                    </fieldset>
                                  </form>
                                </div>


                     </div>
                </div>
         </div>

             
 <?php
    
    include_once '../plantilla/pie.php';
}
?>