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
$data = "";

// Loan payment query
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
$date_stat = '<h3 style ="float:right;">WEEKLY SALES</h3>';
$statement = $pdo->prepare("SELECT *,

                            t1.date as datePOS,
                            SUM(t2.totalProfit) as TotalProfit, 
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.qty) as totQty, 
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE t1.date 
                            BETWEEN '".$start_date."' AND '".$end_date."' 
                            GROUP BY t2.invoice
                            ORDER BY t1.transaction_id DESC");
                            
}
elseif($status == 'all'){
$date_nowsss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$date_weeksss = (isset($_POST['end_datee']) ? $_POST['end_datee'] : date('Y-m-d h:i:s', strtotime($_POST['end_datee'])));
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_datee'])).' - '.date("F d, Y", strtotime($_POST['end_datee']));
$date_stat = '<h3 style ="float:right;">SALES</h3>';
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowsss);
$statement = $pdo->prepare("SELECT *,
                            t1.date as datePOS,
                            SUM(t2.totalProfit) as TotalProfit, 
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.qty) as totQty, 
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE t1.date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            GROUP BY t2.invoice
                            ORDER BY t1.transaction_id DESC");
                            
}elseif($status == 'monthly'){
$month_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('F'));
$year_sel = (isset($_POST['end_date']) ? $_POST['end_date'] : date('Y'));
$date_range = '<h3>'.date("F",mktime(0,0,0,$month_sel,10)).' '.$year_sel;
$date_stat = '<h3 style ="float:right;">MONTHLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.date as datePOS,
                            SUM(t2.totalProfit) as TotalProfit,  
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.qty) as totQty, 
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice 
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE MONTH(t1.date) = '".$month_sel."' 
                            AND YEAR(t1.date) = '".$year_sel."' 
                            GROUP by t2.invoice DESC
                            ORDER BY t1.transaction_id DESC");
}

elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y'));
$date_range = '<h3>YEAR '.$yearly_sel;
$date_stat = '<h3 style ="float:right;">YEARLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.date as datePOS, 
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.totalProfit) as TotalProfit, 
                            SUM(t2.qty) as totQty, 
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE YEAR(t1.date) = '".$yearly_sel."' 
                            GROUP by t2.invoice DESC
                            ORDER BY t1.transaction_id DESC");
}

elseif($status == 'daily'){
$dailyss = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_endss = (isset($_POST['end_date']) ? $_POST['end_date']." 23:59:00" : date('Y-m-d 23:59:00'));
$date_range = '<h3>'.date('F d, Y', strtotime($_POST['start_date']));
$date_stat = '<h3 style ="float:right;">DAILY SALES</h3>';
$statement = $pdo->prepare("SELECT *,
                            t1.date as datePOS, 
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.totalProfit) as TotalProfit,  
                            SUM(t2.qty) as totQty,
                            t2.qty,
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE t1.date BETWEEN '".$dailyss."' 
                            AND '".$daily_endss."' 
                            GROUP by t2.invoice DESC
                            ORDER BY t1.transaction_id DESC");
}
else{
$statement = $pdo->prepare("SELECT *, 
                            t1.date as datePOS, 
                            SUM(t2.amount) as TotalPOS, 
                            SUM(t2.totalProfit) as TotalProfit, 
                            t1.invoice_number,
                            t2.invoice,
                            SUM(t2.qty) as totQty, 
                            SUM(t2.amount) + t3.shippingfee as total,
                            
                            t1.invoice_number,
                            t2.invoice,
                            
                            t3.shippingfee,
                            t3.invoice_payment_id
                            
                            FROM tbl_sales_pos t1 
                            LEFT JOIN tbl_salesorder_pos t2 
                            ON t1.invoice_number = t2.invoice
                            JOIN tbl_salesoverall_info t3
                            ON t2.invoice = t3.invoice_payment_id
                            WHERE t1.date
                            GROUP by t1.invoice_number
                            ORDER BY t1.transaction_id DESC");
                            $date_stat = '<h3 style ="float:right;">SALES</h3>';
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalAmount = 0;
foreach ($result as $rowAmount) {
    $invoice = $rowAmount['invoice_number'];
    $totalAmount += $rowAmount['total'];
    $totalProfit += $rowAmount['TotalProfit'];    
    $status1 = 'Standly Hardware - Walk-in '.$_POST['status'].' Sales Reports';
}
if(isset($_GET['status'])){
$totalEarn = "<h3> TOTAL ".ucwords($_GET['status'])." SALES : ".number_format((float)$totalAmount,2)."</h3>";
}else{
$totalEarn = "<h5>₱ ".number_format((float)$totalAmount,2)."</h5>";
$totalProfit = "<h5>₱ ".number_format((float)$totalProfit,2)."</h5>";
}

$date = date('l | F d, Y | h:i:s A');
if ($statement->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
    $statement1 = $pdo->prepare("SELECT * FROM tbl_salesorder_pos WHERE invoice=?"); 
						$statement1->execute(array($row['invoice']));
						$result = $statement1->fetchAll(PDO::FETCH_ASSOC);
						

        $dataReportOrders .= '<tr>
                    <td><b>' . $i .'</b></td>
                    <td>' . date('l | F d, Y | h:i:s A', strtotime($row['datePOS'])) . '</td>
                    <td> <b>NAME:</b> ' . $row['name'] . '<br> <b>ADDRESS: </b>
                    ' . $row['cust_address'] . '<br><b>CONTACT: </b>'.$row['cust_contact'].'</td><td>';
                    
                   foreach ($result as $row1){
						$totQTY = $row1['qty'];
						$totprice = number_format((float)$row1['p_current_price'],2);
						$prodname = $row1 ['p_name'];
                   
        $dataReportOrders .= '<b>PRODUCT: </b><br>'.$prodname.'
                              <br><b>QUANTITY: </b> '.$totQTY.'
                              <br><b>PRICE: ₱ </b>'.$totprice.'<br><br>';
                   }
                    
        $dataReportOrders .= '</td><td> <b>OR ID:</b><span style="color:red;font-weight:400;"> ' . $row['invoice_number'] . '</span><br>
                    <b> PAYMENT METHOD: </b> <span style="color:red;font-weight:400;">' . $row['type'] . '</span> <br><b>CASHIER: </b><span style="color:blue;font-weight:400;">'.$row['cashier'].'</span></td>
                    <td>₱ ' . number_format((float)$row['total'],2) . '</td>
                    <td>₱ ' . number_format((float)$row['TotalProfit'],2) . '</td>
                </tr>';
    }
}
// Load the HTML template

$html = file_get_contents("PrintReportPOS.html");

// Replace the placeholder "{{data}}" with the actual data

$html = str_replace(["{{dataReportOrders}}","{{date_range}}","{{totalEarn}}","{{totalProfit}}","{{date_stat}}","{{status1}}","{{date}}"],[$dataReportOrders,$date_range,$totalEarn,$totalProfit,$date_stat,$status1,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml(utf8_decode($html));

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
ob_end_clean();
$dompdf->stream("$date_range - Point of Sales Reports.pdf", array("Attachment" => false));

// Clear any output buffers

// Output the generated PDF to the browser
// $dompdf->stream("$date_range - Point of Sales Reports.pdf", ["Attachment" => 1]);

}

?>