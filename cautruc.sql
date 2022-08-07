create database Asm191;

use Asm191;

create table categrory
(
	categoryID varchar(5) not null primary key,
    categoryName varchar(30) not null unique
);

create table product
(
	productID varchar(5) not null primary key,
    productName varchar(50) not null,
    prince int not null,
    image varchar(30) not null,
	details varchar(300) not null,
	categoryID varchar(3) not null,
    
	constraint fk_categoryID foreign key(categoryID)
                        references category(categoryID)
);

create table customer
(
    username varchar(20) not null primary key,
    password varchar(20) not null,
    fullName varchar(30) not null,
    address varchar(30) not null, 
    email varchar(30) not null,
    phone varchar(10) not null
);
create table admin
(
    adminID varchar(10) not null primary key,
    adminPwd varchar(20) not null,
    fullname nvarchar(30) not null,
    email varchar(20) not null
);


