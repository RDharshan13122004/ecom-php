
create database mystore;

use mystore;

create table admin_table (admin_id int auto_increment, admin_name varchar(100),admin_email varchar(255), admin_password varchar(225), admin_ip varchar(100), primary key (admin_id));

create table brands (brand_id int auto_increment, brand_title varchar(100), primary key (brand_id));

create table cart_details (product_id int auto_increment, Ip_address varchar(255), Quantity int(100), Time timestamp , admin_ip varchar(100), primary key (product_id));

create table category (category_id int auto_increment, category_title varchar(100), primary key (category_id));

create table order_pending (order_id int auto_increment, user_id int, invoice_number int(255), product_id int , quantity int(255),  other_status int(255),primary key (order_id));

create table products (product_id int auto_increment, product_title varchar(255), product_description varchar(225), product_keywords varchar(225), category_id int, brand_id int, product_img1 varchar(255),product_img2 varchar(255), product_img3 varchar(255) product_price int, date timestamp, status varchar(100), primary key (product_id));

create table user_orders (order_id int auto_increment, user_id int, amount_due int(225), invoice_number int(225), total_product int(255), order_date timestamp, order_status varchar(255), primary key (order_id));

create table user_payments (payment_id int auto_increment, order_id int, invoice_number int, amount int, payment_mode varchar(255), brand_id int, date timestamp, primary key (payment_id));

create table user_table (user_id int auto_increment, user_name varchar(100), user_email varchar(100), user_password varchar(225), user_image varchar(255), user_ip varchar(100), user_address varchar(255), user_mobile varchar(20), primary key (user_id));

