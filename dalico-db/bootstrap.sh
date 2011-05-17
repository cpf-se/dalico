#!/bin/sh

PINL='psql -U dalico -h localhost -Atwd dalico -c'
PCOM='psql -U dalico -h localhost -Atwd dalico -f'

has () {
	q="SELECT COUNT(id) FROM files WHERE name = '$1'"
	test "`$PINL \"$q\"`" = "1"
}

for f in dalico.*.sql ; do
	has $f || $PCOM $f
done

