<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Admin Panel Museum Sandi</title>
</head>
<body>
    <header>
        <div class="logo-header">
            <h2>Museum Sandi</h2>
        </div>
    </header>
    <main>
        <nav>
            <ul>
                <li><a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : ''}}"><i class="fa fa-dashboard"></i> Statistik</a></li>
                <li><a href="{{ url('admin/daftar') }}" class="{{ request()->is('admin/daftar') ? 'active' : ''}}"><i class="fa fa-table"></i> Daftar Pengunjung</a></li>
                <li><a href=""><i class="fa fa-sign-out"></i> Logout</a></li>
        </nav>
            </ul>
        @yield('Main-Content')
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Jacascript -->
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('custom-script');
</body>
</html>