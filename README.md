# General Instructions

#### MySQL

Add correct access credentials on

	./includes/PDO/settings.ini.php

#### SMTP
If using gmail's SMTP update access credentials on:

	./includes/init.php
	
Otherwise remove line 134 of 
	
	./includes/class/view.php:

*paths relative to project*

# Instructions if having troubles with  Ubuntu (LAMP installed)

Clone the repo or unzip in

	/var/www/html/

**Save the next as prepare.sh**

	echo -e "\n--- Configurando Apache ---\n"
	sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
	sudo find /var/www -type d -exec chmod 755 {} \;
	sudo find /var/www -type f -exec chmod 666 {} \;
	sudo chown -R www-data:www-data /var/www
	a2enmod rewrite
	service apache2 restart

	echo -e "\n--- Configurando SMTP ---\n"
	sudo apt-get remove apparmor
	sudo ufw allow ssh
	sudo ufw allow 80/tcp
	sudo ufw allow 443/tcp
	sudo ufw allow 25/tcp
	sudo ufw allow 465/tcp
	sudo ufw allow 25
	sudo ufw allow 465
	sudo ufw allow 3306/tcp  
	sudo ufw allow 3306  
	sudo ufw allow out 3306/tcp  
	sudo ufw allow in 3306/tcp 
	sudo ufw show added
	sudo ufw enable
	reboot

**Enter in terminal:**

	sh prepare.sh

**After reboot import the following file:**

	./includes/revenue_report_2015-04-13.sql
	
**into a database called revenue_report**