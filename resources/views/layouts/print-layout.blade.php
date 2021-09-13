<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
        table.table-bordered{
            border:1px solid black;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
        }
        .big-checkbox{
            transform: scale(1.5);
            -webkit-transform: scale(1.5);
        }
        .box{
            width: 100%;
            border: 1px solid black;
            padding-top: 2px;
            padding-bottom: 1px;
            padding-right: 5px;
            padding-left: 5px;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
