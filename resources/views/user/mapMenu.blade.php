@extends('layout.master')
@section('title','mapMenu')
@section('style')
<style>
    .mapmenu {
        padding: 20px;
    }

    .insidemapmenu {
        padding: 20px;
        background-color: #ACC8E5;
    }
</style>
@endsection
@section('content')
<div class="mapmenu">
    <h1>Menu</h1>
    <div class="insidemapmenu">
        <form action="{{route('aftermapmenu')}}" method="POST">
            @csrf
            <label for="role">Role:</label>
            <select id="role" name="roleid">
                @foreach($roledata as $x)
                <option value="{{$x->id}}">
                    {{$x->rolename}}
                </option>
                @endforeach
            </select>
            <br><br>

            <label>Select Access Fields</label><br />
            <input type="checkbox" name="accessfield[]" value="Dashboard"> Dashboard <br />
            <input type="checkbox" name="accessfield[]" value="Roles"> Roles <br />
            <br>
            <button type="submit">Map</button>
        </form>
        @if(Session::has('message'))
        <div>{{Session::get('message')}}</div>
        @endif
    </div>

</div>
@endsection