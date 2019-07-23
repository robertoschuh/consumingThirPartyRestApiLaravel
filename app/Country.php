<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //protected $table = 'countries';

    // Allow only to save in the database these attributes, for security reassons 
    protected $fillable = 
    [
        'name', 
        'alpha2Code', 
        'capital', 
        'currency_code', 
        'country_language'
    ];

}
