drop database if exists Restaurante;

create database Restaurante;

use Restaurante;

create table cliente (
	cliente_id integer auto_increment not null,
	nome varchar(80) not null,
	endereco varchar(255) not null,
	telefone varchar(11) not null unique,
	email varchar(255)  not null unique,
	cpf varchar(11)  not null unique,
	senha varchar(255)  not null,
	primary key (cliente_id)
);

create table produto (
	produto_id integer auto_increment not null,
	nome varchar(80) not null,
	preco decimal(15,2) not null,
	ingredientes varchar(255) not null,
	imagem varchar(45)  not null,
	primary key (produto_id)
);

create table pedidos (
	pedidos_id integer auto_increment not null,
	status varchar(45) not null,
	dt datetime not null,
	cliente_id int,
	primary key (pedidos_id),
	constraint fk_pedidos_cliente
		foreign key (cliente_id)
		references cliente (cliente_id)
);

create table item_pedidos (
	pedidos_id int,
	produto_id int,
	primary key (pedidos_id, produto_id),
	constraint fk_item_pedidos
		foreign key (pedidos_id)
		references pedidos (pedidos_id),
	constraint fk_item_produto
		foreign key (produto_id)
		references produto (produto_id)
);

/*cadastro cliente*/
insert into cliente (nome, endereco, telefone, email, cpf, senha) values 
('joão', 'rua1', '12345678901', 'qwerty@gmail.com', '12345678901', '12345678'), 
('tao', 'rua2', '09876543210', 'ytrewq@gmail.com', '09876543210', '12345678');

select * from cliente c;


/*cadastro produto*/
insert into produto (nome, preco, ingredientes, imagem) values 
('pao', 15, 'farinha', 'img.1'), 
('leite', 10.50, 'vaca', 'img.2');

select * from produto p;


/*pedidos*/
insert into pedidos (status, dt, cliente_id) values 
('em produção', '2016-12-15 22:30:00', 1), 
('finalizado', '2016-12-15 20:30:00', 2);

select * from pedidos pe;


/*item_pedidos*/
insert into item_pedidos (pedidos_id, produto_id) values 
(1, 2), 
(2, 1);

select * from item_pedidos pe;


