create database crud2;
use crud2;

create table person(
	PersonId int not null auto_increment primary key,
	Name varchar(500) not null,
    TypeDocument varchar(50) not null,
    Document varchar(100) not null,
    Phone varchar(100) not null,
	Birthdate datetime not null,
	CreationTime datetime not null
);