
create table crfs (
	id	serial		not null primary key,
	patient	integer		not null references patients (id) on delete restrict on update cascade,
	datum	date		not null,

	length	numeric,
	weight	numeric,
	bmi	numeric,

	waist	numeric,
	hip	numeric,
	waihip	numeric,

	hb	numeric,
	glu	numeric,
	hba1c	numeric,

	na	numeric,
	k	numeric,
	krea	numeric,
	kolest	numeric,

	ldlkol	numeric,
	hdlkol	numeric,
	trigly	numeric,

	tsh	numeric,
	ft4	numeric,
	crp	numeric,
	ualbu	numeric,

	bts	numeric,
	btd	numeric,
	pulse	numeric,

	btsday	numeric,
	btdday	numeric,

	btsnig	numeric,
	btdnig	numeric,

	btsone	numeric,
	btdone	numeric,

	serum	varchar(10),
	plasma	varchar(10),

	unique (patient, datum)
);

create table crfedtrs (
	id	serial		not null primary key,
	editor	integer		not null references users(id) on delete restrict on update cascade,
	crf	integer		not null references crfs (id) on delete restrict on update cascade,
	stamp	timestamp	not null default now()
);

insert into files (name) values ('dalico.04.sql');

