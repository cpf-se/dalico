
cachedir	=	application/cache
logdir		=	application/logs

wwwuser		=	www-data
wwwgroup	=	www-data

.PHONY: all perms

all:

perms:
	sudo chown -c $(wwwuser) $(cachedir) $(logdir)
	sudo chgrp -c $(wwwgroup) $(cachedir) $(logdir)


