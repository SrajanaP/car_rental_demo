use rental_system;

create table payment(
carid varchar(30)not null,
useremail varchar(30)not null,
from_d date not null,
to_d date not null,
t_price int not null,
ad_amt int not null,
r_amt int not null,
transcation_id varchar(40)not null,
p_status varchar(20)not null

);

select * from payment;
delete from payment;

