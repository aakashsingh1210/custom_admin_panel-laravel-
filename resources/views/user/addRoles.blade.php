@extends('layout.master')
@section('title','addrole')
@section('style')
<style>
    .addrole {
        padding: 20px;
    }

    .insiderole {
        padding: 20px;
        background-color: #ACC8E5;
    }
</style>
@endsection
@section('content')
<div class="addrole">
    <h1>AddRoles</h1>
    <div class="insiderole">
        <form action="{{route('afteraddrole')}}" method="POST">
            @csrf
            <label for="role">Role: </label>
            <input type="text" id="role" name="role" placeholder="Enter new Roles"><br><br>
            <button type="submit">Add</button><br><br>
            @if(Session::has('message'))
            <div>{{Session::get('message')}}</div>
            @endif
        </form>
        <br>
        <button><a href="{{route('user/mapRoles')}}">Role User Mapping</a></button>
        <br><br>
        <button><a href="{{route('user/mapMenu')}}">Role Menu Mapping</a></button>

    </div>
</div>
@endsection