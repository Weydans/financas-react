/**
 * Arquivo responsavel pela estrutura de banco de dados e migrações
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */

CREATE SCHEMA IF NOT EXISTS `financas` DEFAULT CHARACTER SET utf8;
-- DROP DATABASE financas;


USE financas;


/** *********** **/
/** Tabela user **/
/** *********** **/
CREATE TABLE IF NOT EXISTS user(
    id          int(11) not null auto_increment primary key,
    name        varchar(255),
    email       varchar(255),
    password    varchar(255)
);
-- DROP TATBLE IF EXISTS user;


/** *************** **/
/** Tabela movement **/
/** *************** **/
CREATE TABLE IF NOT EXISTS movement(
    id                    int(11) not null auto_increment primary key,
    movement_category_id  int(11),
    movement_status_id    int(11),
    movement_type_id      int(11), 
    movement_class_id     int(11),        
    description           varchar(255),
    value                 double(9,2) ,
    observation           text default null,
    release_date          date,
    expiration_date       date,
    payment_date          date default null,
    created_at            datetime default current_timestamp,
    updated_at            datetime default current_timestamp on update current_timestamp
);
-- DROP TABLE IF EXISTS movement;


/** ******************** **/
/** Tabela movement_file **/
/** ******************** **/
CREATE TABLE IF NOT EXISTS movement_file(
    id          int(11) not null auto_increment primary key,
    movement_id int(11),
    path        varchar(255)
);
-- DROP TABLE IF EXISTS movement_file;


/** ********************** **/
/** Tabela movement_status **/
/** ********************** **/
CREATE TABLE IF NOT EXISTS movement_status(
    id                  int(11) not null auto_increment primary key,
    name                varchar(255),
    description         varchar(255)
);
-- DROP TABLE IF EXISTS movement_status;


/** *************** **/
/** Tabela category **/
/** *************** **/
CREATE TABLE IF NOT EXISTS movement_category(
    id                  int(11) not null auto_increment primary key,
    movement_class_id   int(11),
    name                varchar(255),
    description         varchar(255)
);
-- DROP TABLE IF EXISTS category;


/** ******************** **/
/** Tabela movement_type **/
/** ******************** **/
CREATE TABLE IF NOT EXISTS movement_type(
    id                  int(11) not null auto_increment primary key,
    name                varchar(255),
    description         varchar(255)
);
-- DROP TABLE IF EXISTS movement_type;


/** ********************* **/
/** Tabela movement_class **/
/** ********************* **/
CREATE TABLE IF NOT EXISTS movement_class(
    id          int(11) not null auto_increment primary key,
    name        varchar(255),
    description varchar(255)
);
-- DROP TABLE IF EXISTS movement_class;
