mysql> create database ecommerce_application;

mysql> CREATE TABLE users(user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,role VARCHAR(20) NOT NULL,name VARCHAR(20) NOT NULL,email VARCHAR(30) NOT NULL UNIQUE,password VARCHAR(15));

mysql> CREATE TABLE products(product_id INT NOT NULL PRIMARY KEY,product_name VARCHAR(20) NOT NULL,colour VARCHAR(20) NOT NULL,price INT NOT NULL);

insert into users(role,name,email,password) values('inventory_manager','preeti','preeti.bhosale@gmail.com','preeti123');
insert into users(role,name,email,password) values('inventory_manager','esha','esha.1994@gmail.com','esha_1994');
insert into users(role,name,email,password) values('buyer','rajiv','rajiv.k@gmail.com','rajiv_123');
insert into users(role,name,email,password) values('buyer','pooja','pooja.j@gmail.com','poojaj123');
insert into users(role,name,email,password) values('buyer','rani','rani.b009@gmail.com','rani009');

mysql> insert into products values(101,'shirt','white',400);
mysql> insert into products values(102,'shirt','blue',500);
mysql> insert into products values(103,'shirt','black',450);
mysql> insert into products values(201,'watch','black',1000);
mysql> insert into products values(202,'watch','white',950);
mysql> insert into products values(203,'watch','brown',800);
mysql> select * from products;

create table order_details(user_id int,foreign key(user_id) references users(user_id),order_id int primary key not null auto_increment,order_date datetime not null default CURRENT_TIMESTAMP(),product1_id int,quantity1 int default 1,product2_id int,quantity2 int default 1,foreign key(product1_id) references products(product_id) on delete cascade on update cascade,foreign key(product2_id) references products(product_id) on delete cascade on update cascade);

create table orders(order_id int,foreign key(Order_id) references order_details(order_id),order_cost int not null);

mysql> delimiter $
mysql> create trigger insert_orders after insert on order_details for each row
    -> begin
    -> set @p1=0,@p2=0,@q1=0,@q2=0;
    -> select p.price into @p1 from products p  where p.product_id=new.product1_id;
    -> select p.price into @p2 from products p  where p.product_id=new.product2_id;
    -> set @q1=new.quantity1;
    -> set @q2=new.quantity2;
    -> set @total1=@p1*@q1;
    -> set @total2=@p2*@q2;
    -> set @ordercost=@total1+@total2;
    -> insert into orders(orders_id,order_cost)values(new.order_id,@ordercost);
    -> end;
    -> $

insert into order_details(user_id,product1_id,quantity1,product2_id,quantity2) values(5,101,1,103,1);
insert into order_details(user_id,product1_id,quantity1,product2_id,quantity2) values(4,102,1,203,2);
insert into order_details(user_id,product1_id,quantity1,product2_id,quantity2) values(6,103,2,201,1);
insert into order_details(user_id,product1_id,quantity1,product2_id,quantity2) values(4,101,1,202,1);
insert into order_details(user_id,product1_id,quantity1,product2_id,quantity2) values(5,103,2,201,3);

create table payment_details(payment_id int not null primary key auto_increment,payment_orderid int not null,foreign key(payment_orderid) references orders(orders_id),discount int,payable_amount int not null,payment_mode varchar(10) not null,payment_status varchar(15));

