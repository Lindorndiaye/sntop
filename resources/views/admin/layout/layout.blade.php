<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">table tr td{font-size: 13px;}</style>
</head>
<body>
    <div id="wrapper">
        <!-- nav bar -->
        @include('admin.layout.navbar')
        <!-- end nav bar -->

        <!-- side_menu -->
        @include('admin.layout.side_menu')
        <!-- end side_menu -->

        @yield('content')
        
    </div>
</body>
</html>
