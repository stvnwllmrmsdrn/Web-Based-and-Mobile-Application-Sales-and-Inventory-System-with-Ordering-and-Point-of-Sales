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
$start_dates = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : $date_nowss);
$end_dates = $date_weekss;
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_date'])).' - '.date("F d, Y", strtotime($_POST['end_date']));
$date_stat = '<h3 style ="float:right;">WEEKLY SALES</h3>';
$statement = $pdo->prepare("SELECT *,
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.totalProfit) as totProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            t1.product_id,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos as total,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date 
                            BETWEEN '".$start_dates."' 
                            AND '".$end_dates."'
                            GROUP BY t2.invoice_payment_id
                            ORDER by t2.id DESC");
}
elseif($status == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_datee'])).' - '.date("F d, Y", strtotime($_POST['end_datee']));
$date_stat = '<h3 style ="float:right;">SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.totalProfit) as totProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            t1.product_id,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos as total,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."'
                            GROUP BY t2.invoice_payment_id
                            ORDER by t2.id DESC");

} // MONTHLY FILTER QUERY
elseif($status == 'monthly'){
$month_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('m'));
$year_sel = (isset($_POST['end_date']) ? $_POST['end_date'] : date('Y'));
$date_range = '<h3>'.date("F",mktime(0,0,0,$month_sel,10)).' '.$year_sel;
$date_stat = '<h3 style ="float:right;">MONTHLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.totalProfit) as totProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            t1.product_id,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos as total,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE MONTH(t2.date) = '".$month_sel."' 
                            AND YEAR(t2.date) = '".$year_sel."' 
                            GROUP by t2.invoice_payment_id
                            ORDER by t2.id DESC");
                            
} // YEARLY FILTER QUERY
elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y'));
$date_range = '<h3>YEAR '.$yearly_sel;
$date_stat = '<h3 style ="float:right;">YEARLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.totalProfit) as totProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            t1.product_id,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos as total,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE YEAR(t2.date) = '".$yearly_sel."'
                            GROUP BY t2.invoice_payment_id
                            ORDER BY t2.id DESC");
                            

} // DAILY FILTER QUERY
elseif($status == 'daily'){
$daily = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['end_date']) ? $_POST['end_date']." 23:59:00" : date('Y-m-d 23:59:00'));
$date_range = '<h3>'.date('F d, Y', strtotime($_POST['start_date']));
$date_stat = '<h3 style ="float:right;">DAILY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t1.id,
                            t1.invoice_payment_id,
                            t1.product_price as price,
                            t1.quantity as pqty,
                            t1.product_name,
                            t1.date,
                            t1.profit,
                            SUM(t1.totalProfit) as totProfit,
                            SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                            t1.product_id,
                            
                            t2.id,
                            t2.invoice_payment_id,
                            t2.cust_name,
                            t2.cust_address,
                            t2.cust_contact,
                            t2.cust_email,
                            t2.date,
                            t2.payment_method,
                            t2.discount,
                            t2.shippingfee,
                            t2.cashier,
                            t2.total_amount,
                            t1.profit,
                            t2.due,
                            t2.cashier_id_pos,
                            t2.finalTotalAmount_pos as total,
                            
                            t3.p_id,
                            t3.p_name,
                            t3.p_old_price
                            
                            FROM tbl_salesoverall t1 
                            JOIN tbl_salesoverall_info t2 
                            ON t1.invoice_payment_id = t2.invoice_payment_id
                            JOIN tbl_product t3
                            ON t1.product_id = t3.p_id
                            WHERE t2.date  
                            BETWEEN '".$daily."' 
                            AND '".$daily_end."'
                            GROUP BY t1.invoice_payment_id
                            ORDER BY t2.id DESC");

}
else {
    $statement = $pdo->prepare("SELECT *, 
                                t1.id,
                                t1.invoice_payment_id,
                                t1.product_price as price,
                                t1.quantity as pqty,
                                t1.product_name,
                                t1.date,
                                t1.profit,
                                SUM(t1.totalProfit) as totProfit,
                                SUM(t1.total_amount) + t2.shippingfee as totalAmount,
                                t1.product_id,
                                
                                t2.id,
                                t2.invoice_payment_id,
                                t2.cust_name,
                                t2.cust_address,
                                t2.cust_contact,
                                t2.cust_email,
                                t2.date,
                                t2.payment_method,
                                t2.discount,
                                t2.shippingfee,
                                t2.cashier,
                                t2.total_amount,
                                t2.profit,
                                t2.due,
                                t2.cashier_id_pos,
                                t2.finalTotalAmount_pos as total,
                                
                                t3.p_id,
                                t3.p_name,
                                t3.p_old_price
                                
                                FROM tbl_salesoverall t1 
                                JOIN tbl_salesoverall_info t2 
                                ON t1.invoice_payment_id = t2.invoice_payment_id 
                                JOIN tbl_product t3
                                ON t1.product_id = t3.p_id
                                WHERE t2.date
                                GROUP BY t1.invoice_payment_id
                                ORDER by t2.id DESC");
                                $date_stat = '<h3 style ="float:right;">SALES</h3>';
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$totalAmount = 0;
foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['totalAmount'];
    $totalProfit += $rowAmount['totProfit'];    
    $status1 = 'Standly Hardware - Online/Point of Sales '.$_POST['status'].' Reports';
}
if(isset($_GET['status'])){
$totalEarn = "<h3> TOTAL ".ucwords($_GET['status'])." SALES : ".number_format((float)$totalAmount,2)."</h3>";
}else{
$totalEarn = "<h5>₱ ".number_format((float)$totalAmount,2)."</h5>";
$totalProfit = "<h5>₱ ".number_format((float)$totalProfit,2)."</h5>";
}
// ($qty > 0) 
//         ''.$qty.'':
//         '<span style="color:red;font-weight:400;">Out of Stocks</span>'
$date1 = date('l | F d, Y | h:i:s A');
if ($statement->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
    $count++;
    $id = $row['cashier_id_pos'];
    $cust_name = $row['cust_name'];
    $cust_email = $row['cust_email'];
    $cust_address = $row['cust_address'];
    $cust_contact = $row['cust_contact'];
    $paymet = $row['payment_method'];
    $cashier = $row['cashier'];
    $date = date('l | F d, Y | h:i:s A',strtotime($row['date']));
    $InpayID = $row['invoice_payment_id'];
    $shipfee = $row['shippingfee'];
    
// 	$result1 = $pdo->prepare("SELECT * FROM tbl_saleroverall"); 
// 						$result1->execute(array($InpayID));
// 						$result2 = $result1->fetchAll(PDO::FETCH_ASSOC);
// 						foreach ($result2 as $row1) {
    
    $prodname = $row['product_name'];
    $totQTY = $row['quantity'];
    $totprice = number_format((float)$row['product_price'],2);
//     $count = $count + 1;
    
    $statusOR = $row['cashier_id_pos'] == 0 ?
                '<span style="color:green;font-weight:400;">ONLINE</span>':
                '<span style="color:blue;font-weight:400;">WALK-IN</span>';
    $cust_det = $row['cashier_id_pos'] == 0 ?
                '<b>NAME: </b> '.$cust_name.'<br><b>EMAIL:</b> '.$cust_email.'':
                '<b>NAME: </b>'.$cust_name.'<br><b>CONTACT:</b> '.$cust_contact.'<br><b>ADDRESS:</b> '.$cust_address.'';
    $pay_det = $row['cashier_id_pos'] == 0 ?
                '<b>ORDER ID: </b><br><span style="color:red;font-weight:400;"> '.$InpayID.'</span><br><b>PAYMENT METHOD:</b><br><span style="color:red;font-weight:400;">'.$paymet.'</span><br><b>Shipping Fee:</b> ₱ '.$shipfee.'':
                    
                '<b>OR ID:</b><br><span style="color:red;font-weight:400;">'.$InpayID.'</span><br><b>PAYMENT METHOD: </b><br> <span style="color:red;font-weight:400;">'.$paymet.'</span><br><b>CASHIER: <br> </b><span style="color:blue;font-weight:400;"> '.$cashier.'</span>';
    $statement1 = $pdo->prepare("SELECT * FROM tbl_salesoverall WHERE invoice_payment_id =?");
                           $statement1->execute(array($row['invoice_payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

    
        // // Build a table row for each product
       $dataReportAll .= '<tr>
                    <td><b>' . $i .'</b></td>
                    <td>' . $date .'</td>
                    <td>'.$cust_det.'</td><td>';
                    
            foreach ($result1 as $row1) {
            $prodname = $row1['product_name'];
            $totQTY = $row1['quantity'];
            $totprice = number_format((float)$row1['product_price'],2);
                    
       $dataReportAll .='
                    <b>PRODUCT NAME:</b><br> '.$prodname.'
                    <br> 
                    <b>QUANTITY: </b>'.$totQTY.'
                    <br>
                    <b> PRICE: </b><br> ₱ '.$totprice.'<br><br>';
            }
         $dataReportAll .='</td>            
                    <td>'.$pay_det.'</td>
                    <td>₱ ' . number_format((float)$row['totalAmount'],2) . '</td>
                    <td>₱ ' . number_format((float)$row['totProfit'],2) . '</td>
                    <td> '.$statusOR.'</td>
                </tr>';
    }
}
// Load the HTML template
$html = file_get_contents("PrintSalesAll.html");

// Replace the placeholder "{{data}}" with the actual data

$html = str_replace(["{{dataReportAll}}","{{date_range}}","{{totalEarn}}","{{totalProfit}}","{{date_stat}}","{{status1}}","{{date1}}","{{count}}"],[$dataReportAll,$date_range,$totalEarn,$totalProfit,$date_stat,$status1,$date1,$count], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml(utf8_decode($html));

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
ob_end_clean();
$dompdf->stream("$date_range - Online/Point of Sales Reports.pdf", array("Attachment" => false));

// Clear any output buffers


// Output the generated PDF to the browser
// $dompdf->stream("$date_range - Online/Point of Sales Reports.pdf", ["Attachment" => 0]);

}



?>