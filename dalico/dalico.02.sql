

create table patient (
	id	serial		not null primary key,
	token	varchar(8)	not null unique,
	list	integer		not null references lists (id) on delete restrict on update cascade
);

insert into files (name) values ('dalico.02.sql');

