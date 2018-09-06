<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../plantilla/pie.php';


?>

<link rel="stylesheet" href="../js/toastr.min.css">
    
    



<script   src="../js/toastr.min.js"></script>
<script    src="../js/jquery.min.js"></script>

<?php
echo '   ';
?>


<script>
    
    mensaje();
function mensaje(){
    
      toastr.success("Guardado con Exito");
    
    
}
</script>



<?php

?>
