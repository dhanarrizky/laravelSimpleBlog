
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('admin') }}">
            <span data-feather="home"></span>
            <strong>
            Dashboard</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/article') }}">
            <span data-feather="file"></span>
            <strong>
            Article</strong>
          </a>
        </li>
        @if (auth()->user()->role == 1)
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/category') }}">
            <span data-feather="shopping-cart"></span>
            <strong>
            Category</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/users') }}">
            <span data-feather="users"></span>
            <strong>
            Users</strong>
          </a>
        </li>
        @endif
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            LogOut
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>