@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Alpha2Code</th>
            <th scope="col">Capital</th>
            <th scope="col">Currency code</th>
            <th scope="col">Language</th>
        </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{{ $country->name }}</td>
            <td>{{ $country->alpha2Code }}</td>
            <td>{{ $country->capital }}</td>
            <td>{{ $country->currency_code }}</td>
            <td>{{ $country->country_language }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div> {{ $countries->links() }}</div>
      
@endsection
