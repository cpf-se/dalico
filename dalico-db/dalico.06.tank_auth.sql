

create table ci_sessions (
	session_id	varchar(40)		not null default '0' primary key,
	ip_address	varchar(16)		not null default '0',
	user_agent	varchar(150)		not null,
	last_activity	integer			not null default '0',
	user_data	text			not null default ''
);

create table login_attempts (
	id		serial				not null primary key,
	ip_address	varchar(40)			not null,
	login		varchar(50)			not null,
	time		timestamp with time zone	not null default NOW()
);

create table user_autologin (
	key_id		char(32)			not null,
	user_id		integer				not null default '0',
	user_agent	varchar(150)			not null,
	last_ip		varchar(40)			not null,
	last_login	timestamp with time zone	not null default NOW(),
	primary key (key_id, user_id)
);

create table user_profiles (
	id		serial			not null primary key,
	user_id		integer			not null,
	country		varchar(20)		default null,
	website		varchar(255)		default null
);

alter table users add column username varchar(50) not null;
alter table users add column password varchar(255) not null;
alter table users add column email varchar(100) not null;
alter table users add column activated smallint not null default '1';
alter table users add column banned smallint not null default '0';
alter table users add column ban_reason varchar(255) default null;
alter table users add column new_password_key varchar(50) default null;
alter table users add column new_password_requested timestamp with time zone default null;
alter table users add column new_email varchar(100) default null;
alter table users add column new_email_key varchar(50) default null;
alter table users add column last_ip varchar(40) not null;
alter table users add column last_login timestamp with time zone not null default NOW();
alter table users add column created timestamp with time zone not null default NOW();
alter table users add column modified timestamp with time zone not null default NOW();

insert into files (name) values ('dalico.06.tank_auth.sql');

