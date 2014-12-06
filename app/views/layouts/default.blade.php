<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>

    <body @yield('bodyparams')>
        
        <header>
            @if(Auth::check())
            @include('includes.header')
            @endif
        </header> 

        @if(Session::has('global'))
        <div class="alert alert-dismissible">
            <p>{{ Session::get('global') }}</p>
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
        <script src="{{ asset('js/site.js') }}" type="text/javascript"></script>

    </body>    

</html>