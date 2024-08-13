

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO tbl_city VALUES("1","Meycauayan");
INSERT INTO tbl_city VALUES("2","Bocaue");
INSERT INTO tbl_city VALUES("3","Marilao");
INSERT INTO tbl_city VALUES("7","Sta. Maria");
INSERT INTO tbl_city VALUES("8","Guiguinto");
INSERT INTO tbl_city VALUES("9","Balagtas");
INSERT INTO tbl_city VALUES("10","Malolos");
INSERT INTO tbl_city VALUES("11","San Jose Del Monte");
INSERT INTO tbl_city VALUES("12","Obando");
INSERT INTO tbl_city VALUES("13","Bulakan");
INSERT INTO tbl_city VALUES("14","Pandi");



CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_color VALUES("1","Red");
INSERT INTO tbl_color VALUES("2","Black");
INSERT INTO tbl_color VALUES("3","Blue");
INSERT INTO tbl_color VALUES("4","Yellow");
INSERT INTO tbl_color VALUES("5","Green");
INSERT INTO tbl_color VALUES("6","White");
INSERT INTO tbl_color VALUES("7","Orange");
INSERT INTO tbl_color VALUES("8","Brown");
INSERT INTO tbl_color VALUES("9","Tan");
INSERT INTO tbl_color VALUES("10","Pink");
INSERT INTO tbl_color VALUES("11","Mixed");
INSERT INTO tbl_color VALUES("12","Lightblue");
INSERT INTO tbl_color VALUES("13","Violet");
INSERT INTO tbl_color VALUES("14","Light Purple");
INSERT INTO tbl_color VALUES("15","Salmon");
INSERT INTO tbl_color VALUES("16","Gold");
INSERT INTO tbl_color VALUES("17","Gray");
INSERT INTO tbl_color VALUES("18","Ash");
INSERT INTO tbl_color VALUES("19","Maroon");
INSERT INTO tbl_color VALUES("20","Silver");
INSERT INTO tbl_color VALUES("21","Dark Clay");
INSERT INTO tbl_color VALUES("22","Cognac");
INSERT INTO tbl_color VALUES("23","Coffee");
INSERT INTO tbl_color VALUES("24","Charcoal");
INSERT INTO tbl_color VALUES("25","Navy");
INSERT INTO tbl_color VALUES("26","Fuchsia");
INSERT INTO tbl_color VALUES("27","Olive");
INSERT INTO tbl_color VALUES("28","Burgundy");
INSERT INTO tbl_color VALUES("29","Midnight Blue");
INSERT INTO tbl_color VALUES("30","Rainbow");



CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO tbl_country VALUES("1","Philippines");



CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` int(11) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` int(11) NOT NULL,
  `cust_state` int(11) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_b_name` varchar(100) NOT NULL,
  `cust_b_cname` varchar(100) NOT NULL,
  `cust_b_phone` varchar(50) NOT NULL,
  `cust_b_country` int(11) NOT NULL,
  `cust_b_address` text NOT NULL,
  `cust_b_city` int(11) NOT NULL,
  `cust_b_state` int(11) NOT NULL,
  `cust_b_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_country` int(11) NOT NULL,
  `cust_s_address` text NOT NULL,
  `cust_s_city` int(11) NOT NULL,
  `cust_s_state` int(11) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int(1) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_customer VALUES("48","Jovan Talagtag","","jovantalagtag814@gmail.com","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","","","","0","","0","0","","","","","0","","0","0","","b59c6e9b344bae1a36fe427a42889265","f0693baf0dbd65f6156b578e19d84e7c","2023-06-30 04:12:09","1688098329","1","cust-0.jpg");
INSERT INTO tbl_customer VALUES("99","Steven William Duran","Duran","duranstan300@gmail.com","09510574004","1","Bulacan","1","1","3020","Steven","Duran","09156524892","1","Valenzuela City","10","1","3020","Steven","Duran","09156524892","1","Valenzuela City","10","1","3020","6ec4a919f96416ab224e88ead979ea5f","","2023-07-19 02:16:02","1689776162","1","cust-99.jpg");
INSERT INTO tbl_customer VALUES("105","August","Lemon","lemonjhonaugust@gmail.com","90785644532","1","21A Melchor St. Brgy. Lias","3","1","3019","August","Lemon","09786547121","1","21A Melchor St. Brgy. Lias","3","1","3019","August","Lemon","09786547121","1","21A Melchor St. Brgy. Lias","3","1","3019","a912363065a65288a602aef9c1702927","","2023-08-18 01:18:40","1692364720","1","cust-105.jpg");
INSERT INTO tbl_customer VALUES("112","Joseph","Rubio","josephrubio1995@gmail.com","09358878476","1","Makati Avenue","3","1","309","Joseph","Rubio","09358878476","1","Makati Avenue","3","1","309","Joseph","Rubio","09358878476","1","Makati Avenue","3","1","309","4ea87a999c60e96ab60230cb4ac34413","","2023-10-07 05:59:59","1696672799","1","");
INSERT INTO tbl_customer VALUES("119","Rico","manalo","jagom16659@tutoreve.com","09641640902","1","this is user","9","1","1233","Rico","Manabat","0921093812098","1","asdjhaskdas","9","1","23232","Rico","Manabat","09803947324","1","ssasd","9","1","1232","5ef401170f221d26d002fc15ec299ffe","","2023-10-20 04:19:31","1697789971","1","");
INSERT INTO tbl_customer VALUES("123","Gino","Fernando","gino.a.fernando@gmail.com","6399994242684","1","Marilao, Bulacan","2","1","3019","Gino","Fernando","09994242684","1","123123","9","1","3019","Gino","Fernando","09994242684","1","123123","9","1","3019","68cb8914a9f7916bc3380a5a803f5964","","2023-10-27 02:23:44","1698387824","1","");
INSERT INTO tbl_customer VALUES("127","Jovan","Talagtag","photoboothcentral19@gmail.com","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Jovan","Talagtag","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Jovan","Talagtag","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","0fb0356ac2388341d0d2c35255620ab9","","2023-10-31 04:09:34","1698739774","1","");
INSERT INTO tbl_customer VALUES("136","Stephen Curry","Duran","atsemployees2022@gmail.com","09510574004","1","161 Duran Street, Daungan, Malhacan","1","1","3020","Steven William","Duran","09510574004","1","161 Duran Street, Daungan, Malhacan","1","1","3020","Steven William","Duran","09510574004","1","161 Duran Street, Daungan, Malhacan","1","1","3020","2637a5c30af69a7bad877fdb65fbd78b","aa6d5e0c3bd084b49fb991d783a9f428","2023-11-19 05:04:41","1700384681","0","");
INSERT INTO tbl_customer VALUES("144","Jovan","Talagtag","jovantalagtag14@gmail.com","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Jovan","Talagtag","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Jovan","Talagtag","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","f9a386f9646a062a94f7991ea5062ca2","3a0f20710c2c1737c9f874a33d3964cb","2023-11-20 03:02:59","1700420579","1","cust-144.jpg");
INSERT INTO tbl_customer VALUES("147","John","Doe","mamaiyieee001@gmail.com","09274396875","1","marilao","3","1","1390","John","Doe","09274396875","1","marilao","3","1","1390","John","Doe","09274396875","1","marilao","3","1","1390","1dfc8a5b85d88e9c94f1d04e886fa434","8634e4e60869e359755ac871946c983d","2023-12-12 02:47:34","1702363654","1","");
INSERT INTO tbl_customer VALUES("150","Standly","Hardware","standlyhardware1@gmail.com","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Standly","Hardware","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Standly","Hardware","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","0fb0356ac2388341d0d2c35255620ab9","9d335ae4532a919cb4e0894ad10005e6","2023-12-12 08:03:03","1702382583","0","");
INSERT INTO tbl_customer VALUES("159","Standly","Hardware","talagtagjovan.pdm@gmail.com","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Standly","Hardware","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","Standly","Hardware","09156524892","1","Blk 33 Lot 12 Tokyo st. Cuidad grande","1","1","3020","0fb0356ac2388341d0d2c35255620ab9","7ba57faeee14eb8d8ce7487fe8690d5d","2023-12-12 09:09:04","1702386544","0","");



CREATE TABLE `tbl_customer_message` (
  `customer_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `order_detail` text NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_customer_message VALUES("9","Send payment","Thank you for your order. Please send payment to process the placement of your order. ","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("10","Send payment","send your payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("11","Send payment","Send paymentSend paymentSend paymentSend paymentSend paymentSend paymentSend paymentSend paymentSend payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("12","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-06-22 06:06:17<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 989<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687413977<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","24");
INSERT INTO tbl_customer_message VALUES("13","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-06-22 06:06:17<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 989<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687413977<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","24");
INSERT INTO tbl_customer_message VALUES("14","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("15","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("16","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("17","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("18","Send payment","Send payment","
Customer Name: Steven Duran<br>
Customer Email: stevenduran@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 04:39:30<br>
Payment Details: <br><br>
Paid Amount: 2800<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687581570<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM<br>
Size: One Size for All<br>
Color: Orange<br>
Quantity: 1<br>
Unit Price: 2700<br>
            ","12");
INSERT INTO tbl_customer_message VALUES("19","Send payment","Send payment","
Customer Name: Steven Duran<br>
Customer Email: stevenduran@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 04:39:30<br>
Payment Details: <br><br>
Paid Amount: 2800<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687581570<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM<br>
Size: One Size for All<br>
Color: Orange<br>
Quantity: 1<br>
Unit Price: 2700<br>
            ","12");
INSERT INTO tbl_customer_message VALUES("20","Send payment","Send payment","
Customer Name: Steven Duran<br>
Customer Email: stevenwilliamduran@gmail.com<br>
Payment Method: Cash on Pickup<br>
Payment Date: 2023-06-24 04:54:04<br>
Payment Details: <br><br>
Paid Amount: 3900<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687582444<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Ingco Angle Grinder 4? 900W (Toggle Switch)<br>
Size: One Size for All<br>
Color: Yellow<br>
Quantity: 1<br>
Unit Price: 3800<br>
            ","35");
INSERT INTO tbl_customer_message VALUES("21","Send payment","Send payment in gcash no 096786348343","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 05:22:53<br>
Payment Details: <br><br>
Paid Amount: 4900<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687584173<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Ingco Rotary Sander 320W<br>
Size: One Size for All<br>
Color: Yellow<br>
Quantity: 1<br>
Unit Price: 4800<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("22","Send payment","Send payment paypal 
","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("23","Payment successful","you paid 4900","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 05:22:53<br>
Payment Details: <br><br>
Paid Amount: 4900<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687584173<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Ingco Rotary Sander 320W<br>
Size: One Size for All<br>
Color: Yellow<br>
Quantity: 1<br>
Unit Price: 4800<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("24","Payment Successful","Please wait for Shipping","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 05:22:53<br>
Payment Details: <br><br>
Paid Amount: 4900<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1687584173<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Ingco Rotary Sander 320W<br>
Size: One Size for All<br>
Color: Yellow<br>
Quantity: 1<br>
Unit Price: 4800<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("25","Send payment","Send payment kung ayaw mo bumagsak ","
Customer Name: Mailyn Tudlasan<br>
Customer Email: mailyn01tudlasan@gmail.com<br>
Payment Method: Cash on Pickup<br>
Payment Date: 2023-06-24 05:32:22<br>
Payment Details: <br><br>
Paid Amount: 989<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687584742<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","20");
INSERT INTO tbl_customer_message VALUES("26","Send payment","Send your payment to process the order","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 06:17:55<br>
Payment Details: <br><br>
Paid Amount: 3900<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687587475<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: One Size for All<br>
Color: Red<br>
Quantity: 2<br>
Unit Price: 1900<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("27","Payment recieved","Please wait for the shipping of your product","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 06:17:55<br>
Payment Details: <br><br>
Paid Amount: 3900<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687587475<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: One Size for All<br>
Color: Red<br>
Quantity: 2<br>
Unit Price: 1900<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("28","Send payment","send ","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-24 08:12:36<br>
Payment Details: <br><br>
Paid Amount: 280<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687594356<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 2<br>
Unit Price: 90<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("29","Send payment","Hello ","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-24 08:12:36<br>
Payment Details: <br><br>
Paid Amount: 280<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687594356<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 2<br>
Unit Price: 90<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("30","Send payment","Waiting For the Payment","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-24 08:12:36<br>
Payment Details: <br><br>
Paid Amount: 280<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687594356<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 2<br>
Unit Price: 90<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("31","Send payment","Waiting For the Payment","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-24 08:12:36<br>
Payment Details: <br><br>
Paid Amount: 280<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687594356<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 2<br>
Unit Price: 90<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("32","hoyy mag bayyyad kana ","animal ka ","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-25 15:50:33<br>
Payment Details: <br><br>
Paid Amount: 3850<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687708233<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: BVC080 LED15/765<br>
Size: One Size for All<br>
Color: White<br>
Quantity: 1<br>
Unit Price: 3750<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("33","hoyy mag bayyyad kana ","animal ka ","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-25 15:50:33<br>
Payment Details: <br><br>
Paid Amount: 3850<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687708233<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: BVC080 LED15/765<br>
Size: One Size for All<br>
Color: White<br>
Quantity: 1<br>
Unit Price: 3750<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("34","hoyy mag bayyyad kana ","bayyya d bayyad din sir ","
Customer Name: Bry<br>
Customer Email: brrryyyy23@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-25 15:59:17<br>
Payment Details: <br><br>
Paid Amount: 11199<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687708757<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: BOSCH ROTARY HAMMER GBH 180-LI<br>
Size: One Size for All<br>
Color: Blue<br>
Quantity: 1<br>
Unit Price: 11099<br>
            ","37");
INSERT INTO tbl_customer_message VALUES("35","mahal nyan sir ","pre bayad ","
Customer Name: Bry<br>
Customer Email: brrryyyy23@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-25 16:04:35<br>
Payment Details: <br><br>
Paid Amount: 54100<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1687709075<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Sasuke Action Figure<br>
Size: Free Size<br>
Color: Blue<br>
Quantity: 90<br>
Unit Price: 600<br>
            ","37");
INSERT INTO tbl_customer_message VALUES("36","ok na sir ","Ok na boss wauit mo na lang shipping ","
Customer Name: Bry<br>
Customer Email: brrryyyy23@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-25 16:04:35<br>
Payment Details: <br><br>
Paid Amount: 54100<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687709075<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Sasuke Action Figure<br>
Size: Free Size<br>
Color: Blue<br>
Quantity: 90<br>
Unit Price: 600<br>
            ","37");
INSERT INTO tbl_customer_message VALUES("37","Sir bayad bayad din","Bayad na sir","
Customer Name: Rafael Amamato<br>
Customer Email: senseikazuma9@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-06-26 11:01:33<br>
Payment Details: <br><br>
Paid Amount: 700<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687777293<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Sasuke Action Figure<br>
Size: Free Size<br>
Color: Blue<br>
Quantity: 1<br>
Unit Price: 600<br>
            ","47");
INSERT INTO tbl_customer_message VALUES("38","Send payment","Hoy bayad na","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-05-23 10:53:12<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 1176<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1684864392<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: LED Smart Bulbs<br>
Size: 24 Plus<br>
Color: White<br>
Quantity: 4<br>
Unit Price: 269<br>
            ","11");
INSERT INTO tbl_customer_message VALUES("39","Send payment","Sir bayad nyo po bago ko iprocess","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-06-22 06:06:17<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 989<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687413977<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","24");
INSERT INTO tbl_customer_message VALUES("40","Send payment","Sir bayad nyo po bago ko iprocess","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-06-22 06:06:17<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 989<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687413977<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","24");
INSERT INTO tbl_customer_message VALUES("41","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 06:17:55<br>
Payment Details: <br><br>
Paid Amount: 3900<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687587475<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: One Size for All<br>
Color: Red<br>
Quantity: 2<br>
Unit Price: 1900<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("42","Send payment","Hey bayad panot","
Customer Name: Steven Duran<br>
Customer Email: stevenwilliamduran@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-29 08:28:48<br>
Payment Details: <br><br>
Paid Amount: 989<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1688027328<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: <br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","35");
INSERT INTO tbl_customer_message VALUES("43","Send payment","Please send your payment to process your order","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 06:17:55<br>
Payment Details: <br><br>
Paid Amount: 3900<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687587475<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: One Size for All<br>
Color: Red<br>
Quantity: 2<br>
Unit Price: 1900<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("44","Send payment","Send payment to process your order","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: PayPal<br>
Payment Date: 2023-06-22 06:06:17<br>
Payment Details: <br>
Transaction Id: <br>
        		<br>
Paid Amount: 989<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1687413977<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: S<br>
Color: Black<br>
Quantity: 1<br>
Unit Price: 889<br>
            ","24");
INSERT INTO tbl_customer_message VALUES("45","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("46","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("47","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("48","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("49","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("50","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("51","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("52","","","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("53","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("54","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("55","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("56","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("57","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("58","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("59","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("60","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("61","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("62","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("63","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("64","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("65","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("66","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("67","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("68","Send payment","Send payment","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-05 13:25:25<br>
Payment Details: <br><br>
Paid Amount: 190<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1688563525<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 liter<br>
Color: Rainbow<br>
Quantity: 1<br>
Unit Price: 90.00<br>
            ","91");
INSERT INTO tbl_customer_message VALUES("69","Send payment to process your order","Good day","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-13 19:24:31<br>
Payment Details: <br><br>
Paid Amount: 2000<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689276271<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: <br>
Color: <br>
Quantity: 1<br>
Unit Price: 1900<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("70","Send payment","payment ","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-14 15:01:46<br>
Payment Details: <br><br>
Paid Amount: 1878<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689346906<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Hand Drill<br>
Size: <br>
Color: <br>
Quantity: 2<br>
Unit Price: 889.00<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("71","Order Placement Successful!","Order Placement Successful!","
Customer Name: Juan Dela Cruz<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-07-15 13:24:48<br>
Payment Details: <br><br>
Paid Amount: 16849<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689427488<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: EAGLE EID-519 IMPACT DRILL 600W 13MM 220V<br>
Size: Free Size<br>
Color: Red<br>
Quantity: 1<br>
Unit Price: 1950.00<br>
            
<br><b><u>Product Item 2</u></b><br>
Product Name: EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM<br>
Size: Free Size<br>
Color: Orange<br>
Quantity: 1<br>
Unit Price: 3700<br>
            
<br><b><u>Product Item 3</u></b><br>
Product Name: BOSCH ROTARY HAMMER GBH 180-LI<br>
Size: Free Size<br>
Color: Blue<br>
Quantity: 1<br>
Unit Price: 11099.00<br>
            ","45");
INSERT INTO tbl_customer_message VALUES("72","PAYMENT RECEIVED","PAYMENT RECEIVED","
Customer Name: Jovan Talagtag<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-06-24 05:22:53<br>
Payment Details: <br><br>
Paid Amount: 4900<br>
Payment Status: Completed<br>
Shipping Status: Completed<br>
Payment Id: 1687584173<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Ingco Rotary Sander 320W<br>
Size: One Size for All<br>
Color: Yellow<br>
Quantity: 1<br>
Unit Price: 4800<br>
            ","31");
INSERT INTO tbl_customer_message VALUES("73","PAYMENT RECEIVED","PAYMENT RECEIVED","
Customer Name: Steven William<br>
Customer Email: duranstan300@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-19 14:29:24<br>
Payment Details: <br><br>
Paid Amount: 2020<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689776964<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: First Alert Pro Series 5 lb Fire Extinguisher<br>
Size: <br>
Color: <br>
Quantity: 1<br>
Unit Price: 1900<br>
            ","99");
INSERT INTO tbl_customer_message VALUES("74","Send payment","Please send your payment to process your order","
Customer Name: Steven Duran<br>
Customer Email: stevenduran@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-07-21 03:31:12<br>
Payment Details: <br><br>
Paid Amount: 500<br>
Payment Status: Completed<br>
Shipping Status: Pending<br>
Payment Id: 1689910272<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 Liter<br>
Color: Rainbow<br>
Quantity: 5<br>
Unit Price: 90.00<br>
            ","12");
INSERT INTO tbl_customer_message VALUES("75","PAYMENT ISSUE","PAYMENT UNSUCESSFULLY ","
Customer Name: Steven William1<br>
Customer Email: duranstevenwilliam.pdm@gmail.com<br>
Payment Method: Cash on Pickup<br>
Payment Date: 2023-07-21 14:04:55<br>
Payment Details: <br><br>
Paid Amount: 1617<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689948295<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Rainbow Paint<br>
Size: 1 Liter<br>
Color: Rainbow<br>
Quantity: 3<br>
Unit Price: 499<br>
            ","100");
INSERT INTO tbl_customer_message VALUES("76","Send payment","Please proceed to payment","
Customer Name: Steven William<br>
Customer Email: duranstan300@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-22 02:49:08<br>
Payment Details: <br><br>
Paid Amount: 10100<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1689994148<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Impact Drill<br>
Size: Standard <br>
Color: Blue<br>
Quantity: 10<br>
Unit Price: 1000<br>
            ","99");
INSERT INTO tbl_customer_message VALUES("77","Send payment","Send payment","
Customer Name: Emraida<br>
Customer Email: jovantalagtag08@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-07-26 02:57:06<br>
Payment Details: <br><br>
Paid Amount: 41070<br>
Payment Status: Pending<br>
Shipping Status: Pending<br>
Payment Id: 1690340226<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Wera 932/918/6 Workshop Screwdriver set 6-piece<br>
Size: 6 pieces Set<br>
Color: Black<br>
Quantity: 80<br>
Unit Price: 200<br>
            
<br><b><u>Product Item 2</u></b><br>
Product Name: Boysen Patching Compound<br>
Size: 100 ML<br>
Color: White<br>
Quantity: 50<br>
Unit Price: 500<br>
            ","104");
INSERT INTO tbl_customer_message VALUES("78","hello","sample","
Customer Name: Rafael<br>
Customer Email: rfaelamamato07@gmail.com<br>
Payment Method: Cash on Delivery<br>
Payment Date: 2023-10-09 22:22:30<br>
Payment Details: <br><br>
Paid Amount: 9900<br>
Order Status: Accepted<br>
Payment Status: Cash on Delivery<br>
Shipping Status: Shipped Out<br>
Payment Id: 1696861350<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Wera 932/918/6 Workshop Screwdriver set 6-piece<br>
Size: 6 pieces Set<br>
Color: Yellow<br>
Quantity: 5<br>
Unit Price: 600.00<br>
            
<br><b><u>Product Item 2</u></b><br>
Product Name: Ingco Inverter MMA Welding Machine 220A<br>
Size: Free Size<br>
Color: Orange<br>
Quantity: 1<br>
Unit Price: 6800<br>
            ","114");
INSERT INTO tbl_customer_message VALUES("79","Order has been Completed","Thankyou","
Customer Name: Jovan<br>
Customer Email: jovantalagtag14@gmail.com<br>
Payment Method: GCash<br>
Payment Date: 2023-11-18 15:40:34<br>
Payment Details: <br><br>
Paid Amount: 6070<br>
Order Status: Accepted.<br>
Payment Status: Paid<br>
Shipping Status: Shipped Out<br>
Payment Id: 1700293234<br>
            
<br><b><u>Product Item 1</u></b><br>
Product Name: Wera 932/918/6 Workshop Screwdriver set 6-piece<br>
Size: 6 pieces Set<br>
Color: Yellow<br>
Quantity: 2<br>
Unit Price: 600<br>
            
<br><b><u>Product Item 2</u></b><br>
Product Name: Makita Cordless Impact<br>
Size: Standard <br>
Color: Blue<br>
Quantity: 5<br>
Unit Price: 600<br>
            ","45");



CREATE TABLE `tbl_delivery_status` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_status` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tbl_delivery_status VALUES("1","For Delivery");



CREATE TABLE `tbl_discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_name` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_discount VALUES("1","Senior and PWD Discount","20");
INSERT INTO tbl_discount VALUES("2","5% Discount","5");
INSERT INTO tbl_discount VALUES("3","10% Discount","10");
INSERT INTO tbl_discount VALUES("4","15% Discount","15");
INSERT INTO tbl_discount VALUES("5","20% Discount","20");
INSERT INTO tbl_discount VALUES("6","25% Discount","25");
INSERT INTO tbl_discount VALUES("7","30% Discount","30");
INSERT INTO tbl_discount VALUES("8","40% Discount","40");
INSERT INTO tbl_discount VALUES("9","45% Discount","45");
INSERT INTO tbl_discount VALUES("10","50% Discount","50");
INSERT INTO tbl_discount VALUES("11","75% Discount","75");



CREATE TABLE `tbl_end_category` (
  `ecat_id` int(11) NOT NULL AUTO_INCREMENT,
  `ecat_name` varchar(255) NOT NULL,
  `mcat_id` int(11) NOT NULL,
  PRIMARY KEY (`ecat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_end_category VALUES("1","Prevent Oil Migration","1");
INSERT INTO tbl_end_category VALUES("2","Non-Slip or Anti-Skid","1");
INSERT INTO tbl_end_category VALUES("3","Nucleation","1");
INSERT INTO tbl_end_category VALUES("4","Mar Abrasion-Scratch Resistance","2");
INSERT INTO tbl_end_category VALUES("5","Lowers Melt Temperature","2");
INSERT INTO tbl_end_category VALUES("6","Lower Temperature Applications","3");
INSERT INTO tbl_end_category VALUES("7","Low Temperature Adhesion","3");
INSERT INTO tbl_end_category VALUES("8","Indirect Food Contact","4");
INSERT INTO tbl_end_category VALUES("9","Increase Tack","4");
INSERT INTO tbl_end_category VALUES("11","BR bulged reflector","2");
INSERT INTO tbl_end_category VALUES("12","Increase Heat Resistance","6");
INSERT INTO tbl_end_category VALUES("13","Reflector","6");
INSERT INTO tbl_end_category VALUES("14","Improves Gloss","7");
INSERT INTO tbl_end_category VALUES("15","Improves Metal Release","7");
INSERT INTO tbl_end_category VALUES("16","Improves Slip","8");
INSERT INTO tbl_end_category VALUES("17","Improves Rub","8");
INSERT INTO tbl_end_category VALUES("18","Improves Gloss","8");
INSERT INTO tbl_end_category VALUES("19","Improves Extrusion Output","8");
INSERT INTO tbl_end_category VALUES("20","Improves External Lubrication","9");
INSERT INTO tbl_end_category VALUES("21","Improved Release","9");
INSERT INTO tbl_end_category VALUES("22","Improved Release","9");
INSERT INTO tbl_end_category VALUES("23","High Clarity Applications","9");
INSERT INTO tbl_end_category VALUES("24","Gloss Control","9");
INSERT INTO tbl_end_category VALUES("25","Fusion Time Speeds","2");
INSERT INTO tbl_end_category VALUES("26","Fusion Time Delay","10");
INSERT INTO tbl_end_category VALUES("27","FT Replacement","10");
INSERT INTO tbl_end_category VALUES("28","FT Placement","11");
INSERT INTO tbl_end_category VALUES("29","Fischer-Tropsch Wax Extender","11");
INSERT INTO tbl_end_category VALUES("30","Filler-Pigment Dispersion","12");
INSERT INTO tbl_end_category VALUES("31","Filler-Pigment Dispersion","12");
INSERT INTO tbl_end_category VALUES("32","Filler Dispersion","7");
INSERT INTO tbl_end_category VALUES("33","Decreases Die Pressure","7");
INSERT INTO tbl_end_category VALUES("34","Coupling Agent","7");
INSERT INTO tbl_end_category VALUES("35","Compatibilizer","7");
INSERT INTO tbl_end_category VALUES("36","Boost Adhesion","7");
INSERT INTO tbl_end_category VALUES("37","Anti-Blocking","7");
INSERT INTO tbl_end_category VALUES("38","Paints and Coating Products","7");
INSERT INTO tbl_end_category VALUES("39","Five-pin socket","3");
INSERT INTO tbl_end_category VALUES("40","Two-pin sockets","3");
INSERT INTO tbl_end_category VALUES("41","Bell Push Switches","3");
INSERT INTO tbl_end_category VALUES("42","PAR38","4");
INSERT INTO tbl_end_category VALUES("43","Three-pin sockets","3");
INSERT INTO tbl_end_category VALUES("44","Two-Way/Intermediate Switches","3");
INSERT INTO tbl_end_category VALUES("45","Double Pole Switches","3");
INSERT INTO tbl_end_category VALUES("46","Single Pole Switches","3");
INSERT INTO tbl_end_category VALUES("47","R50","4");
INSERT INTO tbl_end_category VALUES("48","B15 (Small Bayonet)","4");
INSERT INTO tbl_end_category VALUES("49","E14 (Small Edison Screw)","4");
INSERT INTO tbl_end_category VALUES("50","Basic Floodlight","6");
INSERT INTO tbl_end_category VALUES("51","Rechargable Flood light","6");
INSERT INTO tbl_end_category VALUES("52","Electrodeless induction floodligh","6");
INSERT INTO tbl_end_category VALUES("53","Halogen floodlight","6");
INSERT INTO tbl_end_category VALUES("54","LED floodlights","6");
INSERT INTO tbl_end_category VALUES("55","Metal halide floodlight","6");
INSERT INTO tbl_end_category VALUES("56","Sealey Tools","2");
INSERT INTO tbl_end_category VALUES("57","Draper Tools","1");
INSERT INTO tbl_end_category VALUES("58","Faithfull Tools","1");
INSERT INTO tbl_end_category VALUES("59","Other Accessories","1");
INSERT INTO tbl_end_category VALUES("60","E27 (Edison Screw)","4");
INSERT INTO tbl_end_category VALUES("61","Colored cement","14");
INSERT INTO tbl_end_category VALUES("62","High Alumina Cement","14");
INSERT INTO tbl_end_category VALUES("63","Blast Furnace Slag Cement","14");
INSERT INTO tbl_end_category VALUES("64","Sulfates resisting cement","14");
INSERT INTO tbl_end_category VALUES("65","Low Heat Cement","14");
INSERT INTO tbl_end_category VALUES("66","Quick setting cement","14");
INSERT INTO tbl_end_category VALUES("67","Rapid Hardening Cement","15");
INSERT INTO tbl_end_category VALUES("68","Ordinary Portland Cement","15");
INSERT INTO tbl_end_category VALUES("69","Moderate heat of hydration","15");
INSERT INTO tbl_end_category VALUES("70","High sulfate resistance","15");
INSERT INTO tbl_end_category VALUES("71","Moderate Sulfate Resistance","15");
INSERT INTO tbl_end_category VALUES("72","Ternary blended cement ","15");
INSERT INTO tbl_end_category VALUES("73","Portland-slag cement","16");
INSERT INTO tbl_end_category VALUES("74","Portland-pozzolana cement","16");
INSERT INTO tbl_end_category VALUES("75","Portland-limestone cement","16");
INSERT INTO tbl_end_category VALUES("76","Metal Concrete Floor Hardener","16");
INSERT INTO tbl_end_category VALUES("77","Pre Mix Concrete","17");
INSERT INTO tbl_end_category VALUES("78","Cement Waterproofing Compound","17");
INSERT INTO tbl_end_category VALUES("79","Eagle Cement","17");
INSERT INTO tbl_end_category VALUES("80","impact Drill","27");
INSERT INTO tbl_end_category VALUES("81","Screw Drivers Set","28");
INSERT INTO tbl_end_category VALUES("82","Impact","29");
INSERT INTO tbl_end_category VALUES("83","French Hammer","24");



CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_faq VALUES("6","How to Download Standly Hardware Mobile Application?","<p></p><h5 style="box-sizing: inherit; line-height: 1.4; margin: 0.2rem 0px 0.5rem; text-rendering: optimizelegibility; padding: 0px;"><font color="#222222" face="opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif"><span style="font-size: 15.7143px;"><span style="font-family: " times="" new="" roman";"=""><b>STEP 1: CLICK THE LINK BELOW TO DOWNLOAD THE APPLICATION.&nbsp;</b></span></span></font></h5><h5 style="box-sizing: inherit; line-height: 1.4; margin: 0.2rem 0px 0.5rem; text-rendering: optimizelegibility; padding: 0px;"><a href="https://standlyhardware.com/Standly Hardware.apk" target="_blank">STANDLYHARDWARE/DOWNLOAD/APK</a><br></h5><h5 style="box-sizing: inherit; line-height: 1.4; color: rgb(0, 0, 0); margin: 0.2rem 0px 0.5rem; text-rendering: optimizelegibility; padding: 0px;"><font color="#222222" face="opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif"><span style="font-size: 15.7143px;"><span times="" new="" roman";"=""><span style="font-weight: 700;">STEP 2: AFTER YOU DOWNLOAD IT, INSTALL IT ON YOUR MOBILE PHONE AND SHOP NOW!&nbsp;</span></span></span></font></h5><p></p><p></p><h3 style="box-sizing: inherit; line-height: 1.4; margin: 0.2rem 0px 0.5rem; text-rendering: optimizelegibility; padding: 0px;"><br></h3><p></p>");
INSERT INTO tbl_faq VALUES("7","Standly Hardware open hours days?","<p><span style="color: rgb(10, 10, 10);"><b>Standly Hardware</b> is open from Monday to Saturday, 8:00 AM to 5:00 PM.</span><br></p>");
INSERT INTO tbl_faq VALUES("8","Standly Hardware located at?","<p><span style="font-weight: 700;">Standly Hardware Store</span> are located at GML Commercial Building, Mc Arthur Highway, Saluysoy, Meycauayan Bulacan<br></p>");



CREATE TABLE `tbl_language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(255) NOT NULL,
  `lang_value` text NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_language VALUES("1","Currency","Php");
INSERT INTO tbl_language VALUES("2","Search Product","Search Product");
INSERT INTO tbl_language VALUES("3","Search","Search");
INSERT INTO tbl_language VALUES("4","Submit","Submit");
INSERT INTO tbl_language VALUES("5","Update","Update");
INSERT INTO tbl_language VALUES("6","Read More","Read More");
INSERT INTO tbl_language VALUES("7","Serial","Serial");
INSERT INTO tbl_language VALUES("8","Photo","Photo");
INSERT INTO tbl_language VALUES("9","Login","Login");
INSERT INTO tbl_language VALUES("10","Customer Login","Customer Login");
INSERT INTO tbl_language VALUES("11","Click here to login","Click here to login");
INSERT INTO tbl_language VALUES("12","Back to Login Page","Back to Login Page");
INSERT INTO tbl_language VALUES("13","Logged in as","Logged in as");
INSERT INTO tbl_language VALUES("14","Logout","Logout");
INSERT INTO tbl_language VALUES("15","Register","Register");
INSERT INTO tbl_language VALUES("16","Customer Registration","Customer Registration");
INSERT INTO tbl_language VALUES("17","Registration Successful","Registration Successful");
INSERT INTO tbl_language VALUES("18","Cart","Cart");
INSERT INTO tbl_language VALUES("19","View Cart","View Cart");
INSERT INTO tbl_language VALUES("20","Update Cart","Update Cart");
INSERT INTO tbl_language VALUES("21","Back to Cart","Back to Cart");
INSERT INTO tbl_language VALUES("22","Checkout","Checkout");
INSERT INTO tbl_language VALUES("23","Proceed to Checkout","Proceed to Checkout");
INSERT INTO tbl_language VALUES("24","Orders","Orders");
INSERT INTO tbl_language VALUES("25","Order History","Order History");
INSERT INTO tbl_language VALUES("26","Order Details","Order Details");
INSERT INTO tbl_language VALUES("27","Payment Date and Time","Payment Date and Time");
INSERT INTO tbl_language VALUES("28","Transaction ID","Transaction ID");
INSERT INTO tbl_language VALUES("29","Paid Amount","Paid Amount");
INSERT INTO tbl_language VALUES("30","Payment Status","Payment Status");
INSERT INTO tbl_language VALUES("31","Payment Method","Payment Method");
INSERT INTO tbl_language VALUES("32","Payment ID","Payment ID");
INSERT INTO tbl_language VALUES("33","Payment Section","Payment Section");
INSERT INTO tbl_language VALUES("34","Select Payment Method","Select Payment Method");
INSERT INTO tbl_language VALUES("35","Select a Method","Select a Method");
INSERT INTO tbl_language VALUES("36","PayPal","PayPal");
INSERT INTO tbl_language VALUES("37","Stripe","Stripe");
INSERT INTO tbl_language VALUES("38","Bank Deposit","Bank Deposit");
INSERT INTO tbl_language VALUES("39","Card Number","Card Number");
INSERT INTO tbl_language VALUES("40","CVV","CVV");
INSERT INTO tbl_language VALUES("41","Month","Month");
INSERT INTO tbl_language VALUES("42","Year","Year");
INSERT INTO tbl_language VALUES("43","Send to this Details","Send to this Details");
INSERT INTO tbl_language VALUES("44","Transaction Information","Transaction Information");
INSERT INTO tbl_language VALUES("45","Include transaction id and other information correctly","Include transaction id and other information correctly");
INSERT INTO tbl_language VALUES("46","Pay Now","Pay Now");
INSERT INTO tbl_language VALUES("47","Product Name","Product Name");
INSERT INTO tbl_language VALUES("48","Product Details","Product Details");
INSERT INTO tbl_language VALUES("49","Categories","Categories");
INSERT INTO tbl_language VALUES("50","Category:","Category:");
INSERT INTO tbl_language VALUES("51","All Products Under","All Products Under");
INSERT INTO tbl_language VALUES("52","Select Size","Select Size");
INSERT INTO tbl_language VALUES("53","Select Color","Select Color");
INSERT INTO tbl_language VALUES("54","Product Price","Product Price");
INSERT INTO tbl_language VALUES("55","Quantity","Quantity");
INSERT INTO tbl_language VALUES("56","Out of Stock","Out of Stock");
INSERT INTO tbl_language VALUES("57","Share This","Share This");
INSERT INTO tbl_language VALUES("58","Share This Product","Share This Product");
INSERT INTO tbl_language VALUES("59","Product Description","Product Description");
INSERT INTO tbl_language VALUES("60","Features","Features");
INSERT INTO tbl_language VALUES("61","Conditions","Conditions");
INSERT INTO tbl_language VALUES("62","Return Policy","Return Policy");
INSERT INTO tbl_language VALUES("63","Reviews","Reviews");
INSERT INTO tbl_language VALUES("64","Review","Review");
INSERT INTO tbl_language VALUES("65","Give a Review","Give a Review");
INSERT INTO tbl_language VALUES("66","Write your comment (Optional)","Write your comment (Optional)");
INSERT INTO tbl_language VALUES("67","Submit Review","Submit Review");
INSERT INTO tbl_language VALUES("68","You already have given a rating!","You already have given a rating!");
INSERT INTO tbl_language VALUES("69","You must have to login to give a review","You must have to login to give a review");
INSERT INTO tbl_language VALUES("70","No description found","No description found");
INSERT INTO tbl_language VALUES("71","No feature found","No feature found");
INSERT INTO tbl_language VALUES("72","No condition found","No condition found");
INSERT INTO tbl_language VALUES("73","No return policy found","No return policy found");
INSERT INTO tbl_language VALUES("74","Review not found","Review not found");
INSERT INTO tbl_language VALUES("75","Customer Name","Customer Name");
INSERT INTO tbl_language VALUES("76","Comment","Comment");
INSERT INTO tbl_language VALUES("77","Comments","Comments");
INSERT INTO tbl_language VALUES("78","Rating","Rating");
INSERT INTO tbl_language VALUES("79","Previous","Previous");
INSERT INTO tbl_language VALUES("80","Next","Next");
INSERT INTO tbl_language VALUES("81","Sub Total","Sub Total");
INSERT INTO tbl_language VALUES("82","Total","Total");
INSERT INTO tbl_language VALUES("83","Action","Action");
INSERT INTO tbl_language VALUES("84","Shipping Cost","Shipping Cost");
INSERT INTO tbl_language VALUES("85","Continue Shopping","Continue Shopping");
INSERT INTO tbl_language VALUES("86","Update Billing Address","Update Billing Address");
INSERT INTO tbl_language VALUES("87","Update Shipping Address","Update Shipping Address");
INSERT INTO tbl_language VALUES("88","Update Billing and Shipping Info","Update Billing and Shipping Info");
INSERT INTO tbl_language VALUES("89","Dashboard","Dashboard");
INSERT INTO tbl_language VALUES("90","Welcome to the Dashboard","Welcome to the Dashboard");
INSERT INTO tbl_language VALUES("91","Back to Dashboard","Back to Dashboard");
INSERT INTO tbl_language VALUES("92","Subscribe","Subscribe");
INSERT INTO tbl_language VALUES("93","Subscribe To Our Newsletter","Subscribe To Our Newsletter");
INSERT INTO tbl_language VALUES("94","Email Address","Email Address");
INSERT INTO tbl_language VALUES("95","Enter Your Email Address","Enter Your Email Address");
INSERT INTO tbl_language VALUES("96","Password","Password");
INSERT INTO tbl_language VALUES("97","Forget Password","Forget Password");
INSERT INTO tbl_language VALUES("98","Retype Password","Retype Password");
INSERT INTO tbl_language VALUES("99","Update Password","Update Password");
INSERT INTO tbl_language VALUES("100","New Password","New Password");
INSERT INTO tbl_language VALUES("101","Retype New Password","Retype New Password");
INSERT INTO tbl_language VALUES("102","First Name","First Name");
INSERT INTO tbl_language VALUES("103","Last Name","Last Name");
INSERT INTO tbl_language VALUES("104","Phone Number","Phone Number");
INSERT INTO tbl_language VALUES("105","Address","Address");
INSERT INTO tbl_language VALUES("106","Country","Country");
INSERT INTO tbl_language VALUES("107","City","City");
INSERT INTO tbl_language VALUES("108","Province","Province");
INSERT INTO tbl_language VALUES("109","Zip Code","Zip Code");
INSERT INTO tbl_language VALUES("110","About Us","About Us");
INSERT INTO tbl_language VALUES("111","Featured Posts","Featured Posts");
INSERT INTO tbl_language VALUES("112","Popular Posts","Popular Posts");
INSERT INTO tbl_language VALUES("113","Recent Posts","Recent Posts");
INSERT INTO tbl_language VALUES("114","Contact Information","Contact Information");
INSERT INTO tbl_language VALUES("115","Contact Form","Contact Form");
INSERT INTO tbl_language VALUES("116","Our Office","Our Office");
INSERT INTO tbl_language VALUES("117","Update Profile","Update Profile");
INSERT INTO tbl_language VALUES("118","Send Message","Send Message");
INSERT INTO tbl_language VALUES("119","Message","Message");
INSERT INTO tbl_language VALUES("120","Find Us On Map","Find Us On Map");
INSERT INTO tbl_language VALUES("121","Congratulation! Payment is successful.","Congratulation! Payment is successful.");
INSERT INTO tbl_language VALUES("122","Billing and Shipping Information is updated successfully.","Billing and Shipping Information is updated successfully.");
INSERT INTO tbl_language VALUES("123","Customer Name can not be empty.","Customer Name can not be empty.");
INSERT INTO tbl_language VALUES("124","Phone Number can not be empty.","Phone Number can not be empty.");
INSERT INTO tbl_language VALUES("125","Address can not be empty.","Address can not be empty.");
INSERT INTO tbl_language VALUES("126","You must have to select a country.","You must have to select a country.");
INSERT INTO tbl_language VALUES("127","City can not be empty.","City can not be empty.");
INSERT INTO tbl_language VALUES("128","Province can not be empty."," Province can not be empty.");
INSERT INTO tbl_language VALUES("129","Zip Code can not be empty.","Zip Code can not be empty.");
INSERT INTO tbl_language VALUES("130","Profile Information is updated successfully.","Profile Information is updated successfully.");
INSERT INTO tbl_language VALUES("131","Email Address can not be empty","Email Address can not be empty");
INSERT INTO tbl_language VALUES("132","Email and/or Password can not be empty.","Email and/or Password can not be empty.");
INSERT INTO tbl_language VALUES("133","Email Address and Password is incorrect.","Email Address and Password is incorrect.");
INSERT INTO tbl_language VALUES("134","Email address must be valid.","Email address must be valid.");
INSERT INTO tbl_language VALUES("135","You email address is not found in our system.","You email address is not found in our system.");
INSERT INTO tbl_language VALUES("136","Please check your email and confirm your subscription.","Please check your email and confirm your subscription.");
INSERT INTO tbl_language VALUES("137","Your email is verified successfully. You can now login to our website.","Your email is verified successfully. You can now login to our website.");
INSERT INTO tbl_language VALUES("138","Password can not be empty.","Password can not be empty.");
INSERT INTO tbl_language VALUES("139","Passwords do not match.","Passwords do not match.");
INSERT INTO tbl_language VALUES("140","Please enter new and retype passwords.","Please enter new and retype passwords.");
INSERT INTO tbl_language VALUES("141","Password is updated successfully.","Password is updated successfully.");
INSERT INTO tbl_language VALUES("142","To reset your password, please click on the link below.","To reset your password, please click on the link below.");
INSERT INTO tbl_language VALUES("143","PASSWORD RESET REQUEST - YOUR WEBSITE.COM","PASSWORD RESET REQUEST - YOUR WEBSITE.COM");
INSERT INTO tbl_language VALUES("144","The password reset email time (24 hours) has expired. Please again try to reset your password.","The password reset email time (24 hours) has expired. Please again try to reset your password.");
INSERT INTO tbl_language VALUES("145","A confirmation link is sent to your email address. You will get the password reset information in there.","A confirmation link is sent to your email address. You will get the password reset information in there.");
INSERT INTO tbl_language VALUES("146","Password is reset successfully. You can now login.","Password is reset successfully. You can now login.");
INSERT INTO tbl_language VALUES("147","Email Address Already Exists","Email Address Already Exists.");
INSERT INTO tbl_language VALUES("148","Sorry! Your account is inactive. Please contact to the administrator.","Sorry! Your account is inactive. Please contact to the administrator.");
INSERT INTO tbl_language VALUES("149","Change Password","Change Password");
INSERT INTO tbl_language VALUES("150","Registration Email Confirmation for YOUR WEBSITE","Registration Email Confirmation for YOUR WEBSITE.");
INSERT INTO tbl_language VALUES("151","Thank you for your registration! Your account has been created. To active your account click on the link below:","Thank you for your registration! Your account has been created. To active your account click on the link below:");
INSERT INTO tbl_language VALUES("152","Your registration is completed. Please check your email address to follow the process to confirm your registration.","Your registration is completed. Please check your email address to follow the process to confirm your registration.");
INSERT INTO tbl_language VALUES("153","No Product Found","No Product Found");
INSERT INTO tbl_language VALUES("154","Add to Cart","Add to Cart");
INSERT INTO tbl_language VALUES("155","Related Products","Related Products");
INSERT INTO tbl_language VALUES("156","See all related products from below","See all the related products from below");
INSERT INTO tbl_language VALUES("157","Size","Size");
INSERT INTO tbl_language VALUES("158","Color","Color");
INSERT INTO tbl_language VALUES("159","Price","Price");
INSERT INTO tbl_language VALUES("160","Please login as customer to checkout","Please login as customer to checkout");
INSERT INTO tbl_language VALUES("161","Billing Address","Billing Address");
INSERT INTO tbl_language VALUES("162","Shipping Address","Shipping Address");
INSERT INTO tbl_language VALUES("163","Rating is Submitted Successfully!","Rating is Submitted Successfully!");
INSERT INTO tbl_language VALUES("0","Peso","'?");
INSERT INTO tbl_language VALUES("165","Select Unit of Measurement","Select Unit of Measurement");



CREATE TABLE `tbl_mid_category` (
  `mcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcat_name` varchar(255) NOT NULL,
  `tcat_id` int(11) NOT NULL,
  PRIMARY KEY (`mcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_mid_category VALUES("1","Pry bars & Nail pullers","1");
INSERT INTO tbl_mid_category VALUES("2","Leveling & Squares","1");
INSERT INTO tbl_mid_category VALUES("3","Switches And Sockets","2");
INSERT INTO tbl_mid_category VALUES("4","LED Bulbs","2");
INSERT INTO tbl_mid_category VALUES("6","Flood Lights","2");
INSERT INTO tbl_mid_category VALUES("7","Polyurethane Paint","3");
INSERT INTO tbl_mid_category VALUES("8","Asphalt Anticorrosive Paint","3");
INSERT INTO tbl_mid_category VALUES("9","Antistatic Paint","3");
INSERT INTO tbl_mid_category VALUES("10","Acrilic Paint","3");
INSERT INTO tbl_mid_category VALUES("11","Zinc Rich Paint","3");
INSERT INTO tbl_mid_category VALUES("12","Concrete","5");
INSERT INTO tbl_mid_category VALUES("14","Ready Mix Concrete","5");
INSERT INTO tbl_mid_category VALUES("15","Concrete Hollow Block","5");
INSERT INTO tbl_mid_category VALUES("16","Cement","5");
INSERT INTO tbl_mid_category VALUES("17","Aggregates","5");
INSERT INTO tbl_mid_category VALUES("18","Solar Lights","2");
INSERT INTO tbl_mid_category VALUES("19","Gypsum Board","4");
INSERT INTO tbl_mid_category VALUES("20","Phenolic Board","4");
INSERT INTO tbl_mid_category VALUES("21","Fiber Cement Board","4");
INSERT INTO tbl_mid_category VALUES("22","Plywood","4");
INSERT INTO tbl_mid_category VALUES("23","Plyboard","4");
INSERT INTO tbl_mid_category VALUES("24","Hammers","1");
INSERT INTO tbl_mid_category VALUES("25","Marking Tools","1");
INSERT INTO tbl_mid_category VALUES("26","Sledgehammers","1");
INSERT INTO tbl_mid_category VALUES("27","Drill","1");
INSERT INTO tbl_mid_category VALUES("28","Screw Drivers","1");
INSERT INTO tbl_mid_category VALUES("29","Impact Drill","1");
INSERT INTO tbl_mid_category VALUES("30","Wires","2");



CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `photo_receipt` text NOT NULL,
  `date_receipt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_order VALUES("233","130","First Alert Pro Series 5 lb Fire Extinguisher","","","10","600","1700329758","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("250","144","Makita Cordless Impact","Standard ","Blue","3","600","1700427516","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("253","145","Wera 932/918/6 Workshop Screwdriver set 6-piece","6 pieces Set","Yellow","10","600","1700442314","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("260","129","Black & Decker Drill 550 Watts HD555KMPR B1","Standard ","Red","1","3999","1702380397","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("261","113","RAIN OR SHINE TOP WHITE – 4L","1 Liter","White","1","649","1702380627","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("262","104","LED Smart Bulbs","2 Watts","Yellow","1","300","1702388253","","0000-00-00 00:00:00");
INSERT INTO tbl_order VALUES("263","149","Hammer","Standard ","Yellow","1","12","1702395223","","0000-00-00 00:00:00");



CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about_title` varchar(255) NOT NULL,
  `about_content` text NOT NULL,
  `about_banner` varchar(255) NOT NULL,
  `about_meta_title` varchar(255) NOT NULL,
  `about_meta_keyword` text NOT NULL,
  `about_meta_description` text NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_banner` varchar(255) NOT NULL,
  `faq_meta_title` varchar(255) NOT NULL,
  `faq_meta_keyword` text NOT NULL,
  `faq_meta_description` text NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_banner` varchar(255) NOT NULL,
  `blog_meta_title` varchar(255) NOT NULL,
  `blog_meta_keyword` text NOT NULL,
  `blog_meta_description` text NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_banner` varchar(255) NOT NULL,
  `contact_meta_title` varchar(255) NOT NULL,
  `contact_meta_keyword` text NOT NULL,
  `contact_meta_description` text NOT NULL,
  `pgallery_title` varchar(255) NOT NULL,
  `pgallery_banner` varchar(255) NOT NULL,
  `pgallery_meta_title` varchar(255) NOT NULL,
  `pgallery_meta_keyword` text NOT NULL,
  `pgallery_meta_description` text NOT NULL,
  `vgallery_title` varchar(255) NOT NULL,
  `vgallery_banner` varchar(255) NOT NULL,
  `vgallery_meta_title` varchar(255) NOT NULL,
  `vgallery_meta_keyword` text NOT NULL,
  `vgallery_meta_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_page VALUES("1","About Us","<p style="border: 0px solid; margin-top: 1.5rem; margin-bottom: 0px;">Welcome to<b> Standly Hardware</b> located at GML Commercial Building, Mc Arthur Highway, Saluysoy, Meycauayan Bulacan.</p>
","about-banner.jpeg","Standly Hardware Store - About Us","Standly Hardware Store","Standly Hardware Store","FAQ","faq-banner.jpeg","Standly Hardware Store - FAQ","Standly Hardware Store - FAQ","Standly Hardware Store - FAQ","Blog","blog-banner.jpg","Ecommerce - Blog","","","Contact Us","contact-banner.jpeg","Standly Hardware Store - Contact","Standly Hardware Store - Contact ","Standly Hardware Store","Photo Gallery","pgallery-banner.jpg","Ecommerce - Photo Gallery","","","Video Gallery","vgallery-banner.jpg","Ecommerce - Video Gallery","","");



CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_cvv` varchar(10) NOT NULL,
  `card_month` varchar(10) NOT NULL,
  `card_year` varchar(10) NOT NULL,
  `bank_transaction_info` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `order_status` varchar(25) NOT NULL,
  `delivery_status` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `return_status` varchar(25) NOT NULL,
  `reason_id` int(20) NOT NULL,
  `photo_receipt` varchar(255) NOT NULL,
  `date_receipt` varchar(50) NOT NULL,
  `seller_notes` varchar(255) NOT NULL,
  `decline_note` varchar(255) NOT NULL,
  `delivery_id` varchar(50) NOT NULL,
  `order_accept_date` varchar(50) NOT NULL,
  `shipping_date` varchar(50) NOT NULL,
  `pay_date` varchar(50) NOT NULL,
  `pay_accept_date` varchar(50) NOT NULL,
  `decline_payment` varchar(255) NOT NULL,
  `attempt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=274 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_payment VALUES("247","108","Steven William1","swrduran030@gmail.com","2023-11-19 01:49:18","","6000","","","","","Please be careful to my order. Thank you!","Cash on Pickup","Cash on Pickup","Pickup","1700329758","Accepted","Completed","","","0","del-receipt-1700329758.jpg","2023-11-19 01:49:51","","","TRK1700329758","","2023-11-19 01:49:31","","","","0");
INSERT INTO tbl_payment VALUES("262","99","Steven William","duranstan300@gmail.com","2023-11-20 04:58:36","","3100","","","","","Please be careful to my order. Thank you!","GCash","Paid","Shipped Out","1700427516","Accepted.","Completed","payment-1700427516.jpg","","0","del-receipt-1700427516.jpg","2023-11-20 05:34:48","","","TRK1700427516","2023-11-20 05:33:02","2023-11-20 05:33:51","","2023-11-20 05:33:40","","1");
INSERT INTO tbl_payment VALUES("271","144","Jovan","jovantalagtag14@gmail.com","2023-12-12 19:30:27","","699","","","","","Please be careful to my order. Thank you!","Cash on Delivery","Cash on Delivery","Shipped Out","1702380627","Accepted","Completed","","","0","","2023-12-12 19:31:30","","","TRK1702380627","","2023-12-12 19:31:12","","","","0");
INSERT INTO tbl_payment VALUES("265","145","John","mamaiyieee001@gmail.com","2023-11-20 09:05:14","","6060","","","","","Please be careful to my order. Thank you!","Cash on Delivery","Cash on Delivery","Shipped Out","1700442314","Accepted","Completed","","","0","del-receipt-1700442314.jpg","2023-11-20 09:09:41","","","TRK1700442314","","2023-11-20 09:06:58","","","","0");
INSERT INTO tbl_payment VALUES("273","99","Steven William Duran","duranstan300@gmail.com","2023-12-12 23:33:43","","112","","","","","Please be careful to my order. Thank you!","Cash on Delivery","Cash on Delivery","Shipped Out","1702395223","Accepted","Completed","","","0","del-receipt-1702395223.jpg","2023-12-12 23:34:02","","","TRK1702395223","","2023-12-12 23:33:51","","","","0");
INSERT INTO tbl_payment VALUES("272","144","Jovan","jovantalagtag14@gmail.com","2023-12-12 21:37:33","","350","","","","","Please be careful to my order. Thank you!","GCash","Pending","Pending","1702388253","Accepted.","Pending","","","0","","","","","TRK1702388253","2023-12-12 23:31:55","","","","","0");
INSERT INTO tbl_payment VALUES("270","144","Jovan","jovantalagtag14@gmail.com","2023-12-12 19:26:37","","4049","","","","","Please be careful to my order. Thank you!","Cash on Delivery","Cash on Delivery","Shipped Out","1702380397","Accepted","Completed","","","0","","2023-12-12 19:29:39","","","TRK1702380397","","2023-12-12 19:29:13","","","","0");



CREATE TABLE `tbl_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_photo VALUES("1","Photo 1","photo-1.jpg");
INSERT INTO tbl_photo VALUES("2","Photo 2","photo-2.jpg");
INSERT INTO tbl_photo VALUES("3","Photo 3","photo-3.jpg");
INSERT INTO tbl_photo VALUES("4","Photo 4","photo-4.jpg");
INSERT INTO tbl_photo VALUES("5","Photo 5","photo-5.jpg");
INSERT INTO tbl_photo VALUES("6","Photo 6","photo-6.jpg");



CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_post VALUES("1","Cu vel choro exerci pri et oratio iisque","cu-vel-choro-exerci-pri-et-oratio-iisque","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-1.jpg","3","14","Cu vel choro exerci pri et oratio iisque","","");
INSERT INTO tbl_post VALUES("2","Epicurei necessitatibus eu facilisi postulant ","epicurei-necessitatibus-eu-facilisi-postulant-","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-2.jpg","3","6","Epicurei necessitatibus eu facilisi postulant ","","");
INSERT INTO tbl_post VALUES("3","Mei ut errem legimus periculis eos liber","mei-ut-errem-legimus-periculis-eos-liber","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-3.jpg","3","1","Mei ut errem legimus periculis eos liber","","");
INSERT INTO tbl_post VALUES("4","Id pro unum pertinax oportere vel","id-pro-unum-pertinax-oportere-vel","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-4.jpg","4","0","Id pro unum pertinax oportere vel","","");
INSERT INTO tbl_post VALUES("5","Tollit cetero cu usu etiam evertitur","tollit-cetero-cu-usu-etiam-evertitur","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-5.jpg","4","24","Tollit cetero cu usu etiam evertitur","","");
INSERT INTO tbl_post VALUES("6","Omnes ornatus qui et te aeterno","omnes-ornatus-qui-et-te-aeterno","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-6.jpg","4","2","Omnes ornatus qui et te aeterno","","");
INSERT INTO tbl_post VALUES("7","Vix tale noluisse voluptua ad ne","vix-tale-noluisse-voluptua-ad-ne","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-7.jpg","2","0","Vix tale noluisse voluptua ad ne","","");
INSERT INTO tbl_post VALUES("8","Liber utroque vim an ne his brute","liber-utroque-vim-an-ne-his-brute","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-8.jpg","2","12","Liber utroque vim an ne his brute","","");
INSERT INTO tbl_post VALUES("9","Nostrum copiosae argumentum has","nostrum-copiosae-argumentum-has","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-9.jpg","1","12","Nostrum copiosae argumentum has","","");
INSERT INTO tbl_post VALUES("10","An labores explicari qui eu","an-labores-explicari-qui-eu","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-10.jpg","1","4","An labores explicari qui eu","","");
INSERT INTO tbl_post VALUES("11","Lorem ipsum dolor sit amet","lorem-ipsum-dolor-sit-amet","<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>

<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>

<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>

<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>

<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>
","05-09-2017","news-11.jpg","1","18","Lorem ipsum dolor sit amet","","");



CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_old_price` varchar(10) NOT NULL,
  `p_current_price` varchar(10) NOT NULL,
  `p_walkin_price` int(11) NOT NULL,
  `p_sale_price` varchar(11) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `p_featured_photo` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_short_description` text NOT NULL,
  `p_feature` text NOT NULL,
  `p_condition` text NOT NULL,
  `p_return_policy` text NOT NULL,
  `p_total_view` int(11) NOT NULL,
  `p_is_featured` int(1) NOT NULL,
  `p_is_active` int(1) NOT NULL,
  `ecat_id` int(11) NOT NULL,
  `reorder_level` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date_expire` date NOT NULL,
  `date_today` date NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_product VALUES("103","Hand Drill","2000","2999","3299","3199","73","product-featured-103.jpg","<p><b>Hand Drill Hand Drill</b><br></p>","<p>Hand Drill Hand Drill<br></p>","<p>Hand Drill<br></p>","<p>Hand Drill<br></p>","<p>Hand Drill<br></p>","311","1","1","80","20","1","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("104","LED Smart Bulbs","200","300","400","400","39","product-featured-104.jpg","<p><span style="color: rgb(99, 99, 99);"><a href="https://www.ledhut.co.uk/led-bulbs/par38.html" target="_blank" rel="noopener noreferrer" style="background-color: rgb(255, 255, 255); outline: 0px; margin: 0px; transition: color 0.2s ease-in 0s;">The PAR38 is a bulb that kicks-out a lot of lumens</a> (brightness).</span><br></p>","LED lighting is ever-evolving and getting smarter too. Now you can fit your home with 'Smart Bulbs', which are incredibly convenient and versatile, and allow you to remotely manage your lighting through voice-control or from a mobile device. ","<table width="1182" style="margin: 0px; width: 1123.56px; color: rgb(34, 34, 34); font-family: " open="" sans";="" font-size:="" 14px;="" background-color:="" rgb(255,="" 255,="" 255);="" height:="" 229px;"=""><tbody style="margin: 0px;"><tr style="margin: 0px;"><td style="margin: 0px;"><br><h3 style="margin: 0px 0px 15px; font-family: var(--heading-family); font-weight: var(--heading-weight); font-style: var(--heading-style); letter-spacing: var(--heading-spacing); line-height: 1.2; font-size: var(--h3-size);">PAR38</h3><a href="https://www.ledhut.co.uk/led-bulbs/par38.html" target="_blank" rel="noopener noreferrer" style="margin: 0px; color: var(--brand-main); outline: 0px; transition: color 0.2s ease-in 0s;">The PAR38 is a bulb that kicks-out a lot of lumens</a> (brightness). It comes with a screw fitting and is often used for workshops, security and commercial lighting.</td></tr></tbody></table>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br></p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br></p>","706","1","1","48","40","2","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("105","BOSCH ROTARY HAMMER GBH 180-LI","10000","11999","12499","12499","95","product-featured-105.jpg","<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; font-family: Montserrat, sans-serif; font-size: 15px; color: rgb(170, 170, 170);"><li>Product specifications and prices may change without prior notice.</li><li>Product availability varies for each sales channel. Call 11223 for inquiries.</li><li>Actual price may vary per outlet and or per e-commerce portal.</li></ul>","Product specifications and prices may change without prior notice.
Product availability varies for each sales channel. Call 11223 for inquiries.
Actual price may vary per outlet and or per e-commerce portal.","<p><span style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment="1" style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"></p><ul style="margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"><li style="margin-bottom: 10px;">Motor has changeable carbon brushes for easy maintenance</li><li style="margin-bottom: 10px;">Designed with robust housing and battery cell protection</li><li style="margin-bottom: 10px;">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style="margin-bottom: 10px;">Convenient change of accessories - keyless chuck opens and closes easily</li><li style="margin-bottom: 10px;">Variable speed RPM control</li><li style="margin-bottom: 10px;">Comfortable handling with Soft Grip technology</li><li style="margin-bottom: 0px;">Ideal for metal and woodworking</li></ul>","<p><span style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment="1" style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"></p><ul style="margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"><li style="margin-bottom: 10px;">Motor has changeable carbon brushes for easy maintenance</li><li style="margin-bottom: 10px;">Designed with robust housing and battery cell protection</li><li style="margin-bottom: 10px;">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style="margin-bottom: 10px;">Convenient change of accessories - keyless chuck opens and closes easily</li><li style="margin-bottom: 10px;">Variable speed RPM control</li><li style="margin-bottom: 10px;">Comfortable handling with Soft Grip technology</li><li style="margin-bottom: 0px;">Ideal for metal and woodworking</li></ul>","<p><span style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment="1" style="color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"></p><ul style="margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;"><li style="margin-bottom: 10px;">Motor has changeable carbon brushes for easy maintenance</li><li style="margin-bottom: 10px;">Designed with robust housing and battery cell protection</li><li style="margin-bottom: 10px;">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style="margin-bottom: 10px;">Convenient change of accessories - keyless chuck opens and closes easily</li><li style="margin-bottom: 10px;">Variable speed RPM control</li><li style="margin-bottom: 10px;">Comfortable handling with Soft Grip technology</li><li style="margin-bottom: 0px;">Ideal for metal and woodworking</li></ul>","835","1","1","2","10","3","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("106","BN015C","250","399","499","499","50","product-featured-106.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 16W, 8W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 1600, 800 </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 6500</span></font><br></p>","BRAND Philips

POWER (W) 16W, 8W

LUM. FLUX (LM) 1600, 800

CCT (K) 6500","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 16W, 8W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 1600, 800</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 6500</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","238","1","1","47","30","1","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("107","TCH086 1XTL5","550","699","799","799","83","product-featured-107.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 14W, 21W, 28W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 4000, 6500</span></font><br></p>","BRAND Philips

POWER (W) 14W, 21W, 28W

CCT (K) 3000, 4000, 6500","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 14W, 21W, 28W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 4000, 6500</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","125","1","1","47","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("108","BN068C LED G2","500","699","799","799","50","product-featured-108.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 14W, 21W, 28W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 4000, 6500</span></font><br></p>","BRAND Philips

POWER (W) 14W, 21W, 28W

CCT (K) 3000, 4000, 6500","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 14W, 21W, 28W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 4000, 6500</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","103","1","1","47","30","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("109","Boysen Acqua Epoxy Reducer","550","679","779","779","2","product-featured-109.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNITGallon</span></font><br></p>","BRAND Boysen

UNITGallon","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNITGallon</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","142","1","1","38","20","4","2023-12-05","0000-00-00");
INSERT INTO tbl_product VALUES("110","Boysen Lacquer Primer Surfacer","250","350","399","399","0","product-featured-110.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Gallon, Liter</span></font><br></p>","BRAND Boysen

UNIT Gallon, Liter","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Gallon, Liter</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","135","1","1","18","20","4","0000-00-00","2023-10-01");
INSERT INTO tbl_product VALUES("111","Boysen Patching Compound","400","500","699","699","5","product-featured-111.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Kilo, Sack</span></font><br></p>","BRAND Boysen

UNIT Kilo, Sack","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Kilo, Sack</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","63","0","0","35","20","4","2023-11-01","0000-00-00");
INSERT INTO tbl_product VALUES("112","Boysen Plexibond Textile Finish","800","999","1099","1099","0","product-featured-112.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Gallon, Tin</span></font><br></p>","BRAND Boysen

UNIT Gallon, Tin","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Gallon, Tin</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","39","1","1","21","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("113","RAIN OR SHINE TOP WHITE – 4L","520","649","749","749","35","product-featured-113.jpg","<p>BRAND</p><p style="margin-top: 0.5em; margin-bottom: 0.5em;">Rain or Shine</p>","<p>BRAND</p><p style="margin-top: 0.5em; margin-bottom: 0.5em;">Rain or Shine</p>","<p>BRAND</p><p style="margin-top: 0.5em; margin-bottom: 0.5em;">Rain or Shine</p>","<p>BRAND NEW</p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br></p>","50","1","1","16","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("114","Boysen Curing Agent for Acqua Epoxy","200","300","400","400","50","product-featured-114.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Liter</span></font><br></p>","BRAND Boysen

UNIT Liter","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Boysen</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">UNIT Liter</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","62","1","1","14","15","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("115","RAIN OR SHINE DIRT SHIELD","700","900","999","999","43","product-featured-115.jpg","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br></p>","<p><span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br></p>","63","1","1","33","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("116","BVC080 LED15/765","3000","3500","3999","3999","10","product-featured-116.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 10W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 1500 </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 6500</span></font><br></p>","BRAND Philips

POWER (W) 10W

LUM. FLUX (LM) 1500

CCT (K) 6500","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 10W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 1500</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 6500</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","44","1","1","51","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("117","BVP175 LED","5000","5500","5799","5799","88","product-featured-117.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 150W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 14200 </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 5700</span></font><br></p>","BRAND Philips

POWER (W) 150W

LUM. FLUX (LM) 14200

CCT (K) 5700","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 150W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 14200</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 5700</span></font></p>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span><br>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">15 Days Retun Policy</span><br>","50","1","1","50","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("118","BVP080 LED10/757 060","4000","4500","4999","4999","70","product-featured-118.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 10W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;"> LUM. FLUX (LM) 1000 </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 5700</span></font><br></p>","BRAND Philips

POWER (W) 10W

LUM. FLUX (LM) 1000

CCT (K) 5700","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">POWER (W) 10W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 1000</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 5700</span></font></p>","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND NEW</span></font></p>","<font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font>","51","1","1","51","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("119","BVP172 LED","200","300","400","400","88","product-featured-119.jpg","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">OWER (W) 50W </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 4300 </span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 5700</span></font><br></p>","BRAND Philips

OWER (W) 50W

LUM. FLUX (LM) 4300

CCT (K) 3000, 5700","<p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">BRAND Philips</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">OWER (W) 50W</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">LUM. FLUX (LM) 4300</span></font></p><p><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">CCT (K) 3000, 5700</span></font></p>","<font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">Brand New</span></font>","<ul><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul><p style="text-align: left;"><img src="https://edit.org/photos/img/blog/xi5-template-refund-sign-printable-free.jpg-1300.jpg" alt="B&h Return Policy Shop Store, Save 41% | jlcatj.gob.mx" style="width: 362.294px; height: 271.266px;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;"><br></span></font></p>","80","1","1","50","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("120","DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY","5000","6000","7000","7000","20","product-featured-120.jpg","DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>","DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY","Brand New","15 Days Return Policy","106","1","1","57","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("121","EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM","7000","8000","9000","9000","52","product-featured-121.jpg","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>","125","1","1","57","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("122","Ingco Digital AC Clamp Meter","1800","2000","2999","2999","77","product-featured-122.jpg","<b>Ingco Digital AC Clamp Meter</b>","Ingco Digital AC Clamp Meter","<b>Ingco Digital AC Clamp Meter</b>","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span>","<ul><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul>","160","1","1","57","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("123","EAGLE EID-519 IMPACT DRILL 600W 13MM 220V","2000","2500","2999","2999","64","product-featured-123.jpg","EAGLE EID-519 IMPACT DRILL 600W 13MM 220V","EAGLE EID-519 IMPACT DRILL 600W 13MM 220V","<b>EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</b>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif;"><span style="color: rgb(119, 119, 119); font-size: 16px;"><b>Brand New</b></span><br></h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif;"><ul style="color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 13px;"><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;"><b>15 Days Retun Policy</b></span></font></li></ul></h1>","168","1","1","57","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("124","Ingco Inverter MMA Welding Machine 220A","6000","6800","6999","6999","87","product-featured-124.jpg","Ingco Inverter MMA Welding Machine 220A","Ingco Inverter MMA Welding Machine 220A","Ingco Inverter MMA Welding Machine 220A","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span>","<ul><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul>","133","1","1","4","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("125","Ingco Rotary Sander 320W","5000","6000","6999","6999","88","product-featured-125.jpg","<font color="#555555" face="kanit-reg, sans-serif"><span style="font-size: 22.1px;"><b>Ingco Rotary Sander 320W</b></span></font>","Ingco Rotary Sander 320W","Ingco Rotary Sander 320W","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;"><span style="color: rgb(119, 119, 119); font-size: 16px; font-weight: 400;">Brand New</span><br></h1>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;"><ul style="color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 13px; font-weight: 400;"><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul></h1>","215","1","1","57","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("126","Ingco Angle Grinder 4? 900W (Toggle Switch)","4000","4200","4499","4499","79","product-featured-126.jpg","<font color="#555555" face="kanit-reg, sans-serif"><span style="font-size: 22.1px;"><b>Ingco Angle Grinder 4? 900W (Toggle Switch)</b></span></font>","Ingco Angle Grinder 4? 900W (Toggle Switch)","Ingco Angle Grinder 4? 900W (Toggle Switch)","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;"><ul style="color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 13px; font-weight: 400;"><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul></h1>","208","1","1","56","20","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("127","EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM","8000","10000","10999","10999","4","product-featured-127.jpg","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;"><span style="color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 13px; font-weight: 400;">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</span><br></h1>","EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM","EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM","<span style="color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;">Brand New</span>","<h1 class="product-title product_title entry-title" style="color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;"><ul style="color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 13px; font-weight: 400;"><li style="text-align: left;"><font color="#777777" face="kanit-reg, sans-serif"><span style="font-size: 16px;">15 Days Retun Policy</span></font></li></ul></h1>","248","1","1","56","10","4","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("129","Black & Decker Drill 550 Watts HD555KMPR B1","3700","3999","4499","4499","88","product-featured-129.jpg","<p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: "DIN Next", sans-serif;">Perfect for building.<br style="-webkit-font-smoothing: antialiased;"></p><p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: "DIN Next", sans-serif;">220-240V 60hz, 550W 13mm chuck capacity<br style="-webkit-font-smoothing: antialiased;">0-2,800/minute load speed<br style="-webkit-font-smoothing: antialiased;">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>","<p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: "DIN Next", sans-serif;">Perfect for building.<br style="-webkit-font-smoothing: antialiased;"></p><p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: "DIN Next", sans-serif;">220-240V 60hz, 550W 13mm chuck capacity<br style="-webkit-font-smoothing: antialiased;">0-2,800/minute load speed<br style="-webkit-font-smoothing: antialiased;">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>","<p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: "DIN Next", sans-serif;">Perfect for building.<br style="-webkit-font-smoothing: antialiased;"></p><p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: "DIN Next", sans-serif;">220-240V 60hz, 550W 13mm chuck capacity<br style="-webkit-font-smoothing: antialiased;">0-2,800/minute load speed<br style="-webkit-font-smoothing: antialiased;">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>","<p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: "DIN Next", sans-serif;">Perfect for building.<br style="-webkit-font-smoothing: antialiased;"></p><p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: "DIN Next", sans-serif;">220-240V 60hz, 550W 13mm chuck capacity<br style="-webkit-font-smoothing: antialiased;">0-2,800/minute load speed<br style="-webkit-font-smoothing: antialiased;">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>","<p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: "DIN Next", sans-serif;">Perfect for building.<br style="-webkit-font-smoothing: antialiased;"></p><p style="-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: "DIN Next", sans-serif;">220-240V 60hz, 550W 13mm chuck capacity<br style="-webkit-font-smoothing: antialiased;">0-2,800/minute load speed<br style="-webkit-font-smoothing: antialiased;">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>","630","1","1","57","20","3","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("130","First Alert Pro Series 5 lb Fire Extinguisher","500","600","799","799","5","product-featured-130.jpeg","<ul style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; outline: none !important;"><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">What's Included:Bracket, Manual</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Brand Name:First Alert</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Sub Brand: Pro Series</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Product Type: Fire Extinguisher</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Application: Household</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Agency Approval: OSHA/US Coast Guard</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Application: Household</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Brand Name: First Alert</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Container Size: 5 pound</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Discharge Type: Metal Valve and Trigger</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Sub Brand: Pro Series</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">UL Listed: Yes</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">UL Rating: 3-A:40-B:C</li></ul><ul style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; outline: none !important;"><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Click here to see the <a rel="noreferrer" href="https://ace.infotrac.net/getmsds.aspx?sku=83559" target="_blank" style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; border-bottom: 1px solid rgba(18, 18, 18, 0.93); outline: none !important;">Safety Data Sheets</a> for this product.</li></ul>","<ul style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; outline: none !important;"><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">What's Included:Bracket, Manual</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Brand Name:First Alert</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Sub Brand: Pro Series</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Product Type: Fire Extinguisher</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Application: Household</li><li style="color: rgba(18, 18, 18, 0.93); font-family: Roboto; font-size: 16px; box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; letter-spacing: 0.5px; outline: none !important;"><br></li></ul>","<ul style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; outline: none !important;"><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">What's Included:Bracket, Manual</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Brand Name:First Alert</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Sub Brand: Pro Series</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Product Type: Fire Extinguisher</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Application: Household</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Agency Approval: OSHA/US Coast Guard</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Application: Household</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Brand Name: First Alert</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Container Size: 5 pound</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Discharge Type: Metal Valve and Trigger</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Sub Brand: Pro Series</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">UL Listed: Yes</li><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">UL Rating: 3-A:40-B:C</li></ul><ul style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; outline: none !important;"><li style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; line-height: 24px; outline: none !important;">Click here to see the <a rel="noreferrer" href="https://ace.infotrac.net/getmsds.aspx?sku=83559" target="_blank" style="box-sizing: inherit; --pr-translate-x:0; --pr-translate-y:0; --pr-rotate:0; --pr-skew-x:0; --pr-skew-y:0; --pr-scale-x:1; --pr-scale-y:1; --pr-pan-x: ; --pr-pan-y: ; --pr-pinch-zoom: ; --pr-scroll-snap-strictness:proximity; --pr-ordinal: ; --pr-slashed-zero: ; --pr-numeric-figure: ; --pr-numeric-spacing: ; --pr-numeric-fraction: ; --pr-ring-inset: ; --pr-ring-offset-width:0px; --pr-ring-offset-color:#fff; --pr-ring-color:rgba(59,130,246,0.5); --pr-ring-offset-shadow:0 0 transparent; --pr-ring-shadow:0 0 transparent; --pr-shadow:0 0 transparent; --pr-shadow-colored:0 0 transparent; --pr-blur: ; --pr-brightness: ; --pr-contrast: ; --pr-grayscale: ; --pr-hue-rotate: ; --pr-invert: ; --pr-saturate: ; --pr-sepia: ; --pr-drop-shadow: ; --pr-backdrop-blur: ; --pr-backdrop-brightness: ; --pr-backdrop-contrast: ; --pr-backdrop-grayscale: ; --pr-backdrop-hue-rotate: ; --pr-backdrop-invert: ; --pr-backdrop-opacity: ; --pr-backdrop-saturate: ; --pr-backdrop-sepia: ; border-bottom: 1px solid rgba(18, 18, 18, 0.93); outline: none !important;">Safety Data Sheets</a> for this product.</li></ul>","<p>Brandnew</p>","<p>15 Days return</p>","231","1","1","46","20","4","2023-12-08","0000-00-00");
INSERT INTO tbl_product VALUES("131","Rainbow Paint","400","499","599","599","5","product-featured-131.jpg","<p>RainBow paint</p><p>1 Liter</p>","<p>RainBow paint</p><p>1 Liter</p>","<p>RainBow paint</p><p>1 Liter</p>","<p>BrandNew    </p>","<p><img src="https://edit.org/photos/img/blog/xi5-template-refund-sign-printable-free.jpg-1300.jpg" alt="B&h Return Policy Shop Store, Save 41% | jlcatj.gob.mx" style="width: 363.09px; height: 272.172px;"><br></p>","405","0","0","27","20","4","2023-12-31","2023-09-03");
INSERT INTO tbl_product VALUES("134","Impact Drill","900","1050","1099","1099","96","product-featured-134.jpg","<p>Wera 932/918/6 Workshop Screwdriver set 6-piece<br></p>","<p>Wera 932/918/6 Workshop Screwdriver set 6-piece<br></p>","<p>7-piece screwdriver set for workshop and VDE applications</p><p>Multi-component Kraftform handle for high working speeds and ergonomic screwdriving</p>","<p>Branw New    </p>","<p>15 Days Return</p>","177","1","1","82","20","2","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("135","SWera 932/918/6 Workshop Screwdriver set 6-piece","100","200","299","299","100","product-featured-135.jpg","<p>7-piece screwdriver set for workshop and VDE applications</p><p>Multi-component Kraftform handle for high working speeds and ergonomic screwdriving</p><div><br></div>","<p>7-piece screwdriver set for workshop and VDE applications</p><p>Multi-component Kraftform handle for high working speeds and ergonomic screwdriving</p><div><br></div>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions. </p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done. </p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier </p><p>when used together with a ring spanner or open wrench.</p>","<p>Brand New    </p>","<p>15 Days Retrun Policy</p>","130","0","0","81","20","2","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("144","Makita Cordless Impact","500","600","700","","75","product-featured-144.jpg","<p><span style="font-size:12.0pt;line-height:115%;
font-family:"Times New Roman","serif";mso-fareast-font-family:Calibri;
mso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA;mso-bidi-font-weight:bold">Testing4</span><br></p>","<p><span style="font-size:12.0pt;line-height:115%;
font-family:"Times New Roman","serif";mso-fareast-font-family:Calibri;
mso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA;mso-bidi-font-weight:bold">Testing4</span><br></p>","","<p><span style="font-size:12.0pt;line-height:115%;
font-family:"Times New Roman","serif";mso-fareast-font-family:Calibri;
mso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA;mso-bidi-font-weight:bold">Testing4</span><br></p>","<p><span style="font-size:12.0pt;line-height:115%;
font-family:"Times New Roman","serif";mso-fareast-font-family:Calibri;
mso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA;mso-bidi-font-weight:bold">Testing4</span><br></p>","129","1","1","82","25","2","0000-00-00","2023-09-08");
INSERT INTO tbl_product VALUES("145","Wera 932/918/6 Workshop Screwdriver set 6-piece","500","600","650","","89","product-featured-145.jpg","<p>7-piece screwdriver set for workshop and VDE applications</p><p>Multi-component Kraftform handle for high working speeds and ergonomic screwdriving</p><div><br></div>","<p>7-piece screwdriver set for workshop and VDE applications</p><p>Multi-component Kraftform handle for high working speeds and ergonomic screwdriving</p><div><br></div>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions. </p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done. </p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier </p><p>when used together with a ring spanner or open wrench.</p>","<p>Brandnew</p>","<p>15 days return</p>","200","1","1","4","20","3","0000-00-00","0000-00-00");
INSERT INTO tbl_product VALUES("149","Hammer","10","12","14","","69","product-featured-149.jpeg","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions.&nbsp;</p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done.&nbsp;</p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier&nbsp;</p><p>when used together with a ring spanner or open wrench.</p>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions.&nbsp;</p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done.&nbsp;</p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier&nbsp;</p><p>when used together with a ring spanner or open wrench.</p>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions.&nbsp;</p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done.&nbsp;</p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier&nbsp;</p><p>when used together with a ring spanner or open wrench.</p>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions.&nbsp;</p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done.&nbsp;</p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier&nbsp;</p><p>when used together with a ring spanner or open wrench.</p>","<p>The high impact-strength hex blade material and the solid impact cap ensure long tool life, even in the toughest conditions.&nbsp;</p><p>Loosening seized screws is no problem with this scredriver - some well-applied hammer blows on the impact cap and it's done.&nbsp;</p><p>The chisel-screwdriver is also useful when there’s no chisel at hand. The socket wrench attachment acts as a torque multiplier&nbsp;</p><p>when used together with a ring spanner or open wrench.</p>","23","1","1","83","10","3","0000-00-00","0000-00-00");



CREATE TABLE `tbl_product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=538 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_product_color VALUES("69","1","4");
INSERT INTO tbl_product_color VALUES("70","4","4");
INSERT INTO tbl_product_color VALUES("77","6","6");
INSERT INTO tbl_product_color VALUES("82","2","12");
INSERT INTO tbl_product_color VALUES("83","9","13");
INSERT INTO tbl_product_color VALUES("84","3","14");
INSERT INTO tbl_product_color VALUES("85","2","15");
INSERT INTO tbl_product_color VALUES("86","6","15");
INSERT INTO tbl_product_color VALUES("87","3","16");
INSERT INTO tbl_product_color VALUES("88","3","17");
INSERT INTO tbl_product_color VALUES("89","2","18");
INSERT INTO tbl_product_color VALUES("90","3","19");
INSERT INTO tbl_product_color VALUES("91","1","20");
INSERT INTO tbl_product_color VALUES("92","8","21");
INSERT INTO tbl_product_color VALUES("93","2","22");
INSERT INTO tbl_product_color VALUES("94","2","23");
INSERT INTO tbl_product_color VALUES("95","2","25");
INSERT INTO tbl_product_color VALUES("96","5","26");
INSERT INTO tbl_product_color VALUES("97","2","27");
INSERT INTO tbl_product_color VALUES("98","4","27");
INSERT INTO tbl_product_color VALUES("99","5","28");
INSERT INTO tbl_product_color VALUES("100","7","29");
INSERT INTO tbl_product_color VALUES("101","10","30");
INSERT INTO tbl_product_color VALUES("102","11","31");
INSERT INTO tbl_product_color VALUES("103","14","32");
INSERT INTO tbl_product_color VALUES("105","2","34");
INSERT INTO tbl_product_color VALUES("106","1","35");
INSERT INTO tbl_product_color VALUES("107","3","36");
INSERT INTO tbl_product_color VALUES("109","6","38");
INSERT INTO tbl_product_color VALUES("110","2","39");
INSERT INTO tbl_product_color VALUES("111","11","42");
INSERT INTO tbl_product_color VALUES("149","3","10");
INSERT INTO tbl_product_color VALUES("150","6","9");
INSERT INTO tbl_product_color VALUES("151","3","8");
INSERT INTO tbl_product_color VALUES("152","7","7");
INSERT INTO tbl_product_color VALUES("159","2","77");
INSERT INTO tbl_product_color VALUES("163","17","79");
INSERT INTO tbl_product_color VALUES("164","2","78");
INSERT INTO tbl_product_color VALUES("167","3","80");
INSERT INTO tbl_product_color VALUES("168","2","81");
INSERT INTO tbl_product_color VALUES("172","1","82");
INSERT INTO tbl_product_color VALUES("173","2","82");
INSERT INTO tbl_product_color VALUES("174","4","82");
INSERT INTO tbl_product_color VALUES("301","8","128");
INSERT INTO tbl_product_color VALUES("415","4","125");
INSERT INTO tbl_product_color VALUES("416","7","124");
INSERT INTO tbl_product_color VALUES("417","1","123");
INSERT INTO tbl_product_color VALUES("422","6","119");
INSERT INTO tbl_product_color VALUES("423","2","118");
INSERT INTO tbl_product_color VALUES("424","6","117");
INSERT INTO tbl_product_color VALUES("426","6","115");
INSERT INTO tbl_product_color VALUES("427","2","114");
INSERT INTO tbl_product_color VALUES("428","6","114");
INSERT INTO tbl_product_color VALUES("429","7","121");
INSERT INTO tbl_product_color VALUES("431","6","113");
INSERT INTO tbl_product_color VALUES("432","6","112");
INSERT INTO tbl_product_color VALUES("437","6","108");
INSERT INTO tbl_product_color VALUES("438","6","107");
INSERT INTO tbl_product_color VALUES("439","4","106");
INSERT INTO tbl_product_color VALUES("440","6","106");
INSERT INTO tbl_product_color VALUES("441","3","105");
INSERT INTO tbl_product_color VALUES("442","4","104");
INSERT INTO tbl_product_color VALUES("443","6","104");
INSERT INTO tbl_product_color VALUES("450","4","120");
INSERT INTO tbl_product_color VALUES("451","4","122");
INSERT INTO tbl_product_color VALUES("452","7","122");
INSERT INTO tbl_product_color VALUES("499","6","110");
INSERT INTO tbl_product_color VALUES("516","2","135");
INSERT INTO tbl_product_color VALUES("525","4","145");
INSERT INTO tbl_product_color VALUES("526","3","144");
INSERT INTO tbl_product_color VALUES("527","3","134");
INSERT INTO tbl_product_color VALUES("528","1","129");
INSERT INTO tbl_product_color VALUES("529","2","129");
INSERT INTO tbl_product_color VALUES("530","4","129");
INSERT INTO tbl_product_color VALUES("531","7","127");
INSERT INTO tbl_product_color VALUES("532","4","126");
INSERT INTO tbl_product_color VALUES("533","6","116");
INSERT INTO tbl_product_color VALUES("534","4","149");
INSERT INTO tbl_product_color VALUES("535","30","131");
INSERT INTO tbl_product_color VALUES("536","6","111");
INSERT INTO tbl_product_color VALUES("537","6","109");



CREATE TABLE `tbl_product_photo` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`pp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_product_photo VALUES("135","135.jpg","104");
INSERT INTO tbl_product_photo VALUES("136","136.jpg","129");
INSERT INTO tbl_product_photo VALUES("139","139.jpg","131");
INSERT INTO tbl_product_photo VALUES("144","144.jpg","103");
INSERT INTO tbl_product_photo VALUES("148","148.jpg","134");
INSERT INTO tbl_product_photo VALUES("149","149.jpg","135");
INSERT INTO tbl_product_photo VALUES("150","150.jpg","135");
INSERT INTO tbl_product_photo VALUES("167","167.jpg","144");
INSERT INTO tbl_product_photo VALUES("168","168.jpg","145");
INSERT INTO tbl_product_photo VALUES("169","169.jpg","145");
INSERT INTO tbl_product_photo VALUES("179","179.jpeg","149");



CREATE TABLE `tbl_product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=780 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_product_size VALUES("44","1","6");
INSERT INTO tbl_product_size VALUES("56","8","12");
INSERT INTO tbl_product_size VALUES("57","9","12");
INSERT INTO tbl_product_size VALUES("58","10","12");
INSERT INTO tbl_product_size VALUES("59","11","12");
INSERT INTO tbl_product_size VALUES("60","12","12");
INSERT INTO tbl_product_size VALUES("61","13","12");
INSERT INTO tbl_product_size VALUES("62","9","13");
INSERT INTO tbl_product_size VALUES("63","11","13");
INSERT INTO tbl_product_size VALUES("64","13","13");
INSERT INTO tbl_product_size VALUES("65","15","13");
INSERT INTO tbl_product_size VALUES("66","9","14");
INSERT INTO tbl_product_size VALUES("67","11","14");
INSERT INTO tbl_product_size VALUES("68","12","14");
INSERT INTO tbl_product_size VALUES("69","13","14");
INSERT INTO tbl_product_size VALUES("70","9","15");
INSERT INTO tbl_product_size VALUES("71","11","15");
INSERT INTO tbl_product_size VALUES("72","13","15");
INSERT INTO tbl_product_size VALUES("73","15","16");
INSERT INTO tbl_product_size VALUES("74","16","16");
INSERT INTO tbl_product_size VALUES("75","17","16");
INSERT INTO tbl_product_size VALUES("76","16","17");
INSERT INTO tbl_product_size VALUES("77","17","17");
INSERT INTO tbl_product_size VALUES("78","14","18");
INSERT INTO tbl_product_size VALUES("79","15","18");
INSERT INTO tbl_product_size VALUES("80","16","18");
INSERT INTO tbl_product_size VALUES("81","17","18");
INSERT INTO tbl_product_size VALUES("82","15","19");
INSERT INTO tbl_product_size VALUES("83","16","19");
INSERT INTO tbl_product_size VALUES("84","17","19");
INSERT INTO tbl_product_size VALUES("85","14","20");
INSERT INTO tbl_product_size VALUES("86","15","20");
INSERT INTO tbl_product_size VALUES("87","17","20");
INSERT INTO tbl_product_size VALUES("88","15","21");
INSERT INTO tbl_product_size VALUES("89","17","21");
INSERT INTO tbl_product_size VALUES("90","15","22");
INSERT INTO tbl_product_size VALUES("91","16","22");
INSERT INTO tbl_product_size VALUES("92","17","22");
INSERT INTO tbl_product_size VALUES("93","15","23");
INSERT INTO tbl_product_size VALUES("94","16","23");
INSERT INTO tbl_product_size VALUES("95","17","23");
INSERT INTO tbl_product_size VALUES("96","18","25");
INSERT INTO tbl_product_size VALUES("97","19","25");
INSERT INTO tbl_product_size VALUES("98","20","25");
INSERT INTO tbl_product_size VALUES("99","21","25");
INSERT INTO tbl_product_size VALUES("100","19","26");
INSERT INTO tbl_product_size VALUES("101","21","26");
INSERT INTO tbl_product_size VALUES("102","22","26");
INSERT INTO tbl_product_size VALUES("103","23","26");
INSERT INTO tbl_product_size VALUES("104","19","27");
INSERT INTO tbl_product_size VALUES("105","20","27");
INSERT INTO tbl_product_size VALUES("106","21","27");
INSERT INTO tbl_product_size VALUES("107","22","27");
INSERT INTO tbl_product_size VALUES("108","19","28");
INSERT INTO tbl_product_size VALUES("109","20","28");
INSERT INTO tbl_product_size VALUES("110","21","28");
INSERT INTO tbl_product_size VALUES("111","19","29");
INSERT INTO tbl_product_size VALUES("112","20","29");
INSERT INTO tbl_product_size VALUES("113","22","29");
INSERT INTO tbl_product_size VALUES("114","1","30");
INSERT INTO tbl_product_size VALUES("115","2","30");
INSERT INTO tbl_product_size VALUES("116","3","30");
INSERT INTO tbl_product_size VALUES("117","4","30");
INSERT INTO tbl_product_size VALUES("118","23","31");
INSERT INTO tbl_product_size VALUES("119","26","32");
INSERT INTO tbl_product_size VALUES("123","2","34");
INSERT INTO tbl_product_size VALUES("124","2","35");
INSERT INTO tbl_product_size VALUES("125","2","36");
INSERT INTO tbl_product_size VALUES("126","3","36");
INSERT INTO tbl_product_size VALUES("129","2","38");
INSERT INTO tbl_product_size VALUES("130","3","38");
INSERT INTO tbl_product_size VALUES("131","4","38");
INSERT INTO tbl_product_size VALUES("132","5","38");
INSERT INTO tbl_product_size VALUES("133","27","39");
INSERT INTO tbl_product_size VALUES("134","8","42");
INSERT INTO tbl_product_size VALUES("210","3","10");
INSERT INTO tbl_product_size VALUES("211","4","10");
INSERT INTO tbl_product_size VALUES("212","5","10");
INSERT INTO tbl_product_size VALUES("213","6","10");
INSERT INTO tbl_product_size VALUES("214","3","9");
INSERT INTO tbl_product_size VALUES("215","4","9");
INSERT INTO tbl_product_size VALUES("216","3","8");
INSERT INTO tbl_product_size VALUES("217","4","8");
INSERT INTO tbl_product_size VALUES("218","2","7");
INSERT INTO tbl_product_size VALUES("219","3","7");
INSERT INTO tbl_product_size VALUES("220","4","7");
INSERT INTO tbl_product_size VALUES("249","1","79");
INSERT INTO tbl_product_size VALUES("250","2","79");
INSERT INTO tbl_product_size VALUES("251","3","79");
INSERT INTO tbl_product_size VALUES("252","1","78");
INSERT INTO tbl_product_size VALUES("253","2","78");
INSERT INTO tbl_product_size VALUES("254","3","78");
INSERT INTO tbl_product_size VALUES("255","4","78");
INSERT INTO tbl_product_size VALUES("256","5","78");
INSERT INTO tbl_product_size VALUES("259","26","80");
INSERT INTO tbl_product_size VALUES("262","3","82");
INSERT INTO tbl_product_size VALUES("263","4","82");
INSERT INTO tbl_product_size VALUES("481","27","128");
INSERT INTO tbl_product_size VALUES("564","27","125");
INSERT INTO tbl_product_size VALUES("565","27","124");
INSERT INTO tbl_product_size VALUES("566","27","123");
INSERT INTO tbl_product_size VALUES("570","27","119");
INSERT INTO tbl_product_size VALUES("571","27","118");
INSERT INTO tbl_product_size VALUES("572","27","117");
INSERT INTO tbl_product_size VALUES("574","27","115");
INSERT INTO tbl_product_size VALUES("575","49","114");
INSERT INTO tbl_product_size VALUES("576","50","114");
INSERT INTO tbl_product_size VALUES("577","51","114");
INSERT INTO tbl_product_size VALUES("578","52","114");
INSERT INTO tbl_product_size VALUES("579","53","114");
INSERT INTO tbl_product_size VALUES("580","54","114");
INSERT INTO tbl_product_size VALUES("581","26","121");
INSERT INTO tbl_product_size VALUES("587","49","113");
INSERT INTO tbl_product_size VALUES("588","50","113");
INSERT INTO tbl_product_size VALUES("589","51","113");
INSERT INTO tbl_product_size VALUES("590","52","113");
INSERT INTO tbl_product_size VALUES("591","53","113");
INSERT INTO tbl_product_size VALUES("592","49","112");
INSERT INTO tbl_product_size VALUES("593","50","112");
INSERT INTO tbl_product_size VALUES("594","51","112");
INSERT INTO tbl_product_size VALUES("595","52","112");
INSERT INTO tbl_product_size VALUES("596","53","112");
INSERT INTO tbl_product_size VALUES("597","54","112");
INSERT INTO tbl_product_size VALUES("598","106","112");
INSERT INTO tbl_product_size VALUES("618","96","108");
INSERT INTO tbl_product_size VALUES("619","99","108");
INSERT INTO tbl_product_size VALUES("620","100","108");
INSERT INTO tbl_product_size VALUES("621","101","108");
INSERT INTO tbl_product_size VALUES("622","102","108");
INSERT INTO tbl_product_size VALUES("623","103","108");
INSERT INTO tbl_product_size VALUES("624","93","107");
INSERT INTO tbl_product_size VALUES("625","94","107");
INSERT INTO tbl_product_size VALUES("626","95","107");
INSERT INTO tbl_product_size VALUES("627","96","107");
INSERT INTO tbl_product_size VALUES("628","97","107");
INSERT INTO tbl_product_size VALUES("629","98","107");
INSERT INTO tbl_product_size VALUES("630","99","107");
INSERT INTO tbl_product_size VALUES("631","100","107");
INSERT INTO tbl_product_size VALUES("632","101","107");
INSERT INTO tbl_product_size VALUES("633","102","107");
INSERT INTO tbl_product_size VALUES("634","103","107");
INSERT INTO tbl_product_size VALUES("635","93","106");
INSERT INTO tbl_product_size VALUES("636","94","106");
INSERT INTO tbl_product_size VALUES("637","95","106");
INSERT INTO tbl_product_size VALUES("638","96","106");
INSERT INTO tbl_product_size VALUES("639","97","106");
INSERT INTO tbl_product_size VALUES("640","98","106");
INSERT INTO tbl_product_size VALUES("641","99","106");
INSERT INTO tbl_product_size VALUES("642","100","106");
INSERT INTO tbl_product_size VALUES("643","101","106");
INSERT INTO tbl_product_size VALUES("644","102","106");
INSERT INTO tbl_product_size VALUES("645","103","106");
INSERT INTO tbl_product_size VALUES("646","26","105");
INSERT INTO tbl_product_size VALUES("647","93","104");
INSERT INTO tbl_product_size VALUES("648","94","104");
INSERT INTO tbl_product_size VALUES("649","95","104");
INSERT INTO tbl_product_size VALUES("650","96","104");
INSERT INTO tbl_product_size VALUES("651","26","103");
INSERT INTO tbl_product_size VALUES("658","27","120");
INSERT INTO tbl_product_size VALUES("659","27","122");
INSERT INTO tbl_product_size VALUES("710","49","110");
INSERT INTO tbl_product_size VALUES("711","50","110");
INSERT INTO tbl_product_size VALUES("712","51","110");
INSERT INTO tbl_product_size VALUES("713","52","110");
INSERT INTO tbl_product_size VALUES("714","53","110");
INSERT INTO tbl_product_size VALUES("740","117","135");
INSERT INTO tbl_product_size VALUES("757","117","145");
INSERT INTO tbl_product_size VALUES("758","26","144");
INSERT INTO tbl_product_size VALUES("759","26","134");
INSERT INTO tbl_product_size VALUES("760","26","129");
INSERT INTO tbl_product_size VALUES("761","27","129");
INSERT INTO tbl_product_size VALUES("762","26","127");
INSERT INTO tbl_product_size VALUES("763","27","126");
INSERT INTO tbl_product_size VALUES("764","27","116");
INSERT INTO tbl_product_size VALUES("765","26","149");
INSERT INTO tbl_product_size VALUES("766","49","131");
INSERT INTO tbl_product_size VALUES("767","50","131");
INSERT INTO tbl_product_size VALUES("768","51","131");
INSERT INTO tbl_product_size VALUES("769","52","131");
INSERT INTO tbl_product_size VALUES("770","53","131");
INSERT INTO tbl_product_size VALUES("771","104","111");
INSERT INTO tbl_product_size VALUES("772","105","111");
INSERT INTO tbl_product_size VALUES("773","106","111");
INSERT INTO tbl_product_size VALUES("774","108","111");
INSERT INTO tbl_product_size VALUES("775","49","109");
INSERT INTO tbl_product_size VALUES("776","50","109");
INSERT INTO tbl_product_size VALUES("777","51","109");
INSERT INTO tbl_product_size VALUES("778","52","109");
INSERT INTO tbl_product_size VALUES("779","53","109");



CREATE TABLE `tbl_rating` (
  `rt_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_rating VALUES("2","127","19","Nice","5");
INSERT INTO tbl_rating VALUES("4","129","35","High Quality","5");
INSERT INTO tbl_rating VALUES("5","125","45","Nice item","5");
INSERT INTO tbl_rating VALUES("6","121","45","Good item","4");
INSERT INTO tbl_rating VALUES("8","106","45","Excellent product","5");
INSERT INTO tbl_rating VALUES("9","129","45","Defective","1");
INSERT INTO tbl_rating VALUES("10","103","45","Nice product","5");
INSERT INTO tbl_rating VALUES("11","103","94","Nice item","5");
INSERT INTO tbl_rating VALUES("13","131","105","WHAT A NICE!","5");
INSERT INTO tbl_rating VALUES("14","129","99","Good V","5");
INSERT INTO tbl_rating VALUES("15","135","108","GOOD ITEMS","5");
INSERT INTO tbl_rating VALUES("18","129","144","nice item ","5");
INSERT INTO tbl_rating VALUES("19","113","144","nice item ","5");



CREATE TABLE `tbl_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_reason VALUES("2","Damage Item");
INSERT INTO tbl_reason VALUES("6","Missing quantity/products");
INSERT INTO tbl_reason VALUES("7","Received wrong product");
INSERT INTO tbl_reason VALUES("8","Defective product");
INSERT INTO tbl_reason VALUES("9","Product not delivered");



CREATE TABLE `tbl_refund_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `refund_id` varchar(255) NOT NULL,
  `refund_date` varchar(255) NOT NULL,
  `refund_amount` varchar(255) NOT NULL,
  `reason_id` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `receive_status` varchar(20) NOT NULL,
  `refund_status` varchar(20) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `gcash_no` varchar(11) NOT NULL,
  `proof_ship` varchar(255) NOT NULL,
  `ship_date` varchar(255) NOT NULL,
  `ship_notes` varchar(255) NOT NULL,
  `attempt` int(11) NOT NULL,
  `seller_notes` varchar(255) NOT NULL,
  `refund_receipt` varchar(255) NOT NULL,
  `refund_pay_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_refund_order VALUES("16","99","247","144","Makita Cordless Impact","Standard ","Blue","3","600","1700418393","2023-11-20 02:30:24","1800","2","refund16.jpg","Declined","Pending","Pending","Pending","DAMAGEEEEEE","09510574004","","","","2","DECLINE REQUEST","","");
INSERT INTO tbl_refund_order VALUES("18","99","250","144","Makita Cordless Impact","Standard ","Blue","2","600","1700429808","2023-11-20 05:36:48","1200","2","refund-1700429808.jpg","Accepted","Shipped-Back","Received","Completed","DAMAGE ITEM","09510574004","ship-proof-18.jpg","2023-11-20 05:41:19","SHIP","1","","refund-receipt-18.jpg","2023-11-20 05:41:42");



CREATE TABLE `tbl_return_ordering` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `p_current_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `reason_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




CREATE TABLE `tbl_return_pos` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(255) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `return_product_name` varchar(255) NOT NULL,
  `return_quantity` int(11) NOT NULL,
  `return_price` int(11) NOT NULL,
  `return_totAmount` int(11) NOT NULL,
  `return_date` datetime NOT NULL,
  `description_return` text NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `reason_id` (`reason_id`),
  CONSTRAINT `tbl_return_pos_ibfk_1` FOREIGN KEY (`reason_id`) REFERENCES `tbl_reason` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tbl_return_pos VALUES("108","ST-85230383","2","RAIN OR SHINE DIRT SHIELD","1","999","999","2023-12-10 11:36:07","EXPIRED NAPO YUNG PRODUCT");
INSERT INTO tbl_return_pos VALUES("109","ST-33026033","6","Hand Drill","1","3299","3299","2023-12-10 11:54:56","KULANG PO YUNG ITEM NA DUMATING");



CREATE TABLE `tbl_sales_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `invoice` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_sales_all VALUES("1","1700070325","ST-1700070325","145","1","600","100","Wera 932/918/6 Workshop Screwdriver set 6-piece","600","0","2023-11-16 01:45:25","1700070253");
INSERT INTO tbl_sales_all VALUES("2","1700070412","ST-1700070412","120","5","30000","5000","DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY","6000","0","2023-11-16 01:46:52","1700070376");
INSERT INTO tbl_sales_all VALUES("3","1700070412","ST-1700070412","122","10","20000","2000","Ingco Digital AC Clamp Meter","2000","0","2023-11-16 01:46:52","1700070376");



CREATE TABLE `tbl_sales_pos` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(255) NOT NULL,
  `cashier` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount_pos` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `due_date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `cust_contact` varchar(11) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `discount_status` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `photo_delivery_receipt` varchar(255) NOT NULL,
  `receipt_date_upload` datetime NOT NULL,
  `finalTotalAmount` float NOT NULL,
  `pwd_senior_no_id` varchar(255) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_sales_pos VALUES("245","ST-85230383","Administrator","2023-12-10 02:58:18","cash","900","0","3000","CUSTOMER","0","0959656664","Tabing Ilog","0","0","1","0","","0000-00-00 00:00:00","900","");
INSERT INTO tbl_sales_pos VALUES("246","ST-33026033","Steven William Duran","2023-12-10 03:07:20","cash","23143","0","33100","Steven William Duran","0","09510574004","Meycauayan, Bulacan","2","0","18","9","del-receipt-2023-12-10 11:07:38-ST-33026033.jpg","2023-12-10 11:07:38","23143","");
INSERT INTO tbl_sales_pos VALUES("247","ST-0227327","Roxy","2023-12-12 05:09:08","cash","2247","0","2300","CUSTOMER","0","","","0","0","7","0","","0000-00-00 00:00:00","2247","");



CREATE TABLE `tbl_salesorder_pos` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_current_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `order_details` int(255) NOT NULL,
  `transaction` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `totalProfit` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=688 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_salesorder_pos VALUES("685","ST-85230383","115","2","1998","598","RAIN OR SHINE DIRT SHIELD","999","0","2023-12-10 02:57:57","0","0","0","299");
INSERT INTO tbl_salesorder_pos VALUES("686","ST-33026033","103","7","23143","9093","Hand Drill","3299","0","2023-12-10 03:06:47","0","0","0","1299");
INSERT INTO tbl_salesorder_pos VALUES("687","ST-0227327","113","3","2247","687","RAIN OR SHINE TOP WHITE – 4L","749","0","2023-12-12 05:08:54","0","0","0","229");



CREATE TABLE `tbl_salesoverall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_payment_id` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `profit` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `totalProfit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tbl_salesoverall VALUES("36","1700329758","600","10","6000","First Alert Pro Series 5 lb Fire Extinguisher","2023-11-19 01:49:51","1000","130","0");
INSERT INTO tbl_salesoverall VALUES("81","1700427516","600","3","3000","Makita Cordless Impact","2023-11-20 05:34:48","300","144","0");
INSERT INTO tbl_salesoverall VALUES("85","1700442314","600","10","6000","Wera 932/918/6 Workshop Screwdriver set 6-piece","2023-11-20 09:09:41","1000","145","0");
INSERT INTO tbl_salesoverall VALUES("100","ST-85230383","999","2","1998","RAIN OR SHINE DIRT SHIELD","2023-12-10 02:57:57","598","115","299");
INSERT INTO tbl_salesoverall VALUES("101","ST-33026033","3299","7","23143","Hand Drill","2023-12-10 03:06:47","9093","103","1299");
INSERT INTO tbl_salesoverall VALUES("102","ST-0227327","749","3","2247","RAIN OR SHINE TOP WHITE – 4L","2023-12-12 05:08:54","687","113","229");
INSERT INTO tbl_salesoverall VALUES("103","1702395223","12","1","12","Hammer","2023-12-12 23:34:02","2","149","0");



CREATE TABLE `tbl_salesoverall_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_payment_id` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `shippingfee` int(11) NOT NULL,
  `cashier` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `cashier_id_pos` int(255) NOT NULL,
  `finalTotalAmount_pos` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tbl_salesoverall_info VALUES("11","1700329758","Steven William1","161 Duran Street, Daungan, Malhacan","0951057400444","swrduran030@gmail.com","2023-11-19 01:49:18","Cash on Pickup","0","50","","6000","1000","0","0","6000");
INSERT INTO tbl_salesoverall_info VALUES("37","1700427516","Steven William","Bulacan","09510574004","duranstan300@gmail.com","2023-11-20 04:58:36","GCash","0","100","","3100","500","0","0","3100");
INSERT INTO tbl_salesoverall_info VALUES("39","1700442314","John","Lias, Marilao, Bulacan","09709400645","mamaiyieee001@gmail.com","2023-11-20 09:05:14","Cash on Delivery","0","60","","6060","1000","0","0","6060");
INSERT INTO tbl_salesoverall_info VALUES("50","ST-85230383","CUSTOMER","Tabing Ilog","0959656664","","2023-12-10 02:58:18","cash","0","0","Administrator","900","0","3000","1","900");
INSERT INTO tbl_salesoverall_info VALUES("51","ST-33026033","Steven William Duran","Meycauayan, Bulacan","09510574004","","2023-12-10 03:07:20","cash","2","9","Steven William Duran","23143","0","33100","18","23143");
INSERT INTO tbl_salesoverall_info VALUES("52","ST-0227327","CUSTOMER","","","","2023-12-12 05:09:08","cash","0","0","Roxy","2247","0","2300","7","2247");
INSERT INTO tbl_salesoverall_info VALUES("53","1702395223","Steven William Duran","Bulacan","09510574004","duranstan300@gmail.com","2023-12-12 23:33:43","Cash on Delivery","0","100","","112","2","0","0","112");



CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_service VALUES("11","Outsourcing","standleyhardware1@gmail.com","service-11.png");
INSERT INTO tbl_service VALUES("12","Fast Shipping","Items are shipped within 24 hours.","service-12.png");
INSERT INTO tbl_service VALUES("13","Secure Checkout","Providing Secure Checkout Options for all","service-13.png");
INSERT INTO tbl_service VALUES("14","Satisfaction Guarantee","We guarantee you with our quality satisfaction.","service-14.png");
INSERT INTO tbl_service VALUES("16","Money Back Guarantee","Offer money back guarantee on our products","service-16.png");
INSERT INTO tbl_service VALUES("17","Easy Returns","Return any item before 15 days!","service-17.png");



CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_post_footer` int(10) NOT NULL,
  `total_popular_post_footer` int(10) NOT NULL,
  `total_recent_post_sidebar` int(11) NOT NULL,
  `total_popular_post_sidebar` int(11) NOT NULL,
  `total_featured_product_home` int(11) NOT NULL,
  `total_latest_product_home` int(11) NOT NULL,
  `total_popular_product_home` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_reset_password` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `banner_cart` varchar(255) NOT NULL,
  `banner_checkout` varchar(255) NOT NULL,
  `banner_product_category` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `cta_title` varchar(255) NOT NULL,
  `cta_content` text NOT NULL,
  `cta_read_more_text` varchar(255) NOT NULL,
  `cta_read_more_url` varchar(255) NOT NULL,
  `cta_photo` varchar(255) NOT NULL,
  `featured_product_title` varchar(255) NOT NULL,
  `featured_product_subtitle` varchar(255) NOT NULL,
  `latest_product_title` varchar(255) NOT NULL,
  `latest_product_subtitle` varchar(255) NOT NULL,
  `popular_product_title` varchar(255) NOT NULL,
  `popular_product_subtitle` varchar(255) NOT NULL,
  `testimonial_title` varchar(255) NOT NULL,
  `testimonial_subtitle` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_subtitle` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `stripe_public_key` varchar(255) NOT NULL,
  `stripe_secret_key` varchar(255) NOT NULL,
  `bank_detail` text NOT NULL,
  `before_head` text NOT NULL,
  `after_body` text NOT NULL,
  `before_body` text NOT NULL,
  `home_service_on_off` int(11) NOT NULL,
  `home_welcome_on_off` int(11) NOT NULL,
  `home_featured_product_on_off` int(11) NOT NULL,
  `home_latest_product_on_off` int(11) NOT NULL,
  `home_popular_product_on_off` int(11) NOT NULL,
  `home_testimonial_on_off` int(11) NOT NULL,
  `home_blog_on_off` int(11) NOT NULL,
  `newsletter_on_off` int(11) NOT NULL,
  `ads_above_welcome_on_off` int(1) NOT NULL,
  `ads_above_featured_product_on_off` int(1) NOT NULL,
  `ads_above_latest_product_on_off` int(1) NOT NULL,
  `ads_above_popular_product_on_off` int(1) NOT NULL,
  `ads_above_testimonial_on_off` int(1) NOT NULL,
  `ads_category_sidebar_on_off` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPRESSED;

INSERT INTO tbl_settings VALUES("1","logo.png","favicon.png","<p>Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an.Â Ea suas pertinax has.</p>
","Copyright 2023 - Standly Hardware Store","GML Commercial Building, <br> Mc Arthur Highway, Saluysoy, <br> Meycauayan Bulacan","standlyhardware1@gmail.com","+639917864562","","<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=655&height=289&hl=en&q=jollitex trading&t=p&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a href="https://capcuttemplate.org/">Capcut Template</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:299px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:289px;}.gmap_iframe {height:289px!important;}</style></div>","standlyhardware1@gmail.com","Standly Hardware Store","Thank you for sending email. We will contact you shortly.","A confirmation link is sent to your email address. You will get the password reset information in there.","4","4","5","5","8","8","8","Standly Hardware Store","Standly Hardware","<b>Standly Hardware Store</b> provides a bunch variety of products. Say goodbye to confusion and hello to a seamless shopping spree! Our website shopping guide has got you covered with step-by-step instructions to make your online shopping experience so easy!","banner_login.jpeg","banner_registration.jpeg","banner_forget_password.jpeg","banner_reset_password.jpeg","banner_search.jpeg","banner_cart.jpeg","banner_checkout.jpeg","banner_product_category.jpeg","banner_blog.jpg","Welcome To Our Ecommerce Website","Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, 
at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. ","Read More","#","cta.jpg","Featured Products","Our list on Top Featured Products","Latest Products","Our list of recently added products","Popular Products","Popular products based on customer's choice","Testimonials","See what our clients tell about us","testimonial.jpg","Latest Blog","See all our latest articles and news from below","Sign-up to our newsletter for latest promotions and discounts.","standlyhardware1@gmail.com","pk_test_0SwMWadgu8DwmEcPdUPRsZ7b","sk_test_TFcsLJ7xxUtpALbDo1L5c1PN","Gcash Number: 09270053202
Address: GML Commercial Building, Mc Arthur Highway, Saluysoy, Meycauayan Bulacan","","<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>","<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ae370d7227d3d7edc24cb96/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->","1","1","1","1","1","1","1","1","1","1","1","1","1","1");



CREATE TABLE `tbl_shipping_cost` (
  `shipping_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  PRIMARY KEY (`shipping_cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_shipping_cost VALUES("3","13","80");
INSERT INTO tbl_shipping_cost VALUES("6","2","70");
INSERT INTO tbl_shipping_cost VALUES("9","1","50");
INSERT INTO tbl_shipping_cost VALUES("11","3","60");
INSERT INTO tbl_shipping_cost VALUES("12","9","80");
INSERT INTO tbl_shipping_cost VALUES("13","8","90");
INSERT INTO tbl_shipping_cost VALUES("14","10","100");
INSERT INTO tbl_shipping_cost VALUES("15","11","100");
INSERT INTO tbl_shipping_cost VALUES("16","7","100");
INSERT INTO tbl_shipping_cost VALUES("17","12","60");
INSERT INTO tbl_shipping_cost VALUES("18","14","100");



CREATE TABLE `tbl_shipping_cost_all` (
  `sca_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(20) NOT NULL,
  PRIMARY KEY (`sca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_shipping_cost_all VALUES("1","100");



CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(255) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_size VALUES("26","Standard ");
INSERT INTO tbl_size VALUES("27","Free Size");
INSERT INTO tbl_size VALUES("49","1 Liter");
INSERT INTO tbl_size VALUES("50","2 Liters");
INSERT INTO tbl_size VALUES("51","3 Liters");
INSERT INTO tbl_size VALUES("52","4 Liters");
INSERT INTO tbl_size VALUES("53","5 Liters");
INSERT INTO tbl_size VALUES("54","10 Liters");
INSERT INTO tbl_size VALUES("55","1 Kilo");
INSERT INTO tbl_size VALUES("56","2 Kilos");
INSERT INTO tbl_size VALUES("57","3 Kilos");
INSERT INTO tbl_size VALUES("58","4 Kilos");
INSERT INTO tbl_size VALUES("59","5 Kilos");
INSERT INTO tbl_size VALUES("60","10 Kilo");
INSERT INTO tbl_size VALUES("61","1 Meter");
INSERT INTO tbl_size VALUES("62","2 Meters");
INSERT INTO tbl_size VALUES("63","3 Meters");
INSERT INTO tbl_size VALUES("64","4 Meters");
INSERT INTO tbl_size VALUES("65","5 Meters");
INSERT INTO tbl_size VALUES("66","10 Meters");
INSERT INTO tbl_size VALUES("67","1/8 Yard");
INSERT INTO tbl_size VALUES("68","1/4 Yard");
INSERT INTO tbl_size VALUES("69","1 Yard");
INSERT INTO tbl_size VALUES("70","1 Inch ");
INSERT INTO tbl_size VALUES("71","2 Inches");
INSERT INTO tbl_size VALUES("72","3 Inches");
INSERT INTO tbl_size VALUES("73","4 Inches");
INSERT INTO tbl_size VALUES("74","5 Inches");
INSERT INTO tbl_size VALUES("75","10 Inches");
INSERT INTO tbl_size VALUES("76","2 Yard");
INSERT INTO tbl_size VALUES("77","3 Yard");
INSERT INTO tbl_size VALUES("78","4 Yard");
INSERT INTO tbl_size VALUES("79","5 Yard");
INSERT INTO tbl_size VALUES("80","10 Yard");
INSERT INTO tbl_size VALUES("81","1 CM");
INSERT INTO tbl_size VALUES("82","2 CM");
INSERT INTO tbl_size VALUES("83","3 CM");
INSERT INTO tbl_size VALUES("84","4 CM");
INSERT INTO tbl_size VALUES("85","5 CM");
INSERT INTO tbl_size VALUES("86","10 CM");
INSERT INTO tbl_size VALUES("87","1 Gallon");
INSERT INTO tbl_size VALUES("88","2 Gallon");
INSERT INTO tbl_size VALUES("89","3 Gallon");
INSERT INTO tbl_size VALUES("90","4 Gallon");
INSERT INTO tbl_size VALUES("91","5 Gallon");
INSERT INTO tbl_size VALUES("92","10 Gallon");
INSERT INTO tbl_size VALUES("93","2 Watts");
INSERT INTO tbl_size VALUES("94","3 Watts");
INSERT INTO tbl_size VALUES("95","4 Watts");
INSERT INTO tbl_size VALUES("96","5 Watts");
INSERT INTO tbl_size VALUES("97","25 Watts");
INSERT INTO tbl_size VALUES("98","40 Watts");
INSERT INTO tbl_size VALUES("99","60 Watts");
INSERT INTO tbl_size VALUES("100","75 Watts");
INSERT INTO tbl_size VALUES("101","100 Watts");
INSERT INTO tbl_size VALUES("102","125 Watts");
INSERT INTO tbl_size VALUES("103","150 Watts");
INSERT INTO tbl_size VALUES("104","100 ML");
INSERT INTO tbl_size VALUES("105","350 ML");
INSERT INTO tbl_size VALUES("106","500 ML");
INSERT INTO tbl_size VALUES("107","750 ML");
INSERT INTO tbl_size VALUES("108","1000 ML");
INSERT INTO tbl_size VALUES("109","1500 ML");
INSERT INTO tbl_size VALUES("110","2000 ML");
INSERT INTO tbl_size VALUES("111","Extra Small");
INSERT INTO tbl_size VALUES("112","Small");
INSERT INTO tbl_size VALUES("113","Medium");
INSERT INTO tbl_size VALUES("114","Large");
INSERT INTO tbl_size VALUES("115","Extra Large");
INSERT INTO tbl_size VALUES("116","Set");
INSERT INTO tbl_size VALUES("117","6 pieces Set");
INSERT INTO tbl_size VALUES("119","1 galoons");



CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_slider VALUES("6","slider-6.jpg","Trending Item","CONSTRUCTION PRODUCTS","starting at ? 199.00","https://standlyhardware.com/product-category?id=1&type=top-category","Left");
INSERT INTO tbl_slider VALUES("7","slider-7.jpg","Trending Accessories","HAND TOOLS","starting at ? 115.00","https://standlyhardware.com/product-category?id=1&type=top-category","Left");
INSERT INTO tbl_slider VALUES("8","slider-8.jpg","Sale Offer","PLUMBING AND PIPES PRODUCTS","starting at ? 209.99","https://standlyhardware.com/product-category?id=1&type=top-category","Left");



CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_social VALUES("1","Facebook","https://www.facebook.com/#","fa fa-facebook");
INSERT INTO tbl_social VALUES("2","Twitter","https://www.twitter.com/#","fa fa-twitter");
INSERT INTO tbl_social VALUES("3","LinkedIn","","fa fa-linkedin");
INSERT INTO tbl_social VALUES("4","Google Plus","","fa fa-google-plus");
INSERT INTO tbl_social VALUES("5","Pinterest","","fa fa-pinterest");
INSERT INTO tbl_social VALUES("6","YouTube","https://www.youtube.com/#","fa fa-youtube");
INSERT INTO tbl_social VALUES("7","Instagram","https://www.instagram.com/#","fa fa-instagram");
INSERT INTO tbl_social VALUES("8","Tumblr","","fa fa-tumblr");
INSERT INTO tbl_social VALUES("9","Flickr","","fa fa-flickr");
INSERT INTO tbl_social VALUES("10","Reddit","","fa fa-reddit");
INSERT INTO tbl_social VALUES("11","Snapchat","","fa fa-snapchat");
INSERT INTO tbl_social VALUES("12","WhatsApp","https://www.whatsapp.com/#","fa fa-whatsapp");
INSERT INTO tbl_social VALUES("13","Quora","","fa fa-quora");
INSERT INTO tbl_social VALUES("14","StumbleUpon","","fa fa-stumbleupon");
INSERT INTO tbl_social VALUES("15","Delicious","","fa fa-delicious");
INSERT INTO tbl_social VALUES("16","Digg","","fa fa-digg");



CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO tbl_state VALUES("1","Bulacan");



CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL AUTO_INCREMENT,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL,
  `subs_active` int(11) NOT NULL,
  PRIMARY KEY (`subs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_subscriber VALUES("5","greenwd1154@mail.com","2022-03-20","2022-03-20 10:28:09","279ecfe9debbb091c664641f534857ee","1");
INSERT INTO tbl_subscriber VALUES("6","awsm785@mail.com","2022-03-20","2022-03-20 10:28:21","94096ae01fc65e71c50c7843d096e041","1");
INSERT INTO tbl_subscriber VALUES("10","stevenduran@gmail.com","2023-06-04","2023-06-04 21:20:25","5a0461e5c9fff29207f6bee3fc0664fa","0");
INSERT INTO tbl_subscriber VALUES("12","jovantalagtag08@gmail.com","2023-06-22","2023-06-22 05:19:12","dd59c8446ab761c8b3ba6a550872a510","0");
INSERT INTO tbl_subscriber VALUES("13","jovantalagtag14@gmail.com","2023-06-22","2023-06-22 05:22:04","7323874b0cf28d1dce2a79f7b3cae155","0");



CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_supplier VALUES("1","Standly Hardware ","Quezon City","09512356847","","standlyhardware@gmail.com");
INSERT INTO tbl_supplier VALUES("2","Standly Hardware - Main","Meycauayan City","09895623451","","standlyhardware1@gmail.com");
INSERT INTO tbl_supplier VALUES("3","Bulacan - Supplier","Meycauayan City, Bulacan","09783637465","","supplierbulacan@gmail.com");
INSERT INTO tbl_supplier VALUES("4","Quezon City - Supplier","Quezon City","09786866543","","qcsupplier@gmail.com");



CREATE TABLE `tbl_top_category` (
  `tcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcat_name` varchar(255) NOT NULL,
  `show_on_menu` int(1) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`tcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_top_category VALUES("1","Hand Tools","1","category-1.png");
INSERT INTO tbl_top_category VALUES("2","Electrical","1","category-2.png");
INSERT INTO tbl_top_category VALUES("3","Paints & Coatings ","1","category-3.png");
INSERT INTO tbl_top_category VALUES("4","Board Products","1","category-4.png");
INSERT INTO tbl_top_category VALUES("5","Cement & Concrete","1","category-5.png");
INSERT INTO tbl_top_category VALUES("6","Plumbing","0","category-6.png");



CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_user VALUES("1","Administrator","admin@mail.com","09916414671","f52412c4ff1dacd2111f4951f3db1260","user-1.png","Super Admin","Active");
INSERT INTO tbl_user VALUES("3","jovan","jovan@jovan","09878766546","admin","","admin","active");



CREATE TABLE `tbl_user_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_user_pos VALUES("1","admin","admin","Administrator","Cashier");
INSERT INTO tbl_user_pos VALUES("7","cashier","cashier","Roxy","Cashier");
INSERT INTO tbl_user_pos VALUES("15","administrator","admin","Administrator","Cashier");
INSERT INTO tbl_user_pos VALUES("17","steven30","admin","Steven William Duran","Cashier");
INSERT INTO tbl_user_pos VALUES("18","steven10","duran","Steven William Duran","Cashier");



CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `iframe_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tbl_video VALUES("1","Video 1","<iframe width="560" height="315" src="https://www.youtube.com/embed/L3XAFSMdVWU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>");
INSERT INTO tbl_video VALUES("2","Video 2","<iframe width="560" height="315" src="https://www.youtube.com/embed/sinQ06YzbJI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>");
INSERT INTO tbl_video VALUES("4","Video 3","<iframe width="560" height="315" src="https://www.youtube.com/embed/ViZNgU-Yt-Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>");

