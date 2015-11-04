# basic-mvc
```
Basic site framework with composer, alto-router, twig, and doctrine mongodb

Copy the following into your new project directory:
app/
public/
.gitignore
composer.phar
composer.json
composer.lock

Copy the config file site-config-defualt.php to site-config.php and modify as needed.

Run:
$ ./composer.phar self-update
$ ./composer.phar install

Move the file config.php (in the project root dir) to vendor/doctrine/mongodb-odm/tools/sandbox.
This allows the mongodb command line interface to work (see handy_console_commands.txt).

Configure web server docroot to point to public/ directory.
Example:
<VirtualHost *:8080>
    DocumentRoot /htdocs/mynewsite/public
    ServerName local.mynewsite.com
</VirtualHost>

For local dev add to /etc/hosts file:
127.0.0.1 local.mynewsite.com

New site is ready to go!
http://local.mynewsite.com
http://local.mynewsite.com/samplepage
```
