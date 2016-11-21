<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    echo "error";
    die("Connection failed: " . mysql_connect_error());
}
echo "Connected successfully";

// Create database
$sql = 'CREATE Database if not exists ecommerce_application';
   $retval = mysql_query( $sql);
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   echo "</br>Database created successfully";
mysql_select_db('ecommerce_application',$conn);


//create tables
$createusers="CREATE TABLE if not exists users(role VARCHAR(20) NOT NULL,name VARCHAR(20) NOT NULL,email VARCHAR(30) NOT NULL UNIQUE,username varchar(20),password VARCHAR(15))";
$createproducts="CREATE  TABLE if not exists products(product_id INT NOT NULL PRIMARY KEY,product_name VARCHAR(20) NOT NULL,colour VARCHAR(20) NOT NULL,price INT NOT NULL)";
$createorder_details="create  TABLE if not exists order_details(order_id int not null,product_id int,foreign key(product_id) references products(product_id),quantity int default 1 not null)";
$createorders="create  TABLE if not exists orders(order_id int not null primary key,order_cost int not null)";
$createpayment_details="create  TABLE if not exists payment_details(user_email varchar(30) references users(email),payment_id  int not null auto_increment primary key,order_id int,foreign key(order_id) references orders(Order_id),order_date date,discount int,net_amount int,payment_mode varchar(10),payment_status varchar(15))";
   if(mysql_query( $createusers) and mysql_query($createproducts) and mysql_query($createorder_details) and mysql_query($createorders) and mysql_query($createpayment_details)) 
   {
     echo "</br>tables created successfully";
   }
   else
   {
    die('Could not create tables: ' . mysql_error());
   }

//insert values
$insertusers="insert ignore into `users` values('buyer','preeti','preeti.bhosale@gmail.com','preetib','preeti123'),('buyer','esha','esha.1994@gmail.com','eshaa','esha_1994'),('buyer','rajiv','rajiv.k@gmail.com','rajivk','rajiv_123'),('buyer','pooja','pooja.j@gmail.com','poojaj','poojaj123'),('buyer','rani','rani.b009@gmail.com','ranib','rani009')";
$insertproducts="insert ignore into `products` values(101,'shirt','white',400),(102,'shirt','blue',500),(103,'shirt','black',450),(201,'watch','black',1000),(202,'watch','white',950),(203,'watch','brown',800)";
$insertorder_details="insert ignore into `order_details` values(1,101,1),(1,201,1),(2,201,2),(2,102,3),(3,103,1),(3,203,2),(4,202,2),(5,203,1),(5,101,2)";
 if(mysql_query( $insertusers) and mysql_query($insertproducts) and mysql_query($insertorder_details)) 
   {
     echo "</br>inserted successfully";
   }
   else
   {
    die('Could not insert values: ' . mysql_error());
   }


$proc_place_order="create procedure place_order(in username varchar(30),in orderid int) 
			begin 
 			declare orderid1 int;
 			declare ordercost int; 
 			create temporary table temp_table  select order_details.order_id,order_details.quantity,products.price,order_details.quantity*products.price as 			  total from products,order_details   where order_details.product_id=products.product_id;
 			create temporary table temp_table1  select order_id,sum(total) as total_price from temp_table group by(order_id);
 			set orderid1=orderid; 
 			set ordercost= (select total_price from temp_table1 where order_id=orderid1);
 			insert ignore into orders(order_id,order_cost) values(orderid1,ordercost);
 			drop temporary table temp_table; 
 			drop temporary table temp_table1;
 			insert ignore into payment_details(user_email,order_id,net_amount,payment_status)values(username,orderid1,ordercost,'pending');
 			end";
if(mysql_query( $proc_place_order)) 
   {
     echo "</br>place_order procedure created successfully";
   }
   else
   {
    die('Could not create procedure: ' . mysql_error());
   }

$proc_do_payment="create procedure do_payment(in paymentid int,in orderdate date,in disc int,in pay_mode varchar(10))
			begin
			declare netamount int;
			if(disc!=0) then
			set netamount=(select net_amount from payment_details where payment_id=paymentid);
			set netamount=netamount-((disc*netamount)/100);
			update payment_details set net_amount=netamount where payment_id=paymentid;
			end if;
			start TRANSACTION;
			update payment_details set discount=disc,order_date=orderdate,payment_mode=pay_mode where payment_id=paymentid;
			update payment_details set payment_status='successfull' where payment_id=paymentid;
			commit;
			end"; 
if(mysql_query( $proc_do_payment)) 
   {
     echo "</br>do_payment procedure created successfully";
   }
   else
   {
    die('Could not create procedure: ' . mysql_error());
   }


$place_order1="call place_order('rajiv.k@gmail.com',1)";
mysql_query($place_order1);
$do_payment1="call do_payment(1,'2016-08-10',20,'online')";
mysql_query($do_payment1);
$place_order2="call place_order('preeti.bhosale@gmail.com',2)";
mysql_query($place_order2);
$do_payment2="call do_payment(2,'2016-11-10',0,'online')";
mysql_query($do_payment2);
$place_order3="call place_order('esha.1994@gmail.com',3)";
mysql_query($place_order3);
$do_payment3="call do_payment(3,'2016-11-13',10,'cod')";
mysql_query($do_payment3);
$place_order4="call place_order('pooja.j@gmail.com',4)";
mysql_query($place_order4);
$do_payment4="call do_payment(4,'2016-10-14',30,'online')";
mysql_query($do_payment4);
$place_order5="call place_order('preeti.bhosale@gmail.com',5)";
mysql_query($place_order5);
$do_payment5="call do_payment(5,'2016-08-04',0,'cod')";
mysql_query($do_payment5);

$order_report_view="create or replace view order_report as select order_id,net_amount,order_date,discount,payment_mode,payment_status from payment_details;";
mysql_query($order_report_view);
$display_view="select * from order_report";
						
						if($result=mysql_query($display_view))
						{
							echo "<br>order details view:";
							echo "<table border=1 cellspacing=0 width=950>";
							echo "<th>Order id</th>";
							echo "<th>Date</th>";
							echo "<th>Discount(%)</th>";
							echo "<th>Order Total</th>";
							echo "<th>Payment Mode</th>";
							echo "<th>Payment Status</th>";
							while($row=mysql_fetch_row($result))
							{
								
								echo "<tr>";
								echo "<br><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					else
					{
						echo "error".mysql_error();
					}

$last_month_report="SELECT payment_details.order_id,payment_details.order_date,GROUP_CONCAT(products.product_name),group_concat(products.price),payment_details.discount,payment_details.net_amount,users.name,payment_details.user_email FROM order_details,orders,products,users,payment_details where payment_details.order_id=orders.order_id and orders.order_id=order_details.order_id and order_details.product_id=products.product_id and payment_details.user_email=users.email and payment_details.order_date > DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)";

                                              if($result1=mysql_query($last_month_report))
						{
							echo "<br>last month report:";
							echo "<table border=1 cellspacing=0 width=950>";
							echo "<th>Order id</th>";
							echo "<th>Date</th>";
							echo "<th>Product names</th>";
							echo "<th>Cost Of Each product</th>";
							echo "<th>Order Cost</th>";
							echo "<th>User Name</th>";
							echo "<th>User Email</th>";
							while($row=mysql_fetch_row($result1))
							{
								
								echo "<tr>";
								echo "<br><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					else
					{
						echo "error".mysql_error();
					}

mysql_close($conn);
?>
