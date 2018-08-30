<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

?>

    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

<link rel="stylesheet" href="../html/css/style.css">
    
 <div class="page-wrapper">
            
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                    <div class="card-body wizard-content">
                      <ul class="nav nav-tabs" role="tablist">      
                    <center><h1><label> Consulta de Expediente: </label></h1></center>
                    </ul>
                           <table id="example" class="table table-striped table-bordered" cellspacing="2" width="100%">
    <thead>
                 <tr>
                   <th>Paciente</th>
                   <th>Tipo de Consulta</th>
                   <th>Fecha de Consulta</th>
                
                 </tr>
               </thead>
              
               <tbody>
                 <tr>
                   <td>Abigail</td>
                   <td>Control Prenatal</td>
                   <td>2018/06/09</td>
                
                 </tr>
                 <tr>
                  <td>Tatiana</td>
                   <td>Consulta</td>
                   <td>2018/06/09</td>
              
                 </tr>
                 <tr>
                  <td>Laura</td>
                   <td>Consulta</td>
                   <td>2018/06/09</td>
                
                 </tr>
                 <tr>
                  <td>Ericka</td>
                   <td>Control Prenatal</td>
                   <td>2018/06/09</td>
               
                 </tr>
                 <tr>
                   <td>Blanca</td>
                   <td>Consulta</td>
                   <td>2018/06/09</td>
                  
                 </tr>
                 <tr>
                   <td>Abigail</td>
                   <td>Control Prenatal</td>
                   <td>2018/06/09</td>
              
                 </tr>


               </tbody>
                           </table>

                    </div>
                 </div>
            </div>
 </div>


<?php
    
    include_once '../plantilla/pie.php';

?>
