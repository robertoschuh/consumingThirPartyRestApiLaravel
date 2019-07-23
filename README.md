# Consuming Third party REST API, getting Country data.

This is a simple example in order to show how to consumne data from a third party endpoint using Laravel 5.8 and Guzzle

### Notes
All the routes are not using a middleware, because it is just an example, but in a real project these routes should have an Auth middleware.
In a real project I'd create seeders as well, in order to populate the database with some data.

### Rest Api ###
###### endpoint https://restcountries.eu/rest/v2/name/{name} ######
This endpoint has an inconvenient, because it does not search only in the name of the country, it looks at the other attributes as well, in order to find matches (I found this issue testing the API).
You can see an example of this issue trying this:
https://restcountries.eu/rest/v2/name/gran
It founds a match (Luxembourg), why? becasue Luxembourg has the array altSpellings with this data:
```
"altSpellings": [
    "LU",
    "Grand Duchy of Luxembourg",
    "Grand-Duché de Luxembourg",
    "Großherzogtum Luxemburg",
    "Groussherzogtum Lëtzebuerg"
],
````

### TDD (tests)
Added some Tests, that you can run easy with php unit:



```
// run all the tests.
->phpunit  

```
Test folder is located here: /tests

### Laravel project installation 📋

```
->git clone git@github.com:robertoschuh/consumingThirPartyRestApiLaravel.git


```
### Installing dependencies 🔧

```
-> npm install

-> composer install

-> php artisan migrate:fresh

```
Modify your .env file

```
DB_DATABASE=<your db name>
DB_USERNAME=<your db username>
DB_PASSWORD=<your db pwd>
```


### Routes

```
-> php artisan route:list

```

```
GET|HEAD | /                                                        | country.index  | App\Http\Controllers\CountryController@index                      | web          |
|        | GET|HEAD | api/countries                                            | countries.api  | App\Http\Controllers\CountryController@apiGet                     | api          |
|        | GET|HEAD | api/user                                                 |                | Closure                                                           | api,auth:api |
|        | POST     | country                                                  | country.store  | App\Http\Controllers\CountryController@store                      | web          |
|        | GET|HEAD | country/create                                           | country.create | App\Http\Controllers\CountryController@create                     | web  

```

### Server, Php, Mysql

```
Vagrant 2.2.4
PHP version: 7.3
Mysql 5.7

```

## Build with 🛠️

This example was build with:

* [Larave 5.8](https://laravel.com/docs/5.8/) - Framework used
* [Guzzlephp](http://docs.guzzlephp.org/en/stable/) - Http requests

* [Restcountries](https://restcountries.eu/) - Third party end point
* [Jquery](https://jquery.com/) - Javascript library
