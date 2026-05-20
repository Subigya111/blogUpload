<h1>Login</h1>

<form action="{{ route('login') }}" method="POST">

    @csrf

  


    <div>
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
    </div>

    <br>

    <div>
        <input type="password" name="password" placeholder="Enter Password">
    </div>

    <br>

   

    <br>

    <button type="submit">login</button>

</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
@if(session('error'))
    <p>{{ session('error') }}</p>
@endif