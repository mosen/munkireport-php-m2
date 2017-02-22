Developer Guide
===============

This document outlines how to set up a development environment to start hacking on MunkiReport v3 modules.

Getting Started
---------------

First you need a PHP stack to develop with.

There are many guides on the internet that cover parts of the stack setup, so this is outside the scope of the document.

You will need:

- A web server such as [Apache HTTP Server](http://httpd.apache.org/) or [nginx](https://www.nginx.com/).
- [PHP](http://www.php.net/) 5.6 or newer.
- A virtualhost that points to the document root `./public` in this project.

*NOTE:* I don't recommend using the built in web sharing feature of macOS because you may find yourself
tackling older versions of PHP and/or trying to sort out the right permissions.

Also, to fetch dependencies for PHP and for JavaScript components you will need:

- [composer](https://getcomposer.org/)
- [nodejs](https://nodejs.org)

Example: nginx + php-fpm
------------------------

This is my set up. You can use Homebrew to install most of the dependencies:

    $ brew install nginx php71 homebrew/php/composer nodejs
    
I usually configure `php-fpm` to use a socket by editing `/usr/local/etc/php/X.Y/php-fpm.conf` and changing

    listen = 127.0.0.1:9000
    
To

    listen = /usr/local/var/run/php-fpm.sock
    
    
Then I place a new server configuration in `/usr/local/etc/nginx/servers` called `munkireport3`.
I've based this configuration on [nginx fastcgi with php-fpm guide](https://www.nginx.com/resources/wiki/start/topics/examples/phpfcgi/)
and [Laravel's pretty URLs location block](https://laravel.com/docs/5.4#pretty-urls).
Note that you have to alter the `fastcgi_params` location to suit Homebrew.

    server {
        listen 8080;
        server_name munkireport3.dev;
        
        root /path/to/git/clone/public/;
        index index.php index.html index.htm;
        
        access_log /usr/local/var/log/munkireport3-access.log;
        error_log /usr/local/var/log/munkireport3-error.log;
    
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
        
        location ~ [^/]\.php(/|$) {
            fastcgi_split_path_info ^(.+?\.php)(/.*)$;
            if (!-f $document_root$fastcgi_script_name) {
                return 404;
            }
        
            # Mitigate https://httpoxy.org/ vulnerabilities
            fastcgi_param HTTP_PROXY "";
        
            fastcgi_pass unix:/usr/local/var/php-fpm.sock;
            fastcgi_index index.php;
            include fastcgi_params;
            
            # Sometimes Homebrew fastcgi_params does not include this
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }
    }
    
Note that the host `munkireport3.dev` won't resolve for you. I use dnsmasq to make *.dev resolve to localhost but now
we are way outside the scope of this document!

Clone and Fetch Dependencies
----------------------------

First you should git clone this repository somewhere on your machine.
The location has to match the `root` directive in NGINX (or `DocumentRoot` in Apache) without the /public.

PHP and JS dependencies are not included with the project.

To install PHP dependencies, change into the project directory and run:

    $ composer install
    
To install the JS dependencies, you will also need to run:

    $ npm install
    
Build JS Assets
---------------

JavaScript, WebFonts and CSS need to be built because they are transpiled and bundled.
To build, just run:

    $ npm run dev
    
See [Laravel mix](https://laravel.com/docs/5.4/mix) for more information. Mix is essentially a specialised webpack setup.

Configure
---------

Your configuration is stored in a file called .env, there is already a .env.example that you should copy to .env. Check out the contents of .env and adjust where necessary. If you comment out DB_DATABASE, it will fall back to the default location for SQLite, which is `database/database.sqlite`

The next thing you should do after installing Laravel is set your application key to a random string, just run:

    $ php artisan key:generate command.

this will generate a key and add it to .env

Set up the database
-------------------

If you're using SQLite you first create an empty database file. The easiest way to do that is to run:

    $ touch database/database.sqlite

or some other path that you defined in .env

To set up the database tables, you need to run

    $ php artisan migrate

Note that the previous behavior of munkireport, where it auto-created the tables does not work in v3.

Publish config files and assets
-------------------------------

In the production build this won't be necessary, but to copy assets and config files from each module into your
app directory you must run:

    $ php artisan vendor:publish --tag=public
    
For assets, and 

    $ php artisan vendor:publish --tag=config

For config files.

Links to Vendor Documentation
-----------------------------

- [Vue.js Guide](https://vuejs.org/v2/guide/)
- [vue-loader (en)](http://vue-loader.vuejs.org/en/)
