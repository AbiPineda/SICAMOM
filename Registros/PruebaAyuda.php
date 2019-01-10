<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <?php
$mi_pdf = '../pdf/ManualRegistroPaciente.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="'.$mi_pdf.'"');
Output($mi_pdf);
?>
</body>
</html>

