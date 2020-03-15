CREATE database p16003;

CREATE TABLE p16003.payment_form (
	fullname varchar(50) NOT NULL,
	username varchar(50) NOT NULL,
	user_password varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	birthday varchar(50) NOT NULL,
	age varchar(3) NOT NULL,
	address varchar(100) NOT NULL,
	payment varchar(50) NOT NULL,
	comments text
	
);