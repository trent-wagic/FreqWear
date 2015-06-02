USE FreqWear;

/*
INSERT INTO users (uname, pw, first_name, last_name, email, hint, role) VALUES ("Trent", " ", "Trent", "Russell", "trent@wagic.com", "Nothing", 3);
INSERT INTO users (uname, pw, first_name, last_name, email, hint, role) VALUES ("Mike", "WAGICROCKS!", "Mike", "S", "mike@wagic.com", "WIFI", 3);
INSERT INTO users (uname, pw, first_name, last_name, email, hint, role) VALUES ("Ron", "WAGICROCKS!", "Ron", "Johnson", "ron@wagic.com", "WIFI", 0);
INSERT INTO users (uname, pw, first_name, last_name, email, hint, role) VALUES ("binh", "WAGICROCKS!", "Binh", "Tran", "binh@wagic.com", "WIFI", 2);
INSERT INTO users (uname, pw, first_name, last_name, email, hint, role) VALUES ("Bob", "password", "Robert", "Bobby", "robert@bobby.com", "password", 0);
*/

/*
INSERT INTO files (fname, description, logo, protocol) VALUES ("alpha.file", "a file", "a file", "a file");
INSERT INTO files (fname, description, logo, protocol) VALUES ("beta.file", "b file", "b file", "b file");
INSERT INTO files (fname, description, logo, protocol) VALUES ("charlie.file", "c file", "c file", "c file");
*/


INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (1, "Trent", 1, "TrentRussell.jpg", "2015/02/03", 14.99, "8675309");
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (1, "Trent", 2, "familyDisney02.png", "2015/02/03", 14.99, "8675309");
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (1, "Trent", 3, "Lindsay_1290.jpg", "2015/02/03", 14.99, "8675309");
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (4, "binh", 1, "TrentRussell.jpg", "2015/02/03", 14.99, "5555555");
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (4, "binh", 2, "familyDisney02.png", "2015/02/03", 14.99, "555555");
INSERT INTO sales (u_id, uname, f_id, fname, sales_date, sales_amt, device_id) VALUES (4, "binh", 3, "Lindsay_1290.jpg", "2015/02/03", 14.99, "555555");


/*
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
*/
