#!/bin/sh

psql -Atd dalico -c 'drop table crfedtrs'
psql -Atd dalico -c 'drop table crfs'
psql -Atd dalico -c 'drop table users'
psql -Atd dalico -c 'drop table patients'
psql -Atd dalico -c 'drop table lists'
psql -Atd dalico -c 'drop table vcs'
psql -Atd dalico -c 'drop table files'

