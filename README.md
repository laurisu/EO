# EO

## Required 

*Composer*  - [getcomposer.org](https://getcomposer.org/)

*Node.js*   - [nodejs.org](https://nodejs.org/)

*Bower*     - [bower.io](http://bower.io/)

*Grunt*     - [gruntjs.com](http://gruntjs.com/) (for development only)

## Instalation

### Run these commands

```composer install``` - to install required files

```npm install bower``` - to install Bower

```bower install``` - to install dependencies 

```npm install grunt-cli``` - to install Grunt (optional) 

Create MySQL database named "easy_offer_auth" with collation "utf8_unicode_ci".

### After table is created run these commmands:

```php artisan migrate``` - creates database tables and migrations table

```php artisan db:seed``` - fills database tables with data

## Set up

Set up your localhost or domain and run the app
