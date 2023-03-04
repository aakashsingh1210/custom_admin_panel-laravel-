@extends('layout.master')
@section('title','dashboard')
@section('content')
<div class="insidemain">

            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <!-- $loggedUserInfo['firstname'] -->  
                        <td>{{ Session::get('user')->firstname }}</td>
                    

                    </tr>
                </tbody>
            </table>
            <hr>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum libero atque commodi incidunt praesentium illo at quas impedit rem accusamus temporibus natus labore, minima fugit ullam ut ipsam. Quos numquam omnis nostrum facilis aliquam rerum, vitae quasi? Deleniti temporibus libero iste? Blanditiis voluptates minima, cum asperiores, maxime consectetur tempora nihil totam deserunt cumque tempore dicta rerum, ullam nostrum optio odit. Sapiente dolorum nam accusamus eos sed accusantium in voluptatibus corporis enim! Aut, dolores accusantium. Atque tempore provident nesciunt doloremque! Labore, nostrum quisquam delectus ipsum, libero tenetur culpa repudiandae magnam hic veniam perferendis. Sunt perspiciatis pariatur dolorum nemo aspernatur ducimus veniam!
            <div>
@endsection