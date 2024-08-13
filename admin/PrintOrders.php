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

$i =0;
$date = date('Y-m-d');
$stmt = $pdo->prepare("SELECT * FROM tbl_order t1 JOIN tbl_payment t2 ON t1.payment_id = t2.payment_id WHERE t1.product_id ORDER BY t1.id DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
        // Build a table row for each product
        $dataOrders .= '<tr>
                    <td>' . $i .'</td>
                    <td>' . date('F d, Y', strtotime($row['payment_date'])) . '</td>
                    
                    <td><b>Name:</b> ' . $row['customer_name'] . '<br><b>Email:</b> ' . $row['customer_email'] . '</td>
                    <td><b>Product:</b> ' . $row['product_name'] . '
                    <br><b>Quantity: </b>' . $row['quantity'] . '
                    <br><b>Price:</b><br>₱ ' . $row['unit_price'] . '</td>
                    <td><b>Payment ID:</b> ' . $row['payment_id'] . '<b>Payment Method</b>
                   ' . $row['payment_method'] . '</td>
                    <td>₱ ' . number_format((float)$row['paid_amount'],2) . '</td>
                    
                </tr>';
    }
}

// Load the HTML template
$html = file_get_contents("PrintOrders.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace("{{dataOrders}}", $dataOrders, $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();

// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
$dompdf->stream("Online-Orders-$date.pdf", ["Attachment" => 0]);
?>
