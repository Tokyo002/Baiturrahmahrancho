<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login Admin - Masjid</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  </head>
  <body>
    <x-navbar></x-navbar>
    <x-header><x-slot:title>{{ $title ?? 'Login Admin' }}</x-slot:title></x-header>

    <div class="container py-5" style="margin-top: 60px;">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <h4 class="mb-4">Login Admin</h4>

              @if ($errors->any())
                <div class="alert alert-danger">
                  {{ $errors->first() }}
                </div>
              @endif

              <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                  <label class="form-check-label" for="remember">
                    Ingat saya
                  </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                  <i class="fa fa-sign-in-alt me-1"></i> Masuk sebagai Admin
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-footer></x-footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
