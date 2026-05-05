<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/images/new-images/favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/new-images/favicon.webp') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- jQuery (required for Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000",
            extendedTimeOut: "1000",
            showDuration: "300",
            hideDuration: "300",
            showMethod: "slideDown",
            hideMethod: "fadeOut"
        };
    </script>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('{{ asset('asset/images/new-images/about-bg.webp') }}') no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        /* Soft overlay */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 60, 100, 0.35);
            backdrop-filter: blur(1px);
            z-index: 0;
        }

        /* Login Box */
        .login-box {
            width: 400px;
            padding: 50px 40px;
            border-radius: 22px;

            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.25),
                    rgba(180, 220, 255, 0.25));

            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);

            border: 1px solid rgba(255, 255, 255, 0.35);

            box-shadow: 0 20px 50px rgba(0, 80, 120, 0.25);

            animation: fadeUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h4 {
            color: #0f172a;
            font-weight: 700;
            letter-spacing: 1px;
        }

        label {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 120, 200, 0.2);
            color: #0f172a;
            padding: 12px;
            transition: 0.3s ease;
        }

        .form-control:focus {
            border-color: #0ea5e9 ;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.25);
        }

        /* Password wrapper */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #0ea5e9;
            font-size: 18px;
        }

        /* Button */
        .btn-primary {
            border-radius: 12px;
            font-weight: 600;
            padding: 12px;
            border: none;
            background: linear-gradient(45deg, #0ea5e9, #0284c7);
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
        }

        .alert {
            border-radius: 12px;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('{{ asset('asset/images/new-images/about-bg.webp') }}') no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        /* Dark overlay */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 60, 100, 0.35);
            backdrop-filter: blur(1px);
            z-index: 0;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 180px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 45%;
            animation: waveMove 10s linear infinite;
            z-index: 0;
        }

        .wave2 {
            bottom: 0;
            animation: waveMoveReverse 14s linear infinite;
            opacity: 0.5;
        }

        @keyframes waveMove {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes waveMoveReverse {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if (session('info'))
        <script>
            toastr.info("{{ session('info') }}");
        </script>
    @endif
    <div class="wave"></div>
    <div class="wave wave2"></div>
    <div class="login-box">
        <h4 class="text-center mb-4">Admin Login</h4>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form id="loginForm" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

            <div class="mb-3 password-wrapper">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control pe-5" placeholder="Password"
                    required>
                <i class="fa-solid fa-eye toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
            </div>

            <button type="submit" id="loginBtn" class="btn btn-primary w-100 mt-3">
                <span class="btn-text">Login</span>
                <span class="spinner-border spinner-border-sm d-none" role="status"></span>
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {

            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: "Email is required",
                    password: "Password is required"
                },

                errorPlacement: function(error, element) {
                    element
                        .closest('.mb-3')
                        .find('.error-text')
                        .html(error);
                },

                highlight: function(element) {
                    $(element)
                        .closest('.input-group-validate')
                        .addClass('is-invalid-group');
                },

                unhighlight: function(element) {
                    $(element)
                        .closest('.input-group-validate')
                        .removeClass('is-invalid-group');

                    $(element)
                        .closest('.mb-3')
                        .find('.error-text')
                        .empty();
                },

                submitHandler: function(form) {
                    $('#loginBtn').prop('disabled', true);
                    $('#loginBtn .btn-text').addClass('d-none');
                    $('#loginBtn .spinner-border').removeClass('d-none');
                    form.submit();
                }
            });

        });
    </script>

    <script>
        function togglePassword() {
            const pass = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');

            if (pass.type === 'password') {
                pass.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pass.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>
