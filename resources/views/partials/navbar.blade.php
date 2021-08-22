<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        @auth
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : ''}}" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ (request()->is('about')) ? 'active' : ''}}" href="/about">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ (request()->is('blog*')) ? 'active' : ''}}" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ (request()->is('categories*')) ? 'active' : ''}}" href="/categories">Category</a>
            </li>
        </ul>
        @endauth
        @auth
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarLogin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Wellcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarLogin">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
                </form>
            
            <!-- <li><hr class="dropdown-divider"></li> -->
            <!-- <li><a class="dropdown-item" href="#">Something else here</a> -->
        </li>
          </ul>
        </li>
        </ul>
        @else
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/login" class="nav-link {{ (request()->is('/login')) ? 'active' : ''}}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        </ul>
        @endauth
        </div>
    </div>
    </nav>