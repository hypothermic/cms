# Setting up FearCMS

Unlike other webshop software such as Magento, Fear is extremely easy to set up.
Just unpack the ZIP file or clone the repository to Apache's WWW-root, set up the database, configure some settings, and you're done.

## 0. Prerequisites

This setup guide assumes:

- you're using Ubuntu
- you're using Apache webserver version 2.4 or higher
- MySQL is set up and running

## 1. Unpack files

Make sure to that your webroot directory is empty before proceeding.

#### Method 1: clone the repository

```shell script
git clone https://github.com/hypothermic/FearCMS /opt/fear/
```

#### Method 2: download and extract manually

```shell script
wget https://github.com/hypothermic/FearCMS/releases/latest/download/fear.tar.gz
tar xf fear.tar.gz -C /opt/fear/
```

## 2. Setup Apache

In apache2.conf, add or replace the following lines:

```apacheconfig
<Directory /opt/fear/>
        Options FollowSymLinks
        AllowOverride None
        Require all denied
</Directory>

<Directory /opt/fear/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>

AccessFileName .htaccess
```

Modify your VirtualHost to point to the proper document root:

```apacheconfig
<VirtualHost ...>
    ...
    DocumentRoot /opt/fear/www/
    ...
</VirtualHost>
```

Geef Apache de juiste permissies voor de web root.

```shell script
groupadd fear-www
chown -R root:fear-www /opt/fear/www/
chmod -R 2775 /opt/fear/www/
```

## 3. Prepare database

If you have created the database already, skip this step.

WARNING: running the following command will remove any previous Fear databases and it's contents.
Make sure to create a backup of important databases before running the command.

```shell script
sudo mysql < /opt/fear/db/create.sql
```

You may have to enable case-insensitive table names if you're on an Unix-based operating system.