CREATE DATABASE VehicleRentalManagement;
USE VehicleRentalManagement;
 
 -- Operations
 -- Add model
 -- Delete model cascade
 -- Update model cascade
 create table Model(
	 m_id int not null,
	 v_type varchar(50),
	 model varchar(50),
	 model_year int,
	 rate float,
	 primary key(m_id)
 );
 
 -- Operations
 -- Add unit
 -- Remove unit
 create table Vehicles(
	 license VARCHAR(14) NOT NULL,
     m_id int not null,
     taken int not null,
     primary key(license),
     foreign key(m_id) references Model(m_id) on update cascade on delete cascade
 );
 
 create table Users(
	 u_id int NOT NULL,
	 u_name varchar(50) not null,
	 u_type varchar(50) not null,
	 email varchar(50),
	 phone_number BIGINT,
	 Address varchar(70),
	 primary key (u_id)
 );
 
 create table Bookings(
	 book_no int not null unique,
	 license varchar(14) NOT NULL,
	 u_id int NOT NULL,
	 pikup_location varchar(60),
	 booking_date date,
	 return_date date,
	 amount float,
     returned int not null,
	 foreign key (license) references Vehicles(license) on delete cascade 
	 on update cascade,
	 foreign key (u_id) references Users(u_id) on delete cascade 
	 on update cascade
 );