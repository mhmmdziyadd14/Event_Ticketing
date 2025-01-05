<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-light-blue">
        <div class="login-container">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Login</h2>

            <!-- Status Sesi -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Kolom Alamat Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span> <!-- Updated to Font Awesome -->
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Kolom Kata Sandi -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span> <!-- Updated to Font Awesome -->
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex flex-column align-items-center mt-4">
                    <!-- Login Button -->
                    <button type="submit" class="btn primary-button">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Log In') }} <!-- Updated icon -->
                    </button>
                    
                    <!-- Register Button -->
                    <a href="{{ route('register') }}" class="btn primary-button mt-3" style="border-radius: 20px">
                        <i class="fas fa-pencil-alt"></i> {{ __('Register') }} <!-- Updated icon -->
                    </a>
                    
                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 mb-3 mt-2" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>
