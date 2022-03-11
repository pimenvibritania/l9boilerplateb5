<form method="POST" action="{{route('users.store')}}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" />
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email"/>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password"/>
    </div>
    <button type="submit">Submit</button>
</form>
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
