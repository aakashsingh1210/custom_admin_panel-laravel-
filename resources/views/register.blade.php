<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Register Form</title>
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
    <b><h1 class="text-center text-primary">Register Form</h1></b>
     <hr>
    <form action="{{route('afterregister')}}" method="POST" class="row g-3 needs-validation" novalidate>
      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif

      @csrf 
      <div class="col-md-4">
        
        <label for="validationCustom01" class="form-label">First name</label>
        <input type="text" name="firstname" class="form-control" id="validationCustom01" value="Aakash">
        @error('firstname')
        <div class="alert alert-danger my-2 ">
          {{ $message }}
        </div>
        @enderror
      </div>


      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Last name</label>
        <input type="text" name="lastname" class="form-control" id="validationCustom02" value="Singh">
        @error('lastname')
        <div class="alert alert-danger my-2">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="validationCustom03" class="form-label">Email id</label>
        <input type="text" name="email" class="form-control" id="validationCustom03" value="{{old('email')}}">
        @error('email')
        <div class="alert alert-danger my-2 ">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="validationCustom04">
        @error('password')
        <div class="alert alert-danger my-2 ">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="validationCustom05">
        @error('password_confirmation')
        <div class="alert alert-danger my-2 ">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="validationCustom06" class="form-label">Mobile number</label>
        <input type="text" name="number" class="form-control" id="validationCustom06" autocomplete="off">
        @error('number')
        <div class="alert alert-danger my-2 ">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="col-12">
        <button class="btn btn-primary" type="submit">Register</button>
      </div>


    </form>

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif -->

    <br>
    <div class="col-md-4">
      <a href="/login">Already Registered!! Login Here</a>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>