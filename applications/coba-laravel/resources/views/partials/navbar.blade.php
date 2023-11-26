{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    {{-- Navbar brand --}}
    <a class="navbar-brand" href="/">WPU Blog</a>

    {{-- Button collapse (untuk responsive design) --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    {{-- Navbar link --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      {{-- List navbar link --}}
      <ul class="navbar-nav">
        {{-- Home --}}
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
        </li>
        {{-- About --}}
        <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        {{-- Blog --}}
        <li class="nav-item">
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        {{-- Categories --}}
        <li class="nav-item">
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
        </li>
      </ul>

      {{-- List navbar link (login) --}}
      <ul class="navbar-nav ms-auto">
        {{-- Jika user sudah login --}}
        @auth
          {{-- Content --}}
          <li class="nav-item dropdown">
            {{-- Button nav nama --}}
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>

            {{-- Dropdown menu --}}
            <ul class="dropdown-menu">
              {{-- My Dashboard --}}
              <li>
                <a class="dropdown-item" href="/dashboard">
                  <i class="bi bi-layout-text-sidebar-reverse">
                  </i> My Dashboard
                </a>
              </li>

              {{-- Divider/Pemisah --}}
              <li><hr class="dropdown-divider"></li>
              
              {{-- Logout --}}
              <li>
                {{-- Menangani logout --}}
                <form action="/logout" method="POST">
                  {{-- Menangani penyerangan Cross-Site Request Forgery --}}
                  @csrf
                  {{-- Button logout --}}
                  <button class="dropdown-item" style="cursor: pointer;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        
        {{-- Jika user belum login --}}
        @else
          {{-- Button login --}}
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>