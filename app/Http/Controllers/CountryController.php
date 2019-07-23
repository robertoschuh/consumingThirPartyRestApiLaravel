<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::table('countries')->paginate(5);

        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        // Get blade view to retrieve the add country form.
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate( [

            // A name field can have max 100 characters, has to be unique in countries table, and it is required.
            'name' => 'required|unique:countries|max:100',
            'alpha2Code' => 'required|unique:countries|max:10',
            'capital' => 'required|max:50', 
            'currency_code' => 'required|max:4',
            'country_language' => 'required|max:40' // This is not unique, because a language could be spoken in one or more countries  
        ]);
        //dump( $attributes);
        $country = Country::firstOrCreate($attributes);
       
        // STORE country in the db.

       // Country::save($attributes);

        return redirect()->route('country.index')->with('status','The country was added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @api/countries endpoint
     */
    public function apiGet(Request $request){

        // Check first if the country is in the db already.
        $data = Country::select('name', 'alpha2Code', 'capital', 'currency_code', 'country_language')
                ->where("name","LIKE","%{$request->input('name')}%")
                ->get();
              //  dd($data);
        if($data->count()){
            
            return $data;
        }

       
        $client = new Client(); //GuzzleHttp\Client

        try{
            // Calling to https://restcountries.eu/rest/v2/name/{name} endPoint
            $res = $client->request('GET', 'https://restcountries.eu/rest/v2/name/' . $request->name, ['http_errors' => false]);
        }
        catch (RequestException $e) {
            return json_decode(Psr7\str($e->getResponse()));  
        }

        if( $res->getStatusCode() != '200'){
            return Response()->json([], $res->getStatusCode());

        }
       return json_decode($res->getBody()->getContents());

    }
}
