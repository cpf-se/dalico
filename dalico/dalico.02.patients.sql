

create table patients (
	id	serial		not null primary key,
	token	varchar(8)	not null unique,
	list	integer		not null references lists (id) on delete restrict on update cascade
);

insert into patients (token, list) values
('s2xjmsg', 1),
('d4b9p4n', 1),
('zuc438g', 1),
('4iqingw', 1),
('wsdptb9', 1),
('mm5j9jr', 4),
('6ga7zhc', 4),
('e3phkez', 1),
('n9gm4sp', 1),
('jtvxvje', 1),
('8vvky6u', 1);

insert into files (name) values ('dalico.02.patients.sql');


