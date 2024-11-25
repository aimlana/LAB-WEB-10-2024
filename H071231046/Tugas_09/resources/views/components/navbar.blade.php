<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('inventory-logs.index') }}">Log</a>
      </li>
    </ul>

    <form class="form-inline ml-auto" action="{{ route('products.search') }}" method="GET">
      <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



{{-- <nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid d-flex align-items-center">
    <!-- Button untuk membuka offcanvas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Elemen Dashboard di sebelah kanan tombol offcanvas -->
    <a class="navbar-brand ms-2" href="#">Dashboard</a>
    
    <form class="d-flex ms-auto" role="search">
      <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    <!-- Offcanvas yang akan muncul di sisi kiri layar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav> --}}
