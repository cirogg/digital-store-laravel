

{{-- @php
$test = [];
$test2 = [];
foreach ($categories as $category) {
    $test[] = $category->brand->toArray();
   }
@endphp

{{dd($test)}} --}}


<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            DIGITAL <span class="orange ">STORE</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
                <div class="dropdown">
                    <a class="nav-link active bg-dark dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        @foreach ($categories as $category)
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="/products/filter/{{ $category->id }}">{{$category->name}}</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        @foreach ($category->brands as $brand)
                                            @if ($category->brands != null)
                                                <a  class="dropdown-item" href="/products/filter/{{ $category->id }}/{{$brand->id}}">{{$brand->name}}</a>
                                            @endif
                                        @endforeach

                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @auth
                    <li class="nav-item active">
                            <span id="badge-cart" class="badge badge-danger" style="float:right;margin-bottom:-10px"></span>
                        <a class="nav-link" href="/cart/{{Auth::user()->id}}">Carrito</a>

                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Carrito</a>
                    </li>
                @endauth
             </ul>


            <form class="form-inline" action="/products/search">
                    <input name="search" class="form-control mr-sm-2 @error('search') is-invalid @enderror" type="search" placeholder="Buscar..." aria-label="Search">
                    @error('search')
                    <span class="invalid-tooltip">
                        {{$message}}
                    </span>
                    @enderror
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">


                @if(Auth::user() && Auth::user()->admin == 1)
                <li class="nav-item active">
                    <a class="btn btn-primary mr-2" href="/admin">Panel de Control</a>
                </li>
                @endif
                <li class="nav-item active mr-2 ">
                    <button type="button" id="btn-style" class="btn btn-primary">Styles</button>
                </li>



                <!-- Authentication Links -->
                @guest

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown active">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="/users/{{Auth::user()->id}}">
                                    <span>{{__('Profile')}}</span>
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </div>
    @if (Auth::user())
      <script src="/js/navbar.js">
      // var myId = {{Auth::user()->id}};
      </script>

    @endif
</nav>
