-- drop table patient;
-- drop table doctor;
-- drop table association;
-- drop table post;

create table patient (
    id int primary key AUTO_INCREMENT,
    id_association int,
    password varchar(40),
    username varchar(40) not null unique,
    fname varchar(40),
    lname varchar(40),
    address varchar(40),
    email varchar(40),
    datesub datetime DEFAULT CURRENT_TIMESTAMP
);

create table doctor (
    id int primary key AUTO_INCREMENT,
    username varchar(40) not null unique,
    fname varchar(40),
    lname varchar(40),
    address varchar(40),
    email varchar(40),
    password varchar(40),
    telephone varchar(40),
    datesub datetime DEFAULT CURRENT_TIMESTAMP
);

create table association (
    id int primary key AUTO_INCREMENT,
    id_patient int,
    id_doctor int,
    datesub datetime DEFAULT CURRENT_TIMESTAMP,
    foreign key(id_patient) references patient(id),
    foreign key(id_doctor) references doctor(id)
);

create table posts (
    id int primary key AUTO_INCREMENT,
    id_doctor int,
    content varchar(255),
    date_post datetime DEFAULT CURRENT_TIMESTAMP,
    foreign key(id_doctor) references doctor(id)
);


alter table patient
add frequency int;

alter table patient
add drug varchar(50);