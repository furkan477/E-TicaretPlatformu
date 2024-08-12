<nav class="navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('index')}}" class="nav-link">Ürünler</a>
      </li>
      @if (Auth::check())
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('contact')}}" class="nav-link">İletişim</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('orders',Auth::id())}}" class="nav-link">Siparişlerim</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('profile',Auth::id())}}" class="nav-link">Profilim</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('logout')}}" class="nav-link">Çıkış Yap</a>
        </li>
      @else
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('register.show')}}" class="nav-link">Kayıt Ol</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('login.show')}}" class="nav-link">Giriş Yap</a>
        </li>
      @endif
      @if (Auth::check() && Auth::user()->is_admin == 1)
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('admin.index')}}" class="nav-link">Admin Ol</a>
        </li>
      @endif

    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{route('cart.list',Auth::id())}}" role="button">
            <i class="fa-solid fa-basket-shopping"></i>
          </a>
        </li>
      @endif
    </ul>
  </nav>