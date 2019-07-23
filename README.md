# Consuming Third party REST API, getting Country data.

This is a example repository, in orde to show how to retrieve data from a third party using Laravel 5.8 and Guzzle
## Starting 🚀

This are just a few instructions in order to explain how I did the project.



### Laravel installation 📋

->laraven new <project name>


### Installing dependencies 🔧

-> npm install

-> composer install

### Routes

-> php artisan route:list

```
GET|HEAD | /                                                        | country.index  | App\Http\Controllers\CountryController@index                      | web          |
|        | GET|HEAD | api/countries                                            | countries.api  | App\Http\Controllers\CountryController@apiGet                     | api          |
|        | GET|HEAD | api/user                                                 |                | Closure                                                           | api,auth:api |
|        | POST     | country                                                  | country.store  | App\Http\Controllers\CountryController@store                      | web          |
|        | GET|HEAD | country/create                                           | country.create | App\Http\Controllers\CountryController@create                     | web  

```

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Larave 5.8](https://laravel.com/docs/5.8/) - Framework used
* [Guzzlephp](http://docs.guzzlephp.org/en/stable/) - Http requests
* [Restcountries](https://restcountries.eu/t) - Third party end point
