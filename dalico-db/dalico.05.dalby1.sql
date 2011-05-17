
create table dalby1 (
	id	serial		not null primary key,
	patient	integer		not null references patients(id) on delete restrict on update cascade,
	datum	date		not null,
	tid	time		not null,

	pdf	varchar(64)	default null,

	unique (patient, datum, tid)
);

insert into files (name) values ('dalico.05.dalby1.sql');
