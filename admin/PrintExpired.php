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
$date = date('l | F d, Y | h:i:s A');
$i=0;
$date_today = date('Y-m-d h:i:s');
$expired_sevenday = date('Y-m-d', strtotime($date_today . '+1 month'));
$stmt = $pdo->prepare("SELECT * FROM tbl_product WHERE date_expire <= '".$expired_sevenday."' AND date_expire != '00:00:00' ORDER BY p_id");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($stmt->rowCount() > 0) {
  
    foreach ($result as $row) { $i++;
    // $expire = $row['date_expire'] < $date_today;
    // $expired = $row['date_expire'] > $date_today && $row['date_expire'] <= $expired_sevenday;
    
        $active = 
        $row['date_expire'] < $date_today ?
        '<span style="color:red;font-weight:400;">EXPIRED</span>' :
        (($row['date_expire'] > $date_today && $row['date_expire'] <= $expired_sevenday) ?
        '<span style="color:orange;font-weight:400;">NEAR TO EXPIRE</span>':'');
    
        //PHOTO FEATURED
        $imageData = base64_encode(file_get_contents("../assets/uploads/".$row['p_featured_photo']));
        $type = 'jpeg,jpg';
        $logo = 'data:../assets/uploads/' . $type . ';base64,' . $imageData;
        ///conditional
        
        $dataExpired .= '<tr>
                    <td>' . $i . '</td>
                    <td><img src="'.$logo.'" alt="" style="width:40px;">'.'</td>
                    <td>' . $row['p_name'] . '</td>
                    <td>' . $row['p_qty'] . '</td>
                    <td>' . date('F d, Y',strtotime($row['date_expire'])) . '</td>
                     <td>' . $active . '</td>
                
                //   </tr>';
}

// ? = true condition mo
// : = else na yung condition mo or false
// : () = else if
// ($row['date_expire'] < $date_today) ? '<span style="color:red;font-weight:400;">EXPIRED</span>' : (($row['date_expire'] > $date_today && $row['date_expire'] <= $expired_sevenday) ? 'true return' : 'return end')

// if(($row['date_expire'] < $date_today) ){

// }
// Load the HTML template
$html = file_get_contents("PrintExpired.html");

// Replace the placeholder "{{data}}" with the actual data
$html = str_replace(["{{dataExpired}}","{{date}}"],[$dataExpired,$date], $html);
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("Dejavu Sans", "sans-serif");
$dompdf->getCanvas()->page_text(550, 822, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
$dompdf->stream("Standly -Expired Product - $date .pdf", array("Attachment" => false));

// Clear any output buffers
ob_end_clean();

// Output the generated PDF to the browser
// $dompdf->stream("Standly -Expired Product - $date .pdf", ["Attachment" => 0]);
}