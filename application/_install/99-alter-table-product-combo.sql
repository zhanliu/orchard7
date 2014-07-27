alter table `product`
Add column original_price double(10,2) AFTER `price`


alter table `combo`
Add column original_price double(10, 2) AFTER `price`


alter table `order_details`
Add column product_id int(11) AFTER `combo_quantity`;

alter table `order_details`
Add column product_quantity int(11) AFTER `product_id`;

alter table `order_details`
Modify column combo_id int(11) NULL;

alter table `order_details`
Modify column combo_quantity int(11) NULL;

/* ------------ */

alter table `order_details` drop product_id;
alter table `order_details` drop product_quantity;
alter table `order_details` drop combo_id;
alter table `order_details` drop combo_quantity;

alter table `order_details` add column item_id int(20) after `order_id`;
alter table `order_details` add column item_quantity int(11) after `item_id`;
alter table `order_details` add column item_type varchar(40) after `item_quantity`;


/* ----------- 2014/7/13 ------------mapping order and store --------------*/
alter table `order1` add column store_id int(20) after `customer_id`;
/* ----------- 2014/7/17 ------------add order delivery fee --------------*/
alter table `order1` add column delivery_fee int(10) after `total_amount`;
/* ----------- 2014/7/26 ------------add order delivery fee --------------*/
alter table `order1` add column order_number varchar(40) after `id`;
alter table `order1` add column is_verified int(1) after `is_diy`;

/* ----------- 2014/7/26 ------------add order status type --------------*/
alter table `order_status` add column type int(1) after `status`;
update order_status set type = 0 where status_code in (0, 1, 2);
update order_status set type = 1 where status_code in (3, 4, 5);

