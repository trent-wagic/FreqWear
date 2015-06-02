DROP DATABASE IF EXISTS FreqWear;
CREATE DATABASE FreqWear;

USE FreqWear;

/*USER INFO*/
DROP TABLE IF EXISTS users; 
CREATE TABLE users
(
    u_id         INT AUTO_INCREMENT  NOT NULL,
    uname        varchar(255) UNIQUE NOT NULL,
    pw           varchar(255) NOT NULL,
    first_name   varchar(255) NOT NULL,
    last_name    varchar(255) NOT NULL,
    email        varchar(255) UNIQUE NOT NULL,
    hint         varchar(255) NOT NULL,
    role         INT NOT NULL, /*USER: 0, ADMIN: 1, SUPER ADMIN: 2, GOD: 3 */
    PRIMARY KEY (u_id)
);

/*CONTAINS THE RECORDS OF ALL DOWNLOADS BY ALL USERS*/
DROP TABLE IF EXISTS user_download;
DROP TABLE IF EXISTS sales;
CREATE TABLE sales
(
    sales_id     INT AUTO_INCREMENT NOT NULL,
    u_id         INT NOT NULL,
    uname        varchar(255) NOT NULL,
    f_id         INT NOT NULL,
    fname        varchar(255) NOT NULL,
    sales_date   varchar(255) NOT NULL,
    sales_amt    DOUBLE NOT NULL,
    device_id    varchar(255) NOT NULL,
    PRIMARY KEY (sales_id)
);

/*FILES CURRENTLY IN THE SERVER*/
DROP TABLE IF EXISTS files;
CREATE TABLE files
(
    f_id         INT AUTO_INCREMENT NOT NULL,
    fname        varchar(255) UNIQUE NOT NULL,
    description  varchar(500) NOT NULL,
    logo         varchar(500) NOT NULL,
    protocol     varchar(500) NOT NULL,
    PRIMARY KEY (f_id)
);

/*FILES CURRENTLY IN THE STORE*/
DROP TABLE IF EXISTS store;
CREATE TABLE store
(
    store_id     INT AUTO_INCREMENT NOT NULL, 
    file_id      INT NOT NULL,
    PRIMARY KEY (store_id)
);




