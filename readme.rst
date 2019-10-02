###################
What is HRMIS
###################

The Human Resource Management Information System (HRMIS) is a comprehensive and proactive human resources system designed to provide a single interface for government employees to perform the human resources management functions efficiently and effectively.


*******************
Installation
*******************

- git clone `https://bitbucket.org/sysdevdost/hrmis.git` hrmis
- composer dump-autoload
- composer install
- cp .htaccess-copy .htaccess
- cp .env.sample .env
- nano .env
- run hrmis/migrate in your localhost

*******************
Server Requirements
*******************

- PHP version 7.1 or newer is recommended.
- Ubuntu 18.
- Git

*********
Documentation
*********

-  `HRMISv10 Powerpoint Presentation <https://docs.google.com/presentation/d/1uGS2of7UIxYarlfvFLySg2kX31DBh_JFYP5vZxuq8Vc/edit#slide=id.g5c00ba7bd3_11_0>`_

***************
Acknowledgement
***************

DOSTCO - ITD

*********
Other Setup
*********

Errors:
-  The action you have requested is not allowed. (POST) or timeoutkeepalive 403 (Forbidden):
	$config['csrf_regenerate'] = FALSE;