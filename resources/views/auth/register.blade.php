<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Register</title>
    <style>
        /* Custom CSS bisa ditambahkan di sini */
        .right-box-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Membuat gambar menutupi seluruh area "Right Box" */
        }

        /* Mengubah warna tombol register menjadi kuning */
        .btn-primary {
            background-color: plum;
            color: #000;
            border: 2px solid #000;
        }
    </style>
</head>

<body>
    <!-- Main Container -->
    <div class="container-fluid min-vh-100 bg-light d-flex justify-content-center align-items-center">

        <!-- Register Container -->
        <div class="row border rounded-3 shadow-lg" style="max-width: 900px;">

            <!-- Left Box -->
            <div class="col-md-6 p-5 left-box">
                <img src="{{ asset('assets/gelatologo.png') }}" class="img-fluid mb-4" alt="Logo" style="width: 100%;">
                <h2>Register</h2>
                <p class="text-muted">Please register if you dont have an account.</p>
                <form action="{{ route('register.action') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username" value="{{ old('username') }}" aria-describedby="username-error">
                        @error('username')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" aria-describedby="email-error">
                        @error('email')
                        <div id="email-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" aria-describedby="password-error">
                        @error('password')
                        <div id="password-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Re-enter your password" aria-describedby="password_confirmation-error">
                        @error('password_confirmation')
                        <div id="password_confirmation-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="Register">
                        <p>Already have account? <a href="{{ route('login.action') }}">Login Here</a></p>
                    </div>
                </form>
            </div>

            <!-- Right Box -->
            <div class="col-md-6 p-0 rounded-end" style="background: #103cbe;">
                <img src="{{ asset('assets/latar.png') }}" class="right-box-image" alt="Right Box Image"> <!-- Mengganti dengan gambar -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>