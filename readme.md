# munkireport-php (experimental) #

*Experimental branch*

## Developer Setup ##

Prerequisites:

- php >= 5.6.4 and your choice of http daemon
- [composer](https://getcomposer.org/download/) for managing PHP
  dependencies.
- [nodejs](https://nodejs.org) for managing JS dependencies and
  building front-end assets.

Installing dependencies:

    $ composer install
    $ npm install
    
To run webpack hot module reload server on port 4000 run:

    $ npm run hot
    
## Troubleshooting ##

Laravel logs are normally available in the project directory at:

    storage/logs/laravel.log
    
This will usually contain stack traces if any Exceptions had occurred.

