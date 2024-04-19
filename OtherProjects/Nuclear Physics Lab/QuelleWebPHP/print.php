<?php 
include_once 'includes/dbh.inc.php';


$date_geg = $_POST['date'];

$file_name = "Quelleliste_PDF_".$date_geg.".pdf";

$_SESSION['name'] = $file_name;


use Dompdf\Dompdf;
$dompdf = new Dompdf();
define("DOMPDF_UNICODE_ENABLED", true);
define("DOMPDF_PDF_BACKEND", "CPDF");

$dompdf-> set_option('isRemoteEnabled', TRUE);


//$dompdf->loadHtml('hello world');
$html = file_get_contents("Quelleliste_PDF_".$date_geg.".html");
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'vertical');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
$dompdf->stream($file_name, array("Attachment"=>0));




?>
