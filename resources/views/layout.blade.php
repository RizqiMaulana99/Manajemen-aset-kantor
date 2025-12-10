<!DOCTYPE html>
<html lang="id" class="light">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Aset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* Dark mode styles */
    .dark {
      --bs-body-bg: #212529;
      --bs-body-color: #dee2e6;
    }
    .dark .navbar {
      background-color: #343a40 !important;
    }
    .dark .card {
      background-color: #343a40;
      border-color: #495057;
      color: #dee2e6;
    }
    .dark .table {
      color: #dee2e6;
    }
    .dark .table thead th {
      background-color: #495057;
      border-color: #6c757d;
      color: #ffffff;
    }
    .dark .table tbody td {
      border-color: #495057;
    }
    .dark .form-control {
      background-color: #495057;
      border-color: #6c757d;
      color: #dee2e6;
    }
    .dark .form-control:focus {
      background-color: #495057;
      border-color: #0d6efd;
      color: #dee2e6;
    }
    .dark .form-select {
      background-color: #495057;
      border-color: #6c757d;
      color: #dee2e6;
    }
    .dark .btn-outline-secondary {
      color: #6c757d;
      border-color: #6c757d;
    }
    .dark .btn-outline-secondary:hover {
      background-color: #6c757d;
      color: #212529;
    }
    .dark .alert-success {
      background-color: #198754;
      border-color: #198754;
      color: #ffffff;
    }
    .dark .text-muted {
      color: #6c757d !important;
    }
    .dark .img-thumbnail {
      border-color: #495057;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand" href="{{ route('assets.index') }}">Manajemen Aset</a>
      <button id="theme-toggle" class="btn btn-outline-light btn-sm">
        <i id="theme-icon" class="fas fa-moon"></i> Dark Mode
      </button>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script>
    // Dark mode toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const html = document.documentElement;

    // Check for saved theme preference or default to light mode
    const currentTheme = localStorage.getItem('theme') || 'light';
    html.className = currentTheme;

    // Update icon based on current theme
    if (currentTheme === 'dark') {
      themeIcon.className = 'fas fa-sun';
      themeToggle.innerHTML = '<i id="theme-icon" class="fas fa-sun"></i> Light Mode';
    } else {
      themeIcon.className = 'fas fa-moon';
      themeToggle.innerHTML = '<i id="theme-icon" class="fas fa-moon"></i> Dark Mode';
    }

    themeToggle.addEventListener('click', function() {
      const currentTheme = html.className;
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';

      html.className = newTheme;
      localStorage.setItem('theme', newTheme);

      // Update button text and icon
      if (newTheme === 'dark') {
        themeIcon.className = 'fas fa-sun';
        themeToggle.innerHTML = '<i id="theme-icon" class="fas fa-sun"></i> Light Mode';
      } else {
        themeIcon.className = 'fas fa-moon';
        themeToggle.innerHTML = '<i id="theme-icon" class="fas fa-moon"></i> Dark Mode';
      }
    });
  </script>
</body>
</html>
