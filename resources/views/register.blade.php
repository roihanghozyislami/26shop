<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #3a3c40;
      height: 100vh;
    }
    .register-card {
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
    <div class="card register-card p-4 w-100" style="max-width: 400px;">
      <h3 class="text-center mb-4">Daftar Akun</h3>

      <form action="{{url('/register')}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input
            type="text"
            id="name"
            name="nama"
            class="form-control"
            placeholder="Nama lengkap"
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
          <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
        </div>

        <div class="mb-3 position-relative">
          <label for="password_confirmation" class="form-label">Ulangi Password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-control"
            placeholder="••••••••"
            required
          >
          <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">👁️</span>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="text-center">
          <small>Sudah punya akun? <a href="{{url('/login-page')}}" class="text-decoration-none">Login</a></small>
        </div>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(fieldId, icon) {
      const field = document.getElementById(fieldId);
      if (field.type === 'password') {
        field.type = 'text';
        icon.textContent = '🙈';
      } else {
        field.type = 'password';
        icon.textContent = '👁️';
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
