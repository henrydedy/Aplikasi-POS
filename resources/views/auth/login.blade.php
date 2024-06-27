<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Kasir</title>
    <link rel="icon" href="{{ asset('assets/img/unsplash/logo.png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <style>
        body {
            background-color: #f4f4f4;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #1e88e5;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .card-info {
            margin-top: 40px;
        }

        .form-control {
            border: 2px solid #d1d3e2;
            border-radius: 10px;
            padding: 12px 15px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #1e88e5;
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-info {
            background-color: #1e88e5;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-info:hover {
            background-color: #1565c0;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h4>Toko Bulan MART</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/postlogin" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input id="email" type="email" class="form-control" name="email"
                                                tabindex="1" autofocus placeholder="Masukkan Email" required>
                                            <div class="invalid-feedback">
                                                Please fill in your email
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password"
                                                tabindex="2" placeholder="Masukan Password" required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-info btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @if (session('status'))
        <script>
            iziToast.success({
                title: 'Password Reset!',
                message: '{{ session('status') }}',
                position: 'topRight'
            });
        </script>
    @elseif(session('gagal'))
        <script>
            iziToast.error({
                title: 'Gagal Login!',
                message: '{{ session('gagal') }}',
                position: 'topRight'
            });
        </script>
    @elseif(session('sukses'))
        <script>
            iziToast.success({
                title: 'Sukses!',
                message: '{{ session('sukses') }}',
                position: 'topRight'
            });
        </script>
    @endif
</body>

</html>
