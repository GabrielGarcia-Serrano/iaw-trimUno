create database tienda;
use tienda;
create table pedidos (id int not null auto_increment primary key, idPedido int not null, producto varchar(50) not null, precio int not null);
create table productos (producto varchar(50) not null primary key, precio int not null, descripcion text, imagen varchar(50));

insert into productos (producto, precio, descripcion, imagen) values ('Uranio empobrecido', 100, 'Ideal para una planta nuclear', 'uranioEmpobrecido.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Uranio enriquecido', 200, 'El tratado sobre armas nucleares nunca se ha visto tan amenazado', 'uranioEnriquecido.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Plutonio', 500, 'Producto de calidad excepcional importado de un planeta. ¿O es planeta enano?', 'plutonio.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Basura radiactiva', 5, '¿Quieres provocar mutaciones y no sabes cómo? Esta es la solución ideal', 'basuraRadiactiva.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Radón', 7, 'Gas noble para usos innobles', 'radon.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Hidrógeno', 1, 'Di no a la fusión nuclear', 'hidrogeno.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Polonio', 50, 'Dale un agradecimiento a Marie Curie y ionízate', 'polonio.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Radio', 10, '(La imagen no se corresponde con el producto)', 'radio.jpg');
insert into productos (producto, precio, descripcion, imagen) values ('Tritio', 1000, 'Única utilidad real del hidrógeno', 'tritio.jpg');
