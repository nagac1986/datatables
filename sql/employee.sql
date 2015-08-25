# create Database
create database employee;

# Use database
use employee;

#create table
create table employees(
eid INTEGER unsigned zerofill  auto_increment primary key,
firstname varchar(255) NOT NULL,
lastname varchar(255) NOT NULL,
field1 varchar(255) not null ,
field2 varchar(255) NOT NULL
);

#Procedure which can insert based on rows specified
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
#select * from employees

create table roles(
rid INTEGER unsigned zerofill  auto_increment primary key,
rolename  varchar(255) 
 
);

insert into roles (rolename) value ('administrator');
insert into roles (rolename) value ('developer');
insert into roles (rolename) value ('user');

create table employee_role (
  eid INTEGER,
  rid INTEGER,
  PRIMARY KEY (eid, rid)
);

select * from roles;
select * from employees;
select * from employee_role;

select e.eid as DT_RowId, e.eid, e.firstname, e.lastname, field1, field2  from employees e;

select e.eid, e.firstname, e.lastname, field1, field2, r.rolename from employees e, employee_role er, roles r where e.eid= 2 and e.eid = er.eid and er.rid = r.rid;
select r.rolename , r is null from employee_role er, roles r, employees e where e.eid= 2 and e.eid = er.eid and er.rid = r.rid;

select e.eid, e.firstname, e.lastname, field1, field2, r.rolename from employees e
left outer JOIN  employee_role er
on e.eid = er.eid
left outer JOIN roles r
on er.rid = r.rid;


select r.rolename ,  er.eid is null hasrole from employee_role er right  JOIN  roles r on r.rid = er.rid and  er.eid=2;

select * from roles;
