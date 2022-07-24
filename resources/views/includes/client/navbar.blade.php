<section>
    <nav class="navbar fixed-top navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ url('frontend/assets/icon/logocnm.png') }}" alt="" width="60" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-lg gap-lg-0 gap-2">
                    <li class="nav-item my-auto">
                        <a class="nav-link {{ set_active('home') }} color-pallete-5" aria-current="page" href="{{ Route::is('home') ? '#header' : route('home') }}">Home</a>
                    </li>
                    @auth
                        @if (Auth::check())
                        <li class="nav-item my-auto">
                            <a class="nav-link {{ set_active('overview.index') }}" aria-current="page" href="{{  Route::is('overview') ? '#overview' : route('overview.index') }}">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item my-auto">
                            <a class="nav-link {{ set_active('overview.index') }}" aria-current="page" href="{{ route('login') }}">Dashboard</a>
                        </li>
                        @endif
                    
                    @endauth
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="#feature">About us</a>
                    </li>
                    <li class="nav-item my-auto me-lg-20">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item my-auto">
                        @auth
                            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-sign-in d-flex justify-content-center ms-lg-2 rounded-pill">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-sign-in d-flex justify-content-center ms-lg-2 rounded-pill" href="{{ route('login') }}" role="button">SignIn</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<script>
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function() {
        if(window.pageYOffset > 100){
            nav.classList.add('bg-light', 'shadow')
            nav.classList.add('navbar-light')
            nav.classList.remove('navbar-transparenttransparent')
        } else {
            nav.classList.remove('bg-light', 'shadow')
            nav.classList.remove('navbar-light')
            nav.classList.add('navbar-transparent')
        }
    })
</script>