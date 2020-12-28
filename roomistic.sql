--  MySQL file made for DBMS mini project

drop database if exists roomistic;
create database roomistic;
use roomistic;

create table customers (
	cust_id int auto_increment,
    cust_name varchar(20),
    cust_phone bigint,
    email varchar(40),
    primary key(cust_id)
);

create table rooms (
	room_id int auto_increment,
	room_type varchar(20),
	room_status varchar(20),
	rent int,
	primary key(room_id)
);

create table reservations (
	res_id int auto_increment,
	cust_id int,
	room_id int,
	start_date date,
	end_date date,
	primary key(res_id, cust_id, room_id),
	foreign key(cust_id) references customers(cust_id) on delete cascade,
	foreign key(room_id) references rooms(room_id) on delete cascade
);

create table ratings(
	cust_id int,
	room_id int,
	rating int,
	primary key(cust_id, room_id),
	foreign key(cust_id) references customers(cust_id) on delete cascade,
	foreign key(room_id) references rooms(room_id) on delete cascade
);

create table staff(
	staff_id int auto_increment,
	staff_name varchar(50),
	job varchar(20),
	salary int,
	staff_phone bigint,
	primary key(staff_id)
);

insert into customers values(1, "Sheldon", 9364847365,"ufuefhbjefj@gmsjdh.in");
insert into customers values(2, "Leaonard", 9082761424,"fefefjefj@gmasfh.om" );
insert into customers values(3, "Rajesh", 9827614522,"awfdgmasjdufh.om" );

insert into rooms values(1, "delux",'available', 1000 );
insert into rooms values(2, "regular",'booked', 700 );
insert into rooms values(3, "gold",'available', 1500 );

insert into reservations values(1, 2, 2, '2020-03-24','2020-04-10');
insert into reservations values(2, 3, 1, '2020-07-24','2020-07-10');
insert into reservations values(3, 1, 3, '2020-06-12','2020-08-07');

insert into ratings values(1, 3, 5);
insert into ratings values(2, 2, 3);
insert into ratings values(3, 1, 5);

insert into staff values(1, 'Howard', 'Janitor', 15000, 9816725536);
insert into staff values(2, 'Penny', 'Head Chef', 70000, 8907382976);
insert into staff values(3, 'Stuart', 'Waiter', 20000, 3780298746);
