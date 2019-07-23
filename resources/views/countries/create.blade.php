@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('country.store')}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Country name</label>
                <input type="text" class="form-control" id="name" placeholder="Country name" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="alpha2Code">Country code</label>
                <input type="text" class="form-control" id="alpha2Code" placeholder="Country code" name="alpha2Code">
            </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="capital">Capital city</label>
                    <input type="text" class="form-control" id="capital" placeholder="Capital" name="capital">
                </div>
                <div class="form-group col-md-6">
                    <label for="currency_code">Currency code</label>
                    <input type="text" class="form-control" id="currency_code" placeholder="Currency code" name="currency_code">
                </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="country_language">Language</label>
                    <input type="text" class="form-control" id="country_language" placeholder="Language" name="country_language">
                </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Save it!</button>
</form>

@endsection

@section('js')
    <script type="text/javascript">
     
        $('#name').keyup(function(){
            var query = $(this).val();

            if(query != '' && query.length > 3)
            {
                var name = $('input[name="name"]').val();
                $.ajax({
                    url:"{{ route('countries.api') }}",
                    method:"GET",
                    data:{name: name},

                    // If the API query has success, then input fields are filled.
                    success:function(dataObj){
                        $('#name').val(dataObj[0].name);
                        $('#alpha2Code').val(dataObj[0].alpha2Code);
                        $('#capital').val(dataObj[0].capital);
                        let currrency_code = dataObj[0].currency_code ? dataObj[0].currency_code :  dataObj[0].currencies[0].code;
                        $('#currency_code').val(currrency_code);

                        let country_language = dataObj[0].country_language ? dataObj[0].country_language : dataObj[0].languages[0].name;
                        $('#country_language').val(country_language);         
                
                    },
                    statusCode: {
                        404: function() {
                            console.log( "Page not found" );
                        },
                        500: function() {
                            console.log( "Internal server error" );
                        }
                    }
                });
            }
       
        });
    </script>
@endsection