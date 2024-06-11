<header>
  <div class="container">
    <img src="assets/gelatologo.png" alt="Tasty Gelato Logo" style="width: 150px; height: 100px" />
    <nav>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Produk</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Kontak</a></li>
        @auth
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endauth
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
        @endguest
      </ul>
    </nav>
  </div>
</header>
