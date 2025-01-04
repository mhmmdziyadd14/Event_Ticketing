<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Gaya untuk latar belakang dan form */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url("https://i.pinimg.com/736x/63/9d/0f/639d0fb393636750349b0f6708fe9712.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .register-container {
            width: 500px; /* Mengurangi lebar agar lebih proporsional */
            padding: 2.5rem; /* Mengurangi padding agar lebih kompak */
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 1rem;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
            margin: 0 auto; /* Menjaga container tetap di tengah */
        }

        .register-container:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
            color: #46498d;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #46498d;
        }

        .input-group .form-control {
            border-radius: 0.5rem;
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .primary-button {
            background-color: #46498d;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
            width: 60%;
            max-width: 300px;
            margin: 1.5rem auto;
        }

        .primary-button:hover {
            background-color: #1E3A8A;
            transform: scale(1.05);
        }

        .text-sm {
            font-size: 0.9rem;
            color: #46498d;
        }

        .text-sm:hover {
            text-decoration: underline;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .register-container {
                width: 90%;
                padding: 1.5rem;
            }

            .primary-button {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="register-container">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <div class="input-group">
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <div class="input-group">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="input-group">
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="input-group">
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="mb-3">
                    <label for="role" class="form-label">{{ __('Role') }}</label>
                    <select id="role" name="role" class="form-select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex flex-column justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn primary-button">
                        {{ __('Register') }}
                    </button>
                    <a class="text-sm" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>    
                </div>
            </form>
        </div>
    </div>
</body>
</html>
