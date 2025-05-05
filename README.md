# olenkacrud
CRUD PHP COMPLETO

# INSTALAÇÃO VIRTUALIZAÇÃO
- instale uma VM para a aplicação e outra para o banco de dados. Nesse projeto, utilizei o multipass para fazer a virtualização.
- sudo snap install multipass
- sudo multipass launch -n web lts
- sudo multipass launch -n db lts

# RESOLVENDO DNS LOCAL
- sudo apt-get install resolvconf
- sudo nano /etc/systemd/resolved.conf
- descomente o DNS e defina o IP da sua maquina (vista em sudo ip -c br a)

# CONFIGURANDO DATA/HORA E TIMEZONE 
- nano /etc/systemd/timesyncd.conf
- Descomente a linha NTP e defina NTP=a.ntp.br
- descomente a linha FallbackNTP e defina FallbackNTP=b.ntp.br
- dpkg-reconfigure tzdata
- defina timezone america > sao Paulo
- timedatectl set-ntp off
- timedatectl set-ntp on

# INSTALAÇÃO DO BANCO DE DADOS
NA VM DO DB
- executar: sudo apt-get install mysql-server
- sudo mysql - para abrir o banco de dados
- CREATE USER 'olenkacrud'@'%' IDENTIFIED BY 'olenka@123'; - Criar o usuario no mysql
- CREATE DATABASE olenkabar; - Cria a tabela do banco de dados
- GRANT ALL PRIVILEGES ON olenkabar.* TO 'olenkacrud'@'%';
- exit - sair do mysql
- sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
- alterar bind-address e mysqlx-bind-address para 0.0.0.0 para abrir a porta 3306 
- sudo systemctl restart mysql
- mysql -u olenkacrud -p olenkabar < olenkabar.sql;

# CONFIGURANDO VM DA APLICAÇÃO
NA VM DO WEB
- sudo apt-get install mysql-client;
- sudo apt-get install nginx;
- sudo apt-get install php-fpm;
- sudo nano /etc/nginx/sites-available/default
- adicionar index.php na linha: index index.html index.html......
- em fastcgi_pass unix:/run/php/php8.3-fpm.sock;, subistituir o php8.30fpm pela sua versao, podendo ser vista em ls /etc/php/
- descomentar as linhas:
	 location \.php {
		include snippets/fast....	
		fastcgi_pass unix....
		}
- sudo systemctl restart php8.3-fpm (ou sua versao)
- sudo systemctl restart nginx
- sudo apt-get install php-mysql
- cd /var/www/html
- sudo chown www-data:www-data *