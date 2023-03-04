<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Login</title>
  <style>
a:link {
  color: red;
  text-decoration: none;
}
a:visited {
  color: blue;
  text-decoration: none;
}

a:hover {
  color: hotpink;
  text-decoration: none;
}
a:active {
  color: blue;
  text-decoration: none;
}
</style>
</head>

<body>

  <div class="container bg-light">
    <b><h1 class="text-center text-primary">Login</h1></b>
    <hr>
    <form action="{{route('afterlogin')}}" method="POST">
      
    @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif

      @csrf
      <div class="mb-3 ">
        <label for="emailid" class="col-sm-2 col-form-label">Email id</label>
        <div class="col-sm-10 my-2">
          <input type="emailid" name="emailid" class="form-control" id="emailid">
        </div>
        @error('emailid')
        <div class="alert alert-danger my-2 w-25 ">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3 my-2">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="inputPassword">
        </div>
        @error('password')
        <div class="alert alert-danger my-2 w-25 ">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Login</button>
      </div>

    </form>

    <br>
    <div class="col-md-4">
      <a href="/register">New User! Register Here</a>
    </div>

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif -->


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>