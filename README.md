<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About My application

The original application was cloned from bitbucket and the repo then assocated to this repos' url.

To start please have php installed in the command line globally.

Next step is to clone the files locally using git and cd into the cloned folder.

Make sure you have composer installed to run composer install for laravel.
using this command : `php composer.phar install`

This will install all the depenancies.
To create an env file run this command:
`cp .env.example .env
php artisan key:generate`

now open the env file and change these settings:
`DB_CONNECTION=sqlite`
`#DB_HOST=127.0.0.1`
`#DB_PORT=3306`
`#DB_DATABASE=homestead`
`#DB_USERNAME=homestead`
`#DB_PASSWORD=secret`
Please add the hashtag to comment out relevant code.

Now to create your sqlite db run this command:
`touch database/database.sqlite`

The next step is to run a migration:
`php artisan migrate`

Now we have the basics up and running we can now get php to run its own server using this command:
`php artsian serve --port:8000`

#The functionality
You can enter any url you like, if an url is identical as before, a warning will be displayed 
after submission.

Here is an example of how it will work:
1. submit a url, a url is then generated and returned.
2. When visiting the URL a statistic is recorded in the stats table and timestamps updated.
3. You are then redirected to your website.

All short url's use base 64 to encode the id of the record of the url to reduce the amount of 
characters generated.

#To view stats

use `{localhost}:{portnumber}/{shortcode}/stats`
Were {localhost} is your localhost or localhost ip.
Were {portnumber} is the port you set when launching
Were {shortcode} is part of the url generated from a previously generated url.

A bar char will display the stats.

Please note, no UI considerations were taken as this was a test completed on functionality.
