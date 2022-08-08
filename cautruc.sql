create database Asm191;

use Asm191;

create table categorys
(
	categoryID nvarchar(5) not null primary key,
    categoryName nvarchar(50) not null
);

create table producers
(
	producerID nvarchar(5) primary key,
    producerName varchar(30) not null unique
);

create table products
(
	productID varchar(10) not null primary key,
    productName varchar(50) not null,
    productPrice float not null,
    productDetails varchar(3000) null,
    productImage1 varchar(30) not null,
    productImage2 varchar(30) null,
    productImage3 varchar(30) null,
    producerID nvarchar(5) not null,
    categoryID nvarchar(5) not null,

    constraint foreign key (producerID) references producers(producerID),
    constraint foreign key (categoryID) references categorys(categoryID)
);

create table admins
(
	adminID nvarchar(10) primary key,
    `password` nvarchar(30) not null,
    fullname nvarchar(30) not null,
    address nvarchar(30) not null,
    phone nvarchar(30) not null,
    email nvarchar(30) not null
);

create table customers
(
	username nvarchar(30) not null primary key,
    `password` nvarchar(30) not null,
    fullname nvarchar(30) not null,
    address nvarchar(30) not null,
    phone nvarchar(30) not null,
    email nvarchar(30) not null
);

create table invoiceDetails
(
	invoiceDetailID nvarchar(10) not null primary key,
	`date` nvarchar(30) not null,
    price float not null,
    quantity int not null,
    productID varchar(10) not null,

    constraint foreign key (productID) references products(productID)
);

create table invoices
(
	invoiceID nvarchar(10) not null primary key,
    invoiceDetailID nvarchar(10) not null,
    username nvarchar(30) not null,

    constraint foreign key (username) references customers(username),
    constraint foreign key (invoiceDetailID) references invoiceDetails(invoiceDetailID)
);

