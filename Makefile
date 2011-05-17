
srcdir		= $(shell readlink -f $(HOME)/DALICO_FILES)
dbdir		= $(shell readlink -f dalico-db)

appdir		= $(shell readlink -f application)
export confdir	= $(shell readlink -f $(appdir)/config)
ctrldir		= $(shell readlink -f $(appdir)/controllers)
viewdir		= $(shell readlink -f $(appdir)/views)
moddir		= $(shell readlink -f $(appdir)/models)
libdir		= $(shell readlink -f $(appdir)/libraries)
cachedir	= $(shell readlink -f $(appdir)/cache)
logdir		= $(shell readlink -f $(appdir)/logs)
captchadir	= $(shell readlink -f htdocs/captcha)

wwwuser		= www-data
CHOWN		= sudo chown -R

wwwgroup	= www-data
CHGRP		= sudo chgrp -R

.PHONY: all deploy perms reset

all:

deploy: $(srcdir) $(dbdir) perms
	$(MAKE) -C $(srcdir) $@
	$(MAKE) -C $(dbdir) $@

perms:
	$(CHGRP) $(wwwgroup) $(cachedir) $(logdir) $(captchadir)
	$(CHOWN) $(wwwuser)  $(cachedir) $(logdir) $(captchadir)

reset:
	$(MAKE) -C $(dbdir) $@

