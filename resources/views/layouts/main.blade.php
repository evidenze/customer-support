<!doctype html>
<html lang="en">
  <head>
    <title>Customer Support System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/customer-support/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/customer-support/public/css/style.css">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
          <a class="navbar-brand" href="{{ url('/dashboard') }}">
             {{ config('app.name', 'Customer Support') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('dashboard') }}">DASHBOARD</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('ticket.create') }}">ADD NEW TICKET</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                      </div>
                  </li>
              </ul>
          </div>
        </div>
      </nav>

              @yield('content')
    <div class="container">
        <hr>
            <p class="text-center">Copyright &copy 2018, Jost</p>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://localhost/customer-support/public/js/jquery-3.2.1.min.js"></script>
    <script src="http://localhost/customer-support/public/js/popper.min.js"></script>
    <script src="http://localhost/customer-support/public/js/bootstrap.min.js"></script>
        <script src="http://localhost/customer-support/public/js/support.js"></script>
  </body>
</html>