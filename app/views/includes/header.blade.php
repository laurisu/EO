<!--Navbar--> 
<nav class="navbar navbar-default navbar-fixed-top my-navbar-styles" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::check())
                <a class="navbar-brand my-navbar-brand" href="{{ URL::route('home') }}">
                    <img src="{{ asset('img/assets/EO-logo-sm.png') }}" class="img-responsive" alt="EasyOffer">
                </a>
            @else
                <a class="navbar-brand my-navbar-brand" href="{{ URL::route('sign-in') }}">
                    EasyOffer
                </a>
            @endif
        </div>
        <!--        Everything you want hidden at 940px or less, place within here -->
        <div class="collapse navbar-collapse my-collapse">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())

                <li><a href="{{ URL::route('product-list') }}">Products</a></li>
                <li><a href="{{ URL::route('customer-list') }}">Customers</a></li>
                <li><a href="{{ URL::route('offers-list') }}">Offers</a></li>

                    @if(Auth::user()->role == 2)

                    <li><a href="{{ URL::route('users-list') }}">Users</a></li>

                    @endif  

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My EO <span class="caret"></span></a>
                    <ul class="dropdown-menu my-open-dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('user-profile', Auth::user()->username) }}">My profile</a></li>
                        <li><a href="{{ URL::route('change-password') }}">Change password</a></li>
                        <li><a href="{{ URL::route('sign-out') }}">Sign out</a></li>
                        <li class="divider">xxx{{ Auth::user()->name }}</li>
                        <li class="dropdown-header">You're signed in</li>
                        <li class="dropdown-header">as {{ Auth::user()->name . ' ' . Auth::user()->surname }}</li>
                    </ul>
                </li>

                @endif

            </ul> 
        </div>
    </div>
</nav> 