#!/bin/sh

psql -Atd dalico -c 'drop table crfedtrs cascade'
psql -Atd dalico -c 'drop table crfs cascade'
psql -Atd dalico -c 'drop table users cascade'
psql -Atd dalico -c 'drop table patients cascade'
psql -Atd dalico -c 'drop table lists cascade'
psql -Atd dalico -c 'drop table vcs cascade'
psql -Atd dalico -c 'drop table files cascade'
psql -Atd dalico -c 'drop table ci_sessions cascade'
psql -Atd dalico -c 'drop table login_attempts cascade'
psql -Atd dalico -c 'drop table user_autologin cascade'
psql -Atd dalico -c 'drop table user_profiles cascade'
psql -Atd dalico -c 'drop table dalby1 cascade'

