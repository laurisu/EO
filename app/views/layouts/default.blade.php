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
            <div class="container my-main-container">

                <!-- Content -->
                @yield('content') 
                @yield('pagination')

            </div>
        @else
            <!--Container--> 
            <div class="container">

                <!-- Content -->
                @yield('content') 

            </div>
        @endif


        @include('includes.footer')

        <!-- Scripts are placed here -->
        <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/bootstrap-filestyle.min.js') }}" type="text/javascript"> </script>
        <script src="{{ asset('js/site.js') }}" type="text/javascript"></script>

    </body>    

</html>