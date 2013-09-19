sudo locale-gen de_CH.utf8
sudo update-locale LANG=de_CH.utf8
sudo ln -sf /usr/share/zoneinfo/Europe/Zurich /etc/localtime
sudo apt-get update
sudo apt-get install -y mc
sudo apt-get install -y apache2-mpm-prefork php5 php5-curl php5-dev php5-gd php5-idn php5-imagick php5-imap php5-mysql php5-sqlite php5-xcache php5-mcrypt php5-xsl
sudo a2enmod suexec rewrite ssl actions include vhost_alias
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password virtual'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password virtual'
sudo apt-get install -y mysql-server-5.5
sudo rm -rf /var/www
sudo ln -fs /vagrant /var/www
echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/app-password-confirm password virtual' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/admin-pass password virtual' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/app-pass password virtual' | debconf-set-selections
echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections
sudo apt-get install -q -y phpmyadmin
sudo service apache2 reload