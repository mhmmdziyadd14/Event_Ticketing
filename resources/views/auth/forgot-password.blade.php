<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="css/forgot.css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="reset-container">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Reset Password</h2>
            <p class="text-sm text-gray-600 text-center mb-4">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span>
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="d-flex flex-column align-items-center mt-4">
                    <!-- Reset Button -->
                    <button type="submit" class="btn primary-button">
                        <i class="fas fa-envelope"></i> {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
