<!--Navigasi Bar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
         <a class="navbar-brand" href="#"><img src="../assets/img/Logo.png"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
           <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link {{ ("Home") ? 'actice' : '' }}" href="#">Beranda</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link {{ ("layanan") ? 'actice' : '' }}" href="#layanan">Layanan</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ ("kontak") ? 'actice' : '' }}" href="#kontak">Kontak</a>
               </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Welcome back, {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">{{ auth()->user()->name }}</a>
                          <div class="dropdown-divider"></div>
                          <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                              <span class="align-middle">Logout</span>
                            </button>
                          </form>
                        </div>
                      </li>
                    </ul>
                    @else
                <li class="nav-item">
                    <a href="/login" class="appointment-btn scrollto">Login</a>
                </li>
                @endauth
            </ul>
       </div>
  </div>
</nav>

