create table users
(
    id       serial       not null primary key,
    name     varchar(255) not null unique,
    password varchar(255) not null
)