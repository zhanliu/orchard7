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

alter table `order_details` delete column product_id;
alter table `order_details` delete column product_quantity;
alter table `order_details` delete column combo_id;
alter table `order_details` delete column combo_quantity;

alter table `order_details` add column item_id int(20) after `order_id`;
alter table `order_details` add column item_quantity int(11) after `item_id`;
alter table `order_details` add column item_type varchar(40) after `item_quantity`;
