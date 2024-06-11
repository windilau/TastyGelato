<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .right-box-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-login {
            background-color: plum;
            color: #000;
            border: 2px solid #000;
        }
    </style>
</head>

<body>
    <div class="container-fluid min-vh-100 bg-light d-flex justify-content-center align-items-center">
        <div class="row border rounded-3 p-0 shadow-lg" style="max-width: 900px;">
            <div class="col-md-6 p-5 bg-white rounded-start">
                <div class="mb-4">
                    <img src="{{ asset('assets/gelatologo.png') }}" class="img-fluid mb-4" alt="Logo" style="width: 100%;">
                    <h2>Hello, Again</h2>
                    <p class="text-muted">We are happy to have you back.</p>
                </div>
                <form method="POST" action="{{ route('login.action') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label"><small>Remember Me</small></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-lg w-100 btn-login">Login</button>
                        <p>Haven't account yet? <a href="{{ route('register.action') }}">Register Here</a></p>
                    </div>
                </form>
            </div>

            <div class="col-md-6 p-0 rounded-end" style="background: #103cbe;">
                <img src="{{ asset('assets/latar.png') }}" class="right-box-image" alt="Right Box Image">
            </div>

        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>