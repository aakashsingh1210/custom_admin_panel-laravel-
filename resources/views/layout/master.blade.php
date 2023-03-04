<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('style')
    <style>
        .sidebar {
            position: absolute;
            height: 100%;
            background-color: #04253A;
        }

        .sidebar>div {
            padding: 10px;
            font-size: 24px;
            background-color: whitesmoke;
            display: block;
            border: 1px solid black;
            border-radius: 5px;
            margin: 5px;
            color: #04253A;
        }

        .nav {
            background-color: #ACC8E5;
            display: flex;
            justify-content: end;

        }


        a:link {
            text-decoration: none;
        }

        a:visited {
            color: #04253A;
            text-decoration: none;
        }

        a:hover {
            color: #0099ff;
            text-decoration: none;
        }

        .icon {
            font-size: 30px;
        }

        .nav div:first-child {
            margin-right: auto;
        }

        .nav>div {
            margin: 5px;
        }

        #main {
            background-color: #f2f2f2;
            height: 100vh;
        }

        .insidemain {
            padding: 10px;
        }

        #myName:hover {
            color: #0099ff;
        }

        #myName {
            color: #04253A;
        }

        table {
            border-collapse: collapse;

        }

        td,
        th {
            border: 1px solid #999;
            padding: 0.5rem;
            text-align: left;
        }

        th {

            background-color: #0099ff;
        }
        
    </style>


</head>

<body>

    <div class="sidebar" style="display:none" id="mySidebar">
        <div onclick="sidebar_close()"><i class="fa-solid fa-align-left icon"></i>
            <!--<i class="fa-solid fa-xmark"></i>-->
        </div>
        <div><a href="#"><i class="fa-solid fa-user-tie"></i>AdminLTE</a></div>
        <div><a href="{{route('dashboard')}}"><i class="fa-solid fa-gauge"></i>Dashboard</a></div>
        <div><a href="{{route('user/addRoles')}}"><i class="fa-solid fa-layer-group"></i>Roles</a></div>

    </div>

    <div id="main">

        <nav>
            <div class="nav">
                <div id="myNavbar"><a href="#" onclick="sidebar_open()"><i class="fa-solid fa-align-left icon" style="margin-right:auto"></i></a></div>
                <div><a href="#"><i class="fa-solid fa-message icon"></i></a></div>
                <div><a href="#"><i class="fa-solid fa-bell icon"></i></a></div>
                <div><a href="#"><i class="fa-solid fa-flag icon"></i></a></div>
                <div><img src="https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?s=612x612" alt="img" style="border-radius:50%; width:30px;"></div>
                <div>

                    <div onclick="dropDown()" id="myName" class="icon" style="cursor:pointer;"><b><i>
                        @if(Session::get('user'))
                        {{ Session::get('user')->firstname }}@else
                     other
                    @endif
                     </i></b></div>
                    <div class="dropdown">
                        <button id="myDropdown" style="display:none; border-radius:10px;color:#04253A">
                            <a href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></button>
                    </div>
                </div>
            </div>
        </nav>

       
       @yield('content')

    </div>
    <script src="https://kit.fontawesome.com/86fdaad85e.js" crossorigin="anonymous"></script>
    <script>
        function sidebar_open() {
            document.getElementById("main").style.marginLeft = "20%";
            document.getElementById("mySidebar").style.width = "20%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myNavbar").style.display = "none";
        }

        function sidebar_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myNavbar").style.display = "inline-block";
        }
        let a = false;

        function dropDown() {
            document.getElementById("myDropdown").style.display = !a ? "inline-block" : "none";
            a = !a;
        }
    </script>
</body>

</html>