<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>

    <body>

        <!--Container--> 
        <div class="container my-main-container">

            @if(Session::has('global'))
            <p>{{ Session::get('global') }}</p>
            @endif

            <header class="row">
                @include('includes.header')
            </header>

            <!-- Content -->
            @yield('content')

        </div>

        <footer>
            @include('includes.footer')
        </footer>  
        
        <!-- Scripts are placed here -->
        <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/site.js') }}" type="text/javascript"></script>
        
    </body>    

</html>