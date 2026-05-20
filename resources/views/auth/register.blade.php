<h1>Register</h1>

<form action="{{ route('register') }}" method="POST">

    @csrf

    <div>
        <input type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}">
    </div>

    <br>

    <div>
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
    </div>

    <br>

    <div>
        <input type="password" name="password" placeholder="Enter Password">
    </div>

    <br>

    <div>
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
    </div>

    <br>

    <button type="submit">Register</button>

</form>
@if($errors->any())
    @foreach($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

