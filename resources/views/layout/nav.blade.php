<nav class="navbar navbar-expand-lg border-bottom border-bottom-dark ticky-top bg-primary"
data-bs-theme="dark">
<div class="container">
    <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav d-flex align-items-center justify-center ">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('login')) ? 'active' : ''  }}" aria-current="page" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ (Route::is('register')) ? 'active' : ''  }}" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('profile')) ? 'active' : ''  }}" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>
</nav>