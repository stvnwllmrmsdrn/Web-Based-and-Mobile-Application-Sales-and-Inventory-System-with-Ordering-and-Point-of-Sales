<?php
$status = '';
if(isset($_GET['status'])){
    $status = $_GET['status'];
}
$i =0;
if($statuss == 'weekly'){
    $date_nowsss = date('Y-m-d h:i:s');
    $date_weekss = (isset($_POST['start_date']) ? date("Y-m-d", strtotime($_POST['start_date']."+1 week")) : date("Y-m-d", strtotime("+1 week")));
    $start_date = (isset($_POST['start_date']) ? $_POST['start_date'] : $date_nowsss);
    $end_date = $date_weekss;
    $statement = $pdo->prepare("SELECT  s.transaction_id,
                                                    s.name, 
                                                    s.cashier, 
                                                    s.cust_contact, 
                                                    s.cust_address, 
                                                    s.invoice_number, 
                                                    s.date as datePOS, 
                                                    s.type,
                                                    s.amount_pos as total,
                                                    s.user_id,
                                                    s.discount_status,
                                                    s.shipping_id,
                                                    s.delivery_status,
                                                    s.photo_delivery_receipt,
                                                    s.receipt_date_upload,
                                                    s.finalTotalAmount,
                                                    s.transaction_id,

                                                    so.p_current_price as totalPrice, 
                                                    so.qty,  
                                                    SUM(so.profit * so.qty) as TotalProfit1,
                                                    SUM(so.totalProfit) as TotalProfit,
                                                    so.amount as amountPrice,
                                                    so.p_name,  
                                                    so.invoice,
                                                    so.date,
                                                    so.product,
                                                    so.reason_id,
                                                    SUM(so.amount) + t1.shippingfee as totalSales,
                                                
                                                    d.discount_id,
                                                    d.discount_name,
                                                    d.discount as TotDiscount,

                                                    p.p_id,
                                                    p.p_name,
                                                    
                                                    sh.shipping_cost_id,
                                                    sh.city_id,
                                                    sh.amount as shipAmount,
                                                    
                                                    del.d_id,
                                                    del.d_status,
                                                    
                                                    c.city_id,
                                                    c.city_name,
                                                    
                                                    t1.shippingfee,
                                                    t1.invoice_payment_id   
                                        
                                                FROM tbl_salesorder_pos so 
                                                LEFT JOIN tbl_sales_pos s 
                                                ON s.invoice_number = so.invoice
                                                LEFT JOIN tbl_shipping_cost sh
                                                ON s.shipping_id = sh.shipping_cost_id
                                                LEFT JOIN tbl_city c
                                                ON c.city_id = sh.city_id
                                                LEFT JOIN tbl_delivery_status del
                                                ON del.d_id = s.delivery_status
                                                LEFT JOIN tbl_discount d
                                                ON d.discount_id = s.discount_status
                                                LEFT JOIN tbl_product p
                                                ON so.product = p.p_id
                                                JOIN tbl_salesoverall_info t1
                                                ON s.invoice_number = t1.invoice_payment_id
                                                WHERE s.date BETWEEN '".$start_date."' AND '".$end_date."'
                                                GROUP BY so.invoice 
                                                ORDER BY s.transaction_id DESC");
}elseif($statuss == 'monthly'){
            $month_sel = (isset($_POST['month_sect']) ? $_POST['month_sect'] : date('m'));
            $year_sel = (isset($_POST['year_sect']) ? $_POST['year_sect'] : date('Y'));
            $statement = $pdo->prepare("SELECT  s.transaction_id,
            s.name, 
            s.cashier, 
            s.cust_contact, 
            s.cust_address, 
            s.invoice_number, 
            s.date as datePOS, 
            s.type,
            s.amount_pos as total,
            s.user_id,
            s.discount_status,
            s.shipping_id,
            s.delivery_status,
            s.photo_delivery_receipt,
            s.receipt_date_upload,
            s.finalTotalAmount,
             s.transaction_id,

            so.p_current_price as totalPrice, 
            so.qty,  
            SUM(so.profit * so.qty) as TotalProfit1,
            SUM(so.totalProfit) as TotalProfit,
            so.p_name,  
            so.invoice,
            so.date,
            so.product,
            so.reason_id,
            so.amount as amountPrice,
            SUM(so.amount) + t1.shippingfee as totalSales,

            d.discount_id,
            d.discount_name,
            d.discount as TotDiscount,

            p.p_id,
            p.p_name,

            sh.shipping_cost_id,
            sh.city_id,
            sh.amount as shipAmount,

            del.d_id,
            del.d_status,

            c.city_id,
            c.city_name,
                                                    
            t1.shippingfee,
            t1.invoice_payment_id
        
            FROM tbl_salesorder_pos so 
            LEFT JOIN tbl_sales_pos s 
            ON s.invoice_number = so.invoice
            LEFT JOIN tbl_shipping_cost sh
            ON s.shipping_id = sh.shipping_cost_id
            LEFT JOIN tbl_city c
            ON c.city_id = sh.city_id
            LEFT JOIN tbl_delivery_status del
            ON del.d_id = s.delivery_status
            LEFT JOIN tbl_discount d
            ON d.discount_id = s.discount_status
            LEFT JOIN tbl_product p
            ON so.product = p.p_id
            JOIN tbl_salesoverall_info t1
            ON s.invoice_number = t1.invoice_payment_id
            WHERE MONTH(s.date) = '".$month_sel."' AND YEAR(s.date) = '".$year_sel."'
            GROUP BY so.invoice 
            ORDER BY s.transaction_id DESC");
              
}
elseif($statuss == 'yearly'){
    $yearly_sel = (isset($_POST['yearly_sect']) ? $_POST['yearly_sect'] : date('Y'));
    $statement = $pdo->prepare("SELECT  s.transaction_id,
    s.name, 
    s.cashier, 
    s.cust_contact, 
    s.cust_address, 
    s.invoice_number, 
    s.date as datePOS, 
    s.type,
    s.amount_pos as total,
    s.user_id,
    s.discount_status,
    s.shipping_id,
    s.delivery_status,
    s.photo_delivery_receipt,
    s.receipt_date_upload,
    s.finalTotalAmount,

    so.p_current_price as totalPrice, 
    so.qty,  
    SUM(so.profit * so.qty) as TotalProfit1,
    SUM(so.totalProfit) as TotalProfit,
    so.p_name,  
    so.invoice,
    so.date,
    so.product,
    so.reason_id,
    so.amount as amountPrice,
    SUM(so.amount) + t1.shippingfee as totalSales,
    s.transaction_id,

    d.discount_id,
    d.discount_name,
    d.discount as TotDiscount,

    p.p_id,
    p.p_name,

    sh.shipping_cost_id,
    sh.city_id,
    sh.amount as shipAmount,

    del.d_id,
    del.d_status,

    c.city_id,
    c.city_name,
                                                    
    t1.shippingfee,
    t1.invoice_payment_id
    
    FROM tbl_salesorder_pos so 
    LEFT JOIN tbl_sales_pos s 
    ON s.invoice_number = so.invoice
    LEFT JOIN tbl_shipping_cost sh
    ON s.shipping_id = sh.shipping_cost_id
    LEFT JOIN tbl_city c
    ON c.city_id = sh.city_id
    LEFT JOIN tbl_delivery_status del
    ON del.d_id = s.delivery_status
    LEFT JOIN tbl_discount d
    ON d.discount_id = s.discount_status
    LEFT JOIN tbl_product p
    ON so.product = p.p_id
    JOIN tbl_salesoverall_info t1
    ON s.invoice_number = t1.invoice_payment_id
    WHERE YEAR(s.date) = '".$yearly_sel."'
    GROUP BY so.invoice 
    ORDER BY s.transaction_id DESC");
}
elseif($statuss == 'daily'){
             $daily = (isset($_POST['start_day']) ? $_POST['start_day']." 00:00:00" : date('Y-m-d 00:00:00'));
             $daily_end = (isset($_POST['start_day']) ? $_POST['start_day']." 23:59:00" : date('Y-m-d 23:59:00'));
                $statement = $pdo->prepare("SELECT  s.transaction_id,
                s.name, 
                s.cashier, 
                s.cust_contact, 
                s.cust_address, 
                s.invoice_number, 
                s.date as datePOS, 
                s.type,
                s.amount_pos as total,
                s.user_id,
                s.discount_status,
                s.shipping_id,
                s.delivery_status,
                s.photo_delivery_receipt,
                s.receipt_date_upload,
                s.finalTotalAmount,
                 s.transaction_id,

                so.p_current_price as totalPrice, 
                so.qty,  
                SUM(so.profit * so.qty) as TotalProfit1,
                SUM(so.totalProfit) as TotalProfit,
                so.p_name,  
                so.invoice,
                so.date,
                so.product,
                so.reason_id,
                so.amount as amountPrice,
                SUM(so.amount) + t1.shippingfee as totalSales,

                d.discount_id,
                d.discount_name,
                d.discount as TotDiscount,

                p.p_id,
                p.p_name,

                sh.shipping_cost_id,
                sh.city_id,
                sh.amount as shipAmount,

                del.d_id,
                del.d_status,

                c.city_id,
                c.city_name,
                                                    
                t1.shippingfee,
                t1.invoice_payment_id

                FROM tbl_salesorder_pos so 
                LEFT JOIN tbl_sales_pos s 
                ON s.invoice_number = so.invoice
                LEFT JOIN tbl_shipping_cost sh
                ON s.shipping_id = sh.shipping_cost_id
                LEFT JOIN tbl_city c
                ON c.city_id = sh.city_id
                LEFT JOIN tbl_delivery_status del
                ON del.d_id = s.delivery_status
                LEFT JOIN tbl_discount d
                ON d.discount_id = s.discount_status
                LEFT JOIN tbl_product p
                ON so.product = p.p_id
                JOIN tbl_salesoverall_info t1
                ON s.invoice_number = t1.invoice_payment_id
                WHERE s.date BETWEEN '".$daily."' AND '".$daily_end."'
                GROUP BY so.invoice 
                ORDER BY s.transaction_id DESC");
}

elseif($statuss == 'all'){
$date_nowsss = date('Y-m-d h:i:s');
$date_nowssss = date('Y-m-d h:i:s');
$date_weeksss = (isset($_POST['start_datee']) ? $_POST['start_datee'] : date('Y-m-d h:i:s', strtotime($_POST['start_datee'])));
$start_datee = (isset($_POST['start_datee']) ? $_POST['start_datee']." 00:00:00" : $date_nowsss);
$end_datee = (isset($_POST['end_datee']) ? $_POST['end_datee']." 11:59:00" : $date_nowssss);
$statement = $pdo->prepare("SELECT                  s.transaction_id,
                                                    s.name, 
                                                    s.cashier, 
                                                    s.cust_contact, 
                                                    s.cust_address, 
                                                    s.invoice_number, 
                                                    s.date as datePOS, 
                                                    s.type,
                                                    s.amount_pos as total,
                                                    s.user_id,
                                                    s.discount_status,
                                                    s.shipping_id,
                                                    s.delivery_status,
                                                    s.photo_delivery_receipt,
                                                    s.receipt_date_upload,
                                                    s.finalTotalAmount,
                                                     s.transaction_id,

                                                    so.p_current_price as totalPrice, 
                                                    so.qty,  
                                                    SUM(so.profit * so.qty) as TotalProfit1,
                                                    SUM(so.totalProfit) as TotalProfit,
                                                    so.amount as amountPrice,
                                                    so.p_name,  
                                              
                                                    so.invoice,
                                                    so.date,
                                                    so.product,
                                                    so.reason_id,
                                                    SUM(so.amount) + t1.shippingfee as totalSales,
                                                
                                                    d.discount_id,
                                                    d.discount_name,
                                                    d.discount as TotDiscount,

                                                    p.p_id,
                                                    p.p_name,
                                                    
                                                    sh.shipping_cost_id,
                                                    sh.city_id,
                                                    sh.amount as shipAmount,
                                                    
                                                    del.d_id,
                                                    del.d_status,
                                                    
                                                    c.city_id,
                                                    c.city_name,
                                                    
                                                    t1.shippingfee,
                                                    t1.invoice_payment_id
                                            
                                                    FROM tbl_salesorder_pos so 
                                                    LEFT JOIN tbl_sales_pos s 
                                                    ON s.invoice_number = so.invoice
                                                    LEFT JOIN tbl_shipping_cost sh
                                                    ON s.shipping_id = sh.shipping_cost_id
                                                    LEFT JOIN tbl_city c
                                                    ON c.city_id = sh.city_id
                                                    LEFT JOIN tbl_delivery_status del
                                                    ON del.d_id = s.delivery_status
                                                    LEFT JOIN tbl_discount d
                                                    ON d.discount_id = s.discount_status
                                                    LEFT JOIN tbl_product p
                                                    ON so.product = p.p_id
                                                    WHERE s.date BETWEEN '".$start_datee."' AND '".$end_datee."'
                                                    GROUP BY so.invoice 
                                                    ORDER BY s.transaction_id DESC");
}
else {
$statement = $pdo->prepare("SELECT                  s.transaction_id,
                                                    s.name, 
                                                    s.cashier, 
                                                    s.cust_contact, 
                                                    s.cust_address, 
                                                    s.invoice_number, 
                                                    s.date as datePOS, 
                                                    s.type,
                                                    s.amount_pos as total,
                                                    s.user_id,
                                                    s.discount_status,
                                                    s.shipping_id,
                                                    s.delivery_status,
                                                    s.photo_delivery_receipt,
                                                    s.receipt_date_upload,
                                                    s.finalTotalAmount,
                                                    s.transaction_id,

                                                    so.p_current_price as totalPrice, 
                                                    so.qty,  
                                                    SUM(so.profit * so.qty) as TotalProfit1,
                                                    SUM(so.totalProfit) as TotalProfit,
                                                    so.amount as amountPrice,
                                                    so.p_name,  
                                                    so.invoice,
                                                    so.date,
                                                    so.product,
                                                    so.reason_id,
                                                    SUM(so.amount) + t1.shippingfee as totalSales,
                                                    
                                                    d.discount_id,
                                                    d.discount_name,
                                                    d.discount as TotDiscount,

                                                    p.p_id,
                                                    p.p_name,
                                                    
                                                    sh.shipping_cost_id,
                                                    sh.city_id,
                                                    sh.amount as shipAmount,
                                                    
                                                    del.d_id,
                                                    del.d_status,
                                                    
                                                    c.city_id,
                                                    c.city_name,
                                                    
                                                    t1.shippingfee,
                                                    t1.invoice_payment_id
                                             
                                                    FROM tbl_salesorder_pos so 
                                                    LEFT JOIN tbl_sales_pos s 
                                                    ON s.invoice_number = so.invoice
                                                    LEFT JOIN tbl_shipping_cost sh
                                                    ON s.shipping_id = sh.shipping_cost_id
                                                    LEFT JOIN tbl_city c
                                                    ON c.city_id = sh.city_id
                                                    LEFT JOIN tbl_delivery_status del
                                                    ON del.d_id = s.delivery_status
                                                    LEFT JOIN tbl_discount d
                                                    ON d.discount_id = s.discount_status
                                                    LEFT JOIN tbl_product p
                                                    ON so.product = p.p_id
                                                    JOIN tbl_salesoverall_info t1
                                                    ON s.invoice_number = t1.invoice_payment_id
                                                    WHERE s.date
                                                    GROUP BY so.invoice 
                                                    ORDER BY s.transaction_id DESC");
}

?>