<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Apotek Sis - Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">APOTEK SIS</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu Utama</li>
              <li><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li><a class="nav-link" href="#"><i class="fas fa-pills"></i> <span>Data Obat</span></a></li>
            </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
          </div>
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">Copyright &copy; 2026 <div class="bullet"></div> Apotek Sis</div>
      </footer>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/stisla.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/js/scripts.js"></script>
</body>
</html>