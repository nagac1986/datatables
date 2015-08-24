create database employee;
use employee;

show tables;

create table employees(
eid int(5) unsigned zerofill not null auto_increment primary key,
firstname varchar(255) NOT NULL,
lastname varchar(255) NOT NULL,
field1 varchar(255) ,
field2 varchar(255) NOT NULL
);

drop table employees

DELIMITER $$
CREATE PROCEDURE insertrandom_employee(IN NumRows INT)
    BEGIN
        DECLARE i INT;
        SET i = 1;
        START TRANSACTION;
        WHILE i <= NumRows DO
          insert into employees (firstname, lastname, field1, field2)
          values(
            conv(floor(rand() * 99999999999999), 20, 36), 
            conv(floor(rand() * 99999999999999), 20, 36),
            ELT(0.5 + RAND() * 6, 'A', 'B', 'C', 'D', 'E', 'F'),
            ELT(0.5 + RAND() * 3,  'X', 'Y', 'Z'));
            SET i = i + 1;
        END WHILE;
        COMMIT;
    END$$
DELIMITER ;



CALL insertrandom_employee(1000);
select * from employees

