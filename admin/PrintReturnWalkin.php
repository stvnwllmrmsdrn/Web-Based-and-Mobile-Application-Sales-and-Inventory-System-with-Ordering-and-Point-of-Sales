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

$i=0;
if(isset($_POST['printBtn'])){
echo $_POST['start_date'];
echo $_POST['end_date'];
$status = $_POST['status'];

if($status == 'weekly'){
$date_nowss = date('Y-m-d h:i:s');
$date_weekss = (isset($_POST['start_date']) ? date("Y-m-d h:i:s", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d h:i:s", strtotime("+1 week")));
$start_date = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_date = $date_weekss;
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_date'])).' - '.date("F d, Y", strtotime($_POST['end_date']));
$date_stat = '<h3 style ="float:right;">WEEKLY SALES/RETURN</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE t1.return_date 
                            BETWEEN '".$start_date."' AND '".$end_date."' 
                            ORDER by t1.return_id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_datee'])).' - '.date("F d, Y", strtotime($_POST['end_datee']));

$date_stat = '<h3 style ="float:right;">SALES/RETURN</h3>';
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT * 
                             FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE t1.return_date 
                            BETWEEN '".$start_datee."' AND '".$end_datee."' 
                            ORDER by t1.return_id DESC");
                            
}
elseif($status == 'monthly'){
$month_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('F'));
$year_sel = (isset($_POST['end_date']) ? $_POST['end_date'] : date('Y'));
$date_range = '<h3>'.date("F",mktime(0,0,0,$month_sel,10)).' '.$year_sel;
$date_stat = '<h3 style ="float:right;">MONTHLY SALES/RETURN</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE MONTH(t1.return_date) = '".$month_sel."' 
                            AND YEAR(t1.return_date) = '".$year_sel."' 
                            ORDER by t1.return_id DESC");
                            
}
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y'));
$date_range = '<h3>YEAR '.$yearly_sel;
$date_stat = '<h3 style ="float:right;">YEARLY SALES/RETURN</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE YEAR(t1.return_date) = '".$yearly_sel."' 
                            ORDER by t1.return_id DESC");
                            
}
elseif($status == 'daily'){
$daily = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['end_date']) ? $_POST['end_date']." 23:59:00" : date('Y-m-d 23:59:00'));
$date_range = '<h3>'.date('F d, Y', strtotime($_POST['start_date']));
$date_stat = '<h3 style ="float:right;">DAILY SALES/RETURN</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE t1.return_date
                            BETWEEN '".$daily."' AND '".$daily_end."' 
                            ORDER by t1.return_id DESC");
                            
}
else
{
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_return_pos t1 
                            JOIN tbl_sales_pos t2 
                            ON t1.invoice_number = t2.invoice_number 
                            JOIN tbl_reason t3 
                            ON t1.reason_id = t3.id 
                            WHERE t1.return_date 
                            ORDER BY t1.return_id DESC");
                            $date_stat = '<h3 style ="float:right;">SALES/RETURN</h3>';
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
}
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['return_totAmount'];
    $status1 = 'Standly Hardware -'.$_POST['status'].' Walk-in Return Reports';
    $date = date('l | F d, Y | h:i:s A');
}
$totalEarn = "<h5>₱ ".number_format((float)$totalAmount,2)."</h5>";
if ($statement->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
    $return = '<span style="color:red;font-weight:400;">Returned</span>';
        // Build a table row for each product
        $dataReturnPOS .= '<tr>
                    <td>' . $i .'</td>
            
                    <td><b>OR ID: </b><span style="color:red;font-weight:400;">'  . $row['invoice_number'] . '</span><br>' . date('l | F d, Y | h:i:s A', strtotime($row['return_date'])) . '</td>
                    <td><b>NAME: </b> <br>' . $row['name'] . '
                    <br><b>ADDRESS: </b><br> '  . $row['cust_address'] . '
                    <br><b>CONTACT: </b><br> '  . $row['cust_contact'] . '</td>
                    <td><b>PRODUCT: </b>' . $row['return_product_name'] . '
                    <br><b>QUANTITY: </b>' . $row['return_quantity'] . '
                    <br><b>PRICE:</b> ₱ ' . number_format((float)$row['return_price'],2) . '</td>
                    <td>₱ ' . number_format((float)$row['return_totAmount'],2) . '</td>
                    <td>' . $row['reason'] . '</td>
                    <td>' . $row['description_return'] . '</td>
                    <td> '.$return.' </td>
                    
                   
                </tr>';
    }
}

// Load the HTML template
$html = file_get_contents("PrintReturnWalkin.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataReturnPOS}}","{{date_range}}","{{totalEarn}}","{{date_stat}}","{{status1}}","{{date}}"], [$dataReturnPOS, $date_range, $totalEarn, $date_stat, $status1,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
ob_end_clean();
$dompdf->stream("Walk-in Return Product - $date.pdf", array("Attachment" => false));

// Clear any output buffers
// ob_end_clean();

// // Output the generated PDF to the browser
// $dompdf->stream("Walk-in Return Product - $date.pdf", ["Attachment" => 0]);
?>
