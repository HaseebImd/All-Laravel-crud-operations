<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
<div class="container">

    <div class="mt-4">
        <h4 class="text-center">All Friends</h4>
        <div class="mt-4 mb-4">
            <button class="btn btn-secondary" ><a style="text-decoration: none; color: white " href="addfriend">Add Friend</a> </button>
            <p align="right">
            <button class="btn btn-danger" ><a style="text-decoration: none; color: white " href="logout">LogOut</a> </button>
            </p>
        </div>
        @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>
        {{ session()->get('message') }}
        </strong>
    </div>
@endif
        <nav class="navbar navbar-light bg-white mb-4">
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="myInput" onkeyup="myFunction()">
                </form>
            </div>
        </nav>
        <table class="table mt-5" id="myTable">
            <thead>
            <tr>
               
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Customize</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($friends as $friend)
                <tr>
                    <td>{{$friend['name']}}</td>
                    <td>{{$friend['email']}}</td>
                    <td>{{$friend['phone']}}</td>
                    <td>{{$friend['address']}}</td>
                    <td> <button class="btn btn-success" ><a style="text-decoration: none; color: white " href="/customizefriend/{{$friend['id']}}">Customize</a> </button></td>
                    <td><button class="btn btn-danger" ><a style="text-decoration: none; color: white " href="/unfriend/{{$friend->id}}">Unfriend</a> </button></td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>


