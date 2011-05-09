
srcdir		= $(HOME)/DALICO_FILES

appdir		= application
confdir		= $(appdir)/config
ctrldir		= $(appdir)/controllers
viewdir		= $(appdir)/views
moddir		= $(appdir)/models
libdir		= $(appdir)/libraries
cachedir	= $(appdir)/cache
logdir		= $(appdir)/logs

wwwuser		= www-data
wwwgroup	= www-data

DEPLOY		= install -m 644

.PHONY: all deploy perms

all:

deploy: $(confdir)/autoload.php $(confdir)/config.php $(confdir)/database.php $(confdir)/routes.php perms
	$(MAKE) -C dalico $@

perms:
	sudo chgrp $(wwwgroup) $(cachedir) $(logdir)
	sudo chown $(wwwuser)  $(cachedir) $(logdir)

#===============================================================================================

$(confdir)/autoload.php: $(srcdir)/autoload.php
	$(DEPLOY) $< $@

$(confdir)/config.php: $(srcdir)/config.php
	$(DEPLOY) $< $@

$(confdir)/database.php: $(srcdir)/database.php
	$(DEPLOY) $< $@

$(confdir)/routes.php: $(srcdir)/routes.php
	$(DEPLOY) $< $@

