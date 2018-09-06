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
    
     toastr.error("Error al registrar datos", "Title", {
            "timeOut": "6000",
            "extendedTImeout": "200",
            "onclick" : window.location.href = "http://sitioweb.com"
        });
    
    
}
</script>



<?php

?>
