{{-- Sidebar --}}
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    {{-- Sidebar brand --}}
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">WPU</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
      
    {{-- Sidebar body --}}
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      {{-- Sidebar link --}}
      <ul class="nav flex-column">
        {{-- Dashboard --}}
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
            {{-- Icon dashboard --}}
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Dashboard
          </a>
        </li>
          
        {{-- My Post --}}
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            {{-- Icon my post --}}
            <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
            My Posts
          </a>
        </li>

        {{-- Logout --}}
        <li class="nav-item">
          <form action="/logout" method="POST">
            {{-- Menangani penyerangan Cross-Site Request Forgery --}}
            @csrf
            {{-- Button logout --}}
            <button class="nav-link d-flex align-items-center gap-2 bg-grey border-0" style="cursor: pointer;">
              {{-- Icon logout --}}
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>