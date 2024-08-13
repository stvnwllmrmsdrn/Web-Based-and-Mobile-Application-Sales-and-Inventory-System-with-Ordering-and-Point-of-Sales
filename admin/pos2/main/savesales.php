<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = date('Y-m-d h:i:s');
$d = $_POST['ptype'];
$e = $_POST['amount_pos'];
$z = $_POST['profit'];
$f = $_POST['due_date'];
$id = $_SESSION['SESS_MEMBER_ID'];
$cname = $_POST['name'];
$shipping = $_POST['shipping_id'];
$d_status = $_POST['delivery_status'];
$discount = $_POST['discount_status'];
$cust_contact = $_POST['cust_contact'];
$cust_address = $_POST['cust_address'];
$finalTotalAmount = 0;
$discountCount = 0;
$shippingfee = 0;
$getDiscount = $db->prepare("SELECT * FROM tbl_discount WHERE discount_id ='".$discount."'");
$getDiscount->execute();
$resGetDiscount = $getDiscount->fetchAll(PDO::FETCH_ASSOC);
foreach($resGetDiscount as $row1)
{
    $discountCount = ($row1[0]['discount']/100);
}
$getShipping = $db->prepare("SELECT * FROM tbl_shipping_cost WHERE shipping_cost_id =?");
$getShipping->execute(array($shipping));
$resGetShipping = $getShipping->fetchAll(PDO::FETCH_ASSOC);
foreach($resGetShipping as $row2)
{
$shippingfee = $resGetShipping[0]['amount'];
}

$finalTotalAmount = $e - ($e * $discountCount) + $shippingfee;
// if($shipping != 0 )
// {
//   $shipping = 'Completed';
// }
// else
// {
//     $shipping = 'Pending';
// }

   $f = $_POST['cash'];
    if($d=='cash' && $f > $e) {
    $sql = "INSERT INTO tbl_sales_pos 
            (invoice_number,
            cashier,
            date,
            type,
            amount_pos,
            profit,
            due_date,
            name,
            cust_contact,
            cust_address, 
            discount_status, 
            delivery_status, 
            user_id, 
            shipping_id,
            finalTotalAmount) 
            VALUES 
            (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address, :discount_status, :delivery_status, :user_id, :shipping_id,:finalTotalAmount)";
         $q = $db->prepare($sql);
         $q->execute(array(':a'=>$a,
                            ':b'=>$b,
                            ':c'=>$c,
                            ':d'=>$d,
                            ':e'=>$e,
                            ':z'=>$z,
                            ':f'=>$f,
                            ':g'=>$cname,
                            ':cust_contact'=>$cust_contact,
                            ':cust_address'=>$cust_address,
                            ':discount_status'=>$discount, 
                            ':delivery_status'=>$d_status, 
                            ':user_id'=>$id, 
                            ':shipping_id'=>$shipping, 
                            ':finalTotalAmount'=>$finalTotalAmount));
      
         
    $sql = "INSERT INTO tbl_salesoverall_info
            (invoice_payment_id,
            cashier,
            date,
            payment_method,
            total_amount,
            profit,
            due,
            cust_name,
            cust_contact,
            cust_address,
            discount,
            cashier_id_pos,
            shippingfee,
            finalTotalAmount_pos)
            VALUES
            (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address, :discount,:cashier_id_pos, :shippingfee,:finalTotalAmount_pos)";
       
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,
                      ':b'=>$b,
                      ':c'=>$c,
                      ':d'=>$d,
                      ':e'=>$e,
                      ':z'=>$z,
                      ':f'=>$f,
                      ':g'=>$cname,
                      ':cust_contact'=>$cust_contact, 
                      ':cust_address'=>$cust_address, 
                      ':discount'=>$discount,
                      ':cashier_id_pos'=>$id, 
                      ':shippingfee'=>$shippingfee, 
                      ':finalTotalAmount_pos'=>$finalTotalAmount));
    header("location: preview.php?invoice=$a");
    exit();
    }
    elseif ($d=='cash' && $f == $e)
    {
        $sql = "INSERT INTO tbl_sales_pos 
            (invoice_number,
            cashier,
            date,
            type,
            amount_pos,
            profit,
            due_date,
            name,
            cust_contact,
            cust_address, 
            discount_status, 
            delivery_status, 
            user_id, 
            shipping_id,
            finalTotalAmount) 
            VALUES 
            (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address, :discount_status, :delivery_status, :user_id, :shipping_id,:finalTotalAmount)";
         $q = $db->prepare($sql);
         $q->execute(array(':a'=>$a,
                           ':b'=>$b,
                           ':c'=>$c,
                           ':d'=>$d,
                           ':e'=>$e,
                           ':z'=>$z,
                           ':f'=>$f,
                           ':g'=>$cname,
                           ':cust_contact'=>$cust_contact, 
                           ':cust_address'=>$cust_address, 
                           ':discount_status'=>$discount, 
                           ':delivery_status'=>$d_status, 
                           ':user_id'=>$id, 
                           ':shipping_id'=>$shipping, 
                           ':finalTotalAmount'=>$finalTotalAmount));
                
    $sql = "INSERT INTO tbl_salesoverall_info
            (invoice_payment_id,
            cashier,
            date,
            payment_method,
            total_amount,
            profit,
            due,
            cust_name,
            cust_contact,
            cust_address,
            discount,
            cashier_id_pos,
            shippingfee,
            finalTotalAmount_pos)
            VALUES
            (:a,:b,:c,:d,:e,:z,:f,:g, :cust_contact, :cust_address, :discount,:cashier_id_pos, :shippingfee,:finalTotalAmount_pos)";
    $q = $db->prepare($sql);
    $q->execute(array(':a'=>$a,
                      ':b'=>$b,
                      ':c'=>$c,
                      ':d'=>$d,
                      ':e'=>$e,
                      ':z'=>$z,
                      ':f'=>$f,
                      ':g'=>$cname,
                      ':cust_contact'=>$cust_contact, 
                      ':cust_address'=>$cust_address, 
                      ':discount'=>$discount,
                      ':cashier_id_pos'=>$id, 
                      ':shippingfee'=>$shippingfee, 
                      ':finalTotalAmount_pos'=>$finalTotalAmount));
                 
    header("location: preview.php?invoice=$a");
    exit(); 
    }
    
    else
    {
        echo '<script>alert("Your payment is below on the total purchased!")</script>';  
    }

?>