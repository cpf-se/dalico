
create table vcs (
	id	serial		not null primary key,
	name	varchar(32)	not null unique
);

insert into vcs (name) values ('Dalby'), ('Bara');

create table lists (
	id	serial		not null primary key,
	name	varchar(32)	not null unique,
	vc	integer		not null references vcs (id) on delete restrict on update cascade
);

insert into lists (name, vc) values ('Olsson 1̈́', 1), ('Hallberg 1̈́', 2), ('Olsson 2', 1), ('Nilsson 1̈́', 2), ('Hedberg 1̈́', 2);

insert into files (name) values ('dalico.01.sql');

