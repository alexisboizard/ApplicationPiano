# Application PianoHelper : Manuel d'installation

## 1 - Prérequis
**L'utilisation d'un certificat SSL est obligatoire pour l'application**\
Avant de commencer l'installation, assurez-vous que votre serveur Linux dispose des prérequis nécessaires pour exécuter l'application PHP. Les prérequis typiques incluent :

Nginx\
PHP <= 7.4 \
MongoDB

Si les prérequis ne sont pas satisfaits, veuillez vous référer aux documentation officielle.

- [Nginx](https://www.nginx.com/resources/wiki/start/topics/tutorials/install/)
- [PHP](https://www.php.net/manual/fr/install.php)
- [MongoDB](https://www.mongodb.com/docs/manual/installation/)

## 2 - Télécharger les sources

```
git clone https://github.com/alexisboizard/PTUT_Appli_Piano.git/

cp PTUT_Appli_Piano/* /var/www/html
```

## 3 - Configuration de Nginx

> Remplacer le contenu de /etc/nginx/sites-availables/default

```
server {

  listen 443 ssl;
  listen [::]:443 ssl;
  include snippets/self-signed.conf;
  include snippets/ssl-params.conf;


	root /var/www/html;

	# Add index.php to the list if you are using PHP
	index index.php index.html index.htm index.nginx-debian.html;

	server_name _;

	location / {
		# First attempt to serve request as file, then
		# as directory, then fall back to displaying a 404.
		try_files $uri $uri/ =404;
	}

}
server {
    listen 80;
    listen [::]:80;

	  server_name _;

    return 302 https://$server_name$request_uri;
}
```

Reload la configuration de Nginx

```
sudo nginx -t

sudo systemctl restart nginx

```

## 4 - Tester l'application

L'application devrait être en ligne ! 

```https://localhost/```



