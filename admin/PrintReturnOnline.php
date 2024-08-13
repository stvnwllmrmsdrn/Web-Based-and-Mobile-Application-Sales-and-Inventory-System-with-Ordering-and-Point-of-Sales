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

$dompdf->setPaper('A4', 'Potrait');

// Initialize an empty data variable

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
$date_stat = '<h3 style ="float:right;">WEEKLY SALES/REFUND</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id
                            WHERE t1.refund_status = 'Completed' AND t1.refund_date
                            BETWEEN '".$start_date."' AND '".$end_date."' 
                            ORDER by t1.id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_date'])).' - '.date("F d, Y", strtotime($_POST['end_date']));

$date_stat = '<h3 style ="float:right;">SALES/RETURN</h3>';
$date_weeksss = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-d h:i:s', strtotime($_POST['start_date'])));
$start_datee = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_date']) ? $_POST['end_date']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id 
                            WHERE t1.refund_status = 'Completed' AND t1.refund_date
                            BETWEEN '".$start_datee."' AND '".$end_datee."' 
                            ORDER by t1.id DESC");
                            
}
elseif($status == 'monthly'){
$month_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('F'));
$year_sel = (isset($_POST['end_date']) ? $_POST['end_date'] : date('Y'));
$date_range = '<h3>'.date("F",mktime(0,0,0,$month_sel,10)).' '.$year_sel;
$date_stat = '<h3 style ="float:right;">MONTHLY SALES/REFUND</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id
                            WHERE MONTH(t1.refund_date) = '".$month_sel."' 
                            AND YEAR(t1.refund_date) = '".$year_sel."' AND t1.refund_status = 'Completed'
                            ORDER by t1.id DESC");
                            
}
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y'));
$date_range = '<h3>YEAR '.$yearly_sel;
$date_stat = '<h3 style ="float:right;">YEARLY SALES/REFUND</h3>';
$statement = $pdo->prepare("SELECT * 
                            FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id 
                            WHERE YEAR(t1.refund_date) = '".$yearly_sel."' AND t1.refund_status = 'Completed' 
                            ORDER by t1.id DESC");
                            
}
elseif($status == 'daily'){
$daily = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['end_date']) ? $_POST['end_date']." 23:59:00" : date('Y-m-d 23:59:00'));
$date_range = '<h3>'.date('F d, Y', strtotime($_POST['start_date']));
$date_stat = '<h3 style ="float:right;">DAILY SALES/REFUND</h3>';
$statement = $pdo->prepare("SELECT *, t1.refund_amount 
                            FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id
                            WHERE t1.refund_status = 'Completed' AND t1.refund_date
                            BETWEEN '".$daily."' AND '".$daily_end."' 
                            ORDER by t1.id DESC");
                            

}
else
{
$statement = $pdo->prepare("SELECT * FROM tbl_refund_order t1
                            JOIN tbl_customer t2
                            ON t1.cust_id = t2.cust_id
                            JOIN tbl_reason t3
                            ON t1.reason_id = t3.id
                            WHERE t1.refund_status = 'Completed'
                            ORDER by t1.id DESC");
                            $date_stat = '<h3 style ="float:right;">SALES/REFUND</h3>';
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// die();
}
foreach ($result as $rowAmount) {
   if($rowAmount['refund_status'] == 'Completed'){
    $totalAmount += $rowAmount['refund_amount'];
    }
    else
    {
    //   $totalAmount += $rowAmount['refund_amount'];  
    }
}
$status1 = 'Standly Hardware -'.$_POST['status'].' Refund Reports';
$totalEarn = "<h5>₱ ".number_format((float)$totalAmount,2)."</h5>";
$date = date('l | F d, Y | h:i:s A');

if ($statement->rowCount() > 0) { 
    foreach ($result as $row) { $i++;

    $return = $row['refund_status'] == 'Pending' ?
                '<span style="color:red;font-weight:400;">Pending</span>':
                '<span style="color:blue;font-weight:400;">Returned</span>';
        // Build a table row for each product
        $dataReturnOnline .= '<tr>
                    <td><b>' . $i .'<b></td>
                    <td><b>PAYMENT ID: </b><span style="color:red;font-weight:400;">' . $row['refund_id'] . '</span><br>' . date('l | F d, Y | h:i:s A', strtotime($row['refund_date'])) . '</td>
                    <td><b>NAME: </b> ' . $row['cust_name'] . '
                    <br><b>EMAIL: </b><br> '  . $row['cust_email'] . '
                    <br><b>CONTACT: </b> '  . $row['cust_phone'] . '
                    <br><b>GCASH NUMBER: </b> '  . $row['gcash_no'] . '</td>
                    <td><b>PRODUCT: </b><br>' . $row['product_name'] . '
                    <br><b>QUANTITY: </b>' . $row['quantity'] . '
                    <br><b>PRICE:</b> ₱ ' . number_format((float)$row['unit_price'],2) . '</td>
                    <td>₱ ' . number_format((float)$row['refund_amount'],2) . '</td>
                    <td>' . $row['reason'] . '</td>
                    <td> '.$return.' </td>
                    
                   
                </tr>';
    }
}

// Load the HTML template
$html = file_get_contents("PrintReturnOnline.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataReturnOnline}}","{{date_range}}","{{totalEarn}}","{{date_stat}}","{{status1}}","{{date}}"], [$dataReturnOnline, $date_range, $totalEarn, $date_stat, $status1,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
ob_end_clean();
$dompdf->stream("Online Return Products.pdf", array("Attachment" => 0));

// Clear any output buffers


// Output the generated PDF to the browser
// $dompdf->stream("Online Return Products - $date.pdf", ["Attachment" => 0]);
?>
