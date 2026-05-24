<h1>Create Post</h1>

<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <input type="text" name="title" placeholder="Enter Title">

    <br><br>

    <textarea name="content" placeholder="Enter Content"></textarea>

    <br><br>

    <button type="submit" name="submit">Save Post</button>

</form>
@include('auth.logout')
@if(isset($POST['submit'])){
@include('stuffs.comment')

}
@endif
@if($errors->any())

    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif