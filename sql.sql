create database  db_EmpregosEtimA;
use  db_EmpregosEtimA;

create table tbl_empregos(
	Registro int primary key,
    Nome varchar(80) not null,
    Cargo varchar(20) not null,
    Area varchar(25) not null,
    Salario decimal(10,2) not null,
    eStatus varchar(8) not null
);