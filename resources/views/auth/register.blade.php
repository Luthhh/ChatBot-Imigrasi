<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="d-flex flex-column vh-100">
    <section class="flex-grow-1" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 d-flex justify-content-center">
                    <img src="{{ asset('images/maskot.png') }}" class="img-fluid w-75" alt="Register image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <!-- Alert Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Registrasi gagal!</strong> Silakan periksa kembali form Anda:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- End Alert -->

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-center mb-3">
                            <h2>Register</h2>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <hr class="flex-grow-1">
                            <hr class="flex-grow-1">
                        </div>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg"
                                placeholder="Enter your full name" required value="{{ old('name') }}" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter a valid email" required value="{{ old('email') }}" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" required />
                        </div>

                        <!-- Confirm Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control form-control-lg" placeholder="Confirm password" required />
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>

                        <p class="text-center mt-3">
                            Already have an account?
                            <a href="{{ route('login') }}" class="link-primary">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>