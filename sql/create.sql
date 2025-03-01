create schema ipapi;

use ipapi;

create table ip
(
    id        int auto_increment primary key,
    timestamp timestamp  default current_timestamp() not null on update current_timestamp(),
    ip        mediumtext                             null
);

insert into ip (ip) values ('lel');
