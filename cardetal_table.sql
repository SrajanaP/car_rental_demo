use rental_system;
drop table cardetails;
create table cardetails(
carid int primary key AUTO_INCREMENT,
carmodel varchar(50)not null,
price int(10)not null,
caryear int(10)not null,
fueltype varchar(30)not null,
location text not null,
descriptions varchar(70)not null,
carimg varchar(150)not null

 
);
 
desc cardetails;
use phpcheck;
use cartestdb;
show tables;
create table imgupload(
carid int primary key AUTO_INCREMENT,
carimg text not null
);

use phpcheck;
select * from cardetails;