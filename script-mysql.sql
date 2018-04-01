CREATE SCHEMA 'loja-php' DEFAULT CHARACTER SET utf8 ;


create table categorias (id integer auto_increment primary key, nome varchar(255));
create table produtos (id integer auto_increment primary key, nome varchar(255), preco decimal(10,2), descricao text, categoria_id integer, usado boolean default false);
create table usuarios (id integer auto_increment primary key, email varchar(255), senha varchar(255));

insert into usuarios (email,senha) values ('admin@gmail.com.br', 'e10adc3949ba59abbe56e057f20f883e');
--123456
insert into categorias (nome) values ("esporte"), ("escolar"), ("mobilidade");
insert into produtos (nome, preco, descricao, categoria_id) values ('Carro', 20000, 'Descricao do produto Carro', 3);
insert into produtos (nome, preco, descricao, categoria_id) values ('Motocicleta', 10000, 'Descricao do produto Motocicleta', 3);
insert into produtos (nome, preco, descricao, categoria_id) values ('Bicicleta', 300, 'Descricao do produto Bicicleta', 3);

select * from produtos;
