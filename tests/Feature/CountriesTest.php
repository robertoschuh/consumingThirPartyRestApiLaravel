<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Country;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_country_form()
    {
        // Country's form is in the main page
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function store_country(){

        $country = factory(Country::class)->create();    
        $this->assertDatabaseHas('countries', [
            'name' => $country->name 
        ]);
    }

    /** @test */
    public function get_api_country()
    {
        $response = $this->json('GET', '/api/countries', ['name' => 'Germany']);
        $response->assertStatus(200);
       
    }
}