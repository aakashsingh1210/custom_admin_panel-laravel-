@extends('layout.master')
@section('title','addrole')
@section('style')
<style>
    .maprole {
        padding: 20px;
    }

    .insiderole {
        padding: 20px;
        background-color: #ACC8E5;
    }
</style>
@endsection
@section('content')
<div class="maprole">
    <h1>MapRoles</h1>
    <div class="insiderole">
        <form action="{{route('aftermaprole')}}" method="POST">
            @csrf
            <label for="user">User:</label>
            <select id="user" name="userid">
                @foreach($memberdata as $x)
                 @if($x->role==1)
                 @continue
                 @endif
                <option value=" {{$x->id}}">
                    {{$x->email}}
                </option>
                @endforeach
            </select>
            <br><br>
            <label for="role">Role:</label>
            <select id="role" name="roleid">
                @foreach($roledata as $x)
                <option value="{{$x->id}}">
                    {{$x->rolename}}
                </option>
                @endforeach
            </select>
            <br><br>
            <button type="submit">Map</button>
        </form>
        @if(Session::has('message'))
            <div>{{Session::get('message')}}</div>
            @endif
    </div>

</div>
@endsection