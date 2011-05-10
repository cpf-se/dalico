
create table users (
	id	serial		not null primary key,
	userid	varchar(10)	not null unique,
	last	varchar(32)	not null,
	first	varchar(32)	not null,
	passwd	varchar(32)	not null,
	unique (last, first)
);

insert into files (name) values ('dalico.03.sql');

