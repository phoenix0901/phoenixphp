# PHP Telegram Bot

A Telegram Bot based on the official [Telegram Bot API](https://core.telegram.org/bots/api)

## How install

Install Composer :

`curl -s https://getcomposer.org/installer | php`

`sudo mv composer.phar /usr/local/bin/composer` 

First install apache : 


`sudo apt-get update`
`sudo apt-get install apache2`

next install mysql : 

`sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql`
`sudo mysql_install_db`
`sudo mysql_secure_installation`

step 3 install phpmyadmin : 

`sudo apt-get install phpmyadmin`

config apache : 

`sudo nano /etc/apache2/apache2.conf`

add this line 

`Include /etc/phpmyadmin/apache.conf`

restart apache 

`sudo service apache2 restart`

step 4 install php : 

`sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt`
`sudo apt-get install php5-cli php5-curl php5-gd php5-mysql php5-sqlite php5-mcrypt `

step 5 config database :
open phpmyadmin (http://you ip address/phpmyadmin
create a database 
and import db.sql

open `getUpdatesCLI.php`
and set mysql credentials and bot api 

run this command in src folder:

`composer require phpbot/telegram-bot:@dev`
