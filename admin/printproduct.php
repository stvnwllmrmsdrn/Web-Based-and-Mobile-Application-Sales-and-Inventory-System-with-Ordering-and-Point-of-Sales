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
$options->set('isPhpEnabled', true);
$options->set('defaultFont','Helvetica');

$dompdf = new Dompdf($options);
$dompdf->set_option("isPhpEnabled", true);
$dompdf->setPaper('A4', 'Portrait');

// Initialize an empty data variable
$data = "";

$i =0;
$stmt = $pdo->prepare("SELECT
    
                        t1.p_id,
                        t1.p_name,
                        t1.p_old_price,
                        t1.p_current_price,
                        t1.p_qty,
                        t1.p_featured_photo,
                        t1.p_is_featured,
                        t1.p_is_active,
                        t1.ecat_id,
                        t1.reorder_level,
                        t1.supplier_id,
                        t1.p_walkin_price,

                        t2.ecat_id,
                        t2.ecat_name,

                        t3.mcat_id,
                        t3.mcat_name,

                        t4.tcat_id,
                        t4.tcat_name,

                        t5.supplier_id,
                        t5.supplier_name

                        FROM tbl_product t1
                        JOIN tbl_end_category t2
                        ON t1.ecat_id = t2.ecat_id
                        JOIN tbl_mid_category t3
                        ON t2.mcat_id = t3.mcat_id
                        JOIN tbl_top_category t4
                        ON t3.tcat_id = t4.tcat_id
                        JOIN tbl_supplier t5 
                        ON t5.supplier_id = t1.supplier_id
                        ORDER BY t1.p_id DESC
                        ");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$date = date('l | F d, Y | h:i:s A');
if ($stmt->rowCount() > 0) {
    foreach ($result as $row) { $i++;
    $qtyy = $row['p_qty'];
    $qty = ($row['p_qty'] > 0 ) ?
    ''.$qtyy.'' :
    '<span style="color:red;font-weight:400;">Out of Stock</span>';
        // Build a table row for each product
        $imageData = base64_encode(file_get_contents("../assets/uploads/".$row['p_featured_photo']));
        $type = 'jpeg,jpg';
        $logo = 'data:../assets/uploads/' . $type . ';base64,' . $imageData;
        $data .= '<tr>
                    <td>' . $i . '</td>
                    <td><img src="'.$logo.'" alt="" style="width:40px;">'.'</td>
                    <td>' . $row['p_name'] . '</td>
                    <td>₱ ' . number_format((float)$row['p_old_price'],2) . '</td>
                    <td>₱ ' . number_format((float)$row['p_current_price'],2). '</td>
                    <td>₱ ' . number_format((float)$row['p_walkin_price'],2) . '</td>
                    <td> ' . $qty .'</td>
                    <td>' . $row['tcat_name'].'<br>'. $row['mcat_name']. '<br>'. $row['ecat_name'] . '</td>
                    <td>' . $row['supplier_name'] . '</td>
                </tr>';
    }
}
									
// Load the HTML template
$html = file_get_contents("PrintPOS.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{data}}","{{date}}"], [$data, $date ],$html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);
// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
$dompdf->stream("Standly - Product Inventories - $date.pdf", array("Attachment" => false));


// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
$dompdf->stream("Product-Inventory-$date.pdf", ["Attachment" => 0]);
