
create table vcs (
	id	serial		not null primary key,
	name	varchar(32)	not null unique
);

create table lists (
	id	serial		not null primary key,
	name	varchar(32)	not null unique,
	vc	integer		not null references vcs (id) on delete restrict on update cascade
);

insert into files (name) values ('dalico.01.vcs,lists.sql');

