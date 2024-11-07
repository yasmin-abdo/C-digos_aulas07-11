create database tarefas
use tarefas

create table tbl_usuarios (
usu_codigo int primary key auto_increment not null,
usu_nome varchar(100),
usu_email varchar(100));

create table tbl_tarefas (
tar_codigo int primary key auto_increment not null,
tar_setor varchar(100),
tar_prioridade varchar(100),
tar_descricao varchar(100),
tar_status varchar(100));

alter table tbl_tarefas add column fk_usu_codigo int;
alter table tbl_tarefas add constraint fk_usu_codigo 
foreign key (fk_usu_codigo) references tbl_usuarios(usu_codigo);
