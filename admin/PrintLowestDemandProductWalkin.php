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
$dompdf->getOptions()->setChroot($public);

// Initialize an empty data variable
$data = "";
$date = date('l | F d, Y | h:i:s A');
$i =0;
$stmt = $pdo->prepare("SELECT sum(t1.qty) as total, 
                                t1.p_name, 
                                t1.qty, 
                                t1.product,

                                t2.p_id,
                                t2.p_featured_photo,
                                t2.p_walkin_price


                                FROM tbl_salesorder_pos t1 
                                JOIN tbl_product t2
                                ON t1.product = t2.p_id
                                WHERE t1.qty 
                                GROUP BY t1.product 
                                ORDER BY total 
                                ASC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
        $imageData = base64_encode(file_get_contents("../assets/uploads/".$row['p_featured_photo']));
        $type = 'jpeg,jpg';
        $logo = 'data:../assets/uploads/' . $type . ';base64,' . $imageData;
        // Build a table row for each product
        $dataLowDemandWalkin .= '<tr>
                    <td>' . $i .'</td>		
                    <td><img src="'.$logo.'" alt="" style="width:40px;">'.'</td>
                    <td>' . $row['p_name'] . '</td>
                    <td>₱ ' . number_format((float)$row['p_walkin_price'],2) . '</td>
                    <td>' . $row['total'] . '</td>
                </tr>';
    }
}

// Load the HTML template
$html = file_get_contents("PrintLowestDemandProductWalkin.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataLowDemandWalkin}}","{{date}}"], [$dataLowDemandWalkin,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
$dompdf->stream("Standly - Lowest Demand Product Walkin -$date.pdf", array("Attachment" => false));
// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
// $dompdf->stream("Standly - Lowest Demand Product Walkin -$date.pdf", ["Attachment" => 0]);
?>
