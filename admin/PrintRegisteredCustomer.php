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
$i =0;
$stmt = $pdo->prepare("SELECT * FROM tbl_customer ORDER BY cust_status = '0'");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) {
    foreach ($result as $row) { $i++;
 $active = ($row['cust_status'] == 1) ?
 '<span style="color:green;font-weight:400;">Active</span>' :
 '<span style="color:red;font-weight:400;">Inactive</span>';
 
        // Build a table row for each product
        $dataCustomers .= '<tr>
                    <td>' . $i . '</td>
                    <td>' . $row['cust_name'] . '</td>
                    <td>' . $row['cust_email'] . '</td>
                    <td>' . $row['cust_phone'] . '</td>
                    <td>' . $row['cust_address'] . '</td>
                    // <td>'. $active 
                    // '<p>Active</p>' :  
                    // ($row['cust_status'] == 0) ?
                    // '<p>Inactive</p>' : ''
                    .'</td>
                </tr>';
    }
}

// Load the HTML template
$html = file_get_contents("PrintRegisteredCustomer.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataCustomers}}","{{date}}"], [$dataCustomers,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
$dompdf->stream("Standly - Registered Customer Online - $date.pdf", array("Attachment" => false));

// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
// $dompdf->stream("Standly - Registered Customer Online - $date.pdf", ["Attachment" => 0]);
?>
