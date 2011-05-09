
create table files (
	id	serial		not null primary key,
	name	varchar(32)	not null unique,
	stamp	timestamp	not null default now()
);

insert into files (name) values ('dalico.00.sql');

