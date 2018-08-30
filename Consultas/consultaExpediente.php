<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Modificar Expediente</title>
  
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css'>

<link rel="stylesheet" href="../css/tablaExpediente.css">

  
</head>

<body>

  
  <h1>Modificar Expediente</h1>

  <div class="table-container">
    <div class="table-header">
      <h2>Customer Table</h2>
      <button class="add-another btn btn-success">Agregar Paciente</button>
    </div>
    <table class="customer-table table table-hover" style="width:200%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Dui</th>
          <th>Telefono</th>
          <th>Fecha de Nacimiento</th>
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
          <label for="txtName" class="control-label col-md-5">*Nombre:</label>
          <div class="col-md-8">
            <input type="text" id="txtName" name="name" placeholder="Enter Your Name Here" maxlength="50">
            <div class="error-msg"></div>
          </div>
        </div>
         <div class="form-group">
          <label for="txtName" class="control-label col-md-5">*Apellido:</label>
          <div class="col-md-8">
            <input type="text" id="txtName" name="name" placeholder="Enter Your Name Here" maxlength="50">
            <div class="error-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="rdoGender" class="control-label col-md-5">*Gender:</label>
          <div class="col-md-8">
            <label><input type="radio" class="rdo-gender" id="rdoGenderMale" name="gender" value="Male"><span>Male</span></label>
            <label class="radio-gender"><input type="radio" name="gender" id="rdoGenderFemale" class="rdo-gender" value="Female"><span>Female</span></label>
          </div>
        </div>
        <div class="form-group">
          <label for="txtCountry" class="control-label col-md-5">*Country:</label>
          <div class="col-md-8">
            <input type="text" id="txtCountry" name="country" placeholder="Country Name" maxlength="50">
            <div class="error-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="txtNumber" class="control-label col-md-5">*Phone Number:</label>
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

  <div class="message"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>
  
  

    <script  src="js/index.js"></script>




</body>

</html>



<?php
    
    include_once '../plantilla/pie.php';

?>
