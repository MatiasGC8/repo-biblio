<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Register') }}</h2>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mt-3">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mt-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mt-3">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a class="text-sm text-gray-600" href="{{ route('login') }}">
                            {{ __('Ya tienes una cuenta?') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrarme') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
