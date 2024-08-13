<?php
mb_internal_encoding('UTF-8');
require 'dompdf/autoload.inc.php';
include("inc/config.php");

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);
$options->setIsHtml5ParserEnabled(true);

$dompdf = new Dompdf($options);

$dompdf->setPaper('A4', 'Portrait');

// Initialize an empty data variable
$data = "";
$date = date('l | F d, Y | h:i:s A');
$i=0;
$stmt = $pdo->prepare("SELECT * FROM tbl_product WHERE p_qty < reorder_level ORDER BY p_id");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) { $i++;
        $imageData = base64_encode(file_get_contents("../assets/uploads/".$row['p_featured_photo']));
        $type = 'jpeg,jpg';
        $logo = 'data:../assets/uploads/' . $type . ';base64,' . $imageData;
        $qty = $row['p_qty'];
        $crit = $row['reorder_level'];
        $critt = '<span style="color:red;font-weight:400;">'.$crit.'</span>';
         $active = ($qty > 0) ?
        ''.$qty.'':
        '<span style="color:red;font-weight:400;">Out of Stocks</span>';
 
        
        $dataCritical .= '<tr>
                    <td>' . $i . '</td>
                    <td><img src="'.$logo.'" alt="" style="width:40px;">'.'</td>
                    <td>' . $row['p_name'] . '</td>
                    <td>' . $active . '</td>
                    <td>' . $critt  . '</td>
                </tr>';
    }
}


// Load the HTML template
$html = file_get_contents("PrintCritical.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataCritical}}","{{date}}"],[$dataCritical,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
$dompdf->stream("Standly - Critical Stocks - $date.pdf", array("Attachment" => false));

// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
// $dompdf->stream("Standly - Critical Stocks - $date.pdf", ["Attachment" => 0]);
?>
