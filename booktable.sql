use rental_system;

create table user_details(
username varchar(80)not null,
useremail varchar(50)not null,
userpass varchar(25)not null,
mobile varchar(10)not null,
city varchar(40)not null,
district varchar(40)not null,
pincode varchar(10)not null,
state varchar(40)not null

);

insert into user_details(username,useremail,userpass,mobile,city,district,pincode,state)
values("harini","harini@gmail.com","123456","1122334455","kundapura","udupi","124563","karnataka"),
("kamala","kamala@gmail.com","112233","1122334455","bengalore","brahmavara","124563","karnataka")
;
select * from user_details where useremail="harini@gmail.com" and userpass="123456";
select * from user_details;
select * from cardetails;

create table booktemp(
carid varchar(40)not null,
from_d date not null,
to_d date not null

);

insert into  booktemp(carid,from_d,to_d)values(4,"2025-04-06","2025-04-10"),(2,"2025-04-15","2025-04-20"),(4,"2025-04-25","2025-04-27");
insert into  booktemp(carid,from_d,to_d)values(2,"2025-04-06","2025-04-10");
select * from booktemp;

-- select cd.* from cardetails cd left join booktemp b on cd.carid=b.carid and (b.from_d<=? and b.to_d>=?) where b.carid is null;

select cd.* from cardetails cd where cd.carid not in( select b.carid from booktemp b where (from_d<="2025-04-06" and to_d>="2025-04-10") or (from_d<="2025-04-06" and to_d>="2025-04-10") or (from_d>="2025-04-06" and to_d<="2025-04-10"));
use rental_system;
create table book(
carid varchar(50)not null,
username varchar(50)not null,
useremail varchar(50)not null,
from_d date not null,
to_d date not null,
price int not null,
days int not null,
total_price int not null,
b_status varchar(20)not null,
payment_id varchar(35)not null default "NA"
);
select * from book;



 delete from book;
truncate table book ;
-- delete from book where carid=1;
--  SET sql_safe_updates=0;
-- drop table book;

-- update book set b_status='cancelled' WHERE carid=1 and useremail='harini@gmail.com' and from_d='2025-04-10' and to_d='2025-04-10';
