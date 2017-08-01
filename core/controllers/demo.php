<?php

$cabecera = "<span><b>Mi primer documento PDF dinámico con mPDF</b></span>";
 
$cuerpo = "<html>
<body>
<br/>
<h1>¡Hola mundo!</h1>
<br/>
<div>
<p>A continuación mostramos algunos <u>datos</u></p>
<table style='width:500px;text-align:center;'>
<thead>
<tr>
<th>A</th>
<th>B</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>2</td>                      
</tr>
<tr>
<td>3</td>
<td>4</td>                      
</tr>
</tbody>
</table>
</div>
<div>
<p>Aquí podemos introducir datos dinámicos desde PHP</p>
</div>
</body>
</html>";
 
$pie = "<span>
<a href=\"http://www.imaginanet.com\">Diseño y Programación Web: Imaginanet</a>
 - <i>Creado ".date("d/m/Y")."</i>
</span>";
 
require_once  dirname(__DIR__) . '../.././\vendor\autoload.php';

$mpdf=new mPDF();
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetHTMLFooter($pie);
$mpdf->WriteHTML($cuerpo);
$mpdf->Output('cambio.pdf', 'D');
?>