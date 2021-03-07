CREATE DATABASE VEHICLE;
USE VEHICLE;

create table Vehicle_DB(
 v_id int NOT NULL,
 v_type varchar(50),
 model varchar(50),
 model_year int,
 license varchar(14) NOT NULL,
 rate float,
 
PRIMARY KEY (v_id)
 );
 
 create table Users(
 u_id int NOT NULL,
 u_name varchar(50),
 u_type varchar(50),
 email varchar(50),
 phone_number BIGINT,
 Address varchar(70),
 primary key (u_id)
 );
 
 create table Bookings(
  v_id int,
 u_id int,
 pikup_location varchar(60),
 booking_date date,
 return_date date,
 amount float,
 foreign key (v_id) references Vehicle_DB(v_id) on delete cascade 
 on update cascade,
 foreign key (u_id) references Users(u_id) on delete cascade 
 on update cascade
 );
 
 insert into Vehicle_DB values
 (23, "Car", "Wagon R", "2015", "KA 01 JK 2033", 500),
 (34, "Car", "Swift Dzire", "2017", "KA 05 CJ 4269", 850),
 (1, "Motorcycle", "Yamaha RX-100", "2020", "TN 02 FK 9602", 600),
 (10, "Motorcycle", "Vespa", "2018", "KL 01 PE 9988", 500),
 (4, "Car", "Wagon R", "2020", "MH 08 PL 4752", 650);
 

 
