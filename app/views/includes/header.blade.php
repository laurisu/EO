<!--Navbar--> 
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::check())
            <a class="navbar-brand" href="{{ URL::route('home') }}">EasyOffer</a>
            @else
            <a class="navbar-brand" href="{{ URL::route('sign-in') }}">EasyOffer</a>
            @endif
        </div>
        <!--        Everything you want hidden at 940px or less, place within here -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())

                <li><a href="{{ URL::route('product-list') }}">Products</a></li>
                <li><a href="{{ URL::to('/offer') }}">Offer</a></li>

                    @if(Auth::user()->role == 2)

                    <li><a href="{{ URL::route('admin-users-list') }}">Users</a></li>

                    @endif  

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('change-password') }}">Change password</a></li>
                        <li><a href="{{ URL::route('sign-out') }}">Sign out</a></li>
                    </ul>
                </li>

                @endif

            </ul> 
        </div>
    </div>
</div> 