create table tasks
(  
    -- SERIAL型は、1から2,147,483,647の値を取り扱う
    id     serial   not null primary key,
    title  char(30) not null,
    status char(10) not null
);

INSERT INTO tasks (title, status) VALUES
('title a', 'todo'),
('title b', 'doing'),
('title c', 'done');