What is HRMIS
====================

-The Human Resource Management Information System (HRMIS) is a comprehensive and proactive human resource system designed to provide a single interface for government employees to erform the human resource management functions efficiently and effectively.


- - -

 
## Installation

	git clone `https://bitbucket.org/sysdevdost/hrmis.git` hrmis
	composer dump-autoload
	composer install
	cp .htaccess-copy .htaccess
	cp .env.sample .env
	nano .env
	a2enmod rewrite
	chmod 775 .env
	chmod 775 -R schema/
	chmod 775 -R uploads/
	nano /etc/apache2/sites-enabled/000-default.conf
	add the following block inside
	<VirtualHost *:80>
	<Directory /var/www/html>
	                Options Indexes FollowSymLinks MultiViews
	                AllowOverride All
	                Order allow,deny
	                allow from all
	</Directory>
	sudo service apache2 restart
	run hrmis/migrate in your localhost


 
## Server Requirements

* PHP version 7.1 or newer is recommended.
* Ubuntu 18.
* Git
 

## Documentation

 [HRMISv10 Powerpoint Presentation] (https://docs.google.com/presentation/d/1uGS2of7UIxYarlfvFLySg2kX31DBh_JFYP5vZxuq8Vc/edit#slide=id.g5c00ba7bd3_11_0)
 

## Acknowledgement

	DOSTCO - ITD


## Other Setup

	Hrmisv10 Schema for new users:
	[https://tinyurl.com/hrmisv10-schema] (https://tinyurl.com/hrmisv10-schema)
	Password: hrmisdost

rrors:
  The action you have requested is not allowed. (POST) or timeoutkeepalive 403 (Forbidden):
	config['csrf_regenerate'] = FALSE;


## To recieved email notification:

1. Create bitbucket account here ``
2. Go to HRMIS Repository
3. Click ...
4. Select Manage Notification