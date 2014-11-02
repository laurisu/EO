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


        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-2.1.1.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/site.js') }}

    </body>
    
    <footer>
        @include('includes.footer')
    </footer>   
</html>