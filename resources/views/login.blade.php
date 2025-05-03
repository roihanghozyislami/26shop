<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #3a3c40;
      height: 100vh;
    }
    .login-card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #202124;
    }
    .btn-primary {
      background: #3a3c40;
      border: none;
    }
    .btn-primary:hover {
      background: #202124;
    }
    .toggle-password {
      cursor: pointer;
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }
  </style>
</head>
<body>

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card login-card p-4 w-100" style="max-width: 400px;">
      <h3 class="text-center mb-4">Welcome Back</h3>

      @if (session('gagal'))
        <div class="alert alert-danger">
          {{ session('gagal') }}
        </div>
      @endif
      @if (session('berhasil'))
        <div class="alert alert-success">
          {{ session('berhasil') }}
        </div>
      @endif

      <form action="{{url('/login')}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input
            type="text"
            id="name"
            name="nama"
            class="form-control"
            placeholder="Masukkan nama anda"
            required
          >
        </div>

        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="••••••••"
            required
          >
          <span class="toggle-password" onclick="togglePassword()">👁</span>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="text-center">
          <small>Belum punya akun? <a href="{{url('/register-page')}}" class="text-decoration-none">Daftar</a></small>
        </div>
      </form>
    </div>
  </div>

  <script>
    function togglePassword() {
      const password = document.getElementById('password');
      const toggle = document.querySelector('.toggle-password');
      if (password.type === 'password') {
        password.type = 'text';
        toggle.textContent = '🙈';
      } else {
        password.type = 'password';
        toggle.textContent = '👁️';
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
