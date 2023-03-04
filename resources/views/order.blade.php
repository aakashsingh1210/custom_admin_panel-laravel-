<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>order</title>
    </head>
     <body>
         <x-header data="something"/>
        <h1>
            
    
            <table border="1">
                <tr>
             <td>id</td>
             <td>email</td>
             <td>first_name</td>
             <td>last_name</td>
             <td>avatar</td>
             </tr>
            @foreach($collection as $x)
            <tr>
             <td>{{$x['id']}}</td>
             <td>{{$x['email']}}</td>
             <td>{{$x['first_name']}}</td>
             <td>{{$x['last_name']}}</td>
             <td><img src="{{$x['avatar']}}" alt="img"></td>
             </tr>
            @endforeach
            </table>
        </h1>
    </body>
</html>
