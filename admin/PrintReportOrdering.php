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
                            t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND t1.payment_date 
                            BETWEEN '".$start_date."' 
                            AND '".$end_date."'
                            GROUP BY PayID
                            ORDER by t1.id DESC");
}
elseif($status == 'all'){
$date_nowsss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$date_weeksss = (isset($_POST['end_datee']) ? $_POST['end_datee'] : date('Y-m-d h:i:s', strtotime($_POST['end_datee'])));
$date_range = '<h3>'.date("F d, Y", strtotime($_POST['start_datee'])).' - '.date("F d, Y", strtotime($_POST['end_datee']));

$date_stat = '<h3 style ="float:right;">SALES</h3>';
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_weeksss);
$statement = $pdo->prepare("SELECT *, 
                                 t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND t1.payment_date 
                            BETWEEN '".$start_datee."' 
                            AND '".$end_datee."' 
                            GROUP BY PayID
                            ORDER by t1.id DESC");

}elseif($status == 'monthly'){
$month_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('F'));
$year_sel = (isset($_POST['end_date']) ? $_POST['end_date'] : date('Y'));
$date_range = '<h3>'.date("F",mktime(0,0,0,$month_sel,10)).' '.$year_sel;
$date_stat = '<h3 style ="float:right;">MONTHLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND MONTH(t1.payment_date) = '".$month_sel."' 
                            AND YEAR(t1.payment_date) = '".$year_sel."' 
                            GROUP by PayID 
                            ORDER BY t1.id DESC");
                            
}elseif($status == 'yearly'){
$yearly_sel = (isset($_POST['start_date']) ? $_POST['start_date'] : date('Y'));
$date_range = '<h3>YEAR '.$yearly_sel;
$date_stat = '<h3 style ="float:right;">YEARLY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND YEAR(t1.payment_date) = '".$yearly_sel."' 
                            GROUP BY PayID
                            ORDER by t1.id DESC");
                            
}elseif($status == 'daily'){
$daily = (isset($_POST['start_date']) ? $_POST['start_date']." 00:00:00" : date('Y-m-d 00:00:00'));
$daily_end = (isset($_POST['end_date']) ? $_POST['end_date']." 23:59:00" : date('Y-m-d 23:59:00'));
$date_range = '<h3>'.date('F d, Y', strtotime($_POST['start_date']));
$date_stat = '<h3 style ="float:right;">DAILY SALES</h3>';
$statement = $pdo->prepare("SELECT *, 
                            t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.delivery_status = 'Completed' 
                            AND t1.payment_date BETWEEN '".$daily."' 
                            AND '".$daily_end."' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");
}
else{
$statement = $pdo->prepare("SELECT *,
                            t2.unit_price, 
                            t2.quantity, 
                            
                            t1.payment_id as PayID, 
                            t2.payment_id as PayyID,              
                            t2.product_id,
                            
                            t1.customer_id,
                            t4.cust_id,
                            t4.cust_city,
                            
                            t5.city_id,
                            t5.amount,
                            
                            t6.city_id,
                            t6.city_name,
                            
                            t7.order_id,
                            t7.profit,
                            t7.totalProfit,
                            SUM(t7.totalProfit) as totProfit,
                            SUM(t7.total_amount) + t8.shippingfee as totalAmount,
                            t2.id,
                            
                            t8.shippingfee
                            
                            FROM tbl_payment t1 
                            JOIN tbl_order t2 
                            ON t1.payment_id = t2.payment_id 
                            JOIN tbl_salesoverall t7
                            ON t2.id = t7.order_id
                            JOIN tbl_customer t4
                            ON t1.customer_id = t4.cust_id
                            JOIN tbl_shipping_cost t5
                            ON t4.cust_city = t5.city_id
                            JOIN tbl_city t6
                            ON t5.city_id = t6.city_id
                            JOIN tbl_salesoverall_info t8
                            ON t7.invoice_payment_id = t8.invoice_payment_id
                            WHERE t1.payment_id = t2.payment_id AND t1.delivery_status = 'Completed' 
                            GROUP BY t1.payment_id
                            ORDER by t1.id DESC");
                            $date_stat = '<h3 style ="float:right;">SALES</h3>';
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$OrderPrice = 0;
$OrderQty = 0;
$SupplierPrice = 0;
$totalProfit =0;
$totalProfitQty = 0;
$totalAmount = 0;

foreach ($result as $rowAmount) {
    $totalAmount += $rowAmount['totalAmount'];
    // $OrderPrice = $rowAmount['unit_price'];
    // $OrderQty += $rowAmount['quantity'];
    // $SupplierPrice = $rowAmount['p_old_price'];
    // $totalProfit = $OrderPrice - $SupplierPrice;
    $totalProfitQty += $rowAmount['totProfit'];  
    $status1 = 'Standly Hardware - Online '.$_POST['status'].' Sales Reports';
}

$totalEarn = "<h5>₱ ".number_format((float)$totalAmount,2)."</h5>";
$totalProfit = "<h5>₱ ".number_format((float)$totalProfitQty,2)."</h5>";
$date =date('l | F d, Y | h:i:s A');
if ($statement->rowCount() > 0) { 
    foreach ($result as $row) { $i++;
   $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id =?");
                           $statement1->execute(array($row['payment_id']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                        //   echo '<pre>';
                        //   var_dump($result1);
                        //   echo '</pre>';
                        //   die();
                 
     $dataReportPOS .= '<tr>
            <td><b>' . $i .'</b></td>
            <td>' . date('l | F d, Y | h:i:s A', strtotime($row['payment_date'])) . '</td>
            <td> <b>NAME:</b> ' . $row['customer_name'] .'</td><td>
        ';

        foreach ($result1 as $row1) {
            $prodname = $row1['product_name'];
            $quantity = $row1['quantity'];
            $price = $row1['unit_price'];
        
            // Corrected line: Concatenate the HTML markup to $dataReportPOS
            $dataReportPOS .= '
            <b>PRODUCT:</b><br> ' . $prodname . '<br> 
            <b>QUANTITY:</b>   ' . $quantity . '<br>
            <b> PRICE: </b> ₱ ' . number_format((float)$price, 2).'<br><br>
            
            ';
        }
        $dataReportPOS .= '</td>
            <td> <b>PAYMENT ID:</b> ' . $row['payment_id'] . '<br>
            <b> PAYMENT METHOD: <br></b><span style="color:red;font-weight:400;"> ' . $row['payment_method'] . '</span>
            <br><b> Location & Shipping Fee:</b> '.$row['city_name'].' -₱ '.$row['amount'].'<br>            
            </td>
            <td>₱ ' . number_format((float)$row['totalAmount'], 2) . '</td>
            <td>₱ ' . number_format((float)$row['totProfit'], 2) . '</td>
        </tr>';
                            
    }
}
// Load the HTML template

$html = file_get_contents("PrintReportOrdering.html");

// Replace the placeholder "{{data}}" with the actual data

$html = str_replace(["{{dataReportPOS}}","{{date_range}}","{{totalEarn}}","{{totalProfit}}","{{date_stat}}","{{status1}}","{{date}}"],[$dataReportPOS,$date_range,$totalEarn,$totalProfit,$date_stat,$status1,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
// die($html);
// $html = json_encode($html);
$dompdf->loadHtml($html);


// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
ob_end_clean();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
$dompdf->clear();

// Clear any output buffers


// Output the generated PDF to the browser
// $dompdf->stream("$date_range - Online Reports.pdf", ["Attachment" => 0]);

}



?>