<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>

    @if(Auth::check())
    <body>
    @else
    <body class="my-login-bg">
    @endif
        
            @if(Auth::check())
            <header>
                @include('includes.header')
            </header> 
            @endif


            @if(Session::has('global'))
            <div class="container">
                <div class="alert alert-dismissible {{ Session::get('alert-class') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('global') }}
                </div>
            </div>
            @endif


            @if(Auth::check())
            <!--Container--> 
            <div class="container-fluid my-max-width my-main-container">

                <!-- Content -->
                @yield('content')

                <!-- Paginatin of tables -->
                <div class="text-center">
                    @yield('pagination')
                </div>

            </div>
            @else
            <!--Container--> 
            <div class="container">

                <!-- Content -->
                @yield('content') 

            </div>
            @endif

            @if(!Auth::check())
            @include('includes.footer')
            @endif
            
            <!-- Scripts are placed here -->
            <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/bootstrap-filestyle/src/bootstrap-filestyle.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/RWD-Table-Patterns/dist/js/rwd-table.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/chartjs/Chart.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/site.js') }}" type="text/javascript"></script>

    </body>    

</html>