@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        Please check the form below for errors
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        
    </div>
@endif
@if ($message = Session::get('status'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif