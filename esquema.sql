create database cotizaciones;
use cotizaciones;
create table if not exists usuarios (
  id     bigint unsigned not null auto_increment,
  correo varchar(255)    not null,
  pass   varchar(255)    not null,
  primary key (id)
);


create table if not exists clientes (
  id          bigint unsigned not null auto_increment,
  idUsuario   bigint unsigned not null,
  razonSocial varchar(255)    not null,
  primary key (id),
  foreign key (idUsuario) references usuarios (id)
    on delete cascade
    on update cascade
);

create table if not exists ajustes (
  idUsuario             bigint unsigned not null,
  remitente             varchar(100),
  mensajePresentacion   varchar(512),
  mensajeAgradecimiento varchar(512),
  mensajePie            varchar(512),
  foreign key (idUsuario) references usuarios (id)
    on delete cascade
    on update cascade
);

create table if not exists cotizaciones (
  id          bigint unsigned not null auto_increment,
  idUsuario   bigint unsigned not null,
  idCliente   bigint unsigned not null,
  descripcion varchar(255)    not null,
  fecha       date            not null,
  primary key (id),
  foreign key (idCliente) references clientes (id)
    on delete cascade,
  foreign key (idUsuario) references usuarios (id)
    on delete cascade
    on update cascade
);


create table if not exists servicios_cotizaciones (
  id              bigint unsigned not null auto_increment,
  idCotizacion    bigint unsigned not null,
  servicio        varchar(255)    not null,
  costo           decimal(9, 2)   not null,
  tiempoEnMinutos bigint unsigned not null,
  multiplicador   int unsigned    not null, /*Saber si los minutos están expresados en años, meses, días, horas o minutos*/
  primary key (id),
  foreign key (idCotizacion) references cotizaciones (id)
    on delete cascade
    on update cascade
);

create table if not exists caracteristicas_cotizaciones (
  id             bigint unsigned not null auto_increment,
  idCotizacion   bigint unsigned not null,
  caracteristica varchar(255)    not null,
  primary key (id),
  foreign key (idCotizacion) references cotizaciones (id)
    on delete cascade
    on update cascade
);
CREATE TABLE IF NOT EXISTS sesiones (
  id            VARCHAR(255)    NOT NULL PRIMARY KEY,
  datos         TEXT            NOT NULL,
  ultimo_acceso BIGINT UNSIGNED NOT NULL
);