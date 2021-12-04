
<p  align="center"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="400"></a></p>

  

## Laravel URL shortener

  

This is an laravel application to make a shortnener url with an base url provider, counts his visits and crawl the data for the basic url tested with wikipedia URL. Url's used in the testing:
- https://es.wikipedia.org/wiki/Assassin%27s_Creed
- https://en.wikipedia.org/wiki/Genghis_Khan

  

## Installation

- First of all you have to made the installation: throw the command `composer install`
- After that make the .env configuration for the database:
`DB_CONNECTION`=mysql 
`DB_HOST`=127.0.0.1
`DB_PORT`=3306
`DB_DATABASE`=url_shortener
`DB_USERNAME`=root
`DB_PASSWORD`=
- After we need to make the .env configuration for the queueing jobs:
`QUEUE_CONNECTION`=database
we put the database value cause we're going to store the jobs in the db
- Last but not least we need to run the migrations with `php artisan migrate` or ig you already have the databas tables run `php artisan migrate:fresh` 

## QUEUE LISTENER
To listen the queue jobs we need to run the command `php artisan queue:workisan queue:work` after that the queues is going to start being listened by the console:

[Console image](https://share.getcloudapp.com/E0uKpkpd)

## POSTMAN COLLECTION
 https://www.getpostman.com/collections/1fe387d8bf1e871c9991

## Screen recording of the Functionality

Testing the Services: https://share.getcloudapp.com/4guPqogj

Testing the Jobs Queueing: https://share.getcloudapp.com/JrunR0jk

  
