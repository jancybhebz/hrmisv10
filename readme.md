What is HRMIS
==================

The Human Resource Management Information System (HRMIS) is a comprehensive and proactive human resource system designed to provide a single interface for government employees to erform the human resource management functions efficiently and effectively.



Installation
------------------
1.	git clone `https://bitbucket.org/sysdevdost/hrmis.git` hrmis
2.	composer dump-autoload
3.	composer install
4.	cp .htaccess-copy .htaccess
5.	cp .env.sample .env
6.	nano .env
7.	a2enmod rewrite
8.	chmod 775 .env
9.	chmod 775 -R schema/
10.	chmod 775 -R uploads/
11.	nano /etc/apache2/sites-enabled/000-default.conf
12.	add the following block inside
```<VirtualHost *:80>
	<Directory /var/www/html>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>
```
13.	sudo service apache2 restart
14.	run hrmis/migrate in your localhost

