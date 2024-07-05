<h1> Selamat Datang !!</h1>
<form method="post" action="/logout">
	@csrf
	<input type="submit" name="submit" value="logout">
</form>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <h1>{{ $message }}</h1>
    </div>
@else
    <div class="alert alert-success">
        You are logged in!
    </div>       
@endif            
